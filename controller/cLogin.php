<?php

class cLogin {
    
    public function logar() {
        if(isset($_POST['logar'])){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $senhaMD5 = md5($senha);
            
            $pdo = require_once '../pdo/connection.php';
            $sql = "select * from usuario where email = ?";
            
            $statement = $pdo->prepare($sql);
            $statement->execute([$email]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();
            if($count > 0){
                if($senhaMD5 == $result['senha']){
                    session_start();
                    $_SESSION['usuario'] = $result['nome'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['logado'] = true;
                    header("Location: ../index.php");
                }
            }else{
                header("Location: login.php");
            }
            unset($$statement);
            unset($pdo);
            unset($result);
        }
    }
}