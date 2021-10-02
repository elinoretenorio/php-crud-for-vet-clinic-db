<?php

declare(strict_types=1);

namespace VetClinic\Owners;

class OwnersDto 
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $address;
    public string $city;
    public string $telephone;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->firstName = $row["first_name"] ?? "";
        $this->lastName = $row["last_name"] ?? "";
        $this->address = $row["address"] ?? "";
        $this->city = $row["city"] ?? "";
        $this->telephone = $row["telephone"] ?? "";
    }
}