<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Controller extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model("facebook_model");
		$this->load->model("users_model");
	
		
		
	}
	
	
	
	public function index()
	{
		
		$loginUrl = $this->facebook_model->loginUrl();
		
		$data['login_url'] = $loginUrl ;
		
		$this->load->view('includes/html_header.php');
		$this->load->view('includes/header.php');
		$this->load->view('includes/sidebar.php');
		$this->load->view('home.php',$data);
		$this->load->view('includes/footer.php');
	}
	
	
}
