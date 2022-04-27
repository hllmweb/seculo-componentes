<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header_1; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--css-->
	<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/responsive_2.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<div class="app-main">
		<header class="header-top">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header_1." - ".$listar[0]['NM_USUARIO']; ?></h2>
			</div>
			<div class="box right">
				<a href="javascript:history.back()" class="btn btn-link"><i class="fas fa-chevron-left"></i></a>
			</div>
		</header>

		<table class="tabela-2">
			<thead>
				<tr>
					<td width="5%">Data</td>
					<td>Histórico</td>
					<td>Valor</td>
					<td>Saldo Final</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listar as $dados): ?>
				<tr onclick="toggleLinha(<?= $dados['ID_VENDA']; ?>);">
					<td><?= str_replace("-", "/", $dados['DT_MOVIMENTO']); ?></td>
					<td class="text-left padding-left"><?= $dados['OBSERVACAO']; ?></td>
					<td><?= number_format($dados['SALDO_ATUALIZADO'],2,",","."); ?></td>
					<td><span style="<?= ($dados['SALDO_RESULTADO'] <= 0) ? 'color:red; font-weight: bold;' : 'font-weight: bold;' ?>"><?= number_format($dados['SALDO_RESULTADO'],2,",","."); ?></span></td>
				</tr>
				<tr class="toggle_<?= $dados['ID_VENDA']; ?> toggle_row">
					<td colspan="4" width="100%;"></td>
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

	   	$(".toggle_row td").hide();
	   	function toggleLinha(parametro){
	   		var p_id_venda = parametro;

	   		$.ajax({
	   			url: "<?= base_url('pagamento/extrato/detalhe_extrato'); ?>",
	   			type: "POST",
	   			data: {
	   				p_id_venda: p_id_venda
	   			},
	   			success: function(data){
	   				$(".toggle_row td").show();
	   				$(".toggle_"+p_id_venda+" td").html(data);
	   				//console.log(data);
	   				//$(".toggle").html(data);
	   			}
	   		});
	   	}

	</script>
</body>
</html>

