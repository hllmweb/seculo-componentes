<?php if($etapa_questao == 0): ?>	
<ul class="wizard-list-content">
<li class="wizard-item-content">
	<form class="wizard-form">
		<h3 class="wizard-list-title">Aspectos Sócial Emocional</h3>
		<ul class="wizard-list-form">
			<li class="wizard-item-form">
				<div class="left-90"><strong>Pergunta</strong></div>
				<div class="right-10"><strong>1º Bimestre</strong></div>
			</li>


	<?php foreach($listar_aluno_questao as $dados): ?>	
		<?php if($dados['PERGUNTA'] == 0): ?>
			<li class="wizard-item-form">
				<div class="left-90">Apresentou adaptação escolar tranquila?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-0" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 1): ?>
			<li class="wizard-item-form">
				<div class="left-90">Relaciona-se bem com professores e colegas?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-1" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 2): ?>	
			<li class="wizard-item-form">
				<div class="left-90">É inquieto (a) e agitado (a)?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-2" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 3): ?>
			<li class="wizard-item-form">
				<div class="left-90">É independente em seus afazeres?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-3" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 4): ?>
			<li class="wizard-item-form">
				<div class="left-90">Participa das atividades propostas?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-4" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>												
		<?php elseif($dados['PERGUNTA'] == 5): ?>
			<li class="wizard-item-form">
				<div class="left-90">Demonstra agressividade quando contrariado (a)?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-5" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 6): ?>
			<li class="wizard-item-form">
				<div class="left-90">Participou ativamente das festas comemorativas?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-6" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 7): ?>
			<li class="wizard-item-form">
				<div class="left-90">Chora com frequência?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-7" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 8): ?>
			<li class="wizard-item-form">
				<div class="left-90">É assíduo(a)?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php endif; ?>


	<?php endforeach; ?>
		</ul>
	</form>
</li>
</ul>



<?php elseif($etapa_questao == 1): ?>
<ul class="wizard-list-content">
<li class="wizard-item-content">
	<form class="wizard-form">
	<h3 class="wizard-list-title">Aspectos Cognitivo</h3>
		<ul class="wizard-list-form">
			<li class="wizard-item-form">
				<div class="left-90"><strong>Pergunta</strong></div>
				<div class="right-10"><strong>1º Bimestre</strong></div>
			</li>


	<?php foreach($listar_aluno_questao as $dados): ?>
		<?php if($dados['PERGUNTA'] == 0): ?>
			<li class="wizard-item-form">
				<div class="left-90">Demonstra interesse em ouvir músicas?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-0" onchange="getValor(this.value, this,<?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 1): ?>
			<li class="wizard-item-form">
				<div class="left-90">Participa da rodinha?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-1" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 2): ?>	
			<li class="wizard-item-form">
				<div class="left-90">Gosta de ouvir histórias?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-2" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 3): ?>
			<li class="wizard-item-form">
				<div class="left-90">Consegue concentrar-se o tempo necessário?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-3" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 4): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece e identifica a cor primária AMARELO, VERMELHO e AZUL ?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-4" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>												
		<?php elseif($dados['PERGUNTA'] == 5): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece e vivencia as noções trabalhadas: GRANDE/ PEQUENO?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-5" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 6): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece a figura geométrica círculo?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-6" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 7): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece os numerais de 0 a 2?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-7" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 8): ?>
			<li class="wizard-item-form">
				<div class="left-90">Faz associação dos numerais a quantidade 0 a 2?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 9): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece a vogal A em letra bastão?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 10): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece as vogais A em letra cursiva?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 11): ?>
			<li class="wizard-item-form">
				<div class="left-90">Consegue colorir figuras simples obedecendo um limite?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 12): ?>
			<li class="wizard-item-form">
				<div class="left-90">Reconhece a primeira letra do seu nome?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
			<?php elseif($dados['PERGUNTA'] == 13): ?>
			<li class="wizard-item-form">
				<div class="left-90">Nomeia quantidades: MUITO/POUCO?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
			<?php elseif($dados['PERGUNTA'] == 14): ?>
			<li class="wizard-item-form">
				<div class="left-90">Diferencia objetos pesado e leve?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
			<?php elseif($dados['PERGUNTA'] == 15): ?>
			<li class="wizard-item-form">
				<div class="left-90">Gosta de desenhar?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
			<?php elseif($dados['PERGUNTA'] == 16): ?>
			<li class="wizard-item-form">
				<div class="left-90">Apresenta interesse por pinturas?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-8" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>

		<?php endif; ?>
	<?php endforeach; ?>
		</ul>
	</form>
</li>
</ul>




<?php elseif($etapa_questao == 2): ?>
<ul class="wizard-list-content">
<li class="wizard-item-content">
	<form class="wizard-form">
		<h3 class="wizard-list-title">Aspectos Psicomotor</h3>
		<ul class="wizard-list-form">
			<li class="wizard-item-form">
				<div class="left-90"><strong>Pergunta</strong></div>
				<div class="right-10"><strong>1º Bimestre</strong></div>
			</li>


	<?php foreach($listar_aluno_questao as $dados): ?>
		<?php if($dados['PERGUNTA'] == 0): ?>
			<li class="wizard-item-form">
				<div class="left-90">Conhece e nomeia as partes do seu corpo?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-0" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 1): ?>
			<li class="wizard-item-form">
				<div class="left-90">Consegue amassar e rasgar papel com facilidade?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-1" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 2): ?>	
			<li class="wizard-item-form">
				<div class="left-90">Participa com interesse das atividades de recreação dirigida?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-2" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 3): ?>
			<li class="wizard-item-form">
				<div class="left-90">Cai frequentemente?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-3" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php elseif($dados['PERGUNTA'] == 4): ?>
			<li class="wizard-item-form">
				<div class="left-90">Engatinha e passa por obstáculos corretamente?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-4" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>												
		<?php elseif($dados['PERGUNTA'] == 5): ?>
			<li class="wizard-item-form">
				<div class="left-90">Colabora com a arrumação dos brinquedos na sala de aula?</div>
				<div class="right-10">
					<select id="<?= $dados['ETAPA_QUESTAO']; ?>-5" onchange="getValor(this.value, this, <?= $dados['RA']; ?>)">
						<option value="">Selecione</option>
						<option value="">-----</option>
						<option <?php if ($dados['RESPOSTA'] == 'Sim') { echo 'selected="selected"';} ?> value="Sim">Sim</option>
						<option <?php if ($dados['RESPOSTA'] == 'Não') { echo 'selected="selected"';} ?> value="Não">Não</option>
						<option <?php if ($dados['RESPOSTA'] == 'Às Vezes') { echo 'selected="selected"';} ?> value="Às Vezes">Às Vezes</option>
					</select>
				</div>
			</li>
		<?php endif; ?>
	<?php endforeach; ?>
		</ul>
	</form>
</li>
</ul>

<?php endif; ?>