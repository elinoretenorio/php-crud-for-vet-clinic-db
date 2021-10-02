<?php

declare(strict_types=1);

namespace VetClinic\Owners;

interface IOwnersService
{
    public function insert(OwnersModel $model): int;

    public function update(OwnersModel $model): int;

    public function get(int $id): ?OwnersModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?OwnersModel;
}