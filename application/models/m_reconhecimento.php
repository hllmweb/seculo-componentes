<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_reconhecimento extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function lst_reconhecimento(){
        
        /*$query = $this->db->query("SELECT H.DIASEMANA, H.HORAINICIAL, H.HORAFINAL, T.CODTURMA, D.NOME FROM RM.SHORARIO H
        JOIN RM.SHORARIOTURMA HT ON HT.CODHOR = H.CODHOR
        JOIN RM.STURMADISC T ON HT.IDTURMADISC = T.IDTURMADISC
        JOIN RM.SDISCIPLINA D ON D.CODDISC = T.CODDISC
        JOIN RM.SMATRICPL M ON M.CODTURMA = T.CODTURMA AND M.CODSTATUS = 15
        WHERE M.RA = '".$p['p_ra']."' ORDER BY HORAINICIAL ASC");*/
        $query = $this->db->query("SELECT * FROM BD_CONTROLE.VW_PESSOAS_ACESSO WHERE ACESSO_EXPIRADO = 'N'");
        return $query->result_array();

    }
   


}



