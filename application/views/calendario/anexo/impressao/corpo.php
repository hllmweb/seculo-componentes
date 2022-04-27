
<?php foreach($listar as $row): ?>
<table width="100%" style="border-collapse: collapse;  background: #fff;">
	<tbody>
        
		<tr>
			<td colspan="2" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:left;">Disciplina</td>
        </tr>
        <tr>
			<td style="border:1px solid #a0a0a0; padding:5px;"><?= (empty($row["DC_CALENDARIO"])) ? "-" : $row["DC_CALENDARIO"]; ?></td>
			<td style="border:1px solid #a0a0a0; padding:5px;"><?= (empty($row["DATA"])) ? "-" : $row["DATA"]; ?></td>
        </tr> 
      
		<tr>
			<td colspan="2" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:left;">Informações da Prova</td>
        </tr>
        <tr>
            <td colspan="2" style="border:1px solid #a0a0a0; padding:5px; text-align:left;">
                <?= $row["INFO_PROVA"]; ?>
            </td>
        </tr>

       
    </tbody>
</table>
<br><br><br>
<?php endforeach; ?>
