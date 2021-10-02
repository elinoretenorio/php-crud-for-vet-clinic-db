<?php

declare(strict_types=1);

$router->get("/vets", "VetClinic\Vets\VetsController::getAll");
$router->post("/vets", "VetClinic\Vets\VetsController::insert");
$router->group("/vets", function ($router) {
    $router->get("/{id:number}", "VetClinic\Vets\VetsController::get");
    $router->post("/{id:number}", "VetClinic\Vets\VetsController::update");
    $router->delete("/{id:number}", "VetClinic\Vets\VetsController::delete");
});

$router->get("/specialties", "VetClinic\Specialties\SpecialtiesController::getAll");
$router->post("/specialties", "VetClinic\Specialties\SpecialtiesController::insert");
$router->group("/specialties", function ($router) {
    $router->get("/{id:number}", "VetClinic\Specialties\SpecialtiesController::get");
    $router->post("/{id:number}", "VetClinic\Specialties\SpecialtiesController::update");
    $router->delete("/{id:number}", "VetClinic\Specialties\SpecialtiesController::delete");
});

$router->get("/vet-specialties", "VetClinic\VetSpecialties\VetSpecialtiesController::getAll");
$router->post("/vet-specialties", "VetClinic\VetSpecialties\VetSpecialtiesController::insert");
$router->group("/vet-specialties", function ($router) {
    $router->get("/{id:number}", "VetClinic\VetSpecialties\VetSpecialtiesController::get");
    $router->post("/{id:number}", "VetClinic\VetSpecialties\VetSpecialtiesController::update");
    $router->delete("/{id:number}", "VetClinic\VetSpecialties\VetSpecialtiesController::delete");
});

$router->get("/types", "VetClinic\Types\TypesController::getAll");
$router->post("/types", "VetClinic\Types\TypesController::insert");
$router->group("/types", function ($router) {
    $router->get("/{id:number}", "VetClinic\Types\TypesController::get");
    $router->post("/{id:number}", "VetClinic\Types\TypesController::update");
    $router->delete("/{id:number}", "VetClinic\Types\TypesController::delete");
});

$router->get("/owners", "VetClinic\Owners\OwnersController::getAll");
$router->post("/owners", "VetClinic\Owners\OwnersController::insert");
$router->group("/owners", function ($router) {
    $router->get("/{id:number}", "VetClinic\Owners\OwnersController::get");
    $router->post("/{id:number}", "VetClinic\Owners\OwnersController::update");
    $router->delete("/{id:number}", "VetClinic\Owners\OwnersController::delete");
});

$router->get("/pets", "VetClinic\Pets\PetsController::getAll");
$router->post("/pets", "VetClinic\Pets\PetsController::insert");
$router->group("/pets", function ($router) {
    $router->get("/{id:number}", "VetClinic\Pets\PetsController::get");
    $router->post("/{id:number}", "VetClinic\Pets\PetsController::update");
    $router->delete("/{id:number}", "VetClinic\Pets\PetsController::delete");
});

$router->get("/visits", "VetClinic\Visits\VisitsController::getAll");
$router->post("/visits", "VetClinic\Visits\VisitsController::insert");
$router->group("/visits", function ($router) {
    $router->get("/{id:number}", "VetClinic\Visits\VisitsController::get");
    $router->post("/{id:number}", "VetClinic\Visits\VisitsController::update");
    $router->delete("/{id:number}", "VetClinic\Visits\VisitsController::delete");
});

