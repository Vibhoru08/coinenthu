<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends MY_Controller {
    public $menucount = array();
	public $isSuperAdmin = 0;
    
    function __construct() {
        parent::__construct();
		$this->load->library(array('email','form_validation','session','pagination'));
        $this->load->database();              
		$this->load->model('Companies_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('email');

    }
	public function reviewsReplies(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			$data['companies'] = $this->Companies_model->getAllCompanies();
			$this->show_admin('admin/reviews-replies',$data);
		}
	}
	public function updateReview(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$editreview = array();
			if(isset($_POST["re_id"]) & $_POST["re_id"]!=""){
				$explodData = explode('####',$_POST["re_id"]);
				$re_id      = $explodData[0];
				$re_cmid    = $explodData[1];
				$re_rating  = $_POST["re_rating"];
				$re_decript = $_POST["re_decript"];	
				// $re_rating  = $re_rating;
				$re_rating  = $re_rating/2;
				$updateStatus = $this->Companies_model->updateReview($re_id,$re_decript,$re_rating);
				// Update Company rating average				
				$re_cmid  = $_POST["re_cmid"];
				$ratingv  = 0;
				$getCRRating = $this->Companies_model->getCompanyReviewRating($re_cmid);
				if(count($getCRRating)>0){
					foreach($getCRRating as $rRating){
						$ratingv += $rRating->re_rating;
					}
					$companyAvrgRating = $ratingv/count($getCRRating);
				}else{
					$companyAvrgRating = 0;
				}
				$companyAvrgRating = round($companyAvrgRating,1, PHP_ROUND_HALF_UP);
				$updateRating = $this->Companies_model->updateCompanyOverallRating($re_cmid,$companyAvrgRating);
				$reviewA  = 0;
				$getCRReviews = $this->Companies_model->getCompanyReviewReviews($re_cmid);
				if(count($getCRReviews)>0){					
					$reviewA = count($getCRReviews);
				}				
				$updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
				echo json_encode(array('status'=>'1','output'=>"success"));exit;
			}
		}
	}
	public function editReview(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$editreview = array();
			if(isset($_GET["re_id"]) & $_GET["re_id"]!=""){
				$re_id = $_GET["re_id"];
				$editreview = $this->Companies_model->editReview($re_id);
				echo json_encode(array('status'=>'1','reviewDeatils'=>$editreview));exit;
			}
		}
	}
	public function updateReviewReply(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$editreview = array();
			if(isset($_POST["crr_id"]) & $_POST["crr_id"]!=""){
				$crr_id      = $_POST["crr_id"];
				$crr_decript = $_POST["crr_decript"];
				$updateStatus = $this->Companies_model->updateReviewReply($crr_id,$crr_decript);				
				echo json_encode(array('status'=>'1','output'=>"success"));exit;
			}
		}
	}
	public function editReviewReply(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$editreview = array();
			if(isset($_GET["crr_id"]) & $_GET["crr_id"]!=""){
				$crr_id = $_GET["crr_id"];
				$editreview = $this->Companies_model->editReviewReply($crr_id);
				echo json_encode(array('status'=>'1','reviewDeatils'=>$editreview));exit;
			}
		}
	}
	public function reviewsRepliesList(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			if(isset($_GET['cmid']) && $_GET['cmid']=="all"){	
				$cmid = 0;
			}else{
				$cmid = $_GET['cmid'];
			}
			if(isset($_GET['reportState']) && $_GET['reportState']=="all"){	
				$reportState = 0;
			}else{
				$reportState = $_GET['reportState'];
			}
			$reviewReplies = $this->Companies_model->ReviewsReplies($cmid,$reportState);
			if(count($reviewReplies) != 0){
				foreach($reviewReplies as $key=>$rrRes){
					if(isset($rrRes->u_firstname) && $rrRes->u_firstname != "")
					{
						$data[$key]['u_firstname']  = ucfirst($rrRes->u_firstname);
					}else{
						$data[$key]['u_firstname']  = "";
					}
					if(isset($rrRes->re_decript) && $rrRes->re_decript != "")
					{
						$data[$key]['re_decript']  = $rrRes->re_decript;
					}else{
						$data[$key]['re_decript']  = "";
					}
					if(isset($rrRes->crr_decript) && $rrRes->crr_decript != "")
					{
						$data[$key]['crr_decript']  = $rrRes->crr_decript;
					}else{
						$data[$key]['crr_decript']  = "";
					}
					if(isset($rrRes->crr_rating) && $rrRes->crr_rating != "")
					{
						$data[$key]['crr_rating']  = $rrRes->crr_rating;
					}else{
						$data[$key]['crr_rating']  = "";
					}
					if(isset($rrRes->crr_likes_cnt) && $rrRes->crr_likes_cnt != "")
					{
						$data[$key]['crr_likes_cnt']  = $rrRes->crr_likes_cnt;
					}else{
						$data[$key]['crr_likes_cnt']  = "";
					}
					if(isset($rrRes->crr_dislike_cnt) && $rrRes->crr_dislike_cnt != "")
					{
						$data[$key]['crr_dislike_cnt']  = $rrRes->crr_dislike_cnt;
					}else{
						$data[$key]['crr_dislike_cnt']  = "";
					}
					// if(isset($rrRes->crr_reports_cnt) && $rrRes->crr_reports_cnt != "")
					// {
						// $data[$key]['crr_reports_cnt']  = $rrRes->crr_reports_cnt;
					// }else{
						// $data[$key]['crr_reports_cnt']  = "";
					// }
					if($rrRes->crr_status=='1'){
						$crr_status	='<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
					}else if($rrRes->crr_status=='0'){
						$crr_status	='<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
					}
					$data[$key]['crr_status']= $crr_status;
					$whitchPage ="'reviewsReply'";
					if($rrRes->crr_status=='1'){
						$data[$key]['action']   = '<a href="javascript:void(0);" onClick="editReply('.$rrRes->crr_id.')" title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
						<a href="javascript:void(0);" title="Hidden" onclick="reviewReplyStatus('.$rrRes->crr_id.',0,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
						<a href="javascript:void(0);" title="Delete" onclick="reviewStatus('.$rrRes->crr_id.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}else{
						$data[$key]['action']   = '<a href="javascript:void(0);" onClick="editReply('.$rrRes->crr_id.')" title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
						<a href="javascript:void(0);" title="Live" onclick="reviewReplyStatus('.$rrRes->crr_id.',1,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
						<a href="javascript:void(0);" title="Delete" onclick="reviewStatus('.$rrRes->crr_id.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}
				}
				$faqqstns['aaData'] = $data;
			}else{
				$faqqstns['aaData'] = array();		
			}
			echo json_encode($faqqstns); exit;
		}
	}
	public function companyReviews(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{	
			$data = array();
			$data['companies'] = $this->Companies_model->getAllCompanies();
			$this->show_admin('admin/company-reviews',$data);
		}
	}
	public function reviewStatus(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{	
			if(isset($_POST['id']) && $_POST['id']!=""){
				$explodData = explode('####',$_POST["id"]);
				$re_id   = $explodData[0];
				$re_cmid = $explodData[1];
				$statusMode = $_POST['statusMode'];
				if($statusMode==2){
					$reviewReplies = $this->Companies_model->deleteReviewStatus($re_id,$statusMode);
				}else{
					$reviewReplies = $this->Companies_model->updateReviewStatus($re_id,$statusMode);
				}
				// $reInfo = $this->Companies_model->getReviewInfo($re_id,$statusMode);
				// if(isset($reInfo->re_cmid) && $reInfo->re_cmid!=""){
					// $re_cmid = $reInfo->re_cmid;
					// $reviewA  = 0;
					// $getCRReviews = $this->Companies_model->getCompanyReviewReviews($re_cmid);
					// if(count($getCRReviews)>0){					
						// $reviewA = count($getCRReviews);
					// }				
					// $updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
				// }
				$ratingv  = 0;
				$getCRRating = $this->Companies_model->getCompanyReviewRating($re_cmid);
				if(count($getCRRating)>0){
					foreach($getCRRating as $rRating){
						$ratingv += $rRating->re_rating;
					}
					$companyAvrgRating = $ratingv/count($getCRRating);
				}else{
					$companyAvrgRating = 0;
				}
				$companyAvrgRating = round($companyAvrgRating,1, PHP_ROUND_HALF_UP);
				$updateRating = $this->Companies_model->updateCompanyOverallRating($re_cmid,$companyAvrgRating);
				$reviewA  = 0;
				$getCRReviews = $this->Companies_model->getCompanyReviewReviews($re_cmid);
				if(count($getCRReviews)>0){					
					$reviewA = count($getCRReviews);
				}				
				$updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
			}
		}
	}
	public function replyStatus(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{	
			if(isset($_POST['id']) && $_POST['id']!=""){
				$crr_id      = $_POST['id'];
				$statusMode = $_POST['statusMode'];
				if($statusMode==2){
					$reviewReplies = $this->Companies_model->deleteReplyStatus($crr_id,$statusMode);
				}else{
					$reviewReplies = $this->Companies_model->updateReplyStatus($crr_id,$statusMode);
				}
			}
		}
	}
	public function reviewsList(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			if(isset($_GET['cmid']) && $_GET['cmid']=="all"){	
				$cmid = 0;
			}else{
				$cmid = $_GET['cmid'];
			}
			if(isset($_GET['reportState']) && $_GET['reportState']=="all"){	
				$reportState = 0;
			}else{
				$reportState = $_GET['reportState'];
			}
			$reviewReplies = $this->Companies_model->CompanyReviews($cmid,$reportState);
			if(count($reviewReplies) != 0){
				foreach($reviewReplies as $key=>$rrRes){
					if(isset($rrRes->u_firstname) && $rrRes->u_firstname != "")
					{
						$data[$key]['u_firstname']  = ucfirst($rrRes->u_firstname);
					}else{
						$data[$key]['u_firstname']  = "";
					}
					if(isset($rrRes->cm_name) && $rrRes->cm_name != "")
					{
						$data[$key]['cm_name']  = ucfirst($rrRes->cm_name);
					}else{
						$data[$key]['cm_name']  = "";
					}
					if(isset($rrRes->re_decript) && $rrRes->re_decript != "")
					{
						$data[$key]['re_decript']  = $rrRes->re_decript;
					}else{
						$data[$key]['re_decript']  = "";
					}					
					if(isset($rrRes->re_rating) && $rrRes->re_rating != "")
					{
						$data[$key]['re_rating']  = $rrRes->re_rating;
					}else{
						$data[$key]['re_rating']  = "";
					}
					if(isset($rrRes->re_likes_cnt) && $rrRes->re_likes_cnt != "")
					{
						$data[$key]['re_likes_cnt']  = $rrRes->re_likes_cnt;
					}else{
						$data[$key]['re_likes_cnt']  = "";
					}
					if(isset($rrRes->re_dislike_cnt) && $rrRes->re_dislike_cnt != "")
					{
						$data[$key]['re_dislike_cnt']  = $rrRes->re_dislike_cnt;
					}else{
						$data[$key]['re_dislike_cnt']  = "";
					}
					// if(isset($rrRes->re_reports_cnt) && $rrRes->re_reports_cnt != "")
					// {
						// $data[$key]['re_reports_cnt']  = $rrRes->re_reports_cnt;
					// }else{
						// $data[$key]['re_reports_cnt']  = "";
					// }
					if($rrRes->re_status=='1'){
						$re_status	='<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
					}else if($rrRes->re_status=='0'){
						$re_status	='<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
					}else if($rrRes->re_status=='2'){
						$re_status	='<a href="javascript:void(0);" title="Waiting Approval" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-circle-o"></i></a>';
					}
					$data[$key]['re_status']= $re_status;
					$whitchPage = "'reviewsList'";
					$ids = "'".$rrRes->re_id.'####'.$rrRes->re_cmid."'";
					if($rrRes->re_status=='1'){
						$data[$key]['action']   = '<a href="javascript:void(0);" onClick="editReview('.$ids.')" title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
						<a href="javascript:void(0);" title="Hidden" onclick="reviewStatus('.$ids.',0,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
						<a href="javascript:void(0);" title="Delete" onclick="reviewStatus('.$ids.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}else{
						$data[$key]['action']   = '<a href="javascript:void(0);" onClick="editReview('.$ids.')" title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
						<a href="javascript:void(0);" title="Live" onclick="reviewStatus('.$ids.',1,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
						<a href="javascript:void(0);" title="Delete" onclick="reviewStatus('.$ids.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}
				}
				$faqqstns['aaData'] = $data;
			}else{
				$faqqstns['aaData'] = array();		
			}
			echo json_encode($faqqstns); exit;
		}
	}
    public function reviewsReports(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{	
			$data = array();
			$data['companies'] = $this->Companies_model->getAllCompanies();
			$this->show_admin('admin/reviews-reports',$data);
		}
	}
	public function reviewsRepliesReports(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{	
			$data = array();
			$data['companies'] = $this->Companies_model->getAllCompanies();
			$this->show_admin('admin/reviews-replies-reports',$data);
		}
	}
	public function reviewReports(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			if(isset($_GET['cmid']) && $_GET['cmid']=="all"){	
				$cmid = 0;
			}else{
				$cmid = $_GET['cmid'];
			}			
			$reviewReplies = $this->Companies_model->reviewReports($cmid);
			if(count($reviewReplies) != 0){
				foreach($reviewReplies as $key=>$rrRes){
					if(isset($rrRes->u_username) && $rrRes->u_username != ""){
						$data[$key]['u_firstname']  = ucfirst($rrRes->u_username);				
					}else if(isset($rrRes->u_firstname) && $rrRes->u_firstname != ""){
						$data[$key]['u_firstname']  = ucfirst($rrRes->u_firstname);
					}else{
						$data[$key]['u_firstname']  = "";
					}
					if(isset($rrRes->cm_name) && $rrRes->cm_name != "")
					{
						$data[$key]['cm_name']  = ucfirst($rrRes->cm_name);
					}else{
						$data[$key]['cm_name']  = "";
					}
					if(isset($rrRes->re_decript) && $rrRes->re_decript != "")
					{
						$data[$key]['re_decript']  = $rrRes->re_decript;
					}else{
						$data[$key]['re_decript']  = "";
					}					
					if(isset($rrRes->rr_report_reponse) && $rrRes->rr_report_reponse != "")
					{
						if($rrRes->rr_report_reponse==1){
							$reportStatus = 'Spam';
						}else if($rrRes->rr_report_reponse==2){
							$reportStatus = 'Inaccurate';
						}else if($rrRes->rr_report_reponse==3){
							$reportStatus = 'Offensive';
						}else if($rrRes->rr_report_reponse==4){
							$reportStatus = 'FUD';
						}
						$data[$key]['rr_report_reponse']  = $reportStatus;
					}else{
						$data[$key]['rr_report_reponse']  = "No Reason";
					}					
					$whitchPage = "'reviewsReport'";					
					$ids = "'".$rrRes->rr_id.'####'.$rrRes->re_id."'";
					$data[$key]['action']   = '<a href="javascript:void(0);" title="Approve" onclick="replyReportStatus('.$ids.',1,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
					<a href="javascript:void(0);" title="Disapprove" onclick="replyReportStatus('.$ids.',0,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:#aaa;"><i class="fa fa-times-circle"></i></a>';
				}
				$faqqstns['aaData'] = $data;
			}else{
				$faqqstns['aaData'] = array();		
			}
			echo json_encode($faqqstns); exit;
		}
	}
	public function repliesReports(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			if(isset($_GET['cmid']) && $_GET['cmid']=="all"){	
				$cmid = 0;
			}else{
				$cmid = $_GET['cmid'];
			}			
			$reviewReplies = $this->Companies_model->replyReports($cmid);
			if(count($reviewReplies) != 0){
				foreach($reviewReplies as $key=>$rrRes){
					if(isset($rrRes->u_username) && $rrRes->u_username != ""){
						$data[$key]['u_firstname']  = ucfirst($rrRes->u_username);				
					}else if(isset($rrRes->u_firstname) && $rrRes->u_firstname != ""){
						$data[$key]['u_firstname']  = ucfirst($rrRes->u_firstname);
					}else{
						$data[$key]['u_firstname']  = "";
					}
					if(isset($rrRes->cm_name) && $rrRes->cm_name != "")
					{
						$data[$key]['cm_name']  = ucfirst($rrRes->cm_name);
					}else{
						$data[$key]['cm_name']  = "";
					}
					if(isset($rrRes->crr_decript) && $rrRes->crr_decript != "")
					{
						$data[$key]['crr_decript']  = $rrRes->crr_decript;
					}else{
						$data[$key]['crr_decript']  = "";
					}
					if(isset($rrRes->re_decript) && $rrRes->re_decript != "")
					{
						$data[$key]['re_decript']  = $rrRes->re_decript;
					}else{
						$data[$key]['re_decript']  = "";
					}					
					if(isset($rrRes->rrr_report_reponse) && $rrRes->rrr_report_reponse != "")
					{
						if($rrRes->rrr_report_reponse==1){
							$reportStatus = 'Spam';
						}else if($rrRes->rrr_report_reponse==2){
							$reportStatus = 'Inaccurate';
						}else if($rrRes->rrr_report_reponse==3){
							$reportStatus = 'Offensive';
						}else if($rrRes->rrr_report_reponse==4){
							$reportStatus = 'FUD';
						}
						$data[$key]['rrr_report_reponse']  = $reportStatus;
					}else{
						$data[$key]['rrr_report_reponse']  = "No Reason";
					}					
					$whitchPage = "'repliesReports'";
					$ids = "'".$rrRes->rrr_id.'####'.$rrRes->rrr_crr_id."'";
					$data[$key]['action']   = '<a href="javascript:void(0);" title="Approve" onclick="replyReportStatus('.$ids.',1,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
					<a href="javascript:void(0);" title="Disapprove" onclick="replyReportStatus('.$ids.',0,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:#aaa;"><i class="fa fa-times-circle"></i></a>';
				}
				$faqqstns['aaData'] = $data;
			}else{
				$faqqstns['aaData'] = array();		
			}
			echo json_encode($faqqstns); exit;
		}
	}	
	public function replyReportStatus(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			if(isset($_POST['statusMode']) && $_POST['statusMode']!=""){ 
				$status      = $_POST['statusMode'];
				$reportFrom  = $_POST['whitchPage'];
				$id          = $_POST['id'];
				$dataExplode = explode('####',$id);
				$report_id   = $dataExplode[0];
				$common_id   = $dataExplode[1];
				if($reportFrom =='repliesReports'){
					if($status==1){
						$reportStatus       = $this->Companies_model->deleteReplyReport($common_id);
						$deleteReplyStatus  = $this->Companies_model->deleteReplyStatus($common_id,1);
					}else{
						$reportStatus       =  $this->Companies_model->changeReportStatus($report_id);
					}
				}else{
					if($status==1){
						$getReviewInfo       = $this->Companies_model->getReviewInfo($common_id);
						$getReviewReplies    = $this->Companies_model->getReviewReplies($common_id);
						if(sizeof($getReviewReplies)>0){
							foreach($getReviewReplies as $reviewReplies){
								$crr_id = $reviewReplies->crr_id;
								$deleteReviewReplyReport = $this->Companies_model->deleteReplyReport($crr_id);
							}
						}
						$reportStatus        = $this->Companies_model->deleteReviewReport($common_id);
						$deleteReplyStatus   = $this->Companies_model->deleteReviewStatus($common_id,1);
						$deleteReviewReplies = $this->Companies_model->deleteReviewReplies($common_id);
						
						// Update Company rating average				
						$re_cmid = $getReviewInfo->re_cmid;
						$ratingv  = 0;
						$getCRRating = $this->Companies_model->getCompanyReviewRating($re_cmid);
						if(count($getCRRating)>0){
							foreach($getCRRating as $rRating){
								$ratingv += $rRating->re_rating;
							}
							$companyAvrgRating = $ratingv/count($getCRRating);
						}else{
							$companyAvrgRating = 0;
						}
						$companyAvrgRating = round($companyAvrgRating,1, PHP_ROUND_HALF_UP);
						$updateRating = $this->Companies_model->updateCompanyOverallRating($re_cmid,$companyAvrgRating);
						$reviewA  = 0;
						$getCRReviews = $this->Companies_model->getCompanyReviewReviews($re_cmid);
						if(count($getCRReviews)>0){					
							$reviewA = count($getCRReviews);
						}				
						$updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
					}else{
						$reportStatus        = $this->Companies_model->changeReviewReportStatus($report_id);
					}	
				}
				echo json_encode(array('status'=>'1','output'=>"success"));exit;
			}
		}
	}
}