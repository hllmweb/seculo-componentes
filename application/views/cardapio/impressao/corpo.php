<table width="100%" border="1" cellpadding="8" style="font-family: Calibre; font-size:12px; border-collapse: collapse; margin-top:20px; margin-bottom:20px; position: relative;">
	<thead>	
		<tr>
			<td></td>
			<td style="background-color: yellow; text-align: center; font-weight: bold;">Segunda</td>
			<td style="background-color: yellow; text-align: center; font-weight: bold;">Terça</td>
			<td style="background-color: yellow; text-align: center; font-weight: bold;">Quarta</td>
			<td style="background-color: yellow; text-align: center; font-weight: bold;">Quinta</td>
			<td style="background-color: yellow; text-align: center; font-weight: bold;">Sexta</td>
		</tr>
	</thead>
	<tbody>
		<?php 
			$id_tipo = 0;
			foreach($listar as $dados): 
		?>
		<?php 	
			if($id_tipo != $dados["ID_TIPO"]): 
		?>		
		<tr>
			<td colspan="6" style="text-align: center; background-color: #1F497D; color:#FFF; font-weight: bold;"><?php echo $dados['DC_TIPO']; ?></td>
		</tr>
		<?php 
			endif; 
		?>
		<tr>
			<td style="background-color: #C6D9F1; text-align: center; font-weight: bold;"><?= $dados['DC_OPCAO']; ?></td>
			<td style="text-align: center;"><?= $dados['SEG_DESC'] ?></td>
			<td style="text-align: center;"><?= $dados['TER_DESC'] ?></td>
			<td style="text-align: center;"><?= $dados['QUA_DESC'] ?></td>
			<td style="text-align: center;"><?= $dados['QUI_DESC'] ?></td>
			<td style="text-align: center;"><?= $dados['SEX_DESC'] ?></td>
		</tr>
		<?php 
			$id_tipo = $dados["ID_TIPO"];
			endforeach; 
		?> 				
	</tbody>
</table>	
<div style="text-align: left; font-size:10px !important; margin-top:20px;">
Cardápio elaborado para fornecer 20% das necessidades nutricionais diárias nos lanches, 30% nas refeições principais (almoço).     Elaborado por: Andreza Lira - Nutricionista - CRN7/ 8428
<br>
<strong>Observações:</strong>
 <ul>
 	<li>O prato principal e a opção do cardápio para a Educação Infantil será sempre desfiado ou em cubos.</li>
 	<li>Embutidos não serão servidos, sempre substituídos por carne ou frango grelhados.</li>
 	<li>Sempre teremos frutas nos lanches como opção, caso a criança não aceite lanchar a opção principal.</li>
 	<li>Cardápio sujeito a alterações.</li>
 </ul>
</div>