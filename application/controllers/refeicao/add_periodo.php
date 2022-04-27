<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Add_periodo extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 
        $p_chapa        = $this->input->get_post("p_chapa");
        $p_data_inicio  = $this->input->get_post("p_data_inicio");
        $p_data_fim     = $this->input->get_post("p_data_fim");
        $p_idterminal   = $_SERVER['REMOTE_ADDR'];

        $param = array(
            'p_chapa'       => $p_chapa,
            'p_data_inicio' => $p_data_inicio,
            'p_data_fim'    => $p_data_fim,
            'p_idterminal'  => $p_idterminal
        );

        $insert_periodo_isento = $this->refeicao->add_refeicao_periodo($param);
        if(!$insert_periodo_isento){
            echo 1;
        }else{
            echo 0;
        }
        
    }


}