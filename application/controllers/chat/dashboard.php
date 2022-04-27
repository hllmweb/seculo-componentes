<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_chat', 'chat', true);
    }


    public function inicio(){
        $p_codusuario       = $this->input->get_post('codusuario');
        $codusuario         = $this->chat->acesso(array('p_codusuario' => $p_codusuario));

        $data = array(
            'titulo_header'     => 'Chat Século',
            'nome_usuario'      => $codusuario[0]['NOME'],
            'codusuario'        => $codusuario[0]['USU_LOGIN'],
        );

        $this->load->view("chat/dashboard", $data);
    }



}
?>