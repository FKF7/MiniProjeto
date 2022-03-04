<!DOCTYPE html>

<?php
	session_start();
	if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
		header("Location: login.php");
	}
	
	require_once '../controller/cTarefa.php';
	$tarefa = new cTarefa();
?>

<html>
	<head>
		<title>Criar Tarefa</title>
		<meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
		<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
		<meta name="author" content="Fernando Kaspary Fink"/>
		<meta name="description" content="MiniProjeto"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	</head>
	
	<body>
		
		<div class="titulo">
			<h1 class="centro">Criar Tarefa</h1>
		</div>
		
		<div class= "centro">
		<div class= "form">
			<form action="<?php $tarefa->criar(); ?>" method="POST">
				<label>Nome:</label><br>
				<input type="text" name="nome" required />
				<br><br>
				<label>Data de Início:</label><br>
				<input type="date" name="dataInicio" required />
				<br><br>
				<input type="submit" class="btn btn-success" name="salvar" value="Salvar"/>
				<input type="reset" class="btn btn-secondary" name="limpar" value="Limpar"/>
				<input type="button" class="btn btn-warning" value="Voltar" onclick="location.href='../index.php'"/>
			</form>
		</div>
		</div>
	</body>

</html>