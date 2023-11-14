<?php
  require_once('../vendor/autoload.php');
  use UrPapuh\Cars\Controllers\CarController;
  use UrPapuh\Cars\Models\Car;

  // require_once('../src/models/Car.php');
  // require_once('../src/controllers/CarController.php');
  // require_once('../src/views/CarView.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Practica MVC</title>
  <style>
    #encabezado {
      text-align: center;
    }
    table,tr,td,th{
      border: 1px solid black;
      border-collapse: collapse;
      padding: 5px;
    }
  </style>
</head>
<body>
  <h1 id="encabezado">Coches</h1>
<?php
  $table = isset($_GET['table']) ? $_GET['table']:'car';
  $action = isset($_GET['action']) ? $_GET['action']:'list';
  $id = isset($_GET['id']) ? $_GET['id']:null;

  $controller = null;
  switch ($table) {
    case 'car':
      $controller = new CarController();
      break;
  }

  switch ($action) {
    case 'list':
      $controller->list();
      break;
    case 'show':
      $controller->show($id);
      break;
    case 'delete':
      $controller->delete($id);
      break;
    case 'create':
      $controller->create();
      break;
    case 'post':
      $controller->post($_POST);
      break;
    case 'edit':
      $controller->edit($id);
      break;
    case 'update':
      $controller->update($id, $_POST);
      break;
  }

  // $controller = new CarController();
  // $car = new Car('1234','ford','levitar','2008','Blue');
  // if (isset($_GET['id'])) {
  //   $id = $_GET['id'];
  //   if (isset($_GET['action'])) {
  //     $action = $_GET['action'];
  //     if ($action == 'delete') {
  //       $controller->delete($id);
  //     }
  //   } else {
  //     $controller->show($id);
  //   }
  // } else {
  //   $controller->list();
  // }
  // $controller->create($car);
?>
</body>
</html>