<?php

class cUsuario {
	
    public function inserir() {
        if (isset($_POST['salvar'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $senhaMD5 = md5($senha);

            $pdo = require_once '../pdo/connection.php';
            $sql = "insert into usuario (nome, email, senha) values (?,?,?)";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $nome, PDO::PARAM_STR);
            $sth->bindParam(2, $email, PDO::PARAM_STR);
            $sth->bindParam(3, $senhaMD5, PDO::PARAM_STR);
            $sth->execute();
            unset($sth);
            unset($pdo);
			header("Location: login.php");
        }
    }

    public function getUsuario() {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select email, nome from usuario";
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

    public function deletarUser() {
        if (isset($_POST['deletar'])) {
            $email = $_POST['email'];
            $pdo = require_once '../pdo/connection.php';
            $sql = "delete from usuario where idUser = ?";
            $sth = $pdo->prepare($sql);
            $sth->bindParam(1, $id, PDO::PARAM_INT);
            $sth->execute();
            unset($sth);
            unset($pdo);
            header("Refresh: 0");
        }
    }

    public function getUsuarioById($id) {
        $pdo = require_once '../pdo/connection.php';
        $sql = "select idUser, nomeUser, email from usuario where idUser = ?";
        $sth = $pdo->prepare($sql);
        $sth->execute([$id]);
        $result = $sth->fetchAll();
        unset($sth);
        unset($pdo);
        return $result;
    }

}
