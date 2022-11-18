<?php
include('lib/protecao.php');
protecao(0);

if (isset($_POST['tarefa'])) {
    include('lib/conectar.php');

    $userid = $_SESSION['usuario'];
    $tarefa = trim($_POST['tarefa']);

    $erro = array();
    if (empty($tarefa))
        $erro[1] = "Preencha o nome da tarefa";

    if (empty($descricao)) {
        $descricao = "";
    }


    if (count($erro) == 0) {
        $mysqli->query("INSERT INTO tarefas (userid, tarefa, descricao, situacao) VALUES(
            '$userid', 
            '$tarefa', 
            '$descricao',
            0
        )");
        header('Location: index.php?pg=gerenciar_tarefas');
    }
}
?>

<link rel="stylesheet" href="template/css/cadastrar&editar.css">
        

<div class="form-background">
    <h2>Cadastrar nova tarefa</h2>
    <form action="" method="POST">
        <div>
            <label for="email">Tarefa</label><br>
            <input type="text" name="tarefa" autocomplete="off">
        </div><?php if (isset($erro[1])) echo '<p class="erro_register">' . $erro[1] . '</p>'; ?><br>
        <input type="submit" value="Adicionar" class="login-btn">
    </form>
</div>
