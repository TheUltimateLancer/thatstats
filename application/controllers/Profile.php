<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("facebook_model");
		$this->load->model("users_model");
	
	}
	
	
	public function index()
	{          
			//$this->global_model->createTopic();
	 
		$loginUrl = $this->facebook_model->loginUrl();
		
		
     	$data = array();
		$data['login_url'] = $loginUrl ;
		$id = $this->session->userdata("user_id");
		$data['activity'] = $this->users_model->get_userdata($id);
		 		
		$this->load->view('includes/html_header.php',$data);
		$this->load->view('includes/header.php');
		$this->load->view('includes/sidebar.php');
		$this->load->view('profile.php');
		//$this->load->view('includes/footer.php');
					
								  
			    
	}
	

	
}
