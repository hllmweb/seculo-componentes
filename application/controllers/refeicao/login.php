<?php

header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        //$this->load->model('m_refeicao', 'refeicao', true);

        //libers
        $this->load->helper(array('url','directory'));
       
    }
    
    function index(){ 
        $this->load->view('refeicao/login');
    }

    
   
}