<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Championship;
use Illuminate\Support\Facades\Hash;

class ChampionshipRepository implements InterfaceRepository
{
    protected Championship $championshipModel;

    public function __construct(Championship $championshipModel)
    {
        $this->championshipModel = $championshipModel;
    }

    public function getAll()
    {
        return $this->championshipModel::all();
    }

    public function getById(int $id)
    {
        return $this->championshipModel::find($id);
    }

    public function createOrUpdate( $id = null, $collection = [] )
    {
        if(is_null($id)) {
            $championship = new Championship();
            $championship->name = $collection['name'];
            $championship->logo = $collection['logo'];
            $championship->weak_off = $collection['weak_off'];
            $championship->status = $collection['status'];

            return $championship->save();
        }
        $championship = $this->championshipModel::find($id);

        $championship->name = $collection['name'];
        $championship->logo = $collection['logo'];
        $championship->weak_off = $collection['weak_off'];
        $championship->status = $collection['status'];

        return $championship->save();
    }

    public function delete(int $id)
    {
        return $this->championshipModel::find($id)->delete();
    }
}
