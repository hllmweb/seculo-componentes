      
        <div class="sessao-container-title">
            <!-- <ul class="menu-sessao">    
                <li><a href="javascript:void(0);" data-id="funcionario">Funcionários</a></li>
                <li><a href="javascript:void(0);" data-id="aluno">Alunos</a></li>
            </ul> -->
            <h2>Lista</h2>
        </div>
        <div class="sessao-list-item">
            
                <!-- <div class="sessao-box-50 ">CHAPA</div> -->
                <div class="sessao-box-50 ">NOME</div>
                <div class="sessao-box-50 ">OPTOU NÃO ALMOÇAR</div>
                <div class="sessao-box-50">TURMA</div>
                <div class="sessao-box-50">SÉRIE</div>
                <div class="sessao-box-50 ">CARGO</div> 
                <div class="sessao-box-50 ">CHECK</div>
            
        </div>

        <div class="tbody">
            <?php foreach($listar as $row): ?>
            <div class="sessao-list-item tr">
                <div class="sessao-box-50 td" style="text-align:left; padding-left:10px;">
                    <span style="font-size:10px; color:red; display:block; font-weight:bold;"><?= $row['CODIGO']; ?></span>
                    <span style="font-weight:bold; font-size:12px;"> <?= $row['NOME']; ?></span>
                </div>
                <div class="sessao-box-50 td"><span> <?= $row['NOME']; ?></span></div>
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
