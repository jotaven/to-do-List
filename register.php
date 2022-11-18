<?php


if (isset($_POST['email']) || isset($_POST['senha'])) {
    include('lib/conectar.php');

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $senha2 = trim($_POST['senha2']);

    $sql_query = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'") or die($mysqli->error);
    $qntd = $sql_query->num_rows;

    $erro = array();
    if (empty($nome))
        $erro[1] = "Preencha o nome";

    if (empty($email))
        $erro[2] = "Preencha o e-mail";

    if ($qntd > 0) {
        $erro[3] = "E-mail já cadastrado";
    }

    if (empty($senha))
        $erro[4] = "Preencha a senha";

    if ($senha2 != $senha)
        $erro[5] = "As senhas não batem";


    if (count($erro) == 0) {
        $mysqli->query("INSERT INTO usuarios (nome, email, senha, admin) VALUES(
            '$nome', 
            '$email', 
            '$senha',
            0
        )");
        header('Location: index.php');
    }
}
?>

<link rel="stylesheet" href="template/css/login&register.css">

<div class="form-background">
    <h2>Registrar</h2>
    <form action="" method="POST">
        <div>
            <label for="email">Nome</label><br>
            <input type="text" name="nome">
        </div><?php if (isset($erro[1])) echo '<p class="erro_register">' . $erro[1] . '</p>'; ?><br>
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email">
        </div><?php if (isset($erro[2])) echo '<p class="erro_register">' . $erro[2] . '</p>'; ?><br>
        <div>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha">
        </div><?php if (isset($erro[4])) echo '<p class="erro_register">' . $erro[4] . '</p>'; ?><br>
        <div>
            <label for="senha">Repetir senha</label><br>
            <input type="password" name="senha2">
        </div><?php if (isset($erro[5])) echo '<p class="erro_register">' . $erro[5] . '</p>'; ?><br>
        <input type="submit" value="Registrar" class="login-btn">
        <a href="?pg=login" class="register-btn">Logar</a>
        <?php if (isset($erro[3])) echo '<p class="erro_register">' . $erro[3] . '</p>'; ?>
    </form>
</div>