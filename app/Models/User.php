<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //Connection table DB
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['username', 'password'];

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function informations()
    {
        return $this->hasOne(Information::class, 'id_user');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] =  Hash::make(date('d/m/Y', strtotime($value)));
    }
}
