<?php
include('lib/conectar.php');
include('lib/protecao.php');
protecao(0);

$userid = $_SESSION['usuario'];

$sql_usuarios = "SELECT * FROM tarefas WHERE userid = '$userid'";
$sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_usuarios = $sql_query->num_rows;


?>

<link rel="stylesheet" href="template/css/checklist.css">

<div class="list">
    <form action="" method="post">
        <h1>Minha lista</h1>

        <?php if ($num_usuarios == 0) { ?>
            <span style="color: red;">Nenhuma tarefa!</span>
            <?php } else {
            while ($tarefa = $sql_query->fetch_assoc()) { ?>
                <label>
                    <a href="?pg=apagar_tarefa&id=<?php echo $tarefa['id'] ?>">
                        <input type="checkbox">
                        <i></i>
                        <span><?php echo $tarefa['tarefa'] ?></span>
                    </a>
                </label>
        <?php }
        } ?>
        <a href="?pg=cadastrar_tarefa"><label>Adicionar tarefa</label></a>
    </form>
</div>