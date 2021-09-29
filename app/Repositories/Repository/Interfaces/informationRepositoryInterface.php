<?php

namespace App\Repositories\Repository\Interfaces;

interface InformationRepositoryInterface
{
    public function listInformation();
    public function myProfile(int $id);
}
