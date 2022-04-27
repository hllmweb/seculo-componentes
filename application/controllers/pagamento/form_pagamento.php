<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_pagamento extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        //$this->load->model('m_acompanhamento', 'acompanhamento', true);
        //$this->load->model('m_questionamento', 'questionamento', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $produtos_array = $this->input->get_post('produtos_array');


        $data = array(
            'titulo_header_1' =>  'Formulário de Pagamento',
            'listar' => $produtos_array
        );

        $this->load->view('pagamento/form_pagamento', $data);
    }


  
  
}