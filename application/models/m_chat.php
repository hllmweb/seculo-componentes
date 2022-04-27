<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_chat extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function acesso($p){
        $this->db->select("USU_LOGIN, NOME");
        $this->db->from("BD_APLICACAO.LOGIN_APP");
        $this->db->where('USU_LOGIN', $p['p_codusuario']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function lst_departamento(){
        /*$this->db->select("USU_LOGIN, NOME");
        $this->db->from("BD_APLICACAO.LOGIN_APP");
        $this->db->where('NVL(FLG_GERENCIAL,0)', 1);
        $this->db->order_by("NOME ASC");
        $query = $this->db->get();*/

	$query = $this->db->query("select USU_LOGIN, NOME from BD_APLICACAO.LOGIN_APP where NVL(FLG_GERENCIAL,0) =1 order by NOME ASC");
        return $query->result_array();
    }

    //inserir conversa 
    public function add_conversa($p){
        $data = array(
            'USU_LOGIN'         => $p['p_usu_login'],
            'USU_LOGIN_DESTINO' => $p['p_usu_login_destino'],
            'MENSAGEM'          => $p['p_mensagem']
        );

        $this->db->insert("BD_APLICACAO.CHAT", $data);
        $this->db->close();
    }

    //atualiza conversa p/ lida, inserindo a data/hora
    public function up_conversa($p){
        $this->db->query("UPDATE BD_APLICACAO.CHAT SET DATAHORA_LIDA = SYSDATE WHERE DATAHORA_LIDA IS NULL and   USU_LOGIN = '".$p['p_usu_login']."' and USU_LOGIN_DESTINO = '".$p['p_usu_login_destino']."'");
    }

    //lista conversa não lidas
    public function lst_conversa_nao_lida($p){
        $query = $this->db->query("SELECT COUNT(*) AS QUANTIDADE FROM BD_APLICACAO.LOGIN_APP L 
            JOIN BD_APLICACAO.CHAT C ON C.USU_LOGIN = L.USU_LOGIN 
            WHERE ((C.USU_LOGIN_DESTINO = '".$p['p_usu_login']."' AND C.USU_LOGIN = '".$p['p_usu_login_destino']."') OR (C.USU_LOGIN_DESTINO = '".$p['p_usu_login_destino']."' AND C.USU_LOGIN = '".$p['p_usu_login']."')) AND C.DATAHORA_LIDA IS NULL");
        return $query->result_array();
    }

    //mensagens
    public function lst_converva_id($p){
        $query = $this->db->query("SELECT TO_CHAR(C.DATAHORA,'DD/MM/YYYY HH24:MI:SS') AS DATAHORA, C.USU_LOGIN, C.USU_LOGIN_DESTINO, L.NOME, C.MENSAGEM, C.DATAHORA_LIDA FROM BD_APLICACAO.LOGIN_APP L
        INNER JOIN BD_APLICACAO.CHAT C ON C.USU_LOGIN = L.USU_LOGIN AND C.FLG_DELETADO IS NULL
        WHERE ((C.USU_LOGIN = '".$p['p_usu_login']."' AND C.USU_LOGIN_DESTINO = '".$p['p_usu_login_destino']."') OR
              (C.USU_LOGIN_DESTINO = '".$p['p_usu_login']."' AND C.USU_LOGIN = '".$p['p_usu_login_destino']."'))
        ORDER BY C.DATAHORA ASC");

        /*$this->db->select("C.DATAHORA, C.USU_LOGIN, C.USU_LOGIN_DESTINO, L.NOME, C.MENSAGEM, C.DATAHORA_LIDA");
        $this->db->from("BD_APLICACAO.LOGIN_APP L");
        $this->db->join("BD_APLICACAO.CHAT C",      "C.USU_LOGIN = L.USU_LOGIN AND C.FLG_DELETADO IS NULL");
        $this->db->where("C.USU_LOGIN",             $p['p_usu_login']);
        $this->db->where("C.USU_LOGIN_DESTINO",     $p['p_usu_login_destino']);
        $this->db->or_where("C.USU_LOGIN_DESTINO",  $p['p_usu_login']);
        $this->db->where("C.USU_LOGIN",             $p['p_usu_login_destino']);
        $this->db->order_by("C.DATAHORA ASC");
        $query = $this->db->get();*/
        return $query->result_array();
    }

    //nomes
    public function lst_converva_distinct($p){
        /*$this->db->distinct();
        $this->db->select("L.USU_LOGIN, C.NOME, COUNT(L.USU_LOGIN) AS QUANTIDADE");
        $this->db->from("BD_APLICACAO.CHAT L");
        $this->db->join("BD_APLICACAO.LOGIN_APP C", "C.USU_LOGIN = L.USU_LOGIN");
        //$this->db->where("TRUNC(L.DATAHORA)", "TRUNC(SYSDATE)");
        $this->db->where("L.DATAHORA_LIDA IS NOT NULL");
        $this->db->where("L.USU_LOGIN_DESTINO",    $p['p_usu_login_destino']);
        $this->db->group_by("L.USU_LOGIN, C.NOME");
        $query = $this->db->get();*/
        $query = $this->db->query("
                    SELECT DISTINCT L.USU_LOGIN, L.NOME,
                    (
                        SELECT COUNT(*) FROM BD_APLICACAO.CHAT WHERE
                        USU_LOGIN = L.USU_LOGIN AND 
                        USU_LOGIN_DESTINO = '".$p['p_usu_login_destino']."' 
                        AND DATAHORA_LIDA IS NULL
                    ) AS QUANTIDADE
                    FROM BD_APLICACAO.LOGIN_APP L 
                    JOIN BD_APLICACAO.CHAT C ON C.USU_LOGIN = L.USU_LOGIN
                    WHERE C.USU_LOGIN_DESTINO = '".$p['p_usu_login_destino']."'");
        return $query->result_array();
    }

    public function del_conversa_id($p){
        /*$this->db->where("TO_CHAR(DATAHORA,'DD/MM/YYYY HH24:MI:SS')", $p['p_data_hora']);
        $this->db->where("USU_LOGIN", $p['p_usu']);
        $this->db->where("USU_LOGIN_DESTINO", $p['p_usu_destino']);
        $this->db->delete("BD_APLICACAO.CHAT");*/
        $query = $this->db->query("UPDATE BD_APLICACAO.CHAT SET FLG_DELETADO = 1 where TO_CHAR(DATAHORA,'DD/MM/YYYY HH24:MI:SS') = '".$p['p_data_hora']."' AND USU_LOGIN = '".$p['p_usu']."' AND USU_LOGIN_DESTINO = '".$p['p_usu_destino']."'");
    return $query;
    }

}

?>