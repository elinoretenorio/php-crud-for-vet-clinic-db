<?php

declare(strict_types=1);

namespace VetClinic\Tests\VetSpecialties;

use PHPUnit\Framework\TestCase;
use VetClinic\VetSpecialties\{ VetSpecialtiesDto, VetSpecialtiesModel };

class VetSpecialtiesModelTest extends TestCase
{
    private array $input;
    private VetSpecialtiesDto $dto;
    private VetSpecialtiesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4222,
            "vet_id" => 3306,
            "specialty_id" => 8735,
        ];
        $this->dto = new VetSpecialtiesDto($this->input);
        $this->model = new VetSpecialtiesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new VetSpecialtiesModel(null);

        $this->assertInstanceOf(VetSpecialtiesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 7294;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetVetId(): void
    {
        $this->assertEquals($this->dto->vetId, $this->model->getVetId());
    }

    public function testSetVetId(): void
    {
        $expected = 6941;
        $model = $this->model;
        $model->setVetId($expected);

        $this->assertEquals($expected, $model->getVetId());
    }

    public function testGetSpecialtyId(): void
    {
        $this->assertEquals($this->dto->specialtyId, $this->model->getSpecialtyId());
    }

    public function testSetSpecialtyId(): void
    {
        $expected = 4715;
        $model = $this->model;
        $model->setSpecialtyId($expected);

        $this->assertEquals($expected, $model->getSpecialtyId());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}