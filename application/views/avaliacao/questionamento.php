<!DOCTYPE html>
<html>
<head>
	<title><?= $titulo_header; ?></title>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>?v=<?= time(); ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<!--topo-->
	<div class="app">
		
		<header class="header">
			<div class="box left">
				<h2 class="header-title">Avaliação Conceitual</h2>
			</div>
			<div class="box right">
				<a href="https://seculomanaus.com.br/componentes/portal/avaliacao/inicio?Context=CodUsuario=01135678200" class="btn btn-link">
					Voltar
				</a>	
			</div>
		</header>

		<table class="tabela-1">
			<thead>
				<tr>
					<td>Aluno</td>
					<td>Turma</td>	
					<td>Bimestre</td>
					<td>Ação</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($listar as $dados): ?>
				<tr data-id="<?= $dados['CODIGO']; ?>" data-ra="<?= $dados['RA']; ?>"  data-turma="<?= $dados['CODTURMA']; ?>" class="toggle-click">
					<td>
						<span><?= $dados['RA']."-".$dados['NOME_ALUNO']; ?></span>
					</td>
					<td>
						<span><?= $dados['CODTURMA']; ?></span>
					</td>
					<td>
						<span><?= $dados['PERIODO']; ?></span>
					</td>
					<td>
						<button class="btn btn-link bg-green"><i class="fas fa-sort-down"></i> Abrir Avaliação</button>
					</td>
				</tr>
				<tr class="none" id="tabela_etapa_questao_<?= $dados['RA']; ?>">
					<td colspan="4">
						<div class="tabela-form">
							<div class="left-20">
								<ul class="wizard-list">
									<li class="wizard-item"><a href="javascript:void(0)" class="wizard-link menu-activo" data-target="<?= $dados['CODIGO']; ?>-0" data-ra="<?= $dados['RA']; ?>" data-turma="<?= $dados['CODTURMA']; ?>" data-etapa="16">Aspecto Social</a></li>
									<li class="wizard-item"><a href="javascript:void(0)" class="wizard-link" data-target="<?= $dados['CODIGO']; ?>-1" data-ra="<?= $dados['RA']; ?>" data-turma="<?= $dados['CODTURMA']; ?>" data-etapa="16">Aspecto Cognitivo</a></li>
									<li class="wizard-item"><a href="javascript:void(0)" class="wizard-link" data-target="<?= $dados['CODIGO']; ?>-2" data-ra="<?= $dados['RA']; ?>" data-turma="<?= $dados['CODTURMA']; ?>" data-etapa="16">Aspecto Psicomotor</a></li>
								</ul>
							</div>

							
							<div class="right-80" id="tabela_questao_<?= $dados['RA']; ?>">


							</div>
						</div>
					</td>					

				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>




	</div>


	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		$(".wizard-list .wizard-item a").click(function(e){
			$(".wizard-list .wizard-item a").toggleClass('menu-activo');
			e.preventDefault();
		});


		//ABRE E FECHA A AVALIAÇÃO
		$(".tabela-1 tbody tr.toggle-click").click(function(e){
			codetapa = $(this).data("id");
			ra 		 = $(this).data("ra");
			turma 	 = $(this).data("turma");

			$(this).toggleClass("color");
			//$(this).next().attr("id","tabela_questao_"+ra).removeClass("none");
			//$(this).next().attr("id","tabela_questao_"+ra).addClass("block");
			//$(this).next().attr("data-form",codetapa).toggleClass("toggle");
			if($(this).hasClass("color")){
				$(this).find("td:last-child").html("<button class='btn btn-link bg-red'><i class='fas fa-sort-up'></i> Fechar Avaliação</button>");
				$(this).next().attr("id","tabela_etapa_questao_"+ra).removeClass("none");
				$(this).next().attr("id","tabela_etapa_questao_"+ra).addClass("block");	
			}else{
				$(this).find("td:last-child").html("<button class='btn btn-link bg-green'><i class='fas fa-sort-down'></i>Abrir Avaliação</button>");
				$(this).next().attr("id","tabela_etapa_questao_"+ra).removeClass("block");	
				$(this).next().attr("id","tabela_etapa_questao_"+ra).addClass("none");
			}
			/*console.log("id: "+codetapa);
			console.log("ra: "+ra);
			console.log("turma: "+turma);*/
			e.preventDefault();
		})

		//ABRIR FORM DE AVALIAÇÃO
		$(".wizard-link").click(function(e){			
			etapa 	  = $(this).data("target");
			ra 		  = $(this).data("ra");
			turma     = $(this).data("turma");
			codetapa  = $(this).data("etapa");

			console.log(ra);
			console.log("codetapa"+codetapa);
			console.log(turma);
			console.log(etapa);
			result_arr = etapa.split("-");

			// result_arr = id_quest.split("#");
			//console.log(id_quest);
			$.ajax({
				url: '<?= base_url(); ?>avaliacao/questionamento/etapa',
				type: 'POST',
				data: {
					etapa: etapa,
					ra: ra,
					turma: turma,
					codetapa: codetapa,
					etapa_questao: result_arr[1]
				},
				success: function(data){
					$("#tabela_questao_"+ra).html(data);
				}
			});

			e.preventDefault();
		});



		//SALVAR QUESTIONAMENTO
		function getValor(valor, id, ra) {
			idstatus 		= $(id).attr("id");
			result_arr 		= idstatus.split("-");
			codigo 			= result_arr[0];
			etapa 			= result_arr[1];
			pergunta        = result_arr[2];

			codresponsavel  = $("#codresponsavel").val();
			codetapa 		= $("#codetapa").val();
			codturma 		= $("#codturma").val();
			resposta 		= valor;			
			etapa_questao   = codigo+"-"+etapa;

			/*
			console.log("RA: "+ra);
			console.log("ETAPA_QUESTAO: "+etapa_questao);
			console.log("PERGUNTA: "+pergunta);
			console.log("RESPOSTA: "+resposta);
			*/
			
			
			$.ajax({
				url: '<?= base_url(); ?>avaliacao/questionamento/lancar',
				type: 'POST',
				data: {
					ra: ra,
					etapa_questao: etapa_questao,
					pergunta: pergunta,
					resposta: resposta  
				},
				success: function(data){
					console.log(data);
				}
			});
			
		}
	</script>
</body>
</html>