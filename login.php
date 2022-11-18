<?php

include('lib/conectar.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    $erro = array();
    if (strlen($_POST['email']) == 0) {
        $erro[1] = 'Preencha seu email';
    }

    if (strlen($_POST['senha']) == 0) {
        $erro[2] = 'Preencha sua senha';
    }

    if (count($erro) == 0) {
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['admin'] = $usuario['admin'];

            header('Location: /mini-projeto/');
        } else {
            $erro[3] = 'Falha ao logar! E-mail ou senha incorretos';
        }
    }
}

?>

<link rel="stylesheet" href="template/css/login&register.css">

<div class="form-background">
    <h2>Login</h2>
    <form action="" method="POST">
        <div>
            <label for="email">Email</label><br>
            <input type="email" name="email">
        </div><?php if (isset($erro[1])) echo '<p class="erro_register">' . $erro[1] . '</p>'; ?><br>
        <div>
            <label for="senha">Senha</label><br>
            <input type="password" name="senha">
        </div><?php if (isset($erro[2])) echo '<p class="erro_register">' . $erro[2] . '</p>'; ?><br>
        <?php if (isset($erro[3])) echo '<br><p class="erro_register">' . $erro[3] . '</p>'; ?>
        <input type="submit" value="Logar" class="login-btn">
        <a href="?pg=register" class="register-btn">Novo por aqui? Registrar</a>
    </form>
</div>
