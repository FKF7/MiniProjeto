<!DOCTYPE html>
<?php
	session_start();
	if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
		header("Location: ../index.php");
	}
	require_once '../controller/cLogin.php';
	$login = new cLogin();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title>Login</title>
		<link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
		<meta name="author" content="Fernando Kaspary Fink"/>
		<meta name="description" content="MiniProjeto"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
	
    <body>
		<div class="titulo">
			<h1 class="centro">Login</h1>
		</div>
		
		<div class= "centro">
		<div class= "form">
			<fieldset>
				<form action="<?php $login->logar(); ?>" method="POST">
					<input type="email" name="email" required placeholder="Seu E-mail"/>
					<br><br>
					<input type="password" name="senha" required placeholder="Sua Senha"/>
					<br><br>
					<input type="submit" class="btn btn-success" name="logar" value="Logar"/><br><br>
						<label>Não possui um usário cadastrado?</label><br>
					<input type="button" class="btn btn-success" value="Cadastre Aqui" onclick="location.href='cadUsuario.php'"/></p>
					
				</form>
			</fieldset>
		</div>
		</div>
    </body>
</html>
