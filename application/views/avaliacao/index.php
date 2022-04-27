<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header; ?></title>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
</head>
<body>

	<!--topo-->
	<div class="app">
		<h2>
			Este aplicativo encontre-se temporariamente DESATIVADO, por favor acesse o Portal Século para acompanhar o período letivo de seu filho <br> 
			<a href="http://portal.seculomanaus.com.br/FrameHTML/web/app/edu/PortalEducacional/login/">Portal Século Manaus</a>
		</h2>
		<?php
			exit();
		?>
		
		<header class="header">
			<div class="box left">
				<h2 class="header-title">Avaliação Conceitual</h2>
			</div>
			<div class="box right">
				<select id="p_codetapa" class="p_codetapa">
					<option selected="selected">Selecione o Bimestre</option>
					<option>----</option>
					<option value="16">1º Bimestre</option>
					<option value="26">2º Bimestre</option>
					<option value="36">3º Bimestre</option>
					<option value="46">4º Bimestre</option>
				</select>
				<input type="text" id="codusuario" name="codusuario" value="<?= $codusuario; ?>">
				<!-- <input type="text" id="codturma" name="codturma" value="<?php #echo $codturma; ?>"> -->
			</div>
		</header>
	
		<div id="tabela-conteudo">
			
		</div>



	</div>



	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		$("#p_codetapa").change(function(e){
			p_codetapa 		= $(this).val();
			p_codusuario 	= $("#codusuario").val();
			//p_codturma  	= $("#codturma").val();
	
			$.ajax({
				url: '<?= base_url(); ?>avaliacao/inicio/turma',
				type: 'POST',
				data: {
					p_codetapa: p_codetapa,
					p_codusuario: p_codusuario
					//p_codturma: p_codturma
				},
				beforeSend: function(){
					$("#tabela-conteudo").html("<h3><center>Carregando...</center></h3>");
				},
				success: function(data){
					$("#tabela-conteudo").html(data);
					console.log(data);
				}
			})

			e.preventDefault();
		});

	</script>

</body>
</html>