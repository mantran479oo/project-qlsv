<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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

    public function admin()
    {
        $list = $this->_informations->admin_information();
        $list_subject = $this->_subjects->getAll();
        $list_user =  $this->_informations ->list_user();
        $list_class = $this->_class->getAll();
     
        return view('admin.index',compact('list_user','list_class','list_subject','list'));
    }
    public function set_add(Request $request)
    {
        $create_user = $this->_users->set_add($request);
        $create_information = $this->_informations->set_add($request,$create_user->id);
        $this->_points->insert($this->_points->set_add($request,$create_information->student_code));
    
       return redirect()->back();
     }

     public function destroy($id)
     { 
         $this->_informations->delete($id);
    
         return redirect()->route('index');
     }

     public function set_edit($id)
     {
        $edit_student= $this->_informations->my_profile('id',$id);
        $list_class =$this->_class->getAll();
        $list_subject = $this->_points->my_point($edit_student->student_code);
    
        return view('admin.edit',compact('edit_student','list_subject','list_class'));
     }

     public function update(Request $request,$id)
     {
        $update_student = $this->_informations->find($id);
        $update_user = $this->_users->find($update_student->id_user);
        $update_user->password = Hash::make(date('d/m/Y', strtotime($request->date)));
        $update_user->save();
        $this->_informations->update($id,$this->_informations->set_update($request));
        $this->_points->update_point($update_student->student_code,$this->_points->set_add( $request,$update_student->student_code));
    
        return redirect()->route('index');

     }
}
