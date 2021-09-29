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
     * @param int $number_point
     * @return array
     */
    public function updatePoint($number_point)
    {
        return ['number_point' => $number_point];
    }
}
