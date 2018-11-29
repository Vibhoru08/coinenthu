<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
    public $menucount = array();
	public $isSuperAdmin = 0;

    function __construct() {
        parent::__construct();
		$this->load->library(array('email','form_validation','session','pagination'));
        $this->load->database();
		$this->load->model('Admin_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('email');

    }
    public function index()
	{
		$data = array();
		$this->load->view('admin/login',$data);
	}
	public function fileUpload()
	{
		print_r($_file);exit;
		$data = array();
		$this->load->view('admin/login',$data);
	}
	/* Admin Login */
	public function adminLogin()
	{
		$data = $this->Admin_model->checkLogin($this->input->post());
		if(count($data) > 0)
		{
			$name = ucfirst($data->u_firstname).' '.$data->u_lastname ;
            $this->session->set_userdata('user_id', $data->u_uid);
            $this->session->set_userdata('usertype', ucfirst($data->ut_name));
            $this->session->set_userdata('uname', $name);
            $this->session->set_userdata('uemail', $data->u_email);
            $this->session->set_userdata('profileImg', $data->u_picture);
            $admin_user_id = $this->session->userdata['user_id'];
            $admin_user_type = $this->session->userdata['usertype'];
			echo json_encode(array('status'=>TRUE,'output'=>'success'));
		}else{
			echo json_encode(array('status'=>False,'output'=>'fail'));
		}
	}
	public function spamEmail(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else if(isset($this->input->post()[u_email]) && $this->input->post()[u_email]!=""){
			$se_email = $this->input->post()[u_email];
			$updateStatus = 0;
			$checkEmailSetting = $this->Admin_model->checkEmailConfig();
			if(isset($checkEmailSetting->se_id) && $checkEmailSetting->se_id!=""){
				$se_id = $checkEmailSetting->se_id;
				$updateStatus = $this->Admin_model->addEmailConfig($se_email,$se_id);
				$updateStatus = 1;
			}else{
				$se_id='';
				$updateStatus = $this->Admin_model->addEmailConfig($se_email,$se_id);
				$updateStatus = 1;
			}
			echo $updateStatus;exit;
		}else{
			$data = array();
			$uid = $this->session->userdata('user_id');
			$data['emailConfig'] = $this->Admin_model->checkEmailConfig();
			$this->show_admin('admin/spam-email',$data);
		}
	}
	public function myDashboard(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else if(isset($this->input->post()[u_firstname]) && $this->input->post()[u_firstname]!=""){
			$updateResult = 0;
			$uid         = $this->session->userdata('user_id');
			$u_firstname = $this->input->post()[u_firstname];
			$u_lastname  = $this->input->post()[u_lastname];
			$u_mobile    = $this->input->post()[u_mobile];
			$name = ucfirst($u_firstname).' '.$u_lastname ;
			$this->session->set_userdata('uname', $name);
			$updateResults = $this->Admin_model->updateAdminProfile($uid,$u_firstname,$u_lastname,$u_mobile);
			$updateResult = $updateResults;
			echo $updateResult;exit;
		}else{
			$data = array();
			$uid = $this->session->userdata('user_id');
			$data['userdetails'] = $this->Admin_model->getProfileInfo($uid);
			$this->show_admin('admin/my-dashboard',$data);
		}
	}
	public function changePassword(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$data = array();
			$this->show_admin('admin/change-password',$data);
		}
	}
	public function updatePassword(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
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
	public function adminLogout()
	{
		$newdata = array(
			'user_id'    =>'',
			'usertype'   => '',
			'uname'      => '',
			'uemail'     => '',
			'profileImg' => '',
			'logged_in'  => FALSE,
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		echo '1';exit;
	}
	/* End Settings & Account */
	/* User Management */
	public function userActions()
	{
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$data = $this->Admin_model->user_actions($this->input->post());
			$data1 = $this->Admin_model->deleteProviders($this->input->post());
			echo $data;exit;
		}
	}
	public function userManagement(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else {
			$data = array();
			$uid = $this->session->userdata('user_id');
			$this->show_admin('admin/user-management',$data);
		}
	}
	public function usersList(){
		$result = $this->Admin_model->getUsersList();
		if(count($result) != 0){
			foreach($result as $key=>$ad){
				$baseUrl = '';
				if(isset($ad->u_firstname) && $ad->u_firstname != "")
				{
					$data[$key]['u_firstname']  = ucfirst($ad->u_firstname).' '.$ad->u_lastname;
				}else{
					$data[$key]['u_firstname']  = "";
				}
				if(isset($ad->u_email) && $ad->u_email != "" && $ad->u_email != 'undefined')
				{
					$data[$key]['u_email']  = $ad->u_email;
				}else{
					$data[$key]['u_email']  = "";
				}
				if(isset($ad->u_mobile) && $ad->u_mobile != "")
				{
					$data[$key]['u_mobile']  = $ad->u_mobile;
				}else{
					$data[$key]['u_mobile']  = "";
				}
				$viewTime = date('Ymd') .'_'. date('His');
				if(isset($ad->u_picture) && $ad->u_picture!=""){
					$imagePath = base_url().'asset/img/users/'.$ad->u_picture.'?id='.$viewTime;
				}else{
					$imagePath = base_url().'images/Felix_the_Cat.jpg';
				}
				$data[$key]['u_picture']  = '<img style="width:60px;height:60px;" class="img-thumbnail" src="'.$imagePath.'">';
				if($ad->u_status=='1'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
				}else if($ad->u_status=='2'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Delete" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else if($ad->u_status=='0'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
				}
				$data[$key]['u_status']          	= 	$fqf_status;
				$whitchPage = "'usermanag'";
				if($ad->u_status == 1){
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-user/'.$ad->u_uid.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Hidden" onclick="userConfirmation('.$ad->u_uid.',0,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
											<a href="javascript:void(0);" title="Delete" onclick="userConfirmation('.$ad->u_uid.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else{
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-user/'.$ad->u_uid.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Live" onclick="userConfirmation('.$ad->u_uid.',1,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
											<a href="javascript:void(0);" title="Delete" onclick="userConfirmation('.$ad->u_uid.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}
			}
			$faqqstns['aaData'] = $data;
		}else{
			$faqqstns['aaData'] = array();
		}
		echo json_encode($faqqstns); exit;
	}
	public function addUser(){
		$this->load->helper(array('common'));
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else if(isset($_POST['u_firstname']) && $_POST['u_firstname']!=""){
			$fileName = $_FILES["uploaded_file"]["name"];
			$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"];
			$target_dir     = base_url().'asset/img/users/';
			$temp           = explode(".", $_FILES['uploaded_file']["name"]);
			$newfilename    = date('Ymd_His') . '.' . end($temp);
			//$target_file     = $target_dir . $newfilename;
			move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], 'asset/img/users/'.$newfilename);
			// move_uploaded_file( $_FILES['uploaded_file']["tmp_name"],$target_file);
			$kaboom = explode(".", $fileName);
			$fileExt = end($kaboom);
			$target_file = 'asset/img/users/'.$newfilename;
			$resized_file = 'asset/img/users/users_'.$newfilename;
			$wmax = 160;
			$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
			$reImage = explode('/',$getImagNames);
			$resizeImg = $reImage[3];
			$u_firstname = $_POST['u_firstname'];
			$u_lastname  = $_POST['u_lastname'];
			$u_username  = $_POST['u_username'];
			$u_email     = $_POST['u_email'];
			$u_password  = $_POST['u_password'];
			$u_mobile    = $_POST['u_mobile'];
			$checkStatus = $this->Admin_model->checkEmailExistsOrNot($u_email);
			if(isset($checkStatus->u_uid) && $checkStatus->u_uid!=""){
				echo json_encode(array('status'=>False,'output'=>'emailexists'));
			}else{
				$updateResults = $this->Admin_model->addUserByAdmin($_POST,$resizeImg);
				$mailDetails = Array();
				$mailDetails['name'] 		= ucfirst($u_firstname).' '.$u_lastname;
				$mailDetails['u_email'] 	= $u_email;
				$mailDetails['u_password'] 	= $u_password;
				$mailDetails['u_mobile'] 	= $u_mobile;
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
				$this->email->subject('You are added by Coinenthu Admin');
				$message = $this->load->view('mail_templates/user-mail-template',$mailDetails,TRUE);
				$this->email->message($message);
				$this->email->send();
				echo json_encode(array('status'=>TRUE,'output'=>'success'));
			}
		}else{
			$data = array();
			$uid = $this->session->userdata('user_id');
			$this->show_admin('admin/add-user',$data);
		}
	}
	public function editUser(){
		$this->load->helper(array('common'));
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else if(isset($_POST['u_firstname']) && $_POST['u_firstname']!=""){
			$fileName = $_FILES["uploaded_file"]["name"];
			$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"];
			$target_dir     = base_url().'asset/img/users/';
			$temp           = explode(".", $_FILES['uploaded_file']["name"]);
			$newfilename    = date('Ymd_His') . '.' . end($temp);
			//$target_file     = $target_dir . $newfilename;
			move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], 'asset/img/users/'.$newfilename);
			// move_uploaded_file( $_FILES['uploaded_file']["tmp_name"],$target_file);
			$kaboom = explode(".", $fileName);
			$fileExt = end($kaboom);
			$target_file = 'asset/img/users/'.$newfilename;
			$resized_file = 'asset/img/users/users_'.$newfilename;
			$wmax = 160;
			$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
			$reImage = explode('/',$getImagNames);
			$resizeImg = $reImage[3];
			$u_firstname = $_POST['u_firstname'];
			$u_lastname  = $_POST['u_lastname'];
			$u_mobile    = $_POST['u_mobile'];
			$u_picture    = $_POST['u_picture'];
			$u_username    = $_POST['u_username'];
			$updateResults = $this->Admin_model->updateUserByAdmin($_POST,$resizeImg);
			echo json_encode(array('status'=>TRUE,'output'=>'success'));
		}else{
			$uid = $this->uri->segment('3');
			$data = array();
			$data['userdeatils'] = $this->Admin_model->getUserInfo($uid);
			$this->show_admin('admin/edit-user',$data);
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
	public function upload_cropcompany_image(){
		// echo "Hai";
		// print_r($_POST);exit;
		$temp 			= 	explode(".", $_FILES["fileCropInp"]["name"]);
		$extension 		= 	strtolower(end($temp));
		switch($extension){
			case 'jpg' :case 'jpeg': case 'jpe': case 'png': case 'gif':
			$tmp  = $_FILES["fileCropInp"]["tmp_name"];
			if(isset($_POST['u_id']) && $_POST['u_id']!=""){
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
	public function upload_company_image(){
		$fileExtentios 	= explode(".", $_POST['imageName']);
		$extention 		= end($fileExtentios);
		if(isset($_POST['u_id']) && $_POST['u_id']!=""){
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
			$croppedNewWidth 	= 	$_POST['croppedNewWidth'];
			$croppedNewHeight 	= 	$_POST['croppedNewHeight'];
			$croppedX 			= 	$_POST['croppedX'];
			$croppedY 			= 	$_POST['croppedY'];

			if($_POST['companyType'] == 1) {
				$imagePath			=	'./asset/img/companies/digital/'.$_POST['imageName'];
			} else if($_POST['companyType'] == 2) {
				$imagePath			=	'./asset/img/companies/ico_trakers/'.$_POST['imageName'];
			}

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
}
