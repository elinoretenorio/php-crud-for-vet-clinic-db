<?php

declare(strict_types=1);

namespace VetClinic\Owners;

use JsonSerializable;

class OwnersModel implements JsonSerializable
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $address;
    private string $city;
    private string $telephone;

    public function __construct(OwnersDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->firstName = $dto->firstName;
        $this->lastName = $dto->lastName;
        $this->address = $dto->address;
        $this->city = $dto->city;
        $this->telephone = $dto->telephone;
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

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function toDto(): OwnersDto
    {
        $dto = new OwnersDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->firstName = $this->firstName ?? "";
        $dto->lastName = $this->lastName ?? "";
        $dto->address = $this->address ?? "";
        $dto->city = $this->city ?? "";
        $dto->telephone = $this->telephone ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "first_name" => $this->firstName,
            "last_name" => $this->lastName,
            "address" => $this->address,
            "city" => $this->city,
            "telephone" => $this->telephone,
        ];
    }
}