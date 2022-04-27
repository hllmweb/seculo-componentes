<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $titulo_header; ?></title>

	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css').'?v='.time(); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
</head>
<body>
	<div class="app-main">
		<header class="header-top">
			<div class="box left">
				<h2 class="header-title"><?= $titulo_header; ?></h2>
			</div>
			<div class="box right"></div>
		</header>

		<div class="content-main"> <!--/*margin-content-->
	        <!--<div class="row flex padding margin-bottom">-->
                <!-- <div class="box-filter">
                    <select class="dropmenu" id="dropmenu">
                        <option selected="selected">Envio Pendente</option>
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                    </select>
                </div>

                <div class="box-filter">
                    <select class="dropmenu" id="dropmenu">
                        <option selected="selected">Curso</option>
                        <option value="1">Infantil</option>
                        <option value="2">Fundamental</option>
                        <option value="3">Médio</option>
                    </select>
                </div>

                <div class="box-filter">
                    <select class="dropmenu" id="dropmenu">
                        <option selected="selected">Turma</option>
                        <option value="1">Todos</option>
                        <option value="2">EIM0101</option>
                        <option value="3">EIM0201</option>
                        <option value="4">EIM0301</option>
                    </select>
                </div>

                <div class="box-filter">
                    <button class="btn-filter">Filtrar</button>
                </div> -->
            <!--</div>-->


            <div class="row">
               <div class="footer-box-btn">
                    <div class="footer-box-left">
                        <!-- <input type="text" name="search" id="search" class="input-search" placeholder="Pesquisa...">
                        <i class="fas fa-search"></i> -->
                    </div>
                    <div class="footer-box-right">
                        <a href="<?= base_url('notificacao/adicionar'); ?>" class="btn add" title="Adicionar"><i class="fas fa-plus"></i> Adicionar</a>
                        <!-- <a href="" class="btn edit" title="Editar"><i class="far fa-edit"></i></a> -->
                        <!-- <a href="" class="btn del" title="Deletar"><i class="far fa-trash-alt"></i></a> -->
                        <!-- <a href="" class="btn send" title="Enviar Notificação"><i class="far fa-envelope"></i></a> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="section">
                    <?php foreach($listar as $dados): ?>
                            <div class="item">
                                <div class="item-left">                                 
                                    <div class="item-box">
                                        <div class="item-title-bold"><i class="far fa-calendar-alt"></i> Data de Envio</div>
                                        <div class="item-content"><?= date("d/m/Y",strtotime($dados["DT_NOTIFICAR"])); ?> às <?= $dados["HR_NOTIFICAR"]; ?></div>
                                        <div class="item-title-bold"><i class="far fa-bell"></i> Descrição da Notificação</div>
                                        <div class="item-content"><?= $dados["MENSAGEM"]; ?></div>
                                    </div>
                                    <div class="item-box">
                                        <div class="item-title-bold"><i class="far fa-bookmark"></i> Curso Destino</div>
                                        <div class="item-content">
                                        <?php 
                                            switch ($dados["CODCURSO_DESTINO"]):
                                                case '001':
                                                    echo "Infantil";
                                                    break;
                                                case '002':
                                                    echo "Fundamental I";
                                                    break;
                                                case '003':
                                                    echo "Fundamental II";
                                                    break;
                                                case '004':
                                                    echo "Médio";
                                                    break;
                                                case '':
                                                    echo "Todos";
                                                    break;
                                            endswitch;

                                        ?>

                                        </div>
                                        <div class="item-title-bold"><i class="fas fa-book-reader"></i> Turma Destino</div>
                                        <div class="item-content"><?= (empty($dados["CODTURMA_DESTINO"]))? "Específico" : $dados["CODTURMA_DESTINO"]; ?> </div>
                                    </div>
                                </div>    
                                <div class="item-right">
                                    <div class="item-box">
                                        <div class="item-title-bold"><i class="far fa-envelope"></i> Envio Automático</div>
                                        <div class="item-content"><?= ($dados["FLG_NOTIFICAR"] == 'S') ? "SIM" : "NAO"; ?></div>
                                        <div class="item-title-bold"><i class="far fa-user"></i> Cadastrado por</div>
                                        <div class="item-content"><?= $dados["LOGIN_CADASTRO"]; ?></div>
                                    </div>
                                    <div class="item-box">
                                        <!-- <input type="checkbox" id="input-check" class="check" value="1">    -->
                                        <!-- <a href="" class="btn aut" title="Editar"><i class="fas fa-check"></i> <span>Autorizar</span></a> -->
                                        <!-- <a href="" class="btn edit" title="Editar"><i class="far fa-edit"></i> <span>Editar</span></a> -->
                                        <!-- <a href="" class="btn del" title="Deletar"><i class="far fa-trash-alt"></i> <span>Deletar</span></a> -->
                                        
                                        
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; ?>




                </div>
            </div>



		</div>








	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
</body>
</html>