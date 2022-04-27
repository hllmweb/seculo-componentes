<div class="row content-box-main">
    <div class="row-x table-header-box">
        <div class="col-2"><strong>Selecione o Aluno</strong></div>
    	<div class="col-2">
    		<input type="hidden" name="arr_item" id="arr_item" value="">
    		<button class="btn-add inline" id="add-popup-aluno">Adicionar Aluno</button> 
    		<button class="btn-sair inline" onclick="fecharpopup(); return false;">Fechar</button>
    	</div>
    </div>
    <div class="row table-content-box" id="table-content-box-aluno">
        <!--dados dos responsaveis-->
        
        <?php foreach($aluno as $info_aluno): ?>
        	<div class="row-x">
        		<div class="col-x2 text-left">
        			<input type="checkbox" name="check_opcao[]" id="check_opcao" data-ra="<?= $info_aluno['RA']; ?>" data-name="<?= $info_aluno['NM_ALUNO']; ?>">
        			<input type="hidden" id="codra" name="codra" value="<?= $info_aluno['RA']; ?>">
        			<?= $info_aluno['NM_ALUNO']; ?>
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
			$(this).prop("checked", false);
			$(this).removeClass("marcar");
		}

		var arr = [];
		$(".marcar").each(function(){
			var p_codra   = $(this).data("ra");
			var p_codname = $(this).data("name");
			if(this.checked){
				arr.push('{"RA":"'+p_codra+'","NM_ALUNO":"'+p_codname+'"}');
			}else{
				arr.splice($.inArray(p_codra, arr), 1);
			}
		});

		arr_item.val("["+arr+"]");

		e.preventDefault();
	});


	//adiciona aluno na cesta
	$(document).on("click","#add-popup-aluno",function(e){
		p_arr_item = $("#arr_item").val();
		obj_arr_item = $.parseJSON(p_arr_item);

		$("#dados_aluno").val(p_arr_item);
        $("#table-content-box-aluno .col-x1:nth-child(1)").hide(); //aluno


		$.each(obj_arr_item,function(i, index){
			// console.log(obj_arr_item[i].CPF_RESPONSAVEL);
            html  = "<div class='row-x6'>";
            html += "<div class='col-x2'>";
            html += "<input type='hidden' id='codra' name='codra' value='"+obj_arr_item[i].RA+"'>";
            html +=  obj_arr_item[i].NM_ALUNO;
            html += "</div>";

            html += "<div class='col-x2'>";
            html += "Sim";
            html += "<a href='#' id='remove-aluno' data-id='"+obj_arr_item[i].RA+"' class='inline btn-del'><i class='far fa-trash-alt'></i></a>";
            html += "</div>";
            html += "</div>";

            $("#table-content-box-aluno").append(html);
		});

		fecharpopup();

		e.preventDefault();
	});

</script>