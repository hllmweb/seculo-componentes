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
		
			<?= var_dump($lista_aluno); ?>


		</div>
	</div>	


	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
</body>
</html>