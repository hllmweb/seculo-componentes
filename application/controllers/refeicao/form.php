<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form extends CI_Controller {
    
     function __construct() {
        parent::__construct();
        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 
        $p_chapa      = $this->input->get_post("p_chapa");
        $p_idterminal = $_SERVER['REMOTE_ADDR'];
        $p_opcao      = $this->input->get_post("p_opcao");


        $param = array(
            'p_chapa'           => $p_chapa,
            'p_idterminal'      => $p_idterminal
        );

        var_dump($param);
       
        if($p_opcao == "S"){
            $delete = $this->refeicao->del_refeicao($param);
            echo "N";
        }elseif($p_opcao == "N"){
            $insert = $this->refeicao->add_refeicao($param);
            echo "S";
        }
    }
} 

?>