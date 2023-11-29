<?php
$host = "localhost";
$port = "5432";
$dbname = "texea";
$user = "postgres";
$password = "12345";

$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die("Error de conexión: " . pg_last_error());
}else{
    print("<script>console.log('conexion correcta')</script>");
}

?>
