<?php 
if(count($listar) > 0):
?>
<div class="content_tab_top">
    <span class="title"><?= $listar[0]['DIA']; ?></span>
</div>
<?php 
    $disciplina = "";
    foreach($listar as $row):
    if($disciplina != $row["DISCIPLINA"]):
?>
<div class="content_tab_top bg-tap">
    <span><?= $row["DISCIPLINA"]; ?></span>
</div>
<?php 
    endif;
?>

<div class="content_tab_main">
    <div class="fieldset">
        <div class="legend">
            <?= $row["HORAINICIAL"]." - ".$row["HORAFINAL"]; ?>
        </div>
        <span>
            <?php  
                if(!empty($row["CONTEUDO"]) || !empty($row["CONTEUDOEFETIVO"])){
                    echo $row["CONTEUDO"]."<br>".$row["CONTEUDOEFETIVO"];
                }else{
                    echo "Conteúdo não preenchido!";
                } 
            ?>    
        </span>
    </div>	
</div>

<?php 
    $disciplina = $row["DISCIPLINA"];
    endforeach;
else:
?>
<div class="content_tab_main center padding">
    <h2>Aguardando conteúdo ser liberado!</h2>
</div>
<?php 
endif;
?>