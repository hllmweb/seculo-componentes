<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_notificacao extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    //FILTRO DE TURMAS
    function lst_turma($p){
        $this->db->distinct();
        $this->db->select("CODTURMA");
        $this->db->from("RM.VW_TURMAS");
        $this->db->where('CODCURSO', $p['p_codcurso']);
        $this->db->order_by("CODTURMA", "ASC");
        $query = $this->db->get();
        return $query->result_array();
    }
    
    //FILTRO DE ALUNOS
    function lst_aluno($p){
        $this->db->distinct();
        $this->db->select("RA, NM_ALUNO");
        $this->db->from("BD_CONTROLE.VW_ALUNO_RESP_RM");
        $this->db->where("CODTURMA", $p['p_codturma']);
        $this->db->where("CODCURSO", $p['p_codcurso']);
        $this->db->where("NM_RESPONSAVEL IS NOT NULL");
        $this->db->order_by("CODTURMA", "DESC");
        $query = $this->db->get();
        return $query->result_array();
    }

    //
    function lst_aluno_mail($p){
        $query = $this->db->query("select * from rm.vw_aluno_resp_rm_geral where cpf_responsavel = '".$p['p_cpf_responsavel']."' and rownum = 1");
        return $query->result_array();
    }

    //FILTRO DE RESPONSAVEIS
    function lst_responsavel($p){
        /*$this->db->select("CPF_RESPONSAVEL, NM_RESPONSAVEL");
        $this->db->from("BD_CONTROLE.VW_ALUNO_RESP_RM");
        $this->db->where("CODTURMA", $p['p_codturma']);
        $this->db->where("CODCURSO", $p['p_codcurso']);
        $this->db->where("NM_RESPONSAVEL IS NOT NULL");
        $query = $this->db->get();
        return $query->result_array();*/

        $sql = "SELECT CPF_RESPONSAVEL, NM_RESPONSAVEL, CEL_RESPONSAVEL, 
        (SELECT DISTINCT 'S' FROM RM.VW_ALUNO_RESP_RM_FINANCEIRO FIN WHERE FIN.RA=R.RA AND FIN.CPF_RESPONSAVEL = R.CPF_RESPONSAVEL) AS FIN
          FROM 
          RM.VW_ALUNO_RESP_RM_GERAL R
          WHERE CPF_RESPONSAVEL IS NOT NULL AND TURMA = '".$p['p_codturma']."'
          ORDER BY NM_RESPONSAVEL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //FILTRO DE NOTIFICACAO
    function lst_notificacao(){
        /*$this->db->select("ID_NOTIFICACAO, DTHORA_CADASTRO, LOGIN_CADASTRO, TITULO, ID_PUB_DESTINO, CODCURSO_DESTINO, MENSAGEM, FLG_NOTIFICAR, DT_NOTIFICAR, HR_NOTIFICAR");
        $this->db->from("BD_APLICACAO.APP_NOTIFICACAO");
        $this->db->where("TRUNC(DTHORA_CADASTRO) = TO_DATE(SYSDATE,'DD/MM/YYYY')");
        $this->db->order_by("ID_NOTIFICACAO", "DESC");
        $query = $this->db->get();
        OFFSET 1 ROWS FETCH NEXT 10 ROWS ONLY

        */


        $sql = "SELECT ID_NOTIFICACAO, DTHORA_CADASTRO, LOGIN_CADASTRO, TITULO, ID_PUB_DESTINO, CODCURSO_DESTINO, MENSAGEM, FLG_NOTIFICAR, DT_NOTIFICAR, HR_NOTIFICAR FROM BD_APLICACAO.APP_NOTIFICACAO ORDER BY DT_NOTIFICAR DESC FETCH FIRST 10 ROWS ONLY";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    //FILTRO DE NOTIFICACAO PEGANDO A DATA E HORA ATUAL
    function getDate_notificacao(){        
        $sql = "SELECT * FROM BD_APLICACAO.APP_NOTIFICACAO WHERE 
                DTHORA_CADASTRO = SYSDATE"; //TO_DATE('28/04/2020 10:29:34','DD/MM/YYYY hh24:mi:ss')
        $query = $this->db->query($sql);
        return $query->result_array(); 
    }

    //FORMULÁRIO DE ADICIONAR NOTIFICACAO P/ PESSOA
    function add_notificacao_pessoa($p){
        $data = array(
            'ID_NOTIFICACAO'        => $p['p_id_notificacao'],
            'USU_LOGIN'             => $p['p_usu_login'],
            'TIPO_PESSOA'           => $p['p_tipo_pessoa'],
            'NOTIFICA_DEPENDENTE'   => $p['p_notifica_dependente']
        );
        $this->db->insert("BD_APLICACAO.APP_NOTIFICACAO_PESSOAS", $data);
        $this->db->close();
    }

    //FORMULÁRIO DE ADICIONAR NOTIFICACAO
    function add_notificacao($p){
        $data = array(
            'LOGIN_CADASTRO'        => $_SERVER['REMOTE_ADDR'],
            'TITULO'                => $p['p_titulo'],
            'ID_PUB_DESTINO'        => $p['p_id_pub_destino'],
            'CODCURSO_DESTINO'      => $p['p_curso'],
            'CODTURMA_DESTINO'      => $p['p_turma'],
            'MENSAGEM'              => $p['p_msg'],
            'ANEXO'                 => $p['p_anexo'],
            'FLG_NOTIFICAR'         => $p['p_envio'],
            'ID_SERVICO'            => $p['p_id_servico'],
            'DT_NOTIFICAR'          => $p['p_dt_notificar'],
            //'DT_NOTIFICAR'          => date('d-M-y',strtotime(implode("-",array_reverse(explode("/",$p['p_dt_notificar']))))),
            'HR_NOTIFICAR'          => $p['p_hr_notificar'],
            'TIPO_NOTIFICACAO'      => 'COMUNICADO'
        );


        $this->db->insert("BD_APLICACAO.APP_NOTIFICACAO", $data);
        $this->db->close();
    }

    /* 
        STORED PROCEDURE RESPONSÁVEL POR LISTAR, E INSERIR AS NOTIFICAÇÕES PARA SEREM ENVIADAS
        P_OPERACAO {
                LISTAR P/ APP     = 1;
                INSERIR           = 2;
        }
    */
    function sp_notificacao($p){
        $cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',          'value' => $p['p_operacao']),
            array('name' => ':P_USU_LOGIN',         'value' => $p['p_usu_login']),
            array('name' => ':P_ID_NOTIFICACAO',    'value' => $p['p_id_notificacao']),
            array('name' => ':P_CURSOR',            'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('BD_APLICACAO','SP_NOTIFICACAO', $dados);
        return $query;
    }


    function sp_email($p){
        $cursor = '';
        $dados = array(
            array('name' => ':P_TIPO',          'value' => $p['p_tipo']),
            array('name' => ':P_DT_INICIO',     'value' => $p['p_dt_inicio']),
            array('name' => ':P_DT_FIM',        'value' => $p['p_dt_fim']),
            array('name' => ':P_CURSOR',        'value' => $cursor, 'type' => OCI_B_CURSOR)
        );

        $query = $this->db->procedure('RM','SP_MONITOR_ACADEMICO', $dados);
        return $query;
    }



}



