<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Programatico extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_programatico','programatico', true);
        
        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function inicio(){     
        $p_ra           = $this->input->get_post('ra');
        $p_data         = date('d/m/Y');
        //$p_data_search  = (isset($p_data)) ? '22/07/2020' : $p_data;  

        $param = array(
            'p_ra'      => $p_ra,
            'p_data'    => $p_data
        );
        

        $lista_conteudo_programatico = $this->programatico->lst_conteudo_programatico($param);
    
        $data = array(
            'titulo_header'  => 'Conteúdo programatico',
            'conteudo'       => 'Aqui ficará o conteúdo programatico',
            'ra'             => $p_ra,
            'listar'         => $lista_conteudo_programatico
        );
        

        $this->load->view('conteudo/programatico_novo', $data);
    }


    function programatico_conteudo_search(){
        $p_ra           = $this->input->get_post('p_ra');
        $p_data         = $this->input->get_post('p_data');

        $param = array(
            'p_ra'      => $p_ra,
            'p_data'    => $p_data
        );
        
        $lista_conteudo_programatico = $this->programatico->lst_conteudo_programatico($param);
        
        $data = array(
            'listar'    => $lista_conteudo_programatico
        );

        $this->load->view('conteudo/programatico_conteudo_search', $data);

    }

  
}
?>