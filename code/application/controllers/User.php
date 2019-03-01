<?php
	class User extends MY_Controller {
		function __construct() {
			parent::__construct();
			$this->load->library(array('email','form_validation','session','pagination'));
			$this->load->database();
			$this->load->model('User_model');
			$this->load->model('Admin_model');
			$this->load->library('pagination');
			$this->load->helper('url');
		}

		public function upload_company_image(){
			$fileExtentios 	= explode(".", $_POST['imageName']);
			$extention 		= end($fileExtentios);
			if(isset($_POST['u_id']) &&  $_POST['u_id'] != ''){
				$uid = $_POST['u_id'];
			}else{
				$uid = $this->session->userdata('user_id');
			}
			switch($extention){
				case 'jpg' :case 'jpeg': case 'jpe': case 'png': case 'gif':
					if($_POST['companyType'] == 1) {
						@unlink('./asset/img/companies/digital/'.$_POST['imageId']);
					} else {
						@unlink('./asset/img/companies/ico_trakers/'.$_POST['imageId']);
					}
				// @unlink('./asset/img/companies/'.$uid.'/logos/'.$_POST['imageId']);
				$croppedNewWidth 	= 	$_POST['croppedNewWidth'];
				$croppedNewHeight 	= 	$_POST['croppedNewHeight'];
				$croppedX 			= 	$_POST['croppedX'];
				$croppedY 			= 	$_POST['croppedY'];


				if($_POST['companyType'] == 1) {
					$imagePath			=	'./asset/img/companies/digital/'.$_POST['imageName'];
				} else if($_POST['companyType'] == 2) {
					$imagePath			=	'./asset/img/companies/ico_trakers/'.$_POST['imageName'];
				}
				// $imagePath			=	'./asset/img/companies/'.$uid.'/logos/'.$_POST['imageName'];

				if($extention == 'png'){
					$src = imagecreatefrompng($imagePath);
				}else{
					$src = imagecreatefromjpeg($imagePath);
				}

				$croppedWidth 	= 	160;
				$croppedHeight 	= 	160;
				list($width,$height)	=	getimagesize($imagePath);
				$tmp					=	imagecreatetruecolor($croppedWidth,$croppedHeight);
				imagealphablending($tmp, false);
				imagesavealpha($tmp, true);
				imagealphablending($src, true);
				imagecopyresampled($tmp,$src,0,0,$croppedX,$croppedY,$croppedWidth,$croppedHeight,$croppedNewWidth,$croppedNewHeight);

				$imageName = $_POST['imageName'];

				if($_POST['companyType'] == 1) {
					$newfilenamePath = './asset/img/companies/digital/'.$imageName;
				} else if($_POST['companyType'] == 2) {
					$newfilenamePath = './asset/img/companies/ico_trakers/'.$imageName;
				}
				// $newfilenamePath = './asset/img/companies/'.$uid.'/logos/'.$imageName;

				if($extention == 'png'){
					imagepng($tmp,$newfilenamePath);
				}else{
					imagejpeg($tmp,$newfilenamePath,100);
				}

				imagedestroy($tmp);
				imagedestroy($src);

				$data['output'] = '1';
				$data['imageName'] = $imageName;
				echo json_encode($data);exit;
				break;
				default:

				$data['output'] = '0';
				$data['message'] = 'The given extention is not allowed.';
				echo json_encode($data);exit;
				break;
			}
		}
		public function upload_cropcompany_image(){
					// print_r($_POST);exit;

			$temp 			= 	explode(".", $_FILES["fileCropInp"]["name"]);
			$extension 		= 	strtolower(end($temp));
			switch($extension){
					case 'jpg' :case 'jpeg': case 'jpe': case 'png': case 'gif':
					$tmp  = $_FILES["fileCropInp"]["tmp_name"];
					$name = date('Ymd') ."_". date("His");
					if(isset($_POST['u_id']) &&  $_POST['u_id'] != ''){
						$uid = $_POST['u_id'];
					}else{
						$uid = $this->session->userdata('user_id');
					}
					if($_POST['companyType'] == 1) {
						chmod('./asset/img/companies/digital', 0777);
						$path   = './asset/img/companies/digital';
						$name = 'digital_'.date('Ymd') ."_". date("His");
						$newfilenamePath = './asset/img/companies/digital/'.$name;
					} else if ($_POST['companyType'] == 2) {
						chmod('./asset/img/companies/ico_trakers', 0777);
						$path   = './asset/img/companies/ico_trakers';
						$name = 'ico_trakers_'.date('Ymd') ."_". date("His");
						$newfilenamePath = './asset/img/companies/ico_trakers/'.$name;
					}
					if (!is_dir($path)) { //create the folder if it's not already exists
						mkdir($path, 0755, TRUE);
					}
					$img_info 	= getimagesize($tmp);
					$width 		= $img_info[0];
					$height 	= $img_info[1];
					$src 		= @imagecreatefromstring(file_get_contents($tmp));

					//Rotate Image
					$exif = @exif_read_data($tmp);
					if(!empty($exif['Orientation'])) {

						switch($exif['Orientation']) {
							case 8:
								$width 		= $img_info[1];
								$height 	= $img_info[0];
								$src = @imagerotate($src,90,0);
								break;
							case 3:
								$width 		= $img_info[0];
								$height 	= $img_info[1];
								$src = @imagerotate($src,180,0);
								break;
							case 6:
								$width 		= $img_info[1];
								$height 	= $img_info[0];
								$src = @imagerotate($src,-90,0);
								break;
						}
					}
					//End

					if($extension == 'png'){
						$tmpp = imagecreatetruecolor($width, $height);
						imagealphablending($tmpp, false);
						imagesavealpha($tmpp, true);
						$source = imagecreatefrompng($_FILES["fileCropInp"]["tmp_name"]);
						imagealphablending($source, true);
						imagecopyresampled($tmpp, $source, 0, 0, 0, 0, $width, $height, $width, $height);
						imagepng($tmpp, $newfilenamePath.".png");
						$finalFileName = ".png";
					}else{
						$tmpp = imagecreatetruecolor($width, $height);
						imagealphablending($tmpp, false);
						imagesavealpha($tmpp, true);
						imagealphablending($src, true);
						imagecopyresampled($tmpp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
						imagejpeg($tmpp, $newfilenamePath.".jpg");
						$finalFileName = ".jpg";
					}

					/* return new JsonModel(array(
						'imageName' => 	$name.$finalFileName

					)); */
					$data['imageName'] = $name.$finalFileName;
					echo json_encode($data);exit;
					break;
					default:
					/* return new JsonModel(array(
						'message'  		=> 'The given extention is not allowed.'
					)); */
					$data['message'] = 'The given extention is not allowed.';
				echo json_encode($data);exit;
				break;
			}
		}

		public function updateUserProfile(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				if(isset($_POST['u_username'])){
					$u_firstname = $_POST['u_firstname'];
					$u_lastname  = $_POST['u_lastname'];
					$u_username  = $_POST['u_username'];
					$u_about = $_POST['u_about'];
					$u_picture   = $_POST['u_picture'];
					$uid = $_SESSION["user_id"];
					$updateResults = $this->User_model->updateProfile($uid,$_POST);
					$data          = $this->User_model->getUserDetails($uid);
					$name  = ucfirst($data->u_username);
					$this->session->set_userdata('user_id', $data->u_uid);
					$this->session->set_userdata('usertype', 'User');
					$this->session->set_userdata('uname', $name);
					$this->session->set_userdata('uemail', $data->u_email);
					$this->session->set_userdata('profileImg', $data->u_picture);
					$user_id   = $this->session->userdata['user_id'];
					$user_type = $this->session->userdata['usertype'];
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}else{
					echo json_encode(array('status'=>FALSE,'output'=>'fail'));
				}
			}
		}
		public function editProfile(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				$data = array();
				$u_uid = $_SESSION["user_id"];
				$data['userinfo'] = $this->User_model->getUserDetails($u_uid);
				$this->show('edit-profile',$data);
			}
		}
		public function showProfile(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login','refresh');
			}else{
				$this->load->helper(array('common'));
				$data = array();
				$u_uid = $_SESSION["user_id"];
				$user_review_details = $this->Companies_model->userReviews($u_uid);
				$no_of_reviews = $user_review_details->num_rows();
				$total_review_upvotes = 0;
				$total_reply_upvotes = 0;
				foreach($user_review_details->result_array() as $row){
					if(isset($row['re_likes_cnt'])){
						$review_likes_cnt = $row['re_likes_cnt'];
					}
					else{
						$review_likes_cnt = 0;
					}
					$total_review_upvotes = $total_review_upvotes + $review_likes_cnt;
				}
				$user_reply_details = $this->Companies_model->userReplies($u_uid);
				$no_of_replies = $user_reply_details->num_rows();
				foreach($user_reply_details->result_array() as $row){
					if(isset($row['crr_likes_cnt'])){
						$reply_likes_cnt = $row['crr_likes_cnt'];
					}
					else{
						$reply_likes_cnt = 0;
					}
					$total_reply_upvotes = $total_reply_upvotes + $reply_likes_cnt;
				}
				$total_upvotes = $total_review_upvotes + $total_reply_upvotes;
				$data['nore'] = $no_of_replies;
				$data['nou'] = $total_upvotes;
				$data['nor'] = $no_of_reviews;
				$data['userinfo'] = $this->User_model->getUserDetails($u_uid);
				$config = array();
				$config['base_url'] = base_url().'display-profile';
				$config['total_rows'] = $this->User_model->myProfileReviewCount($u_uid);
				$config['per_page'] = 5;
				$config["uri_segment"] = 2;
				$config['num_links'] = 2;
				//sample
				$config['display_pages'] =TRUE;
				$config['use_page_numbers'] =TRUE;
				$config['full_tag_open'] = '<ul class="pagination">';
				$config['full_tag_close'] = '</ul>';
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['first_tag_open'] = '<li>';
				$config['first_tag_close'] = '</li>';
				$config['prev_link'] = '&laquo';
				$config['prev_tag_open'] = '<li class="prev">';
				$config['prev_tag_close'] = '</li>';
				$config['next_link'] = '&raquo';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				$config['last_tag_open'] = '<li>';
				$config['last_tag_close'] = '</li>';
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
				if($page > 0){
					$start=($page-1)*$config["per_page"];
				}else{
					$start = $page;
				}
				$data['reviews'] = array();
				$data['replies'] = array();
				$reviewlist = $this->User_model->myProfileReviewPagi($config["per_page"],$start,$u_uid);
					$data['links'] = $this->pagination->create_links();
				foreach($reviewlist as $cr=>$review){
					$data['reviews'][$cr] = $review;
					$data['replies'][$review->re_id] = $this->User_model->myProfileReplies($review->re_id);
					foreach($data['replies'][$review->re_id] as $crr=>$reply){
						$data['replies'][$review->re_id][$crr] = $reply;
					}
				}
				$this->show('display-profile',$data);
			}
		}

		public function viewProfile()
		{
				$this->load->helper(array('common'));
				$data = array();
				$username = $this->uri->segment(2); 
				$u_uid = $_SESSION["user_id"];
				$data['current_userinfo'] = $this->User_model->getUserDetails($u_uid);
				$data['userinfo'] = $this->User_model->getUserDetailsFromUsername($username);
				if(isset($data['userinfo'])){
				if($username != $data['current_userinfo']->u_username){
					$user_review_details = $this->Companies_model->userReviewsFromUsername($username);
					$no_of_reviews = $user_review_details->num_rows();
					$total_review_upvotes = 0;
					$total_reply_upvotes = 0;
					foreach($user_review_details->result_array() as $row){
						if(isset($row['re_likes_cnt'])){
							$review_likes_cnt = $row['re_likes_cnt'];
						}
						else{
							$review_likes_cnt = 0;
						}
						$total_review_upvotes = $total_review_upvotes + $review_likes_cnt;
					}
					$user_reply_details = $this->Companies_model->userRepliesFromUsername($username);
					$no_of_replies = $user_reply_details->num_rows();
					foreach($user_reply_details->result_array() as $row){
						if(isset($row['crr_likes_cnt'])){
							$reply_likes_cnt = $row['crr_likes_cnt'];
						}
						else{
							$reply_likes_cnt = 0;
						}
						$total_reply_upvotes = $total_reply_upvotes + $reply_likes_cnt;
					}
					$total_upvotes = $total_review_upvotes + $total_reply_upvotes;
					$data['nore'] = $no_of_replies;
					$data['nou'] = $total_upvotes;
					$data['nor'] = $no_of_reviews;
					$user_id = $data['userinfo']->u_uid;
					$data['type'] = 'other';
					$config = array();
					$config['base_url'] = base_url().'Profile/'.$username;
					$config['total_rows'] = $this->User_model->myProfileReviewCount($user_id);
					$config['per_page'] = 5;
					$config["uri_segment"] = 3;
					$config['num_links'] = 2;
					//sample
					$config['display_pages'] =TRUE;
					$config['use_page_numbers'] =TRUE;
					$config['full_tag_open'] = '<ul class="pagination">';
					$config['full_tag_close'] = '</ul>';
					$config['first_link'] = false;
					$config['last_link'] = false;
					$config['first_tag_open'] = '<li>';
					$config['first_tag_close'] = '</li>';
					$config['prev_link'] = '&laquo';
					$config['prev_tag_open'] = '<li class="prev">';
					$config['prev_tag_close'] = '</li>';
					$config['next_link'] = '&raquo';
					$config['next_tag_open'] = '<li>';
					$config['next_tag_close'] = '</li>';
					$config['last_tag_open'] = '<li>';
					$config['last_tag_close'] = '</li>';
					$config['cur_tag_open'] = '<li class="active"><a href="#">';
					$config['cur_tag_close'] = '</a></li>';
					$config['num_tag_open'] = '<li>';
					$config['num_tag_close'] = '</li>';
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					if($page > 0){
						$start=($page-1)*$config["per_page"];
					}else{
						$start = $page;
					}
					$data['reviews'] = array();
					$data['replies'] = array();
					$reviewlist = $this->User_model->myProfileReviewPagi($config["per_page"],$start,$user_id);
					$data['links'] = $this->pagination->create_links();
					foreach($reviewlist as $cr=>$review){
						$data['reviews'][$cr] = $review;
						$data['replies'][$review->re_id] = $this->User_model->myProfileReplies($review->re_id);
						foreach($data['replies'][$review->re_id] as $crr=>$reply){
							$data['replies'][$review->re_id][$crr] = $reply;
						}
					}
					$this->show('display-profile',$data);
				}else{
				redirect(base_url().'display-profile');
				}
				}else{
					show_404();
				}
		}

		public function upload_profile_image(){
			$fileExtentios 	= explode(".", $_POST['imageName']);
			$extention 		= end($fileExtentios);
			switch($extention){
				case 'jpg' :case 'jpeg': case 'jpe': case 'png': case 'gif':
				@unlink('./asset/img/users/'.$_POST['imageId']);
				$croppedNewWidth 	= 	$_POST['croppedNewWidth'];
				$croppedNewHeight 	= 	$_POST['croppedNewHeight'];
				$croppedX 			= 	$_POST['croppedX'];
				$croppedY 			= 	$_POST['croppedY'];

				$imagePath			=	'./asset/img/users/'.$_POST['imageName'];

				if($extention == 'png'){
					$src = imagecreatefrompng($imagePath);
				}else{
					$src = imagecreatefromjpeg($imagePath);
				}

				$croppedWidth 	= 	160;
				$croppedHeight 	= 	160;
				list($width,$height)	=	getimagesize($imagePath);
				$tmp					=	imagecreatetruecolor($croppedWidth,$croppedHeight);
				imagealphablending($tmp, false);
				imagesavealpha($tmp, true);
				imagealphablending($src, true);
				imagecopyresampled($tmp,$src,0,0,$croppedX,$croppedY,$croppedWidth,$croppedHeight,$croppedNewWidth,$croppedNewHeight);

				$imageName = $_POST['imageName'];

				$newfilenamePath = "./asset/img/users/".$imageName;

				if($extention == 'png'){
					imagepng($tmp,$newfilenamePath);
				}else{
					imagejpeg($tmp,$newfilenamePath,100);
				}

				imagedestroy($tmp);
				imagedestroy($src);

				$data['output'] = '1';
				$data['imageName'] = $imageName;
				echo json_encode($data);exit;
				break;
				default:

				$data['output'] = '0';
				$data['message'] = 'The given extention is not allowed.';
				echo json_encode($data);exit;
				break;
			}
		}
		public function upload_crop_image(){
			$temp 			= 	explode(".", $_FILES["fileCropInp"]["name"]);
			$extension 		= 	strtolower(end($temp));
			switch($extension){
				case 'jpg' :case 'jpeg': case 'jpe': case 'png': case 'gif':
				$tmp  = $_FILES["fileCropInp"]["tmp_name"];
				$name = date('Ymd') ."_". date("His");
				$newfilenamePath = "./asset/img/users/".$name;
				$img_info 	= getimagesize($tmp);
				$width 		= $img_info[0];
				$height 	= $img_info[1];
				$src 		= @imagecreatefromstring(file_get_contents($tmp));

				//Rotate Image
				$exif = @exif_read_data($tmp);
				if(!empty($exif['Orientation'])) {

					switch($exif['Orientation']) {
						case 8:
							$width 		= $img_info[1];
							$height 	= $img_info[0];
							$src = @imagerotate($src,90,0);
							break;
						case 3:
							$width 		= $img_info[0];
							$height 	= $img_info[1];
							$src = @imagerotate($src,180,0);
							break;
						case 6:
							$width 		= $img_info[1];
							$height 	= $img_info[0];
							$src = @imagerotate($src,-90,0);
							break;
					}
				}
				//End

				if($extension == 'png'){
					$tmpp = imagecreatetruecolor($width, $height);
					imagealphablending($tmpp, false);
					imagesavealpha($tmpp, true);
					$source = imagecreatefrompng($_FILES["fileCropInp"]["tmp_name"]);
					imagealphablending($source, true);
					imagecopyresampled($tmpp, $source, 0, 0, 0, 0, $width, $height, $width, $height);
					imagepng($tmpp, $newfilenamePath.".png");
					$finalFileName = ".png";
				}else{
					$tmpp = imagecreatetruecolor($width, $height);
					imagealphablending($tmpp, false);
					imagesavealpha($tmpp, true);
					imagealphablending($src, true);
					imagecopyresampled($tmpp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
					imagejpeg($tmpp, $newfilenamePath.".jpg");
					$finalFileName = ".jpg";
				}

				/* return new JsonModel(array(
					'imageName' => 	$name.$finalFileName

				)); */
				$data['imageName'] = $name.$finalFileName;
				echo json_encode($data);exit;
				break;
				default:
				/* return new JsonModel(array(
					'message'  		=> 'The given extention is not allowed.'
				)); */
				$data['message'] = 'The given extention is not allowed.';
				echo json_encode($data);exit;
				break;
			}
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
		public function updatePassword(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('login', 'refresh');
		}else{
			$data = array();
			$updateResult =0;
			$uid = $this->session->userdata('user_id');
			$cpwd = $this->input->post()[currentPass];
			$pwd = $this->input->post()[newPass];
			$data = $this->Admin_model->checkPassword($uid,$cpwd);
			if(isset($data->u_uid) && $data->u_uid!=""){
				$uid = $data->u_uid;
				$updateResults = $this->Admin_model->updatePassword($uid,$pwd);
				$updateResult = $updateResults;
			}else{
				$updateResult = 0;
			}
			echo $updateResult;exit;
		}
	}
		public function changePassword(){
			$data = array();
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				$this->show('change-password',$data);
			}
		}


		public function unsubscribeActions(){
			$getid = $_GET['id'];
			$suburi = base64_decode($getid);
			$unsubscriberes= $this->Admin_model->updateunsubscribeMails($suburi);
			$this->load->view('unsub-mess');
		}

		public function cronActions(){
			$data = array();
			$data['subscriberres']= $this->Admin_model->getselectedEmails();
			$this->load->view('cron-page',$data);
		}
	}
?>
