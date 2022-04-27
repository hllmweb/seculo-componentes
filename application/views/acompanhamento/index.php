<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive_3.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<!--topo-->
	<div class="app-main">
		<header class="header-top">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?></h2>
			</div>
			<div class="box right"></div>
		</header>

		<div class="content-main">

			<?php foreach($listar as $dados): ?>
			<div class="section-item">
				<a href="<?= base_url(); ?>acompanhamento/diario?turma=<?= $dados['CODTURMA'] ?>&codusuario=<?= $codusuario; ?>" class="btn-box">
				<div class="fieldset">
					<div class="box-left text-left padding-top">
						<div class="legend">Curso - Série</div>
						<span><?= $dados['NOME']; ?></span>
						<hr>
						<div class="legend">Turma</div>
						<span><?= $dados['CODTURMA']; ?></span>
					</div>

					<div class="box-right">

						<?php if($codusuario == 'odimas'): ?>
						<a href="javascript:void(0);" onclick="enviar_notificacao('<?= $dados['CODTURMA'] ?>'); return false;" style="font-size:1rem; color:#111; text-align: center; display: block;" class="btn btn-send">Enviar Notificação</a>
						<!-- <span><?= $dados['TOTAL_PERCENTUAL']; ?></span>	 -->
						 <?php endif; ?>
						<a href="<?= base_url(); ?>acompanhamento/diario?turma=<?= $dados['CODTURMA'] ?>&codusuario=<?= $codusuario; ?>" class="btn btn-link"><i class="fas fa-eye"></i> <span></span></a>
					</div>
				</div>
				</a>



			</div>			
			<?php endforeach; ?>

		</div>
	
	




	</div>	

	
	<script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
	<script>
		function enviar_notificacao(codturma){
			$.ajax({
				url: "<?= base_url('acompanhamento/diario/enviar_notificacao'); ?>",
				type:"POST",
				data:{
					turma: codturma
				},
				success: function(data){
					console.log(data);
					alert("Notificação Agendada para Envio!");
				}
			});

			return false;
		}

	</script>
</body>
</html>