<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>
	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
</head>
<body>
	<!--topo-->
	<div class="app-main">

		<!--<h2>
			Este aplicativo encontre-se temporariamente DESATIVADO, por favor acesse o Portal Século para acompanhar o período letivo de seu filho <br> 
			<a href="http://portal.seculomanaus.com.br/FrameHTML/web/app/edu/PortalEducacional/login/">Portal Século Manaus</a>
		</h2>-->
		<?php
			#exit();
		?>



		<div id="tabs_container">
		<div class="header-top">
            <select class="dropmenu" id="dropmenu" onchange="loadDesempenho(this, <?= $ra; ?>);">
				<option value="12" selected="selected">Todas Etapas</option>
				<!-- <option value="11">1º Bim - N1</option> -->
				<!-- <option value="12">1º Bim - N2</option> -->
				<!-- <option value="13">13 - 1º. Bim - MAIC</option> -->
                <!-- <option value="14">14 - 1º. Bim - Simulado</option> -->
                <option value="16">1º Bim - Média</option>
                <!-- <option value="21">2º Bim - N1</option> -->
                <!-- <option value="22">2º Bim - N2</option> -->
                <!-- <option value="23">23 - 2º. Bim - MAIC</option> -->
                <!-- <option value="24">24 - 2º. Bim - Simulado</option> -->
                <option value="26">2º Bim - Média</option>
                <!-- <option value="31">3º Bim - N1</option> -->
                <!-- <option value="32">3º Bim - N2</option> -->
                <!-- <option value="33">33 - 3º. Bim - MAIC</option> -->
                <!-- <option value="34">34 - 3º. Bim - Simulado</option> -->
                <option value="36">3º Bim - Média</option>
                <!-- <option value="41">4º Bim - N1</option> -->
                <!-- <option value="42">4º Bim - N2</option> -->
                <!-- <option value="43">43 - 4º. Bim - MAIC</option> -->
                <!-- <option value="44">44 - 4º. Bim - Simulado</option> -->
                <option value="46">4º Bim - Média</option>
			</select>

		</div> 

		<div class="section tab_contents_container" id="search_desempenho">
            <div class="center padding flex">
                <div class="circle">
                    <span class="bold">Coeficiente de Rendimento</span>    
                    <span class="text"><?= number_format($coeficiente_todos[0]['MB1'],2,",","."); ?> Média 1º Bim</span>
                    <span class="text"><?= number_format($coeficiente_todos[0]['MB2'],2,",","."); ?> Média 2º Bim</span>
                    <span class="text"><?= number_format($coeficiente_todos[0]['MB3'],2,",","."); ?> Média 3º Bim</span>
                    <span class="text"><?= number_format($coeficiente_todos[0]['MB4'],2,",","."); ?> Média 4º Bim</span>
                </div>
            </div>
            <?php 
                $disciplina = "";
                $arr        = array();
            foreach($listar as $key => $item): 
            ?>
            <?php if(array_key_exists("CD_DISCIPLINA", $item)): ?>
                <?php $arr[$item['CD_DISCIPLINA']][] = $item; ?>
            <?php endif; 
            endforeach; 

            foreach($arr as $key_2 => $value2):
            ?>
            <div class="toggle-sessao">  
                <div class="toggle-title">
                    <?php echo $value2[0]["NM_DISCIPLINA"]; ?>
                </div>
                <div class="toggle-content">
                    <?php 
                        if($value2[0]["TIPO"] == "A" && !empty($value2[0]["TIPO"])){    
                            if(number_format($value2[0]["MEDIA"],2,",",".") == "10,00"){
                                $num_perc_a = "100";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "9,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "9,99"){
                                $num_perc_a = "90";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "8,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "8,99"){
                                $num_perc_a = "80";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "7,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "7,99"){
                                $num_perc_a = "70";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "6,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "6,99"){
                                $num_perc_a = "60";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "5,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "5,99"){
                                $num_perc_a = "50";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "4,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "4,99"){
                                $num_perc_a = "40";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "3,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "3,99"){
                                $num_perc_a = "30";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "2,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "2,99"){
                                $num_perc_a = "20";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") >= "1,00" && number_format($value2[0]["MEDIA"],2,",",".") <= "1,99"){
                                $num_perc_a = "10";
                            }
                            if(number_format($value2[0]["MEDIA"],2,",",".") == "0,00"){
                                $num_perc_a = "0";
                            }
                        }else{
                            $num_perc_a = "0";
                        }

                        if($value2[1]["TIPO"] == "T" && !empty($value2[1]["TIPO"])){    
                            if(number_format($value2[1]["MEDIA"],2,",",".") == "10,00"){
                                $num_perc_t = "100";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "9,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "9,99"){
                                $num_perc_t = "90";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "8,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "8,99"){
                                $num_perc_t = "80";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "7,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "7,99"){
                                $num_perc_t = "70";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "6,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "6,99"){
                                $num_perc_t = "60";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "5,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "5,99"){
                                $num_perc_t = "50";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "4,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "4,99"){
                                $num_perc_t = "40";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "3,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "3,99"){
                                $num_perc_t = "30";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "2,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "2,99"){
                                $num_perc_t = "20";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") >= "1,00" && number_format($value2[1]["MEDIA"],2,",",".") <= "1,99"){
                                $num_perc_t = "10";
                            }
                            if(number_format($value2[1]["MEDIA"],2,",",".") == "0,00"){
                                $num_perc_t = "0";
                            }
                        }else{
                            $num_perc_t = "0";
                        }

                        if($value2[2]["TIPO"] == "C" && !empty($value2[2]["TIPO"])){    
                            if(number_format($value2[2]["MEDIA"],2,",",".") == "10,00"){
                                $num_perc_c = "100";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "9,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "9,99"){
                                $num_perc_c = "90";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "8,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "8,99"){
                                $num_perc_c = "80";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "7,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "7,99"){
                                $num_perc_c = "70";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "6,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "6,99"){
                                $num_perc_c = "60";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "5,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "5,99"){
                                $num_perc_c = "50";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "4,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "4,99"){
                                $num_perc_c = "40";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "3,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "3,99"){
                                $num_perc_c = "30";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "2,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "2,99"){
                                $num_perc_c = "20";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") >= "1,00" && number_format($value2[2]["MEDIA"],2,",",".") <= "1,99"){
                                $num_perc_c = "10";
                            }
                            if(number_format($value2[2]["MEDIA"],2,",",".") == "0,00" || $value2[2]["MEDIA"] == null || empty($value2[2]["MEDIA"])){
                                $num_perc_c = "0";
                            }
                        }else{
                            $num_perc_c = "0";
                        }
                        
                    ?>


                    <div class="bar"><div class="percent-<?= $num_perc_a; ?> green"><span>Média do Aluno</span></div>    <div class="vfloat-right"><?= number_format($value2[0]["MEDIA"],2,",","."); ?></div></div>  
                    <div class="bar"><div class="percent-<?= $num_perc_t; ?> blue"><span>Média da Turma</span></div>     <div class="vfloat-right"><?= number_format($value2[1]["MEDIA"],2,",","."); ?></div></div>
                    <div class="bar"><div class="percent-<?= $num_perc_c; ?> orange"><span>Média do Curso</span></div>   <div class="vfloat-right"><?= number_format($value2[2]["MEDIA"],2,",","."); ?></div></div>      
                </div> 
            </div>
            
            <?php
                $disciplina = $value2[0]["NM_DISCIPLINA"];
                endforeach;
            ?>
		</div>

	</div>
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script>
        function loadDesempenho(p_codetapa, p_ra){
            p_etapa = p_codetapa.value;
            
            $.ajax({
                url: "<?= base_url('desempenho/inicio/search_desempenho'); ?>",
                type: "POST",
                data: {
                    ra: p_ra,
                    codetapa: p_etapa
                },
                beforeSend: function(){
                    $("#search_desempenho").html("<h2 style='text-align:center; margin:40px 0;'>Carregando...</h2>");
                },
                success: function(data){
                    $("#search_desempenho").html(data);
                }
            });
       
        }
    </script>
</body>
</html>
