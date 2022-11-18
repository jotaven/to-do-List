<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database = "login";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Falha ao conectar ao banco de dados? " . $mysqli->error);
}

?>