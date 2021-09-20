<?php

namespace App\Repositories\Repository;

use App\Models\Point;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\PointRepositoryInterface;


class PointEloquentRepository extends EloquentRepository implements PointRepositoryInterface
{
    //Connection Model
    public function getModel()
    {
        return Point::class;
    }

    /**
     * get product coverage
     * @param int $id
     * @param int $student_code
     * @param mixed $request
     * @return array
     */
    public function postScore($request, int $student_code)
    {
        $point = array_slice($request->toArray(), 7);
        $number_point = [];
        $i = 0;
        foreach ($point as $key => $value) {
            $number_point[$i]['student_code'] = $student_code;
            $number_point[$i]['number_point'] = $value;
            $number_point[$i]['subject_code'] = $key;
            $i++;
        }

        return $number_point;
    }

    /**
     * get product coverage
     * @param int $number_point
     * @return array
     */
    public function updatePoint(int $number_point)
    {
        return ['number_point' => $number_point];
    }
}
