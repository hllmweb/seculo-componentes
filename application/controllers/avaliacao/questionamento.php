<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Questionamento extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_questionamento', 'questionamento', true);


        //libers
        $this->load->helper(array('form', 'url', 'html', 'directory'));
        $this->load->library(array('form_validation', 'session')); 
    }
    
    /*
        P_OPERACAO {
            0: LISTAGEM
            1: LISTA POR TURMA E BIMESTRE
            2: INSERE 
            3: UPDATE
            4: LISTAGEM DO TABELA ZMDQUESTAULA
        }
        
    */

    //LISTA E INSERE
    function index() {     
        $codetapa   = $this->input->get_post('codetapa');
        $turma      = $this->input->get_post('turma');
        $codusuario = $this->input->get_post('codusuario');
        



        $params_1 = array(
            'p_operacao'    => 5,
            //'p_codetapa'    => $codetapa,
            'p_codturma'    => $turma,
            'p_ra'          => $codusuario
        );

        //var_dump($params_1);

        //$codetapa = 16;
        $params_2 = array(
            'p_operacao'    => 6,
            'p_codetapa'    => $codetapa,
            'p_codturma'    => $turma
        );

   //     var_dump($params_2);


        $lista_alunos           = $this->questionamento->questionario_acompanhamento($params_1);
        $lista_alunos_questao   = $this->questionamento->questionario_acompanhamento($params_2);

        //var_dump($lista_alunos_questao);

        echo count($lista_alunos_questao);

        if(count($lista_alunos_questao) == 0):
        for($i=0; $i<count($lista_alunos); $i++):
            
            for($j=0; $j<17; $j++):
               
               for($k=0; $k<3; $k++):
                $this->questionamento->questionario_acompanhamento(
                    array(
                        'p_operacao' => 2, 
                        'p_codetapa' => $codetapa,
                        'p_codturma' => $turma,
                        'p_etapa'    => $lista_alunos[$i]['CODIGO']."-".$k,
                        'p_ra'       => $lista_alunos[$i]['RA'], 
                        'p_pergunta' => $j   
                ));  
                endfor;
            endfor;
        endfor;
        endif;

        $data = array(
            'titulo_header'  => 'Questionamento Infantil',
            'listar'         => $lista_alunos,
            'questoes'       => $lista_alunos_questao,
            'codusuario'     => $codusuario
        );       
       


        $this->load->view('avaliacao/questionamento', $data);
    }


    function etapa(){
        $etapa          = $this->input->get_post('etapa');
        $ra             = $this->input->get_post('ra');
        $turma          = $this->input->get_post('turma');
        $codetapa       = $this->input->get_post('codetapa');
        $etapa_questao  = $this->input->get_post('etapa_questao');

        $params_1 = array(
            'p_operacao' => 4,
            'p_etapa'    => $etapa,
            'p_ra'       => $ra,
            'p_codturma' => $turma,
            'p_codetapa' => $codetapa
        );

        //var_dump($params_1);

        $lista_aluno_questao = $this->questionamento->questionario_acompanhamento($params_1);


        $data = array(
            'listar_aluno_questao' => $lista_aluno_questao,
            'etapa_questao' => $etapa_questao
        );

        $this->load->view('avaliacao/etapa_questionamento', $data);   
    }


    function lancar(){
        $codresponsavel = $this->input->get_post('codresponsavel');
        $turma          = $this->input->get_post('turma');
        $ra             = $this->input->get_post('ra');
        $codetapa       = $this->input->get_post('codetapa');
        $codigo         = $this->input->get_post('codigo');
        $pergunta       = $this->input->get_post('pergunta');
        $etapa_questao  = $this->input->get_post('etapa_questao'); 
        $resposta       = $this->input->get_post('resposta');
        $cd_questao     = $this->input->get_post('cd_questao');
        //echo $codresponsavel." ".$cd_questao;
        //echo $turma.$ra.$codetapa." ".$codigo." ".$pergunta." ".$etapa_questao; 
        //exit;

        $params_1 = array(
            'p_operacao'    => 3,
            'p_ra'          => $ra,
            'p_etapa'       => $etapa_questao,
            'p_pergunta'    => $pergunta,
            'p_resposta'    => $resposta
        );

        $resultado = $this->questionamento->questionario_acompanhamento($params_1);

        echo $resultado[0]['MENSAGEM'];

    }
}

?>