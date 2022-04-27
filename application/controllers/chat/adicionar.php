<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adicionar extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_chat', 'chat', true);
    }


    public function index(){
        //chave de acesso ao firebase
        define('API_ACCESS_KEY', 'AAAAzQlwDfg:APA91bGeWZ3heomJIn7_on6Ay7rt0iRvx1beSdI9YZzY6O5cGFK2TXmhF0k7Yg_c31FafnY7mcBE19n0x8KYBRlzdz3kFl-QCcqb1YWCu-QJkKvcrCk2kEhFW76yBA-CdTV5M3nVv5n-');

        $p_codusuario           = $this->input->get_post("codusuario");
        $p_codusuario_destino   = $this->input->get_post("codusuario_destino");
        $p_mensagem             = $this->input->get_post("mensagem");     


        $param = array(
            'p_usu_login'              => $p_codusuario,
            'p_usu_login_destino'      => $p_codusuario_destino,
            'p_mensagem'               => $p_mensagem,
        );

        //var_dump($param);

        //inserindo conversa
        $insert = $this->chat->add_conversa($param);

        //iniciando o processo de enviar para o push notificaction
        
        switch ($param['p_usu_login']):
            case '00000000001':
                $titulo = 'SECRETARIA';
                break;
            case '00000000002':
                $titulo = 'FINANCEIRO';
                break;
        endswitch;

     

      


        $mensagem = array(
            'title'         => $titulo,
            'body'          => $p_mensagem,
            'vibrate'       => 1,
            'sound'         => 1
        );

        $campos = array(
            'to'                => '/topics/'.$p_codusuario_destino,
            'notification'      => $mensagem
            //'click_action'      => 'https://seculomanaus.com.br/componentes/portal/chat/inicio?codusuario='.$p_codusuario_destino
        );


        $headers = array(
            'Authorization: key='.API_ACCESS_KEY,
            'Content-Type: application/json'
        );


        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($campos));
        $result = curl_exec($ch);
        curl_close($ch);
        var_dump($result);

        // endif;

    }



}
?>