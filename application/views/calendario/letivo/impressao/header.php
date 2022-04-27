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