<?php 
	if(!empty($listar)):
	foreach($listar as $dados): 
?>
<div class="fieldset <?= ($dados['FL_FORMATO'] == 'O') ? 'bg-azul-claro' : 'bg-amarelo-claro'; ?>">
	<div class="box-left">
		<div class="legend">Disciplina
			<span>
			<?php echo $dados['DT_ALTERACAO_FEZ_PROVA']; #date("d/m/Y", strtotime($dados['DT_ALTERACAO_FEZ_PROVA'])); ?>
			</span>
		</div>
		<span><?= $dados["DISCIPLINAS"]; ?> - <?= ($dados["FL_FORMATO"] == 'O') ? "OBJETIVA" : "IMPRESSA" ; ?></span>
		<hr>
		<div class="legend">Etapa</div>
		<span><?= $dados["TITULO"]; ?></span>
	</div>
	<div class="box-right">
		<!-- <a href="<?= base_url('gabarito/resultado'); ?>?num_prova=<?= $dados['NUM_PROVA']; ?>&ra=<?= $dados['CD_ALUNO'] ?>&bimestre=<?= $dados['BIMESTRE']; ?>" class="btn btn-link"><i class="fas fa-eye"></i> </a> -->
	</div>
</div>
<?php 
	endforeach; 
	else:
?>
<h3 class="text-center padding">
	Não há informação.
</h3>
<?php 
	endif;
?>