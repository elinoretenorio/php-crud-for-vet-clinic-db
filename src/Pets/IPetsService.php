<?php

declare(strict_types=1);

namespace VetClinic\Pets;

interface IPetsService
{
    public function insert(PetsModel $model): int;

    public function update(PetsModel $model): int;

    public function get(int $id): ?PetsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?PetsModel;
}