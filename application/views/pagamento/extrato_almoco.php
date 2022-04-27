<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header_1; ?></title>

	<!--css-->
	<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<div class="app">

		<header class="header">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header_1." - ".$listar[0]['NM_USUARIO'];; ?></h2>
			</div>
			<div class="box right">
				<a href="javascript:history.back()" class="btn btn-link">Voltar</a>
			</div>
		</header>

		<table class="tabela-2 tabela-3">
			<thead>
				<tr>
					<td>Data</td>
					<td>Histórico</td>
					<td>Quant.</td>
					<td>Saldo Final</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listar as $dados): ?>
				<tr>
					<td><?= str_replace("-", "/", $dados['DT_MOVIMENTO']); ?></td>
					<td><?= $dados['OBSERVACAO']; ?></td>
					<td><?= $dados['SALDO_ATUALIZADO']; ?></td>
					<td><span style="<?= ($dados['SALDO_RESULTADO'] <= 0) ? 'color:red; font-weight: bold;' : 'font-weight: bold;' ?>"><?= $dados['SALDO_RESULTADO']; ?></span></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="row center margin">
			<a href="javascript:void(0);" onclick="printDiv('tabela-1');" class="btn btn-link bg-red inline padding">Imprimir</a>
		</div>
</div>
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		function printDiv(div) {
			var originalContent = $('body').html();
			$(".btn-link").css("display","none");
			var printArea = $("."+div).parent().html();
			$("body").html(printArea);
			window.print();
			$("body").html(originalContent);
	   	}
	</script>
</body>
</html>

