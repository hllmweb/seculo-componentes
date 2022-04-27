<table width="100%" style="border-collapse: collapse;  background: #fff;">
		<tr>
			<td colspan="9" style="text-align:center; border:1px solid #efefef; padding:10px;">        
				<div style="font-weight: bold; color:#17365D; text-transform:uppercase; font-size:1rem; display:block;">
				    <!-- Demonstrativo de Notas -->
				    Demonstrativo de Notas
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="4" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">1º Bimestre</td>
			<td></td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">P1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">P2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>

		</tr>
        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_1B"])) ? "-" : $row["N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_1B"])) ? "-" : $row["N2_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_1B"])) ? "-" : $row["MAIC_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_1B"])) ? "-" : $row["MB_1B"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>