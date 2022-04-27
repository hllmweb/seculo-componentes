<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verificacao extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 
        $chapa          = $this->input->get_post("chapa");
        $dt_nascimento  = str_replace('/',"",$this->input->get_post("dt_nascimento"));

        $param = array(
            'p_chapa' => $chapa,
            'p_dt_nascimento' => $dt_nascimento
        );

        $verifica = $this->refeicao->acesso($param);
        if($verifica == true){
            $this->session->set_userdata('CHAPA', $verifica[0]['CHAPA']);
            $this->session->set_userdata('CPF', $verifica[0]['CPF']);
            $this->session->set_userdata('DT_NASCIMENTO', $dt_nascimento);
            $this->session->set_userdata('NOME',$verifica[0]['NOME']);
            echo true;
        }else{
            $this->session->unset_userdata('CHAPA');
            $this->session->unset_userdata('CPF');
            $this->session->unset_userdata('DT_NASCIMENTO');
            $this->session->unset_userdata('NOME');
            echo false;
        }

        //$this->load->view('refeicao/inicio');
    }

    
   
}