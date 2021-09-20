<?php

namespace App\Repositories\Frames;

interface RepositoryInterface
{
    public function getAll();
    public function find($id);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function delete($id);
    public function insert(array $attributes);
    public function findOrFail($id);
}