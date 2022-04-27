	//$('#content').animate({scrollTop: $('#content').scrollHeight}, 500);
//	var div = $('.content')[0];
//	div.scrollTop = div.scrollHeight;

var root_site 	= "https://"+window.location.hostname;
var conn 		= new WebSocket('wss://seculomanaus.com.br/wss2/:8282/application/third_party/realtime');
    
conn.onopen = function(e) {
    console.log("Conexão Estabelecida!");
};

conn.onmessage = function(e) {
    var dados = JSON.parse(e.data);

    //capturando parametro da url
    var query = location.search.slice(1);
	var partes = query.split('&');
	var data = {};
	partes.forEach(function (parte) {
	    var chaveValor = parte.split('=');
	    var chave = chaveValor[0];
	    var valor = chaveValor[1];
	    data[chave] = valor;
	});

    // console.log(data.codusuario);   
    //console.log("Destino: "+dados.txt_codusuario_destino);s
    //listando conversa
    //lista_conversa(dados.codusuario, dados.txt_codusuario_destino);
    //console.log(dados);
    //console.log(txt_departamento.value);
    //console.log("audio será colocado aqui");
	if(urlPath() == "00000000001" || urlPath() == "00000000002" || urlPath() == "00000000003"){
		//console.log("Teste");
		showName(urlPath());
		audio();
	}	
	
	//audio();


	//showName(dados.txt_codusuario_destino);
	console.log("codusuario_recebido_de: "+dados.txt_departamento);
	console.log("codusuario_destino"+dados.txt_codusuario_destino);
	console.log("-----------------------------");   
	//atualiza_conversa_nao_lida(dados.txt_departamento,dados.txt_codusuario_destino); --alterado
   	//console.log(atualiza_conversa_nao_lida(dados.txt_departamento, dados.txt_codusuario_destino));


   	//console.log(dados.txt_codusuario_destino);
    	
    if(dados.txt_codusuario_destino == data.codusuario && dados.txt_departamento == txt_codusuario_destino.value){
		
		//capturar mensagem do socket
    	showMessages('outros', e.data);
    	atualiza_conversa_lida(dados.txt_codusuario_destino, dados.txt_departamento);
    	//atualiza_conversa_nao_lida(dados.txt_codusuario_destino, dados.txt_departamento);
		
		//console.log("deve atualiza msg lida");
		descer();
		
	}

};

//capturando parametro da url
function urlPath(){
    var query = location.search.slice(1);
	var partes = query.split('&');
	var data = {};
	partes.forEach(function (parte) {
	    var chaveValor = parte.split('=');
	    var chave = chaveValor[0];
	    var valor = chaveValor[1];
	    data[chave] = valor;
	});

	return data.codusuario;
}



//obj.c(2);
//exibe nome dos responsáveis

function showName(codusuario){
	var html = "";

	$.ajax({
		url: root_site+"/componentes/portal/chat/listar/nome",
		type: "POST",
		dataType: "JSON",
		data: {
			codusuario_destino: codusuario
		},
		success: function(data){

			$(".list-user").html(html);
			//console.log(obj_data);
			
			$.each(data, function(index, value){
				html  = '<li class="list-user-item" id="'+value.USU_LOGIN+'">';
				html += '<a href="javascript:void(0);" onclick="showChat(\''+value.USU_LOGIN+'\',\''+codusuario+'\');" class="list-user-link">';
				html += '<span class="text-link">'+value.NOME+'</span>';
				html += '<span class="badget">'+value.QUANTIDADE+'</span>';
				html += '</a></li>';

				console.log(value.NOME+"-----"+value.USU_LOGIN+":::"+codusuario);

				// if($(".list-user-item").hasClass("activo")){
				// 	$(".list-user-item").addClass("activo");
				// // 	// $(".list-user").html(html);
				// }
				//atualiza_conversa_nao_lida(value.USU_LOGIN,codusuario);
				// if($(".list-user").attr("id",value.USU_LOGIN).length == 1){
				// 	console.log("Já Existe");
				// 	//$(".list-user").html(html);	
				// }else{
				// 	//$(".list-user").append(html);	
				// 	console.log("Carregou");	
				// 	console.log("--------");
				// }
					
				$(".list-user").append(html);	

			});
		



			
			//console.log("Lista de Nomes: "+data[0].NOME);
			
		}

	});

}

