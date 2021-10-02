<?php

declare(strict_types=1);

namespace VetClinic\Types;

class TypesService implements ITypesService
{
    private ITypesRepository $repository;

    public function __construct(ITypesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(TypesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(TypesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?TypesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new TypesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var TypesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new TypesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?TypesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new TypesDto($row);

        return new TypesModel($dto);
    }
}