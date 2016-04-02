<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FBController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("facebook_model");
		$this->load->model("users_model");
	
	}
	
	
	public function index()
	{          
					
								  
							
						
	            $fb = $this->facebook_model->facebookInit();
				$app_id = '218614941831199';
				$helper = $fb->getRedirectLoginHelper();
				try {
				  $accessToken = $helper->getAccessToken();
				} catch(Facebook\Exceptions\FacebookResponseException $e) {
				  // When Graph returns an error
				  echo 'Graph returned an error: ' . $e->getMessage();
				  exit;
				} catch(Facebook\Exceptions\FacebookSDKException $e) {
				  // When validation fails or other local issues
				  echo 'Facebook SDK returned an error: ' . $e->getMessage();
				  exit;
				}

				if (! isset($accessToken)) {
				  if ($helper->getError()) {
					header('HTTP/1.0 401 Unauthorized');
					echo "Error: " . $helper->getError() . "\n";
					echo "Error Code: " . $helper->getErrorCode() . "\n";
					echo "Error Reason: " . $helper->getErrorReason() . "\n";
					echo "Error Description: " . $helper->getErrorDescription() . "\n";
				  } else {
					  redirect(site_url());
					//header('HTTP/1.0 400 Bad Request');
					
				  }
				  exit;
				}

				$oAuth2Client = $fb->getOAuth2Client();

				$tokenMetadata = $oAuth2Client->debugToken($accessToken);
				$tokenMetadata->validateAppId($app_id);
				$tokenMetadata->validateExpiration();

				if (! $accessToken->isLongLived()) {
				  try {
					$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
				  } catch (Facebook\Exceptions\FacebookSDKException $e) {
					exit;
				  }

				}

			         	$access_token = (string) $accessToken;
                        $response            = $fb->get('/me?fields=id,name,email,gender,picture', $access_token);
						$user                = $response->getGraphUser();
						
						$timestamp = new DateTime();
						$timestamp = $timestamp->getTimestamp();
						
						if($user['gender'] == "male")
						{
							$user_gender = "0";
							
						}
						else
						{
							  $user_gender = "1";
						}
						
						$check_if_user_exists = $this->users_model->checkUser($user['id']);
						if($check_if_user_exists=="1")
						{
							$data_update =  array(
							"user_name" => $user['name'],
							"user_email" =>$user['email'],
							"user_gender"=> $user['gender'],
							"user_access_token" => $access_token,
							"user_birthdate" => "",//$user['birthday'],
							"updated_time"=>$timestamp,
						    "profile_img"=>$user['picture']->getUrl()
							);
							
						$response = $this->users_model->update($user['id'] , $data_update);	
						$data = $data_update ;
						if($response == "1")
							{
								
							}	
							else
							{
								redirect(site_url());
							}
						
						}	
						else
						{
							$data_insert = array(
						   "user_id" => $user['id'] ,
						   "user_name" => $user['name'],
						   "user_email" =>$user['email'],
						   "user_gender"=> $user['gender'],
						   "user_access_token" => $access_token,
						   "registration_time" =>$timestamp ,
						   "user_birthdate" => "",//$user['birthday'],
						   "updated_time"=>$timestamp,
						   "profile_img"=>$user['picture']->getUrl()
							);
							$data = $data_insert ;
							$response = $this->users_model->insert($data_insert);
							if($response == "1")
							{
								
							}	
							else
							{
								redirect(site_url());
							}
						}
						
						$this->session->set_userdata("logged_in","1");
						$this->session->set_userdata("user_id",$user['id']);
						
						$this->session->set_userdata("profile_img",$user['picture']->getUrl());
						$this->session->set_userdata($data);
						

						
						
						redirect(site_url()."/Dashboard");
						
												
                        
	}
	

	
}
