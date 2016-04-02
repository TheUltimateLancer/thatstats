<?php 

class Global_model extends CI_Model 
{
	
	

	public function __construct()
	{
		parent::__construct();
		$this->load->library("form_validation");
		$this->load->library('email');
	}
	
	public function getTopics()
	{ 
		
		$offset  = 0  ;
    	$limit   = 5  ;
		$query   = " SELECT * FROM polls  ORDER BY id LIMIT $offset , $limit ";
		$getData = $this->db->query($query);
		return $getData->result_array();
		
		
	}
	
	public function getTopic($id , $type = null)
	{ 
	  $limit   = 1  ;
	   
		
		if($id == "max")
		{
			$query   = " SELECT * FROM polls  ORDER BY id DESC LIMIT  $limit  ";
		 
		}
		else
		{
			if($type !=null)
			{
				if($type == "next")
				{
				   $query   = " SELECT * FROM polls  WHERE id >= ".$id ." ORDER BY id ASC LIMIT $limit" ;
				}
				elseif($type == "prev")
				{
					
		    		$query   = " SELECT * FROM polls  WHERE id <= ".$id ." ORDER BY id DESC LIMIT $limit" ;
		
				}
				
			}	
			else
				{
					
		    		$query   = " SELECT * FROM polls  WHERE id = ".$id ." ORDER BY id DESC LIMIT $limit" ;
		
				}
			
		}
		$offset  = 0  ;
    	$getData = $this->db->query($query);
		return $getData->result_array();
		
		
	}
	
	
	
	public function createTopic()
	{  
	        $name_value =array(
						"1" =>"Yes" ,
						"2" =>"No" ,
						"3" =>"Not Likely" 			
			     		);
			$value_count = array(
			             "1" => "50" ,
			             "2" => "10" ,
			             "3" => "9" ,
			
							);
			$poll_options = htmlspecialchars(json_encode($name_value));
			$poll_stats   = htmlspecialchars(json_encode($value_count));
				
						
	     $data = array 
			    (
				"poll_title"       => "Lorem Ipsum" ,
				"poll_description" => "Should we tolerate injustice  ?" ,
				"poll_options"     => $poll_options ,
				"poll_stats"       => $poll_stats 
				);
				
				$this->db->insert("polls",$data);
	
		
	}
	
	
	public function hashChecker($param , $hash)
	{
		$hashThis = md5($this->config->item("salt").$param);
		if($hashThis == $hash)
		{
			return '1';
			
		}
		else
		{
			
			return "0";
		}
		
	}
	
	
	public function checkIfVoted($user_id , $poll_id)
	{
		$query = "SELECT COUNT(*) AS total_rows FROM poll_casts WHERE user_id = '$user_id' AND poll_id = $poll_id ";
		
		$result = $this->db->query($query);
		$arr = $result->result_array();
		if($arr[0]['total_rows']>0)
		{
			return "0";
		}
		else{
			
			return '1' ;
		}
		
	}
	
	public function totalVotesCasted($poll_id)
	{
		$query = "SELECT *  FROM polls WHERE  id = $poll_id ";
		
		$result = $this->db->query($query);
		$arr = $result->result_array();
		
		print_r($arr);
	
		
	}
	
	
	public function getMaxID()
	{
		$query  = "SELECT id FROM polls ORDER BY id DESC LIMIT 1" ;
		$result = $this->db->query($query);
		$max_id = $result->result_array();
		$max_id = $max_id['0']['id'];
		return $max_id ;
	}
	
	
	public function getMinID()
	{
		$query  = "SELECT id FROM polls ORDER BY id ASC LIMIT 1" ;
		$result = $this->db->query($query);
		$min_id = $result->result_array();
		$min_id = $min_id['0']['id'];
		
		return $min_id ;
		
		
	}
	
	public function votesCasted($poll_id)
	{
		$poll_options = $this->poll_options($poll_id);
		
		$stats_for_each_option = array();
		$i = 0 ;
		foreach($poll_options as $key => $value )
		{
				$query  = "SELECT COUNT(*) AS total_votes FROM poll_casts WHERE poll_id  = $poll_id AND option_id = $key  ";
		        $result = $this->db->query($query);
				$count  = $result->result_array() ;
				$stats_for_each_option[$i]['option_id'] = $key ;
				$stats_for_each_option[$i]['option_text'] = $value ;
				$stats_for_each_option[$i]['count'] =  $count['0']['total_votes'];
				$i++ ;
		}
		
		return $stats_for_each_option ;
	  }
	
	public function poll_options($poll_id)
	{
		$query = "SELECT * FROM polls WHERE id  = $poll_id LIMIT 1";
		$poll_data = $this->db->query($query);
		$poll_data = $poll_data->result_array();
		$poll_options = "";
		if($poll_data)
		{
			$poll_options = json_decode(htmlspecialchars_decode($poll_data['0']['poll_options']));
		}	
		return $poll_options;
	}
	
	
	public function percentage($param)
	{
		$total_votes_casted = 0;
		$i = 0 ;
		foreach($param as $key=>$val)
		{
		   	$total_votes_casted += $val['count'];
						
		}
		if($total_votes_casted == 0)
		{
			foreach($param as $key=>$val)
		{
		   $percent[$i]['option_text'] = $val['option_text'] ;
		   $percent[$i]['percent'] = 0 ;
		   $i++ ;
						
		}
			
		}	
		else{
				foreach($param as $key=>$val)
		{
		   $percent[$i]['option_text'] = $val['option_text'] ;
		   $percent[$i]['percent'] = $val['count']/($total_votes_casted/100) ;
		   $i++ ;
						
		}
	
			
		}
		
		 
		 return $percent ;

	}
	
	
	public function myVote($poll_id , $user_id)
	{   
	    $check = $this->checkIfVoted($user_id , $poll_id);
		if($check == 0)
		{
		    $query  = "SELECT option_id FROM poll_casts WHERE poll_id = $poll_id AND user_id = $user_id";
			$result = $this->db->query($query);
			$result = $result->result_array();
			$poll_options = $this->poll_options($poll_id);
			foreach($poll_options as $key =>$poll_option)
			{
					if($key == $result[0]['option_id'])
					{
						$return['status'] = 1 ;
						$return['option_id'] = $key ;	
						$return['option_text'] = $poll_option ;	
							
					}	
			}
			
		}
  elseif($check==1){
	   $return['status'] = 0 ; 
	  
  }		
		return $return ;
	}
	
}



?>