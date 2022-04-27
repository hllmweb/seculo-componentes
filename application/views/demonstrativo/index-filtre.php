<?php if($codetapa == 1): ?>
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
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N1 - 1º Bimestre</td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N2 - 1º Bimestre</td>
			<td></td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV3</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV4</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>

			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
		</tr>
        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N1_1B"])) ? "-" : $row["AV1_N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2__N1_1B"])) ? "-" : $row["AV2__N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV3_N1_1B"])) ? "-" : $row["AV3_N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV4_N1_1B"])) ? "-" : $row["AV4_N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_1B"])) ? "-" : $row["N1_1B"]; ?></td>


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N2_1B"])) ? "-" : $row["AV1_N2_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2_N2_1B"])) ? "-" : $row["AV2_N2_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_1B"])) ? "-" : $row["N2_1B"]; ?></td>

			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_1B"])) ? "-" : $row["MB_1B"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>

<?php elseif($codetapa == 2): ?>
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
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N1 - 2º Bimestre</td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N2 - 2º Bimestre</td>
			<td></td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV3</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV4</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>

			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
		</tr>
        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N1_2B"])) ? "-" : $row["AV1_N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2__N1_2B"])) ? "-" : $row["AV2__N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV3_N1_2B"])) ? "-" : $row["AV3_N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV4_N1_2B"])) ? "-" : $row["AV4_N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_2B"])) ? "-" : $row["N1_2B"]; ?></td>


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N2_2B"])) ? "-" : $row["AV1_N2_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2_N2_2B"])) ? "-" : $row["AV2_N2_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_2B"])) ? "-" : $row["N2_2B"]; ?></td>

			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_2B"])) ? "-" : $row["MB_2B"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>

<?php elseif($codetapa == 3): ?>
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
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N1 - 3º Bimestre</td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N2 - 3º Bimestre</td>
			<td></td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV3</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV4</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>

			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
		</tr>
        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N1_3B"])) ? "-" : $row["AV1_N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2__N1_3B"])) ? "-" : $row["AV2__N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV3_N1_3B"])) ? "-" : $row["AV3_N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV4_N1_3B"])) ? "-" : $row["AV4_N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_3B"])) ? "-" : $row["N1_3B"]; ?></td>


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N2_3B"])) ? "-" : $row["AV1_N2_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2_N2_3B"])) ? "-" : $row["AV2_N2_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_3B"])) ? "-" : $row["N2_3B"]; ?></td>

			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_3B"])) ? "-" : $row["MB_3B"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>


<?php elseif($codetapa == 4): ?>
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
			<td colspan="5" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N1 - 4º Bimestre</td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">N2 - 4º Bimestre</td>
			<td></td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV3</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV4</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>

			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">AV2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
		</tr>
        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N1_4B"])) ? "-" : $row["AV1_N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2__N1_4B"])) ? "-" : $row["AV2__N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV3_N1_4B"])) ? "-" : $row["AV3_N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV4_N1_4B"])) ? "-" : $row["AV4_N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_4B"])) ? "-" : $row["N1_4B"]; ?></td>


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV1_N2_4B"])) ? "-" : $row["AV1_N2_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["AV2_N2_4B"])) ? "-" : $row["AV2_N2_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_4B"])) ? "-" : $row["N2_4B"]; ?></td>

			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_4B"])) ? "-" : $row["MB_4B"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>

<?php elseif($codetapa == 0): ?>
<table width="100%" style="border-collapse: collapse;  background: #fff;">
		<tr>
			<td colspan="12" style="text-align:center; border:1px solid #efefef; padding:10px;">        
				<div style="font-weight: bold; color:#17365D; text-transform:uppercase; font-size:1rem; display:block;">
				    <!-- Demonstrativo de Notas -->
				    Boletim
				</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">1º Bimestre</td>
			<td colspan="4" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">2º Bimestre</td>
			<td colspan="3" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">3º Bimestre</td>
			<td colspan="4" style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; text-align:center;">4º Bimestre</td>
		</tr>
		<tr style="text-align: center;">
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold; width:250px;">Disciplina</td>
			<!-- <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>
<!-- 			<td style="border:1px solid #a0a0a0; padding:5x; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>
    <!--         <td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>
<!-- 			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N1</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">N2</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MAIC</td> -->
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MB</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">FALTAS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RS</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MBR</td>


			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MA</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">RF</td>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;">MF</td>
		</tr>


        <?php foreach($listar as $row): ?>
		<tr>
			<td style="border:1px solid #a0a0a0; padding:5px; font-weight:bold;"><?= $row["NM_DISCIPLINA"]; ?></td>
<!-- 		<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_1B"])) ? "-" : $row["N1_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_1B"])) ? "-" : $row["N2_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_1B"])) ? "-" : $row["MAIC_1B"]; ?></td> -->
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_1B"])) ? "-" : $row["MB_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_1B"])) ? "-" : $row["FT_1B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_1B"])) ? "-" : $row["MBR_1B"]; ?></td>

<!--             <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_2B"])) ? "-" : $row["N1_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_2B"])) ? "-" : $row["N2_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_2B"])) ? "-" : $row["MAIC_2B"]; ?></td> -->

			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_2B"])) ? "-" : $row["MB_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_2B"])) ? "-" : $row["FT_2B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RS_1"])) ? "-" : $row["RS_1"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_2B"])) ? "-" : $row["MBR_2B"]; ?></td>

<!--             <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_3B"])) ? "-" : $row["N1_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_3B"])) ? "-" : $row["N2_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_3B"])) ? "-" : $row["MAIC_3B"]; ?></td> -->


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_3B"])) ? "-" : $row["MB_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_3B"])) ? "-" : $row["FT_3B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_3B"])) ? "-" : $row["MBR_3B"]; ?></td>

<!--             <td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N1_4B"])) ? "-" : $row["N1_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["N2_4B"])) ? "-" : $row["N2_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MAIC_4B"])) ? "-" : $row["MAIC_4B"]; ?></td> -->


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MB_4B"])) ? "-" : $row["MB_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["FT_4B"])) ? "-" : $row["FT_4B"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RS_2"])) ? "-" : $row["RS_2"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MBR_4B"])) ? "-" : $row["MBR_4B"]; ?></td>


			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MA"])) ? "-" : $row["MA"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["RF"])) ? "-" : $row["RF"]; ?></td>
			<td style="text-align:center; border:1px solid #a0a0a0;"><?= (empty($row["MF"])) ? "-" : $row["MF"]; ?></td>
		</tr>
        <?php endforeach; ?>
	</tbody>
</table>




<?php endif; ?>