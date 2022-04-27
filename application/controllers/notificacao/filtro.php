<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Filtro extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    //lista de turmas
    function lst_turma(){
        $codcurso = $this->input->get_post('codcurso');

        $param = array(
            'p_codcurso' => $codcurso
        );

        $turma = $this->notificacao->lst_turma($param);

            echo "<option value='' selected='selected'>Todos</option>";
        foreach($turma as $dados):
            echo "<option value='".$dados['CODTURMA']."'>".$dados['CODTURMA']."</option>";
        endforeach;
    }


    //lista de alunos
    function lst_aluno(){
        $p_codturma = $this->input->get_post('p_codturma');
        $p_codcurso = $this->input->get_post('p_codcurso');

        $param = array(
            'p_codturma' => $p_codturma,
            'p_codcurso' => $p_codcurso
        );

        $aluno = $this->notificacao->lst_aluno($param);
        echo json_encode($aluno);
    }

    //lista de responsaveis
    function lst_responsavel(){
        $p_codturma = $this->input->get_post('p_codturma');
        $p_codcurso = $this->input->get_post('p_codcurso');

        $param = array(
            'p_codturma' => $p_codturma,
            'p_codcurso' => $p_codcurso
        );

        $aluno = $this->notificacao->lst_responsavel($param);
        echo json_encode($aluno);
    }

  
}
?>