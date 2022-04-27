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
        <div class="sessao-100 full">
            <div class="nome"><?= $nome; ?></div>
            <a href="<?= base_url('refeicao/sair/index'); ?>" class="logout">Sair</a>
            <div class="container-80-transparet margin flex">

                <div class="container-box-date flex-sem">
                    <div class="inline">
                        <input type="text" id="input_data" name="input_data" class="input-text-lx" value="<?= date('d/m/Y'); ?>">
                        <div class="icon"> 
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="inline" style="padding-left:20px;">
                        <select name="p_tipo_usuario" id="p_tipo_usuario" class="dropmenu">
                            <option value="0" selected="selected">Tipo Usuário - Todos</option>
                            <option value="F">Funcionário</option>
                            <option value="A">Aluno</option>
                        </select>
                    </div>
                </div>
                
                <div class="container-box-date">
                    <input type="text" id="search_nome" name="search_nome" alt="lista-funcionario" class="input-search" placeholder="NOME" >
                    <div class="icon">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            
            </div>

            <div class="container-80-transparet flex-sem" id="box-turmas">

                <div class="container-box-date">
                    <select name="p_curso" id="p_curso" class="dropmenu">
                        <option value="0">Curso</option>
                        <option value="001">Infantil</option>
                        <option value="002">Fundamental I</option>
                        <option value="003">Fundamental II</option>
                        <option value="004">Médio</option>
                    </select>
                </div>
                
                <div class="container-box-date">
                    <select name="p_turma" id="p_turma" class="dropmenu">
                        <option value="">Turma</option>
                    </select>
                </div>

            </div>


            <div class="container-80-white lista-funcionario" id="container-periodo">               
                    <div class="sessao-container-title">
                        <!-- <ul class="menu-sessao">    
                            <li><a href="javascript:void(0);" data-id="funcionario">Funcionários</a></li>
                            <li><a href="javascript:void(0);" data-id="aluno">Alunos</a></li>
                        </ul> -->
                        <h2>Lista</h2>
                    </div>
                    <div class="sessao-list-item">
                            <!-- <div class="sessao-box-50 ">CHAPA</div> -->
                            <div class="sessao-box-50 ">NOME - CHAPA</div>
                            <div class="sessao-box-50 ">OPTOU NÃO ALMOÇAR</div>
                            <div class="sessao-box-50">TURMA</div>
                            <div class="sessao-box-50">SÉRIE</div>
                            <div class="sessao-box-50 ">CARGO</div> 
                            <div class="sessao-box-50 ">CHECK</div>
                       
                    </div>

                    <div class="tbody">
                        <?php foreach($lista_funcionario as $row): ?>
                        <div class="sessao-list-item tr">
                            <!-- <div class="sessao-box-50 td"><span> <?= $row['CODIGO']; ?> </span></div> -->
                            <div class="sessao-box-50 td" style="text-align:left; padding-left:10px;">
                                <span style="font-size:10px; color:red; display:block; font-weight:bold;"><?= $row['CODIGO']; ?></span>
                                <span style="font-weight:bold; font-size:12px;"> <?= $row['NOME']; ?></span>
                            </div>
                            <div class="sessao-box-50 td"><span> <?= $row['ALMOCO_HOJE']; ?> </span></div>
                            <div class="sessao-box-50 td">
                            <span> 
                                <?php
                                    if($row['TIPO_USUARIO'] == 'A'){
                                        echo $row['CD_TURMA'];
                                    }else{
                                        echo "-";
                                    }
                                ?>
                            </span></div> 
                            <div class="sessao-box-50 td"><span> <?php 
                                if(empty($row['SERIE'])){
                                    echo "-";
                                }else{
                                    echo $row['SERIE']." série";
                                }
                              ?> </span></div>
                            <div class="sessao-box-50 td"><span> <?= ($row['CARGO'] != "ALUNO") ? "FUNCIONARIO" : "ALUNO";  ?> </span></div>
                            <div class="sessao-box-50 td">
                                <span> 
                                    <div class="round-checkbox">
                                        <input type="checkbox" value="<?= $row['CODIGO']; ?>" class="input-checkbox" onclick="checked_funcionario('<?= $row['CODIGO']; ?>', this);" <?= ($row['CHECK_ATUAL'] == 'S') ? "checked='checked'" : ""; ?>/>
                                        <!-- <label for="checkbox-input"></label> -->
                                    </div>    
                                </span>
                            </div>
                        </div>
                        <?php endforeach; ?>                   
                    </div>
            </div>
        



        </div>

        <!-- <div class="rodape fixo">
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
            </div>
        </div> -->
    </div>



	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script>
    $(".menu-sessao li a").click(function(e){
        var id = $(this).data("id");
        $("#search_nome").val(id);


        e.preventDefault();
    });

    $("#box-turmas").hide();
    $("#p_tipo_usuario").change(function(e){
        var p_tipo_usuario = $(this).val();

        if(p_tipo_usuario == 'F'){
            $("#box-turmas").hide();
        }else if(p_tipo_usuario == 'A'){
            $("#box-turmas").show();
        }else{
            $("#box-turmas").show();
        }

        $.ajax({
            url: "<?= base_url(); ?>refeicao/listar_check/lst_tipo_usuario",
            type: 'POST',
            data:{
                p_tipo_usuario: p_tipo_usuario
            },
            beforeSend: function(){
                $("#container-periodo").html("<h2>Carregando...</h2>");
            },
            success: function(data){
                console.log(data);
                $("#container-periodo").html(data);
            }
        });

        e.preventDefault();
    });

    $("#p_curso").change(function(e){
        var p_codcurso = $(this).val();

        $.ajax({
            url: "<?= base_url(); ?>notificacao/filtro/lst_turma",
            type: 'POST',
            data: {
                codcurso: p_codcurso
            },
            beforeSend: function(){
                $("#p_turma").html("<option>Carregando...</option>");
            },
            success: function(data){
                $("#p_turma").html(data);
            }
        });

        e.preventDefault();
    });

    $("#p_turma").change(function(e){
        var p_turma = $(this).val();

        $.ajax({
            url: "<?= base_url(); ?>refeicao/listar_check/lst_filtro",
            type: "POST",
            data: {
                p_turma: p_turma
            },
            beforeSend: function(){
                $("#container-periodo").html("<h2>Carregando...</h2>");
            },
            success: function(data){
                $("#container-periodo").html(data);
            }
        });

        e.preventDefault();
    });


    function checked_funcionario(p_codigo, that){
        //console.log(p_codigo, that);
        var p_data = $("#input_data").val();
        var p_opcao;
        $(that).toggleClass("checked-box");
        $(that).parent().parent().parent().parent().toggleClass("bg-tr-checked");

        //console.log(p_data);

        // if($(that).hasClass("checked-box")){
        //     p_opcao = "S";
        // }else{
        //     p_opcao = "N";
        // }

        if($(that).is(":checked")){
            console.log("ok");
            p_opcao = "S";
        }else{
            console.log("nao ok");
            p_opcao = "N";
        }

        if(conexao() == 'offline'){
            alert("Verifique sua Conexão");
            return false;
        }else{
            $.ajax({
                url: "<?= base_url('refeicao/listar_check/form_check'); ?>",
                type: "POST",
                data: {
                    p_opcao: p_opcao,
                    p_codigo: p_codigo,
                    p_data: p_data
                },
                success: function(data){
                    console.log(data);
                }
            });
        }
    }

    function conexao(){
        if(navigator.onLine){
            return 'online';
        }else{
            return 'offline';
        }
    }



    $(function(){

        var date2 = new Date();
        date2.setDate(date2.getDate());

        $("#input_data").datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: date2,
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });

        $(".input-search").keyup(function(){
        //pega o css da tabela 
        var tabela = $(this).attr('alt');
                if($(this).val() != ""){
                    $("."+tabela+" .tbody>.tr").hide();
                    $("."+tabela+" .td:contains-ci('" + $(this).val() + "')").parent(".tr").show();
                }else{
                    $("."+tabela+" .tbody>.tr").show();
                }
            }); 
        });

        $.extend($.expr[":"], {
        "contains-ci": function(elem, i, match, array) {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }


     
    });
    </script>
</body>
</html>