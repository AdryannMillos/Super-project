<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Championship;
use Illuminate\Database\Eloquent\Collection;

final class ChampionshipRepository implements InterfaceRepository
{
    protected Championship $championshipModel;

    public function __construct(Championship $championshipModel)
    {
        $this->championshipModel = $championshipModel;
    }

    public function getAll() : Collection
    {
        return $this->championshipModel::all();
    }

    public function getById(int $id)
    {
        return $this->championshipModel::find($id);
    }

    public function createOrUpdate($request = [], $id = null): bool
    {
        if(is_null($id)) {
            $championship = new Championship();
            $championship->name = $request['name'];
            $championship->logo = $request['logo'];
            $championship->weak_off = $request['weak_off'];
            $championship->status = $request['status'];

            return $championship->save();
        }
        $championship = $this->championshipModel::find($id);

        $championship->name = $request['name'];
        $championship->logo = $request['logo'];
        $championship->weak_off = $request['weak_off'];
        $championship->status = $request['status'];

        return $championship->save();
    }

    public function delete(int $id)
    {
        return $this->championshipModel::find($id)->delete();
    }
}
