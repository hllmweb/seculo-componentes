<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function get_mensagem($parametro){
		return $parametro;
	}


	function get_CnpjCpf($parametro){
		$cnpj_cpf = preg_replace("/\D/", '', $parametro);

		if (strlen($cnpj_cpf) === 11) {
			return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
		} 

		return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
	}


?>