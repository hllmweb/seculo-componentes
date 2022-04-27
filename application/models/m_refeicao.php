<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_refeicao extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
    
    function acesso($p){
        $query = $this->db->query("SELECT F.CHAPA, F.NOME, CODSECAO, P.CPF
        FROM RM.PFUNC F 
        JOIN RM.PPESSOA P ON F.CODPESSOA=P.CODIGO
        WHERE F.DTDESLIGAMENTO IS NULL  --F.CODSITUACAO IN('A','F') 
         AND (P.CPF = '".$p['p_chapa']."' OR F.CHAPA = '".$p['p_chapa']."')
         AND 
          (TO_CHAR(DTNASCIMENTO,'DDMMYYYY') = '".$p['p_dt_nascimento']."' OR TO_CHAR(DTNASCIMENTO,'DDMMYY') = '".$p['p_dt_nascimento']."')");

        return $query->result_array();

    }

    function lib_acesso(){
        $query = $this->db->query("SELECT RM.REF_LIBERA FROM DUAL ");
        return $query->result_array();
    }

    function lst_refeicao($p){
        $query = $this->db->query("SELECT CHAPA, DATA FROM RM.ZMDDISPREF WHERE 
                                    CHAPA = '".$p['p_chapa']."' AND TRUNC(DATA) = TRUNC(SYSDATE)");
        return $query->result_array();
    }

    function lst_subordinados($p){
        $query = $this->db->query("SELECT F.CHAPA, F.NOME, CODSECAO, NVL((SELECT 
                CASE 
                WHEN Z.CHAPA = F.CHAPA THEN
                'N'
                ELSE
                'S'
                END   
                FROM RM.ZMDDISPREF Z WHERE TRUNC(Z.DATA) = TRUNC(SYSDATE) AND Z.CHAPA = F.CHAPA),'S') AS CHECK_STATUS FROM RM.PFUNC F 
        WHERE  
        F.DTDESLIGAMENTO IS NULL AND F.CHAPA <> '".$p['p_chapa']."'
        AND 
        (
                F.CODSECAO IN 
                 ( SELECT C.CODSECAO FROM RM.PSUBSTCHEFE C
                 WHERE NVL(C.DATAFIM,TRUNC(SYSDATE)) <= TRUNC(SYSDATE)
                 AND C.CHAPASUBST = '".$p['p_chapa']."' --MATRICULA SUPERVISOR
                 AND  C.MASTER = 0)
                 
                 OR  
        
                
                 EXISTS( SELECT C.CODSECAO FROM RM.PSUBSTCHEFE C
                 WHERE NVL(C.DATAFIM,TRUNC(SYSDATE)) <= TRUNC(SYSDATE)
                 AND C.CHAPASUBST = '".$p['p_chapa']."' --MATRICULA SUPERVISOR
                 AND  C.MASTER = 1 AND F.CODSECAO LIKE  C.CODSECAO || '%')  
        )
         ORDER BY F.NOME");
        return $query->result_array();
    }

    function add_refeicao($p){
        $data = array(
            'CHAPA'       => $p['p_chapa'],
            'IDTERMINAL'  => $p['p_idterminal']
        );

        $this->db->insert("RM.ZMDDISPREF", $data);
        $this->db->close();
    }

    function del_refeicao($p){
        $inicio = date('d-M-y',strtotime(implode("-",array_reverse(explode("/",date('d/m/Y'))))));
        $this->db->where('CHAPA', $p['p_chapa']);
        $this->db->where('TRUNC(DATA)', $inicio);
        $this->db->delete("RM.ZMDDISPREF");
    }


    function add_refeicao_periodo($p){
        $data = array(
            'CHAPA'         => $p['p_chapa'],
            'DATA_INICIO'   => date('d-M-y',strtotime(implode("-",array_reverse(explode("/", $p['p_data_inicio']))))),
            'DATA_FIM'      => date('d-M-y',strtotime(implode("-",array_reverse(explode("/", $p['p_data_fim']))))),
            'IDTERMINAL'    => $p['p_idterminal']
        );
        
        $this->db->insert("RM.ZMDDISPREF_PERIODO", $data);
        $this->db->close();
    }

    function lst_refeicao_periodo($p){
        $query = $this->db->query("SELECT DATA_INICIO, DATA_FIM, TO_CHAR(DATACAD,'DD/MM/YYYY HH24:MI:SS') AS DATA_CADASTRO FROM RM.ZMDDISPREF_PERIODO WHERE 
                                    CHAPA = '".$p['p_chapa']."' ORDER BY DATACAD DESC");
        return $query->result_array();
    }

    function lst_check_funcionarios(){
        /*$query = $this->db->query("SELECT F.CHAPA AS CODIGO, F.NOME, 
        CASE 
         WHEN INSTR(FC.NOME,'PROFESSOR', 1) >= 1 THEN 'PROFESSOR'      
         ELSE  REPLACE( REPLACE( REPLACE( REPLACE( REPLACE(  REPLACE(FC.NOME,'AUXILIAR','AUX.') , 'TECNICA', 'TÉC.') , 'RECURSOS HUMANOS', 'RH') , 'TECNICO', 'TEC.') , 'ASSISTENTE' , 'ASSIST.') , 'COORDENADOR', 'COORD.')
        END AS CARGO, 
        P.CPF,
        DECODE(R.CHAPA,NULL,'SIM','NÃO') ALMOCO_HOJE,
        
        NVL((SELECT 
            CASE 
                WHEN Z.CODIGO = F.CHAPA THEN
                'S'
                ELSE
                'N'
            END 
            FROM RM.ZMDPREREF Z 
                WHERE TRUNC(Z.DATA) = TRUNC(SYSDATE) AND Z.CODIGO = F.CHAPA
         ),'N') AS CHECK_ATUAL
        
                FROM RM.PFUNC F 
                JOIN RM.PPESSOA P ON F.CODPESSOA=P.CODIGO
                LEFT JOIN RM.PFUNCAO FC ON  FC.CODCOLIGADA= F.CODCOLIGADA AND FC.CODIGO = F.CODFUNCAO
                LEFT JOIN RM.ZMDDISPREF R  ON R.CHAPA = F.CHAPA AND DATA = TRUNC(SYSDATE) AND TIPO = 1
                WHERE F.DTDESLIGAMENTO IS NULL  AND F.CODSITUACAO IN('A','F') 
        order by F.NOME");*/

        $query = $this->db->query("SELECT 
        U.CD_USUARIO AS CODIGO,
        U.NM_USUARIO AS NOME,
        BT.NOME AS SERIE,
        U.CPF,
        U.TIPO_USUARIO,
        U.CD_TURMA,
        CASE 
        WHEN U.TIPO_USUARIO = 'A' THEN 'ALUNO'
        WHEN U.TIPO_USUARIO = 'R' THEN 'RESP. ALUNO'
        WHEN U.TIPO_USUARIO = 'T' THEN 'TERCEIRO'
        WHEN U.TIPO_USUARIO = 'V' THEN 'VISITANTE'
        WHEN FC.NOME IS NULL THEN P2.DC_FUNCAO                  
        WHEN INSTR(FC.NOME,'PROFESSOR', 1) >= 1 THEN 'PROFESSOR'      
            ELSE  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(FC.NOME,'AUXILIAR','AUX.') , 'TECNICA', 'TÉC.') , 'RECURSOS HUMANOS', 'RH') , 'TECNICO', 'TEC.') , 'ASSISTENTE' , 'ASSIST.') , 'COORDENADOR', 'COORD.')
        END AS CARGO,
        DECODE(F.CHAPA,NULL,'SIM','NÃO') AS ALMOCO_HOJE,
        NVL((SELECT 
        CASE 
            WHEN Z.CODIGO = U.CD_USUARIO THEN 'S'
            ELSE 'N' END 
        FROM RM.ZMDPREREF Z WHERE Z.DATA = TRUNC(SYSDATE) AND Z.CODIGO = U.CD_USUARIO
        ),'N') AS CHECK_ATUAL          
        FROM BD_CONTROLE.USUARIOS U
        LEFT JOIN RM.PPESSOA P ON P.CPF = U.CPF OR P.CODIGO = U.CD_USUARIO
        LEFT JOIN RM.PFUNC F ON F.CODPESSOA = P.CODIGO AND F.CODCOLIGADA = 1
        LEFT JOIN RM.PFUNCAO FC ON FC.CODIGO = F.CODFUNCAO AND FC.CODCOLIGADA= F.CODCOLIGADA                       
        LEFT JOIN BD_RH.VW_PESSOA_ALL P2 ON P2.CD_RM = U.CHAPA
        LEFT JOIN RM.STURMA BT ON BT.CODTURMA = U.CD_TURMA
        WHERE U.ATIVO = 1 
        AND U.TIPO_USUARIO NOT IN ('V', 'R','T')
        AND NVL(F.CODSITUACAO,'0') NOT IN ('D') 
        ORDER BY U.NM_USUARIO");

        return $query->result_array();
    }

    function add_check_funcionario($p){
        $data = array(
            'CODIGO'    => $p['p_codigo'],
            'DATA'      => date('d-M-y',strtotime(implode("-",array_reverse(explode("/", $p['p_data'])))))
        );

        $this->db->insert("RM.ZMDPREREF", $data);
        $this->db->close();
    }

    function del_check_funcionario($p){
        $inicio = date('d-M-y',strtotime(implode("-",array_reverse(explode("/",$p['p_data']))))); 
        $this->db->where('CODIGO', $p['p_codigo']);
        $this->db->where('TRUNC(DATA)', $inicio);
        $this->db->delete("RM.ZMDPREREF");
    }


    function lst_check_funcionario($p){
        $query = $this->db->query("SELECT DATA_PERIODO RM.ZMDPREREF WHERE CODIGO = '".$p['p_codigo']."' AND TO_CHAR(DATA,'DDMMYYYY') = '".$p['p_data']."'");
        return $query->result_array();
    }

    function lst_filtro($p){
        $query = $this->db->query("SELECT 
        U.CD_USUARIO AS CODIGO,
        U.NM_USUARIO AS NOME,
        BT.NOME AS SERIE,
        U.CPF,
        U.TIPO_USUARIO,
        U.CD_TURMA,
        CASE 
        WHEN U.TIPO_USUARIO = 'A' THEN 'ALUNO'
        WHEN U.TIPO_USUARIO = 'R' THEN 'RESP. ALUNO'
        WHEN U.TIPO_USUARIO = 'T' THEN 'TERCEIRO'
        WHEN U.TIPO_USUARIO = 'V' THEN 'VISITANTE'
        WHEN FC.NOME IS NULL THEN P2.DC_FUNCAO                  
        WHEN INSTR(FC.NOME,'PROFESSOR', 1) >= 1 THEN 'PROFESSOR'      
            ELSE  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(FC.NOME,'AUXILIAR','AUX.') , 'TECNICA', 'TÉC.') , 'RECURSOS HUMANOS', 'RH') , 'TECNICO', 'TEC.') , 'ASSISTENTE' , 'ASSIST.') , 'COORDENADOR', 'COORD.')
        END AS CARGO,
        DECODE(F.CHAPA,NULL,'SIM','NÃO') AS ALMOCO_HOJE,
        NVL((SELECT 
        CASE 
            WHEN Z.CODIGO = U.CD_USUARIO THEN 'S'
            ELSE 'N' END 
        FROM RM.ZMDPREREF Z WHERE Z.DATA = TRUNC(SYSDATE) AND Z.CODIGO = U.CD_USUARIO
        ),'N') AS CHECK_ATUAL          
        FROM BD_CONTROLE.USUARIOS U
        LEFT JOIN RM.PPESSOA P ON P.CPF = U.CPF OR P.CODIGO = U.CD_USUARIO
        LEFT JOIN RM.PFUNC F ON F.CODPESSOA = P.CODIGO AND F.CODCOLIGADA = 1
        LEFT JOIN RM.PFUNCAO FC ON FC.CODIGO = F.CODFUNCAO AND FC.CODCOLIGADA= F.CODCOLIGADA                       
        LEFT JOIN BD_RH.VW_PESSOA_ALL P2 ON P2.CD_RM = U.CHAPA
        LEFT JOIN RM.STURMA BT ON BT.CODTURMA = U.CD_TURMA
        WHERE U.ATIVO = 1 
        AND U.TIPO_USUARIO NOT IN ('V', 'R','T')
        AND NVL(F.CODSITUACAO,'0') NOT IN ('D') 
        and U.CD_TURMA = '".$p['p_turma']."' 
        ORDER BY U.NM_USUARIO");

        return $query->result_array();
    }


    function lst_tipo_usuario($p){
        $query = $this->db->query("SELECT 
        U.CD_USUARIO AS CODIGO,
        U.NM_USUARIO AS NOME,
        BT.NOME AS SERIE,
        U.CPF,
        U.TIPO_USUARIO,
        U.CD_TURMA,
        CASE 
        WHEN U.TIPO_USUARIO = 'A' THEN 'ALUNO'
        WHEN U.TIPO_USUARIO = 'R' THEN 'RESP. ALUNO'
        WHEN U.TIPO_USUARIO = 'T' THEN 'TERCEIRO'
        WHEN U.TIPO_USUARIO = 'V' THEN 'VISITANTE'
        WHEN FC.NOME IS NULL THEN P2.DC_FUNCAO                  
        WHEN INSTR(FC.NOME,'PROFESSOR', 1) >= 1 THEN 'PROFESSOR'      
            ELSE  REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(FC.NOME,'AUXILIAR','AUX.') , 'TECNICA', 'TÉC.') , 'RECURSOS HUMANOS', 'RH') , 'TECNICO', 'TEC.') , 'ASSISTENTE' , 'ASSIST.') , 'COORDENADOR', 'COORD.')
        END AS CARGO,
        DECODE(F.CHAPA,NULL,'SIM','NÃO') AS ALMOCO_HOJE,
        NVL((SELECT 
        CASE 
            WHEN Z.CODIGO = U.CD_USUARIO THEN 'S'
            ELSE 'N' END 
        FROM RM.ZMDPREREF Z WHERE Z.DATA = TRUNC(SYSDATE) AND Z.CODIGO = U.CD_USUARIO
        ),'N') AS CHECK_ATUAL          
        FROM BD_CONTROLE.USUARIOS U
        LEFT JOIN RM.PPESSOA P ON P.CPF = U.CPF OR P.CODIGO = U.CD_USUARIO
        LEFT JOIN RM.PFUNC F ON F.CODPESSOA = P.CODIGO AND F.CODCOLIGADA = 1
        LEFT JOIN RM.PFUNCAO FC ON FC.CODIGO = F.CODFUNCAO AND FC.CODCOLIGADA= F.CODCOLIGADA                       
        LEFT JOIN BD_RH.VW_PESSOA_ALL P2 ON P2.CD_RM = U.CHAPA
        LEFT JOIN RM.STURMA BT ON BT.CODTURMA = U.CD_TURMA
        WHERE U.ATIVO = 1 
        AND U.TIPO_USUARIO NOT IN ('V', 'R','T')
        AND NVL(F.CODSITUACAO,'0') NOT IN ('D') 
        AND U.TIPO_USUARIO ".$p['p_tipo_usuario']."
        ORDER BY U.NM_USUARIO");

        return $query->result_array();
    }


}

?>