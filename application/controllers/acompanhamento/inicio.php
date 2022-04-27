<?php
header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_acompanhamento', 'acompanhamento', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $Context    = $this->input->get_post('Context');
        $Context_Arr = explode(";", $Context);
        $arrN = array();

        foreach($Context_Arr as $Item):
            $Valor = explode('=',$Item);
            $arrN[$Valor[0]] = $Valor[1];
        endforeach;

        $cd_usuario_resp = $arrN["CodUsuario"]; 

        $params = array(
            'p_operacao'   =>  3,
            'p_cdUsuario'  =>  $cd_usuario_resp           
        );


        $lista_turma = $this->acompanhamento->turma_acompanhamento($params);


   
        /*
             if(empty($lista_turma)){
            echo "<h1 style='text-align:center; padding:5px;'>Você não tem permissão de acesso</h1>";
            exit;
        }
            CODCURSO PARA TURMA INFANTIL 
            CODCURSO = 001
        */

      
        //LISTA AS TURMAS 
        $data = array(
           'titulo_header' => 'Acompanhamento Infantil - '.date('d/m/Y'),
           'listar'        => $lista_turma,
           'codusuario'    => $cd_usuario_resp,
           'tipo_user'     => is_string($cd_usuario_resp)
        );


        $this->load->view('acompanhamento/index', $data);
    }


  
}