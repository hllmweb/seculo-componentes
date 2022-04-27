<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_rematricula extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
  
    
    function lst_aluno($p){
        $query = $this->db->query("SELECT AR.CPF_RESPONSAVEL, AR.RA , AL.NOME , DECODE(MAT.RA,NULL,'N','S') CONFIRMOU
            FROM RM.VW_ALUNO_RESP_RM_FINANCEIRO AR
            INNER JOIN RM.VW_ALUNOS_MATRICULADOS AL ON AL.RA = AR.RA      
            LEFT JOIN RM.ZMDCONFMAT MAT ON MAT.RA = AL.RA AND MAT.IDPERLET_PROX = 3 WHERE AR.CPF_RESPONSAVEL = '".$p['p_codusuario']."' AND AL.CODTURMA NOT IN('EMM0301') ORDER BY AL.NOME");

        return $query->result_array();
    }


    function insert_rematricula($p){
        $data = array(
            'RA'                    => $p['p_ra'],
            'IDUSUARIO'             => $p['p_codusuario'],
            'IDPERLET_PROX'         => $p['p_idperlet_prox']
        );

        $this->db->insert('RM.ZMDCONFMAT', $data);
        $this->db->close();
    }

    function auth_login($p){
        $query = $this->db->query("SELECT * FROM RM.VW_ALUNO_RESP_RM_FINANCEIRO WHERE CPF_RESPONSAVEL ='".$p['p_cd_usuario']."' AND ROWNUM <= 1");
        return $query->result_array();

    }


}

?>