<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Atualizar extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_chat', 'chat', true);  

    }

    public function index(){
        $p_codusuario           = $this->input->get_post("codusuario");
        $p_codusuario_destino   = $this->input->get_post("codusuario_destino");
      
        $param = array(
            'p_usu_login'           => $p_codusuario,
            'p_usu_login_destino'   => $p_codusuario_destino
        );

        $this->chat->up_conversa($param);
    
    }



 }
 ?>