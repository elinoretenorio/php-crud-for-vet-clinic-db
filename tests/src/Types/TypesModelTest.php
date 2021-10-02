<?php

declare(strict_types=1);

namespace VetClinic\Tests\Types;

use PHPUnit\Framework\TestCase;
use VetClinic\Types\{ TypesDto, TypesModel };

class TypesModelTest extends TestCase
{
    private array $input;
    private TypesDto $dto;
    private TypesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7413,
            "name" => "best",
        ];
        $this->dto = new TypesDto($this->input);
        $this->model = new TypesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new TypesModel(null);

        $this->assertInstanceOf(TypesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4244;
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
        $expected = "stand";
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