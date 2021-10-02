<?php

declare(strict_types=1);

namespace VetClinic\VetSpecialties;

use JsonSerializable;

class VetSpecialtiesModel implements JsonSerializable
{
    private int $id;
    private int $vetId;
    private int $specialtyId;

    public function __construct(VetSpecialtiesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->vetId = $dto->vetId;
        $this->specialtyId = $dto->specialtyId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getVetId(): int
    {
        return $this->vetId;
    }

    public function setVetId(int $vetId): void
    {
        $this->vetId = $vetId;
    }

    public function getSpecialtyId(): int
    {
        return $this->specialtyId;
    }

    public function setSpecialtyId(int $specialtyId): void
    {
        $this->specialtyId = $specialtyId;
    }

    public function toDto(): VetSpecialtiesDto
    {
        $dto = new VetSpecialtiesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->vetId = (int) ($this->vetId ?? 0);
        $dto->specialtyId = (int) ($this->specialtyId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "vet_id" => $this->vetId,
            "specialty_id" => $this->specialtyId,
        ];
    }
}