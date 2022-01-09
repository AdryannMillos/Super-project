<?php
namespace App\Repository;

interface InterfaceRepository
{
    public function getAll();

    public function getById(int $id);

    public function createOrUpdate( $request = [], $id = null);

    public function delete(int $id);
}
