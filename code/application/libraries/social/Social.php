<?php
require APPPATH . '/libraries/social/social_lib/google/Google_Client.php';
require APPPATH . '/libraries/social/social_lib/google/Google_Oauth2Service.php';

	class Social{ 
		function google(){	  
			$client = new Google_Client();
			$client->setApplicationName("Coinenthu");
			$client->setClientId(CLIENT_ID);
			$client->setClientSecret(CLIENT_SECRET);
			$client->setRedirectUri(REDIRECT_URI);
			$client->setApprovalPrompt(APPROVAL_PROMPT);
			$client->setAccessType(ACCESS_TYPE);	
			$oauth2 = new Google_Oauth2Service($client);
			if(isset($_GET['code'])) {
			  $client->authenticate($_GET['code']);
			  $_SESSION['token'] = $client->getAccessToken();
			}
			if (isset($_SESSION['token'])) {
			 $client->setAccessToken($_SESSION['token']);
			}
			if (isset($_REQUEST['error'])) {
			 echo '<script type="text/javascript">window.close();</script>'; exit;
			}
			if($client->getAccessToken()) {
			  $user = $oauth2->userinfo->get();
			  $user['User']=$user;
			  $_SESSION['token'] = $client->getAccessToken();
			  return $user;
			}else{
			  $authUrl = $client->createAuthUrl();
			  header('Location: '.$authUrl);
			
			}
		}
	}
?>