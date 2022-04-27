<?php foreach($listar as $dados): ?>
<tr width="100%" border="0" class="tabela-3">
	<td></td>	
	<td class="text-left padding-left font-small"><?= $dados['QTD']." <span>x</span> ".$dados['NOMEFANTASIA']." <span>=</span> R$ ".number_format($dados['TOTAL_ITEM'],2,",","."); ?></td>
	<td></td>
	<td></td>
</tr>
<?php endforeach; ?>