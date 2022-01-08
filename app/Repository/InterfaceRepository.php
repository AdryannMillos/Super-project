<?php
namespace App\Repository;

interface InterfaceRepository
{
    public function getAll();

    public function getById(int $id);

    public function createOrUpdate( $id = null, $collection = [] );

    public function delete(int $id);
}
