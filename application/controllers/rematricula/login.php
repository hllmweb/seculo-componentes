<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        //$this->load->model('m_rematricula','rematricula', true);
       
        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
       

        $data = array(
            'titulo_header'        => 'Confirmação de Rematrícula - 2022'
        );
        

        $this->load->view('rematricula/login', $data);
    }


   
}

?>