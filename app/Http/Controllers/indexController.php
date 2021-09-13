<?php

namespace App\Http\Controllers;

use App\Models\Model_class;
use App\Models\Model_users;
use App\Models\Model_points;
use Illuminate\Http\Request;
use App\Models\Model_subjects;
use App\Models\Model_informations;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Repository\Interfaces\userRepositoryInterface;
use App\Repositories\Repository\Interfaces\classRepositoryInterface;
use App\Repositories\Repository\Interfaces\pointRepositoryInterface;
use App\Repositories\Repository\Interfaces\subjectRepositoryInterface;
use App\Repositories\Repository\Interfaces\informationRepositoryInterface;

class indexController extends Controller
{
    protected $_informations;
    protected $_points;
    protected $_subjects;
    protected $_users;
    protected $_class;
     public function __construct(  informationRepositoryInterface $informationRepositoryInterface,
                                   userRepositoryInterface $userRepositoryInterface,
                                   classRepositoryInterface $classRepositoryInterface,
                                   subjectRepositoryInterface $subjectRepositoryInterface,
                                   pointRepositoryInterface $pointRepositoryInterface)
     {
         $this->_informations = $informationRepositoryInterface;
         $this->_points = $pointRepositoryInterface;
         $this->_users = $userRepositoryInterface;
         $this->_class = $classRepositoryInterface;
         $this->_subjects = $subjectRepositoryInterface;

     }
    public function index()
    {
       $user = $this->_informations->get_information(Auth::id());
       $class = $this->_subjects->getAll();
       $list_profile = $this->_informations->my_profile('student_code',$user->student_code);
       $my_points = $this->_points->my_point($list_profile->student_code);
      
       return view('index',compact('list_profile','class','my_points'));
     }

    public function login()
    {
      return view('login');
    }

     public function post_login(Request $request)
     {
        $user = [
            'username' => $request['username'],
            'password' => trim($request['password']),
        ];
        if(Auth::attempt($user)) {
            return redirect()->route('page.index');
        }else{
             return redirect()->back()->with(['err'=>'Đăng nhập không thành công']);
        }
     }

     public function post_logout()
     {
        Auth::logout();
        return redirect()->route('page.index');
     }

}
