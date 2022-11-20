<?php
require_once("conexion.php");

$query = "SELECT * FROM libros";
$result = mysqli_query($con, $query);
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
    <div class="container1">
        <h2 class="">BIBLIOTECA VIRTUAL</h2>
    </div>

    <img src="img//libro.jpg">

    <form action="guardar.php" method="POST" enctype="multipart/form-data" autocomplete="off">

        <label for="titulo" class="form-label">Titulo del Libro</label>
        <input type="text" class="form-control" name="titulo" id="titulo" required>

        <br><br>

        <label for="autor" class="form-label">Autor del Libro</label>
        <input type="text" class="form-control" name="autor" id="id_autor" required>

        <br><br>

        <label for="disponible" class="form-label">Disponible</label>
        <input type="number" class="form-control" name="disponible" id="disponible" min="0" max="1" required>

        <br><br>

        <button type="submit" class="btn btn-sm btn-outline-primary bg-white">Enviar</button>

        <div class="container2">
            <!-- Tabla -->

            <h4>Registro De Libros Escogidos</h4>
            <table class="">
                <thead>
                    <tr class="">
                        <td>Toma #</td>
                        <td>Fecha</td>

                        <td>Titulo Libro</td>

                        <td>Autor del Libro</td>

                        <td>Estado</td>
                        <td colspan="2">Opciones</td>
                    </tr>
                </thead>

                <tbody class="">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $pos        = 1;
                        $datos   = 0;

                        while ($data = mysqli_fetch_assoc($result)) {
                            //   $muestras = [$data['titulo'], $data['autor'], $data['disponible']];
                            $fecha_muestra = date_format(date_create($data['fecha_muestra']), 'd-m-Y');
                    ?>
                            <tr>
                                <td><?php echo $pos; ?></td>
                                <td><?php echo $fecha_muestra; ?></td>
                                <td><?php echo $data['titulo']; ?></td>
                                <td><?php echo $data['id_autor']; ?></td>
                                <td><?php echo $data['disponible']; ?></td>


                                <td><a href="editar.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-outline-warning">Editar</a></td>
                                <td><a href="eliminar.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-outline-danger" value="">Eliminar</a></td>
                            </tr>
                        <?php $pos++;
                        }
                    } else { ?>
                        <tr>
                            <td colspan="9">No hay datos</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


    </form>
</body>

</html>