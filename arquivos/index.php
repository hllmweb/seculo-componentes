<?php

$prova =  @$_GET['prova'];
$aluno =  @$_GET['aluno'];



header("Location: https://seculomanaus.com.br/academico/108/prova_gabarito/avaliacao_online/?prova=".$prova."&aluno=".$aluno);


?>