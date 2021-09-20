<?php

namespace App\Repositories\Repository\Interfaces;

interface PointRepositoryInterface
{
    public function postScore($request, int $student_code);
    public function updatePoint(int $number_point);
}
