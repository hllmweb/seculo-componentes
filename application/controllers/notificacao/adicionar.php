<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adicionar extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
         $this->load->model('m_notificacao', 'notificacao', true);

        //libers
        $this->load->helper(array('url', 'directory', 'form'));
    }
    
    function index() {     
              
        $data = array(
            'titulo_header'  => 'Adicionar Notificação do Aplicativo'
        );
        
        $this->load->view('notificacao/adicionar', $data);
    }


    //adicionar notificacao
    function form_notificacao(){
        $titulo         = $this->input->get_post('titulo');
        $dt_notificar   = $this->input->get_post('dt_notificar');
        $hr_notificar   = $this->input->get_post('hr_notificar');
        $dropmenu_envio = $this->input->get_post('dropmenu_envio');
        $dropmenu_curso = $this->input->get_post('dropmenu_curso');
        $dropmenu_turma = $this->input->get_post('dropmenu_turma');
        $dropmenu_tipo  = $this->input->get_post('dropmenu_tipo');
        $msg            = $this->input->get_post('msg');
        $anexo          = (!empty($this->input->get_post('anexo'))) ? $this->input->get_post('anexo') : null;
        
        /** FAZER MODIFICAÇÂO NO TIPO DE USUARIO DA NOTIFICAÇAO, INSERIR APENAS UMA NOTIFICAÇÂO POR USUARIO
        **/

        //ambos (responsavel e aluno)
        /*if($dropmenu_tipo == 'T'):
            //adiciona notificação aluno
            $notificacao = $this->notificacao->add_notificacao(array(
                'p_titulo'          => $titulo,
                'p_dt_notificar'    => $dt_notificar,
                'p_hr_notificar'    => $hr_notificar,
                'p_curso'           => $dropmenu_curso,
                'p_turma'           => $dropmenu_turma,
                'p_envio'           => $dropmenu_envio,
                'p_id_pub_destino'  => 'A',
                'p_msg'             => $msg
            ));
            //adiciona notificação responsável
            $notificacao = $this->notificacao->add_notificacao(array(
                'p_titulo'          => $titulo,
                'p_dt_notificar'    => $dt_notificar,
                'p_hr_notificar'    => $hr_notificar,
                'p_curso'           => $dropmenu_curso,
                'p_turma'           => $dropmenu_turma,
                'p_envio'           => $dropmenu_envio,
                'p_id_pub_destino'  => 'R',
                'p_msg'             => $msg
            ));
        else:
            //adiciona notificação individual
            $notificacao = $this->notificacao->add_notificacao(array(
                'p_titulo'          => $titulo,
                'p_dt_notificar'    => $dt_notificar,
                'p_hr_notificar'    => $hr_notificar,
                'p_curso'           => $dropmenu_curso,
                'p_turma'           => $dropmenu_turma,
                'p_envio'           => $dropmenu_envio,
                'p_id_pub_destino'  => $dropmenu_tipo,
                'p_msg'             => $msg
            ));
        endif;*/

        $param_3 = array(
           'p_titulo'          => $titulo,
           'p_dt_notificar'    => $dt_notificar,
           'p_hr_notificar'    => $hr_notificar,
           'p_curso'           => $dropmenu_curso,
           'p_turma'           => $dropmenu_turma,
           'p_envio'           => 'S',
           'p_id_servico'      => $dropmenu_envio,
           'p_id_pub_destino'  => $dropmenu_tipo,
           'p_msg'             => $msg,
           'p_anexo'           => $anexo
        );

   

        //adiciona notificação
        $notificacao = $this->notificacao->add_notificacao($param_3);



        if(!$notificacao):
            echo true;
        else:
            echo false;
        endif;




        //lista notificação
        $arr_notificacao = $this->notificacao->getDate_notificacao();

        $dados_responsavel = $this->input->get_post('dados_responsavel');
        $dados_aluno       = $this->input->get_post('dados_aluno');


        //aluno
        $obj_dados_aluno = json_decode($dados_aluno);
        $arr_ra = array();
        foreach($obj_dados_aluno as $key_1 => $info_aluno):
            $arr_ra[] = $info_aluno->RA;

            foreach($arr_notificacao as $key_2 => $info_notificacao):
            
            $param_1 = array(
                'p_id_notificacao'          => $info_notificacao["ID_NOTIFICACAO"],
                'p_usu_login'               => $arr_ra[$key_1],
                'p_tipo_pessoa'             => 'A',
                'p_notifica_dependente'     => 'N'
            );

            //adicionar pessoa na notificacao ALUNO
            $pessoa_notificacao = $this->notificacao->add_notificacao_pessoa($param_1);
            endforeach;
        endforeach;


        //responsavel
        $obj_dados_responsavel =  json_decode($dados_responsavel);
        $arr_cpf = array();
        foreach($obj_dados_responsavel as $key_3 => $info_responsavel):
            $arr_cpf[] = $info_responsavel->CPF_RESPONSAVEL;
            
            foreach($arr_notificacao as $key_4 => $info_notificacao):
            $param_2 = array(
                'p_id_notificacao'          => $info_notificacao["ID_NOTIFICACAO"],
                'p_usu_login'               => $arr_cpf[$key_3],
                'p_tipo_pessoa'             => 'R',
                'p_notifica_dependente'     => 'N'
            );

            //adicionar pessoa na notificacao RESPONSAVEL
            $pessoa_notificacao = $this->notificacao->add_notificacao_pessoa($param_2);
            endforeach;

        endforeach;

        
    }


    function do_upload(){
        
        $file_name  = $this->input->get_post("file_name");
        $data_atual = date('Ymd H:i');
        

        $config['upload_path']      =   "./arquivos";
        $config['allowed_types']    =   "jpeg|jpg|png|pdf|docx|doc|mp4|avi|flv|wmv|mpeg|mp3";
        $config['encrypt_name']     =   false;
        $config['file_name']        =   $file_name;
        $config['remove_spaces']    =   false;

        $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
 

            $arquivo = $data['upload_data']['file_name']; 

            echo finfo_file().$arquivo;
            // var_dump($arquivo);
            //$result = $this->upload_model->save_upload($title,$image);
            //echo json_decode($result);
        }
    }


    // function do_upload(){
    //     $arquivo = $this->input->get_post('arquivo');
    //     echo $arquivo;


    //     $configuracao = array(
    //        'upload_path'   => './arquivos/',
    //        'allowed_types' => 'pdf',
    //        'max_size'      => '5000'
    //     );        

    //     $this->load->library('upload', $configuracao);
    //     $this->upload->initialize($configuracao);
    //     $this->upload->data('file_name'); 

    //     var_dump($this->upload->do_upload('arquivo'));

    //     // $this->load->library('upload');

    //     // $upload_data = $this->upload->data(); 
    //     // $file_name = $upload_data['file_name'];





    //     // $this->upload->initialize($configuracao);


        
    // }
  
}

?>