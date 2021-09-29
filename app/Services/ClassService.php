<?php

namespace App\Services;

use App\Repositories\Repository\Interfaces\ClassRepositoryInterface;

class ClassService
{
    protected $ClassRepository;
    public function __construct(ClassRepositoryInterface $ClassRepositoryInterface)
    {
        $this->ClassRepository = $ClassRepositoryInterface;
    }
    public function showClass()
    {
        return $this->ClassRepository->getAll();
    }
}
