<?php

declare(strict_types=1);

namespace VetClinic\Vets;

class VetsService implements IVetsService
{
    private IVetsRepository $repository;

    public function __construct(IVetsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(VetsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(VetsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?VetsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new VetsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var VetsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new VetsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?VetsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new VetsDto($row);

        return new VetsModel($dto);
    }
}