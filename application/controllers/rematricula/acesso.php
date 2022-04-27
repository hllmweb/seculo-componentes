<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acesso extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        //$this->load->model('m_rematricula','rematricula', true);
       
        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $codusuario = $this->input->get_post('codusuario');

        // $param = array(
        //     'p_codusuario' => $codusuario
        // );

        $data = array(
            'titulo_header'        => 'Rematrícula - 2021',
            'codusuario'           => $codusuario
        );
        

        $this->load->view('rematricula/acesso', $data);
    }


 
}

?>