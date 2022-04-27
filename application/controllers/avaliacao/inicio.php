<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_acompanhamento', 'acompanhamento', true);
        $this->load->model('m_questionamento', 'questionamento', true);

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


        /*
            CODCURSO PARA TURMA INFANTIL 
            CODETAPA{
                16 = 1º BIMESTRE 
                26 = 2º BIMESTRE
                36 = 3º BIMESTRE
                46 = 4º BIMESTRE
            }
        */
        $params = array(
            'codcurso'     =>  001,
            'codusuario'   =>  $cd_usuario_resp           
        );

        

        $cd_turma = $this->acompanhamento->diario_acompanhamento_prof($params);


        $data = array(
            'titulo_header' =>  'Avaliação Conceitual',
            'codusuario'    => $cd_usuario_resp,
            'codturma'      => $cd_turma[0]['CODTURMA']
        );

        $this->load->view('avaliacao/index', $data);
    }

    function turma(){
        $params = array(
            'p_operacao'     =>  1,
            'p_codetapa'     =>  $this->input->get_post("p_codetapa"),
            'p_codturma'     =>  $this->input->get_post("p_codturma")          
        );

        //LISTA AS TURMAS 
        $data = array(
            'titulo_header' =>  'Questionario Infantil',
            'listar'        =>  $this->questionamento->questionario_acompanhamento($params),
            'codusuario'    => $this->input->get_post('p_codusuario')
        );

        $this->load->view('avaliacao/turma', $data);
    }


  
}