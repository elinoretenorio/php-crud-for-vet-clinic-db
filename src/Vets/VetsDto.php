<?php

declare(strict_types=1);

namespace VetClinic\Vets;

class VetsDto 
{
    public int $id;
    public string $firstName;
    public string $lastName;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->firstName = $row["first_name"] ?? "";
        $this->lastName = $row["last_name"] ?? "";
    }
}