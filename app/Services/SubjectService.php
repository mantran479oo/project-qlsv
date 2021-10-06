<?php

namespace App\Services;

use App\Models\Subject;
use App\Repositories\Repository\Interfaces\SubjectRepositoryInterface;

class SubjectService
{
    protected $SubjectRepository;

    /**
     * SubjectService constructor.
     * @param SubjectRepositoryInterface $SubjectRepositoryInterface
     */
    public function __construct(SubjectRepositoryInterface $SubjectRepositoryInterface)
    {
        $this->subjectRepository = $SubjectRepositoryInterface;
    }

    /**
     * @return mixed
     */
    public function showSubject(){
        return $this->subjectRepository->getAll();
    }
}
