<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", VetClinic\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// Vets

$container->add("VetsRepository", VetClinic\Vets\VetsRepository::class)
    ->addArgument("Database");
$container->add("VetsService", VetClinic\Vets\VetsService::class)
    ->addArgument("VetsRepository");
$container->add(VetClinic\Vets\VetsController::class)
    ->addArgument("VetsService");

// Specialties

$container->add("SpecialtiesRepository", VetClinic\Specialties\SpecialtiesRepository::class)
    ->addArgument("Database");
$container->add("SpecialtiesService", VetClinic\Specialties\SpecialtiesService::class)
    ->addArgument("SpecialtiesRepository");
$container->add(VetClinic\Specialties\SpecialtiesController::class)
    ->addArgument("SpecialtiesService");

// VetSpecialties

$container->add("VetSpecialtiesRepository", VetClinic\VetSpecialties\VetSpecialtiesRepository::class)
    ->addArgument("Database");
$container->add("VetSpecialtiesService", VetClinic\VetSpecialties\VetSpecialtiesService::class)
    ->addArgument("VetSpecialtiesRepository");
$container->add(VetClinic\VetSpecialties\VetSpecialtiesController::class)
    ->addArgument("VetSpecialtiesService");

// Types

$container->add("TypesRepository", VetClinic\Types\TypesRepository::class)
    ->addArgument("Database");
$container->add("TypesService", VetClinic\Types\TypesService::class)
    ->addArgument("TypesRepository");
$container->add(VetClinic\Types\TypesController::class)
    ->addArgument("TypesService");

// Owners

$container->add("OwnersRepository", VetClinic\Owners\OwnersRepository::class)
    ->addArgument("Database");
$container->add("OwnersService", VetClinic\Owners\OwnersService::class)
    ->addArgument("OwnersRepository");
$container->add(VetClinic\Owners\OwnersController::class)
    ->addArgument("OwnersService");

// Pets

$container->add("PetsRepository", VetClinic\Pets\PetsRepository::class)
    ->addArgument("Database");
$container->add("PetsService", VetClinic\Pets\PetsService::class)
    ->addArgument("PetsRepository");
$container->add(VetClinic\Pets\PetsController::class)
    ->addArgument("PetsService");

// Visits

$container->add("VisitsRepository", VetClinic\Visits\VisitsRepository::class)
    ->addArgument("Database");
$container->add("VisitsService", VetClinic\Visits\VisitsService::class)
    ->addArgument("VisitsRepository");
$container->add(VetClinic\Visits\VisitsController::class)
    ->addArgument("VisitsService");

