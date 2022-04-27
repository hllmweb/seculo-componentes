<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aula extends CI_Controller {
    
     function __construct() {
        parent::__construct();


        //models
        $this->load->model('m_horario','horario', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function inicio() {     
        $ra = $this->input->get_post('ra');

        $param = array(
            'p_ra' => $ra
        );

       $lista_horario = $this->horario->lst_horario($param);
    

        $data = array(
            'titulo_header'  => 'Horário de Aula',
            'conteudo'       => 'Aqui ficará o horário de aula',
            'ra'             => $ra,
            'listar'          => $lista_horario
        );
        
        $this->load->view('horario/aula', $data);
    }


  
}

?>