<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Repositories\Repository\Interfaces\PointRepositoryInterface;

class PointService
{
    /**
     * @var PointRepositoryInterface
     */
    protected $pointRepository;

    /**
     * PointService constructor.
     * @param PointRepositoryInterface $PointRepositoryInterface
     */
    public function __construct(PointRepositoryInterface $PointRepositoryInterface)
    {
        $this->pointRepository = $PointRepositoryInterface;
    }

    /**
     * @param $request
     * @param $student_code
     * @return mixed
     * @throws Exception
     */
    public function postPoint($request, $student_code)
    {
        try {
            $point = array_slice($request->toArray(), 7);
            $number_point = [];
            $i = 0;
            foreach ($point as $key => $value) {
                $number_point[$i]['student_code'] = $student_code;
                $number_point[$i]['number_point'] = $value;
                $number_point[$i]['subject_code'] = $key;
                $i++;
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $this->pointRepository->insert($number_point);
    }
}
