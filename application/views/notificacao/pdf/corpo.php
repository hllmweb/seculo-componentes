<table width="100%" border="1" cellpadding="8" style="font-family: Calibre; font-size:12px; border-collapse: collapse; margin-top:40px; margin-bottom:20px; position: relative; word-wrap:break-word;">
		<?php 
			$professor = ""; 
			foreach($listar as $dados): 
				if($dados['NOME'] != $professor):
		?>	
        <tr>
        <td colspan='5' style='border:1px solid #CCC; text-align:center; font-weight:bold; background-color:#CCC; color:#000; text-align:center; text-transform:uppercase;'>Nome do Professor</td>
        </tr>	
		<tr>
            <td colspan='5' style='border:1px solid #CCC; background-color:#CCC; color:#000; text-align:center;'><?= $dados['NOME']; ?></td>
        </tr>
		 <tr style='text-align:center; background-color:#a09f9f; font-size:18px; font-weight:bold; padding:20px; text-transform:uppercase;'>
                <td style='border:1px solid #CCC;'>Disciplina</td>
                <td style='border:1px solid #CCC;'>Curso</td>
                <td style='border:1px solid #CCC;'>Turma</td>
                <td style='border:1px solid #CCC;'>Data PDF</td>
                <td style='border:1px solid #CCC;'>Quantidade</td>
         </tr>

		<?php 
				endif; 
			$DataEspecifica = new DateTime($dados['DATAAULA']);
		?>

        <tr style='text-align:center; font-weight:bold;'>
            <td style='border:1px solid #CCC;'><?= $dados['DISCIPLINA']?></td>
            <td style='border:1px solid #CCC;'><?= $dados['CURSO']?></td>
            <td style='border:1px solid #CCC;'><?= $dados['CODTURMA']?></td>
            <td style='border:1px solid #CCC;'><?= $DataEspecifica->format('d/m/Y')?></td>
            <td style='border:1px solid #CCC;'><?= $dados['QUANTIDADE']?></td>
        </tr>



		<?php 
			$professor = $dados['NOME'];
			endforeach; 
		?> 		
</table>