<?php

namespace App\Services;

use App\Models\Subject;
use App\Repositories\Repository\Interfaces\SubjectRepositoryInterface;

class SubjectService
{
    protected $SubjectRepository;
    public function __construct( SubjectRepositoryInterface $SubjectRepositoryInterface)
    {
        $this->SubjectRepository = $SubjectRepositoryInterface;
    }
    public function showSubject(){
        return $this->SubjectRepository->getAll();
    }
}
