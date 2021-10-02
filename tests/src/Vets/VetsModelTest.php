<?php

declare(strict_types=1);

namespace VetClinic\Tests\Vets;

use PHPUnit\Framework\TestCase;
use VetClinic\Vets\{ VetsDto, VetsModel };

class VetsModelTest extends TestCase
{
    private array $input;
    private VetsDto $dto;
    private VetsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3395,
            "first_name" => "require",
            "last_name" => "reason",
        ];
        $this->dto = new VetsDto($this->input);
        $this->model = new VetsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new VetsModel(null);

        $this->assertInstanceOf(VetsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1074;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals($this->dto->firstName, $this->model->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $expected = "woman";
        $model = $this->model;
        $model->setFirstName($expected);

        $this->assertEquals($expected, $model->getFirstName());
    }

    public function testGetLastName(): void
    {
        $this->assertEquals($this->dto->lastName, $this->model->getLastName());
    }

    public function testSetLastName(): void
    {
        $expected = "blood";
        $model = $this->model;
        $model->setLastName($expected);

        $this->assertEquals($expected, $model->getLastName());
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