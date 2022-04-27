<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->helper(array('url','directory'));
        // $this->load->library(array('caracter'));
    }
    
    function index() {     
              
        $data = array(
            'titulo_header'     => 'Monitor de Notificação do Aplicativo',
            'listar'            => $this->notificacao->lst_notificacao()
        );
        
        $this->load->view('notificacao/index', $data);
    }


  
}

?>