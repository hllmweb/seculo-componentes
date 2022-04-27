<table width="100%" style="border-collapse: collapse;  background: #F8F9FA;">
    <tr>
        <td colspan="2">
            <img src="<?=base_url('assets/images/top_header_imprimir.jpg')?>">        
        </td>
    </tr>
    <tr> 
        <td style="border:1px solid #efefef; padding:10px;"> 
            <div style="text-align:left; color:#000; margin:20px 0; display:block; ">
                Nome: <strong><?= $turma[0]['NOME']; ?></strong>
            </div>
        </td>

        <td style="border:1px solid #efefef;  padding:10px;">
            <div style="text-align:left; color:#000; margin:20px 0; display:block;">
                Turma: <strong><?= $turma[0]['TURMA']; ?></strong>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center; border:1px solid #efefef; padding:10px;">        
            <div style="font-weight: bold; color:#17365D; text-transform:uppercase; font-size:1rem; display:block;">
                <?= $titulo_header." - ".$data_calendario; ?>
            </div>
        </td>
    </tr>
</table>

<br>

<table width="100%" style="border-collapse: collapse;  background: #fff;">
    <tbody>
        <tr>
            <!-- <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">Disciplina</td> -->
            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">Titulo</td>
            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">Data</td>
        </tr>
        <?php foreach($listar as $row): ?>
        <tr>
           <!--  <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DISCIPLINA"])) ? "-" : $row["DISCIPLINA"]; ?></td> -->
            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DC_CALENDARIO"])) ? "-" : $row["DC_CALENDARIO"]; ?></td>
            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DATA"])) ? "-" : $row["DATA"]; ?></td>
        </tr> 
        <?php endforeach; ?>
    </tbody>
</table>