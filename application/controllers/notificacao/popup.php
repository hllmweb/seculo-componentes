<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Popup extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    //aluno
    function aluno(){
        $p_codcurso = $this->input->get_post('p_codcurso');
        $p_codturma = $this->input->get_post('p_codturma');

        $param_1 = array(
            'p_codcurso' => $p_codcurso,
            'p_codturma' => $p_codturma
        );

        $aluno = $this->notificacao->lst_aluno($param_1);

        $data = array(
            'aluno' => $aluno
        );


        $this->load->view('notificacao/popup/aluno', $data);
    }


    //responsavel
    function responsavel(){
        $p_codcurso = $this->input->get_post('p_codcurso');
        $p_codturma = $this->input->get_post('p_codturma');

        $param_1 = array(
            'p_codcurso' => $p_codcurso,
            'p_codturma' => $p_codturma
        );

        $responsavel = $this->notificacao->lst_responsavel($param_1);

        $data = array(
            'responsavel' => $responsavel
        );

        $this->load->view('notificacao/popup/responsavel', $data);
    }




}

?>