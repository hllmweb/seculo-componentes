<div class="row content-box-main">
    <div class="row-x table-header-box">
        <div class="col-2"><strong>Selecione o Responsável</strong></div>
    	<div class="col-2">
    		<input type="hidden" name="arr_item" id="arr_item" value="">
    		<button class="btn-add inline" id="add-popup-responsavel">Adicionar Responsável</button> 
    		<button class="btn-sair inline" onclick="fecharpopup(); return false;"><i class="fas fa-times"></i></button>
    	</div>
    </div>
    <div class="row table-content-box" id="table-content-box-responsavel">
        <!--dados dos responsaveis-->
        
        <?php foreach($responsavel as $info_responsavel): ?>
        	<div class="row-x">
        		<div class="col-x2 text-left">
        			<input type="checkbox" name="check_opcao[]" id="check_opcao" data-cpf="<?= $info_responsavel['CPF_RESPONSAVEL']; ?>" data-name="<?= $info_responsavel['NM_RESPONSAVEL']; ?>" class="check_opcao">
        			<input type="hidden" id="codcpf" name="codcpf" value="<?= $info_responsavel['CPF_RESPONSAVEL']; ?>">
        			<?= $info_responsavel['NM_RESPONSAVEL']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cel: &nbsp; <?= $info_responsavel['CEL_RESPONSAVEL']; ?>
        		</div>	
        	</div>

    	<?php endforeach; ?>
    


    </div>

</div>


<script>

	$(document).on("change", "input[name='check_opcao[]']",function(e){
		arr_item  = $("#arr_item");	

		if(this.checked){
			$(this).prop("checked", true);
			$(this).addClass("marcar");
		}else{
			$(this).prop("checked",false);
			$(this).removeClass("marcar");
		}

		var arr = [];
		$(".marcar").each(function(){
			var p_codcpf  = $(this).data("cpf");
			var p_codname = $(this).data("name");
			if(this.checked){
				arr.push('{"CPF_RESPONSAVEL":"'+p_codcpf+'","NM_RESPONSAVEL":"'+p_codname+'"}');
			}else{
				arr.splice($.inArray(p_codcpf, arr), 1);
			}

		});

		arr_item.val("["+arr+"]");
	
		e.preventDefault();
	});


	//adiciona responsável na cesta
	$(document).on("click","#add-popup-responsavel",function(e){
		p_arr_item = $("#arr_item").val();
		obj_arr_item = $.parseJSON(p_arr_item);

		$("#dados_responsavel").val(p_arr_item);
		$("#table-content-box-responsavel .col-x1:nth-child(1)").hide(); //responsavel


		$.each(obj_arr_item,function(i, index){
			// console.log(obj_arr_item[i].CPF_RESPONSAVEL);
			html  = "<div class='row-x6 list-responsavel'>";
            html += "<div class='col-x2'>";
            html += "<input type='hidden' id='codcpf' name='codcpf' value='"+obj_arr_item[i].CPF_RESPONSAVEL+"'>";
            html += obj_arr_item[i].NM_RESPONSAVEL;
            html += "</div>";

            html += "<div class='col-x2'>";
            html += "<a href='#' id='remove-responsavel' data-id='"+obj_arr_item[i].CPF_RESPONSAVEL+"' class='inline btn-del'><i class='far fa-trash-alt'></i></a>";
            html += "</div>";
            html += "</div>";


            $("#table-content-box-responsavel").append(html);
		});

		$("#modal").removeClass("modal-ativo");
	    $("#modal").find("#modal-tamanho").removeClass("modal-corpo-pequeno");
	    $("#modal").find("#modal-tamanho").removeClass("modal-corpo-medio");
	    $("#modal").find("#modal-tamanho").removeClass("modal-corpo-grande");
	    $("#modal").find("#modal-tamanho").html("");

		e.preventDefault();
	});
</script>