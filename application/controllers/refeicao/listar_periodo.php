<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listar_periodo extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 
        $p_chapa        = $this->session->userdata('CHAPA');
        $p_data_inicio  = $this->input->get_post('p_data_inicio');
        $p_data_fim     = $this->input->get_post('p_data_fim');


        if($p_chapa != true){
            redirect(base_url('refeicao/login'));
        }

        $param = array(
            'p_chapa'       => $p_chapa,
        );

        //$verificao = $this->refeicao->acesso($param);

        $lista_periodo = $this->refeicao->lst_refeicao_periodo($param);

        $data = array(
            'titulo_header_1'   => 'Isentar Período da Refeição',
            'chapa'             => $this->session->userdata('CHAPA'),
            'nome'              => $this->session->userdata('NOME'),
            'lista_periodo'     => $lista_periodo
        );
        

        $this->load->view('refeicao/listar_periodo_isento', $data);
    }


    
   
}

?>