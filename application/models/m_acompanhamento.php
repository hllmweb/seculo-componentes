<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_acompanhamento extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
        0 - LISTA OS ALUNOS DA TURMA SELECIONADA
        1 - INSERE A FICHA DE ACOMPANHAMENTO DO ALUNO SELECIONADO
        2 - EDITA A FICHA DE ACOMPANHAMENTO DO ALUNO SELECIONADO
    */
    function turma_acompanhamento($p) {
        $cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',          'value' => $p['p_operacao']),
            array('name' => ':P_CODTURMA',          'value' => $p['p_codturma']),
            array('name' => ':P_CODUSUARIO',        'value' => $p['p_cdUsuario']),
            array('name' => ':P_RA',                'value' => $p['p_ra']),
            array('name' => ':P_DT_ACOMPANHAMENTO', 'value' => $p['p_dt_acompanhamento']),
            array('name' => ':P_COLACAO',           'value' => $p['p_colacao']),
            array('name' => ':P_ALMOCO',            'value' => $p['p_almoco']),
            array('name' => ':P_LANCHE',            'value' => $p['p_lanche']),
            array('name' => ':P_SONO',              'value' => $p['p_sono']),
            array('name' => ':P_EVACUACAO',         'value' => $p['p_evacuacao']),
            array('name' => ':P_OBS_COLACAO',       'value' => $p['p_obs_colacao']),
            array('name' => ':P_OBS_ALMOCO',        'value' => $p['p_obs_almoco']),
            array('name' => ':P_OBS_LANCHE',        'value' => $p['p_obs_lanche']),
            array('name' => ':P_OBS_SONO',          'value' => $p['p_obs_sono']),
            array('name' => ':P_OBS_EVACUACAO',     'value' => $p['p_obs_evacuacao']),
            array('name' => ':P_OBSERVACAO',        'value' => $p['p_observacao']),
            array('name' => ':P_CURSOR',            'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('RM','SP_ACOMPANHAMENTO_INFANTIL', $dados);
        return $query;   
    }


    //ENVIAR NOTIFICAÇÃO
    function enviar_notificacao($p){
        $dados = array(
            array('name' => ':P_COD_TURMA',          'value' => $p['p_cod_turma'])
        );

        $query = $this->db->procedure('RM','SP_NOTIFICACAO_INFANTIL', $dados);
        return $query;
    }


    //LISTA A TURMA DO PROF
    function diario_acompanhamento_prof($p){
        $this->db->where('CODCURSO', $p['codcurso']);
        $this->db->where('CODPROF', $p['codusuario']);
        $query = $this->db->get('RM.VW_TURMAS')->result_array();
        return $query;
    }

    //LISTA A TURMA DO RESPONSÁVEL
    function diario_acompanhamento_resp($p){
        //
        //$query = $this->db->get('BD_CONTROLE.VW_ALUNO_RESP_RM')->result_array();
        $this->db->distinct();
        $this->db->select("AR.CODTURMA, T.NOME");
        $this->db->from("BD_CONTROLE.VW_ALUNO_RESP_RM AR");
        $this->db->join("RM.STURMA T", "T.CODTURMA = AR.CODTURMA");
        $this->db->where('AR.CPF_RESPONSAVEL', $p['codusuario']);
        $query = $this->db->get();
        return $query->result_array();
    }

    //LISTA A TURMA DO COORDENADOR
    function diario_acompanhamento_coord($p){
        
    }


    //LISTA ALUNOS ASSOCIADOS A TURMA
    function lista_turma_acompanhamento($p){
        $this->db->where('CODTURMA', $p['codturma']);
        $query = $this->db->get('RM.VW_ALUNOS_MATRICULADOS')->result_array();
        return $query;
    }

}



