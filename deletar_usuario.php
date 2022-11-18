<?php

include("lib/conectar.php");
include('lib/protecao.php');
protecao(1);
$id = intval($_GET['id']);

$mysql_query = $mysqli->query("DELETE FROM usuarios WHERE id = '$id'") or die($mysqli->error);

header('Location: index.php?pg=painel_admin');



