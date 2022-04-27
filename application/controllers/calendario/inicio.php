<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        //$this->load->model('m_cardapio','cardapio', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
               
        $data = array(
            'titulo_header'  => 'Lista de Cardápio',
            //'listar'         => $cardapio
        );
        

        $this->load->view('calendario/index', $data);
    }

  
}

?>