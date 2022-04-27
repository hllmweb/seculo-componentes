<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_ocorrencia','ocorrencia', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $p_codusuario = $this->input->get_post("codusuario");        
       
        $param = array(
            'p_codusuario' => $p_codusuario
        );

        $lista_ocorrencia = $this->ocorrencia->lst_ocorrencia($param);

        $data = array(
            'titulo_header'  => 'Registro Pedagógico',
            'listar'         => $lista_ocorrencia
        );
    

        $this->load->view('ocorrencia/index', $data);
    }

  
}

?>