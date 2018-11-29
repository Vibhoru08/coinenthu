<?php
	require APPPATH . 'libraries/social/Social.php';
	class Login extends MY_Controller {
		function __construct() {
			parent::__construct();
			$this->load->library(array('email','form_validation','session','pagination'));
			$this->load->database();
			$this->load->model('User_model');
			$this->load->model('Admin_model');
			$this->load->library('pagination');
			$this->load->helper('url');
		}
		public function index()
		{
			$data = array();
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				$this->show('login',$data);
			}else{
				redirect('/', 'refresh');
			}
		}
		public function resetUpdatePassword(){
			$uid = $_POST['u_id'];
			$pwd = $this->input->post('confirmPass');
			$updateResults = $this->Admin_model->updatePassword($uid,$pwd);
			$status = $this->User_model->deleteForgetToken($uid);
			$updateResult = $updateResults;
			echo $updateResult;exit;
		}
		public function twitterLoginAuth(){
			$email = $this->uri->segment('2');
			if($email == 'twitter'){
				include_once APPPATH."libraries/twitter-oauth-php/twitteroauth.php";
				$consumerKey = 'Sb8EQiBHiTMDKdGDSx1dDn3rO';
				$consumerSecret = 'VL3kNJBbUc2I2Uk6TgdXb95kCsaA3pBg3ITt33tqdhgmZKJtbk';
				$oauthCallback = base_url().'twitter-login-auth/twitter';
				$sessToken = $this->session->userdata('token');
				$sessTokenSecret = $this->session->userdata('token_secret');
				$sessStatus = $this->session->userdata('status');
				$sessUserData = $this->session->userdata('userData');
				if(isset($sessStatus) && $sessStatus == 'verified'){
					$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessUserData['accessToken']['oauth_token'], $sessUserData['accessToken']['oauth_token_secret']);
					$data['tweets'] = $connection->get('statuses/user_timeline', array('screen_name' => $sessUserData['username'], 'count' => 5));
					$userData = $sessUserData;
				}else if(isset($_GET['oauth_token']) && $sessToken == $_GET['oauth_token']){
					$connection = new TwitterOAuth($consumerKey, $consumerSecret, $sessToken, $sessTokenSecret);
					$accessToken = $connection->getAccessToken($_GET['oauth_verifier']);
					$params = array('include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true');
					if($connection->http_code == '200'){
						$userInfo = $connection->get('account/verify_credentials',$params);
						$name = explode(" ",$userInfo->name);
						$first_name = isset($name[0])?$name[0]:'';
						$last_name = isset($name[1])?$name[1]:'';
						$userData = array(
							'oauth_provider' => 'twitter',
							'oauth_uid' => $userInfo->id,
							'username' => $userInfo->screen_name,
							'email' => $userInfo->email,
							'first_name' => $first_name,
							'last_name' => $last_name,
							'locale' => $userInfo->lang,
							'profile_url' => 'https://twitter.com/'.$userInfo->screen_name,
							'picture_url' => $userInfo->profile_image_url
						);
						$userId = $userInfo->id;
						$checkingProvider =  $this->User_model->fbcheckProvider($userInfo->id);
						if(isset($checkingProvider->sp_id) && $checkingProvider->sp_id!=''){
							$u_uid  = $checkingProvider->sp_uid;
							$last_insert_id  = $this->User_model->updateuserinfotwitter($userData,$u_uid);
							if($last_insert_id>0){
								$getUserInfo      = $this->User_model->getUserDetails($u_uid);
								$name  = ucfirst($getUserInfo->u_firstname).' '.$getUserInfo->u_lastname;
								$this->session->set_userdata('user_id', $getUserInfo->u_uid);
								$this->session->set_userdata('usertype', 'User');
								$this->session->set_userdata('uname', $name);
								$this->session->set_userdata('uemail', $getUserInfo->u_email);
								$this->session->set_userdata('profileImg', $getUserInfo->u_picture);
								$this->session->set_userdata('sprofileImg', $getUserInfo->u_social_pic);
								$this->session->set_userdata('new_user', 0);
								$this->session->set_userdata('loginwith','twitter');
								$user_id   = $this->session->userdata['user_id'];
								$user_type = $this->session->userdata['usertype'];
							}
						}else{
							$email = $userInfo->email;
							$emailChecking = $this->User_model->checkEmailExists($email);
							if($emailChecking=='0'){
								if($email!=""){
									$last_insert_id   = $this->User_model->insertuserinfotwitter($userData);
									if($last_insert_id!=0){
										$insertedProdiver = $this->User_model->fbaddSocialProvide($userId,$last_insert_id);
										$getUserInfo      = $this->User_model->getUserDetails($last_insert_id);
										$name  = ucfirst($getUserInfo->u_firstname).' '.$getUserInfo->u_lastname;
										$this->session->set_userdata('user_id', $getUserInfo->u_uid);
										$this->session->set_userdata('usertype', 'User');
										$this->session->set_userdata('uname', $name);
										$this->session->set_userdata('uemail', $getUserInfo->u_email);
										$this->session->set_userdata('profileImg', $getUserInfo->u_picture);
										$this->session->set_userdata('sprofileImg', $getUserInfo->u_social_pic);
										$this->session->set_userdata('new_user',1);
										$this->session->set_userdata('loginwith','twitter');
										$user_id   = $this->session->userdata['user_id'];
										$user_type = $this->session->userdata['usertype'];
									}
								}else{
									// $logout = $connection->get("oauth/authenticate", array("force_login" => "true"));
									// echo $logout;
									$this->session->set_userdata('alreadyExists', 'twitter');
								}
							}else{
								// $logout = $connection->get("oauth/authenticate", array("force_login" => "true"));
								// echo $logout;
								$this->session->set_userdata('alreadyExists', 'twitter');
							}
						}

						$userData['accessToken'] = $accessToken;
						$this->session->set_userdata('status','verified');
						$this->session->set_userdata('userData',$userData);

					}else{
						$data['error_msg'] = 'Some problem occurred, please try again later!';
					}
			?>
			<script>
				self.close();
			</script>
			<?php
				exit;

				}else{
					$this->session->unset_userdata('token');
					$this->session->unset_userdata('token_secret');
					$connection = new TwitterOAuth($consumerKey, $consumerSecret);
					$requestToken = $connection->getRequestToken($oauthCallback);

					$this->session->set_userdata('token',$requestToken['oauth_token']);
					$this->session->set_userdata('token_secret',$requestToken['oauth_token_secret']);
					if($connection->http_code == '200'){
						$twitterUrl = $connection->getAuthorizeURL($requestToken['oauth_token']);
						$data['oauthURL'] = $twitterUrl;
						 header('Location: '.$twitterUrl);
					}else{
						redirect('/', 'refresh');
					}
				}
			}else if($email =="twitter_login"){
				if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
					if($_SESSION['new_user'] == 1){
						$_SESSION['new_user'] = 0;
						echo json_encode(array('status'=>FALSE,'output'=>'loginsuccess'));
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'loginsuccess'));
					}
				}else if(isset($_SESSION['alreadyExists']) && $_SESSION['alreadyExists']=='twitter'){
					echo json_encode(array('status'=>FALSE,'output'=>1));
				}else{
					echo json_encode(array('status'=>FALSE,'noStatus'=>'No Data'));
				}
			}
		}
		public function socialSignIn(){
			$email = $this->uri->segment('2');
			$Social_obj= new Social();
			if($email == 'google'){
				$google_login_Info = $Social_obj->google();
				if(isset($google_login_Info['User'][id]) && $google_login_Info['User'][id]!=""){
					$userId = $google_login_Info['User']['id'];
					$checkingProvider =  $this->User_model->fbcheckProvider($userId);
					if(isset($checkingProvider->sp_id) && $checkingProvider->sp_id!=''){
						$u_uid  = $checkingProvider->sp_uid;
						$last_insert_id  = $this->User_model->updateuserinfogmail($google_login_Info['User'],$u_uid);
						if($last_insert_id>0){
							$getUserInfo      = $this->User_model->getUserDetails($u_uid);
							$name  = ucfirst($getUserInfo->u_firstname).' '.$getUserInfo->u_lastname;
							$this->session->set_userdata('user_id', $getUserInfo->u_uid);
							$this->session->set_userdata('usertype', 'User');
							$this->session->set_userdata('uname', $name);
							$this->session->set_userdata('uemail', $getUserInfo->u_email);
							$this->session->set_userdata('profileImg', $getUserInfo->u_picture);
							$this->session->set_userdata('sprofileImg', $getUserInfo->u_social_pic);
							$this->session->set_userdata('new_user', 0);
							$this->session->set_userdata('loginwith','gmail');
							$user_id   = $this->session->userdata['user_id'];
							$user_type = $this->session->userdata['usertype'];
						}
					}else{
						$email = $google_login_Info['User']['email'];
						$emailChecking = $this->User_model->checkEmailExists($email);
						if($emailChecking=='0'){
							if($email!=""){
								$last_insert_id   = $this->User_model->insertuserinfogmail($google_login_Info['User']);
								if($last_insert_id!=0){
									$insertedProdiver = $this->User_model->fbaddSocialProvide($userId,$last_insert_id);
									$getUserInfo      = $this->User_model->getUserDetails($last_insert_id);
									$name  = ucfirst($getUserInfo->u_firstname).' '.$getUserInfo->u_lastname;
									$this->session->set_userdata('user_id', $getUserInfo->u_uid);
									$this->session->set_userdata('usertype', 'User');
									$this->session->set_userdata('uname', $name);
									$this->session->set_userdata('uemail', $getUserInfo->u_email);
									$this->session->set_userdata('profileImg', $getUserInfo->u_picture);
									$this->session->set_userdata('sprofileImg', $getUserInfo->u_social_pic);
									$this->session->set_userdata('new_user',1);
									$this->session->set_userdata('loginwith','gmail');
									$user_id   = $this->session->userdata['user_id'];
									$user_type = $this->session->userdata['usertype'];
								}
							}else{
								$this->session->set_userdata('alreadyExists', 'ge');
							}
						}else{
							$this->session->set_userdata('alreadyExists', 'ge');
						}
					}
				}
			?>
			<script>
				self.close();
			</script>
			<?php
				exit;
			}else if($email == 'google_login'){
				if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
					if($_SESSION['new_user'] == 1){
						$_SESSION['new_user'] = 0;
						echo json_encode(array('status'=>FALSE,'output'=>'loginsuccess'));
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'loginsuccess'));
					}
				}else if(isset($_SESSION['alreadyExists']) && $_SESSION['alreadyExists']=='ge'){
					echo json_encode(array('status'=>FALSE,'output'=>1));
				}else{
					echo json_encode(array('status'=>FALSE,'noStatus'=>'No Data'));
				}
			}
		}
		public function resetPassword(){
			$data = array();
			if(isset($_GET['resetuqid']) && $_GET['resetuqid']!=""){
				$tokenUid = explode('_',$_GET['resetuqid']);
				if(sizeof($tokenUid)>0){
					$uid= $tokenUid[1];
					$forgotinfo = $this->User_model->checkForgotMail($uid);
					if(isset($forgotinfo->ft_id) && $forgotinfo->ft_id!=""){
						$uid = $forgotinfo->ft_uid;
						$data['uid'] = $uid;
						$this->show('reset-password',$data);
					}else{
						$this->show('link-expired',$data);
					}
				}else{
					$this->show('link-expired',$data);
				}
			}else{
				$this->show('link-expired',$data);
			}
		}
		public function forgotPassword(){
			if(isset($_POST['u_email']) && $_POST['u_email']!=""){
				$u_email = $_POST['u_email'];
				$emailChecking = $this->User_model->checkEmailExists($u_email);
				if($emailChecking==0){
					echo json_encode(array('status'=>FALSE,'output'=>'fail'));
				}else{
					$token    = $this->getUniqueCode('10');
					$userInfo = $this->User_model->getUserInfo($u_email);
					if(isset($userInfo->u_uid) && $userInfo->u_uid!=""){
						$u_uid       = $userInfo->u_uid;
						$u_firstname = $userInfo->u_firstname;
						$u_lastname  = $userInfo->u_lastname;
						$forgotinfo = $this->User_model->checkForgotMail($u_uid);
						if(isset($forgotinfo->ft_id) && $forgotinfo->ft_id!=""){
							$ft_id = $forgotinfo->ft_id;
							$updateToken	= $this->User_model->updateForgetpwd($ft_id,$token);
							$uidToken = $token.'_'.$u_uid;
							//Mail
							$mailDetails = Array();
							$mailDetails['name'] 	= ucfirst($u_firstname).' '.$u_lastname;
							$mailDetails['passwordLink'] = base_url().'reset-password?resetuqid='.$uidToken;
							$config = array (
								'mailtype' => 'html',
								'charset'  => 'utf-8',
								'priority' => '1'
							);
							$this->email->initialize($config);
							$this->load->library('email');
							$from_email = "info@coinenthu.com";
							$to_email   = $u_email;
							$this->email->from($from_email, 'Coinenthu');
							$this->email->to($to_email);
							$this->email->subject('Password reset link from Coinenthu.');
							$message = $this->load->view('mail_templates/forgotten-mail-template',$mailDetails,TRUE);
							$this->email->message($message);
							$this->email->send();
							echo json_encode(array('status'=>TRUE,'output'=>'success'));
						}else{
							$uidToken = $token.'_'.$u_uid;
							$updateToken	= $this->User_model->insertForgetpwd($u_uid,$token);
							//Mail
							$mailDetails = Array();
							$mailDetails['name'] 	= ucfirst($u_firstname).' '.$u_lastname;
							$mailDetails['passwordLink'] = base_url().'reset-password?resetuqid='.$uidToken;
							$config = array (
								'mailtype' => 'html',
								'charset'  => 'utf-8',
								'priority' => '1'
							);
							$this->email->initialize($config);
							$this->load->library('email');
							$from_email = "info@coinenthu.com";
							$to_email   = $u_email;
							$this->email->from($from_email, 'Coinenthu');
							$this->email->to($to_email);
							$this->email->subject('Password reset link from Coinenthu.');
							$message = $this->load->view('mail_templates/forgotten-mail-template',$mailDetails,TRUE);
							$this->email->message($message);
							$this->email->send();
							echo json_encode(array('status'=>TRUE,'output'=>'success'));
						}
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'fail'));
					}
				}
			}else{
				if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 'User'){
					$data = array();
					$this->show('forgot-password',$data);
				}else{
					redirect('/', 'refresh');
				}
			}
		}
		public function facebookloginbop(){
			if(isset($_POST['userId']) && $_POST['userId']!=""){
				$userId = $_POST['userId'];
				$checkingProvider =  $this->User_model->fbcheckProvider($userId);
				if(isset($checkingProvider->sp_id) && $checkingProvider->sp_id!=''){
					$u_uid  = $checkingProvider->sp_uid;
					$last_insert_id  = $this->User_model->updateuserinfo($_POST,$u_uid);
					if($last_insert_id>0){
						$getUserInfo      = $this->User_model->getUserDetails($u_uid);
						$name  = ucfirst($getUserInfo->u_firstname).' '.$getUserInfo->u_lastname;
						$this->session->set_userdata('user_id', $getUserInfo->u_uid);
						$this->session->set_userdata('usertype', 'User');
						$this->session->set_userdata('uname', $name);
						$this->session->set_userdata('uemail', $getUserInfo->u_email);
						$this->session->set_userdata('profileImg', $getUserInfo->u_picture);
						$this->session->set_userdata('sprofileImg', $getUserInfo->u_social_pic);
						$this->session->set_userdata('loginwith','fb');
						$user_id   = $this->session->userdata['user_id'];
						$user_type = $this->session->userdata['usertype'];
						echo json_encode(array('status'=>TRUE,'output'=>'success'));
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'fail-info'));
					}
				}else{
					$email = $_POST['email'];
					$emailChecking = $this->User_model->checkEmailExists($email);
					if($emailChecking=='0'){
						if($email!=""){
							$last_insert_id   = $this->User_model->insertuserinfo($_POST);
							if($last_insert_id!=0){
								$insertedProdiver = $this->User_model->fbaddSocialProvide($userId,$last_insert_id);
								$getUserInfo      = $this->User_model->getUserDetails($last_insert_id);
								$name  = ucfirst($getUserInfo->u_firstname).' '.$getUserInfo->u_lastname;
								$this->session->set_userdata('user_id', $getUserInfo->u_uid);
								$this->session->set_userdata('usertype', 'User');
								$this->session->set_userdata('uname', $name);
								$this->session->set_userdata('uemail', $getUserInfo->u_email);
								$this->session->set_userdata('profileImg', $getUserInfo->u_picture);
								$this->session->set_userdata('sprofileImg', $getUserInfo->u_social_pic);
								$this->session->set_userdata('loginwith','fb');
								$user_id   = $this->session->userdata['user_id'];
								$user_type = $this->session->userdata['usertype'];
								echo json_encode(array('status'=>TRUE,'output'=>'success'));
							}else{
								echo json_encode(array('status'=>FALSE,'output'=>'fail-info'));
							}
						}
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'fail-info'));
					}
				}
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'fail'));
			}
		}
		public function userRegister(){
			if(isset($_POST['uemail']) && $_POST['uemail']!=""){
				$email = strtolower($_POST['uemail']);
				$username = $_POST['username'];
				$emailChecking = $this->User_model->checkEmailExists($email);
				if($emailChecking=='0'){
						$usernameChecking = $this->User_model->checkUserNameExists($username);
						if($usernameChecking=='0'){
						$inserted_id = $this->User_model->insertData($_POST);
						$token    = $this->getUniqueCode('10');
						$token_uid = $token.'_'.$inserted_id;

						//Mail

						$mailDetails = Array();
						$mailDetails['name'] 		= ucfirst($username);
						$mailDetails['regLink'] 	= base_url().'activate-link?revificationid='.$token_uid;
						$config = array (
							'mailtype' => 'html',
							'charset'  => 'utf-8',
							'priority' => '1'
						);
						$this->email->initialize($config);
						$this->load->library('email');
						$from_email = "info@coinenthu.com";
						$to_email   = $email;
						$this->email->from($from_email, 'Coinenthu');
						$this->email->to($to_email);
						$this->email->subject('Registration confirmation.');
						$message = $this->load->view('mail_templates/registration-mail-template',$mailDetails,TRUE);
						$this->email->message($message);
						$this->email->send();
						// echo $message;exit;
						// echo json_encode(array('status'=>TRUE,'output'=>'success','uid'=>$token_uid));
						echo json_encode(array('status'=>TRUE,'output'=>'success'));
					}else{
						echo json_encode(array('status'=>FALSE,'output'=>'failed'));
					}
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'fail'));
				}
			}else{
				echo json_encode(array('status'=>FALSE,'output'=>'fail-info'));
			}
		}
		public function activateLink(){
			if($this->session->userdata('user_id') != "" && $this->session->userdata('usertype') != ""){
				redirect('/', 'refresh');
			}else{
				$data = array();
				$token_uid = explode('_',$_GET['revificationid']);
				if(sizeof($token_uid)>0){
					$data['uid'] = $token_uid[1];
					$this->show('activate-link',$data);
				}else{
					redirect('login', 'refresh');
				}
			}
		}
		public function verifiedAuthReg(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				$uid           = $_POST['uid'];
				$updateStatus  = $this->User_model->updatetheUserStatus($uid);
				echo json_encode(array('status'=>TRUE,'output'=>'success'));
			}else{
				redirect('/', 'refresh');
			}
		}
		public function userLogin(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				$email = strtolower($_POST['uemail']);
				$pwd   = $_POST['upassword'];
				$data  = $this->User_model->userLogin($email,$pwd);
				if(isset($data->u_uid) && $data->u_uid!=""){
					$name  = ucfirst($data->u_username);
					$this->session->set_userdata('user_id', $data->u_uid);
					$this->session->set_userdata('usertype', 'User');
					$this->session->set_userdata('uname', $name);
					$this->session->set_userdata('uemail', $data->u_email);
					$this->session->set_userdata('profileImg', $data->u_picture);
					$this->session->set_userdata('loginwith', $data->u_logged_from);
					$user_id   = $this->session->userdata['user_id'];
					$user_type = $this->session->userdata['usertype'];
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'notsuccess'));
				}
			}else{
				$data = array();
				$this->show('index',$data);
			}
		}
		public function logout()
		{
			$this->session->unset_userdata('token');
			$this->session->unset_userdata('token_secret');
			$this->session->unset_userdata('status');
			$this->session->unset_userdata('userData');
			$this->session->sess_destroy();
			$newdata = array(
				'UserId'  =>'',
				'UserType' => '',
				'Name' => '',
				'Email' => '',
				'logged_in' => FALSE,
			   );

			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
			echo '1';exit;
		}
		function getUniqueCode($length = "")
		{
			$code = md5(uniqid(rand(), true));
			if ($length != "")
			return substr($code, 0, $length);
			else
			return $code;
		}
	}
?>
