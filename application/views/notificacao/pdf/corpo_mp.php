<table width="100%" border="1" cellpadding="8" style="font-family: Calibre; font-size:12px; border-collapse: collapse; margin-top:40px; margin-bottom:20px; position: relative; word-wrap:break-word;">
		<?php 
			$coddisc = ""; 
			foreach($listar as $dados): 
				if($dados['CODDISC'] != $coddisc):
		?>	
        <tr>
        <td colspan='2' style='border:1px solid #CCC; text-align:center; font-weight:bold; background-color:#CCC; color:#000; text-align:center; text-transform:uppercase;'>Disciplina</td>
        </tr>	
		<tr>
            <td colspan='2' style='border:1px solid #CCC; background-color:#CCC; color:#000; text-align:center;'>
                <?= $dados['CURSO']." - ".$dados['DISCIPLINA']; ?>        
            </td>
        </tr>
		 <tr style='text-align:center; background-color:#a09f9f; font-size:18px; font-weight:bold; padding:20px; text-transform:uppercase;'>
                <td style='border:1px solid #CCC;'>TURMA</td>
                <td style='border:1px solid #CCC;'>TIPO NOTA</td>
         </tr>

		<?php 
				endif; 
		?>

        <tr style='text-align:center; font-weight:bold;'>
            <td style='border:1px solid #CCC;'><?= $dados['CODTURMA']?></td>
            <td style='border:1px solid #CCC;'><?= $dados['TIPO_NOTA']?></td>
        </tr>



		<?php 
			$coddisc = $dados['CODDISC'];
			endforeach; 
		?> 		
</table>