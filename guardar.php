<?php

require_once('conexion.php');


$tituloL = $_POST['titulo'];
$autor = $_POST['id_autor'];
$disponibilidad = $_POST['disponible'];


if (!isset($_POST['id'])) {
    $query = "INSERT INTO libros (titulo,autor, disponible) VALUES('$tituloL', '$autor', '$disponibilidad,)";
} else {
    $query = "UPDATE libros SET titulo = '$tituloL', autor = '$autor', disponible = '$disponibilidad', WHERE id = {$_POST['id']}";
}

$result = mysqli_query($con, $query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css//style.css">
    <title>Biblioteca</title>
</head>

<body>

    <input type="button" value="Regresar" onclick="location.href='index.php'">
  
</body>

</html>