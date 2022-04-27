<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Diario extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_acompanhamento', 'acompanhamento', true);

        //libers
        $this->load->helper(array('form', 'url', 'html', 'directory', 'funcoes'));
        $this->load->library(array('form_validation', 'session')); 
    }
    
    //LISTA E INSERE
    function index() {     
        $turma      = $this->input->get_post('turma');
        $codusuario = $this->input->get_post('codusuario');

        $dt_acompanhamento = (empty($this->input->post('dt_acompanhamento'))) ? date('d/m/Y') : $this->input->post('dt_acompanhamento');

    
        /* 
            LISTAR ALUNOS DA TURMA
            VIEW PL/SQL
            (RM.VW_ALUNOS_MATRICULADOS)
            P_OPERACAO {
                0 = LISTA
            }
        */
        $alunos_turma = $this->acompanhamento->lista_turma_acompanhamento(array('codturma' => $turma));

        
        $parametro = array(
                'p_operacao'            =>  0,            
                'p_codturma'            =>  $turma,
                'p_cdUsuario'           =>  $codusuario,
                'p_dt_acompanhamento'   =>  $dt_acompanhamento
        );
       



        $turma_acompanhamento       = $this->acompanhamento->turma_acompanhamento(array(
            'p_operacao'            =>  4, 
            'p_dt_acompanhamento'   =>  $dt_acompanhamento,  
            'p_codturma'            =>  $turma));


       
        if(count($turma_acompanhamento) === 0):
            /*  
                INSERE ALUNOS DA TURMA NA TABELA 
                (RM.ZMDACOMPAULA); 
                
                PL/SQL
                (RM.SP_ACOMPANHAMENTO_INFANTIL);
                P_OPERACAO {
                    1 = INSERE
                }
            */

                foreach($alunos_turma as $dados_aluno):
                    $this->acompanhamento->turma_acompanhamento(array(
                        'p_operacao'            => 1, 
                        'p_codturma'            => $dados_aluno['CODTURMA'],
                        'p_ra'                  => $dados_aluno['RA'],
                        'p_dt_acompanhamento'   => $dt_acompanhamento    
                    ));
                endforeach;                

        endif;
        
        $listar =  $this->acompanhamento->turma_acompanhamento($parametro);

        $data = array(
           'titulo_header' => 'Acompanhamento Infantil',
           'listar'        => $listar,
           'codusuario'    => $codusuario,
           'turma'         => $turma,
           'dt_acompanhamento'   =>  $dt_acompanhamento
        );


        if(!empty($this->input->post("search"))):
            $this->load->view('acompanhamento/lista_diario', $data);
        else:
            $this->load->view('acompanhamento/diario', $data); 
        endif;      
    }


    //
    function enviar_notificacao(){
        $turma      = $this->input->get_post('turma');
    

        $params = array(
            'p_cod_turma' => $turma
        );
    
        $insere_notificacao = $this->acompanhamento->enviar_notificacao($params);
        if($insere_notificacao){
            echo "notificação enviada!";
        }
    }




    //ATUALIZA 
    function lancar(){
        $p_turma                = $this->input->post('p_turma');
        $p_dt_acompanhamento    = $this->input->post('p_dt_acompanhamento');
        $alunos_turma           = $this->acompanhamento->lista_turma_acompanhamento(array('codturma' => $p_turma));
        //$codusuario             = $this->input->get_post('codusuario');


        foreach($alunos_turma as $dados_aluno):
            $p_ra = $dados_aluno['RA'];
            /*
                ATUALIZAR INFORMAÇÕES DE ACOMPANHAMENTO DO ALUNO
                (RM.ZMDACOMPAULA);

                PL/SQL
                (RM.SP_ACOMPANHAMENTO_INFANTIL);
                P_OPERACAO {
                    2 = INSERE
                }
            */
            $parametro = array(
                'p_operacao'            => 2,
                //'p_codturma'            => $p_turma,
                //'p_ra'                  => $p_ra,
                'p_ra'                  => $this->input->post('p_ra_'.$p_ra),
                'p_dt_acompanhamento'   => $p_dt_acompanhamento,
                'p_colacao'             => $this->input->post('p_colacao_'.$p_ra),
                'p_almoco'              => $this->input->post('p_almoco_'.$p_ra),
                'p_lanche'              => $this->input->post('p_lanche_'.$p_ra),
                'p_sono'                => $this->input->post('p_sono_'.$p_ra),
                'p_evacuacao'           => $this->input->post('p_evacuacao_'.$p_ra),
                'p_obs_colacao'         => $this->input->post('p_obs_colacao_'.$p_ra),
                'p_obs_almoco'          => $this->input->post('p_obs_almoco_'.$p_ra),
                'p_obs_lanche'          => $this->input->post('p_obs_lanche_'.$p_ra),
                'p_obs_sono'            => $this->input->post('p_obs_sono_'. $p_ra),
                'p_obs_evacuacao'       => $this->input->post('p_obs_evacuacao_'.$p_ra),
                'p_observacao'          => $this->input->post('p_observacao_'.$p_ra)
            );

            
            $resultado = $this->acompanhamento->turma_acompanhamento($parametro);

        endforeach;

        //RETORNA A MENSAGEM DO BANCO  
        echo $resultado[0]['MENSAGEM'];        
    }

    
  
}

?>