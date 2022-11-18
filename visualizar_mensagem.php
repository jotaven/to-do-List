<?php
include('lib/conectar.php');
include('lib/protecao.php');
protecao(1);

$id = $_GET['id'];

$sql_code = "SELECT * FROM mensagens WHERE id = '$id'";
$sql_query = $mysqli->query($sql_code);
$mensagem = $sql_query->fetch_assoc();

?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="template/css/view.css">

<div>
    <h1><?php echo $mensagem['assunto'] ?></h3>
    <p><?php echo $mensagem['email'] ?></p>
    <p>Nome: <?php echo $mensagem['nome'] ?></p><br><br>
    <p><?php echo $mensagem['mensagem'] ?></p>
    
</div>