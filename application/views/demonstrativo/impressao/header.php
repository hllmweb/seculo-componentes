<div class="color-line"></div>
<table width="100%" style="border-collapse: collapse;  background: #F8F9FA;">
    <tr>
        <td colspan="2" style="background-color: #FFF; text-align: center;">
            <img src="<?=base_url('assets/images/logo-seculo-negativo.png')?>" height="90">        
        </td>
    </tr>
    <tr style="background-color: #FFFFFF;"> 
        <td style="border:1px solid #efefef; padding:5px;"> 
            <div style="text-align:left; color:#000; display:block; ">
                Nome: <strong><?= $listar[0]['NM_ALUNO']; ?></strong>
                <input type="hidden" id="p_ra" name="p_ra" value="<?= $listar[0]['RA']; ?>">
            </div>
        </td>

        <td style="border:1px solid #efefef;  padding:5px;">
            <div style="text-align:left; color:#000; display:block;">
                Turma: <strong><?= $listar[0]['CODTURMA']; ?></strong>
            </div>
        </td>
    </tr>
</table>