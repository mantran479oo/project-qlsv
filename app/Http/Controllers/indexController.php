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

  public function index()
  {
    $listProfile = $this->_informations->showProfile(Auth::id());
    $listSubject = $this->_subjects->getAll();

    return view('index', compact('listProfile', 'listSubject'));
  }

  public function login()
  {
    return view('login');
  }

  public function postLogout()
  {
    Auth::logout();

    return redirect()->route('page.index');
  }
}
