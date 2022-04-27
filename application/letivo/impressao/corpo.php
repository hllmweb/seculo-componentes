<br><br><br>
<table width="100%" style="border-collapse: collapse;  background: #fff;">
	<tbody>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">Titulo</td>
            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">Data</td>
        </tr>
        <?php foreach($listar as $row): ?>
        <tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["NM_DISCIPLINA"])) ? "-" : $row["NM_DISCIPLINA"]; ?></td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["TITULO"])) ? "-" : $row["TITULO"]; ?></td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DT_PROVA"])) ? "-" : $row["DT_PROVA"]; ?></td>
        </tr> 
        <?php endforeach; ?>
    </tbody>
</table>