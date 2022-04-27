<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard > Chat Século</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/chat.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<header id="header">
		<div class="title col-80"><?= $nome_usuario?></div>
		<div class="back col-20"><a href="javascript:void(0);" class="disable"><i class="fas fa-chevron-left"></i></a></div>
	</header>

	<section id="content-100" class="content-100">
		<div class="col-30">

			<ul class="list-user">
				<!--<li class="list-user-item">
					<a href="" class="list-user-link activo">
						<span class="text-link">Pai 1</span> 
						<span class="badget">3</span>
					</a>
				</li>
				<li class="list-user-item">
					<a href="" class="list-user-link activo">
						<span class="text-link">Pai 2</span>
						<span class="badget">9</span>
					</a>
				</li>
				<li class="list-user-item">
					<a href="" class="list-user-link">Pai 3</a>
				</li>
				<li class="list-user-item">
					<a href="" class="list-user-link">Pai 4</a>
				</li>
				<li class="list-user-item">
					<a href="" class="list-user-link">Aluno 1</a>
				</li>
				<li class="list-user-item">
					<a href="" class="list-user-link">Aluno 2</a>
				</li>-->							
			</ul>
			<audio></audio>
		</div>
		<div class="col-70">
			<div class="content"></div>
			<!--<div class="item">
				<div class="meu">
					<span>
					Olá, tudo bem? 
					Olá, tudo bem?
					Olá, tudo bem?
					Olá, tudo bem?
					Olá, tudo bem? Olá, tudo bem? Olá, tudo bem? 
					Olá, tudo bem?
					</span>
					<div class="location">00/00/0000 00:00</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="item">
				<div class="outros">
					<span>
						Olá, tudo bem? 
					</span>
					<div class="location">00/00/0000 00:00</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="item">
				<div class="meu">
					<span>
					Olá, tudo bem? 
					</span>
					<div class="location">00/00/0000 00:00</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="item">
				<div class="outros">
					<span>
						Olá, tudo bem? 
					</span>
					<div class="location">00/00/0000 00:00</div>
				</div>
				<div class="clear"></div>
			</div>-->

			<footer id="footer" class="disable">
				<div class="row flex">
					<div class="item-flex">
						<input type="hidden" name="txt_usuario" id="txt_usuario" value="<?= $nome_usuario; ?>">
						<input type="hidden" name="txt_codusuario" id="txt_codusuario" value="<?= $codusuario; ?>">
						
						<input type="hidden" name="txt_codusuario_destino" id="txt_codusuario_destino">
						<input type="hidden" name="txt_departamento" id="txt_departamento" value="<?= $codusuario; ?>">

						<textarea name="txt_mensagem" id="txt_mensagem" class="txt_mensagem" placeholder="Digite sua dúvida..."></textarea>
					</div>
					<div class="item-flex">
						<button class="btn_enviar" id="btn_enviar" onclick="execMessages();"><i class="fas fa-location-arrow"></i></button>
					</div>
				</div>
			</footer>			

		</div>

	<!-- 	<div class="item">
			<div class="meu">
				<span>
				Olá, tudo bem? 
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem? Olá, tudo bem? Olá, tudo bem? 
				Olá, tudo bem?
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="item">
			<div class="outros">
				<span>
					Olá, tudo bem? 
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="item">
			<div class="meu">
				<span>
				Olá, tudo bem? 
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="item">
			<div class="outros">
				<span>
					Olá, tudo bem? 
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>
		

		<div class="item">
			<div class="meu">
				<span>
				Olá, tudo bem? 
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem? Olá, tudo bem? Olá, tudo bem? 
				Olá, tudo bem?
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="item">
			<div class="outros">
				<span>
					Olá, tudo bem? 
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>
		

		<div class="item">
			<div class="meu">
				<span>
				Olá, tudo bem? 
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem? Olá, tudo bem? Olá, tudo bem? 
				Olá, tudo bem?
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="item">
			<div class="outros">
				<span>
					Olá, tudo bem? 
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="item">
			<div class="meu">
				<span>
				Olá, tudo bem? 
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem?
				Olá, tudo bem? Olá, tudo bem? Olá, tudo bem? 
				Olá, tudo bem?
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div>



		<div class="item">
			<div class="outros">
				<span>
					Olá, tudo bem? 
				</span>
				<div class="location">00/00/0000 00:00</div>
			</div>
			<div class="clear"></div>
		</div> -->
	</section>
	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/app-chat.js'); ?>"></script>
</body>
</html>