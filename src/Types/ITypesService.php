<?php

declare(strict_types=1);

namespace VetClinic\Types;

interface ITypesService
{
    public function insert(TypesModel $model): int;

    public function update(TypesModel $model): int;

    public function get(int $id): ?TypesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?TypesModel;
}