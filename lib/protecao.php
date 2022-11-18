<?php

function protecao($admin)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['usuario'])) {
        die("<script>location.href='index.php?pg=login';</script>");
    }

    if ($admin == 1 && $_SESSION['admin'] != 1) {
        die("<script>location.href='index.php';</script>");
    }
}
