<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deletar extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_chat', 'chat', true);  

    }

    //página com as informações do chat
    public function mensagem(){
        $p_data_hora    = $this->input->get_post('p_data_hora');
        $p_usu          = $this->input->get_post('p_usu');
        $p_usu_destino  = $this->input->get_post('p_usu_destino');

        $param = array(
            'p_data_hora'   => $p_data_hora,
            'p_usu'         => $p_usu,
            'p_usu_destino' => $p_usu_destino
        );
        $del_mensagem = $this->chat->del_conversa_id($param);
        echo $del_mensagem;
    }



 }
 ?>