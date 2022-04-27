<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sms extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
      //  $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    
    function cobranca() {   
        echo 'Inicio';


        $login = 'seculomanaus'; 
        $token = 'c92a42e5aad6df103a8031da66248745'; 
        $numero = '5592993886869';
        $msg = urlencode("teste sms!");
         
        $send = file_get_contents("http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&login=$login&token=$token&numero=$numero&msg=$msg"); 

        echo $send;
        echo '';
        echo $msg;

        

        
        /*
        $param_1 = array(
            'p_operacao' => 1
        );

        //selecionando as notificações para ser enviadas
        $select_notificacao_enviar = $this->notificacao->sp_notificacao($param_1);
        
        //se existe alguma notificação o script SERÁ executado, caso contrario NÃO SERÁ executado!
        if(count($select_notificacao_enviar) > 0):
            foreach($select_notificacao_enviar as $info_notificacao):
                $mensagem = array(
                    'title'     => $info_notificacao['TITULO'],
                    'body'      => $info_notificacao['MENSAGEM'],
                    'vibrate'   => 1,
                    'sound'     => 1
                );

                $campos = array(
                    'to'            => '/topics/'.$info_notificacao['USU_LOGIN'],
                    'notification'  => $mensagem
                );

                
                var_dump($result);
                
                $param_2 = array(
                    'p_operacao'        => 2,
                    'p_usu_login'       => $info_notificacao['USU_LOGIN'],
                    'p_id_notificacao'  => $info_notificacao['ID_NOTIFICACAO']
                );

                //inserindo as notificações já enviadas
                $insert_notificacao_enviar = $this->notificacao->sp_notificacao($param_2);
                


            endforeach;
        else:
            echo "Não existe nenhuma notificação!";
        endif;
        */

    }


  
}
?>