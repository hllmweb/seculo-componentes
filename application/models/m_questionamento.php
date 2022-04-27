<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_questionamento extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
        0 - LISTA OS ALUNOS DA TURMA SELECIONADA
        1 - INSERE A FICHA DE ACOMPANHAMENTO DO ALUNO SELECIONADO
        2 - EDITA A FICHA DE ACOMPANHAMENTO DO ALUNO SELECIONADO
    */
        
    function questionario_acompanhamento($p) {
        $cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',          'value' => $p['p_operacao']),
            array('name' => ':P_CODETAPA',          'value' => $p['p_codetapa']),
            array('name' => ':P_CODTURMA',          'value' => $p['p_codturma']),
            array('name' => ':P_CODCOLIGADA',       'value' => $p['p_codcoligada']),
            array('name' => ':P_CODFILIAL',         'value' => $p['p_codfilial']),
            array('name' => ':P_PROFESSOR',         'value' => $p['p_professor']),
            array('name' => ':P_RA',                'value' => $p['p_ra']),
            array('name' => ':P_ETAPA',             'value' => $p['p_etapa']),
            array('name' => ':P_PERGUNTA',          'value' => $p['p_pergunta']),
            array('name' => ':P_RESPOSTA',          'value' => $p['p_resposta']),
            array('name' => ':P_CURSOR',            'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('RM','SP_QUESTIONAMENTO_AULA', $dados);
        return $query;   
    }



}



