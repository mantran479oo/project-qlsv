<?php

namespace App\Repositories\Repository;

use App\Models\User;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\UserRepositoryInterface;


class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
    //Connection Model
    public function getModel()
    {
        return User::class;
    }

    /**
     * get product coverage
     * @param mixed $request
     * @return array
     */
    public function postUser($request)
    {
        return $value = [
            'username' => $request->name . '.' . $request->class_code,
            'password' => trim($request->date),
        ];
    }

    /**
     * get product coverage
     * @param mixed $request
     * @return array
     */
    public function post_login($request)
    {
        return $user = [
            'username' => $request['username'],
            'password' => trim($request['password']),
        ];
    }
}
