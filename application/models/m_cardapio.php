<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_cardapio extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /*
        LISTA DE CARDAPIO DO MOBILE
    */
    function lista_cardapio(){
    	/*$this->db->select("DESCRICAO, PATHARQUIVO");
    	$this->db->from("RM.SWEBMATERIALSEC");
    	$this->db->where("IDTIPOMATERIAL", 7);
    	$this->db->where("TO_CHAR(DATAEXPIRACAO, 'MM/YYYY') =", $p['p_dt_expiracao']);
    	$this->db->order_by("DATAEXPIRACAO DESC");
    	$query = $this->db->get();

    	return $query->result_array();*/

        $this->db->select("C.*, T.DC_TIPO, O.DC_OPCAO, CS.*");
        $this->db->from("RM.ZMDCARDAPIO C");
        $this->db->join("RM.ZMDCARDAPIO_SEMANA CS", "CS.ID_CARDAPIO=C.ID_CARDAPIO");
        $this->db->join("RM.ZMDCARDAPIO_TIPO T", "T.ID_TIPO=CS.ID_TIPO");
        $this->db->join("RM.ZMDCARDAPIO_OPCAO O", "O.ID_OPCAO=CS.ID_OPCAO");
        $this->db->order_by("CS.ORD");
        $query = $this->db->get();

        return $query->result_array();
    }


    function getDefaultSeamana(){
        $query = $this->db->query("SELECT 
            TO_CHAR(TRUNC(sysdate -(to_char(sysdate,'d')-2)),'DD/MM/YYYY') AS DT_INICIO, 
            TO_CHAR(TRUNC((sysdate) +(6-to_char((sysdate),'d'))),'DD/MM/YYYY') AS DT_FIM
 FROM  DUAL");
        return $query->result_array();
    }


    /*
        CARDAPIO
    */
    function update_cardapio($p){
        
        $cursor = '';
        $dados = array(
            array('name' => ':P_OPERACAO',          'value' => $p['p_operacao']),
            array('name' => ':P_ID_TIPO',           'value' => $p['p_id_tipo']),
            array('name' => ':P_ID_OPCAO',          'value' => $p['p_id_opcao']),
            array('name' => ':P_SEG_DESC',          'value' => $p['p_seg_desc']),
            array('name' => ':P_TER_DESC',          'value' => $p['p_ter_desc']),
            array('name' => ':P_QUA_DESC',          'value' => $p['p_qua_desc']),
            array('name' => ':P_QUI_DESC',          'value' => $p['p_qui_desc']),
            array('name' => ':P_SEX_DESC',          'value' => $p['p_sex_desc']),
            array('name' => ':P_DT_INI_VALIDADE',   'value' => $p['p_dt_ini_validade']),
            array('name' => ':P_DT_FIM_VALIDADE',   'value' => $p['p_dt_fim_validade']),
            array('name' => ':P_CURSOR',            'value' => $cursor, 'type' => OCI_B_CURSOR)
        );
        
        $query = $this->db->procedure('RM','SP_CARDAPIO', $dados);
        return $query;   

        /*$data = array(
            'SEG_DESC' => $p['p_seg_desc'],
            'TER_DESC' => $p['p_ter_desc'],
            'QUA_DESC' => $p['p_qua_desc'],
            'QUI_DESC' => $p['p_qui_desc'],
            'SEX_DESC' => $p['p_sex_desc']
        );
       
        var_dump($data);
    
        exit;

        //$this->db->set($params);
        $this->db->where("ID_CARDAPIO", 1);
        $this->db->update("RM.ZMDCARDAPIO_SEMANA", $data);

        if($this->db->trans_status() === true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }*/
    }



  
} 

?>