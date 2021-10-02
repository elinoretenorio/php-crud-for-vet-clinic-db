<?php

declare(strict_types=1);

namespace VetClinic\Pets;

class PetsDto 
{
    public int $id;
    public string $name;
    public string $birthDate;
    public int $typeId;
    public int $ownerId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->birthDate = $row["birth_date"] ?? "";
        $this->typeId = (int) ($row["type_id"] ?? 0);
        $this->ownerId = (int) ($row["owner_id"] ?? 0);
    }
}