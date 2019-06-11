<?php
date_default_timezone_set('America/Sao_Paulo');
require 'composer/vendor/autoload.php';
use Sinesp\Sinesp;

$veiculo = new Sinesp;
$veiculo->proxy('168.232.20.155', '8080');

try {
	//CONSULTA DE PLACA DE CARRO
	if (!empty($_POST['placa'])) {
		$veiculo->buscar($_POST['placa']);
	    if ($veiculo->existe()) {
	    	$dados = $veiculo->dados();
	    }
	}
} catch (\Exception $e) {
    $erro = $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Placa de Carro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.mask.js"></script>

	<script type="text/javascript">
		$(function (){
			$('#placa').mask('AAA-0000');
			$('#placa').bind('keyup', function(){
		        text = $('#placa').val();
		        v = text.toUpperCase();
		        $('#placa').val(v);

		    });
		});
		
	</script>
</head>
<body>
	<br>
	<div class="container">
		<div class="well">
			<form method="POST">
				<label>Placa do Carro</label>
				<input type="text" name="placa" id="placa" class="form-control" autofocus="">
				<br>
				<button class="btn btn-primary btn-block btn-lg">Consultar</button>
			</form>
			<?php
			if (isset($erro) && !empty($erro)) {
			?>
			<hr>
			<div class="alert alert-danger"><?=$erro; ?></div>
			<?php
			}
			?>
		</div>
		<hr>
		<?php
		if (isset($dados) && !empty($dados)) {
			?>
			<h3>Resultado</h3><hr>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead style="background-color: #000; color: #fff;">
						<tr>
							<th>Situação</th>
							<th>Modelo</th>
							<th>Marca</th>
							<th>Cor</th>
							<th>Ano</th>
							<th>Placa</th>
							<th>Cidade</th>
							<th>UF</th>
							<th>Data e Hora da Consulta</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$dados['situacao']; ?></td>
							<td><?=$dados['modelo']; ?></td>
							<td><?=$dados['marca']; ?></td>
							<td><?=$dados['cor']; ?></td>
							<td><?=$dados['ano']; ?></td>
							<td><?=$dados['placa']; ?></td>
							<td><?=$dados['municipio']; ?></td>
							<td><?=$dados['uf']; ?></td>
							<td><?=date('d/m/Y H:i:s'); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php
			}
		?>
	</div>
	
</body>
</html>