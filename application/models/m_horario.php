<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_horario extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function lst_horario($p){
        
        /*$query = $this->db->query("SELECT H.DIASEMANA, H.HORAINICIAL, H.HORAFINAL, T.CODTURMA, D.NOME FROM RM.SHORARIO H
        JOIN RM.SHORARIOTURMA HT ON HT.CODHOR = H.CODHOR
        JOIN RM.STURMADISC T ON HT.IDTURMADISC = T.IDTURMADISC
        JOIN RM.SDISCIPLINA D ON D.CODDISC = T.CODDISC
        JOIN RM.SMATRICPL M ON M.CODTURMA = T.CODTURMA AND M.CODSTATUS = 15
        WHERE M.RA = '".$p['p_ra']."' ORDER BY HORAINICIAL ASC");*/
        $query = $this->db->query("SELECT DESCRICAO, DIASEMANA, HORAINICIAL, HORAFINAL, NOME FROM RM.VW_ALUNO_HORARIO 
        WHERE RA = '".$p['p_ra']."' ORDER BY HORAINICIAL ASC");
        return $query->result_array();

    }
   


}



