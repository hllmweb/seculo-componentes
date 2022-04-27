<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Enviar extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->library(array('phpmail')); 
        $this->load->helper(array('url','directory'));
    }
    
    function push_notification() {     
        /*
            Para esse método ser executado de forma automática,
            Foi programado no crontab a seguinte tarefa:              
            
            Execute primeiro 
            # crontab -e em modo root 
        */
        //Tarefa no crontab: ->     */1 * * * * curl https://seculomanaus.com.br/componentes/portal/notificacao/enviar/push_notification 


        //chave de acesso ao firebase
        define('API_ACCESS_KEY', 'AAAAzQlwDfg:APA91bGeWZ3heomJIn7_on6Ay7rt0iRvx1beSdI9YZzY6O5cGFK2TXmhF0k7Yg_c31FafnY7mcBE19n0x8KYBRlzdz3kFl-QCcqb1YWCu-QJkKvcrCk2kEhFW76yBA-CdTV5M3nVv5n-');

        $param_1 = array(
            'p_operacao' => 1
        );

        //selecionando as notificações para ser enviadas
        $select_notificacao_enviar = $this->notificacao->sp_notificacao($param_1);
       
        //se existe alguma notificação o script SERÁ executado, caso contrario NÃO SERÁ executado!
        if(count($select_notificacao_enviar) > 0):
            //corrigir
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
                print_r($result);


                $param_2 = array(
                    'p_operacao'        => 2,
                    'p_usu_login'       => $info_notificacao['USU_LOGIN'],
                    'p_id_notificacao'  => $info_notificacao['ID_NOTIFICACAO']
                );

                //inserindo as notificações já enviadas
                $insert_notificacao_enviar = $this->notificacao->sp_notificacao($param_2);

                /*if($insert_notificacao_enviar){
                    sleep("10000"); 
                }*/
                

            endforeach;
        else:
            echo "Não existe nenhuma notificação!";
        endif;

    }

    function sms(){
        /*
            Para esse método ser executado de forma automática,
            Foi programado no crontab a seguinte tarefa:     

            Método para envio de sms
            Execute primeiro 
            # crontab -e em modo root 
        */
        //Tarefa no crontab: ->     */2 * * * * curl https://seculomanaus.com.br/componentes/portal/notificacao/enviar/sms


        //consultar o responsável com a coluna onde possuí o número do celular
        $login  = 'seculomanaus'; 
        $token  = 'c92a42e5aad6df103a8031da66248745'; 
        
        $param_1 = array(
            'p_operacao' => 4
        );

        //selecionando os inadiplentes para enviar os sms
        $select_sms_enviar = $this->notificacao->sp_notificacao($param_1);
    
        if(count($select_sms_enviar) > 0 ):
            $numero = "";
            foreach($select_sms_enviar as $info_sms):
                $numero .= intval("55{$info_sms['CELULAR']}").", ";

                $num     = $info_sms['CELULAR'];
                $msg     = urlencode($info_sms['MENSAGEM']);

                /*$num    = intval("55{$info_sms['CELULAR']}");
                $msg    = "{$info_sms['MENSAGEM']}";
                $send   = "http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&login=$login&token=$token&numero=$num&msg=$msg";
                */
                
                $param_2 = array(
                    'p_operacao'        => 2,
                    'p_usu_login'       => $info_sms['USU_LOGIN'],
                    'p_id_notificacao'  => $info_sms['ID_NOTIFICACAO']
                );

                //inserindo as notificações já enviadas
                $insert_notificacao_enviar = $this->notificacao->sp_notificacao($param_2);
                
                
                $send = file_get_contents("http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&login=$login&token=$token&numero=$num&msg=$msg"); 
                if($send->status == "success"){
                    sleep("10000"); //ms
                }
                
                var_dump($send);

                // echo "<pre>";
                // print_r("http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&login=$login&token=$token&numero=$num&msg=$msg");
            endforeach;
            $numero = rtrim($numero, ", ");

            echo "SMS Enviado";
        else:
            echo "Não existe nenhum sms!";
        endif;

        /*$numero = '5592993886869';
        $msg    = urlencode("teste sms!");
         
        $send = file_get_contents("http://sms.kingtelecom.com.br/kingsms/api.php?acao=sendsms&login=$login&token=$token&numero=$numero&msg=$msg"); 

        echo $send;
        echo $msg;*/

    }


    public function email(){
        header('Access-Control-Allow-Origin: *');

        //$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        $data = date('Y-m-d');
        $diasemana_numero = date('w', strtotime($data));

        


        if($diasemana_numero != 0 && $diasemana_numero != 6 && $diasemana_numero != 1):

            $param_1 = array(
                'p_tipo'        => 'CNP',
                'p_dt_inicio'   => null,
                'p_dt_fim'      => null
            );

            /*$param_2 = array(
                'p_tipo'        => 'TNE',
                'p_dt_inicio'   =>  null,
                'p_dt_fim'      =>  null
            );

            $param_3 = array(
                'p_tipo'        => 'MP',
                'p_dt_inicio'   => null,
                'p_dt_fim'      => null
            );*/

            $cnp = $this->notificacao->sp_email($param_1);
            //$tne = $this->notificacao->sp_email($param_2);
            //$mp  = $this->notificacao->sp_email($param_3);

            $mail = $this->phpmail->load();


            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'seculoinforma@seculomanaus.com.br';
            $mail->Password = '!$EC#UL0$&';
            $mail->SMTPSecure = 'tls'; //tls //ssl
            $mail->Port = 587; //587    //465
            $mail->Subject = 'NOTIFICAÇÃO AUTOMÁTICA - '.date('d/m/Y H:i:s');

            $mail->setFrom('seculoinforma@seculomanaus.com.br', 'NOTIFICAÇÃO AUTOMÁTICA - '.date('d/m/Y H:i:s'));
            $mail->addAddress('seculoinforma@seculomanaus.com.br', 'NOTIFICAÇÃO AUTOMÁTICA - '.date('d/m/Y H:i:s'));
            //$mail->addReplyTo('seculoinforma@seculomanaus.com.br', 'NOTIFICAÇÃO AUTOMÁTICA - '.date('d/m/Y H:i:s'));
           
            // $mail->addCC('rh2@seculomanaus.com.br');
            // $mail->addCC('rh3@seculomanaus.com.br');

            $mail->addCC('coordenacao.infantil@seculomanaus.com.br');
            $mail->addCC('coordenacao.eventos@seculomanaus.com.br');
            $mail->addCC('coordenacao.fund2medio@seculomanaus.com.br');
            $mail->AddBCC('coordenacao.fund1@seculomanaus.com.br');
            

            $mail->addCC('diretor.ensino@seculomanaus.com.br');
            $mail->AddBCC('hugo.mesquita@seculomanaus.com.br');

         
            //$mail->SMTPDebug = 1;
            
            //MONITOR DE CONTEÚDO NÃO PREENCHIDO
           $mailContent = "
            <h2 style='font-size:22px; color:#000; text-align:center;'>".$cnp[0]['PERIODO']." - RELATÓRIO DE CONTEÚDO NÃO PREENCHIDO<br><br>
            </h2>";
            /*
                <a href='https://seculomanaus.com.br/componentes/portal/anexo/pdf/imprimir_cnp' target='_blank' style='background-color:#1B2D40; display:inlineblock; width:400px; padding:10px; text-decoration:none; color:#FFCB31; text-align:center; border-radius:50px; font-weight:bold; margin:auto;'>CLIQUE AQUI PARA BAIXAR O PDF</a>
            */

            $mailContent .= "<br>";
            $mailContent .= "
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                <table style='border-collapse: collapse; width:100%;'>";
            $mailContent .= "
                <tr style='text-align:center; background-color:#a09f9f; font-size:18px; font-weight:bold; padding:20px; text-transform:uppercase;'>
                    <td style='border:1px solid #CCC;'>Disciplina</td>
                    <td style='border:1px solid #CCC;'>Curso</td>
                    <td style='border:1px solid #CCC;'>Turma</td>
                    <td style='border:1px solid #CCC;'>Data</td>
                    <td style='border:1px solid #CCC;'>Quantidade</td>
                </tr>";


            $nome = "";
            foreach($cnp as $row):
                if($row['NOME'] != $nome):
                    $mailContent .= " 
                        <tr>
                            <td colspan='5' style='border:1px solid #CCC; text-align:center; font-weight:bold; background-color:#CCC; color:#000; text-align:center; text-transform:uppercase;'>Nome do Professor
                            </td>
                        </tr>
                        <tr>
                            <td colspan='5' style='border:1px solid #CCC; background-color:#CCC; color:#000; text-align:center;'>".$row['NOME']."</td>
                        </tr>";
                endif;
                    //$DataEspecifica = new DateTime($row['DATAAULA']); $DataEspecifica->format('d/m/Y')
                    $mailContent .= "
                        <tr style='text-align:center; font-weight:bold;'>
                            <td style='border:1px solid #CCC;'>".$row['DISCIPLINA']."</td>
                            <td style='border:1px solid #CCC;'>".$row['CURSO']."</td>
                            <td style='border:1px solid #CCC;'>".$row['CODTURMA']."</td>
                            <td style='border:1px solid #CCC;'>".$row['DATAAULA']."</td>
                            <td style='border:1px solid #CCC;'>".$row['QUANTIDADE']."</td>
                        </tr>";
                $nome = $row['NOME'];
            endforeach;
                    $mailContent .= "</table>";


        //MONITOR DE TEMPO ENCERRADO
        /*$mailContent .= "<br>";
        $mailContent .= "<h2 style='font-size:22px; color:#000; text-align:center;'>".$tne[0]['PERIODO']." - TEMPO NÃO ENCERRADO<br><br>
                         <a href='https://seculomanaus.com.br/componentes/portal/anexo/pdf/imprimir_tne' target='_blank' style='background-color:#1B2D40; display:inlineblock; width:400px; padding:10px; text-decoration:none; color:#FFCB31; text-align:center; border-radius:50px; font-weight:bold; margin:auto;'>CLIQUE AQUI PARA BAIXAR O PDF</a>

        </h2>";
        $mailContent .= "<br><br>";

        $mailContent .= "
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <table style='border-collapse: collapse; width:100%;'>";



        $mailContent .= "
            <tr style='text-align:center; background-color:#a09f9f; font-size:18px; font-weight:bold; padding:20px; text-transform:uppercase;'>
                <td style='border:1px solid #CCC;'>Disciplina</td>
                <td style='border:1px solid #CCC;'>Curso</td>
                <td style='border:1px solid #CCC;'>Turma</td>
                <td style='border:1px solid #CCC;'>Data Email</td>
                <td style='border:1px solid #CCC;'>Quantidade</td>
            </tr>";


        $professor = "";
        foreach($tne as $row2):
            if($row2['NOME'] != $professor):
                $mailContent .= " 
                    <tr>
                    <td colspan='5' style='border:1px solid #CCC; text-align:center; font-weight:bold; background-color:#CCC; color:#000; text-align:center; text-transform:uppercase;'>Nome do Professor</td>
                    </tr>
                    <tr>
                        <td colspan='5' style='border:1px solid #CCC; background-color:#CCC; color:#000; text-align:center;'>".$row2['NOME']."</td>
                        </tr>";
            endif;
                $DataEspecifica = new DateTime($row2['DATAAULA']);
                $mailContent .= "
                    <tr style='text-align:center; font-weight:bold;'>
                        <td style='border:1px solid #CCC;'>".$row2['DISCIPLINA']."</td>
                        <td style='border:1px solid #CCC;'>".$row2['CURSO']."</td>
                        <td style='border:1px solid #CCC;'>".$row2['CODTURMA']."</td>
                        <td style='border:1px solid #CCC;'>".$DataEspecifica->format('d/m/Y')."</td>
                        <td style='border:1px solid #CCC;'>".$row2['QTD_TEMPOS']."</td>
                    </tr>";
            $professor = $row2['NOME'];
        endforeach;
                $mailContent .= "</table>";*/


        //MONITOR DE PROVAS NÃO LANÇADAS
        /*$mailContent .= "<br>";
        $mailContent .= "<h2 style='font-size:22px; color:#000; text-align:center;'>LISTA DE DISCIPLINAS - DATA DE PROVA NÃO PREENCHIDA<br><br>
                         <a href='https://seculomanaus.com.br/componentes/portal/anexo/pdf/imprimir_mp' target='_blank' style='background-color:#1B2D40; display:inlineblock; width:400px; padding:10px; text-decoration:none; color:#FFCB31; text-align:center; border-radius:50px; font-weight:bold; margin:auto;'>CLIQUE AQUI PARA BAIXAR O PDF</a>
        </h2>";
        $mailContent .= "<br><br>";
        $mailContent .= "
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <table style='border-collapse: collapse; width:100%;'>";
        $mailContent .= "
            <tr style='text-align:center; background-color:#a09f9f; font-size:18px; font-weight:bold; padding:20px; text-transform:uppercase;'>
                <td style='border:1px solid #CCC;'>TURMA</td>
                <td style='border:1px solid #CCC;'>TIPO NOTA</td>
            </tr>";
        $coddisc = "";
        foreach($mp as $row):
            if($row['CODDISC'] != $coddisc):
                $mailContent .= " 
                    <tr>
                        <td colspan='2' style='border:1px solid #CCC; background-color:#CCC; color:#000; text-align:center;'>".$row['CURSO']." - <strong>".$row['DISCIPLINA']."</strong></td>
                    </tr>";
            endif;
                $mailContent .= "
                    <tr style='text-align:center; font-weight:bold;'>
                        <td style='border:1px solid #CCC;'>".$row['CODTURMA']."</td>
                        <td style='border:1px solid #CCC;'>".$row['TIPO_NOTA']."</td>
                    </tr>";

            $coddisc = $row['CODDISC'];
        endforeach;
                $mailContent .= "</table>";*/



                // $mailContent .= "<p style='text-align:center; text-transform:uppercase; font-size:18px; font-weight:bold; color:#cc0000; margin:10px 0;'>Você também pode acompanhar no RM CUBOS</p>";

                // $mail->addBCC('bcc@example.com');


                $mail->Body = $mailContent;

                $mail->isHTML(true);
                $mail->CharSet = 'utf-8'; 

            if(!$mail->send()){
                echo 'erro ao enviar email.';
                echo 'error: ' . $mail->ErrorInfo;   
            }else{
                echo 'email enviado.';
            }

        endif;
    }
  


    function enviar_app(){
        $origem     = $this->input->get_post("origem");
        $destino    = $this->input->get_post("destino");
        $mensagem   = $this->input->get_post("mensagem");

            switch ($destino) {
                case '00000000001':
                    $opcao = 'SECRETÁRIA';
                    break;
                case '00000000002':
                    $opcao = 'FINANCEIRO';
                    break; 
                case '00000000003':
                    $opcao = 'OUVIDORIA';
                    break;
            }


            $param = array(
                'p_cpf_responsavel' => $origem
            );

            $lista_usuario = $this->notificacao->lst_aluno_mail($param);



            $data = date('Y-m-d');
            $diasemana_numero = date('w', strtotime($data));

            $mail = $this->phpmail->load();

            // $mail->isMail();
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'seculoinforma@seculomanaus.com.br';
            $mail->Password = 'k23b87a0';
            $mail->SMTPSecure = 'tls'; //tls //ssl
            $mail->Port = 587; //587    //465

            $mail->setFrom($lista_usuario[0]['RESP_EMAIL'], $opcao.' APP CHAT - '.date('d/m/Y H:i:s'));
            //$mail->addAddress($lista_usuario[0]['ALU_EMAIL'], 'NOTIFICAÇÃO APP CHAT - '.date('d/m/Y H:i:s'));
            //$mail->addReplyTo('seculoinforma@seculomanaus.com.br', 'NOTIFICAÇÃO APP CHAT - '.date('d/m/Y H:i:s'));
           
            // $mail->addCC('rh2@seculomanaus.com.br');
            // $mail->addCC('rh3@seculomanaus.com.br');
            // $mail->addCC('coordenacao.fund2medio@seculomanaus.com.br');
            // $mail->addCC('coordenacao.fund1@seculomanaus.com.br');
            
            $mail->AddBCC('hugo.mesquita@seculomanaus.com.br');
            $mail->AddBCC('areosa.daniell@gmail.com');

            // $mail->addBCC('bcc@example.com');
            $mail->Subject = 'NOTIFICAÇÃO APP CHAT - '.date('d/m/Y H:i:s');

            $mail->isHTML(true);
            $mail->CharSet = 'utf-8'; 
            $mail->SMTPDebug = 1;


            $mailContent = "<table style='border-collapse: collapse; width:100%; padding:20px;'>
                                <tr style='border:1px solid #ddd;'>
                                    <td><strong>Nome do Responsável</strong></td>
                                    <td>".$lista_usuario[0]['NM_RESPONSAVEL']."</td>
                                </tr>
                                <tr style='border:1px solid #ddd;'>
                                    <td><strong>E-Mail do Responsável</strong></td>
                                    <td>".$lista_usuario[0]['RESP_EMAIL']."</td>
                                </tr>
                               <tr style='border:1px solid #ddd;'>
                                    <td><strong>Cel do Responsável</strong></td>
                                    <td>".$lista_usuario[0]['CEL_RESPONSAVEL']."</td>
                                </tr>

                            </table>";


            $mailContent .= "<table style='border-collapse: collapse; width:100%; margin-top:20px; padding:20px;'>
                                <tr>
                                    <td><strong>Mensagem</strong></td>
                                </tr>
                                <tr>
                                    <td>".$mensagem."</td>
                                </tr>
                            </table>"; 
            $mail->Body .= $mailContent;

            if(!$mail->send()){
                echo 'erro ao enviar email.';
                echo 'error: ' . $mail->ErrorInfo;
            }else{
                echo 'email enviado.';
            }


    


    }



     function push_notification_teste() {     
        /*
            Para esse método ser executado de forma automática,
            Foi programado no crontab a seguinte tarefa:              
            
            Execute primeiro 
            # crontab -e em modo root 
        */
        //Tarefa no crontab: ->     */1 * * * * curl https://seculomanaus.com.br/componentes/portal/notificacao/enviar/push_notification 

        //chave de acesso ao firebase

        define('API_ACCESS_KEY', 'AAAAzQlwDfg:APA91bGeWZ3heomJIn7_on6Ay7rt0iRvx1beSdI9YZzY6O5cGFK2TXmhF0k7Yg_c31FafnY7mcBE19n0x8KYBRlzdz3kFl-QCcqb1YWCu-QJkKvcrCk2kEhFW76yBA-CdTV5M3nVv5n-');

/*        $param_1 = array(
            'p_operacao' => 1
        );

        //selecionando as notificações para ser enviadas
        $select_notificacao_enviar = $this->notificacao->sp_notificacao($param_1);
  */     
        //se existe alguma notificação o script SERÁ executado, caso contrario NÃO SERÁ executado!
       
                $mensagem = array(
                    'title'     => 'Titulo notificação',
                    'body'      => 'Conteúdo notificação',
                    'vibrate'   => 1,
                    'sound'     => 1
                );

                $campos = array(
                    'to'            => '/topics/50855840234',
                    'notification'  => $mensagem
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
                print_r($result);


                /*$param_2 = array(
                    'p_operacao'        => 2,
                    'p_usu_login'       => $info_notificacao['USU_LOGIN'],
                    'p_id_notificacao'  => $info_notificacao['ID_NOTIFICACAO']
                );

                //inserindo as notificações já enviadas
                $insert_notificacao_enviar = $this->notificacao->sp_notificacao($param_2);*/
   

    }


}
?>