<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_informations extends Model
{
    use HasFactory;
    protected $table = 'informations';
   protected $fillable = ['id_user','student_code','name','date','olds','hobby','gender','address','class_code'];
    public function points()
    {
        return $this->hasMany(Model_points::class,'student_code','student_code');
    }

   public function subject()
   {
       return $this->belongsToMany(Model_subjects::class, 'points','student_code', 'subject_code');
   }
     
     
}
