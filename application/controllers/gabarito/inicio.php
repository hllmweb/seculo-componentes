<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        //passar como parametro usuário logado e aluno
        $codusuario = $this->input->get_post("codusuario");
        $ra         = $this->input->get_post("ra");

        $data = array(
            'titulo_header'  => 'Lista de Provas Gabaritadas',
            'ra'             => $ra
            //'codusuario'     => $codusuario,
            

        );
        
        $this->load->view('gabarito/index', $data);
    }


  
}

?>