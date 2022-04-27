<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_chat', 'chat', true);  

    }

    //página com as informações do chat
    public function index(){
        $p_codusuario = $this->input->get_post('codusuario');


        $codusuario         = $this->chat->acesso(array('p_codusuario' => $p_codusuario));
        

	$lst_departamento   = $this->chat->lst_departamento();




	$data = array(
    		'titulo_header'     => 'Chat Século',
            'nome_usuario'      => $codusuario[0]['NOME'],
            'codusuario'        => $codusuario[0]['USU_LOGIN'],
            'lst_departamento'  => $lst_departamento 
        );

	

    	$this->load->view('chat/index.php', $data);
    }



 }
 ?>