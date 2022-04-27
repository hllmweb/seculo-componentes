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
	<link rel="stylesheet" href="<?= base_url('assets/css/app-refeitorio.css'); ?>?v=<?= time(); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
</head>
<body>
    <div class="main-app">
        <div class="sessao-100">
            <div class="nome"><?= $nome; ?></div>
            <a href="<?= base_url('refeicao/sair/index'); ?>" class="logout">Sair</a>
            <div class="container-80-transparet flex">
                
                <div class="container-box-date">
                    <div class="icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <input type="text" name="data_inicio" id="data_inicio" class="data_inicio input-text-lx" placeholder="Data Incio">
                </div>

                <div class="container-box-date">
                    <div class="icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <input type="text" name="data_fim" id="data_fim" class="data_fim input-text-lx" placeholder="Data Fim">
                </div>

                <div class="container-box-date">
                    <button class="btn-add" onclick="add_periodo_isento('<?= $chapa; ?>'); return false;">Cadastrar</button>
                </div>
            


            </div>

            <div class="container-80-white" id="container-periodo">               
            <div class="sessao-container-title">Período Isento</div>
                    <div class="sessao-list-item">
                        <div class="sessao-box-50">DATA CADASTRO</div>
                        <div class="sessao-box-50">DATA INICIO</div>
                        <div class="sessao-box-50">DATA FIM</div>
                    </div>
                <?php foreach($lista_periodo as $row): ?>
                    <div class="sessao-list-item">
                        <div class="sessao-box-50"><span><?= $row['DATA_CADASTRO']; ?></span></div>
                        <div class="sessao-box-50"><span><?= date('d/m/Y',strtotime(implode("-",array_reverse(explode("/",$row['DATA_INICIO']))))); ?></span></div>
                        <div class="sessao-box-50"><span><?= date('d/m/Y',strtotime(implode("-",array_reverse(explode("/",$row['DATA_FIM']))))); ?></span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        



        </div>

        <div class="rodape fixo">
            <div class="rodape-menu">
                <a href="<?= base_url('refeicao/inicio'); ?>" class="rodape-menu-item">
                    <i class="fas fa-home"></i>
                    <span>Inicio</span>
                </a>
                <a href="<?= base_url('cardapio/imprimir/pc'); ?>" target="_blank" class="rodape-menu-item">
                    <i class="fas fa-drumstick-bite"></i>
                    <span>Cardápio</span>
                </a>
                <a href="<?= base_url('refeicao/isentar_periodo'); ?>" class="rodape-menu-item rodape-menu-active">
                    <i class="fas fa-stopwatch"></i>
                    <span>Isentar Período</span>
                </a>
                <!-- <a href="" class="rodape-menu-item">
                    <i class="fas fa-list"></i>
                    <span>Listar</span>
                </a> -->
            </div>
        </div>
    </div>


	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script> 
    <script src="<?= base_url('assets/js/jquery.mask.js'); ?>"></script>
    <script>
        var date2 = new Date();
        date2.setDate(date2.getDate());

        $(".data_inicio").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: date2,
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        $(".data_fim").datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: date2,
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        function add_periodo_isento(p_chapa){
            var p_data_inicio = $("#data_inicio").val();
            var p_data_fim    = $("#data_fim").val();

            $.ajax({
                url: "<?= base_url('refeicao/add_periodo'); ?>",
                type: "POST",
                data: {
                    p_chapa: p_chapa,
                    p_data_inicio: p_data_inicio,
                    p_data_fim: p_data_fim
                },
                beforeSend: function(){
                    $("#container-periodo").html("<h2>Carregando...</h2>");
                },
                success: function(data){
                    //console.log(data);
                    if(data == 1){
                        lista_periodo_isento(p_chapa);
                    }
                }
            });

        }


        function lista_periodo_isento(p_chapa){
            //console.log(p_chapa);

            $.ajax({
                url: "<?= base_url('refeicao/listar_periodo'); ?>",
                type: "POST",
                data: {
                    p_chapa: p_chapa
                },
                success: function(data){
                    //console.log(data);
                    $("#container-periodo").html(data);
                }

            })
        }
       
    </script>   
</body>
</html>