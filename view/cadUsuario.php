<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    header("Location: ../index.php");
}

require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title>Cadastro</title>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
		<meta name="author" content="Fernando Kaspary Fink"/>
		<meta name="description" content="MiniProjeto"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
	
    <body>
        
		<div class="titulo">
			<h1 class="centro">Cadastro de Usuários</h1>
		</div>
		
		<div class= "centro">
		<div class= "form">
			<form action="<?php $cadUser->inserir(); ?>" method="POST">
				<input type="text" name="nome" required placeholder="Nome aqui ..."/>
				<br><br>
				<input type="email" name="email" required placeholder="E-mail aqui ..."/>
				<br><br>
				<input type="password" name="senha" required placeholder="Senha aqui ..."/>
				<br><br>
				<input type="submit" class="btn btn-success" name="salvar" value="Salvar"/>
				<input type="reset" class="btn btn-secondary" name="limpar" value="Limpar"/><br><br>
				
				<label>Já possui um usuário?</label><br>
				<input type="button" class="btn btn-success" value="Faça Login" onclick="location.href='login.php'"/>
			</form>
        </div>
		</div>
		
    </body>
</html>
