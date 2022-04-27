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
            <div class="container-80-transparet">

            </div>

            <div class="container-80-transparet">               
                <!-- <div class="round">
                        <input type="checkbox" id="checkbox"/>
                        <label for="checkbox"></label>
                </div> -->
                <div class="content-text-dia">
                    <div class="content-text-date"><?= date('d/m/Y'); ?></div>
                    <?php if($libera_acesso == 1): ?>
                    <div class="content-text-time">00:00:00</div>
                    <?php endif; ?>
                    <div class="content-text-confirme">ALMOÇO NÃO CONFIRMADO</div>
                </div>
                <div class="content-text-p">
                    <?php if($libera_acesso == 0): ?>
                    HORÁRIO ENCERRADO!
                    <?php else: ?>
                    <div class="content-isentar">CLIQUE PARA ISENTAR SUA REFEIÇÃO</div>
                    <div class="content-isento">ALMOÇO ISENTO</div>
                    <?php endif; ?>     
                </div>
            </div>
            <div class="sessao">
                <a href="#" class="check-circulo<?= (count($confirma_refeicao) == 0 && empty($confirma_refeicao)) ? "" : " checked"; ?><?= ($libera_acesso == 0) ? " lock" : ""; ?>" data-chapa="<?= $chapa; ?>" data-libera="<?php echo $libera_acesso; ?>">
                    <span><i class='fas fa-check'></i></span>
                </a>
            </div>
            <div class="content-text-p">
                <div class="content-isentar">
                    Você tem até <strong>08:30 Horas</strong>
                </div>
            </div>


            <?php if(count($lista_subordinado) >= 1): ?>
            <div class="sessao-container">
                <div class="container-80-white">
                    <div class="sessao-container-title">Time do Gestor</div>
                    <?php foreach($lista_subordinado as $row): ?>
                    <div class="sessao-list-item">
                        <div class="sessao-box-80">
                            <?= $row['NOME']; ?>
                        </div>
                        <div class="sessao-box-20 <?= ($row['CHECK_STATUS'] == 'S') ? "checked-btn" : ""; ?>" id="p_<?= $row['CHAPA']; ?>" data-id="<?= $row['CHAPA']; ?>">
                            <a href="javascript:void(0);" onclick="confirma('<?= $row['CHAPA'] ?>', this); return false;">
                                <span> 
                                   <?= ($row['CHECK_STATUS'] == 'S') ? "Almoçar <i class='fas fa-check'></i>" : "Não Almoçar <i class='fas fa-times'></i>"; ?> 
                                </span>    
                            </a>
                        </div>


                    </div>
                    <?php endforeach; ?>
                </div>
            </div>    
            <?php endif; ?>

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
                <a href="<?= base_url('refeicao/isentar_periodo'); ?>" class="rodape-menu-item">
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
    <script>

        if($(".check-circulo").hasClass("checked")){ //reifeicao confirmada
            $(".content-text-time").hide();
            $(".content-isentar").hide();
            $(".content-isento").show();
            $(".content-text-confirme").show();
            $(".check-circulo").html("<i class='fas fa-times'></i>");
        }else{                                       //reifeicao não confirmada  
            $(".content-text-time").show();
            $(".content-isentar").show();
            $(".content-isento").hide();
            $(".content-text-confirme").hide();
            $(".check-circulo").html("<span><i class='fas fa-check'></i></span>");
        }


        $(document).on("click",".check-circulo",function(e){
            var p_opcao;
            var libera_acesso = $(this).data("libera");
            var p_chapa = $(this).data("chapa");

            if(libera_acesso == 0){
                alert("Horário Não Permitido");
                $(this).addClass("lock");
            }else{

                $.ajax({
                    url: "<?= base_url('refeicao/inicio/verifica_acesso'); ?>",
                    type: "POST",
                    success: function(data){
                        if(data == 0){
                            console.log("H nao permitido");

                            alert("Horário Não Permitido");
                            $(".check-circulo").addClass("lock");
                            $(".content-text-time").hide();
                            //return false;
                        }else{
                            console.log("H permitido");

                            $(".check-circulo").toggleClass("checked");
                            // var p_chapa = $(this).data("chapa");
                            console.log(p_chapa);


                            if($(".check-circulo").hasClass("checked")){
                                p_opcao = "N";
                                $(".content-isentar").hide();
                                $(".content-isento").show();
                                $(".content-text-time").hide();
                                $(".content-text-confirme").show();
                                $(".check-circulo").html("<i class='fas fa-times'></i>");
                            }else{
                                p_opcao = "S";
                                $(".content-isentar").show();
                                $(".content-isento").hide();
                                $(".content-text-time").show();
                                $(".content-text-confirme").hide();
                                $(".check-circulo").html("<span><i class='fas fa-check'></i></span>");
                            }

                            $.ajax({
                                url: "<?= base_url('refeicao/form/index'); ?>",
                                type: "POST",
                                data: {
                                    p_opcao: p_opcao,
                                    p_chapa: p_chapa
                                },
                                success: function(data){
                                    console.log(data);
                                }
                            });

                        }
                    }
                });
                // if(verifica_lock() == 0){
                //     console.log("Horário não permitido");
                //     // alert("Horário Não Permitido");
                //     // $(this).addClass("lock");

                //     return false;
                // }else{
                //     console.log("Horário permitido");
                //     return false;
                // }
                
                // $(this).toggleClass("checked");
                // var p_chapa = $(this).data("chapa");

                // if($(this).hasClass("checked")){
                //     p_opcao = "N";
                //     $(".content-isentar").hide();
                //     $(".content-isento").show();
                //     $(".content-text-time").hide();
                //     $(".content-text-confirme").show();
                //     $(this).html("<i class='fas fa-times'></i>");
                // }else{
                //     p_opcao = "S";
                //     $(".content-isentar").show();
                //     $(".content-isento").hide();
                //     $(".content-text-time").show();
                //     $(".content-text-confirme").hide();
                //     $(this).html("<span><i class='fas fa-check'></i></span>");
                // }

                // $.ajax({
                //     url: "<?= base_url('refeicao/form/index'); ?>",
                //     type: "POST",
                //     data: {
                //         p_opcao: p_opcao,
                //         p_chapa: p_chapa
                //     },
                //     success: function(data){
                //         console.log(data);
                //     }
                // });
            }
            e.preventDefault();
        }); 


        function confirma(p_chapa, that){
            $(that).toggleClass("checked-btn");
            

            if($(that).hasClass("checked-btn")){
                p_opcao   = "S";
                txt_opcao = "Almoçar <i class='fas fa-check'></i>";
                $(that).find("span").html(txt_opcao);
            }else{
                p_opcao   = "N";
                txt_opcao = "Não Almoçar <i class='fas fa-times'></i>";
                $(that).find("span").html(txt_opcao);
            }

            console.log(p_opcao+p_chapa);

            $.ajax({
                url: "<?= base_url('refeicao/form/index'); ?>",
                type: "POST",
                data: {
                    p_opcao: p_opcao,
                    p_chapa: p_chapa
                },
                success: function(data){
                   return data;
                }
            });

          
        }
        

        function verifica_lock(){
            $.ajax({
                url: "<?= base_url('refeicao/inicio/verifica_acesso'); ?>",
                type: "POST",
                success: function(data){
                    console.log(data);
                }
            });
        }


      
       
        //cronometro
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
                $(".content-text-time").html(horaImprimivel);
                setTimeout('startCountdown()',1000);
            
                tempo--;
            } else {
                horaImprimivel = '00:00:00';
                $(".content-text-time").html(horaImprimivel);
            }

        }
        startCountdown();      
    </script>   
</body>
</html>