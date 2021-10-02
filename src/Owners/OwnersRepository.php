<?php

declare(strict_types=1);

namespace VetClinic\Owners;

use VetClinic\Database\IDatabase;
use VetClinic\Database\DatabaseException;

class OwnersRepository implements IOwnersRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(OwnersDto $dto): int
    {
        $sql = "INSERT INTO `owners` (`first_name`, `last_name`, `address`, `city`, `telephone`)
                VALUES (?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->firstName,
                $dto->lastName,
                $dto->address,
                $dto->city,
                $dto->telephone
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(OwnersDto $dto): int
    {
        $sql = "UPDATE `owners` SET `first_name` = ?, `last_name` = ?, `address` = ?, `city` = ?, `telephone` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->firstName,
                $dto->lastName,
                $dto->address,
                $dto->city,
                $dto->telephone,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?OwnersDto
    {
        $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `city`, `telephone`
                FROM `owners` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new OwnersDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `city`, `telephone`
                FROM `owners`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new OwnersDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `owners` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}