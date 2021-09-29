<?php

namespace App\Http\Controllers\admin;

use App\Constants\Constant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewUser;
use App\Services\ClassService;
use App\Services\InformationService;
use App\Services\PointService;
use App\Services\SubjectService;
use App\Services\UserService;

class indexController extends Controller
{
    /** 
     * @var InformationEloquenRepository
     */
    protected $_informations;

    /** 
     * @var PointEloquentRepository 
     */
    protected $_points;

    /**  
     * @var SubjectEloquentRepository 
     */
    protected $_subjects;

    /**  
     * @var UserEloquentRepository 
     */
    protected $_users;

    /**
     * @var ClassEloquentRepository 
     */
    protected $_class;

    /**
     * indexController constructor.
     */
    public function __construct(
        InformationService $InformationService,
        UserService $UserService,
        ClassService $ClassService,
        SubjectService $SubjectService,
        PointService $PointService
    ) {
        $this->_informations = $InformationService;
        $this->_points       = $PointService;
        $this->_users        = $UserService;
        $this->_class        = $ClassService;
        $this->_subjects     = $SubjectService;
    }


    public function admin()
    {
        $_GENDER_MALE    = Constant::_GENDER_MALE;
        $listSubject     = $this->_subjects->showSubject();
        $listClass       = $this->_class->showClass();
        $listInformation = $this->_informations->showInformation();

        return view('admin.index', compact('listClass', 'listSubject', 'listInformation', '_GENDER_MALE'));
    }

    public function setAdd(CreateNewUser $request)
    {
        DB::beginTransaction();
        try {
            $user        = $this->_users->postUser($request);
            $information = $this->_informations->postInformation($request, $user->id);
            $this->_points->postPoint($request, $information->student_code);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->_users->delete($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.index');
    }

    public function setEdit($id)
    {
        $editStudent = $this->_informations->showProfile($id);
        $listClass   = $this->_class->showClass();
        $listSubject = $this->_subjects->showSubject();

        return view('admin.edit', compact('editStudent', 'listSubject', 'listClass'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $update = $this->_users->postUser($request);
            $this->_informations->update($id, $request->toArray());
            $this->_users->update($id, $update);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.index');
    }

    public function postScore(Request $request)
    {
        $id = $request->id;
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
