<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Letivo extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_calendario','calendario', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function inicio() {     
        $ra = $this->input->get_post("ra");

        $param_1 = array(
            'p_ra' => $ra            
        );

        //consultando a turma
        $turma = $this->calendario->getCalendarioTurma($param_1);

        $param_2 = array(
            'p_codturma' => $turma[0]['TURMA']
        );

        //consulta as informações da prova
        $prova = $this->calendario->getCalendarioMesProva($param_2);

        $date_arr = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

        $data = array(
            'titulo_header'   => 'Calendário de Provas ',
            'data_calendario' => $date_arr[date('n')-1]." de ".date('Y'),
            'turma'           => $turma, 
            'listar'          => $prova
        );

        $this->load->view('calendario/letivo/index', $data);
                    
        //lib que renderiza as informações em pdf
        /*include_once APPPATH . '/third_party/mpdf/mpdf.php';
        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->SetHTMLHeader($this->load->view('calendario/letivo/impressao/header', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                30, // margin top
                30, // margin bottom
                0, // margin header
                5); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('calendario/letivo/impressao/corpo', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        $mpdf->SetHTMLFooter($this->load->view('calendario/letivo/impressao/footer', $data, true));
        $mpdf->Output();*/
        //$this->load->view('calendario/letivo', $data);
    }

  
}

?>