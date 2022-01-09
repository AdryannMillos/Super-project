<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\ChampionshipRepository;
use Illuminate\Database\Eloquent\Collection;


final class ChampionshipService
{
    private ChampionshipRepository $championshipRepository;

    public function __construct(ChampionshipRepository $championshipRepository)
    {
        $this->championshipRepository = $championshipRepository;
    }

    public function getAll(): Collection
    {
        return $this->championshipRepository->getAll();
    }

    public function create(array $request): bool
    {
        return $this->championshipRepository->createOrUpdate($request);
    }

    public function find(int $id)
    {
        return $this->championshipRepository->getById($id);
    }

    public function update(array $request, int $id): bool
    {
        return $this->championshipRepository->createOrUpdate($request, $id);
    }

    public function delete(int $id)
    {
        return $this->championshipRepository->delete($id);
    }

}
