<?php

declare(strict_types=1);

namespace VetClinic\Tests\Visits;

use PHPUnit\Framework\TestCase;
use VetClinic\Visits\{ VisitsDto, VisitsModel };

class VisitsModelTest extends TestCase
{
    private array $input;
    private VisitsDto $dto;
    private VisitsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 8712,
            "pet_id" => 100,
            "visit_date" => "2021-10-18",
            "description" => "over",
        ];
        $this->dto = new VisitsDto($this->input);
        $this->model = new VisitsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new VisitsModel(null);

        $this->assertInstanceOf(VisitsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9938;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetPetId(): void
    {
        $this->assertEquals($this->dto->petId, $this->model->getPetId());
    }

    public function testSetPetId(): void
    {
        $expected = 896;
        $model = $this->model;
        $model->setPetId($expected);

        $this->assertEquals($expected, $model->getPetId());
    }

    public function testGetVisitDate(): void
    {
        $this->assertEquals($this->dto->visitDate, $this->model->getVisitDate());
    }

    public function testSetVisitDate(): void
    {
        $expected = "2021-10-14";
        $model = $this->model;
        $model->setVisitDate($expected);

        $this->assertEquals($expected, $model->getVisitDate());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "enter";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
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