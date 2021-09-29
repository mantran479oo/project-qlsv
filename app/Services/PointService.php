<?php

namespace App\Services;

use App\Repositories\Repository\Interfaces\PointRepositoryInterface;

class PointService
{
    protected $PointRepository;
    public function __construct(PointRepositoryInterface $PointRepositoryInterface)
    {
        $this->PointRepository = $PointRepositoryInterface;
    }
    public function postPoint($request,$student_code){
        $point = array_slice($request->toArray(), 7);
        $number_point = [];
        $i = 0;
        foreach ($point as $key => $value) {
            $number_point[$i]['student_code'] = $student_code;
            $number_point[$i]['number_point'] = $value;
            $number_point[$i]['subject_code'] = $key;
            $i++;
        }
      return $this->PointRepository->insert($number_point);
    }
}
