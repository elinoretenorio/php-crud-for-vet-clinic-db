<?php

declare(strict_types=1);

namespace VetClinic\Owners;

interface IOwnersRepository
{
    public function insert(OwnersDto $dto): int;

    public function update(OwnersDto $dto): int;

    public function get(int $id): ?OwnersDto;

    public function getAll(): array;

    public function delete(int $id): int;
}