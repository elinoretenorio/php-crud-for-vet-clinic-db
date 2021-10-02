<?php

declare(strict_types=1);

namespace VetClinic\Types;

use JsonSerializable;

class TypesModel implements JsonSerializable
{
    private int $id;
    private string $name;

    public function __construct(TypesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function toDto(): TypesDto
    {
        $dto = new TypesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
        ];
    }
}