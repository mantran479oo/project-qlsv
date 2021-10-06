<?php

namespace App\Http\Controllers\admin;

use App\Constants\Constant;
use Exception;
use Illuminate\Http\Request;
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
     * @var InformationService
     */
    protected $informations;

    /**
     * @var PointService
     */
    protected $points;

    /**
     * @var SubjectService
     */
    protected $subjects;

    /**
     * @var UserService
     */
    protected $users;

    /**
     * @var ClassService
     */
    protected $class;

    /**
     * indexController constructor.
     * @param InformationService $informationService
     * @param UserService $userService
     * @param ClassService $classService
     * @param SubjectService $subjectService
     * @param PointService $pointService
     */
    public function __construct(
        InformationService $informationService,
        UserService $userService,
        ClassService $classService,
        SubjectService $subjectService,
        PointService $pointService
    ) {
        $this->informations = $informationService;
        $this->points       = $pointService;
        $this->users        = $userService;
        $this->class        = $classService;
        $this->subjects     = $subjectService;
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function admin()
    {
        $GENDERMALE      = Constant::GENDER_MALE;
        $listSubject     = $this->subjects->showSubject();
        $listClass       = $this->class->showClass();
        $listInformation = $this->informations->showInformation();

        return view('admin.index', compact('listClass', 'listSubject', 'listInformation', 'GENDERMALE'));
    }


    /**
     * @param CreateNewUser $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function setAdd(CreateNewUser $request)
    {
        DB::beginTransaction();
            $user        = $this->users->postUser($request);
            $information = $this->informations->postInformation($request, $user->id);
            $this->points->postPoint($request, $information->studentcode);
            DB::commit();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $this->users->delete($id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('admin.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function setEdit($id)
    {
        $editStudent = $this->informations->showProfile($id);
        $listClass   = $this->class->showClass();
        $listSubject = $this->subjects->showSubject();

        return view('admin.edit', compact('editStudent', 'listSubject', 'listClass'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
            $update = $this->users->postUser($request);
            $this->informations->update($id, $request->toArray());
            $this->users->update($id, $update->toArray());
            DB::commit();

        return redirect()->route('admin.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function postScore(Request $request)
    {
        $id = $request->id;
        $numberpoint = $request->query('point');
        DB::beginTransaction();
        try {
            $this->points->update($id, $this->points->updatePoint($numberpoint));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return response()->json(['status' => 200], 200);
    }
}
