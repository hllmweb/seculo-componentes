<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sair extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 
        $this->session->unset_userdata('CHAPA');
        $this->session->unset_userdata('CPF');
        $this->session->unset_userdata('DT_NASCIMENTO');
        $this->session->unset_userdata('NOME');    
        $this->session->sess_destroy();
        redirect(base_url('refeicao/login'));
    }

    
   
}