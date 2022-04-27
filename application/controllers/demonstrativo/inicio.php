<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_demonstrativo','demonstrativo', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {     
        $ra = $this->input->get_post("ra");

        
        $param = array(
            'ra' => $ra
        );

        $demonstrativo = $this->demonstrativo->lst_demonstrativo($param);

        $data = array(
            'titulo_header'  => 'Demonstrativo',
            'listar'         => $demonstrativo,
            'ra'             => $ra
        );

        //$this->load->view('demonstrativo/index', $data);

        
        //lib que renderiza as informações em pdf
        include_once APPPATH . '/third_party/mpdf-php7/mpdf.php';
        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->SetHTMLHeader($this->load->view('demonstrativo/impressao/header', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                30, // margin top
                30, // margin bottom
                0, // margin header
                5); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('demonstrativo/impressao/corpo', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        $mpdf->SetHTMLFooter($this->load->view('demonstrativo/impressao/footer', $data, true));
        $mpdf->Output();

        //$this->load->view('demonstrativo/index', $data);*/
    }


    function filtro(){
        $codetapa = $this->input->get_post("codetapa");
        $p_ra = $this->input->get_post("p_ra");

        $param = array(
            'ra'       => $p_ra,
        );

        $demonstrativo = $this->demonstrativo->lst_demonstrativo($param);

        $data = array(
            'codetapa'       => $codetapa,
            'listar'         => $demonstrativo       
        );

        $this->load->view('demonstrativo/index-filtre', $data);


    }
  



}

?>