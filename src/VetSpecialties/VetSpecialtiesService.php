<?php

declare(strict_types=1);

namespace VetClinic\VetSpecialties;

class VetSpecialtiesService implements IVetSpecialtiesService
{
    private IVetSpecialtiesRepository $repository;

    public function __construct(IVetSpecialtiesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(VetSpecialtiesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(VetSpecialtiesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?VetSpecialtiesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new VetSpecialtiesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var VetSpecialtiesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new VetSpecialtiesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?VetSpecialtiesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new VetSpecialtiesDto($row);

        return new VetSpecialtiesModel($dto);
    }
}