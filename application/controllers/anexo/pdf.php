<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pdf extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    

    function imprimir_cnp(){
        $param_1 = array(
            'p_tipo'        => 'CNP',
            'p_dt_inicio'   => null,
            'p_dt_fim'      => null
        );

        $cnp = $this->notificacao->sp_email($param_1);

        $data = array(
            'listar'     => $cnp,
            'titulo'     => 'RELATÓRIO DE CONTEÚDO NÃO PREENCHIDO'
        );

        //lib que renderiza as informações em pdf
        include_once APPPATH . '/third_party/mpdf/mpdf.php';
        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->list_auto_mode = 'browser';

        $mpdf->SetHTMLHeader($this->load->view('notificacao/pdf/header', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                40, // margin top
                10, // margin bottom
                0, // margin header
                0); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('notificacao/pdf/corpo', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        // $mpdf->SetHTMLFooter($this->load->view('notificacao/pdf/footer', $data, true));
        $mpdf->Output();
    }


   function imprimir_tne(){
        $param_1 = array(
            'p_tipo'        => 'TNE',
            'p_dt_inicio'   => null,
            'p_dt_fim'      => null
        );

        $tne = $this->notificacao->sp_email($param_1);

        $data = array(
            'listar' => $tne,
            'titulo' => 'TEMPO NÃO ENCERRADO'
        );

        //lib que renderiza as informações em pdf
        include_once APPPATH . '/third_party/mpdf/mpdf.php';
        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->list_auto_mode = 'browser';
        
        $mpdf->SetHTMLHeader($this->load->view('notificacao/pdf/header', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                40, // margin top
                10, // margin bottom
                0, // margin header
                0); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('notificacao/pdf/corpo', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        // $mpdf->SetHTMLFooter($this->load->view('notificacao/pdf/footer', $data, true));
        $mpdf->Output();
    }


    function imprimir_mp(){
        $param_1 = array(
            'p_tipo'        => 'MP',
            'p_dt_inicio'   => null,
            'p_dt_fim'      => null
        );

        $mp  = $this->notificacao->sp_email($param_1);
        $data = array(
            'listar'    => $mp,
            'titulo'    => 'LISTA DE DISCIPLINAS - DATA DE PROVA NÃO PREENCHIDA'
        );

        //lib que renderiza as informações em pdf
        include_once APPPATH . '/third_party/mpdf/mpdf.php';
        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->list_auto_mode = 'browser';
        
        $mpdf->SetHTMLHeader($this->load->view('notificacao/pdf/header_mp', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                40, // margin top
                10, // margin bottom
                0, // margin header
                0); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('notificacao/pdf/corpo_mp', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        // $mpdf->SetHTMLFooter($this->load->view('notificacao/pdf/footer', $data, true));
        $mpdf->Output();

    }


}

?>