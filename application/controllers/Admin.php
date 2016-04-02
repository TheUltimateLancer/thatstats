<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("facebook_model");
		$this->load->model("users_model");
	
	}
	
	
	public function index()
	{          
			
								  
			    
	}
	

	
}
