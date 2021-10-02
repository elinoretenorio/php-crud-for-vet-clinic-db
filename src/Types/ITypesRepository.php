<?php

declare(strict_types=1);

namespace VetClinic\Types;

interface ITypesRepository
{
    public function insert(TypesDto $dto): int;

    public function update(TypesDto $dto): int;

    public function get(int $id): ?TypesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}