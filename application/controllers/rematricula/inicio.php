<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_rematricula','rematricula', true);
       
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

        //echo $cd_usuario_resp;


        // $codusuario = $this->input->get_post('codusuario');

        $param = array(
            'p_codusuario' => $cd_usuario_resp
        );

        $lst_alunos = $this->rematricula->lst_aluno($param);

        $data = array(
            'titulo_header'        => 'Confirmação de Rematrícula - 2022',
            'lista_aluno'          => $lst_alunos
        );
        

        $this->load->view('rematricula/index', $data);
    }


    function confirma_rematricula(){
        $ra                 = $this->input->get_post('p_ra');
        $codusuario         = $this->input->get_post('p_codusuario');
        $idperlet_prox      = $this->input->get_post('p_idperlet_prox');        
    

        $param = array(
            'p_ra'                  => $ra,
            'p_codusuario'          => $codusuario,
            'p_idperlet_prox'       => $idperlet_prox
        );

        $insert_rematricula = $this->rematricula->insert_rematricula($param);
        if(!$insert_rematricula){
            echo "insert";
        }

    }
 
}

?>