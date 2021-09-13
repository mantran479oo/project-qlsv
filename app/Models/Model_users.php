<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['username','password'];

    public function informations()
    {
        return $this->hasOne(Model_informations::class,'id_user');
    }


    
  // public function point(){
  //       return $this->belongsToMany(Model_points::class, 'informations','student_code', 'id_user');
  //           }
  //   public function subject(){
  //       return $this->belongsToMany(Model_subjects::class, 'points', 'id_user', 'id_subject');
  //   }
  //   public function class(){
  //       return $this->hasOne(Model_class::class, 'id');
  //   }
 }
