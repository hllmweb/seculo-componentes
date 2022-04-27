<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_gabarito extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
        LISTA GABARITO DA PROVA
    */
    function lista_prova_gabarito($p){
    	$cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',          'value' => $p['p_operacao']),
            array('name' => ':P_BIMESTRE',          'value' => $p['p_bimestre']),
            array('name' => ':P_RA',                'value' => $p['p_ra']),
            array('name' => ':P_CD_PROVA',          'value' => $p['p_cd_prova']),
            array('name' => ':P_NUM_PROVA',         'value' => $p['p_num_prova']),
            array('name' => ':P_CURSOR',            'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('RM','SP_GABARITO', $dados);
        return $query;  

    }




  
} 

?>