<?php 

class Users_model extends CI_Model 
{
	
	public $table ;

	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->table = "users";
		$this->load->library('email');
		$this->load->model('global_model');
	}
	
	public function insert($data )
	{
			 $result = $this->db->insert($this->table, $data); 
			 return $result ; 		
	}
	
	public function update($user_id , $data)
	{
		$this->db->where("user_id",$user_id);	
		$result = $this->db->update($this->table , $data);
		return $result ;
	}
	
	
	
    public function checkUser($user_id)
	{     
		  $table  = $this->table;
		  $query  = "SELECT user_id FROM $table WHERE user_id= $user_id ORDER BY id ASC LIMIT 1";
		  $result = $this->db->query($query);
		  $result = $result->result_array();
		  if($result[0]['user_id'])
			{
			     return "1";
			}
			else
			{
			     return "0";				
			}
		  
		
	}
	
	public function getByUserId($user_id)
	{
		$result =  $this->db->get_where($this->table, array('user_id' => $user_id));
		return $result->result_array();
		
	}
	
	public function getAllForThisUser($user_id)
	{   
		
		$user = $this->getByUserId($user_id);
		if($user)
		{
		   $data['user'] = $user ;	
		
		$sql = "SELECT fi_requests.* , users.*  FROM fi_Requests , users    WHERE users.user_id = fi_requests.user_id AND fi_requests.user_to = '$user_id'  ";
		$requests_received = $this->db->query($sql);
		$requests_received = $requests_received->result_array();

		$sql2 = "SELECT fi_requests.* , users.*  FROM fi_Requests , users    WHERE users.user_id = fi_requests.user_to AND fi_requests.user_id = '$user_id'  ";
		$requests_sent = $this->db->query($sql2);
		$requests_sent = $requests_sent->result_array();
				
			if($requests_received)
			{
				$data['requests_received']=$requests_received;
			}
			if($requests_sent)
			{
				$data['requests_sent'] = $requests_sent ;
			}
			$sql3 = "SELECT fi_requests.* FROM fi_requests     WHERE  (fi_requests.user_id = '$user_id' OR fi_requests.user_to = '$user_id') ORDER BY fi_requests.id DESC ";
	  	
		$all_requests = $this->db->query($sql3);
		$all_requests = $all_requests->result_array();
			
			if($all_requests)
			{
				$requests_array =array();
				
				//$data['requests'] = $requests ;
				foreach($all_requests as $request)
				{
						if($request['user_to'] == $user_id)
						{   
					        $requests_array['request'][]    = $request ;
							$requests_array['other_user'][] = $this->getByUserId($request['user_id']);
						}
						else if($request['user_id'] == $user_id)
						{
							$requests_array['request'][]    = $request;
							$requests_array['other_user'][] = $this->getByUserId($request['user_to']);
						}
					
					
				}
				$data['requests_full'] = $requests_array;
				
			}	
	
		}
	  return $data;
	}
		
	
	public function  getIncomingRequests($user_id)
	{
		$sql = "SELECT  fi_requests.id AS f_id ,fi_requests.* , users.*  FROM fi_Requests , users    WHERE users.user_id = fi_requests.user_id AND fi_requests.user_to = '$user_id'  ";
		
		$requests_received = $this->db->query($sql);
		$requests_received = $requests_received->result_array();
		return $requests_received;
	}
	public function  getOutgoingRequests($user_id)
	{
		$sql2 = "SELECT fi_requests.id AS f_id , fi_requests.* , users.*  FROM fi_Requests , users    WHERE users.user_id = fi_requests.user_to AND fi_requests.user_id = '$user_id'  ";
		
		$requests_sent = $this->db->query($sql2);
		$requests_sent = $requests_sent->result_array();
		
		return $requests_sent;
	}
	
	public function emailNotifier($email_id , $type)
	{	
			$subject = 'This is a test';
            $message = '<p>This message has been sent for testing purposes.</p>';
			$senders_email = "abhishek.lal.in@gmail.com";
			$support_email = "abhishek.lal.in@gmail.com";
            // Get full html:
            $body =  $message ;
            // Also, for getting full html you may use the following internal method:
            //$body = $this->email->full_html($subject, $message);

            $result = $this->email
                ->from($senders_email)
                ->reply_to($support_email)    // Optional, an account where a human being reads.
                ->to($email_id)
                ->subject($subject)
                ->message($body)
                ->send();
				
	}
	
	
	public function castAVote()
	{
		$user_id = $this->session->userdata("user_id");
		$poll_id = $_REQUEST['id'];
		$option_id = $_REQUEST['poll'][$poll_id];
		$not_voted = $this->global_model->checkIfVoted($user_id , $poll_id);
		if($not_voted == 1)
		{  
			$data = array
					(
					'poll_id' => $poll_id ,
					'user_id' => $user_id ,
					'option_id' => $option_id
					);
			$insert_query = $this->db->insert("poll_casts" , $data);
			return $insert_query ;
		}	
		else
		{
			
			return "0";
		}
		
		
		
	}
	
	
	public function get_userdata($user_id)
	{
				$query = "SELECT * FROM poll_casts WHERE user_id = $user_id ";
				$result_set = $this->db->query($query);
				$result_set = $result_set->result_array();
				$data = array();
				$i = 0 ;
				foreach($result_set as $result)
				{
					$data[$i]['poll'] = $this->global_model->getTopic($result['poll_id']);
					$data[$i]['user'] = $this->getByUserId($result['user_id']);
					$data[$i]['my_vote'] = $this->global_model->myVote($result['poll_id'] , $result['user_id']);
					$i++;
					
				}
				
				
				return $data ;
	}
	
	
	
	
}



?>