<?php

declare(strict_types=1);

namespace VetClinic\Tests\Specialties;

use PHPUnit\Framework\TestCase;
use VetClinic\Specialties\{ SpecialtiesDto, SpecialtiesModel };

class SpecialtiesModelTest extends TestCase
{
    private array $input;
    private SpecialtiesDto $dto;
    private SpecialtiesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2050,
            "name" => "class",
        ];
        $this->dto = new SpecialtiesDto($this->input);
        $this->model = new SpecialtiesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new SpecialtiesModel(null);

        $this->assertInstanceOf(SpecialtiesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4564;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "laugh";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
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