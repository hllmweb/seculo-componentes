<div class="section tab_contents_container" id="search_desempenho">
<div class="center padding flex">
    <div class="circle">
        <span class="bold">Coeficiente de Rendimento</span>    
        <?php if($codetapa_bimestre != 12): ?>
        <span class="text">
            <?= number_format($coeficiente_bimestre[0]['MB'],2,",","."); ?> Média <?= $bimestre; ?> 
        </span>
        <?php else: ?>
            <span class="text"><?= number_format($coeficiente_todos[0]['MB1'],2,",","."); ?> Média 1º Bim</span>
            <span class="text"><?= number_format($coeficiente_todos[0]['MB2'],2,",","."); ?> Média 2º Bim</span>
            <span class="text"><?= number_format($coeficiente_todos[0]['MB3'],2,",","."); ?> Média 3º Bim</span>                
            <span class="text"><?= number_format($coeficiente_todos[0]['MB4'],2,",","."); ?> Média 4º Bim</span>
        <?php endif; ?>
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