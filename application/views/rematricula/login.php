<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $titulo_header; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/animate_login.css'); ?>">
</head>
<body>
	<div class="box">
		<div class="logo"><a href="index.html"><img src="<?= base_url('assets/images/logo-seculo-positivo.png'); ?>"></a></div>
		<form id="form-login" class="form-login">
			<label for="Cd_usuario">
				<input type="text" name="Cd_usuario" id="Cd_usuario" placeholder="CPF" class="input-text">
			</label>
			<button class="btn" onclick="Autenticar(); return false;">Entrar</button>
		</form>              
	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
	<script>
		  // $("#Cd_usuario").mask("999.999.99-99");

		  Autenticar = () =>{
		  	// $("#Cd_usuario").unmask();
		  	let cd_usuario = $("#Cd_usuario").val();




		  	$.ajax({
		  		url: "<?= base_url('rematricula/auth') ?>",
		  		type: "POST",
		  		data: {
		  			cd_usuario: cd_usuario
		  		},
		  		success: (data) => {
		  			if(data == 1){
		  				window.location.href = 'https://seculomanaus.com.br/componentes/portal/rematricula/inicio?Context=CodUsuario='+cd_usuario;
		  			}else if(data == 0){
		  				alert('Responsável Financeiro Não Cadastrado!');
		  			}
		  		}
		  	})
		  }


	</script>

</body>
</html>