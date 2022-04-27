<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_esqueci extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function up_esqueci($p){
        
        $query = $this->db->query("UPDATE BD_APLICACAO.LOGIN_APP SET USU_SENHA ='".$p['nova_senha']."', DT_ALTERA_SENHA = SYSDATE 
        WHERE USU_LOGIN = '".$p['p_codusuario']."'");
        
        if($query){
            return true;
        }else{
            return false;
        }

    }
   


}
