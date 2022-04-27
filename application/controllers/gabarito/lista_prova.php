<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lista_prova extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_gabarito', 'gabarito', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {           
        $p_bimestre     = $this->input->get_post("p_bimestre");
        $p_ra           = $this->input->get_post("p_ra");
        
        $param = array(
            'p_operacao'   => 1,
            'p_bimestre'   => $p_bimestre,
            'p_ra'         => $p_ra,
            'p_num_prova'  => null
        );

        $gabarito = $this->gabarito->lista_prova_gabarito($param);

        $data = array(
            'titulo_header'  => 'Lista de Provas Gabaritadas',
            'listar'         => $gabarito
        );
        
        $this->load->view('gabarito/lista_prova', $data);
    }


  
}

?>