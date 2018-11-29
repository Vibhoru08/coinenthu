<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscribe extends MY_Controller {
    public $menucount = array();
	public $isSuperAdmin = 0;
    
    function __construct() {
        parent::__construct();
		$this->load->library(array('email','form_validation','session','pagination'));
        $this->load->database();              
		$this->load->model('Companies_model');
		$this->load->model('Admin_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('email');

    }	
	public function subscribeActions(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();			
			$this->show_admin('admin/subscribe-management',$data);
		}		
	}
	public function getSubscribeList(){
		$result = $this->Admin_model->getSubscribes();
		if(count($result) != 0){
			foreach($result as $key=>$ad){
				$baseUrl = '';
				if(isset($ad->bop_sub_email) && $ad->bop_sub_email != "" )
				{
					$data[$key]['bop_sub_email']  = $ad->bop_sub_email;
				}else{
					$data[$key]['bop_sub_email']  = "";
				}
				if(isset($ad->bop_sub_name) && $ad->bop_sub_name != "" )
				{
					$data[$key]['bop_sub_name']  = $ad->bop_sub_name;
				}else{
					$data[$key]['bop_sub_name']  = "--";
				}
				if(isset($ad->bop_sub_id) && $ad->bop_sub_id != "" )
				{
					$data[$key]['bop_sub_id']  = $ad->bop_sub_id;
				}else{
					$data[$key]['bop_sub_id']  = "";
				}				
				if($ad->bop_sub_status=='1'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
				}else if($ad->bop_sub_status=='2'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Delete" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else if($ad->bop_sub_status=='0'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
				}
				$data[$key]['u_status']          	= 	$fqf_status;
				$whitchPage = "'usermanag'";
				if($ad->bop_sub_status == 1){
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-email/'.$ad->bop_sub_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Hidden" onclick="emailConforms('.$ad->bop_sub_id.',0);" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
											<a href="javascript:void(0);" title="Delete" onclick="emailConforms('.$ad->bop_sub_id.',2);" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else{
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-email/'.$ad->bop_sub_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Live" onclick="emailConforms('.$ad->bop_sub_id.',1);" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
											<a href="javascript:void(0);" title="Delete" onclick="emailConforms('.$ad->bop_sub_id.',2);" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}
			}
			$faqqstns['aaData'] = $data;
		}else{
			$faqqstns['aaData'] = array();		
		}
		echo json_encode($faqqstns); exit;
	}
	public function addEmail(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
				$data = array();
				$this->show_admin('admin/add-email',$data);
			}
		
	}
	public function addEmails(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else if(isset($_POST['email']) && $_POST['email'] != ""){
				$email = $_POST['email'];
				$checkResults = $this->Admin_model->checkEmailExists($email);
				if(isset($checkResults->bop_sub_id) && $checkResults->bop_sub_id!=""){
					echo json_encode(array('status'=>False,'output'=>'emailexists'));
				}else{				
					$addResults = $this->Admin_model->addEmail($_POST);
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}				
			}		
	}
	public function editEmail(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else if(isset($_POST['email']) && $_POST['email']!="" ){				
				$email = $_POST['email'];
				$checkResults = $this->Admin_model->checkEmailExists($email);
				if(count($checkResults)>1){
					echo json_encode(array('status'=>False,'output'=>'emailexists'));
				} else {		
					$res = $this->Admin_model->updateEmail($this->input->post());
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}
		} else {
				$uid = $this->uri->segment('3');
				$data = array();
				$data['subscriberdeatils'] = $this->Admin_model->getSubscriberInfo($uid);
				$this->show_admin('admin/edit-email',$data);				
			}
					
	}
	public function emailActions1()
	{
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$data = $this->Admin_model->email_actions($this->input->post());
		}
	}
	public function sendMail()
	{
		$data = array();
		$this->show_admin('admin/checkbox-management',$data);
	}
	public function getCheckboxList(){
		$result = $this->Admin_model->getCheckboxces();
		if(count($result) != 0){
			foreach($result as $key=>$ad){
				$baseUrl = '';
				if(isset($ad->bop_sub_name) && $ad->bop_sub_name != "" )
				{
					$data[$key]['bop_sub_name']  = $ad->bop_sub_name;
				}else{
					$data[$key]['bop_sub_name']  = "--";
				}
				if(isset($ad->bop_sub_email) && $ad->bop_sub_email != "" )
				{
					$data[$key]['bop_sub_email']  = $ad->bop_sub_email;
				}else{
					$data[$key]['bop_sub_email']  = "";
				}	
				if(isset($ad->bop_sub_email) && $ad->bop_sub_email != "" )
				{
					$data[$key]['check_value']  = '<input type="checkbox" name="chk1[]" id="chk1'.$ad->bop_sub_id.'" class="check" value='.$ad->bop_sub_id.' >';
				}else{
					$data[$key]['check_value']  = "";
				}				
				if($ad->bop_sub_status=='1'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
				}else if($ad->bop_sub_status=='2'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Delete" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else if($ad->bop_sub_status=='0'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
				}
				
			}
			$faqqstns['aaData'] = $data;
		}else{
			$faqqstns['aaData'] = array();		
		}
		echo json_encode($faqqstns); exit;
	}
	public function sendEmail(){
		$data = array();
		$data = $this->Admin_model->getCheckboxces();
		echo json_encode(array('output'=>'success','mailvalues'=>$data));
	}
	public function sendCkeditor(){
		// print_r($_POST);exit;
		$data = array();
		$data['email_ids'] = $_POST['hid'];
		//print_r($data);exit;
		/*$selval = $_POST['hid'];
		//print_r($selval);exit;
		$data1=array();
		$data1 = explode(',',$selval);
		//print_r($data1);exit;
		foreach($data1 as $key=>$selids){
			$getmails = $this->Admin_model->getCheckMails($selids);
			//print_r($getmails);exit;
			if($getmails->bop_sub_name != "" && $getmails->bop_sub_email != "")
			{
				$insertmail = $this->Admin_model->insertSelectedMails($getmails);
			}else{
				echo 'Plese select user emails.';exit;
			}
		} */
		$this->show_admin('admin/ck-editor',$data);
	}
	
	
	public function addmailtemplate(){
		$addtemplateres =  $this->Admin_model->addtemp($_POST);
		$selval = $_POST['hid_val'];
		$data1=array();
		$data1 = explode(',',$selval);
		if(isset($_POST['hid_val']) && $_POST['hid_val'] !="")
		{
			foreach($data1 as $key=>$selids){
				$getmails = $this->Admin_model->getCheckMails($selids);
				if($getmails->bop_sub_email != "")
				{
					$insertmail = $this->Admin_model->insertSelectedMails($getmails,$addtemplateres);
				}
			}
			echo json_encode(array('status'=>1, 'output'=>'success'));
			
		}else{
				echo json_encode(array('output'=>'fail'));
			}		
		
	}
	// public function unsubscribeActions(){
	// 	$getid = $_GET['id'];
	// 	$suburi = base64_decode($getid);
	// 	$unsubscriberes= $this->Admin_model->updateunsubscribeMails($suburi);
	// 	$this->load->view('admin/unsub-mess');	
	// }
	
}