<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_transferencia extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        //$this->load->model('m_acompanhamento', 'acompanhamento', true);
        //$this->load->model('m_questionamento', 'questionamento', true);
        $this->load->model('m_pagamento', 'pagamento', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
      
        $ra         = $this->input->get_post('ra');
        $cd_usuario = $this->input->get_post('cd_usuario');

        $param_1 = array(
            'p_operacao'        => 'LA',
            'p_cd_usuario_resp' => $cd_usuario
        );

        $param_2 = array(
            'p_operacao'        => 'IC',
            'p_cd_usuario_alu'  => $ra
        );

        $aluno = $this->pagamento->sp_portal_info($param_1);
        $info = $this->pagamento->sp_portal_info($param_2);


        $data = array(
            'titulo_header_1'  => 'Formulário de Transferência',
            'lista'            => $info,
            'ra'               => $ra,
            'aluno'            => $aluno
        );

      

        $this->load->view('pagamento/form_transferencia', $data);
    }

    function enviar_1(){
        $qtd_almoco     = $this->input->get_post('qtd_almoco');
        $ra_origem      = $this->input->get_post('ra_origem');


        $param = array(
            'p_operacao'            => 'CA',
            'p_cd_usuario_origem'   => $ra_origem,
            'p_qtd_almoco_transf'   => $qtd_almoco
        );
       
        $result_update = $this->pagamento->sp_portal_transferencia($param);
        echo $result_update[0]['MENSAGEM'];
    }


    function enviar_2(){

        $ra_origem              = $this->input->get_post('ra_origem');
        $ra_destino             = $this->input->get_post('ra_destino');
        $valor_transferencia    = $this->input->get_post('valor_transferencia');


        $param = array(
            'p_operacao'            => 'CC',
            'p_cd_usuario_origem'   => $ra_origem,
            'p_cd_usuario_destino'  => $ra_destino,
            'p_vlr_cred_transf'     => $valor_transferencia
        );
       
 
        $result_update = $this->pagamento->sp_portal_transferencia($param);
        echo $result_update[0]['MENSAGEM'];
    }
  
}