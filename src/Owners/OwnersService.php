<?php

declare(strict_types=1);

namespace VetClinic\Owners;

class OwnersService implements IOwnersService
{
    private IOwnersRepository $repository;

    public function __construct(IOwnersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(OwnersModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(OwnersModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?OwnersModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new OwnersModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var OwnersDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new OwnersModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?OwnersModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new OwnersDto($row);

        return new OwnersModel($dto);
    }
}