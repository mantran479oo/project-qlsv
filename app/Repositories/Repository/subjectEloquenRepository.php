<?php
namespace App\Repositories\Repository;

use App\Models\Model_subjects;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\subjectRepositoryInterface;

class subjectEloquenRepository extends EloquentRepository implements subjectRepositoryInterface
{
    public function getModel()
    {
        return Model_subjects::class;
    }
}

