<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header; ?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive_3.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body onload="bodyLoad();">
	<!--topo-->
	<div class="app-main">
		<div class="mensagem"></div>
		<header class="header-top">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?> > <span class="text"><?= $turma; ?></span></h2>
			</div>
			<div class="box right">
				<div class="inline">
					<input type="text" name="dt_acompanhamento" id="dt_acompanhamento" placeholder="00/00/0000" class="input-search" data-turma="<?= $turma; ?>" data-codusuario="<?= $codusuario; ?>" data-search="ok" value="<?= $dt_acompanhamento; ?>">
					<!--<input type="hidden" name="p_turma" id="p_turma" value="<?php #echo $listar[0]['CODTURMA']; ?>">
					<input type="hidden" name="search" id="search" value="ok">-->
					<!-- <button class="btn btn-link">Buscar</button> -->
				</div>
				
			</div>
		</header>
		

		<form method="POST" id="form-1">	
		<?php 

		if(count($listar) > 0):
			foreach($listar as $dados): 
						
					if(!empty($dados['COLACAO'])){
						switch($dados['COLACAO']):
							case 'AT':
								// $opcao_text_1 = 'Aceitação Total
								// 				<i class="fas fa-star"></i>
								// 				<i class="fas fa-star"></i>
								// 				<i class="fas fa-star"></i>
								// 				<i class="fas fa-star"></i>';
								$opcao_text_1 = 'Fez';
								break; 
							case 'AP':
								// $opcao_text_1 = 'Aceitação Parcial
								// 				<i class="fas fa-star"></i>
								// 				<i class="fas fa-star"></i>
								// 				<i class="fas fa-star"></i>
								// 				<i class="far fa-star"></i>';
								$opcao_text_1 = 'Fez Pouco';
								break;
							case 'RP':
								// $opcao_text_1 = 'Repetiu
								// 				<i class="fas fa-star"></i>
								// 				<i class="fas fa-star"></i>
								// 				<i class="far fa-star"></i>
								// 				<i class="far fa-star"></i>';
								$opcao_text_1 = 'Repetiu';
								break;
							case 'RJ':
								// $opcao_text_1 = 'Rejeição
								// 				<i class="fas fa-star"></i>
								// 				<i class="far fa-star"></i>
								// 				<i class="far fa-star"></i>
								// 				<i class="far fa-star"></i>';
								$opcao_text_1 = 'Não Fez';

								break;
							case 'AS':
								// $opcao_text_1 = 'Ausente 
								// 				<i class="far fa-star"></i> 
								// 				<i class="far fa-star"></i> 
								// 				<i class="far fa-star"></i> 
								// 				<i class="far fa-star"></i>';
								$opcao_text_1 = 'Ausente';
								break;
						endswitch;
					}

					

					if(!empty($dados['ALMOCO'])){
						switch($dados['ALMOCO']):
							case 'AT':
								$opcao_text_2 = 'Fez';
								break; 
							case 'AP':
								$opcao_text_2 = 'Fez Pouco';
								break;
							case 'RP':
								$opcao_text_2 = 'Repetiu';
								break;
							case 'RJ':
								$opcao_text_2 = 'Não Fez';
								break;
							case 'AS':
								$opcao_text_2 = 'Ausente';
								break;
						endswitch;
					}					
			

					if(!empty($dados['LANCHE'])){
						switch($dados['LANCHE']):
							case 'AT':
								$opcao_text_3 = 'Fez';
								break; 
							case 'AP':
								$opcao_text_3 = 'Fez Pouco';
								break;
							case 'RP':
								$opcao_text_3 = 'Repetiu';
								break;
							case 'RJ':
								$opcao_text_3 = 'Não Fez';
								break;
							case 'AS':
								$opcao_text_3 = 'Ausente';
								break;
						endswitch;
					}								
			

					if(!empty($dados['SONO'])){
						switch($dados['SONO']):
							case 'TQ':
								$opcao_text_4 = 'Tranquilo';
								break;
							case 'AG':
								$opcao_text_4 = 'Agitado';
								break;
							case 'ND':
								$opcao_text_4 = 'Não Dormiu';
								break;
							case 'AS':
								$opcao_text_4 = 'Ausente';
								break;
						endswitch;
					}			

					if(!empty($dados['EVACUACAO'])){
						switch($dados['EVACUACAO']):
							case 'NO':
								$opcao_text_5 = 'Normal';
								break; 
							case 'NE':
								$opcao_text_5 = 'Não Evacuou';
								break;
							case 'AS':
								$opcao_text_5 = 'Ausente';
								break;
						endswitch;
					}			



				
			

				if($dados['STATUS_LOG'] == 'R'):
			?>
			<div class="section-item">	
			<div class="fieldset">
				<div class="box-left">
					<div class="legend bg-legend">
						Aluno<br>
						<span><?= $dados['NOME_ALUNO']; ?></span>
					</div>
					
					<div class="padding-no-top">
						<div class="flex">
							<div class="box-width-50">
								<div class="legend">Colação</div>
							</div>
							<div class="box-width-50 text-right">
								<span>
									<?= $opcao_text_1; ?>
								</span>
							</div>
						</div>
						
						<div class="flex">
							<div class="box-width-50">
								<div class="legend">Almoço</div>
							</div>
							<div class="box-width-50 text-right">
								<span>
									<?= $opcao_text_2; ?>
								</span>
							</div>
						</div>

						<div class="flex">
							<div class="box-width-50">
								<div class="legend">Lanche</div>
							</div>
							<div class="box-width-50 text-right">
								<span>
									<?= $opcao_text_3; ?>
								</span>
							</div>
						</div>

						<div class="flex">
							<div class="box-width-50">
								<div class="legend">Sono/Descanso</div>
							</div>	
							<div class="box-width-50 text-right">
								<span>
									<?= $opcao_text_4; ?>
								</span>
							</div>
						</div>

						<div class="flex">
							<div class="box-width-50">
								<div class="legend">Evacuação</div>
							</div>
							<div class="box-width-50 text-right">
								<span>
									<?= $opcao_text_5; ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="box-btn">
				<a href="javascript:history.back()" class="btn btn-link bg-blue inline padding block margin-lados">Voltar</a> 
			</div>


		</div>
			
			<?php 
				endif;
				endforeach;
				else:
			?>
			<p>Nenhum aluno associado nessa turma.</p>
			<?php 
				endif; 
			?>	
		<?php if($dados['STATUS_LOG'] == "P"): ?>
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
						<input type="hidden" name="p_dt_acompanhamento" id="p_dt_acompanhamento" value="<?= $dt_acompanhamento; ?>">
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
                                <option <?php if ($dados['COLACAO'] == "AS") echo 'selected="selected"'; ?> value="AS">Ausente</option>
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
                            <option <?php if ($dados['ALMOCO'] == "AT")  echo "selected='selected'"; ?> value="AT">Aceitação Total</option>
                            <option <?php if ($dados['ALMOCO'] == "AP")  echo "selected='selected'"; ?> value="AP">Aceitação Parcial</option>
                            <option <?php if ($dados['ALMOCO'] == "RP")  echo "selected='selected'"; ?> value="RP">Repetiu</option>
                            <option <?php if ($dados['ALMOCO'] == "RJ")  echo "selected='selected'"; ?> value="RJ">Rejeição</option>
                            <option <?php if ($dados['ALMOCO'] == "AS")  echo 'selected="selected"'; ?> value="AS">Ausente</option>
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
                            <option <?php if ($dados['LANCHE'] == "AS") echo 'selected="selected"'; ?> value="AS">Ausente</option>
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
                                <option <?php if ($dados['SONO'] == 'AS') { echo 'selected="selected"';} ?> value="AS">Ausente</option>
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
                            <option <?php if ($dados['EVACUACAO'] == 'AS') { echo 'selected="selected"';} ?> value="AS">Ausente</option>
						</select>
						<textarea class="textarea" name="p_obs_evacuacao_<?= $dados['RA']; ?>" placeholder="Observação da Evacuação..." <?= ($dados['STATUS_LOG'] == 'R') ? "readonly" : ""; ?>><?= $dados['OBS_EVACUACAO']; ?></textarea>
						<?php endif; ?>
					</td>

				</tr>

				<tr>
					<td colspan="5">


						<textarea style="width: 100%;" 
							name="p_observacao_<?= $dados['RA']; ?>" 
							id="p_observacao_<?= $dados['RA']; ?>" 
							class="textarea" 
							placeholder="Digite uma observação extra"
						>
							<?php if(!empty($dados['OBSERVACAO'])): ?>
							<?= $dados['OBSERVACAO']; ?>
							<?php endif; ?>
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
							<!--<a href="<?php #echo base_url(); ?>acompanhamento/diario?turma=<?= $turma; ?>&codusuario=<?= $codusuario; ?>" class="btn btn-link bg-red inline padding">Voltar</a>-->
							<a href="javascript:history.back()" class="btn btn-link bg-red inline padding">Voltar</a> 
						</div>
					</td>
				</tr>
				<?php 
					else: 
				?>
				<tr>
					<td colspan="6"><span>Nenhum aluno associado nessa turma</span></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table> 
		<?php endif; ?>
		</form>


	</div>
	<style>
			.true{
				background-color: rgb(199, 194, 194);
			}
			.false{
				background-color: rgb(163, 247, 163);
			}
	</style>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		var date2 = new Date();
		date2.setDate(date2.getDate());

		$("#dt_acompanhamento").datepicker({
			dateFormat: 'dd/mm/yy',
			maxDate: date2,
			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});
	</script>

	<script>


    // $('.textarea').on('textarea', function () {
    //     let texto = $(this).val().replace(/\s{2,}/g,' ');
    //     $(this).val($(this).val().replace(/\r?\n|\r/g,'').replace(/\s{2,}/g,' '));
    //     ///$('.textarea').val(texto);
    // });




		//ATUALIZA O DIARIO DE ACOMPANHAMENTO
		$(".mensagem").hide();
		$("#form-1").submit(function(e){
			
			dados 	= $(this).serialize();
			console.log("INFORMAÇÕES: "+dados);
			$.ajax({
				url: '<?= base_url(); ?>acompanhamento/diario/lancar',
				type: 'POST',
				data: dados,
				beforeSend: function(){
					$(".mensagem").show();
					$(".mensagem").html("Carregando...");
				},
				success: function(data){
					$(".mensagem").html(data);
					$(".mensagem").fadeOut(3000);
					console.log(data);
				}
			});

			e.preventDefault();		
		});

		//ATUALIZA O DIARIO DE ACOMPANHAMENTO CONFORME A DATA
		$("#dt_acompanhamento").change(function(e){
			dt_acompanhamento 	= escape($(this).val());
			p_turma 			= $(this).data("turma");
			p_cdUsuario 		= $(this).data("codusuario");
			search 				= $(this).data("search");


			$.ajax({
				url: '<?= base_url(); ?>acompanhamento/diario',
				type: 'POST',
				data: {
					dt_acompanhamento: dt_acompanhamento,
					turma: p_turma,
					codusuario: p_cdUsuario,
					search: search
				},
				beforeSend: function(){
					$("#form-1").html("<h3><center>Carregando...</center></h3>");
				},
				success: function(data){
					$("#form-1").html(data);
				}
			});


			e.preventDefault();
		});


		function bodyLoad(){
			//$("").parent().addClass("ok");
			// if($('.select option').is(':selected')){
			// 	$(this).addClass("ok");
			// }else{
			// 	$(this).addClass("nao-ok");
			// }

			// $('.select option').each(function() {
			//    if($(this).is(':selected')) {
			//        $(this).parent().addClass("ok");
			//      }else{
			//        $(this).parent().addClass("nao-ok");
			//      }
			// });
			
			// $('.select').find('option:selected').parent().addClass("ok");
// $("select").change(function() {
//     //var str = "";
//     $( "select option:selected" ).each(function() {
//       //str += $( this ).text() + " ";
//     	$(this).parent().addClass("ok");
//     });
//     //$( "div" ).text( str );
//   }).trigger( "change" );
// }
}
	</script>




	<script src="<?= base_url('assets/js/app.js'); ?>"></script>

</body>
</html>