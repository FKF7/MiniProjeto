<?php

if(isset($_POST['atualizar'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$status = $_POST['status'];
	$dataInicio = $_POST['dataInicio'];
	
	$pdo = require_once '../pdo/connection.php';
	$sql = "update tarefa set nome = ?, status = ?, dataInicio = ? where id = ?";
	$sth = $pdo->prepare($sql);
	$sth->bindParam(1, $nome, PDO::PARAM_STR);
	$sth->bindParam(2, $status, PDO::PARAM_STR);
	$sth->bindParam(3, $dataInicio, PDO::PARAM_STR);
	$sth->bindParam(4, $id, PDO::PARAM_INT);
	$sth->execute();
	unset($sth);
	unset($pdo);
	header("Location: ../index.php");
}