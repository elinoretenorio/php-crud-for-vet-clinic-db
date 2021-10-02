<?php

declare(strict_types=1);

namespace VetClinic\Vets;

interface IVetsService
{
    public function insert(VetsModel $model): int;

    public function update(VetsModel $model): int;

    public function get(int $id): ?VetsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?VetsModel;
}