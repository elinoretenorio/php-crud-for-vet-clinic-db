<?php

declare(strict_types=1);

namespace VetClinic\Tests\Owners;

use PHPUnit\Framework\TestCase;
use VetClinic\Owners\{ OwnersDto, OwnersModel };

class OwnersModelTest extends TestCase
{
    private array $input;
    private OwnersDto $dto;
    private OwnersModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9067,
            "first_name" => "these",
            "last_name" => "training",
            "address" => "wish",
            "city" => "better",
            "telephone" => "admit",
        ];
        $this->dto = new OwnersDto($this->input);
        $this->model = new OwnersModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new OwnersModel(null);

        $this->assertInstanceOf(OwnersModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 3909;
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
        $expected = "old";
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
        $expected = "course";
        $model = $this->model;
        $model->setLastName($expected);

        $this->assertEquals($expected, $model->getLastName());
    }

    public function testGetAddress(): void
    {
        $this->assertEquals($this->dto->address, $this->model->getAddress());
    }

    public function testSetAddress(): void
    {
        $expected = "official";
        $model = $this->model;
        $model->setAddress($expected);

        $this->assertEquals($expected, $model->getAddress());
    }

    public function testGetCity(): void
    {
        $this->assertEquals($this->dto->city, $this->model->getCity());
    }

    public function testSetCity(): void
    {
        $expected = "body";
        $model = $this->model;
        $model->setCity($expected);

        $this->assertEquals($expected, $model->getCity());
    }

    public function testGetTelephone(): void
    {
        $this->assertEquals($this->dto->telephone, $this->model->getTelephone());
    }

    public function testSetTelephone(): void
    {
        $expected = "popular";
        $model = $this->model;
        $model->setTelephone($expected);

        $this->assertEquals($expected, $model->getTelephone());
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