<br><br><br>
<table width="100%" style="border-collapse: collapse;  background: #fff;">
	<tbody>
		<tr>
			<td></td>
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">1º Bimestre</td>
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">2º Bimestre</td>
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">3º Bimestre</td>
			<td colspan="6" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">4º Bimestre</td>
		</tr>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5x; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
            <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RESULTADO</td>
		</tr>


        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_1B"])) ? "-" : $row["N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_1B"])) ? "-" : $row["N2_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_1B"])) ? "-" : $row["MAIC_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_1B"])) ? "-" : $row["MB_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_1B"])) ? "0" : $row["FT_1B"]; ?></td>

            <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_2B"])) ? "-" : $row["N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_2B"])) ? "-" : $row["N2_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_2B"])) ? "-" : $row["MAIC_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_2B"])) ? "-" : $row["MB_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_2B"])) ? "-" : $row["FT_2B"]; ?></td>

            <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_3B"])) ? "-" : $row["N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_3B"])) ? "-" : $row["N2_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_3B"])) ? "-" : $row["MAIC_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_3B"])) ? "-" : $row["MB_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_3B"])) ? "-" : $row["FT_3B"]; ?></td>

            <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_4B"])) ? "-" : $row["N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_4B"])) ? "-" : $row["N2_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_4B"])) ? "-" : $row["MAIC_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_4B"])) ? "-" : $row["MB_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_4B"])) ? "-" : $row["FT_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RESULTADO"])) ? "-" : $row['RESULTADO']; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>