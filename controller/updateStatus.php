<?php
	$id = $item['id'];
	
	$pdo = require_once 'pdo/connection.php';
	$sql = "update tarefa set status = ? where id = ?";
	$sth = $pdo->prepare($sql);
	$sth->bindParam(1, "Aberta 10+", PDO::PARAM_STR);
	$sth->bindParam(2, $id, PDO::PARAM_INT);
	$sth->execute();
	unset($sth);
	unset($pdo);
	header("Location: ../index.php");
?>