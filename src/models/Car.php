<?php
class Car {
  public string $id;
  public string $make;
  public string $model;
  public int $year;
  public string $color;

  public function __construct(string $id, string $make, string $model, int $year, string $color) {
    $this->id = $id;
    $this->make = $make;
    $this->model = $model;
    $this->year = $year;
    $this->color = $color;
  }
}