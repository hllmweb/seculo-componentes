<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Listar_check extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
        $this->load->library(array('session'));
    }
    
    function index(){ 

        $lst_funcionarios = $this->refeicao->lst_check_funcionarios();

        $data = array(
            'titulo_header_1'   => 'Lista de Funcionários - Refeição',
            'nome'              => 'IOLANDA RODRIGUES DE CASTRO',
            'lista_funcionario' => $lst_funcionarios
        );

        $this->load->view('refeicao/listar_check', $data);
    }


    function lst_filtro(){
        $p_turma    = $this->input->get_post("p_turma");

        $param = array(
            'p_turma'   => $p_turma
        );

        $select = $this->refeicao->lst_filtro($param);

        $data = array(
            'listar'    => $select
        );

        $this->load->view('refeicao/listar_check_filtro', $data);
    }

    function lst_tipo_usuario(){
        $p_tipo_usuario = $this->input->get_post("p_tipo_usuario");
        
       
        if($p_tipo_usuario == 'F'){
            $parametro = "IN('F','P')";
        }elseif($p_tipo_usuario == 'A'){
            $parametro = "IN('A')";
        }else{
            $parametro = "IN('F','P','A')";
        }


        $param = array(
            'p_tipo_usuario' => $parametro
        );
    
        $select_tipo_usuario = $this->refeicao->lst_tipo_usuario($param);
          
        $data = array(
            'listar' => $select_tipo_usuario
        );

        $this->load->view('refeicao/listar_check_filtro', $data);
    }

    function form_check(){
        $p_codigo   = $this->input->get_post("p_codigo");
        $p_data     = $this->input->get_post("p_data");
        $p_opcao    = $this->input->get_post("p_opcao");

        $param = array(
            'p_codigo' => $p_codigo,
            'p_data'   => $p_data
        );


        if($p_opcao == "S"){
            try{
                $insert = $this->refeicao->add_check_funcionario($param);
                echo "S";
            }catch(\Exception $e){
                die($e->getMessage());
            }
        }elseif($p_opcao == "N"){
            $delete = $this->refeicao->del_check_funcionario($param);
            echo "N";
        }

    }

    
   
}

?>