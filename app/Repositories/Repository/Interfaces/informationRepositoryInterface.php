<?php
namespace App\Repositories\Repository\Interfaces;

interface informationRepositoryInterface
{

    public function get_Information($id);
    public function my_profile($column,$student_code);
    public function admin_information();
    public function list_user();
    public function set_add($request,$id);
    public function set_update($request);
}
