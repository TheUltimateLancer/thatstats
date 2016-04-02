<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("facebook_model");
		$this->load->model("users_model");
		$this->load->model("global_model");
	
	}
	
	
	public function index($param = null , $hash = null)
	{          
	
	 //$this->global_model->createTopic();
	 
		$loginUrl = $this->facebook_model->loginUrl();
		
		
     	$data = array();
		$data['login_url'] = $loginUrl ;
		
        $data['max_id']  = $this->global_model->getMaxID();
		$data['min_id']   = $this->global_model->getMinID();
			
		if($param != null)
		{
			$if_legal = $this->global_model->hashChecker($param,$hash);
			if($if_legal == 1)
			{
			  $id = $param;
			 
			}
			else{
				 echo "redirect404" ;
				}
			
		}	
		else
		{
			 $id = "max" ;
			 $type = "null";
		}	
		
		if(isset($_REQUEST['id']))
		{
			$if_legal = $this->global_model->hashChecker($_REQUEST['id'],$_REQUEST['hashed_id']);
			
			if($if_legal == 1)
			{
			  if($_REQUEST['type'] == 'next')
			  {
				 $id = $_REQUEST['id']+1; 
                 $type = "next";				 
			  }
			 elseif($_REQUEST['type'] == 'prev')
			 {
				$id = $_REQUEST['id']-1;
				$type = "prev";
			 }
			  
			  
			  
			
			}
			else{
				 echo "redirect404" ;
				
			}
			
		}
			else
		{
			 $id = "max" ;
			 $type = "null";
		}	
		
		
		$data['topics']       = $this->global_model->getTopic($id , $type);
		
       //$data['topics'] = $this->global_model->getTopics();
        		
		$this->load->view('includes/html_header.php',$data);
		$this->load->view('includes/header.php');
		$this->load->view('includes/sidebar.php');
		$this->load->view('dashboard.php');
		//$this->load->view('includes/footer.php');
			
	}
	
	
	public function cast()
	{          
		$id = $_REQUEST['id'];	
		$hashed_id = $_REQUEST['hashed_id'];	
	    
        $legal_request = $this->global_model->hashChecker($id , $hashed_id);
		
		if($legal_request == 1)
        {
			$voted = $this->users_model->castAVote();
			
			if($voted == 1)
			{
				echo "1" ;
				
			}	
			else
			{
				echo "0";
				
			}
		}
        elseif($legal_request !=1)
		{
			echo "redirect404" ;
		}

			
	}

	public function test()
	{
		$this->global_model->votesCasted('5');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url()."/Dashboard");
		
	}
}
