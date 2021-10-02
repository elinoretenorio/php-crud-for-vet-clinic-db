<?php

declare(strict_types=1);

namespace VetClinic\VetSpecialties;

class VetSpecialtiesDto 
{
    public int $id;
    public int $vetId;
    public int $specialtyId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->vetId = (int) ($row["vet_id"] ?? 0);
        $this->specialtyId = (int) ($row["specialty_id"] ?? 0);
    }
}