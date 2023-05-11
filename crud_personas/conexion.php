<?php
$hostname   = "localhost";
$user       = "root";
$password   = "root";
$database   = "crud";

try {
    $con = mysqli_connect($hostname, $user, $password, $database);
} catch (\Throwable $th) {
    print $e->Message();
}