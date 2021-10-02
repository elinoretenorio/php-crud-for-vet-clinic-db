<?php

declare(strict_types=1);

namespace VetClinic\Specialties;

class SpecialtiesService implements ISpecialtiesService
{
    private ISpecialtiesRepository $repository;

    public function __construct(ISpecialtiesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(SpecialtiesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(SpecialtiesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?SpecialtiesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new SpecialtiesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var SpecialtiesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new SpecialtiesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?SpecialtiesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new SpecialtiesDto($row);

        return new SpecialtiesModel($dto);
    }
}