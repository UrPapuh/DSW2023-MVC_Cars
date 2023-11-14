<?php
namespace UrPapuh\Cars\Controllers;
use UrPapuh\Cars\Models\Car;

class CarController {

  public function __construct() {
  }

  public function list(): void {
    $listCars = Car::getAll();
    require('../src/views/list.php');
  }

  public function show(string $id): void {
    $car = Car::find($id);
    if($car) {
      require('../src/views/show.php');
    } else {
      echo 'Car is not found!';
    }
  }

  public function delete(string $id): void {
    Car::delete($id);
    $this->list();
  }

  public function create(): void {
    require('../src/views/create.php');
  }

  public function post($data): void {
    $car = new Car(
      $data['id'],
      $data['make'],
      $data['model'],
      $data['year'],
      $data['color'],
    );
    Car::create($car);
    $this->list();
  }

  public function edit(string $id): void {
    $car = Car::find($id);
    require('../src/views/edit.php');
  }

  public function update(string $id, array $data): void {
    Car::update($id, $data);
    $this->list();
  }
}