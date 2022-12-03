<?php
include_once('conexion.php');
$id = $_GET['id'];

$query  = "SELECT * FROM personas WHERE id = $id";
$result = mysqli_query($con, $query);
$data   = mysqli_fetch_assoc($result);

//Formatea la fecha cargada desde BD
$fecha_muestra = date_format(date_create($data['fecha_nacimiento']), 'Y-m-d');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="css//style.css">
    <title>editar Personas</title>
</head>

<body>

    <div class="row">
        <div class="col-4">
            <h2>Ingrese los datos actualizados de las muestras... </h2>
            <form action="guardar.php" method="POST" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <div class="mb-3 col-md-4">
                    <label for="primer_nombre" class="form-label">Primer nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder="Primer nombre" required>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="segundo_nombre" class="form-label">Segundo nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo nombre">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="primer_apellido" class="form-label">Primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido" required>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="sexo">Sexo</label>
                    <select class="form-select" id="id_sexo" name="id_sexo" required>
                        <option selected>Selecciona una opccion...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    <div class="">
                        <label for="ciudad">ciudad</label>
                        <select class="form-select " id="id_ciudad" name="id_ciudad" value="<?php echo $data['id_ciudad']; ?>">required>
                            <option selected>Seleccione una Opcion...</option>
                            <?php foreach ($ciudades as $nombre) : ?>
                                <option value="<?= $nombre['id'] ?>"><?= $nombre['nombre'] ?></option>";
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                    </div>

                    <input type="submit" class="btn btn-lg  text-light bg-dark" value="Enviar">
            </form>
        </div>


        <div class="mb-3 col-md-4">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
        </div>
        <input type="submit" value="Guardar">
        <a href="index.php">Regresar</a>
        </form>
    </div>
    </div>
    </div>
</body>

</html>