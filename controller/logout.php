<?php

session_start();

//Renova todas as variáveis da sessão
$_SESSION = array();

//Distruir sessão
session_destroy();

//Redirecionar para tela de login após logout
header("Location: ../view/login.php");
exit;