<?php

if (isset($_POST['deletar'])) {
	$id = $_POST['id'];
    $pdo = require_once '../pdo/connection.php';
    $sql = "delete from tarefa where id = ?";
    $sth = $pdo->prepare($sql);
    $sth->bindParam(1, $id, PDO::PARAM_INT);
    $sth->execute();
    unset($sth);
    unset($pdo);
    header("location: ../index.php");
}