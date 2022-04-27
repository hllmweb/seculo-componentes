<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_ocorrencia extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function lst_ocorrencia($p){
        $query = $this->db->query("SELECT L.USU_LOGIN , SUBSTR(RM.F_OCORRENCIA_ALU(O.CODCOLIGADA, O.IDOCORALUNO),1,255) AS OBS, O.CODCOLIGADA, O.IDOCORALUNO
        FROM RM.VW_ALUNO_RESP_RM_PORTAL P
          INNER JOIN BD_APLICACAO.LOGIN_APP L ON L.USU_LOGIN = P.CPF_RESPONSAVEL AND L.FLG_ATIVO = 'S' AND L.USU_TIPO = 'R'
          INNER JOIN RM.SOCORRENCIAALUNO O ON O.RA = P.RA and nvl(O.DISPONIVELWEB,0) = 1
          INNER JOIN RM.SOCORRENCIATIPO OT ON OT.CODOCORRENCIAGRUPO = O.CODOCORRENCIAGRUPO AND OT.CODCOLIGADA = O.CODCOLIGADA
       WHERE NVL(OT.DISPONIVELWEB,0) = 1
     AND L.USU_LOGIN = '".$p['p_codusuario']."'
     ORDER BY o.RECCREATEDBY DESC");
        return $query->result_array();

    }
   


}