function enviar_email(param1,param2,param3){
	console.log(param1,param2,param3);
	let origem = param1;
	let destino = param3;
	let mensagem = param2;



	$.ajax({
		url: "https://seculomanaus.com.br/componentes/portal/notificacao/enviar/enviar_app",
		type: "POST",
		data: {
			origem: origem,
			destino: destino,
			mensagem: mensagem
		},
		success: (data) => {
			console.log(data);
		}
	})
}
//exibe chat do responsavel
function showChat(codusuario, codusuario_destino){
	$("#txt_codusuario_destino").val(codusuario);
	$("#content-100 .content").html("");
	$("#footer").removeClass("disable");
	$("#footer").addClass("enable");
	$("#footer-top").removeClass("disable");
	$("#footer-top").addClass("enable");
				
	
	// var div_c = $("#content")[0];
	// div_c.scrollTop = div_c.scrollHeight;
	// var div_c = $("#content").get(0).scrollHeight;

	
	
	atualiza_conversa_lida(codusuario, codusuario_destino);




	$.ajax({
		url: root_site+"/componentes/portal/chat/listar/mensagem",
		type: "POST",
		dataType: "JSON",
		data: {
			codusuario: codusuario,
			codusuario_destino: codusuario_destino
		},
		success: function(data){
			$.each(data, function(index, value){
				if(value.NOME == 'SECRETARIA' || value.NOME == 'FINANCEIRO'){
					tipo_class = 'outros';
				}else{
					tipo_class = 'meu';
				}	

	

				// console.log("Info do banco: "+value.DATAHORA_LIDA);
				// console.log(value.DATAHORA);
				
				var identificado = value.DATAHORA.replace('/','').replace('/','').replace(' ','').replace(':','').replace(':','');

				console.log(identificado);
				html  = '<div class="item" id="item_check_'+identificado+'">';
				html += '<div class="'+tipo_class+'">';
				html += '<div class="item_check"><input type="checkbox" id="item_check_'+identificado+'" value="'+value.DATAHORA+'" data-usu="'+value.USU_LOGIN+'" data-usu-destino="'+value.USU_LOGIN_DESTINO+'" name="item[]" class="input-check"></div>';
				html += '<h5>'+value.NOME+'</h5>';
				html += '<span>'+value.MENSAGEM+'</span>';
				html += '<div class="location">'+value.DATAHORA+'</div>';
				//html += '<div class="location">'+value.DATAHORA_LIDA+'</div>';
				html += '</div>';
				html += '<div class="clear"></div>';
				html += '</div>';
				
				$(".content").append(html);
				descer();
				//secretaria chat
				// var content_100 		= $("#content-100 .content")[0];
				// content_100.scrollTop 	= content_100.scrollHeight;
				
				
				// if(urlPath() == '00000000001' || urlPath() == '00000000002'){
				// 	//secretaria chat
				// 	var content_100 		= $("#content-100 .content")[0];
				// 	content_100.scrollTop 	= content_100.scrollHeight;
				// }else{
				// 	//cliente chat
				// 	var content 			= $(".content")[0];
				// 	content.scrollTop 		= content.scrollHeight;
				// }
			
			});


		}

	});

}

function del_conversa(){
	$(".item_check").toggle();
}

