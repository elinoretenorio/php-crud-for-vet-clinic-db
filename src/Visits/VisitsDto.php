<?php

declare(strict_types=1);

namespace VetClinic\Visits;

class VisitsDto 
{
    public int $id;
    public int $petId;
    public string $visitDate;
    public string $description;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->petId = (int) ($row["pet_id"] ?? 0);
        $this->visitDate = $row["visit_date"] ?? "";
        $this->description = $row["description"] ?? "";
    }
}