<div class="app-main" id="conteudoModal">
	<header class="header-top">
		<div class="box left">
			<h2 class="header-title"><?= $titulo_header_1; ?></h2>
		</div>
		<div class="box right">
			<a href="javascript:void(0)" class="btn_x_modal_grande" onclick="fecharmodal(); return false;"><i class="fas fa-times"></i></a>
		</div>
	</header>
	<div class="row margin padding">
		<select id="tipo_transferencia" name="tipo_transferencia" class="input-100 block border-padding">
			<option>Selecione</option>
			<option value="1">Transferir Crédito P/ Almoço</option>
			<option value="2">Transferir Crédito Entre Alunos</option>
		</select>

		<form id="rel_1" class="form-bg disable border-top">
			<div class="row-100 block">
				<strong>Saldo Crédito</strong>
				<input type="text" name="saldo_credito_1" id="saldo_credito_1" readonly="readonly" disabled="disabled" value="<?= $lista[0]['CREDITO'] ?>" class="border-padding">
			</div>
			<div class="row-50 inline">
				<strong>Informe a qtd. do Almoço</strong>
				<input type="number" name="qtd_almoco" id="qtd_almoco" min="1" value="1" class="row-90 border-padding">
			</div>
			<div class="row-50 inline margin-left-nth">
				<strong>Total</strong>
				<input type="hidden" name="preco_almoco" id="preco_almoco" value="<?= $lista[0]['PRECO_ALMOCO']?>">
				<input type="text" name="valor_total" id="valor_total" value="<?= $lista[0]['PRECO_ALMOCO'] ?>" class="row-80 border-padding" readonly="readonly" disabled="disabled">
			</div>
			<!--<input type="number" id="valor_transferencia" name="valor_transferencia" step="0.01" value="1.00" class="input-40 block valor_transferencia"> -->
			<div class="box-bottom">
				<input type="hidden" id="ra_origem" name="ra_origem" value="<?= $ra; ?>">
				<button class="btn btn-link bg-green padding block">Confirmar</button>
				<!-- <button class="btn btn-link bg_red padding block" onclick="fecharpopup(); return false;">Cancelar</button> -->
			</div>
		</form>

		<form id="rel_2"  class="disable border-top">
			<div class="row-100 block">
				<strong>Saldo Crédito</strong>
				<input type="text" name="saldo_credito_2" id="saldo_credito_2" class="border-padding row-90" readonly="readonly" disabled="disabled" value="<?= $lista[0]['CREDITO'] ?>">
			</div>
			<div class="row-100 block">
				<strong>Aluno Destino</strong>
				<select id="ra_aluno" name="ra_aluno" class="input-100 block border-padding">
					<option value="0">Selecione</option>
					<?php foreach($aluno as $info_aluno): ?>
					<?php if($info_aluno['CD_ALUNO'] != $ra): ?>	
					<option value="<?= $info_aluno['CD_ALUNO']; ?>"><?= $info_aluno['NM_USUARIO']; ?></option>
					<?php endif; ?> 
					<?php endforeach; ?>
				</select>
			</div>
			<div class="row-50 inline">
				<strong>Valor a Transferir</strong>
				<input type="text" name="valor_transferencia" id="valor_transferencia" class="row-80 border-padding">
			</div>
			
			<div class="box-bottom">
				<input type="hidden" id="ra_origem_2" name="ra_origem_2" value="<?= $ra; ?>">
				<button class="btn btn-link bg-green padding block">Confirmar</button>
				<!-- <button class="btn btn-link bg_red padding block" onclick="fecharpopup(); return false;">Cancelar</button> -->
			</div>

		</form>
		
	
	</div>
</div>
<script>

	//FORMATANDO VALORES
	$(".valor_transferencia").mask("#.###.##0.000.00", {reverse: true});
    $(document).on("keyup","#valor_transferencia",function(e){
       
        that = $(this).val().replace(",",".");
        $(this).val(that);
        //$(this).val(that.toFixed(4));
    	e.preventDefault();
    });


    //toggle formulario
    $("select[name=tipo_transferencia]").change(function(e){
    	var that = $(this).val();
    	if(that == 1){
				$("#rel_1").removeClass("disable");
				$("#rel_1").addClass("enable");
				$("#rel_2").removeClass("enable");
				$("#rel_2").addClass("disable");
			}else if(that == 2){
				$("#rel_1").removeClass("enable");
				$("#rel_1").addClass("disable");
				$("#rel_2").removeClass("disable");
				$("#rel_2").addClass("enable");
			}
    	e.preventDefault();
    });

    $("#qtd_almoco").change(function(e){
    	saldo_credito = Number($("#saldo_credito_1").val());
    	qtd 		= Number($(this).val());
    	total 		= Number($("#preco_almoco").val());
    	resultado 	= qtd * total;

    	if(resultado >= saldo_credito){
    		alert("Você não possui saldo!");
    		$(this).val(qtd-1);

    	}else{
			$("#valor_total").val(resultado);    		
    	}
    });

    $("#valor_transferencia").change(function(e){
    	valor_transferencia = Number($(this).val());
    	saldo_credito 		= $("#saldo_credito_2").val();

    	if(valor_transferencia > saldo_credito){
    		alert("Valor superior ao crédito que você possui!");
    		$(this).val('');
    	}
    });

    //transferencia de credito para almoco
    $("#rel_1").submit(function(e){
    	ra_origem		= $("#ra_origem").val();
    	saldo_credito 	= $("#saldo_credito_1").val();
    	qtd_almoco 		= $("#qtd_almoco").val();
    	preco_almoco 	= $("#preco_almoco").val();
    	valor_total		= $("#valor_total").val();
    	resultado  		= qtd_almoco * preco_almoco;

		if(saldo_credito <= 0 || valor_total <= 0){
			alert("Não é possível realizar transferência");
			return false;
		}else{
	
			if(resultado > saldo_credito){
				alert("Você não possui saldo!");
				$("#qtd_almoco").val(qtd_almoco-1);
			}else{
				$.ajax({
					url:  '<?= base_url('pagamento/form_transferencia/enviar_1'); ?>',
					type: 'POST',
					data: {
						qtd_almoco: qtd_almoco,
						ra_origem: ra_origem 
					},
					success: function(data){
						alert(data);
						fecharpopup();
						//console.log(data);
					}
				});
			}
		
		}

    	e.preventDefault();
    });


    $("#rel_2").submit(function(e){
    	saldo_credito 		= $("#saldo_credito_2").val();
    	ra_destino   		= $("#ra_aluno").val();
    	ra_origem  	  		= $("#ra_origem_2").val();
    	valor_transferencia = $("#valor_transferencia").val();

		if(saldo_credito <= 0 || valor_transferencia <= 0){
			alert("Não é possível realizar transferência");
			return false;
		}else{
    	
			if(ra_origem == 0){
				alert("Você não possui outro filho, para realizar a transferência");
				return false;
			}else if(valor_transferencia > saldo_credito){
				alert("Valor superior ao crédito que você possui!");
				$("#valor_transferencia").val('');
			}else{

				$.ajax({
					url:  '<?= base_url('pagamento/form_transferencia/enviar_2'); ?>',
					type: 'POST',
					data: {
						ra_origem: ra_origem,
						ra_destino: ra_destino,
						valor_transferencia: valor_transferencia
					},
					success: function(data){
						alert(data);
						fecharpopup();
					}
				});
			}

		}

    	e.preventDefault();
    });


</script>