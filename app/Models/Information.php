<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    //Connection table DB
    protected $table = 'informations';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['id', 'student_code', 'name', 'date', 'olds', 'hobby', 'gender', 'address', 'class_code'];

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function articleClass()
    {
        return $this->hasOne(ClassRoom::class, 'class_code', 'class_code');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function articlePoints()
    {
        return $this->hasMany(Point::class, 'student_code', 'student_code');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function articleSubject()
    {
        return $this->hasManyThrough(Subject::class, Point::class, 'student_code', 'subject_code', 'student_code', 'subject_code');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @return Collection
     */
    public function articleUser()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }
}
