<?php
class Careers extends MY_Controller {
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
		$limit    = 2;
		$offset   = 0;
		$data['getCareers'] = $this->User_model->getCareers($limit,$offset);
		$data['totCreerRecord'] = $this->User_model->totalCountCareers();
		$this->show('careers',$data);
	}
	public function loadmoreCareers(){
		// print_r($_POST);exit;
		$html= "";
		$checkRecords = 0;
		$cnt = 0;
		$counts = "";
		$checkQuery = '';
		$reviewsCompcount = Array();
		if(isset($_POST['limitpage']) && $_POST['limitpage']!=""){
			$limit   = $_POST['limitpage'];
			$offset  = $_POST['offsetpage'];
			$getCarers = $this->User_model->getRemainingcareers($limit,$offset);
			$counts = $this->User_model->getSearchCareerCounts();
			//echo count($counts);exit;
		}

		if(sizeof($getCarers)>0){
			$checkRecords =1;
			$i = $offset + 1;
			$html = '';
			foreach($getCarers as $key=>$value){
				$html .= '
						<tr>
						<td> <p><p>'.$i. '. &nbsp;
						Role - '.ucfirst($value->bop_job_title).'</p></p><p>Description – '.ucfirst($value->bop_job_description).'</p>
						<p>Qualifications – '.ucfirst($value->bop_job_qualification).'</p></td>
						</tr>
						';
						$i++;
			}
			echo json_encode(array('status'=>TRUE,'output'=>'success','resData'=>$html,'cnt'=>count($counts)));exit;
		}else{
			echo json_encode(array('status'=>TRUE,'output'=>'norecoreds','resData'=>$html,'cnt'=>count($counts)));exit;

		}
	}

	public function viewdonate()
	{
		$data = array();
		$this->show('donetes',$data);
	}
	public function getContries(){
		$html ="";
		$getCountries = $this->User_model->getCountries();
		$html .= '<option value="">-Please Select-</option>';
		if(count($getCountries) && is_array($getCountries)){
			usort($getCountries);
			foreach($getCountries as $country){
				$html .= "<option value='$country->id'>$country->name
				</option>";
			}
			echo json_encode(array('status'=>1,'countries'=>$html));exit;
		}else{
			echo json_encode(array('status'=>0,'countries'=>$html));exit;
		}
	}
	public function contactUs()
	{
		$data = array();
		$this->show('contact-us',$data);
	}
	public function contactMail(){
		if(isset($_POST['email']) && $_POST['email']!=""){
			$email = $_POST['email'];
			$type = $_POST['type'];
			$message_sub = $_POST['message_sub'];
			$body = $_POST['body'];
			//Mail
			$mailDetails = Array();
			$mailDetails['type'] 		= $type;
			$mailDetails['message_sub'] = $message_sub;
			$mailDetails['email'] 		= $email;
			$mailDetails['body'] 		= $body;
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
			);
			$this->email->initialize($config);
			$this->load->library('email');
			$from_email = $email;
			//$to_email   = 'info@coinenthu.com';
			$to_email   = 'info@coinenthu.com';
			$this->email->from($from_email, 'Coinenthu');
			$this->email->to($to_email);
			$this->email->subject($message_sub);
			$message = $this->load->view('mail_templates/contact-us-mail-template',$mailDetails,TRUE);
			$this->email->message($message);
			$this->email->send();
			// echo $message;exit;
			echo json_encode(array('status'=>TRUE,'output'=>'success'));
		}else{
			echo json_encode(array('status'=>FALSE,'output'=>'failed'));
		}
	}
	public function feedbackMail(){
		if(isset($_POST['feedbackemail']) && $_POST['feedbackemail']!=""){
			$email     = $_POST['feedbackemail'];
			$comments  = $_POST['comments'];
			$countryid = $_POST['countryid'];
			$getCountryName = $this->User_model->getCountryName($countryid);
			if(isset($getCountryName->name) && $getCountryName->name!=""){
				$countryName = ucfirst($getCountryName->name);
			}else{
				$countryName = "";
			}
			//Mail
			$mailDetails = Array();
			$mailDetails['comments'] = $comments;
			$mailDetails['cname']     = $countryName;
			$mailDetails['email'] 	 = $email;
			$config = array (
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
			);
			$this->email->initialize($config);
			$this->load->library('email');
			$from_email = $email;
			$to_email   = 'info@coinenthu.com';
			//$to_email   = 'syaramala@aapthitech.com';
			$this->email->from($from_email, 'Coinenthu');
			$this->email->to($to_email);
			$this->email->subject('feedback to Coinenthu');
			$message = $this->load->view('mail_templates/feedback-mail-template',$mailDetails,TRUE);
			$this->email->message($message);
			$this->email->send();
			// echo $message;exit;
			echo json_encode(array('status'=>TRUE,'output'=>'success'));
		}else{
			echo json_encode(array('status'=>FALSE,'output'=>'failed'));
		}
	}
	public function addEmail()
	{
		$data = array();
		$this->show('add-eamil',$data);
	}
	public function addEmails(){
		if(isset($_POST['email']) && $_POST['email']!=""){
			$checkEmail = $this->User_model->checkEmail($_POST);
			if($checkEmail == "") {
				$addResults = $this->User_model->add_Email($_POST);
				echo json_encode(array('status'=>TRUE,'output'=>'success'));

			} else {
				$updateEmail = $this->User_model->updateSubscribe($_POST);
				if ($updateEmail != 0) {
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}
			}
		}else{
			echo json_encode(array('status'=>FALSE,'output'=>'failed'));
		}
	}

	public function commingSoon()
	{
		# code...
		$data = array();
		$this->show('comming-soon',$data);
	}
}
?>
