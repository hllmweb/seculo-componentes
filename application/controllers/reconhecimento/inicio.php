<?php
header("Access-Control-Allow-Origin: *");
//
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {
    
     function __construct() {
        parent::__construct();

        //models
        $this->load->model('m_reconhecimento', 'reconhecimento', true);

        //libers
        $this->load->helper(array('url','directory'));
    }
    
    function index() {  
    	$lst_reconhecimento = $this->reconhecimento->lst_reconhecimento();
    	
    	$prefix = "";
    	$list_user = "";
    	foreach($lst_reconhecimento as $row):
			$prefix = ", ";
			$list_user .= "'".$row['CD_USUARIO']."'".$prefix;
			
    	endforeach;
    	$list   = rtrim($list_user, $prefix);
		
		echo $list; 

    }

}