<?php

declare(strict_types=1);

namespace VetClinic\Vets;

use JsonSerializable;

class VetsModel implements JsonSerializable
{
    private int $id;
    private string $firstName;
    private string $lastName;

    public function __construct(VetsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->firstName = $dto->firstName;
        $this->lastName = $dto->lastName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function toDto(): VetsDto
    {
        $dto = new VetsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->firstName = $this->firstName ?? "";
        $dto->lastName = $this->lastName ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
        ];
    }
}