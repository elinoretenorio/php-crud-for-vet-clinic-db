<?php

declare(strict_types=1);

namespace VetClinic\Specialties;

class SpecialtiesDto 
{
    public int $id;
    public string $name;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
    }
}