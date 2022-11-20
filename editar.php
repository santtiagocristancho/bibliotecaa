<?php
include_once('conexion.php');
$id = $_GET['id'];

$query  = "SELECT * FROM libros WHERE id = $id";
$result = mysqli_query($con, $query);
$data   = mysqli_fetch_assoc($result);

//Formatea la fecha cargada desde BD
$fecha_muestra = date_format(date_create($data['fecha_muestra']), 'Y-m-d');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css//style.css">
    <title>Calidad de agua</title>
</head>

<body>

    <div class="row">
        <div class="col-4">
            <h2>Ingrese los datos actualizados de las muestras... </h2>
            <form action="guardar.php" method="POST" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">


                <label for="fecha" class="fecha">Fecha Muestra</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha_muestra; ?>" required><br>


                <br>
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo $data['titulo']; ?>" required><br><br>


                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="id_autor" id="id_autor" value="<?php echo $data['id_autor']; ?>" required><br><br>


                <label for="disponible" class="form-label">disponible</label>
                <input type="number" class="form-control" name="disponible" id="disponible" value="<?php echo $data['disponible']; ?>" min="0" max="1" required><br><br>


                <div class="">
                    <button type="submit" class="btn btn-sm btn-outline-warning">Actualizar</button><br><br>
                    <a href="./" class="btn btn-sm btn-outline-info">Regresar</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>