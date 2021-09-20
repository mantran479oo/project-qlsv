<?php

namespace App\Repositories\Repository;

use App\Models\ClassRoom;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\ClassRepositoryInterface;

class ClassEloquenRepository extends EloquentRepository implements ClassRepositoryInterface
{
    //Connection Model 
    public function getModel()
    {
        return ClassRoom::class;
    }
}
