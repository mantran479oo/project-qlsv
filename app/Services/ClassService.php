<?php

namespace App\Services;

use App\Repositories\Repository\Interfaces\ClassRepositoryInterface;

class ClassService
{
    protected $ClassRepository;

    /**
     * ClassService constructor.
     * @param ClassRepositoryInterface $ClassRepositoryInterface
     */
    public function __construct(ClassRepositoryInterface $ClassRepositoryInterface)
    {
        $this->ClassRepository = $ClassRepositoryInterface;
    }

    /**
     * @return mixed
     */
    public function showClass()
    {
        return $this->ClassRepository->getAll();
    }
}
