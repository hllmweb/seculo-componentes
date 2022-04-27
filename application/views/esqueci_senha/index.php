<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header_1; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />

    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

	<!--css-->
	<link rel="stylesheet" href="<?= base_url('assets/css/app-style.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
</head>
<body>
<div class="app-main">      
        <input type="text" id="nova_senha" name="nova_senha" placeholder="Digite sua nova senha" class="label-input">
        <input type="hidden" id="p_codusuario" name="p_codusuario" value="<?= $p_codusuario ?>">
        <button onclick="atualiza_senha(); return false;" class="btn-add">Atualizar</button>
</div>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
<script>
    function atualiza_senha(){
        var nova_senha      = $("#nova_senha").val();
        var p_codusuario    = $("#p_codusuario").val();
        
        $.ajax({
            url: "<?= base_url('esqueci_senha/inicio/atualizar'); ?>",
            type: "POST",
            data: {
                nova_senha: nova_senha,
                p_codusuario: p_codusuario
            },
            beforeSend: function(){
                $(".app-main").html("<h2>Atualizando...</h2>");
            },
            success:function(data){
                $(".app-main").html(data);
            }

        });


    }

</script>
</body>
</html>

