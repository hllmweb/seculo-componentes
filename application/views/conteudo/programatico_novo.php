<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>
	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>"> -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
</head>
<body>
	<!--topo-->
	<div class="app-main">
		<!--<h2>
			Este aplicativo encontre-se temporariamente DESATIVADO, por favor acesse o Portal Século para acompanhar o período letivo de seu filho <br> 
			<a href="http://portal.seculomanaus.com.br/FrameHTML/web/app/edu/PortalEducacional/login/">Portal Século Manaus</a>
		</h2>-->



		<div id="tabs_container">
		<div class="header-top">
			<ul class="header-menu">
				<a href="javascript:void(0);" onclick="anteriorData();" class="seta-left"><i class="fas fa-chevron-left"></i></a>
				<input type="text" value="<?= date('d/m/Y'); ?>" id="p_data" name="p_data" class="input-text-lx center input-fontbold">
				<a href="javascript:void(0);" onclick="proximaData();" class="seta-right"><i class="fas fa-chevron-right"></i></a>
			</ul>
		</div>

		<div class="section tab_contents_container" id="conteudo_search">
				<div class="content_tab_top">
					<span class="title"><?= $listar[0]['DIA']; ?></span>
				</div>
				<?php 
					$disciplina = "";
					foreach($listar as $row):
					if($disciplina != $row["DISCIPLINA"]):
				?>
				<div class="content_tab_top bg-tap">
					<span><?= $row["DISCIPLINA"]; ?></span>
				</div>
				<?php 
					endif;
				?>

				<div class="content_tab_main">
					<div class="fieldset">
						<div class="legend">
							<?php echo $row["HORAINICIAL"]." - ".$row["HORAFINAL"]; ?>
						</div>
						<span>
							<?php  
								if(!empty($row["CONTEUDO"]) || !empty($row["CONTEUDOEFETIVO"])){
									echo $row["CONTEUDO"]."<br>".$row["CONTEUDOEFETIVO"];
								}else{
									echo "Conteúdo não preenchido!";
								} 
							?>
						</span>
					</div>	
				</div>



				<?php 
					$disciplina = $row["DISCIPLINA"];
					endforeach;
				?>

				



		</div>

	

	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<script>
		/*var semana = ["dom", "seg", "ter", "qua", "qui", "sex", "sab"];
		var dataAtual = new Date();
		console.log(semana[dataAtual.getDay()]);

		$(".header-menu li a").each(function(){
			rel = $(this).attr("rel").replace("#","");
			if(rel == semana[dataAtual.getDay()]){
				$(this).addClass("menu-activo");
				$("#"+rel).addClass("tab_contents_active");
				
				if($("#"+rel).hasClass("tab_contents_active")){
					$(".tab_contents_active").show();
				}
			}

		});*/



		$("#p_data").change(function(e){
			let p_data = $(this).val();
			let p_ra   = "<?= $ra; ?>";

			$.ajax({
				url: "<?= base_url(); ?>conteudo/programatico/programatico_conteudo_search",
				type: "POST",
				data: {
					p_data: p_data,
					p_ra:   p_ra
				},
				beforeSend: function(){
					$("#conteudo_search").html("<h2>Carregando...</h2>");
				},
				success: function(data){
					$("#conteudo_search").html(data);
				}
			});

			e.preventDefault();
		});

		
		//captura a data atual
		var p_date = new Date();
		var dia    = p_date.getDate();
		var mes    = p_date.getMonth()+1;
		var ano    = p_date.getFullYear();
	
		function pad2(num) {
			return (num < 10 ? '0' : '') + num
		}
	
		//aumenta a data
		function proximaData(){
			dia = dia+1;
			if(dia >= 1 && dia <= 31){

				ano_atual = ano;
				mes_atual = mes;
				console.log(pad2(dia)+"/"+pad2(mes)+"/"+ano);

				let p_ra   = "<?= $ra; ?>";
				var p_data_mod = pad2(dia)+"/"+pad2(mes)+"/"+ano;
				$("#p_data").val(p_data_mod);

				$.ajax({
					url: "<?= base_url(); ?>conteudo/programatico/programatico_conteudo_search",
					type: "POST",
					data: {
						p_data: p_data_mod,
						p_ra:   p_ra
					},
					beforeSend: function(){
						$("#conteudo_search").html("<h2>Carregando...</h2>");
					},
					success: function(data){
						$("#conteudo_search").html(data);
					}
				});		
				
				// if(dia == 31 && mes < 12){
				// 	mes	+= 1;
				// 	dia =  0;
				// }
					
				if(dia == 31 && ano == ano_atual){
					dia = 0;
					if(mes < 12){
						mes += 1;
					}else if(mes == 12){
						mes = 1;
						ano += 1;
					}
				}
	
			}
			// if(dia == 31 && mes == 12){
			// 	dia = 1;
			// 	mes = 1;
			// 	ano+=1;
			// 	console.log(pad2(dia)+"/"+pad2(mes)+"/"+ano);

			// 	var p_data_mod = pad2(dia)+"/"+pad2(mes)+"/"+ano;
			// 	$("#p_data").val(p_data_mod);
			// }
		}

		//diminui a data
		function anteriorData(){
			dia = dia-1;
			if(dia >= 1 && dia <= 31){
			
				ano_atual = ano;
				mes_atual = mes;
				console.log(pad2(dia)+"/"+pad2(mes)+"/"+ano);
				
				let p_ra   = "<?= $ra; ?>";
				var p_data_mod = pad2(dia)+"/"+pad2(mes)+"/"+ano;
				$("#p_data").val(p_data_mod);

				$.ajax({
					url: "<?= base_url(); ?>conteudo/programatico/programatico_conteudo_search",
					type: "POST",
					data: {
						p_data: p_data_mod,
						p_ra:   p_ra
					},
					beforeSend: function(){
						$("#conteudo_search").html("<h2>Carregando...</h2>");
					},
					success: function(data){
						$("#conteudo_search").html(data);
					}
				});				



				if(dia == 1 && ano == ano_atual){
					dia = 32;
					if(mes > 1){	 
						mes	-= 1;	
					}else if(mes == 1){
						mes = 12;
						ano -= 1;
					}
				}		

			}

			

		}

		var date2 = new Date();
		date2.setDate(date2.getDate());
		
		$("#p_data").datepicker({
			dateFormat: 'dd/mm/yy',
			//maxDate: date2,
			dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
			dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});
		

	    $("ul.header-menu li a").click(function(){
		    $("li a").removeClass("menu-activo");
		    $(this).addClass("menu-activo");
		});


		$(".tab_contents").hide();
		$(".btn-round").click(function(e){
			var target = $(this.rel);
			$(".tab_contents").not(target).hide();
			target.toggle();
			
			$(".header-menu > .tabs > li.active").removeClass("active");
			$(this).parent().addClass('active');


			$('#tabs_container > .tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');
		    $(this.rel).addClass('tab_contents_active');

		    
			e.preventDefault();
		});
	</script>
</body>
</html>