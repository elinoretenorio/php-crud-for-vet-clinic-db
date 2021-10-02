<?php

declare(strict_types=1);

namespace VetClinic\Tests\Pets;

use PHPUnit\Framework\TestCase;
use VetClinic\Pets\{ PetsDto, PetsModel };

class PetsModelTest extends TestCase
{
    private array $input;
    private PetsDto $dto;
    private PetsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 1647,
            "name" => "my",
            "birth_date" => "2021-10-18",
            "type_id" => 5105,
            "owner_id" => 7196,
        ];
        $this->dto = new PetsDto($this->input);
        $this->model = new PetsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new PetsModel(null);

        $this->assertInstanceOf(PetsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 6029;
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
        $expected = "present";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetBirthDate(): void
    {
        $this->assertEquals($this->dto->birthDate, $this->model->getBirthDate());
    }

    public function testSetBirthDate(): void
    {
        $expected = "2021-10-14";
        $model = $this->model;
        $model->setBirthDate($expected);

        $this->assertEquals($expected, $model->getBirthDate());
    }

    public function testGetTypeId(): void
    {
        $this->assertEquals($this->dto->typeId, $this->model->getTypeId());
    }

    public function testSetTypeId(): void
    {
        $expected = 2277;
        $model = $this->model;
        $model->setTypeId($expected);

        $this->assertEquals($expected, $model->getTypeId());
    }

    public function testGetOwnerId(): void
    {
        $this->assertEquals($this->dto->ownerId, $this->model->getOwnerId());
    }

    public function testSetOwnerId(): void
    {
        $expected = 6337;
        $model = $this->model;
        $model->setOwnerId($expected);

        $this->assertEquals($expected, $model->getOwnerId());
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