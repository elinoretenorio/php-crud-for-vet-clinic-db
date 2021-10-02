<?php

declare(strict_types=1);

namespace VetClinic\Visits;

class VisitsService implements IVisitsService
{
    private IVisitsRepository $repository;

    public function __construct(IVisitsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(VisitsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(VisitsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?VisitsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new VisitsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var VisitsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new VisitsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?VisitsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new VisitsDto($row);

        return new VisitsModel($dto);
    }
}