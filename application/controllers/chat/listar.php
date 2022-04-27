<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listar extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_chat', 'chat', true);
    }


    public function mensagem(){
        $p_codusuario           = $this->input->get_post("codusuario");
        $p_codusuario_destino   = $this->input->get_post("codusuario_destino");


        $param = array(
            'p_usu_login'              => $p_codusuario,
            'p_usu_login_destino'      => $p_codusuario_destino
        );

        //select conversa
        $select_conversa = $this->chat->lst_converva_id($param);
        echo json_encode($select_conversa);
    }

    public function nome(){
        $p_codusuario_destino   = $this->input->get_post("codusuario_destino");
    
        $param = array(
            'p_usu_login_destino'      => $p_codusuario_destino
        );

        //select nome
        $select_nome = $this->chat->lst_converva_distinct($param);
        echo json_encode($select_nome);
    }

    public function mensagem_nao_lidas(){
        $p_codusuario           = $this->input->get_post("codusuario");
        $p_codusuario_destino   = $this->input->get_post("codusuario_destino");

        $param = array(
            'p_usu_login'           => $p_codusuario,
            'p_usu_login_destino'   => $p_codusuario_destino
        ); 

        $select_nao_lidas = $this->chat->lst_conversa_nao_lida($param);
        echo json_encode($select_nao_lidas);
        //echo $select_nao_lidas[0]["QUANTIDADE"];
        
    }
}
?>