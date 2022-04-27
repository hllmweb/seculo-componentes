<!--topo-->

<div class="app" id="conteudoModal">
	<header class="header">
		<h2>Estamos em Manutenção</h2>
	</header>
</div>

<div class="app" id="conteudoModal">
	<header class="header">
		<div class="box left">
			<h2 class="header-title"><?= $titulo_header_1; ?></h2>
			<a href="#" class="btn_x_modal_grande" onclick="fecharpopup(); return false;"><i class="fas fa-times"></i></a>
		</div>
		<div class="box right">
		</div>
	</header>
		
	<form method="POST">
		<?php 
			$arr_aluno = explode(",", $listar);		
			  foreach($arr_aluno as $aluno):
			 	$arr_item = explode(":", $aluno);
			// 	$nome_aluno 	= $arr_item[0];
			// 	$qtd_itens 		= $arr_item[1];
			// 	$preco_item 	= $arr_item[2];
			// 	$total_item 	= $arr_item[3];
			// 	$total_compra 	= $arr_item[4];


		?>
			<!--<input type="text" id="nomeAluno" name="nomeAluno" value="<?= $nome_aluno; ?>">
			<input type="text" id="qtdItens" name="qtdItens" value="<?= $qtd_itens; ?>">
			<input type="text" id="precoItem" name="precoItem" value="<?= $preco_item; ?>">
			<input type="text" id="totalItem" name="totalItem" value="<?= $total_item; ?>">
			<input type="text" id="totalCompra" name="totalCompra" value="<?= $total_compra; ?>">-->

		<?php 
			endforeach;
		?>
		<!--LISTA DE ALUNOS E ITENS-->
		<input type="hidden" name="produtosArray" id="produtosArray" value="<?= $listar; ?>">

		<div class="row margin padding">
			<div class="row-50">
				<select id="formaPagamento" name="formaPagamento" class="drop-select" required>
					<option value="0" selected="selected">Selecione o Tipo de Pagamento</option>
					<option value="0">-----</option>
					<option value="A"><i class="fas fa-credit-card"></i>Débito</option>
                    <option value="1">Crédito à Vista</option>    
				</select>
			</div>
			<div class="row-50 text-right">
				<select id="codigoBandeira" name="codigoBandeira" class="drop-select" required>
					<option value="0" selected="selected">Selecione a Bandeira</option>
					<option value="0">-----</option>
					<option value="visa">Visa</option>
					<option value="mastercard">MasterCard</option>
					<option value="elo">Elo</option>
					<option value="discover">Discover</option>
					<option value="amex">Amex</option>
					<option value="aura">Aura</option>
					<option value="disners">Disners</option>
				</select>
			</div>	
			<div class="row-60">
				<input type="text" 
						name="numeroCartao" 
					   	id="numeroCartao" 
					   	maxlength="16"
                       	required
                       	min="1"
                      	max="16"
                       	placeholder="0000000000000000" 
                       	class="input-text input-80">
            </div>
			<div class="row-20 margin-left text-right">
				<input type="text" 
						name="Cvv" 
						id="Cvv" 
						placeholder="CVV"
						required
                        placeholder="0000"
                        maxlength="4" 
						class="input-text input-95">
			</div>
			<div class="row-20 margin-left text-right">
				<input type="text" 
						name="Vencimento" 
						id="Vencimento"
						maxlength="8" 
						required 
						placeholder="MM/YYYY" 
						class="input-text input-95">
			</div>
			<div class="row-95">
				<input type="text"
						name="Nome" 
						id="Nome" 
						required
						maxlength="50"
						placeholder="Nome Completo" 
						class="input-text input-95">
			</div>
			<div class="box-bottom">
				<input type="hidden" name="valorTotal" id="valorTotal" value="<?= number_format($arr_item[6],2,",","."); ?>">
				<div class="vfloat padding">R$ <?= number_format($arr_item[6],2,",","."); ?></div>
				<button onclick="conteudoModal('<?= base_url('pagamento/requisitar_transacao/index'); ?>'); return false;" class="btn btn-link bg-green padding block">Pagar</button>
			</div>
		</div>
	</form>

</div>	

<script>
	//Expressão Regular apenas p/ números do CARTÃO
/*	
onkeyup="cardNumber(this.value);"
onkeyup="dateVencimento(this.value);"

function cardNumber(valor){
		var regexp = /^[0-9]+$/;
		if(valor.match(regexp)){
			return true;
		}else{
			alert("Digite apenas Números");
			$("#numeroCartao").val(valor.substring(0, valor.length - 1));
			return false;
		}
	}

	function dateVencimento(valor){
		console.log(valor);
	}*/
</script>