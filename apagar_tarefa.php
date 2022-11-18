<?php

include("lib/conectar.php");
include('lib/protecao.php');
protecao(0);
$id = intval($_GET['id']);

$mysql_query = $mysqli->query("DELETE FROM tarefas WHERE id = '$id'") or die($mysqli->error);

header('Location: index.php?pg=gerenciar_tarefas');



