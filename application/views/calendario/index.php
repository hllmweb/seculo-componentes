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
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/calendario.css'); ?>">
</head>
<body>
	<div class="app-main">
        <div class="calendario">
            <?php 
                //$eventos = montaEventos($info);
                //montaCalendario($eventos);
            ?>    
            <div class="legends">
                <span class="legenda"><span class="blue"></span> Eventos</span>
                <span class="legenda"><span class="red"><
                    /span> Hoje</span>
            </div>
        </div>
    </div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?= base_url('assets/js/calendario.js'); ?>"></script>
</body>
</html>