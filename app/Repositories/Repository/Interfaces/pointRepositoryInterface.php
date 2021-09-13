<?php
namespace App\Repositories\Repository\Interfaces;

interface pointRepositoryInterface
{
    public function my_point($student_code);
    public function set_add($request,$student_code);
    public function update_point($student_code,array $attributes);
}
