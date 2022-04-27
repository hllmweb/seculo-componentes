<?php
//
/*if (!defined('BASEPATH'))
    exit('No direct script access allowed');*/

class Imprimir extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_cardapio','cardapio', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    

    //carregando para versão no pc
    function pc(){
        $cardapio = $this->cardapio->lista_cardapio();

        $data = array(
            'listar' => $cardapio
        );

	/*print_r($data);

	echo '-----';
	echo APPPATH;
	echo $_SERVER['DOCUMENT_ROOT'];*/
	

        //lib que renderiza as informações em pdf
        include_once APPPATH.'/third_party/mpdf-php7/mpdf.php';

        $mpdf = new mPDF('', 'A4', 10, 'Calibri');
        $mpdf->list_indent_first_level = 0;
        $mpdf->max_colH_correction = 1.1;
        $mpdf->SetHTMLHeader($this->load->view('cardapio/impressao/header', $data, true));
        $mpdf->AddPage('L', // L - landscape, P - portrait
                'A4', '', '', '', 10, // margin_left
                10, // margin right
                30, // margin top
                30, // margin bottom
                0, // margin header
                5); // margin footer
        $mpdf->SetDisplayMode('fullpage');
        $corpo = $this->load->view('cardapio/impressao/corpo', $data, TRUE);
        $mpdf->WriteHTML($corpo);
        
        $mpdf->SetHTMLFooter($this->load->view('cardapio/impressao/footer', $data, true));
        $mpdf->Output();
    }

    //carregando para versão no celular
    function mobile(){
        $cardapio = $this->cardapio->lista_cardapio();

        $data = array(
            'titulo_header' => 'Listar do Cardápio',
            'listar'        => $cardapio
        );

        $this->load->view('cardapio/mobile.php', $data);
    }


    function pdf_exibir(){
	echo '<img src="https://seculomanaus.com.br/componentes/portal/assets/images/top_header_imprimir.jpg" />';
	exit;

	include_once APPPATH.'/third_party/mpdf-php7/mpdf.php';
	$mpdf = new mPDF();
	$mpdf->showImageErrors = true;
	#$mpdf->Image('https://seculomanaus.com.br/componentes/portal/assets/images/top_header_imprimir.jpg', 0, 0, 210, 297, 'jpg', '', true, false);
	$mpdf->WriteHTML('<h1>Teste!</h1>');
	$mpdf->Output();

    }
  
}

?>