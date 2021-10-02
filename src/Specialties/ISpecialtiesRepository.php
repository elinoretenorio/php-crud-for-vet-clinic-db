<?php

declare(strict_types=1);

namespace VetClinic\Specialties;

interface ISpecialtiesRepository
{
    public function insert(SpecialtiesDto $dto): int;

    public function update(SpecialtiesDto $dto): int;

    public function get(int $id): ?SpecialtiesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}