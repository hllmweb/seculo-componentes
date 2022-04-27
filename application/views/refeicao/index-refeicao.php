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
	<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
</head>
<body>
    <div class="app-main">
        <header class="header-top">
            <div class="header-title"><strong>Refeição</strong></div>
        </header>
    </div>
    <div class="content-main text-center">
        <div class="padding">
            <div class="hgroup-header">
                <h2 class="hgroup-header-title">03/07/2020</h2>
                <h4 class="hgroup-header-cronometro"></h3>
                <button class="btn-add width-100">Cardápio de Hoje</button>
                <div class="alert-att padding">Você tem até <strong>09:00 Hrs</strong> para Confirmar sua Refeição</div>
            </div>    
        </div>
        <div class="box-inputs flex">
            <div class="col-2">
                <label class="container">
                    <input type="checkbox" id="input-check" value="S">
                    <span class="checkmark"></span>
                    Almoço Hoje
                </label>

            </div>
            <div class="col-2">
                <button>Isentar Período</button>
            </div>
        </div>
    </div>
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script>
        $("input#input-check").on("click", function(){
            //console.log($( "input#input-check:checked" ).val());
            var p_opcao;
            if($("input#input-check").is(":checked")){
                p_opcao = "S";
            }else{
                p_opcao = "N";
            }

            $.ajax({
                url: "<?= base_url('refeicao/form/index'); ?>",
                type: "POST",
                data: {
                    p_opcao: p_opcao
                },
                success: function(data){
                    console.log(data);
                }
            });

        });
    </script>


    <script>
        var tempo = new Number();
        tempo = 3600;

        function startCountdown(){
            if((tempo - 1) >= 0){

                var min = parseInt(tempo/60);
                var seg = tempo%60;

                if(min < 10){
                    min = "0"+min;
                    min = min.substr(0, 2);
                }
                
                if(seg <=9){
                    seg = "0"+seg;
                }

                horaImprimivel = '00:' + min + ':' + seg;
                $(".hgroup-header-cronometro").html(horaImprimivel);
                setTimeout('startCountdown()',1000);
            
                tempo--;
            } else {
                horaImprimivel = '00:00:00';
                $(".hgroup-header-cronometro").html(horaImprimivel);
            }

        }

        startCountdown();
    </script>
</body>
</html>