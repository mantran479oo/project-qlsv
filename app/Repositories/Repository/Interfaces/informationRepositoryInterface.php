<?php

namespace App\Repositories\Repository\Interfaces;

interface InformationRepositoryInterface
{
    public function listInformation();
    public function myProfile(int $id);
    public function postInformation($request, int $id, int $student_code);
}
