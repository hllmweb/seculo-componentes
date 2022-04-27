<table class="tabela-1">
	<thead>
		<tr>
			<td>Curso / Série</td>
			<td>Turma</td>
			<td>Ações</td>
		</tr>
	</thead>

	<tbody>
	<?php foreach($listar as $dados): ?>
		<tr>
			<td><span><?= $dados['NOME']; ?></span></td>
			<td><span><?= $dados['CODTURMA']; ?></span></td>
			<td><a href="<?= base_url(); ?>avaliacao/questionamento?turma=<?= $dados['CODTURMA']; ?>&codetapa=<?= $dados['CODETAPA']; ?>&codusuario=<?= $codusuario; ?>" class="btn btn-link">Diário de Avaliação</a></td>
		</tr>
	<?php endforeach; ?>
		
	</tbody>
</table>