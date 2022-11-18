<!DOCTYPE html>
<html lang="pt-br">

<?php 

if(!isset($_SESSION)) {
    session_start();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/style.css">
    <title>Mini projeto</title>
</head>

<body>
    <?php include_once 'template/header.php' ?>

    <main>
        <?php
        if (empty($_SERVER['QUERY_STRING'])) {
            include_once 'principal.php';
        } else {
            $pg = $_GET['pg'];
            include_once "$pg.php";
        }
        ?>
    </main>

    <?php include_once 'template/footer.php' ?>

</body>

</html>