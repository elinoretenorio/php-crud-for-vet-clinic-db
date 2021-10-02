<?php

declare(strict_types=1);

namespace VetClinic\Pets;

use JsonSerializable;

class PetsModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $birthDate;
    private int $typeId;
    private int $ownerId;

    public function __construct(PetsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->birthDate = $dto->birthDate;
        $this->typeId = $dto->typeId;
        $this->ownerId = $dto->ownerId;
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

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    public function toDto(): PetsDto
    {
        $dto = new PetsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->birthDate = $this->birthDate ?? "";
        $dto->typeId = (int) ($this->typeId ?? 0);
        $dto->ownerId = (int) ($this->ownerId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "birth_date" => $this->birthDate,
            "type_id" => $this->typeId,
            "owner_id" => $this->ownerId,
        ];
    }
}