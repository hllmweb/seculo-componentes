<html lang="pt-br">
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
</head>
<body>
<!--topo-->
	<div class="app-main">
		<!--LISTA DE SALDO-->
		<header class="header-top">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?></h2>
			</div>
		</header>

		<div class="row">
			<div class="modal-title"><h2>Bem-Vindo a Central Online de Rematrícula do Centro Educacional Século!</h2></div>
			<form name="login" id="login" method="post" action="http://portal.seculomanaus.com.br:80
			/Corpore.Net/Source/EDU-EDUCACIONAL/Public/EduPortalAlunoLogin.aspx?AutoLoginType=ExternalLogin" class="padding">
				<input type="hidden" name="user" value="<?= $codusuario; ?>" placeholder="Usuário" class="input-100 margin-content"/>
				
				<input type="hidden" name="pass" value="seculo2020" placeholder="Senha" class="input-100 margin-content"/>
				
				<input type="hidden" name="alias" value="CorporeRM" style="display:none"/>
				<input type="submit" value="Clique Aqui Para Continuar" class="row-100 btn btn-link bg-green padding-btn none margin-content"/>
			</form>
		</div>
	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
</body>
</html>