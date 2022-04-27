<form method="POST" id="form-1">
		<table class="tabela-1">
			<thead>
				<tr>
					<td>Aluno</td>
					<td>Lanche da Manhã</td>	
					<td>Almoço</td>
					<td>Lanche da Tarde</td>
					<td>Sono/Descanso</td>
					<td>Evacuação</td>
				</tr>
			</thead>
			<tbody>

			<?php 

				if(count($listar) > 0):
					foreach($listar as $dados): 
			?>				
				<tr>
					<td colspan="1" rowspan="2">
						<span><?= $dados['NOME_ALUNO']; ?></span>
						
						<!--lista de campos escondidos-->
						<input type="hidden" name="p_dt_acompanhamento" id="p_dt_acompanhamento" value="<?= $dados['DT_ACOMPANHAMENTO']; ?>">
						<input type="hidden" name="p_ra_<?= $dados['RA']; ?>" id="p_ra_<?= $dados['RA']; ?>" value="<?= $dados['RA']; ?>">
						<input type="hidden" name="p_turma" id="p_turma" value="<?= $dados['CODTURMA']; ?>">	
					</td>

					<td>
						<?php if($dados['STATUS_LOG'] == 'R'): ?>
							<?php 
								switch($dados['COLACAO']):
									case 'AT':
										$opcao_text = '<strong>Aceitação Total</strong>';
										break; 
									case 'AP':
									    $opcao_text = '<strong>Aceitação Parcial</strong>';
									    break;
									case 'RP':
										$opcao_text = '<strong>Repetiu</strong>';
										break;
									case 'RJ':
										$opcao_text = '<strong>Rejeição</strong>';
										break;
									case 'AS':
										$opcao_text = '<strong>Ausente</strong>';
										break;
								endswitch;
							?>

						<?= (($dados['COLACAO'] == NULL && empty($dados['COLACAO'])) && $dados['OBS_COLACAO'] == NULL && empty($dados['OBS_COLACAO'])) ? "..." : $opcao_text."<span style='display:block; font-size:11px; font-weight:bold; color:red;text-align:left;'>Observação:</span><span style='background-color: rgba(234, 234, 234,0.8); display:block; border-radius:20px;'>".$dados['OBS_COLACAO']."</span>"; ?>
						

						<?php else: ?>	


						<select name="p_colacao_<?= $dados['RA']; ?>" id="p_colacao_<?= $dados['RA']; ?>" class="select <?= empty($dados['COLACAO']) ? 'true' : 'false' ?>" <?= ($dados['STATUS_LOG'] == 'R') ? "readonly='readonly' tabindex='-1' aria-disabled='true'" : ""; ?>>
							<option value="">Selecione</option>
							<option value="">------</option>
								<option <?php if ($dados['COLACAO'] == "AT") echo 'selected="selected"'; ?> value="AT">Aceitação Total</option>
                                <option <?php if ($dados['COLACAO'] == "AP") echo 'selected="selected"'; ?> value="AP">Aceitação Parcial</option>
                                <option <?php if ($dados['COLACAO'] == "RP") echo 'selected="selected"'; ?> value="RP">Repetiu</option>
                                <option <?php if ($dados['COLACAO'] == "RJ") echo 'selected="selected"'; ?> value="RJ">Rejeição</option>
						</select>
						<textarea class="textarea" name="p_obs_colacao_<?= $dados['RA']; ?>" placeholder="Observação da Colação..." <?= ($dados['STATUS_LOG'] == 'R') ? "readonly" : ""; ?>><?= $dados['OBS_COLACAO']; ?></textarea>
						<?php endif; ?>
					</td>

					<td>
						<?php if($dados['STATUS_LOG'] == 'R'): ?>
							<?php 
								switch($dados['ALMOCO']):
									case 'AT':
										$opcao_text = '<strong>Aceitação Total</strong>';
										break; 
									case 'AP':
									    $opcao_text = '<strong>Aceitação Parcial</strong>';
									    break;
									case 'RP':
										$opcao_text = '<strong>Repetiu</strong>';
										break;
									case 'RJ':
										$opcao_text = '<strong>Rejeição</strong>';
										break;
									case 'AS':
										$opcao_text = '<strong>Ausente</strong>';
										break;
								endswitch;
							?>
						
						<?= (($dados['ALMOCO'] == NULL && empty($dados['ALMOCO'])) && $dados['OBS_ALMOCO'] == NULL && empty($dados['OBS_ALMOCO'])) ? "..." : $opcao_text."<span style='display:block; font-size:11px; font-weight:bold; color:red;text-align:left;'>Observação:</span><span style='background-color: rgba(234, 234, 234,0.8); display:block; border-radius:20px;'>".$dados['OBS_ALMOCO']."</span>"; ?>						

						<?php else: ?>						
						<select class="select <?= empty($dados['ALMOCO']) ? 'true' : 'false' ?>" name="p_almoco_<?= $dados['RA']; ?>" id="p_almoco_<?= $dados['RA']; ?>" <?= ($dados['STATUS_LOG'] == 'R') ? "readonly='readonly' tabindex='-1' aria-disabled='true'" : ""; ?>>
							<option value="">Selecione</option>
							<option value="">-----</option>
                            <option <?php if ($dados['ALMOCO'] == "AT") echo "selected='selected'"; ?> value="AT">Aceitação Total</option>
                            <option <?php if ($dados['ALMOCO'] == "AP") echo "selected='selected'"; ?> value="AP">Aceitação Parcial</option>
                            <option <?php if ($dados['ALMOCO'] == "RP") echo "selected='selected'"; ?> value="RP">Repetiu</option>
                            <option <?php if ($dados['ALMOCO'] == "RJ") echo "selected='selected'"; ?> value="RJ">Rejeição</option>
						</select>
						<textarea class="textarea" name="p_obs_almoco_<?= $dados['RA']; ?>" id="p_obs_almoco_<?= $dados['RA']; ?>" placeholder="Observação do Almoço..." <?= ($dados['STATUS_LOG'] == 'R') ? "readonly" : ""; ?>><?= $dados['OBS_ALMOCO']; ?></textarea>
						<?php endif; ?>
					</td>

					<td>
						<?php if($dados['STATUS_LOG'] == 'R'): ?>

							<?php 
								switch($dados['LANCHE']):
									case 'AT':
										$opcao_text = '<strong>Aceitação Total</strong>';
										break; 
									case 'AP':
									    $opcao_text = '<strong>Aceitação Parcial</strong>';
									    break;
									case 'RP':
										$opcao_text = '<strong>Repetiu</strong>';
										break;
									case 'RJ':
										$opcao_text = '<strong>Rejeição</strong>';
										break;
									case 'AS':
										$opcao_text = '<strong>Ausente</strong>';
										break;
								endswitch;
							?>
						

						<?= (($dados['LANCHE'] == NULL && empty($dados['LANCHE'])) && $dados['OBS_LANCHE'] == NULL && empty($dados['OBS_LANCHE'])) ? "..." : $opcao_text."<span style='display:block; font-size:11px; font-weight:bold; color:red;text-align:left;'>Observação:</span><span style='background-color: rgba(234, 234, 234,0.8); display:block; border-radius:20px;'>".$dados['OBS_LANCHE']."</span>"; ?>	

						<?php else: ?>
						<select class="select <?= empty($dados['LANCHE']) ? 'true' : 'false' ?>" name="p_lanche_<?= $dados['RA']; ?>" id="p_lanche_<?= $dados['RA']; ?>" <?= ($dados['STATUS_LOG'] == 'R') ? "readonly='readonly' tabindex='-1' aria-disabled='true'" : ""; ?>>
							<option value="">Selecione</option>
							<option value="">------</option>
                            <option <?php if ($dados['LANCHE'] == "AT") echo "selected='selected'"; ?> value="AT">Aceitação Total</option>
                            <option <?php if ($dados['LANCHE'] == "AP") echo "selected='selected'"; ?> value="AP">Aceitação Parcial</option>
                            <option <?php if ($dados['LANCHE'] == "RP") echo "selected='selected'"; ?> value="RP">Repetiu</option>
                            <option <?php if ($dados['LANCHE'] == "RJ") echo "selected='selected'"; ?> value="RJ">Rejeição</option>
						</select>
						<textarea class="textarea" name="p_obs_lanche_<?= $dados['RA']; ?>" placeholder="Observação do Lanche..." <?= ($dados['STATUS_LOG'] == 'R') ? "readonly" : ""; ?>><?= $dados['OBS_LANCHE']; ?></textarea>	
						<?php endif; ?>					
					</td>

					<td>
						<?php if($dados['STATUS_LOG'] == 'R'): ?>
						
							<?php 
								switch($dados['SONO']):
									case 'AT':
										$opcao_text = '<strong>Aceitação Total</strong>';
										break; 
									case 'AP':
									    $opcao_text = '<strong>Aceitação Parcial</strong>';
									    break;
									case 'RP':
										$opcao_text = '<strong>Repetiu</strong>';
										break;
									case 'RJ':
										$opcao_text = '<strong>Rejeição</strong>';
										break;
									case 'TQ':
										$opcao_text = '<strong>Tranquilo</strong>';
										break;
									case 'AG':
										$opcao_text = '<strong>Agitado</strong>';
										break;
									case 'ND':
										$opcao_text = '<strong>Não Dormiu</strong>';
										break;
									case 'NO':
										$opcao_text = '<strong>Normal</strong>';
										break;
									case 'NE':
										$opcao_text	= '<strong>Não Evacuou</strong>';
										break;
									case 'AS':
										$opcao_text = '<strong>Ausente</strong>';
										break;
								endswitch;
							?>

						<?= (($dados['SONO'] == NULL && empty($dados['SONO'])) && $dados['OBS_SONO'] == NULL && empty($dados['OBS_SONO'])) ? "..." : $opcao_text."<span style='display:block; font-size:11px; font-weight:bold; color:red;text-align:left;'>Observação:</span><span style='background-color: rgba(234, 234, 234,0.8); display:block; border-radius:20px;'>".$dados['OBS_SONO']."</span>"; ?>	
						<?php else: ?>
						<select class="select <?= empty($dados['SONO']) ? 'true' : 'false' ?>" name="p_sono_<?= $dados['RA']; ?>" id="p_sono_<?= $dados['RA']; ?>" <?= ($dados['STATUS_LOG'] == 'R') ? "readonly='readonly' tabindex='-1' aria-disabled='true'" : ""; ?>>
							<option value="">Selecione</option>
							<option value="">-----</option>
								<option <?php if ($dados['SONO'] == 'TQ') { echo 'selected="selected"';} ?> value="TQ">Tranquilo</option>
                                <option <?php if ($dados['SONO'] == 'AG') { echo 'selected="selected"';} ?> value="AG">Agitado</option>
                                <option <?php if ($dados['SONO'] == 'ND') { echo 'selected="selected"';} ?> value="ND">Não Dormiu</option>
						</select>
						<textarea class="textarea" name="p_obs_sono_<?= $dados['RA']; ?>" placeholder="Observação do Sono/Descanso..." <?= ($dados['STATUS_LOG'] == 'R') ? "readonly" : ""; ?>><?= $dados['OBS_SONO']; ?></textarea>
						<?php endif; ?>
					</td>

					<td>
						<?php if($dados['STATUS_LOG'] == 'R'): ?>
						
							<?php 
								switch($dados['EVACUACAO']):
									case 'AT':
										$opcao_text = '<strong>Aceitação Total</strong>';
										break; 
									case 'AP':
									    $opcao_text = '<strong>Aceitação Parcial</strong>';
									    break;
									case 'RP':
										$opcao_text = '<strong>Repetiu</strong>';
										break;
									case 'RJ':
										$opcao_text = '<strong>Rejeição</strong>';
										break;
									case 'TQ':
										$opcao_text = '<strong>Tranquilo</strong>';
										break;
									case 'AG':
										$opcao_text = '<strong>Agitado</strong>';
										break;
									case 'ND':
										$opcao_text = '<strong>Não Dormiu</strong>';
										break;
									case 'NO':
										$opcao_text = '<strong>Normal</strong>';
										break;
									case 'NE':
										$opcao_text	= '<strong>Não Evacuou</strong>';
										break;
									case 'AS':
										$opcao_text = '<strong>Ausente</strong>';
										break;
								endswitch;
							?>

						<?= (($dados['EVACUACAO'] == NULL && empty($dados['EVACUACAO'])) && $dados['OBS_EVACUACAO'] == NULL && empty($dados['OBS_EVACUACAO'])) ? "..." : $opcao_text."<span style='display:block; font-size:11px; font-weight:bold; color:red;text-align:left;'>Observação:</span><span style='background-color: rgba(234, 234, 234,0.8); display:block; border-radius:20px;'>".$dados['OBS_EVACUACAO']."</span>"; ?>	

						<?php else: ?>						
						<select class="select <?= empty($dados['EVACUACAO']) ? 'true' : 'false' ?>" name="p_evacuacao_<?= $dados['RA']; ?>" id="p_evacuacao_<?= $dados['RA']; ?>" <?= ($dados['STATUS_LOG'] == 'R') ? "readonly='readonly' tabindex='-1' aria-disabled='true'" : ""; ?>>
							<option value="">Selecione</option>
							<option value="">----</option>
							<option <?php if ($dados['EVACUACAO'] == 'NO') { echo 'selected="selected"';} ?> value="NO">Normal</option>
                            <option <?php if ($dados['EVACUACAO'] == 'NE') { echo 'selected="selected"';} ?> value="NE">Não Evacuou</option>
						</select>
						<textarea class="textarea" name="p_obs_evacuacao_<?= $dados['RA']; ?>" placeholder="Observação da Evacuação..." <?= ($dados['STATUS_LOG'] == 'R') ? "readonly" : ""; ?>><?= $dados['OBS_EVACUACAO']; ?></textarea>
						<?php endif; ?>
					</td>

				</tr>

				<tr>
					<td colspan="5">
						<textarea style="width: 100%;" name="p_observacao_<?= $dados['RA']; ?>" id="p_observacao_<?= $dados['RA']; ?>" class="textarea" placeholder="Digite uma observação extra">
							<?= $dados['OBSERVACAO']; ?>
						</textarea>

						<?php if(!empty($dados['OBSERVACAO_RESP'])): ?>
						<div style="text-align: left !important; padding:5px !important; background-color: #b0e0e6 !important; font-size:12px; "><strong>Resposta do Pai:</strong> <?= $dados['OBSERVACAO_RESP']; ?></div>
						<?php endif; ?>

					</td>
				</tr>

				<?php 
					endforeach; 
				?>
				<tr class="no">
					<td colspan="6">
						<div class="row center">
							<?php if($listar[0]['STATUS_LOG'] != 'R'): ?>
							<button class="btn btn-link inline padding">Salvar</button>
							<?php endif; ?>
							<a href="<?= base_url(); ?>acompanhamento/diario?turma=<?= $listar[0]['CODTURMA']; ?>&codusuario=<?= $codusuario; ?>" class="btn btn-link bg-green inline padding">Voltar</a>
						</div>
					</td>
				</tr>
				<?php	
					else:
				?>
				<tr>
					<td colspan="6"><span>Nenhum aluno associado nessa turma</span></td>
				</tr>
				<?php 
					endif;
				?>
			</tbody>
		</table>
		</form>