<?php

namespace App\Services;

use App\Repositories\Repository\Interfaces\ClassRepositoryInterface;

class ClassService
{
    protected $classRepository;

    /**
     * ClassService constructor.
     * @param ClassRepositoryInterface $ClassRepositoryInterface
     */
    public function __construct(ClassRepositoryInterface $ClassRepositoryInterface)
    {
        $this->classRepository = $ClassRepositoryInterface;
    }

    /**
     * @return mixed
     */
    public function showClass()
    {
        return $this->classRepository->getAll();
    }
}
