<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Repositories\Repository\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $UserRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $UserRepositoryInterface
     */
    public function __construct(UserRepositoryInterface $UserRepositoryInterface)
    {
        $this->UserRepository = $UserRepositoryInterface;
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function postUser($request)
    {
        try {
            $value = [
                'username' => $request->name . '.' . $request->class_code,
                'password' => trim($request->date),
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return $this->UserRepository->create($value);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->UserRepository->delete($id);
    }

    public function update($id , $request)
    {
       return $this->UserRepository->update($id,$request);
    }
}
