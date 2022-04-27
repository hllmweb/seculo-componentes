<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $titulo_header; ?></title>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>
	<!--topo-->
	<div class="app">
		<header class="header">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?></h2>
			</div>
			<div class="box right">
				<a href="<?= base_url('cardapio/form_cardapio'); ?>">Adicionar Cardápio</a>
			</div>
		</header>
	
		<table class="tabela-1">
			<thead>
				<tr>
					<td>Descrição</td>
					<td>Ações</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listar as $dados): ?>
				<tr>
					<td><span><?= $dados['DESCRICAO'] ?></span></td>
					<td>
						<a href="http://portal.seculomanaus.com.br/Arquivos/<?= $dados['PATHARQUIVO']; ?>" download="http://portal.seculomanaus.com.br/Arquivos/<?= $dados['PATHARQUIVO']; ?>" class="btn btn-link">
							Visualizar Cardápio
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>	

</body>
</html>