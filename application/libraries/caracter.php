<?php 
if (!defined('BASEPATH')) 
	exit('No direct script access allowed');

class CI_Caracter{
   protected $CI;
   
   public function __construct(){
      $this->CI = &get_instance();
   }

   public function algo(){
	  //qualquer coisa...
	  
	  echo "teste";
   }
} 