<?php
namespace App\Repositories\Repository;
use App\Models\Model_class;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\classRepositoryInterface;

class classEloquenRepository extends EloquentRepository implements classRepositoryInterface
{
    public function getModel()
    {
        return Model_class::class;
    }
}

