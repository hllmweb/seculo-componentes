<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_rematricula','rematricula', true);
       
        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $cd_usuario = $this->input->get_post('cd_usuario');

        $param = array(
            'p_cd_usuario' => $cd_usuario
        );

        $autenticacao = $this->rematricula->auth_login($param);

        if($autenticacao){
            echo 1; //header('Location: https://seculomanaus.com.br/componentes/portal/rematricula/inicio?Context=CodUsuario='.$autenticacao[0]['CPF_RESPONSAVEL']);
        }else{
            echo 0; //echo "<script>alert('Responsável Financeiro Não Cadastrado!');</script>";
        }

        // $param = array(
        //     'p_codusuario' => $codusuario
        // );

        // $data = array(
        //     'titulo_header'        => 'Rematrícula - 2021',
        //     'codusuario'           => $codusuario
        // );
        

        // $this->load->view('rematricula/acesso', $data);
    }


 
}

?>