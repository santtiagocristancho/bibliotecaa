<?php

require_once("conexion.php");

$id = $_GET['id'];

$query  = "DELETE FROM personas WHERE id = $id";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css//style.css">
    <title>ELIMINAR PERSONAS</title>
</head>

<body class="mt-3">
    <div class="container">

        <?php if ($result) { ?>
            <p class="fs-4 text-success">Registro Eliminado</p>
        <?php } else { ?>
            <p class="fs-4 text-danger">Registro no Eliminado</p>
        <?php } ?>

    </div>
    <div class="row">
        <div class="col">
            <a href="./" class="btn btn-sm btn-outline-primary">Regresar</a>
        </div>
    </div>
    </div>
</body>

</html>