<?php

namespace App\Http\Controllers\admin;

use App\Constants\Constant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUser;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Repository\Interfaces\UserRepositoryInterface;
use App\Repositories\Repository\Interfaces\ClassRepositoryInterface;
use App\Repositories\Repository\Interfaces\PointRepositoryInterface;
use App\Repositories\Repository\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Repository\Interfaces\InformationRepositoryInterface;

class indexController extends Controller
{
    protected $_informations;
    protected $_points;
    protected $_subjects;
    protected $_users;
    protected $_class;

    public function __construct(
        InformationRepositoryInterface $InformationRepositoryInterface,
        UserRepositoryInterface $UserRepositoryInterface,
        ClassRepositoryInterface $ClassRepositoryInterface,
        SubjectRepositoryInterface $SubjectRepositoryInterface,
        PointRepositoryInterface $PointRepositoryInterface
    ) {
        $this->_informations = $InformationRepositoryInterface;
        $this->_points = $PointRepositoryInterface;
        $this->_users = $UserRepositoryInterface;
        $this->_class = $ClassRepositoryInterface;
        $this->_subjects = $SubjectRepositoryInterface;
    }

    public function admin()
    {
        $_GENDER_MALE = Constant::_GENDER_MALE;
        $list_subject = $this->_subjects->getAll();
        $list_class = $this->_class->getAll();
        $list_information = $this->_informations->listInformation();

        return view('admin.index', compact('list_class', 'list_subject', 'list_information', '_GENDER_MALE'));
    }

    //Thêm thông tin và tài khoản sinh viên
    public function setAdd(CreateNewUser $request)
    {
        //Ramdom student_code
        $pin = mt_rand(100, 9999)
            . mt_rand(0, 99);
        $code = Carbon::now()->month . str_shuffle($pin);
        DB::beginTransaction();
        try {
            $point = $this->_points->postScore($request, (int) $code);
            $this->_points->insert($point);
            $user = $this->_users->create($this->_users->postUser($request));
            $this->_informations->postInformation($request, (int) $user->id, (int)$code);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Xóa tài khoản sinh viên
     * @param  int $id
     */
    public function destroy(int $id)
    {
        DB::beginTransaction();
        try {
            $destroy = $this->_informations->find($id);
            $destroy->articlePoints()->get()->each(function ($value, $key) {
                $value->delete();
            });
            $this->_users->delete($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.index');
    }

    /**
     * Hiển thị form sửa thông tin sinh viên
     * @param  int $id
     */
    public function setEdit(int $id)
    {
        $edit_student = $this->_informations->myProfile($id);
        $list_class = $this->_class->getAll();
        $list_subject = $this->_subjects->getAll();

        return view('admin.edit', compact('edit_student', 'list_subject', 'list_class'));
    }

    /**
     * Update thông tin sinh viên
     * @param  int $id
     * @request form
     */
    public function update(Request $request, int $id)
    {
        DB::beginTransaction();
        try {
            $this->_informations->update($id, $request->toArray());
            $this->_users->update($id, $this->_users->postUser($request));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.index');
    }

    /**
     * Update điểm sinh viên
     *@param mixed $request
     * return response
     */
    public function postScore(Request $request)
    {
        $id = $request->query('id');
        $number_point = $request->query('point');
        DB::beginTransaction();
        try {
            $this->_points->update($id, $this->_points->updatePoint($number_point));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return response()->json(['status' => 200], 200);
    }
}
