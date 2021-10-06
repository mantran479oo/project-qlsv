<?php

namespace App\Repositories\Repository;

use App\Models\Subject;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\SubjectRepositoryInterface;

class SubjectEloquenRepository extends EloquentRepository implements SubjectRepositoryInterface
{

    /**
     * @return string
     */
    public function getModel()
    {
        return Subject::class;
    }
}
