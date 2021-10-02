<?php

declare(strict_types=1);

namespace VetClinic\Pets;

class PetsService implements IPetsService
{
    private IPetsRepository $repository;

    public function __construct(IPetsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(PetsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(PetsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?PetsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new PetsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var PetsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new PetsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?PetsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new PetsDto($row);

        return new PetsModel($dto);
    }
}