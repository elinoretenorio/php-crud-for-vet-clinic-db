<?php

declare(strict_types=1);

namespace VetClinic\Visits;

interface IVisitsService
{
    public function insert(VisitsModel $model): int;

    public function update(VisitsModel $model): int;

    public function get(int $id): ?VisitsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?VisitsModel;
}