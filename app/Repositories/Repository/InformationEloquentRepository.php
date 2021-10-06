<?php

namespace App\Repositories\Repository;

use App\Models\Information;
use Illuminate\Support\Carbon;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\InformationRepositoryInterface;

class InformationEloquentRepository extends EloquentRepository implements InformationRepositoryInterface
{
    //Connection Model
    public function getModel()
    {
        return Information::class;
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function myProfile(int $id)
    {
        $student_code = $this->find($id)->student_code;

        return $this->_model::where('student_code', $student_code)->with('articleClass', 'articlePoints', 'articleSubject')->get();
    }

    /**
     * get product coverage
     * @return Collection
     */
    public function listInformation()
    {
        return $this->_model::with('articleClass', 'articlePoints')->get();
    }


}
