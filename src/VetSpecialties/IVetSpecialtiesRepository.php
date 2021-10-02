<?php

declare(strict_types=1);

namespace VetClinic\VetSpecialties;

interface IVetSpecialtiesRepository
{
    public function insert(VetSpecialtiesDto $dto): int;

    public function update(VetSpecialtiesDto $dto): int;

    public function get(int $id): ?VetSpecialtiesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}