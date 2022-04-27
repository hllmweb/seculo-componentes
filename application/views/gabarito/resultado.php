<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $titulo_header; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<div class="app-main">
		<div class="header-top">
			<h2 class="header-title"><?= $titulo_header; ?></h2>
		</div>

		<div class="content-main">

			<div class="section-item">
				<div class="fieldset <?= ($dados['FL_FORMATO'] == 'O') ? 'bg-amarelo-claro' : 'bg-azul-claro'; ?>">
					<div class="box-left"> 
						<div class="legend">Disciplina <span> <?= date("d/m/Y", strtotime($listar_prova[0]['DT_ALTERACAO_FEZ_PROVA'])); ?></span> </div>
						<span><?= $listar_prova[0]["DISCIPLINAS"]; ?> - <?= ($listar_prova[0]["FL_FORMATO"] == 'O') ? "OBJETIVA" : "IMPRESSA" ; ?></span>
						<?php if(!empty($listar_prova[0]["HR_INICIO"]) && !empty($listar_prova[0]['HR_FIM'])): ?>
						<span>
							<br>Hora Iniciada: <?= $listar_prova[0]["HR_INICIO"]; ?>
							<br>Hora Finalizada: <?= $listar_prova[0]["HR_FIM"]; ?></span>
						<hr>
						<?php endif; ?>
						<div class="legend">Etapa</div>
						<span><?= $listar_prova[0]["TITULO"]; ?></span>
					</div>
					<div class="box-right">
						<!--<a href="<?php #echo base_url('gabarito/resultado/visualizar_prova'); ?>" class="btn btn-link"><i class="fas fa-eye"></i></a>-->
					</div>
				</div>
			</div>

			<div class="row-header-gabarito">
				<div class="cel-header">Gabarito</div>
			</div>
			<?php if($listar_prova[0]['FL_FORMATO'] != 'I'): ?>
			<div class="row-header-legend">
				<div class="inline circle oficial"></div><span>Oficial</span>
				<div class="inline circle certo"></div><span>Acertos</span>
				<div class="inline circle errado"></div><span>Erros</span>
			</div>

			<div class="row-content-gabarito">
				<div class="cel-content-gabarito">
				<?php 
					foreach($gabarito_prova as $dados): 
				?>
					<div class="row text-center padding cel-content-item-gabarito">
						<div class="inline number"><?= $dados["POSICAO"]; ?></div>
						<div class="inline circle oficial"><?= $dados["CORRETA"];?></div> 
						<div class="inline circle <?= ($dados["CORRETA"] == $dados["RESPOSTA"]) ? 'certo' : 'errado'?>"><?= $dados["RESPOSTA"]; ?></div>
					</div>
				<?php 
					endforeach; 
				?>
				</div>
			</div>
			<?php 
				else: 
			?>
			<h3 class="text-center padding">
				Essa Prova Não Possui Gabarito!
			</h3>
			<?php 
				endif; 
			?>
			<!--
			<div class="row-content-quest">
				<div class="cel-quest"><span>1</span></div>
				<div class="cel-quest"><div class="marcado certo">A</div></div>
				<div class="cel-quest"><div class="marcado">B</div></div>
				<div class="cel-quest"><div class="marcado">C</div></div>
				<div class="cel-quest"><div class="marcado">D</div></div>
				<div class="cel-quest"><div class="marcado">E</div></div>
			</div>
			<div class="row-content-quest">
				<div class="cel-quest"><span>2</span></div>
				<div class="cel-quest"><div class="marcado">A</div></div>
				<div class="cel-quest"><div class="marcado">B</div></div>
				<div class="cel-quest"><div class="marcado errado">C</div></div>
				<div class="cel-quest"><div class="marcado certo">D</div></div>
				<div class="cel-quest"><div class="marcado">E</div></div>
				<div class="bg-errado"></div> 
			</div>
			<div class="row-content-quest">
				<div class="cel-quest"><span>3</span></div>
				<div class="cel-quest"><div class="marcado ">A</div></div>
				<div class="cel-quest"><div class="marcado certo">B</div></div>
				<div class="cel-quest"><div class="marcado">C</div></div>
				<div class="cel-quest"><div class="marcado">D</div></div>
				<div class="cel-quest"><div class="marcado">E</div></div>
			</div>
			<div class="row-content-quest">
				<div class="cel-quest"><span>4</span></div>
				<div class="cel-quest"><div class="marcado certo">A</div></div>
				<div class="cel-quest"><div class="marcado">B</div></div>
				<div class="cel-quest"><div class="marcado">C</div></div>
				<div class="cel-quest"><div class="marcado">D</div></div>
				<div class="cel-quest"><div class="marcado errado">E</div></div>
				<div class="bg-errado"></div>
			</div>
			<div class="row-content-quest">
				<div class="cel-quest"><span>5</span></div>
				<div class="cel-quest"><div class="marcado">A</div></div>
				<div class="cel-quest"><div class="marcado">B</div></div>
				<div class="cel-quest"><div class="marcado">C</div></div>
				<div class="cel-quest"><div class="marcado certo">D</div></div>
				<div class="cel-quest"><div class="marcado">E</div></div>
			</div>
			-->
		</div>


	</div>
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
</body>
</html>