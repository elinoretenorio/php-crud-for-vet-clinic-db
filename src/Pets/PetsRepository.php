<?php

declare(strict_types=1);

namespace VetClinic\Pets;

use VetClinic\Database\IDatabase;
use VetClinic\Database\DatabaseException;

class PetsRepository implements IPetsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(PetsDto $dto): int
    {
        $sql = "INSERT INTO `pets` (`name`, `birth_date`, `type_id`, `owner_id`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->birthDate,
                $dto->typeId,
                $dto->ownerId
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(PetsDto $dto): int
    {
        $sql = "UPDATE `pets` SET `name` = ?, `birth_date` = ?, `type_id` = ?, `owner_id` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->birthDate,
                $dto->typeId,
                $dto->ownerId,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?PetsDto
    {
        $sql = "SELECT `id`, `name`, `birth_date`, `type_id`, `owner_id`
                FROM `pets` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new PetsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `birth_date`, `type_id`, `owner_id`
                FROM `pets`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new PetsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `pets` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}