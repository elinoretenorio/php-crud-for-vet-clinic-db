<?php

declare(strict_types=1);

namespace VetClinic\Vets;

interface IVetsRepository
{
    public function insert(VetsDto $dto): int;

    public function update(VetsDto $dto): int;

    public function get(int $id): ?VetsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}