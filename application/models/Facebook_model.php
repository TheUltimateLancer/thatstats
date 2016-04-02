<?php 

	//set_time_limit(0);
	//define('FACEBOOK_SDK_V4_SRC_DIR','C:\\xampp\\htdocs\\friendsindeed\\application\\models\\facebook/');
	define('FACEBOOK_SDK_V4_SRC_DIR',APPPATH.'/models/facebook/');
	
	require_once("facebook/autoload.php");
	
			use Facebook\FacebookSession;
			use Facebook\FacebookRequest;
			use Facebook\GraphUser;
			use Facebook\FacebookRequestException;
			use Facebook\FacebookRedirectLoginHelper;

                     

class facebook_model extends CI_Model 
{
	
	public $fb ;
    public $access_token ;
	public $dbconn ;
   
	public function __construct()
	{
		parent::__construct();
	}
	
	
	
	public function facebookInit()
	{
        $this->fb = new Facebook\Facebook([
										   'app_id'                => '218614941831199',
										   'app_secret'            => 'b014ac5f0cc0e5b2a983c30221647ae2',
										   'default_graph_version' => 'v2.5',
										]);	
			return $this->fb ;						
			
	}
	
	public function loginUrl()
	{
		$helper = $this->facebookInit()->getRedirectLoginHelper();
        $permissions = ['email','user_friends']; // Optional permissions
        
		$loginUrl = $helper->getLoginUrl(site_url()."/FBController/", $permissions);
        return $loginUrl ;	
				
		
		
	}
	
	
	public function handleRequests($param , $user_id , $access_token)
	{
		
		$request_ids 	= explode(',', $param);
		 
		 $fb = $this->facebookInit();
		 foreach($request_ids as $key => $request_id){
		$full_request_id = $request_id.'_'.$user_id ;
	    if($key==(count($request_ids)-1)){
			
		}
		else{
			
		$response = $fb->DELETE('/'.$full_request_id.'?access_token='.$access_token );
			
		}
			 
			 
		 }
		 				
		
  
		
	}
	
	
	public function generateAppNotification($user_id , $type)
	{
		
		
		      $notification = "https://graph.facebook.com/".$user_id."/notifications?method=POST&access_token=510164795824545|ff4761eb69844a4cc17531384e3c17f0&template=hello&href=index?q=1111		";
		      $result = file_get_contents($notification);
                   					
		
	}
	
		
		
		
	
	
}



?>