<?php
namespace App\Repositories\Repository;
use Illuminate\Support\Carbon;
use App\Models\Model_informations;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\informationRepositoryInterface;

class informationEloquentRepository extends EloquentRepository implements informationRepositoryInterface
{

    public function getModel()
    {
        return Model_informations::class;
    }

    public function my_profile($column,$student_code){
        return $this->_model::join('class','informations.class_code','=','class.class_code')
                                             ->Where('informations.'.$column.'','=',$student_code)->first();

    }

    public function get_information($id){
        return $this->_model::where('id_user','=',$id)->first();
    }
    public function admin_information(){
           return $this->_model::with('points')->orderBy('name')->get() ;
    }
    public function list_user(){
        return $this->_model::join('class','class.class_code','informations.class_code')->orderBy("name")->get();
    }

    public function set_add($request,$id){
        //random mã sinh viên
        $pin = mt_rand(100, 9999)
                . mt_rand(0, 99);
        $code =Carbon::now()->month.str_shuffle($pin);

         $value = [
               'id_user' => $id,
               'student_code' => $code,
               'name' => $request->username,
               'date' => $request->date,
               'olds' => 15,
               'class_code' => $request->class,
               'hobby' => $request->hobby,
               'gender' => $request->gender,
               'address' => $request->address
         ];
        $create_information = $this->create($value);
        return $create_information;
    }
    public function set_update($request){
        $value = [
            'name' => $request->username,
            'date' => $request->date,
            'olds' => 15,
            'class_code' => $request->class,
            'hobby' => $request->hobby,
            'gender' => $request->gender,
            'address' => $request->address
        ];
       return $value;
    }
}


