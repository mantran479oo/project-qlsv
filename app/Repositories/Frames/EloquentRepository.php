<?php

namespace App\Repositories\Frames;

use App\Repositories\Frames\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $_model;
    public function __construct()
    {
        $this->setModel();
    }

    public function setModel()
    {
        $this->_model = app()->make($this->getModel());
    }

    abstract public function getModel();

    public function getAll()
    {
        return $this->_model->all();
    }

    public function findOrFail($id)
    {
        $result = $this->_model->findOrFail($id);

        return $result;
    }

    /**
     * get product coverage
     * @param int $id
     * @return Collection
     */
    public function find($id)
    {
        $result = $this->_model->find($id);

        return $result;
    }


    /**
     * get product coverage
     * @param array $attributes
     * @return Collection
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * get product coverage
     * @param array $attributes
     * @return Collection
     */
    public function insert(array $attributes)
    {
        return $this->_model->insert($attributes);
    }

    /**
     * get product coverage
     * @param int $id
     * @param array $attributes
     * @return Collection
     */
    public function update(int $id, array $attributes)
    {
        $result = $this->findOrFail($id)->update($attributes);
        
        return $result;
    }

    /**
     * get product coverage
     * @param int $id
     * @return Collection
     */
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
