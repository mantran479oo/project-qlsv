<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_points extends Model
{
    use HasFactory;
    protected $table = 'points';
    protected $fillable = ['student_code','number_point','subject_code'];
   

   public function information()
   {
       return $this->hasMany(Model_informations::class, 'student_code', 'student_code');
   }
   public function subject()
   {
       return $this->hasMany(Model_subjects::class, 'subject_code', 'subject_code');
   }
}