$(document).on("click","input[name='item[]']",function(){	
	if($(this).is(":checked")){
		var p_data_hora 	= $(this).val();
		var p_usu 			= $(this).data("usu");
		var p_usu_destino 	= $(this).data("usu-destino");
		var ide				= $(this).attr("id");
		console.log(p_data_hora);
		console.log(p_usu);
		console.log(p_usu_destino);
		console.log(ide);

		$.ajax({
			url: root_site+"/componentes/portal/chat/deletar/mensagem",
			type: "POST",
			data: {
				p_data_hora: p_data_hora,
				p_usu: p_usu,
				p_usu_destino: p_usu_destino
			},
			beforeSend: function(){
				$("#"+ide).parent().parent().parent().find("#"+ide).remove();
			},
			success: function(data){
				console.log(data);
			}
		});

		console.log("item marcado"); //update set = 1
	}else{
		console.log("item desmarcado"); //update set = ''
	}

});


showName(urlPath());


var txt_usuario 			= document.getElementById('txt_usuario'); 
var txt_mensagem			= document.getElementById('txt_mensagem');
var txt_codusuario  		= document.getElementById('txt_codusuario');
var txt_codusuario_destino 	= document.getElementById('txt_codusuario_destino');
var txt_departamento 		= document.getElementById('txt_departamento');
var conteudo 				= document.getElementsByClassName('content');
var btn_enviar 				= document.getElementById('btn_enviar');

//enviando mensagem
function sendMessages(){
	if(txt_mensagem.value != ''){
		var mensagem = {
			'name': 					txt_usuario.value, 
			'msg': 						txt_mensagem.value, 
			'codusuario': 				txt_codusuario.value,
			'txt_codusuario_destino': 	txt_codusuario_destino.value,
			'txt_departamento': 		txt_departamento.value
		};
		mensagem 	 = JSON.stringify(mensagem);

		conn.send(mensagem);
		showMessages('meu', mensagem);	
		//atualiza qtd - badget   
		//atualiza_conversa_nao_lida(txt_codusuario_destino.value, txt_codusuario.value); -- alterado

		console.log("meu");
	

		txt_mensagem.value = "";
	}

	return false;
}


function showMessages(how, data){
	data = JSON.parse(data);
	/*
	if(how == 'meu') {
       	console.log("MEUUUUUUUUU");
    } else if (how == 'outros') {
       	console.log("OUTROOOOOS");
    }*/


	var date2 = new Date();
    date2.setDate(date2.getDate());

    var ano 	= date2.getFullYear();
    var mes 	= (1 + date2.getMonth()).toString().padStart(2, '0');
    var dia 	= date2.getDate().toString().padStart(2, '0');
  	var hora 	= date2.getHours();
  	var min  	= date2.getMinutes();


	
	var div_item = document.createElement('div');
	div_item.setAttribute('class', 'item');

	var div 	 = document.createElement('div');
	div.setAttribute('class', how);

	var div_check = document.createElement('div');
	div_check.setAttribute('class', 'item_check');
	div_check.innerHTML = "<input type='checkbox' name='item[]' class='input-check'>";
	
	var h5 		   = document.createElement('h5');
	h5.textContent = data.name;
	//div.textContent = data.txt_codusuario_destino;


	var contexto = document.createElement('span');
	contexto.textContent = data.msg;

	var location = document.createElement('div');
	location.setAttribute('class', 'location');
	location.textContent = dia+"/"+mes+"/"+ano+"  "+hora+":"+min;


	div.appendChild(h5);
	div.appendChild(contexto);
	div.appendChild(location);
	div_item.appendChild(div);
	conteudo[0].appendChild(div_item);

}


function departamento(codusuario_destino, text_departamento){
	
	$("#txt_codusuario_destino").attr("value",codusuario_destino);
	$("#header .title").html(text_departamento);
	$("#header .back a").removeClass("disable");
	$("#header .back a").addClass("enable");
	$("#list-content").addClass("disable");

	$("#footer").removeClass("disable");
	$("#footer").addClass("enable");
	$("#footer-top").removeClass("disable");
	$("#footer-top").addClass("enable");
	$(".back i").show();

	//var div_c = $("#content")[0];
	var div_c = $("#content").get(0).scrollHeight;
	div_c.scrollTop = div_c.scrollHeight;

	showChat(codusuario_destino,urlPath());
}

