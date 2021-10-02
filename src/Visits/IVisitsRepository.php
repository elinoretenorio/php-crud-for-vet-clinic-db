<?php

declare(strict_types=1);

namespace VetClinic\Visits;

interface IVisitsRepository
{
    public function insert(VisitsDto $dto): int;

    public function update(VisitsDto $dto): int;

    public function get(int $id): ?VisitsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}