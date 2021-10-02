<?php

declare(strict_types=1);

namespace VetClinic\VetSpecialties;

use VetClinic\Database\IDatabase;
use VetClinic\Database\DatabaseException;

class VetSpecialtiesRepository implements IVetSpecialtiesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(VetSpecialtiesDto $dto): int
    {
        $sql = "INSERT INTO `vet_specialties` (`vet_id`, `specialty_id`)
                VALUES (?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->vetId,
                $dto->specialtyId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(VetSpecialtiesDto $dto): int
    {
        $sql = "UPDATE `vet_specialties` SET `vet_id` = ?, `specialty_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->vetId,
                $dto->specialtyId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?VetSpecialtiesDto
    {
        $sql = "SELECT `id`, `vet_id`, `specialty_id`
                FROM `vet_specialties` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new VetSpecialtiesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `vet_id`, `specialty_id`
                FROM `vet_specialties`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new VetSpecialtiesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `vet_specialties` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}