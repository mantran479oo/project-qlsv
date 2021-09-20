<?php

namespace App\Repositories\Repository\Interfaces;

interface UserRepositoryInterface
{

    public function postUser($request);
    public function post_login($request);
}
