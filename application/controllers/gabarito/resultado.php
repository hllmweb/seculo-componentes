<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Resultado extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_gabarito', 'gabarito', true);
        
        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $p_num_prova = $this->input->get_post("num_prova");
        $p_ra        = $this->input->get_post("ra");
        $p_bimestre  = $this->input->get_post("bimestre");

        $param_1 = array(
            'p_operacao' => 1,
            'p_ra'       => $p_ra,
            'p_bimestre' => $p_bimestre,
            'p_num_prova'=> $p_num_prova
        );
        //LISTA DE INFORMAÇÕES DA PROVA
        $lista_prova = $this->gabarito->lista_prova_gabarito($param_1);
        
        $param_2 = array(
            'p_operacao'    => 2,
            'p_ra'          => $p_ra,
            'p_bimestre'    => $p_bimestre,
            'p_num_prova'   => $p_num_prova
        );

        
        //LISTA DE QUESTÕES COM GABARITO E RESPOSTAS
        $lista_gabarito = $this->gabarito->lista_prova_gabarito($param_2);
        
          
        $data = array(
            'titulo_header'        => $p_num_prova.' - Nº da Prova',
            'listar_prova'         => $lista_prova,
            'gabarito_prova'       => $lista_gabarito          
        );
        
        $this->load->view('gabarito/resultado', $data);
    }

    function visualizar_prova(){
        $data = array(
            'titulo_header' => 'Prova'
        );
        $this->load->view('gabarito/visualizar_prova',$data);
    }
  
}

?>