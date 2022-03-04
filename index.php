<!DOCTYPE html>
<?php
	session_start();
	require_once 'controller/cTarefa.php';
	$tarefa = new cTarefa();
	$listaTarefa = $tarefa->getTarefa();
	date_default_timezone_set('America/Sao_Paulo');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sua Agenda</title>
		<meta http-equiv="Content-Language" content="pt-br">
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<meta name="author" content="Fernando Kaspary Fink"/>
		<meta name="description" content="MiniProjeto"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
		
		<div class="titulo">
			<h1 class="centro">Bem Vindo!</h1>
		</div>
		
		<div id="esquerda">
			<h2 class="centro">Lista de Tarefas</h2>
			<fieldset>
				<table class="table table-striped">
					<thead>
						<tr class="centro">
							<th>Nome</th><th>Data de Início</th><th>Status</th><th>Funções</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaTarefa as $item): ?>
							<tr>
								<td><?php echo $item['nome'];?></td>
								<td><?php echo  date("d/m/Y" , strtotime($item['dataInicio']));?></td>
								<td>
									<?php
										
										$dataInicio = strtotime($item["dataInicio"]);
										$data = strtotime("now - 10 days");
										
										// Tentei muito fazer com que trocasse Aberta por Aberta 10+ no banco de dados,
										// mas apesar de o código ser basicamente igual ao do updateTarefa, sempre dava erro.
										// Tentei pesquisar alguma solução, mas nenhuma funcionava. decidi só exibir o valor então
										if ($item['status'] === "Aberta") {
											if(($dataInicio <= $data)) {
												echo "Aberta 10+";
												// $tarefa->updateStatus($item['id']);
												// include('controller/updateStatus.php');
											} else {
												echo "Aberta";
											}
										} else {
											echo $item['status'];
										}
										
									?>
								</td>
								<td>
									<form action="view/editarTarefa.php" method="POST">
										<input type="hidden" value="<?php echo $item['id'];?>" name="id"/>
										<input type="submit" class="btn btn-outline-secondary btn-sm" value="Editar" name="editar"/>
									</form>

									<script language='javascript'>
										function confirmarExclusao(nome, idForm){
											result = confirm("Tem certeza que deseja excluir a terefa \"" + nome + "\"?");
											if (result == true) {
												document.getElementById(idForm).action="controller/deleteTarefa.php";
											} else {
												
											}
										}
									</script>
									
									
									<form id="<?php echo ($item['id'])?>" action="" method="post">
										<input type="hidden" value="<?php echo $item['id'];?>" name="id"/>
										<input type="submit" class="btn btn-outline-danger btn-sm" onclick="confirmarExclusao(<?php echo ("'" .$item['nome'] ."'");?>, <?php echo ("'" .$item['id'] ."'");?>)" value="Deletar" name="deletar"/>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
				</table><br>
				<div class="centro">
					<input type="button" class="btn btn-success" value="Criar Tarefa" onclick="location.href='view/criarTarefa.php'"/></p>
				</div>
			</fieldset>
		</div>
		
		<div id="direita">
			<h2 class="centro">Dados do Usuário</h2>
			<fieldset>
				<?php
					if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
						header("Location: view/login.php");
					}else{
						echo ("<p>Nome: " .$_SESSION['usuario'] ."<br>");
						echo ("Email: " . $_SESSION['email'] ."</p>");
						echo ("<p>Data Atual: " .date('d/m/Y') ."</p>");
						echo ("<div class='centro'>");
						echo ("<input type='button' class='btn btn-warning' value='Log Out' onclick=\"location.href='controller/logout.php'\" />");
						echo ("</div>");
					}
				?>
			</fieldset>
		</div>
		
		
    </body>
</html>
