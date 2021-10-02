<?php

declare(strict_types=1);

namespace VetClinic\VetSpecialties;

interface IVetSpecialtiesService
{
    public function insert(VetSpecialtiesModel $model): int;

    public function update(VetSpecialtiesModel $model): int;

    public function get(int $id): ?VetSpecialtiesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?VetSpecialtiesModel;
}