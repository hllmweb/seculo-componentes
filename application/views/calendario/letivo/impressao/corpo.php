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
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DISCIPLINA"])) ? "-" : $row["DISCIPLINA"]; ?></td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DC_CALENDARIO"])) ? "-" : $row["DC_CALENDARIO"]; ?></td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= (empty($row["DATA"])) ? "-" : $row["DATA"]; ?></td>
        </tr> 
        <?php endforeach; ?>
    </tbody>
</table>