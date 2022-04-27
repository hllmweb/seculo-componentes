<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_desempenho','desempenho', true);
        $this->load->model('m_calendario','calendario', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $ra  = $this->input->get_post("ra");

        $param_1 = array(
            'p_ra' => $ra
        );

        $turma = $this->calendario->getCalendarioTurma($param_1);

        $param_2 = array(
            'p_ra' => $ra,
            'p_codturma' => $turma[0]['TURMA']
        );

        $desempenho         = $this->desempenho->lst_desempenho($param_2);
        $coeficiente_todos  = $this->desempenho->lst_coeficiente($param_1);
        
        $data = array(
            'titulo_header'        => 'Desempenho',
            'listar'               => $desempenho,
            'ra'                   => $ra,
            'coeficiente_todos'    => $coeficiente_todos
        );
        
        $this->load->view('desempenho/index', $data);
    }


    function search_desempenho($p){
        $ra        = $this->input->get_post("ra");
        $codetapa = $this->input->get_post("codetapa");

        $param_1 = array(
            'p_ra' => $ra
        );
        //lista turma
        $turma = $this->calendario->getCalendarioTurma($param_1);
        
        $param_2 = array(
            'p_ra' => $ra,
            'p_codturma' => $turma[0]['TURMA'],
            'p_codetapa' => $codetapa
        );

        $param_3 = array(
            'p_ra' => $ra,
            'p_codetapa' => $codetapa
        );



        //lista o desempenho do aluno
        $desempenho             = $this->desempenho->search_desempenho($param_2);
        $coeficiente_todos      = $this->desempenho->lst_coeficiente($param_1);
        $coeficiente_bimestre   = $this->desempenho->lst_coeficiente_bimestre($param_3);

        switch ($codetapa): 
            case '16':
                $txt_bimestre = '1º Bim';
                break;
            case '26':
                $txt_bimestre = '2º Bim';
                break;
            case '36':
                $txt_bimestre = '3º Bim';
                break;
            case '46':
                $txt_bimestre = '4º Bim';
                break;
            case '12':
                $txt_bimestre = 'Todas Etapas';
                break;
        endswitch;
        
        $data = array(
            'titulo_header'         => 'Desempenho',
            'listar'                => $desempenho,
            'ra'                    => $ra,
            'coeficiente_todos'       => $coeficiente_todos,
            'coeficiente_bimestre'  => $coeficiente_bimestre,
            'bimestre'              => $txt_bimestre,
            'codetapa_bimestre'     => $codetapa     
        );
    
        $this->load->view('desempenho/search_desempenho', $data);
    }
  
}

?>