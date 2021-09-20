<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Repository\Interfaces\UserRepositoryInterface;
use App\Repositories\Repository\Interfaces\ClassRepositoryInterface;
use App\Repositories\Repository\Interfaces\PointRepositoryInterface;
use App\Repositories\Repository\Interfaces\SubjectRepositoryInterface;
use App\Repositories\Repository\Interfaces\InformationRepositoryInterface;

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
    InformationRepositoryInterface $InformationRepositoryInterface,
    UserRepositoryInterface $UserRepositoryInterface,
    ClassRepositoryInterface $ClassRepositoryInterface,
    SubjectRepositoryInterface $SubjectRepositoryInterface,
    PointRepositoryInterface $PointRepositoryInterface
  ) {
    $this->_informations = $InformationRepositoryInterface;
    $this->_points       = $PointRepositoryInterface;
    $this->_users        = $UserRepositoryInterface;
    $this->_class        = $ClassRepositoryInterface;
    $this->_subjects     = $SubjectRepositoryInterface;
  }

  //Hiện thị trang người dùng
  public function index()
  {
    $listProfile = $this->_informations->myProfile((int)Auth::id());
    $listSubject = $this->_subjects->getAll();

    return view('index', compact('listProfile', 'listSubject'));
  }

  //Hiện thị trang login
  public function login()
  {
    return view('login');
  }

  //Check login
  public function postLogin(Request $request)
  {
    if (Auth::attempt($this->_users->post_login($request))) {

      return redirect()->route('page.index');
    } else {

      return redirect()->back()->with(['err' => 'Đăng nhập không thành công']);
    }
  }

  //Logout
  public function postLogout()
  {
    Auth::logout();

    return redirect()->route('page.index');
  }
}
