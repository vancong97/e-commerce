<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function getWith($data = []);

    public function find($id);

    public function create($data = []);

    public function update($data = [], $id);

    public function delete($id);
}
?>