function voltar(parametro, usuario){
	$("#header .title").html(usuario);
	$("#list-content").removeClass("disable");
	$("#list-content").addClass("enable");

	$("#footer").removeClass("enable");
	$("#footer").addClass("disable");
	$("#footer-top").removeClass("disable");
	$("#footer-top").addClass("enable");

	$(parametro).addClass("disable");
}

function setMessages(){
	//insere mensagem no banco
	insere_conversa(txt_codusuario.value, txt_mensagem.value, txt_codusuario_destino.value);	
}

function execMessages(){
	var m = txt_mensagem.value;	
	if(m.length === 0 || !m.trim()){
		return false;
	}else{
		//insere mensagem no banco
		setMessages();

		//envia mensagem p/ o destinatario
		sendMessages();
	}
	$("#footer").removeClass("top");
	$("#footer-top").removeClass("top");
	$(".teclado").removeClass("ativo-teclado");
	$(".btn_esconder").hide();

	// var div = $("#content")[0];
	// div.scrollTop = div.scrollHeight;
	
	if(urlPath() == '00000000001' || urlPath() == '00000000002'){
		//secretaria chat
		var content_100 		= $("#content-100 .content")[0];
		content_100.scrollTop 	= content_100.scrollHeight;
	}else{
		//cliente chat
		var content 			= $(".content")[0];
		content.scrollTop 		= content.scrollHeight;
	}

}

function insere_conversa(codusuario, mensagem, codusuario_destino){

	enviar_email(codusuario, mensagem, codusuario_destino);

	$.ajax({
		url: root_site+"/componentes/portal/chat/adicionar",
		type: "POST",
		data: {
			codusuario: 			codusuario,
			codusuario_destino: 	codusuario_destino,
			mensagem: 				mensagem
		},
		success: function(data){
			console.log(data);
		}

	});

}

function atualiza_conversa_lida(codusuario, codusuario_destino){
	$.ajax({
		url: root_site+"/componentes/portal/chat/atualizar/index",
		type: "POST",
		data: {
			codusuario: 			codusuario,
			codusuario_destino: 	codusuario_destino
		},
		success: function(data){
			console.log(data);
		}
	});
}



/*atualiza_conversa_nao_lida('73661961268','00000000001', function(response){
	console.log(response);
});*/



//lista conversa não lida
function atualiza_conversa_nao_lida(codusuario, codusuario_destino){
	
	$.ajax({
		url: root_site+"/componentes/portal/chat/listar/mensagem_nao_lidas",
		type: "POST",
		data: {
			codusuario: codusuario,
			codusuario_destino: codusuario_destino
		},
		dataType: "json",
		//async: false,
		success: function(data){
			//console.log(data[0].QUANTIDADE);
			/*if($(".list-user li.list-user-item").data("id") == codusuario){
				$(this).addClass("activo");
			}*/


			//$(".list-user #"+codusuario).each(function(index, value){
				that = $(".list-user #"+codusuario);
				that.addClass("activo");
				that.find(".badget").html(data[0].QUANTIDADE);
				
				//console.log(that);
			//});

			//console.log("atualizado: "+$(".list-user .list-user-item").data("id"));

			/*if($(".list-user .list-user-item").data("id") == codusuario){
				$(this).find(".badget").html(data[0].QUANTIDADE);
			}*/

			//console.log(data);
			/*console.log("sem json: "+data[0].QUANTIDADE);
			$(".badget").html(data[0].QUANTIDADE);*/
			


			//audio();
			//results = JSON.parse(data);
        	//response(data);
   			/*var dados = JSON.parse(data);
			var quantidade = 0;
			$.each(dados,function(index, value){
				console.log(value.DATAHORA_LIDA);
				audio();
				quantidade++;
			});
			

			$(".list-user .list-user-item .badget").html(quantidade);*/
			//lstar para o responsavel e aluno	
		}
	});

   	//return retorno;
}

