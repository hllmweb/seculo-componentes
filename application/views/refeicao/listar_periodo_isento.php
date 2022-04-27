<div class="sessao-container-title">Período Isento</div>
        <div class="sessao-list-item">
            <div class="sessao-box-50">DATA CADASTRO</div>
            <div class="sessao-box-50">DATA INICIO</div>
            <div class="sessao-box-50">DATA FIM</div>
        </div>
    <?php foreach($lista_periodo as $row): ?>
        <div class="sessao-list-item">
            <div class="sessao-box-50"><span><?= $row['DATA_CADASTRO']; ?></span></div>
            <div class="sessao-box-50"><span><?= date('d/m/Y',strtotime(implode("-",array_reverse(explode("/",$row['DATA_INICIO']))))); ?></span></div>
            <div class="sessao-box-50"><span><?= date('d/m/Y',strtotime(implode("-",array_reverse(explode("/",$row['DATA_FIM']))))); ?></span></div>
        </div>
    <?php endforeach; ?>
</div>