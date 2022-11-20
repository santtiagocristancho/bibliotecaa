<?php

require_once('conexion.php');

if($_FILES['imagen']['size']>4000000){
    echo "Solo se permiten archivos menores de 4Mb";
    echo "<a href='index.php'>volver</a>";
    exit;
}
$dir ="img/";
$nombre_archivo = $_FILES['imagen']['name'];
if(!move_uploaded_file($_FILES['imagen']['tmp_name'],$dir.$nombre_archivo)){
    echo "Error en la Subida de Archivo";
    echo "<a href='index.php'>volver</a>";
    exit;
}

$tituloL = $_POST['titulo'];
$autor = $_POST['id_autor'];
$disponibilidad = $_POST['disponible'];
$cadenaSQL = "insert into libros";

if (!isset($_POST['id'])) {
    $query = "INSERT INTO libros (titulo,autor, disponible, imagen) VALUES('$tituloL', '$autor', '$disponibilidad, $nombre_archivo')";
} else {
    $query = "UPDATE libros SET titulo = '$tituloL', autor = '$autor', disponible = '$disponibilidad', imagen = '$nombre_archivo' WHERE id = {$_POST['id']}";
}
//echo $cadenaSQL;
$sql=$conex->query($cadenaSQL);
if($sql){
    echo "insercion exitosa!";

    $sql1=$conex->query("select * from ");
}
else{
    echo "error en la insercion de datos";
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