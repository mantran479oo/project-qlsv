<?php

namespace App\Repositories\Repository;

use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\SubjectRepositoryInterface;

class SubjectEloquenRepository extends EloquentRepository implements SubjectRepositoryInterface
{
    //Connection Model
    public function getModel()
    {
        return Subject::class;
    }
}
