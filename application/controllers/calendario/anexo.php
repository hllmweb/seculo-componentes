<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anexo extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_calendario','calendario', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function inicio() {     
        $ra = $this->input->get_post("ra");
        $data = $this->input->get_post("data");

        $param_1 = array(
            'p_ra' => $ra
        );

        //consultando a turma
        $turma = $this->calendario->getCalendarioTurma($param_1);


        $param_2 = array(
            'p_codturma' => $turma[0]['TURMA']
        );

        //consulta as informações da prova
        $prova = $this->calendario->getCalendarioProva($param_2);

        $data = array(
            'titulo_header'  => 'Calendário com as informações completa das provas',
            'ra'             => $ra,
            'turma'          => $turma,
            'listar'         => $prova,
            'data'           => $data
            //'listar'         => $cardapio
        );

        //lib que renderiza as informações em pdf
        include_once APPPATH . '/third_party/mpdf/mpdf.php';
        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->SetHTMLHeader($this->load->view('calendario/anexo/impressao/header', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                50, // margin top
                50, // margin bottom
                0, // margin header
                5); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('calendario/anexo/impressao/corpo', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        $mpdf->SetHTMLFooter($this->load->view('calendario/anexo/impressao/footer', $data, true));
        $mpdf->Output();

    
        //$this->load->view('calendario/anexo', $data);
    }

  
}

?>