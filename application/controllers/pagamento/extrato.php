<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Extrato extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_pagamento', 'pagamento', true);

        //libers
        $this->load->helper(array('url','directory'));
    }   
    
    function credito($cd_usuario) {     
        //$cd_usuario = $this->input->get_post('cd_usuario');
    
        $params_1 = array(
            'p_operacao'        => 'LHC', 
            'p_cd_usuario_alu'  => $cd_usuario
        );


        $data = array(
            'titulo_header_1'   => 'Extrato de Crédito',
            'listar'            => $this->pagamento->sp_portal_info($params_1)
        );

        $this->load->view('pagamento/extrato_credito', $data);
    }

    function almoco($cd_usuario){

        $params_1 = array(
            'p_operacao'        => 'LHA',
            'p_cd_usuario_alu'  => $cd_usuario
        );

        $data = array(
            'titulo_header_1'   => 'Extrato do Almoço',
            'listar'            => $this->pagamento->sp_portal_info($params_1)
        );

        $this->load->view('pagamento/extrato_almoco', $data);
    }

    function detalhe_extrato(){
        $p_id_venda = $this->input->get_post('p_id_venda');

        $params_1 = array(
            'p_operacao'        => 'DVP',
            'p_id_venda'        => $p_id_venda
        );

        $data = array( 
            'listar'            => $this->pagamento->sp_portal_info($params_1)
        );

        //$listar_detalhe         = $this->pagamento->sp_portal_info($params_1);
        //var_dump($data);
        
        $this->load->view('pagamento/detalhe_extrato', $data);
    }

  
}