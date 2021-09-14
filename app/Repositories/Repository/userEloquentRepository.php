<?php
namespace App\Repositories\Repository;
use App\Models\Model_users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Frames\EloquentRepository;
use App\Repositories\Repository\Interfaces\userRepositoryInterface;


class userEloquentRepository extends EloquentRepository implements userRepositoryInterface
{
    public function getModel()
    {
        return Model_users::class;
    }
    public function set_add($request){
        $value = [
            'username' => $request->username.'.'.$request->class,
            'password' => Hash::make(date('d/m/Y', strtotime($request->date))),
         ];
          $create = $this->create($value);
          return $create;
    }
    public function post_login(){
         return $user = [
            'username' => $request['username'],
            'password' => trim($request['password']),
        ];
    }
}

