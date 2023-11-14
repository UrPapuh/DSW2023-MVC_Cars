<h1>Editando el coche con id: <?=$id?></h1>
<form action="index.php?id=<?=$id?>&action=update" method="post">
  <p>
    <label for="make">Make</label>
    <input type="text" name="make" value="<?=$car->make?>">
  </p>
  <p>
    <label for="model">Model</label>
    <input type="text" name="model" value="<?=$car->model?>">
  </p>
  <p>
    <label for="year">Year</label>
    <input type="text" name="year" value="<?=$car->year?>">
  </p>
  <p>
    <label for="color">Color</label>
    <input type="color" name="color" value="<?=$car->color?>">
  </p>
  <p>
    <input type="submit" value="Actualizar">
  </p>
</form>