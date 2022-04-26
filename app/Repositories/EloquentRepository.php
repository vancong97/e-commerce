<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    public function getAll()
    {
        return $this->model->orderBy('id', 'desc')->paginate(config('config.six'));
    }

    public function getWith($data = [])
    {
        return $this->model->with($data)->orderBy('id', 'desc')->get();
    }

    public function find($id)
    {
        try {
            $result = $this->model->findOrFail($id);
        } catch (\Exception $e) {

            return false;
        }

        return $result;
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function update($data = [], $id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($data);

            return $result;
        }

        return false;
    }

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

?>
