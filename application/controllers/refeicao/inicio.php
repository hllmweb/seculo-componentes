<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 
        $p_chapa      =  $this->session->userdata('CHAPA');
        
        if($p_chapa != true){
            redirect(base_url('refeicao/login'));
        }

        $param = array(
            'p_chapa' => $p_chapa
        );
        
        $confirma_refeicao  = $this->refeicao->lst_refeicao($param);
        $lista_subordinados = $this->refeicao->lst_subordinados($param);
        $libera_acesso      = $this->refeicao->lib_acesso();

     
        if(count($lista_subordinados) >= 1){
            $check_subordinado = $this->refeicao->lst_refeicao();
        }
        
        $data = array(
            'titulo_header_1'   => 'Refeição',
            'chapa'             => $this->session->userdata('CHAPA'),
            'nome'              => $this->session->userdata('NOME'),
            'confirma_refeicao' => $confirma_refeicao,
            'lista_subordinado' => $lista_subordinados,
            'libera_acesso'     => $libera_acesso[0]['REF_LIBERA']
        );

        $this->load->view('refeicao/index', $data);
    }


    function verifica_acesso(){
        $libera_acesso      = $this->refeicao->lib_acesso();
        echo $libera_acesso[0]['REF_LIBERA'];
    }
    
   
}