<?php

namespace App\Services;

use App\Repositories\Repository\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $UserRepository;
    public function __construct(UserRepositoryInterface $UserRepositoryInterface)
    {
        $this->UserRepository = $UserRepositoryInterface;
    }
    public function postUser($request)
    {
        $value = [
            'username' => $request->name . '.' . $request->class_code,
            'password' => trim($request->date),
        ];
        return $this->UserRepository->create($value);
    }

    /**
     * get product coverage
     * @param int $id  
     * @return  array
     */
    public function delete($id)
    {
        return $this->UserRepository->delete($id);
    }
}
