<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    //Connection table DB
    protected $table = 'points';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['student_code', 'number_point', 'subject_code'];

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function information()
    {
        return $this->hasMany(Information::class, 'student_code', 'student_code');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function subject()
    {
        return $this->hasMany(Subject::class, 'subject_code', 'subject_code');
    }
}
