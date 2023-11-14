<?php
namespace UrPapuh\Cars\Models;

class Car {
  private static string $dataFile = '../data/cars.json';

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

  public static function getAll(): array {
    $cars = [];
    $data = json_decode(file_get_contents(self::$dataFile));
    foreach($data as $car) {
      $cars[] = new Car($car->id, $car->make, $car->model, $car->year, $car->color);
    }
    return $cars;
  }

  public static function find(string $id): Car {
    $coincidences = array_filter(self::getAll(), fn($car) => $car->id == $id);
    if (sizeof($coincidences) > 0) { return array_pop($coincidences); } // Primera coincidencia
    return null;
  }

  public static function delete(string $id): void {
    $cars = [];
    foreach(self::getAll() as $car) {
      if ($car->id != $id) {
        $cars[] = $car;
      }
    }
    self::save($cars);
  }
  
  public static function create(Car $car): void {
    $cars = self::getAll();
    $cars[] = $car;
    self::save($cars);
  }

  public static function update(string $id, array $data): void {
    $cars = self::getAll();
    foreach ($cars as $car) {
      if ($car->id == $id) {
        $car->make = $data['make'];
        $car->model = $data['model'];
        $car->year = $data['year'];
        $car->color = $data['color'];
      }
      self::save($cars);
    }
  }

  /**
   * Volcado al JSON (self::$dataFile)
   */
  private static function save($data): void {
    $jsonString = json_encode($data, JSON_PRETTY_PRINT);
    // $file = fopen(self::$dataFile, 'w');
    // fwrite($file, $jsonString);
    // fclose($file);
    file_put_contents(self::$dataFile, $jsonString);
  }
}