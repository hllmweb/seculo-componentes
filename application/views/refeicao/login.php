<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Século</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/app-login-refeitorio.css'); ?>" />
</head>
<body>
	<div class="box">
		<div class="logo"><a href="index.html"><img src="<?= base_url('assets/images/logo-seculo-positivo.png'); ?>"></a></div>
		<div id="form-login" class="form-login">
			<label for="chapa">
				<input type="number" name="chapa" id="chapa" placeholder="MATRICULA OU CPF" class="input-text">
            </label>
            <label for="dt_nascimento">
				<input type="text" name="dt_nascimento" id="dt_nascimento" placeholder="DATA DE NASCIMENTO" class="input-text">
			</label>
			<button class="btn" onclick="Autenticar();">Entrar</button>
        </div>              
    </div>
    
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
    <script>
      $("#dt_nascimento").mask('99/99/9999',{placeholder:"DATA DE NASCIMENTO"});

     function Autenticar(){
        var chapa          = $("#chapa").val();
        var dt_nascimento  = $("#dt_nascimento").val();

        $.ajax({
            url: "<?= base_url('refeicao/verificacao/index'); ?>",
            type: "POST",
            data: {
                chapa: chapa,
                dt_nascimento: dt_nascimento
            },
            success: function(data){
                if(data == 1){
                    window.location.href = '<?= base_url('refeicao/inicio'); ?>';
                }else{
                    alert("Dados Incorretos!");
                }
            }
        });

     }   
    
    </script>
</body>
</html>