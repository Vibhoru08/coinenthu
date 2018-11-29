<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends MY_Controller {
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
	public function userActions(){
		if(isset($_POST['id']) && $_POST['id']!=""){
			$tcm_id = $_POST['id'];
			$deleteStatus = $this->Companies_model->deleteTopCompany($tcm_id);
			echo json_encode(array('status'=>TRUE,'data'=>'success'));
		}else{
			echo json_encode(array('status'=>FALSE,'data'=>'notsuccess'));
		}
	}
	public function addTopCompanies(){
		$addStatus = 0;
		if(isset($_POST['topCompanies']) && $_POST['topCompanies']!=""){
			$companiesids = $_POST['topCompanies'];
			foreach($companiesids as $cm_id){
				$addStatus = $this->Companies_model->addTopCompany($cm_id);
			}
			echo json_encode(array('status'=>TRUE,'data'=>'success'));
		}else{
			echo json_encode(array('status'=>FALSE,'data'=>'notsuccess'));
		}
	}
	public function topDigitalAssets(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$data = array();
			$cm_cpid =1;
			$data['digitalassets'] = $this->Companies_model->getRestTopCompanies($cm_cpid);
			$this->show_admin('admin/top-digital-assets',$data);
		}
	}
	public function topIcoTrackers(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$data = array();
			$cm_cpid =2;
			$data['digitalassets'] = $this->Companies_model->getRestTopCompanies($cm_cpid);
			$this->show_admin('admin/top-ico-trackers',$data);
		}
	}
	public function getTopCompanies(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$data = array();
			if(isset($_GET['type']) && $_GET['type']=='asset'){
				$cm_cpid = 1;
			}else{
				$cm_cpid = 2;
			}
			$topAssets = $this->Companies_model->getTopCompanies($cm_cpid);
			if(count($topAssets) != 0){
				foreach($topAssets as $key=>$topAsset){
					if(isset($topAsset->cm_name) && $topAsset->cm_name != "")
					{
						$data[$key]['cm_name']  = ucfirst($topAsset->cm_name);
					}else{
						$data[$key]['cm_name']  = "";
					}
					if(isset($topAsset->cm_decript) && $topAsset->cm_decript != "")
					{
						$data[$key]['cm_decript']  = $topAsset->cm_decript;
					}else{
						$data[$key]['cm_decript']  = "";
					}
					$data[$key]['action']= '<a href="javascript:void(0);" title="Delete" onclick="deleteTopCompany('.$topAsset->tcm_id.','.$cm_cpid.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}
				$faqqstns['aaData'] = $data;
			}else{
				$faqqstns['aaData'] = array();
			}
			echo json_encode($faqqstns); exit;
		}
	}
    public function index()
	{
		$data = array();
		$this->show_admin('admin/digital-assets',$data);
	}
	public function icoTrackers(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$this->show_admin('admin/ico-trackers',$data);
		}
	}
	public function addIcoTracker(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else if(isset($_POST) && !empty($_POST))
		{
			echo '<pre>';print_r($_POST);
			echo '<pre>';print_r($_FILES);
			exit;

		}else{
			$data = Array();
			$data['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();
			$this->show_admin('admin/add-ico-tracker',$data);
		}
	}

	/* Digital Assets Management */

	public function digitalassetsList(){

		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){
			redirect('admin', 'refresh');
		}else{
			$data = array();
			if(isset($_GET['type']) && $_GET['type'] == 1){
				$cm_cpid = 1;
			}else{
				$cm_cpid = 2;
			}

			$result = $this->Companies_model->getAssetsList($cm_cpid);
			if(count($result) != 0){
				foreach($result as $key=>$ad){
					if(isset($ad->cm_name) && $ad->cm_name != "")
					{
						$data[$key]['cm_name']  = ucfirst($ad->cm_name);
					}else{
						$data[$key]['cm_name']  = "";
					}

					if(isset($ad->cm_decript) && $ad->cm_decript != "")
					{
						$data[$key]['cm_decript']  = $ad->cm_decript;
					}else{
						$data[$key]['cm_decript']  = "";
					}
					if(isset($ad->cm_marketcap) && $ad->cm_marketcap != "")
					{
						$data[$key]['cm_marketcap']  = '$'.number_format($ad->cm_marketcap);
					}else{
						$data[$key]['cm_marketcap']  = "";
					}
					if(isset($ad->cm_email) && $ad->cm_email != "")
					{
						$data[$key]['cm_email']  = $ad->cm_email;
					}else{
						$data[$key]['cm_email']  = "";
					}
					if(isset($ad->cm_mobile) && $ad->cm_mobile != "")
					{
						$data[$key]['cm_mobile']  = $ad->cm_mobile;
					}else{
						$data[$key]['cm_mobile']  = "";
					}
					/* if(isset($ad->u_picture) && $ad->u_picture!=""){
						$imagePath = base_url().'asset/img/users/'.$ad->u_picture;
					}else{
						$imagePath = base_url().'asset/img/no_image.png';
					} */
					/* $data[$key]['u_picture']  = '<img style="width:60px;height:60px;" class="img-thumbnail" src="'.$imagePath.'">'; */
					if($ad->cm_status=='1'){
						$fqf_status						=	'<a href="javascript:void(0);" title="Approved" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
					}else if($ad->cm_status=='2'){
						$fqf_status						=	'<a href="javascript:void(0);" title="Delete" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}else if($ad->cm_status=='0'){
						$fqf_status						=	'<a href="javascript:void(0);" title="Not Approved" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
					}
					$data[$key]['u_status']          	= 	$fqf_status;

					if($cm_cpid == 1)
					{
						$goUrl = 'edit-digital-asset';
						$whitchPage = "'digitalasset'";
					}else{
						$goUrl = 'edit-ico-tracker';
						$whitchPage = "'icotracker'";
					}
					if($ad->cm_status == 1){
						$data[$key]['action']   = '<a href="'.base_url().'admin/'.$goUrl.'/'.$cm_cpid.'-'.$ad->cm_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
												<a href="javascript:void(0);" title="Disapprove" onclick="userConfirmation('.$ad->cm_id.',0,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
												<a href="javascript:void(0);" title="Delete" onclick="userConfirmation('.$ad->cm_id.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}else{
						$data[$key]['action']   = '<a href="'.base_url().'admin/'.$goUrl.'/'.$cm_cpid.'-'.$ad->cm_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
												<a href="javascript:void(0);" title="Approve" onclick="userConfirmation('.$ad->cm_id.',1,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
												<a href="javascript:void(0);" title="Delete" onclick="userConfirmation('.$ad->cm_id.',2,'.$whitchPage.');" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
					}
				}
				$faqqstns['aaData'] = $data;
			}else{
				$faqqstns['aaData'] = array();
			}
		}
		echo json_encode($faqqstns); exit;
	}
	public function addDigitalAssetView()
	{
		// print_r($_POST);exit;
		// print_r($_FILES);exit;
		$this->load->helper(array('common'));
		if(isset($_POST) && !empty($_POST))
		{
			$userId = $this->session->userdata('user_id');
			//echo '<pre>';print_r($_POST);exit;
			if(isset($_FILES['digital_uploaded_file']['name']) && $_FILES['digital_uploaded_file']['name'] != ""){
				//print_r('if');exit;
				$comName = $_POST['cm_name'];
				$compName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $comName));
				$fileName = $_FILES["digital_uploaded_file"]["name"];
				//print_r($comName)	;exit;
				$fileTmpLoc = $_FILES["digital_uploaded_file"]["tmp_name"];
				$target_dir     = base_url().'asset/img/companies/digitalasset/';
				$temp           = explode(".", $_FILES['digital_uploaded_file']["name"]);
				$newfilename    = date('Ymd_His') . '.' . end($temp);
				//$target_file     = $target_dir . $newfilename;
				move_uploaded_file($_FILES["digital_uploaded_file"]["tmp_name"], 'asset/img/companies/digitalasset/'.$newfilename);
				// move_uploaded_file( $_FILES['digital_uploaded_file']["tmp_name"],$target_file);
				$kaboom = explode(".", $fileName);
				$fileExt = end($kaboom);
				$target_file = 'asset/img/companies/digitalasset/'.$newfilename;
				$resized_file = 'asset/img/companies/digitalasset/digital_'.$compName.'_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[4];
			}else if($_FILES['ico_uploaded_file']['name'] && $_FILES['ico_uploaded_file']['name'] != ""){
				$comName = $_POST['cm_name'];
				$compName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $comName));
				$fileName = $_FILES["ico_uploaded_file"]["name"];
				$fileTmpLoc = $_FILES["ico_uploaded_file"]["tmp_name"];
				$target_dir     = base_url().'asset/img/companies/';
				$temp           = explode(".", $_FILES['ico_uploaded_file']["name"]);
				$newfilename    = date('Ymd_His') . '.' . end($temp);
				//$target_file     = $target_dir . $newfilename;
				move_uploaded_file($_FILES["ico_uploaded_file"]["tmp_name"], 'asset/img/companies/icotracker/'.$newfilename);
				// move_uploaded_file( $_FILES['uploaded_file']["tmp_name"],$target_file);
				$kaboom = explode(".", $fileName);
				$fileExt = end($kaboom);
				$target_file = 'asset/img/companies/icotracker/'.$newfilename;
				$resized_file = 'asset/img/companies/icotracker/ico_'.$compName.'_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[4];
				//print_r($resizeImg);exit;
			}
			//company insert
			$insert_from = 'Admin';
			$companyId = $this->Companies_model->addDigitalAsset($this->input->post(),$userId,$insert_from,$resizeImg);
			//coreteam
			$cm_unique_id         = 'BOP'.str_pad((int)$companyId, 6, "0", STR_PAD_LEFT);
			$inserted_unqiue_code = $this->Companies_model->insertedUnqiueCode($companyId,$cm_unique_id);
			if(!empty($_POST['cot_name'])){
				foreach($_POST['cot_name'] as $key=>$ctname)
				{
					if($ctname != ""){
						$ctResult 	= $this->Companies_model->addCoreTeams($companyId,$ctname,$_POST['cot_profile_url'][$key]);
					}
				}
			}
			//advisory team
			if(!empty($_POST['adt_name'])){
				foreach($_POST['adt_name'] as $akey=>$adtname)
				{
					if($adtname != ""){
						$adtResult 	= $this->Companies_model->addAdvosries($companyId,$adtname,$_POST['adt_profile_url'][$akey]);
					}
				}
			}

			//escrow details
			if(!empty($_POST['escrow_name'])){
				foreach($_POST['escrow_name'] as $escrwkey=>$escrwname)
				{
					if($escrwname != ""){
						$escrwResult 	= $this->Companies_model->addEscrowDetails($companyId,$escrwname,$_POST['escrow_profile_url'][$escrwkey]);
					}
				}
			}
			//resources
			if(!empty($_POST['resource_name'])){
				foreach($_POST['resource_name'] as $rsrkey=>$resourcename)
				{
					if($resourcename != ""){
						$resrsResult 	= $this->Companies_model->addResources($companyId,$resourcename,$_POST['resource_url'][$rsrkey]);
					}
				}
			}
			//trading exanges
				if(!empty($_POST['te_title'])){
					foreach($_POST['te_title'] as $akey=>$trexname)
					{
						if($trexname != ""){
							$trexResult 	= $this->Companies_model->addTradeExchanges($companyId,$trexname,$_POST['trading_exchange_url'][$akey]);
						}
					}
				}
			//milestones
			if(!empty($_POST['ms_title'])){
				foreach($_POST['ms_title'] as $mkey=>$milestonename)
				{
					if($milestonename != ""){
						$mileStResult 	= $this->Companies_model->addMileStone($companyId,$milestonename,$_POST['ms_mss_id'][$mkey]);
					}
				}
			}
			//user uplad filesize
			$path   = './asset/img/companies/'.$userId.'/uploads/';
			if (!is_dir($path)) { //create the folder if it's not already exists
				mkdir($path, 0755, TRUE);
			}

			$target_dir 		= './asset/img/companies/'.$userId.'/uploads/';

			$userUploadFiles = 0;
			//print_r($_FILES);exit;
			if( isset($_FILES) && isset($_FILES["cp_picture"]) && isset($_FILES["cp_picture"]["name"]) && is_array($_FILES["cp_picture"]["name"]) )
			{
				$userUploadFiles = count($_FILES["cp_picture"]["name"]);
			}
			for( $userUpFiles = 0; $userUpFiles < $userUploadFiles ; $userUpFiles++ )
			{
				$temp 				= 	explode(".", basename( $_FILES["cp_picture"]["name"][$userUpFiles] ));
				$name = date('Ymd') ."_". date("His");
				$extension 		= 	strtolower(end($temp));

				$upfileName 		= $temp[0].'_'.$name.'.'.$extension;
				$target_file 		= $target_dir . $upfileName;


				copy( $_FILES["cp_picture"]["tmp_name"][$userUpFiles],$target_file);

				$filename 			= $upfileName ;


				$reg_id 			= $this->Companies_model->addUserCompanyFiles( $companyId,$filename );
			}
			echo $companyId;exit;
		}else{
			$data = Array();
			$data['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();

			$this->show_admin('admin/add-digital-asset',$data);
		}
	}
	public function adddigitalAsset()
	{

		print_r($_POST);exit;
	}
	public function digitalAssetActions(){
		if(isset($_POST['id']) && $_POST['id']!=""){
			$tcm_id 	= $_POST['id'];
			$statusMode = $_POST['statusMode'];
			//Overall Rating
			$getCRRating = $this->Companies_model->getCompanyRwRating($tcm_id);
			$ratingv = 0;
			if(count($getCRRating)>0){
				foreach($getCRRating as $rRating){
					$ratingv += $rRating->re_rating;
				}
				$companyAvrgRating = $ratingv/count($getCRRating);
			}else{
				$companyAvrgRating = 0;
			}
			$companyAvrgRating 	= round($companyAvrgRating,1, PHP_ROUND_HALF_UP);
			$cm_totalviews    	= $this->Companies_model->record_count($tcm_id);

			// $deleteStatus = $this->Companies_model->UpdateDigitalstatus($tcm_id,$statusMode);
			$deleteStatus = $this->Companies_model->UpdateDigitalstatus($tcm_id,$statusMode,$companyAvrgRating,$cm_totalviews);
			//Mail
				$getAdminDtls = $this->Companies_model->getAdminDetails( );
				$getCompnayDtls = $this->Companies_model->getCompanyDetails( $tcm_id );
				$mailDetails = Array();
				$mailDetails['cm_name'] = $getCompnayDtls->cm_name;
				if($getCompnayDtls->cm_ctid == 1)
				{
					$mailDetails['cm_type'] = 'Digital Asset';
				}else{
					$mailDetails['cm_type'] = 'ICO';
				}
				if($statusMode == 0)
				{
					$mailDetails['status_mode'] = 'Disapproved';
				}else{
					$mailDetails['status_mode'] = 'Approved';
				}
				$config = array (
					'mailtype' => 'html',
					'charset'  => 'utf-8',
					'priority' => '1'
				);
				$email = $getAdminDtls->u_email;
				$this->email->initialize($config);
				$this->load->library('email');
				$from_email = 'info@coinenthu.com';
				$to_email   = $getCompnayDtls->cm_email;
				$this->email->from($from_email, 'Coinenthu');
				$this->email->to($to_email);
				if($getCompnayDtls->cm_ctid == 1){
					$this->email->subject('Digital Asset Approval status.');
				}else{
					$this->email->subject('ICO Approval status.');
				}
				$message = $this->load->view('mail_templates/daico-approvemail-template',$mailDetails,TRUE);
				$this->email->message($message);
				if($statusMode != 2){
					$this->email->send();
				}
				// echo $message;exit;
			echo json_encode(array('status'=>TRUE,'data'=>'success'));
		}else{
			echo json_encode(array('status'=>FALSE,'data'=>'notsuccess'));
		}
	}
	public function editDigitalAsset()
	{
		$data = array();
		// echo $this->uri->segment(3);exit;
		$urlData 	= $this->uri->segment(3);
		$explodedData = explode('-',$urlData);

		$companyType 	= $explodedData[0];
		$companyId 	 	= $explodedData[1];
		$userId 		= $this->session->userdata('user_id');
		$results 		= $this->Companies_model->getDigitalAssetDetailsForAdmin($companyId,$userId,$companyType);
		$finalData['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();
		if(count($results) > 0){
			foreach($results as $key=>$details)
			{
				$data['company_id'] = $details->cm_id;
				if(isset($details->cm_name) && $details->cm_name != ""){
					$data['company_name'] = $details->cm_name;
				}else{
					$data['company_name'] = '';
				}
				if(isset($details->cm_uid) && $details->cm_uid != "")
				{
					$data['cm_uid']  = $details->cm_uid;
				}else{
					$data['cm_uid']  = "";
				}
				if(isset($details->cm_decript) && $details->cm_decript != ""){
					$data['company_desc'] = $details->cm_decript;
				}else{
					$data['company_desc'] = '';
				}
				if(isset($details->cm_picture) && $details->cm_picture != ""){
					$data['company_picture'] = $details->cm_picture;
				}else{
					$data['company_picture'] = '';
				}
				//milestone
				$mileStonesOfCmp 	= $this->Companies_model->getmileStonesOfCmp($details->cm_id);
				if(count($mileStonesOfCmp) > 0){
				foreach($mileStonesOfCmp  as $m=>$mileStone)
				{
					$data['ms_title'][$m]	 	= $mileStone->ms_title;
					$data['ms_id'][$m] 		= $mileStone->mss_id;
					$data['ms_status'][$m] 	= $mileStone->mss_status;

				}
				}else{
					$data['ms_title'] 	= '';
					$data['ms_title'] 	= '';
					$data['ms_id'] 		= '';
				}
				//coreteam
				$coreTeamOfCmp 	= $this->Companies_model->getCoreTeamOfCmp($details->cm_id);
				if(count($coreTeamOfCmp) > 0){
				foreach($coreTeamOfCmp  as $c=>$coreTeam)
				{
					$data['cot_name'][$c]	 			= $coreTeam->cot_name;
					$data['cot_profile_url'][$c] 		= $coreTeam->cot_profile_url;

				}
				}else{
					$data['cot_name'] 	= '';
					$data['cot_profile_url'] 	= '';
				}
				//escrow details
				$escrowOfCmp 	= $this->Companies_model->getEscrowOfCmp($details->cm_id);
				if(count($escrowOfCmp) > 0){
					foreach($escrowOfCmp  as $c=>$escrow)
					{
						$data['escrow_name'][$c]	 	= $escrow->ed_name;
						$data['escrow_url'][$c] 		= $escrow->ed_url;

					}
				}else{
					$data['escrow_name'] 	= '';
					$data['escrow_url'] 	= '';
				}
				//advisory
				$advisoryTeamOfCmp 	= $this->Companies_model->getAdvisoryOfCmp($details->cm_id);
				if(count($advisoryTeamOfCmp) > 0){
				foreach($advisoryTeamOfCmp  as $a=>$advisoryTeam)
				{
					$data['adt_name'][$a]	 			= $advisoryTeam->adt_name;
					$data['adt_profile_url'][$a] 		= $advisoryTeam->adt_profile_url;

				}
				}else{
					$data['adt_name'] 	= '';
					$data['adt_profile_url'] 	= '';
				}

				//trading
				$tradinExchnageOfCmp 	= $this->Companies_model->getradinExchnageOfCmp($details->cm_id);
				if(count($tradinExchnageOfCmp) > 0){
					foreach($tradinExchnageOfCmp as $tr=>$trCmpny)
					{
						$data['te_title'][$tr] 	= $trCmpny->te_title;
						$data['te_url'][$tr] 	= $trCmpny->te_url;
					}
				}else{
					$data['te_title'] = '';
					$data['te_url'] = '';
				}
				//Resources
				$resourcesOfCmp 	= $this->Companies_model->getResourcesOfCmp($details->cm_id);
				if(count($resourcesOfCmp) > 0){
					foreach($resourcesOfCmp as $tr=>$resource)
					{
						$data['resrc_name'][$tr] 	= $resource->cr_name;
						$data['resrc_url'][$tr] 	= $resource->cr_url;
					}
				}else{
					$data['resrc_name'] = '';
					$data['resrc_url'] = '';
				}
				//upload docs
				$uploadDocsOfCmp 	= $this->Companies_model->getuploadDocsOfCmp($details->cm_id);
				if(count($uploadDocsOfCmp) > 0){
					foreach($uploadDocsOfCmp as $ud=>$updDocs)
					{
						$data['upload_docs'][$ud] = $updDocs->cp_picture;
					}
				}else{
					$data['upload_docs'] = '';
				}

				if(isset($details->cm_marketcap) && $details->cm_marketcap != ""){
					$data['cm_marketcap'] = $details->cm_marketcap;
				}else{
					$data['cm_marketcap'] = '';
				}
				if(isset($details->cm_escrow) && $details->cm_escrow != ""){
					$data['cm_escrow'] = $details->cm_escrow;
				}else{
					$data['cm_escrow'] = '';
				}
				if(isset($details->cm_mobile) && $details->cm_mobile != ""){
					$data['cm_mobile'] = $details->cm_mobile;
				}else{
					$data['cm_mobile'] = '';
				}
				if(isset($details->cm_email) && $details->cm_email != ""){
					$data['cm_email'] = $details->cm_email;
				}else{
					$data['cm_email'] = '';
				}
				if(isset($details->cm_siteurl) && $details->cm_siteurl != ""){
					$data['cm_siteurl'] = $details->cm_siteurl;
				}else{
					$data['cm_siteurl'] = '';
				}
				if(isset($details->cm_slack) && $details->cm_slack != ""){
					$data['cm_slack'] = $details->cm_slack;
				}else{
					$data['cm_slack'] = '';
				}
				if(isset($details->cm_twitter) && $details->cm_twitter != ""){
					$data['cm_twitter'] = $details->cm_twitter;
				}else{
					$data['cm_twitter'] = '';
				}
				if(isset($details->cm_discord) && $details->cm_discord != ""){
					$data['cm_discord'] = $details->cm_discord;
				}else{
					$data['cm_discord'] = '';
				}
				if(isset($details->cm_facebook) && $details->cm_facebook != ""){
					$data['cm_facebook'] = $details->cm_facebook;
				}else{
					$data['cm_facebook'] = '';
				}
				if(isset($details->cm_github) && $details->cm_github != ""){
					$data['cm_github'] = $details->cm_github;
				}else{
					$data['cm_github'] = '';
				}
				if(isset($details->cm_telegram) && $details->cm_telegram != ""){
					$data['cm_telegram'] = $details->cm_telegram;
				}else{
					$data['cm_telegram'] = '';
				}
				if(isset($details->cm_address) && $details->cm_address != ""){
					$data['cm_address'] = $details->cm_address;
				}else{
					$data['cm_address'] = '';
				}
				if(isset($details->cm_email) && $details->cm_email != ""){
					$data['cm_email'] = $details->cm_email;
				}else{
					$data['cm_email'] = '';
				}
				if(isset($details->cm_coinmarket_cap) && $details->cm_coinmarket_cap != ""){
					$data['cm_coinmarket_cap'] = $details->cm_coinmarket_cap;
				}else{
					$data['cm_coinmarket_cap'] = '';
				}
				if(isset($details->cm_total_token_supply) && $details->cm_total_token_supply != ""){
					$data['cm_total_token_supply'] = $details->cm_total_token_supply;
				}else{
					$data['cm_total_token_supply'] = '';
				}
				if(isset($details->cm_tokens_available_crowd_sale) && $details->cm_tokens_available_crowd_sale != ""){
					$data['cm_tokens_available_crowd_sale'] = $details->cm_tokens_available_crowd_sale;
				}else{
					$data['cm_tokens_available_crowd_sale'] = '';
				}
				if(isset($details->cm_inflation) && $details->cm_inflation != ""){
					$data['cm_inflation'] = $details->cm_inflation;
				}else{
					$data['cm_inflation'] = '';
				}
				if(isset($details->cm_ico_start_date) && $details->cm_ico_start_date != ""){
					$data['cm_ico_start_date'] = $details->cm_ico_start_date;
				}else{
					$data['cm_ico_start_date'] = '';
				}
				if(isset($details->cm_ico_end_date) && $details->cm_ico_end_date != ""){
					$data['cm_ico_end_date'] = $details->cm_ico_end_date;
				}else{
					$data['cm_ico_end_date'] = '';
				}
				if(isset($details->cm_ico_start_time) && $details->cm_ico_start_time != ""){
					$data['cm_ico_start_time'] = $details->cm_ico_start_time;
				}else{
					$data['cm_ico_start_time'] = '';
				}
				if(isset($details->cm_ico_end_time) && $details->cm_ico_end_time != ""){
					$data['cm_ico_end_time'] = $details->cm_ico_end_time;
				}else{
					$data['cm_ico_end_time'] = '';
				}
				if(isset($details->cm_ico_conditions) && $details->cm_ico_conditions != ""){
					$data['cm_ico_conditions'] = $details->cm_ico_conditions;
				}else{
					$data['cm_ico_conditions'] = '';
				}
				if(isset($details->cm_resources) && $details->cm_resources != ""){
					$data['cm_resources'] = $details->cm_resources;
				}else{
					$data['cm_resources'] = '';
				}

				$finalData['digitalData'] = $data;
			}
			// echo '<pre>';print_r($finalData);exit;
			if($companyType == 1){

				$this->show_admin('admin/edit-digital-asset',$finalData);
			}else{
				$this->show_admin('admin/edit-ico-tracker',$finalData);
			}

		}else{
			// redirect('admin','refresh');
		}
		// echo '<pre>';print_r($data);exit;
	}
	public function updateDigitalAsset()
	{
		$this->load->helper(array('common'));
		$userId = $this->session->userdata('user_id');
		if(isset($_POST) && $_POST != "" && !empty($_POST))
		{
			//company update
			if(isset($_FILES['digital_uploaded_file']['name']) && $_FILES['digital_uploaded_file']['name'] != ""){
				$comName = $_POST['cm_name'];
				$compName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $comName));
				$fileName = $_FILES["digital_uploaded_file"]["name"];
				$fileTmpLoc = $_FILES["digital_uploaded_file"]["tmp_name"];
				//$target_dir     = base_url().'asset/img/companies/digitalasset/';
				$temp           = explode(".", $_FILES['digital_uploaded_file']["name"]);
				$newfilename    = date('Ymd_His') . '.' . end($temp);
				//$target_file     = $target_dir . $newfilename;
				move_uploaded_file($_FILES["digital_uploaded_file"]["tmp_name"], 'asset/img/companies/digitalasset/'.$newfilename);
				// move_uploaded_file( $_FILES['digital_uploaded_file']["tmp_name"],$target_file);
				$kaboom = explode(".", $fileName);
				$fileExt = end($kaboom);
				$target_file = 'asset/img/companies/digitalasset/'.$newfilename;
				$resized_file = 'asset/img/companies/digitalasset/digital_'.$compName.'_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[4];
			}else if(isset($_FILES['ico_uploaded_file']['name']) && $_FILES['ico_uploaded_file']['name'] != ""){
				$comName = $_POST['cm_name'];
				$compName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $comName));
				$fileName = $_FILES["ico_uploaded_file"]["name"];
				$fileTmpLoc = $_FILES["ico_uploaded_file"]["tmp_name"];
				$target_dir     = base_url().'asset/img/companies/';
				$temp           = explode(".", $_FILES['ico_uploaded_file']["name"]);
				$newfilename    = date('Ymd_His') . '.' . end($temp);
				//$target_file     = $target_dir . $newfilename;
				move_uploaded_file($_FILES["ico_uploaded_file"]["tmp_name"], 'asset/img/companies/icotracker/'.$newfilename);
				// move_uploaded_file( $_FILES['uploaded_file']["tmp_name"],$target_file);
				$kaboom = explode(".", $fileName);
				$fileExt = end($kaboom);
				$target_file = 'asset/img/companies/icotracker/'.$newfilename;
				$resized_file = 'asset/img/companies/icotracker/ico_'.$compName.'_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[4];
				//print_r($resizeImg);exit;
			}
      else {
        $company_unique_id = $_POST["companyhidId"];
        $resizeImg=$_POST["userhidImage"];
      }
			//print_r($resizeImg);exit;
			$companyUpdt = $this->Companies_model->UpdateDigitalAsset($this->input->post(),$userId,$resizeImg);

			//milestones
			if(!empty($_POST['ms_title'])){
				$delMileStone = $this->Companies_model->deleteMultiFiles($this->input->post('companyhidId'),0);
				foreach($_POST['ms_title'] as $mkey=>$milestonename)
				{
					if($milestonename != ""){
						$mileStResult 	= $this->Companies_model->addMileStone($this->input->post('companyhidId'),$milestonename,$_POST['ms_mss_id'][$mkey]);
					}
				}
			}
			//coreteam
			if(!empty($_POST['cot_name'])){
				$delcoreTeam = $this->Companies_model->deleteMultiFiles($this->input->post('companyhidId'),1);
				foreach($_POST['cot_name'] as $key=>$ctname)
				{
					if($ctname != ""){
						$ctResult 	= $this->Companies_model->addCoreTeams($this->input->post('companyhidId'),$ctname,$_POST['cot_profile_url'][$key]);
					}
				}
			}

			//advisory team
			if(!empty($_POST['adt_name'])){
				$delAdvisoryTeam = $this->Companies_model->deleteMultiFiles($this->input->post('companyhidId'),2);
				foreach($_POST['adt_name'] as $akey=>$adtname)
				{
					if($adtname != ""){
						$adtResult 	= $this->Companies_model->addAdvosries($this->input->post('companyhidId'),$adtname,$_POST['adt_profile_url'][$akey]);
					}
				}
			}

			//escrow details
				if(!empty($_POST['escrow_name'])){
					$delEscrow = $this->Companies_model->deleteMultiFiles($this->input->post('companyhidId'),6);
					foreach($_POST['escrow_name'] as $eskey=>$escrname)
					{
						if($escrname != ""){
							$adtResult 	= $this->Companies_model->addEscrows($this->input->post('companyhidId'),$escrname,$_POST['escrow_profile_url'][$eskey]);
						}
					}
				}

				//trading exanges
				if(!empty($_POST['te_title'])){
					$delTradingExchnages = $this->Companies_model->deleteMultiFiles($this->input->post('companyhidId'),3);
					foreach($_POST['te_title'] as $akey=>$trexname)
					{
						if($trexname != ""){
							$trexResult 	= $this->Companies_model->addTradeExchanges($this->input->post('companyhidId'),$trexname,$_POST['trading_exchange_url'][$akey]);
						}
					}
				}
				//resources
				if(!empty($_POST['resource_name'])){
					$delResources = $this->Companies_model->deleteMultiFiles($this->input->post('companyhidId'),5);
					foreach($_POST['resource_name'] as $akey=>$resrcname)
					{
						if($resrcname != ""){
							$trexResult 	= $this->Companies_model->addResources($this->input->post('companyhidId'),$resrcname,$_POST['resource_url'][$akey]);
						}
					}
				}
			$bopUserId = $this->bopUploadUpdateFiles( $userId,$_FILES,$_POST );
			echo $bopUserId;exit;
		}

	}
	private function bopUploadUpdateFiles($uId,$uploadFiles,$post)
	{
		//get uploaded files
		$uploadedFiles = $this->Companies_model->getuploadDocsOfCmp( $post['companyhidId'] );
		if(count($uploadedFiles) > 0){
			foreach($uploadedFiles as $file){
				$del_id = $this->Companies_model->deleteMultiFiles( $post['companyhidId'],4 );
			}

		}

		chmod('./asset/img/companies/'.$uId, 0777);
		$path   = './asset/img/companies/'.$uId.'/uploads/';
		if (!is_dir($path)) { //create the folder if it's not already exists
			mkdir($path, 0755, TRUE);
		}

		$target_dir 		= './asset/img/companies/'.$uId.'/uploads/';

		$bopNoOfUploadFiles = 0;
		$bNoOfUploadFiles = 0;
		if( isset($uploadFiles) && isset($uploadFiles["cp_picture"]) && isset($uploadFiles["cp_picture"]["name"]) && is_array($uploadFiles["cp_picture"]["name"]) )
		{
			$bopNoOfUploadFiles = count($uploadFiles["cp_picture"]["name"]);
		}

		for( $bopUpFiles = 0; $bopUpFiles < $bopNoOfUploadFiles ; $bopUpFiles++ )
		{
			if($uploadFiles["cp_picture"]["name"][$bopUpFiles] != ""){
			$temp 				= 	explode(".", basename( $uploadFiles["cp_picture"]["name"][$bopUpFiles] ));
			$name 				= 	date('Ymd') ."_". date("His");
			$extension 			= 	strtolower(end($temp));

			$upfileName 		= $temp[0].'_'.$name.'.'.$extension;
			$target_file 		= $target_dir . $upfileName;


			copy( $uploadFiles["cp_picture"]["tmp_name"][$bopUpFiles],$target_file);

			$filename 			= $upfileName ;


			$reg_id 			= $this->Companies_model->addUserCompanyFiles( $post['companyhidId'],$filename );
			}
		}
			//already have files
		if(isset($post['upload_docs']) && !empty($post['upload_docs']) )
		{
			$bNoOfUploadFiles = count($post['upload_docs']);
		}
		for( $bUpFiles = 0; $bUpFiles < $bNoOfUploadFiles ; $bUpFiles++ )
		{

			if($post['upload_docs'][$bUpFiles] != ""){
			$filename 			= $post['upload_docs'][$bUpFiles] ;

			$reg_id 			= $this->Companies_model->addUserCompanyFiles( $post['companyhidId'],$filename );
			}
		}

		return $uId;
	}
}
