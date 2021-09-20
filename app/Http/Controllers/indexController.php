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

  //Hiện thị trang người dùng
  public function index()
  {
    $list_profile = $this->_informations->myProfile((int)Auth::id());
    $list_subject = $this->_subjects->getAll();

    return view('index', compact('list_profile', 'list_subject'));
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