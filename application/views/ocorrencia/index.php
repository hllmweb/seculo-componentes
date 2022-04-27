<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css').'?v='.time(); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<header class="header-top">
		<div class="box left">
			<h2 class="header-title"><?= $titulo_header; ?></h2>
		</div>
		<div class="box right">
			
		</div>
	</header>

	<div class="app-main">
		<?php foreach($listar as $row): ?>
		<div class="app-section">
			<h2>Ocorência</h2>
			<p><?= $row['OBS']; ?></p>
		</div>
		<?php endforeach; ?>
	</div>
	

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
</body>
</html>