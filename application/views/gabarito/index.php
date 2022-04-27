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
		<h2>
			Este aplicativo encontre-se temporariamente DESATIVADO, por favor acesse o Portal Século para acompanhar o período letivo de seu filho <br> 
			<a href="http://portal.seculomanaus.com.br/FrameHTML/web/app/edu/PortalEducacional/login/">Portal Século Manaus</a>
		</h2>
		<?php
			exit();
		?>


		<div class="header-top">
			<select class="dropmenu" id="dropmenu" onchange="loadProvas(this);">
				<option selected="selected">Bimestre</option>
				<option value="1">1º Bimestre</option>
				<option value="2">2º Bimestre</option>
				<option value="3">3º Bimestre</option>
				<option value="4">4º Bimestre</option>
			</select>
			<input type="hidden" name="p_ra" id="p_ra" value="<?= $ra; ?>">

			<!--<input type="hidden" name="p_codusuario" id="p_codusuario" value="<?= $codusuario; ?>">-->
			<!-- <input type="hidden" name="p_ra" id="p_ra" value="14002892"> -->
		</div>


		<div class="content-main">
			<div class="section-item" id="section-item">	
				<h2 style="text-align:center; margin:20px 0;">Selecione o Bimestre!</h2>

			</div>
		</div>
	</div>



	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		/*var p_ra 			= $("#p_ra").val();
		//var p_codusuario 	= $("#p_codusuario").val();

		$("#dropmenu").change(function(e){
			p_bimestre = $(this).val();
			
			$.ajax({
				url: "<?php #echo base_url('gabarito/lista_prova'); ?>",
				type: "POST",
				data: {
					p_bimestre: p_bimestre,
					p_ra: p_ra
				},
				beforeSend: function(){
					$("#section-item").html("<h2>Carregando...</h2>");
				},
				success: function(data){
					$("#section-item").html(data);
				}
			});

			e.preventDefault();
		});*/

		function loadProvas(that){
			let p_ra 	   = $("#p_ra").val(); 
			let p_bimestre = that.value;
		

			$.ajax({
				url: "<?= base_url('gabarito/lista_prova'); ?>",
				type: "POST",
				data: {
					p_bimestre: p_bimestre,
					p_ra: p_ra
				},
				beforeSend: function(){
					$("#section-item").html("<h2 style='text-align:center; margin:20px 0;'>Carregando...</h2>");
				},
				success: function(data){
					$("#section-item").html(data);
				}
			});


			return false;
		}
	</script>
</body>
</html>