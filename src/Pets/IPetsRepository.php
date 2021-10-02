<?php

declare(strict_types=1);

namespace VetClinic\Pets;

interface IPetsRepository
{
    public function insert(PetsDto $dto): int;

    public function update(PetsDto $dto): int;

    public function get(int $id): ?PetsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}