<?php

declare(strict_types=1);

namespace VetClinic\Visits;

use JsonSerializable;

class VisitsModel implements JsonSerializable
{
    private int $id;
    private int $petId;
    private string $visitDate;
    private string $description;

    public function __construct(VisitsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->petId = $dto->petId;
        $this->visitDate = $dto->visitDate;
        $this->description = $dto->description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPetId(): int
    {
        return $this->petId;
    }

    public function setPetId(int $petId): void
    {
        $this->petId = $petId;
    }

    public function getVisitDate(): string
    {
        return $this->visitDate;
    }

    public function setVisitDate(string $visitDate): void
    {
        $this->visitDate = $visitDate;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function toDto(): VisitsDto
    {
        $dto = new VisitsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->petId = (int) ($this->petId ?? 0);
        $dto->visitDate = $this->visitDate ?? "";
        $dto->description = $this->description ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "pet_id" => $this->petId,
            "visit_date" => $this->visitDate,
            "description" => $this->description,
        ];
    }
}