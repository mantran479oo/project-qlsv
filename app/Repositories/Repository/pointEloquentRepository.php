<?php
namespace App\Repositories\Repository;
use App\Models\Model_points;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\pointRepositoryInterface;


class pointEloquentRepository extends EloquentRepository implements pointRepositoryInterface
{
    public function getModel()
    {
        return Model_points::class;
    }
    public function my_point($student_code){
        return $this->getModel()::join('subjects','subjects.subject_code','=','points.subject_code')
                                    ->where('points.student_code','=',$student_code)->get();
    }
    public function set_add($request,$student_code){
        $point = array_slice($request->toArray(), 7);
        $number_point = [];
        $i = 0;
     foreach($point as $key => $value){
            $number_point[$i]['student_code'] = $student_code;
            $number_point[$i]['number_point'] = $value;                  //insert điểm
            $number_point[$i]['subject_code'] = $key;
            $i++;
        }
        return $number_point;
    }
    public function update_point($student_code,array $attributes){
            $result = $this->_model::where('student_code','=',$student_code)->get();
            foreach($result as $value){                                            //xóa điểm cũ và insert thêm điểm mới
              $value->delete();
            }
            if ($result) {
                $this->_model->insert($attributes);
                return true;
            }
            return false;
    }
}
