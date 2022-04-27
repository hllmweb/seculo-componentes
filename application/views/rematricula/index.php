<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />

	<!--css-->
	<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<style>
		.btn-red{
			background-color: #cc0000;
			color:#FFF;
		}
		.btn-green{
			background-color: #85d800;
			color:#111;
		}

	</style>
</head>
<body>
	<!--topo-->
	<div class="app-main">
		<!--LISTA DE SALDO-->
		<header class="header-top">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?></h2>
			</div>
			<div class="box right">
				<!-- <a href="http://portal.seculomanaus.com.br:8080/web/app/edu/PortalEducacional/#/" class="btn btn-link"><i class="fas fa-chevron-left"></i></a> -->
			</div>
		</header>

		
		<div class="row">
			<table class="tabela-3">
				<thead>
					<tr>
						<td>Aluno</td>
						<td></td>
					</tr>
				</thead>	
				<tbody>			
				<?php foreach($lista_aluno as $row): ?>
				<tr>
					<td><span><?= $row['NOME']; ?></span></td>
					<td>
						<form id="confirma">
							<input type="hidden" id="p_ra" name="p_ra" value="<?= $row['RA']; ?>">
							<input type="hidden" id="p_codusuario" name="p_codusuario" value="<?= $row['CPF_RESPONSAVEL']; ?>">
							<input type="hidden" id="p_idperlet_prox" name="p_idperlet_prox" value="3">

							<?php if($row['CONFIRMOU'] == 'S'): ?>
							<button class="btn-add btn-green" disabled="disabled"><i class="fas fa-check"></i> Matricula Confirmada</button>
							<?php endif; ?>
							<?php if($row['CONFIRMOU'] == 'N'): ?>
							<button class="btn-add btn-red" data-ra="<?= $row['RA']; ?>" onclick="confirma('<?= base_url() ?>rematricula/inicio/confirma_rematricula','#confirma', this); return false;"><i class="fas fa-check"></i> Confirmar Matrícula</button>
							<?php endif; ?>
						</form>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>	


	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script>
		function confirma(page, form, element){
			//let dados = $(element).serialize();
			let p_ra 			= $(element).data("ra");
			let p_codusuario	= $("#p_codusuario").val();
			let p_idperlet_prox = $("#p_idperlet_prox").val();





			$.ajax({
				url: page,
				type: 'POST',
				data: {
					p_ra: p_ra,
					p_codusuario: p_codusuario,
					p_idperlet_prox: p_idperlet_prox
				},
				success: (data) => {
					console.log(data);
					if(data == "insert"){
						alert("Sua Rematrícula foi Confirmada!");
						window.location.href = 'https://seculomanaus.com.br/componentes/portal/rematricula/inicio?Context=CodUsuario='+p_codusuario;
					}
				}

			});
			
			// return false;
		}
	</script>
</body>
</html>