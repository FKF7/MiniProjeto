<?php

class cTarefa {
    
    public function criar() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $dataInicio = $_POST['dataInicio'];
			$email = $_SESSION['email'];
			$status = "Aberta";

            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into tarefa (nome, dataInicio, status, emailUsuario) values (?,?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $dataInicio, PDO::PARAM_STR);
            $sth->bindParam(3, $status, PDO::PARAM_STR);
			$sth->bindParam(4, $email, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
			header("Location: ../index.php");
        }
    }
	
	public function getTarefa() {
		$email = $_SESSION['email'];
		$pdo = require 'pdo/connection.php';
        $sql = "select id, nome, dataInicio, status from tarefa WHERE emailUsuario = '" .$email ."' ORDER BY dataInicio";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
	}
	
	public function getTarefaById($id){
        $pdo = require_once '../pdo/connection.php';
        $sql = "select id, nome, dataInicio, status from tarefa where id = '" .$id ."'";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($pdo);
        unset($sth);
        return $result;
    }
	
	public function updateStatus($id) {
		$pdo = require_once 'pdo/connection.php';
		$sql = "update tarefa set status = ? where id = ?";
		$sth = $pdo->prepare($sql);
		$sth->bindParam(1, "Aberta 10+", PDO::PARAM_STR);
		$sth->bindParam(2, $id, PDO::PARAM_INT);
		$sth->execute();
		unset($sth);
		unset($pdo);
		header("Location: ../index.php");
	}
	
}