<?php
defined('BASEPATH') OR exit('Não é permitido acesso direto');

class Funcoes{
	public $mensagem;

	function set_mensagem($parametro){
		$this->mensagem = $parametro;
	}

	function get_mensagem(){
		return $this->mensagem;
	}

}

?>