<?php

declare(strict_types=1);

namespace VetClinic\Visits;

use VetClinic\Database\IDatabase;
use VetClinic\Database\DatabaseException;

class VisitsRepository implements IVisitsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(VisitsDto $dto): int
    {
        $sql = "INSERT INTO `visits` (`pet_id`, `visit_date`, `description`)
                VALUES (?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->petId,
                $dto->visitDate,
                $dto->description
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(VisitsDto $dto): int
    {
        $sql = "UPDATE `visits` SET `pet_id` = ?, `visit_date` = ?, `description` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->petId,
                $dto->visitDate,
                $dto->description,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?VisitsDto
    {
        $sql = "SELECT `id`, `pet_id`, `visit_date`, `description`
                FROM `visits` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new VisitsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `pet_id`, `visit_date`, `description`
                FROM `visits`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new VisitsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `visits` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}