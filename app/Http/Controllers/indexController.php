<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ClassService;
use App\Services\PointService;
use App\Services\SubjectService;
use App\Http\Controllers\Controller;
use App\Services\InformationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function index()
  {
    $listProfile = $this->informations->showProfile(8);
    $listSubject = $this->subjects->showSubject();

    return view('index', compact('listProfile', 'listSubject'));
  }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
  {
    return view('login');
  }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogout()
  {
    Auth::logout();

    return redirect()->route('page.index');
  }
}