/*
var obj = {
	c: function(parametro1){
		//console.log(parametro1);
		return parametro1;
	}
}*/



function format_data_hora(str){
	let inicio = true, res = "";
	for (let letra of str){
	  if (letra === '-'){
	    res += inicio ? "/": "/";
	    inicio = !inicio;
	  }
	  else res += letra;
	}

	var arr 			= res.split(" ");
	var d 				= new Date(arr[0]);
	var dia 			= ("0" + d.getDate()).slice(-2);
	var mes 			= ("0" + (d.getMonth() + 1)).slice(-2);
	var ano 			= d.getFullYear(); 

	var data 			= dia+"/"+mes+"/"+ano;
	var hora  			= arr[1].split(".");
	var hora_formatada 	= hora[0]+":"+hora[1]; 	

	//var data_hora 		= data+" "+hora_formatada;
	var data_hora 		= arr[0];

	return data_hora;
}


function audio(){
	var som 		= root_site+"/componentes/portal/assets/arquivos/audio1.mp3";
	var audioPlay 	= document.getElementsByTagName("audio")[0];
	audioPlay.setAttribute("src", som);
	playPromise = audioPlay.play();
    
    if(playPromise !== undefined) {
	  playPromise.then(function() {
	    // Automatic playback started!
	  
	  }).catch(function(error) {
	    // Automatic playback failed.
	    // Show a UI element to let the user manually start playback.

	  });
	}

    //audioPlay.play();
}

// function scroll_content(){
// 	var div = $("#content")[0];
	
// 	div.scrollTop = div.scrollHeight;
// 	return div.scrollHeight;
// }



function descer() {
    /*var elm = $('.content');
    var height = elm[0].scrollHeight;
	elm.scrollTop(height);*/
	
	if(urlPath() == '00000000001' || urlPath() == '00000000002'){
		//secretaria chat
		var content_100 		= $("#content-100 .content")[0];
		content_100.scrollTop 	= content_100.scrollHeight;
	}else{
		//cliente chat
		var content 			= $(".content")[0];
		content.scrollTop 		= content.scrollHeight;
	}
}



// var item_content = $("#content").find(".item").length;
// console.log(item_content);


function detectandoDevice(){
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        console.log('Dispositivo Movel');
        return 1;
    }else{
      	console.log('Não é dispositivo Movel');
    	return 0;
    }
}





/*$(document).on("touchmove click","#txt_mensagem",function(e){


	$(this).parent().parent().parent().addClass("top");

	e.preventDefault();
});*/

// var startingY;
// var elemento = document.querySelector("#txt_mensagem");
// var footer  = document.querySelector("#footer");
// var elemento2 = document.querySelector("#btn_enviar");
// elemento.addEventListener("touchstart", iniciaTouch);
//elemento.addEventListener("touchmove", movendoCaixa);
//elemento.addEventListener("touchend", fimTouch);

// function iniciaTouch(e){
// 	//startingY = e.touches[0].screenY;
// 	startingY = window.screen.height;

// 	var change 	= startingY - e.touches[0].clientY;
// 	console.log("change: "+change);
	
// 	// if(change < 0){
// 	// 	return;
// 	// }
// 	elemento.style.position = 'relative';
// 	elemento.style.bottom 	= 0+'px';
// 	footer.style.position 	= 'relatives';
// 	footer.style.background = '#E9EBED';
// 	footer.style.bottom	    = 250+'px';

// 	console.log(e.touches);
// 	console.log(startingY);

// 	//e.preventDefault();
// }
