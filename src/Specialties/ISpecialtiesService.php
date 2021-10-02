<?php

declare(strict_types=1);

namespace VetClinic\Specialties;

interface ISpecialtiesService
{
    public function insert(SpecialtiesModel $model): int;

    public function update(SpecialtiesModel $model): int;

    public function get(int $id): ?SpecialtiesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?SpecialtiesModel;
}