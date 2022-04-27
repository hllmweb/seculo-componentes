<?php
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Socket extends CI_Controller {
    
    public function index() {
        
        //models
        //$this->load->model('m_notificacao', 'notificacao', true);

        //libs
        //$this->load->library('ratchet_client');


       // Load package path
        $this->load->add_package_path(FCPATH.'vendor/romainrg/ratchet_client');
        $this->load->library('ratchet_client');
        $this->load->remove_package_path(FCPATH.'vendor/romainrg/ratchet_client');

        // //Run server
        // $this->ratchet_client->set_callback('auth', array($this, '_auth'));
        // $this->ratchet_client->set_callback('event', array($this, '_event'));
        // $this->ratchet_client->run();      

    }

    //página para criar a conexão socket
    // public function start(){
    //   //  parent::Socket_chat();
      
    //     echo "cria a conexao socket do servidor".$this->socket_chat->ini_socket();


    // }

    

 }
 ?>