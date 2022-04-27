<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_calendario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }


    function getCalendarioTurma($p){
        $query = $this->db->query("SELECT NOME, RA, TURMA FROM RM.vw_aluno WHERE RA = '".$p['p_ra']."'");
        return $query->result_array();
    }

    function getCalendarioProva($p){
        $query = $this->db->query("SELECT c.CD_TURMA,
                                        c.DC_CALENDARIO,
                                        TO_CHAR(C.DATA,'DD/MM/YYYY') AS DATA,
                                        c.NR_DIAS,
                                        c.DC_COLOR,
                                        C.PESO, 
                                        C.NOTA_PROVA,
                                        C.INFO_PROVA,
                                        C.ANEXO
        FROM BD_SICA.VW_AES_CALENDARIOS c
        WHERE (C.CD_TURMA IS NULL OR C.CD_TURMA ='".$p['p_codturma']."')
              AND TO_CHAR(C.DATA, 'MM/YYYY') = TO_CHAR(SYSDATE,'MM/YYYY') 
        ORDER BY C.DATA, C.ORDEM");
        return $query->result_array();

    }
   

    function getCalendarioMesProva($p){
            $query = $this->db->query("SELECT C.CD_TURMA,
                                            C.CD_DISCIPLINA,
                                            C.DC_CALENDARIO,
                                            TO_CHAR(C.DATA,'DD/MM/YYYY') AS DATA,
                                            C.NR_DIAS,
                                            C.DC_COLOR,
                                            C.PESO, 
                                            C.NOTA_PROVA,
                                            C.INFO_PROVA,
                                            C.ANEXO
              FROM BD_SICA.VW_AES_CALENDARIOS C
             WHERE 
             (C.CD_TURMA IS NULL OR C.CD_TURMA ='".$p['p_codturma']."') 
             AND TO_CHAR(C.DATA, 'MM/YYYY') = TO_CHAR(SYSDATE,'MM/YYYY')
             ORDER BY C.DATA, C.ORDEM");
          return $query->result_array();
    }

}



