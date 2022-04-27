<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_esqueci','esqueci', true);
        //$this->load->model('m_calendario','calendario', true);

        //libers
        $this->load->helper(array('url','directory'));
    }

    function index(){
        $p_codusuario = $this->input->get_post("codusuario");

        $param = array(
            'titulo_header_1'   => 'App Século Manaus - Esqueci a Senha',
            'p_codusuario'      => $p_codusuario
        );

        $this->load->view('esqueci_senha/index', $param);

    }

    function atualizar(){
        $nova_senha   = $this->input->get_post("nova_senha");
        $p_codusuario = $this->input->get_post("p_codusuario");
    
        $param = array(
            'nova_senha'    => $nova_senha,
            'p_codusuario'  => $p_codusuario
        );
    
    

        $atualiza_senha = $this->esqueci->up_esqueci($param);
        if($atualiza_senha == true){
            echo "<h2>Senha atualizada com sucesso</h2>";
        }else{
            echo "erro";
        }
        
    }


}
?>