<?php

class CarController {
  private $cars = [];

  public function __construct() {
    // $this->cars[] = new Car('2453','Ford','Kuga',2021,'blue');
    $cars = json_decode(file_get_contents('../data/cars.json'));
    foreach($cars as $car) {
      $this->cars[] = new Car($car->id, $car->make, $car->model, $car->year, $car->color);
    }
  }

  public function list() {
    $listCars = $this->cars;
    require('../src/views/list.php');
  }

  public function show(string $id) {
    $cars = array_filter($this->cars, fn($car) => $car->id == $id);
    if(sizeof($cars) > 0) {
      $car = array_pop($cars);
      require('../src/views/show.php');
    } else {
      echo 'Car is not found!';
    }
  }
}