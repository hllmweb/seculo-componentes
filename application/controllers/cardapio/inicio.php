<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_cardapio','cardapio', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
               
        $cardapio = $this->cardapio->lista_cardapio(array('p_dt_expiracao' => '03/2020'));

        $data = array(
            'titulo_header'  => 'Lista de Cardápio',
            'listar'         => $cardapio
        );
        

        $this->load->view('cardapio/index', $data);
    }

  
}

?>