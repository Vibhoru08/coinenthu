<?php
	class Company extends MY_Controller {
		function __construct() {
			parent::__construct();
			$this->load->library(array('email','form_validation','session','pagination','ajax_pagination'));
			$this->load->database();
			$this->load->model('User_model');
			$this->load->model('Admin_model');
			$this->load->model('Companies_model');
			$this->load->library('pagination');
			$this->load->helper('url');
		}
		public function replyReplies(){
			if($this->session->userdata('user_id')!=""){
				if(isset($_GET['crr_id']) && $_GET['crr_id']!=""){
					$crr_id = $_GET['crr_id'];
					$editReply = $this->Companies_model->editReply($crr_id);
					$crr_decript = $editReply->crr_decript;
					echo json_encode(array('status'=>TRUE,'output'=>'success','crr_decript'=>$crr_decript));
				}else if(isset($_POST['crr_id']) && $_POST['crr_id']!=""){
					$uid            = $this->session->userdata('user_id');
					$crr_id         = $_POST['crr_id'];
					$crrr_decript   = $_POST['crrr_decript'];

					$ReviewId = $this->Companies_model->getReviewId($crr_id);
					$crr_reid = $ReviewId->crr_reid;
					$checkRes = $this->Companies_model->getCheckReviewReply($uid,$crr_reid,$crrr_decript,$crr_id);
					if(count($checkRes) > 0){
						echo json_encode(array('status'=>TRUE,'output'=>'exists'));
					}else{
						$updatedRes     = $this->Companies_model->updateReviewReply($crr_id,$crrr_decript);
						echo json_encode(array('status'=>TRUE,'output'=>'success'));
					}
				}
			}else{
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}
		}
		public function replyReportSaveMethod(){
			if($this->session->userdata('user_id') == "")
			{
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}else{
				if(isset($_POST['rr_reid']) && $_POST['rr_reid']!=""){
					$uid                = $this->session->userdata('user_id');
					$rrr_crr_id         = $_POST['rr_reid'];
					$rrr_report_reponse = $_POST['rr_report_reponse'];
					$checkReplyRes = $this->Companies_model->checkReviewReplyReport($uid,$rrr_crr_id);
					if(isset($checkReplyRes->rrr_id) && $checkReplyRes->rrr_id!=""){
						$rrr_id = $checkReplyRes->rrr_id;
						$insertedRes = $this->Companies_model->insertReviewReplyReport($uid,$rrr_crr_id,$rrr_report_reponse,$rrr_id);
					}else{
						$rrr_id = '';
						$updatedRes = $this->Companies_model->insertReviewReplyReport($uid,$rrr_crr_id,$rrr_report_reponse,$rrr_id);
					}
					$getReplyReports = $checkReplyRes = $this->Companies_model->getReplyReports($rrr_crr_id);
					if(sizeof($getReplyReports)>0){
						$reportsCnt = sizeof($getReplyReports);
					}else{
						$reportsCnt = 0;
					}
					$updatedRes = $this->Companies_model->updateReplyReports($rrr_crr_id,$reportsCnt);
					$replypreport = "'replypreport'";
					$alreadyReported = "'alreadyReported'";
					$butn = '<button onclick="reviewReportMethod('.$rrr_crr_id.','.$replypreport.','.$alreadyReported.');" class="btn btn-default btn_dislike">Reported</button>';
					echo json_encode(array('status'=>TRUE,'output'=>'success','butn'=>$butn));
				}
			}
		}
		public function deleteComment(){
			if($this->session->userdata('user_id') == "")
			{
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}else{
				if(isset($_POST['Id']) && $_POST['Id']!=""){
					$user_id = $this->session->userdata('user_id');
					$review_id = $_POST['Id'];
					$review_details = $this->Companies_model->getReviewInfo($review_id);
					$re_cmid = $review_details->re_cmid;
					$statusReview = $this->Companies_model->deleteReview($review_id);
					$statusReply = $this->Companies_model->deleteReviewReply($review_id);
					$no_of_replies_details = $this->Companies_model->userReplies($user_id);
					$no_of_replies = $no_of_replies_details->num_rows();
					$ratingv  = 0;
					$getCRRating = $this->Companies_model->getCompanyReviewRating($re_cmid);
					// $getCRRating = $this->Companies_model->getCompanyRwRating($re_cmid);
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
					// $getCRReviews = $this->Companies_model->record_count($re_cmid);
					if(count($getCRReviews)>0){
						$reviewA = count($getCRReviews);
					}
					$updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
					if($statusReview == 1 && $statusReply == 1){
						echo json_encode(array('status'=>TRUE,'output'=>'success','no_of_replies'=>$no_of_replies));
					}
					else{
						echo json_encode(array('status'=>TRUE,'output'=>'fail'));
					}
				}
			}




		}

		public function deleteReply(){
			if($this->session->userdata('user_id') == ""){
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}else{
				if(isset($_POST['reply_id']) && $_POST['reply_id'] != ""){
					$reply_id = $_POST['reply_id'];
					$statusDeletedReply = $this->Companies_model->deleteReply($reply_id);
					if($statusDeletedReply == 1){
						echo json_encode(array('status'=>TRUE,'output'=>'success'));
					}
					else{
						echo json_encode(array('status'=>TRUE,'output'=>'fail'));
					}
				}
			}
		}

		public function reportSaveMethod(){
			if($this->session->userdata('user_id') == "")
			{
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}else{
				if(isset($_POST['rr_reid']) && $_POST['rr_reid']!=""){
					$uid           = $this->session->userdata('user_id');
					$rr_reid      = $_POST['rr_reid'];
					$rr_report_reponse   = $_POST['rr_report_reponse'];
					$checkReplyRes = $this->Companies_model->checkReviewReport($uid,$rr_reid);
					if(isset($checkReplyRes->rr_id) && $checkReplyRes->rr_id!=""){
						$rr_id = $checkReplyRes->rr_id;
						$insertedRes = $this->Companies_model->insertReviewReport($uid,$rr_reid,$rr_report_reponse,$rr_id);
					}else{
						$crr_id = '';
						$updatedRes = $this->Companies_model->insertReviewReport($uid,$rr_reid,$rr_report_reponse,$rr_id);
					}
					$getReviewReports = $checkReplyRes = $this->Companies_model->getReviewReports($rr_reid);
					if(sizeof($getReviewReports)>0){
						$reportsCnt = sizeof($getReviewReports);
					}else{
						$reportsCnt = 0;
					}
					$updatedRes = $this->Companies_model->updateReviewsReports($rr_reid,$reportsCnt);
					$reviewpreport = "'reviewpreport'";
					$alreadyU = "'alreadyU'";

					$butn = '<button onclick="reviewReportMethod('.$_POST['rr_reid'].','.$reviewpreport.','.$alreadyU.');" class="btn btn-default btn_dislike">Reported</button>';
					echo json_encode(array('status'=>TRUE,'output'=>'success','butnreview'=>$butn));
				}
			}

		}
		public function replySaveMethod(){
			if($this->session->userdata('user_id')!=""){
				if(isset($_POST["crr_reid"]) && $_POST["crr_reid"]!=""){
					$uid           = $this->session->userdata('user_id');
					$crr_reid      = $_POST["crr_reid"];
					$crr_decript   = $_POST["crr_decript"];
					// $checkReplyRes = $this->Companies_model->checkReviewReply($uid,$crr_reid);
					// if(isset($checkReplyRes->crr_id) && $checkReplyRes->crr_id!=""){
						// $crr_id = $checkReplyRes->crr_id;
						// $insertedRes = $this->Companies_model->insertReviewReply($uid,$crr_reid,$crr_decript,$crr_id);
						// echo json_encode(array('status'=>TRUE,'output'=>'success'));
					// }else{
						$crr_id = '';

						$checkRes = $this->Companies_model->getCheckReviewReply($uid,$crr_reid,$crr_decript,$crr_id);
						if(count($checkRes)>0){
							echo json_encode(array('status'=>TRUE,'output'=>'exists'));
						}else{
							$updatedRes = $this->Companies_model->insertReviewReply($uid,$crr_reid,$crr_decript,$crr_id);
							echo json_encode(array('status'=>TRUE,'output'=>'success'));

						}

					// }
				}
			}else{
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}
		}
		public function likesDislikes(){
			if($this->session->userdata('user_id')==''){
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}else{
				if(isset($_POST['reviewid']) && $_POST['reviewid']!=""){
					$typeMode = $_POST['typeMode'];
					$commid   = $_POST['reviewid'];
					$cnt      = $_POST['reviewCnt'];
					$type     = $_POST['type'];
					$uid      = $this->session->userdata('user_id');
					if($typeMode == "review"){
						if($type =='like'){
							$checkedRes = $this->Companies_model->checkUserLiked($uid,$commid,$type);
							if(isset($checkedRes->rr_id) && $checkedRes->rr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyLiked'=>'1'));exit;
							}else{
								$type= "";
								$checkedUserRow = $this->Companies_model->checkUserLiked($uid,$commid,$type);
								if(isset($checkedUserRow->rr_id) && $checkedUserRow->rr_id!=""){
									$rr_id = $checkedUserRow->rr_id;
									$insertedLike   = $this->Companies_model->insertedLike($uid,1,$rr_id,$commid);
								}else{
									$rr_id ='';
									$insertedLike   = $this->Companies_model->insertedLike($uid,1,$rr_id,$commid);
								}
							}
						}else if($type =='dislike'){
							$checkedRes = $this->Companies_model->checkUserLiked($uid,$commid,$type);
							if(isset($checkedRes->rr_id) && $checkedRes->rr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyDisliked'=>'1'));exit;
							}else{
								$type= "";
								$checkedUserRow = $this->Companies_model->checkUserLiked($uid,$commid,$type);
								if(isset($checkedUserRow->rr_id) && $checkedUserRow->rr_id!=""){
									$rr_id = $checkedUserRow->rr_id;
									$insertedLike   = $this->Companies_model->insertedLike($uid,0,$rr_id,$commid);
								}else{
									$rr_id ='';
									$insertedLike   = $this->Companies_model->insertedLike($uid,0,$rr_id,$commid);
								}
							}
						}
						$dislikesCount = 0;
						$likesCount    = 0;
						if($_POST['type']=='like'){
							$likesResults    = $this->Companies_model->getReviewLikesOrDislikes($commid,'like');
							if(sizeof($likesResults)>0){
								$likesCount =sizeof($likesResults);
							}
							$dislikesResults    = $this->Companies_model->getReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($dislikesResults)>0){
								$dislikesCount = sizeof($dislikesResults);
							}
						}else if($_POST['type']=='dislike'){
							$getCRLikes    = $this->Companies_model->getReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($getCRLikes)>0){
								$dislikesCount = sizeof($getCRLikes);
							}
							$dislikesResults    = $this->Companies_model->getReviewLikesOrDislikes($commid,'like');
							if(sizeof($dislikesResults)>0){
								$likesCount = sizeof($dislikesResults);
							}
						}
						$likescnt    = 0;
						$dislikescnt = 0;
						$updatedRes = $this->Companies_model->updateReviewLikes($commid,$likesCount,$dislikesCount);
						$getDislikes = $this->Companies_model->getReviewLikesDislikes($commid);
						$likescnt = $getDislikes->re_likes_cnt;
						$dislikescnt = $getDislikes->re_dislike_cnt;
						echo json_encode(array('status'=>TRUE,'output'=>'success','cntLikeDislikes'=>$likescnt,'dislikescnt'=>$dislikescnt));
					}else if($typeMode == "replies"){
						if($type =='like'){
							$checkedRes = $this->Companies_model->checkUserReplyLiked($uid,$commid,$type);
							if(isset($checkedRes->rrr_id) && $checkedRes->rrr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyReplyLiked'=>'1'));exit;
							}else{
								$type= "";
								$checkedUserRow = $this->Companies_model->checkUserReplyLiked($uid,$commid,$type);
								if(isset($checkedUserRow->rrr_id) && $checkedUserRow->rrr_id!=""){
									$rrr_id = $checkedUserRow->rrr_id;
									$insertedLike   = $this->Companies_model->insertedReplyLike($uid,1,$rrr_id,$commid);
								}else{
									$rr_id ='';
									$insertedLike   = $this->Companies_model->insertedReplyLike($uid,1,$rr_id,$commid);
								}
							}
						}else if($type =='dislike'){
							$checkedRes = $this->Companies_model->checkUserReplyLiked($uid,$commid,$type);
							if(isset($checkedRes->rrr_id) && $checkedRes->rrr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyReplyDisliked'=>'1'));exit;
							}else{
								$type= "";
								$checkedUserRow = $this->Companies_model->checkUserReplyLiked($uid,$commid,$type);
								if(isset($checkedUserRow->rrr_id) && $checkedUserRow->rrr_id!=""){
									$rrr_id = $checkedUserRow->rrr_id;
									$insertedLike   = $this->Companies_model->insertedReplyLike($uid,0,$rrr_id,$commid);
								}else{
									$rrr_id ='';
									$insertedLike   = $this->Companies_model->insertedReplyLike($uid,0,$rrr_id,$commid);
								}
							}
						}
						$dislikesCount = 0;
						$likesCount    = 0;
						if($_POST['type']=='like'){
							$likesResults    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'like');
							if(sizeof($likesResults)>0){
								$likesCount =sizeof($likesResults);
							}
							$dislikesResults    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($dislikesResults)>0){
								$dislikesCount = sizeof($dislikesResults);
							}
						}else if($_POST['type']=='dislike'){
							$getCRLikes    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($getCRLikes)>0){
								$dislikesCount = sizeof($getCRLikes);
							}
							$dislikesResults    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'like');
							if(sizeof($dislikesResults)>0){
								$likesCount = sizeof($dislikesResults);
							}
						}
						$likescnt    = 0;
						$dislikescnt = 0;
						$updatedRes = $this->Companies_model->updateReplyReviewLikes($commid,$likesCount,$dislikesCount);
						$getDislikes = $this->Companies_model->getreplyReviewLikesDislikes($commid);
						$likescnt = $getDislikes->crr_likes_cnt;
						$dislikescnt = $getDislikes->crr_dislike_cnt;
						echo json_encode(array('status'=>TRUE,'output'=>'success','cntLikeDislikes'=>$likescnt,'dislikescnt'=>$dislikescnt));
					}
				}
			}
		}
		public function checklikesDislikes(){
			if($this->session->userdata('user_id')==''){
				echo json_encode(array('status'=>TRUE,'output'=>'fail','loginrequired'=>'1'));exit;
			}else{
				if(isset($_POST['reviewid']) && $_POST['reviewid']!=""){
					$typeMode = $_POST['typeMode'];
					$commid   = $_POST['reviewid'];
					$cnt      = $_POST['reviewCnt'];
					$type     = $_POST['type'];
					$uid      = $this->session->userdata('user_id');
					if($typeMode == "review"){
						if($type =='like'){
							$checkedRes = $this->Companies_model->checkUserLiked($uid,$commid,$type);
							if(isset($checkedRes->rr_id) && $checkedRes->rr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyLiked'=>'1'));exit;
							}
						}else if($type =='dislike'){
							$checkedRes = $this->Companies_model->checkUserLiked($uid,$commid,$type);
							if(isset($checkedRes->rr_id) && $checkedRes->rr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyDisliked'=>'1'));exit;
							}
						}
						$dislikesCount = 0;
						$likesCount    = 0;
						if($_POST['type']=='like'){
							$likesResults    = $this->Companies_model->getReviewLikesOrDislikes($commid,'like');
							if(sizeof($likesResults)>0){
								$likesCount =sizeof($likesResults);
							}
							$dislikesResults    = $this->Companies_model->getReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($dislikesResults)>0){
								$dislikesCount = sizeof($dislikesResults);
							}
						}else if($_POST['type']=='dislike'){
							$getCRLikes    = $this->Companies_model->getReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($getCRLikes)>0){
								$dislikesCount = sizeof($getCRLikes);
							}
							$dislikesResults    = $this->Companies_model->getReviewLikesOrDislikes($commid,'like');
							if(sizeof($dislikesResults)>0){
								$likesCount = sizeof($dislikesResults);
							}
						}
						$likescnt    = 0;
						$dislikescnt = 0;

						$getDislikes = $this->Companies_model->getReviewLikesDislikes($commid);
						$likescnt = $getDislikes->re_likes_cnt;
						$dislikescnt = $getDislikes->re_dislike_cnt;
						echo json_encode(array('status'=>TRUE,'output'=>'success','cntLikeDislikes'=>$likescnt,'dislikescnt'=>$dislikescnt));
					}else if($typeMode == "replies"){
						if($type =='like'){
							$checkedRes = $this->Companies_model->checkUserReplyLiked($uid,$commid,$type);
							if(isset($checkedRes->rrr_id) && $checkedRes->rrr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyReplyLiked'=>'1'));exit;
							}
						}else if($type =='dislike'){
							$checkedRes = $this->Companies_model->checkUserReplyLiked($uid,$commid,$type);
							if(isset($checkedRes->rrr_id) && $checkedRes->rrr_id!=''){
								echo json_encode(array('status'=>TRUE,'output'=>'success','alreadyReplyDisliked'=>'1'));exit;
							}
						}
						$dislikesCount = 0;
						$likesCount    = 0;
						if($_POST['type']=='like'){
							$likesResults    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'like');
							if(sizeof($likesResults)>0){
								$likesCount =sizeof($likesResults);
							}
							$dislikesResults    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($dislikesResults)>0){
								$dislikesCount = sizeof($dislikesResults);
							}
						}else if($_POST['type']=='dislike'){
							$getCRLikes    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'dislike');
							if(sizeof($getCRLikes)>0){
								$dislikesCount = sizeof($getCRLikes);
							}
							$dislikesResults    = $this->Companies_model->getreplyReviewLikesOrDislikes($commid,'like');
							if(sizeof($dislikesResults)>0){
								$likesCount = sizeof($dislikesResults);
							}
						}
						$likescnt    = 0;
						$dislikescnt = 0;
						$getDislikes = $this->Companies_model->getreplyReviewLikesDislikes($commid);
						$likescnt = $getDislikes->crr_likes_cnt;
						$dislikescnt = $getDislikes->crr_dislike_cnt;
						echo json_encode(array('status'=>TRUE,'output'=>'success','cntLikeDislikes'=>$likescnt,'dislikescnt'=>$dislikescnt));
					}
				}
			}
		}
		public function companyFullView(){
			$data = array();
			// echo $this->uri->segment(2);exit;
			$exploded =  explode('&',$this->uri->segment(2));
			$cm_name_initial = $exploded[0];
            $cm_name = str_replace("_"," ",$cm_name_initial);
			if(isset($exploded[1]) && $exploded[1] != ''){
				$results_type = $exploded[1];
			}else{
				$results_type = 'newest';
			}
			$this->load->helper(array('common'));
			/* if(isset($_POST) && !empty($_POST)){
				$cm_unique_id = $_POST['hid_uniqueid'];
				$results_type = $_POST['order_by'];
			}else{
				$cm_unique_id = $this->uri->segment(2);
				$results_type = 'likes';
			} */
			// $cm_unique_id = $this->uri->segment(2);
			if(isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] != "" ){
				$user_id = $this->session->userdata['user_id'];
				$data['user_profile_info'] = $this->User_model->getUserDetails($user_id);
			}
			$results      = $this->Companies_model->getcompanyinfobyname($cm_name);
			if(count($results) > 0){
				foreach($results as $key=>$details)
				{
					$data['companyOwner'] = 0;
					if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
						if($details->cm_uid==$_SESSION['user_id']){
							$data['companyOwner'] = 1;
						}
					}
					$data['company_id']   = $details->cm_id;
					$data['cm_unique_id'] = $details->cm_unique_id;
					$data['cm_uid']       = $details->cm_uid;
					$data['cm_ctid']      = $details->cm_ctid;
					$data['cm_overallrating'] = $details->cm_overallrating;
					$data['cm_totalviews']    = $this->Companies_model->count_reviews($details->cm_id);
					/* $data['cm_totalviews']    = $this->Companies_model->record_count($details->cm_id);
					//company rating
					$getCRRating = $this->Companies_model->getCompanyRwRating($details->cm_id);
					if(count($getCRRating)>0){
						foreach($getCRRating as $rRating){
							$ratingv += $rRating->re_rating;
						}
						$companyAvrgRating = $ratingv/count($getCRRating);
					}else{
						$companyAvrgRating = 0;
					}
					$companyAvrgRating = round($companyAvrgRating,1, PHP_ROUND_HALF_UP);

					if(isset($companyAvrgRating) && $companyAvrgRating != ""){
						$data['cm_overallrating'] = $companyAvrgRating;
					}else{
						$data['cm_overallrating'] = '0';
					} */
					if(isset($details->cm_name) && $details->cm_name != ""){
						$data['company_name'] = $details->cm_name;
					}else{
						$data['company_name'] = '';
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
						$data['ms_link'][$m]        = $mileStone->ms_url;
						$data['ms_id'][$m] 		= $mileStone->mss_id;
						$data['ms_status'][$m] 	= $mileStone->mss_status;

					}
					}else{
						$data['ms_title'] 	= '';
						$data['ms_title'] 	= '';
						$data['ms_id'] 		= '';
					}
					//escrow
					$mileStonesOfCmp 	= $this->Companies_model->getEscrowOfCmp($details->cm_id);
					if(count($mileStonesOfCmp) > 0){
					foreach($mileStonesOfCmp  as $es=>$escrowDtls)
					{
						$data['escrow_name'][$es]		= $escrowDtls->ed_name;
						$data['escrow_url'][$es] 		= $escrowDtls->ed_url;

					}
					}else{
						$data['escrow_name'] 	= '';
						$data['escrow_url'] 	= '';
					}
					//resources
					$resourcesOfCmp 	= $this->Companies_model->getResourcesOfCmp($details->cm_id);
					if(count($resourcesOfCmp) > 0){
					foreach($resourcesOfCmp  as $res=>$resourceDtls)
					{
						$data['resource_name'][$res]		= $resourceDtls->cr_name;
						$data['resource_url'][$res] 		= $resourceDtls->cr_url;

					}
					}else{
						$data['resource_name'] 	= '';
						$data['resource_url'] 	= '';
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
							$data['te_title'][$tr] = $trCmpny->te_title;
							$data['te_url'][$tr] = $trCmpny->te_url;
						}
					}else{
						$data['te_title'] = '';
						$data['te_url'] = '';
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
					$capDtls = $this->getCompDtlsApi($details->cm_name);
					if(count($capDtls) > 0 && isset($capDtls[0]['name']))
					{
						// $data['cm_marketcap'] = 'Market Cap : '.$capDtls[0]['market_cap_usd'].'<br/>'.'Current Price : '.$capDtls[0]['price_usd'].'<br/>'.'24 hr Volume : '.$capDtls[0]['24h_volume_usd'].'<br/>'.'%Change(24hr) : '.$capDtls[0]['percent_change_24h'];
						$data['cm_marketcap'] 		= $capDtls[0]['market_cap_usd'];
						$data['price_usd'] 			= $capDtls[0]['price_usd'];
						$data['24h_volume_usd'] 	= $capDtls[0]['24h_volume_usd'];
						$data['percent_change_24h'] = $capDtls[0]['percent_change_24h'];
						$data['available_supply'] 	= $capDtls[0]['available_supply'];
						$data['total_supply'] 		= $capDtls[0]['total_supply'];
						$data['api_data'] 			= '1';
					}
					else if(isset($details->cm_marketcap) && $details->cm_marketcap != ""){
						$data['cm_marketcap'] = $details->cm_marketcap;
						$data['price_usd'] 			= '';
						$data['24h_volume_usd'] 	= '';
						$data['percent_change_24h'] = '';
						$data['available_supply']   = $details->cm_tokens_available_crowd_sale;
						$data['total_supply']       = $details->cm_total_token_supply;
						$data['api_data'] 			= '0';
					}else{
						$data['cm_marketcap'] = '';
						$data['price_usd'] 			= '';
						$data['24h_volume_usd'] 	= '';
						$data['percent_change_24h'] = '';
						$data['available_supply'] = '';
						$data['total_supply'] = '';

						$data['api_data'] 			= '';
					}
					if(isset($details->cm_escrow) && $details->cm_escrow != ""){
						$data['cm_escrow'] = $details->cm_escrow;
					}else{
						$data['cm_escrow'] = '';
					}
					if(isset($details->cm_coinmarket_cap) && $details->cm_coinmarket_cap != ""){
						$data['cm_coinmarket_cap'] = $details->cm_coinmarket_cap;
					}else{
						$data['cm_coinmarket_cap'] = '';
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
					if(isset($details->cm_discord) && $details->cm_discord != ""){
						$data['cm_discord'] = $details->cm_discord;
					}else{
						$data['cm_discord'] = '';
					}
					if(isset($details->cm_twitter) && $details->cm_twitter != ""){
						$data['cm_twitter'] = $details->cm_twitter;
					}else{
						$data['cm_twitter'] = '';
					}
					if(isset($details->cm_facebook) && $details->cm_facebook != ""){
						$data['cm_facebook'] = $details->cm_facebook;
					}else{
						$data['cm_facebook'] = '';
					}
					if(isset($details->cm_google_plus) && $details->cm_google_plus != ""){
						$data['cm_google_plus'] = $details->cm_google_plus;
					}else{
						$data['cm_google_plus'] = '';
					}
					if(isset($details->cm_linkedin) && $details->cm_linkedin != ""){
						$data['cm_linkedin'] = $details->cm_linkedin;
					}else{
						$data['cm_linkedin'] = '';
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

					$data['results_type'] = $results_type;

					//pagination for editorial board
					$config = array();
					if($details->cm_ctid == 1){
						$config["base_url"] = base_url().'DigitalAssets/'.$cm_name_initial.'&'.$results_type;
					}else if ($details->cm_ctid == 2){
						$config["base_url"] = base_url().'ICOs/'.$cm_name_initial.'&'.$results_type;
					}
					$config["total_rows"] = $this->Companies_model->record_count($details->cm_id);
					$config["per_page"] = 5;
					$config["uri_segment"] = 3;
					$config['num_links'] = 2;
					//sample
					$config['display_pages'] =TRUE;
					$config['use_page_numbers'] =TRUE;

					 //config for bootstrap pagination class integration
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
					//sample
					//print_r($config);
					//exit();
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					if($page > 0){
						$start=($page-1)*$config["per_page"];
					}else{
						$start = $page;
					}
					$reviewslist = $this->Companies_model->companyViewReviews($config["per_page"],$start,$details->cm_id,$results_type);
					$data["links"] = $this->pagination->create_links();
					$data['reviews'] = array();
					$data['replies'] = array();
					foreach($reviewslist as $cr=>$review){
						$data['reviews'][$cr] = $review;
						$data['replies'][$review->re_id] = $this->Companies_model->reviewsRepliesList($review->re_id,$results_type);
						foreach($data['replies'][$review->re_id] as $crr=>$reply){
							$data['replies'][$review->re_id][$crr] = $reply;
						}
					}
					$finalData['companyview'] = $data;
				}
				$this->show('company-full-view',$finalData);
			}
		}
		public function eventFullView()
		{   $this->load->helper(array('common'));
			$data = array();
			$exploded =  explode('&',$this->uri->segment(2));
			$event_id = $exploded[0];
			$result = $this->Companies_model->getEventInfoById($event_id);
			$agenda_last_row = $this->Companies_model->getAgendaLast($event_id);
			$agenda_last_day = $agenda_last_row['ag_day'];
			if(count($result) > 0){
				foreach($result as $key=>$value){
					$startdate = $value->ev_sd;
					$enddate = $value->ev_ed;
					$data['event_date'] = CombineDate(date('m/d/Y',strtotime($startdate)),date('m/d/Y',strtotime($enddate)));
					$data['event_name'] = $value->ev_name;
					$data['event_location'] = $value->ev_loc;
					$data['event_url']      = $value->ev_url;
					$data['event_city'] = $value->ev_city;
					$data['event_picture'] = $value->ev_picture;
					$data['event_att'] = $value->ev_num;
					$data['event_price'] = $value->ev_price;
					$data['event_description'] = $value->ev_decript;
					$data['event_id'] = $event_id;
					$data['speakers'] = $this->Companies_model->getSpeakersForEvent($event_id);
					$data['agenda_days'] = $agenda_last_day;
					$data['Agenda'] = array();
					for($i = 1; $i <= $agenda_last_day;$i++){
						$data['Agenda'][$i] = $this->Companies_model->getAgenda($event_id,$i);
					}
					$finalData['event'] = $data;
				}


				$this->show('event-full-view',$finalData);
			}else{
				show_404();
			}


		}
		public function getReviewBasedReplies()
		{
			$html = '';$data=Array();
			$this->load->helper(array('common'));
			if(isset($_POST['cm_id']) && $_POST['cm_id']!=""){
				$cm_id = $_POST['cm_id'];
				$order_by = $_POST['order_by'];
				$unique_id = $this->Companies_model->getcompanyUniqueId($cm_id);
				$replies = $this->Companies_model->reviewsRepliesList($_POST['crr_reid'],$_POST['likes']);
				if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
					$uid = $_SESSION['user_id'];
				}else{
					$uid = "";
				}
				$review_id = $_POST['re_id'];
				$user_id = $this->session->userdata('user_id');
				$last_reply_details = $this->Companies_model->getLastReplyByUser($review_id,$user_id);
				$row = $last_reply_details->last_row('array');
				$user_details = $this->User_model->getUserDetails($user_id);
				if($user_details->u_username != ""){
						$u_username = ucfirst($user_details->u_username);
				}
				elseif($row['u_firstname'] != ""){
						$u_username = ucfirst($user_details->u_username);
				}
				else{
						$u_username = "Guest User";
				}
				$html .='<div class="col-xs-12" id = "individualReplies_'.$row['crr_id'].'">';
				$html .='<div class = "col-md-2 col-xs-4 pad_0">';
				if($user_details->u_picture !=""){
						$html .= '<img class="img-circle reply-image" src="'.base_url().'asset/img/users/'.$user_details->u_picture.'" alt="'.$u_username.'">';
				}else if($user_details->u_social_pic !=""){
						$html .= '<img class="img-circle reply-image" src="'.$user_details->u_social_pic.'" alt="'.$u_username.'">';
				}else{
						$html .= '<img class="img-circle reply-image" src="'. base_url().'asset/img/alt.jpg" alt="user image">';
				}
				$html .='</div>';
				$html .="<div class='col-md-10 col-xs-12 pad_0'><div class = 'row mar_0' style = 'padding-top:5px;padding-bottom:5px;'>
				By <span style = 'font-family:NoirPro Medium;font-weight: 500;'>".$u_username."</span>";
				$old_date = timeago($row['crr_createdat']);
				$html .="<div class = 'time_stamp'>".$old_date."</div></div>";
				$replylikeval    = "'like'";
				$replyreviewval  = "'replies'";
				$replydislikeval = "'dislike'";
				$crr_likes_cnt= 0;
   				$crr_dislike_cnt = 0;
				$stringReply = strip_tags($row['crr_decript']);
				$html .="<div id = 'replyreview_".$row['crr_id']."' class = 'col-xs-12 pad_0' style = 'margin:0px;'>";
				if (strlen($stringReply) > 150) {

					$stringCut = substr($stringReply, 0, 150);
					$stringReply = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="cursor:pointer;color:#1546a5" href="javascript:void(0);" onClick="readReplyMoreSpan('.$row['crr_id'].');">More <i class="fa fa-angle-double-right font_s16" aria-hidden="true"></i></a>';
				}
				$html .= '<span id="replyspanLess_'.$row['crr_id'].'" style="overflow-wrap: break-word;">'.$stringReply.'</span>
				<span id="replyexpandSpan_'.$row['crr_id'].'" style="display:none;overflow-wrap: break-word;" >'.nl2br($row['crr_decript']).' '.'<a href="javascript:void(0);" onClick="readReplyLessSpan('.$row['crr_id'].');"><i class="fa fa-angle-double-left font_s16" aria-hidden="true"></i> Less </a></span>';
				//$html .= $reviewReplay->crr_decript.' <div class="clearfix"></div>';
				$html.=' </div>';
				$html.='<span id = "successMessage_'.$row['crr_id'].'"></span>';
				$html.='<span id = "r_char_cnt'.$row['crr_id'].'" style = "display:none;"><span id = "review_char_count'.$row['crr_id'].'"></span>&nbsp;&nbsp;character(s) left</span>';
				$html.='<div class="col-xs-12 pad_0" style = "padding-bottom:5px">';

				if($uid!=""){
					if($uid == $row['crr_uid']){
						    $html.='<label id = "save'.$row['crr_id'].'" for = "submit-form'.$row['crr_id'].'" tabindex = "0" class = "btn btn-default btn_dislike_new btn_small" style = "display:none;" value ="">Save</label>';
							$html.='<button id="reply_reply_pop'.$row['crr_id'].'" onClick="replyReplyMessage('.$row['crr_id'].','.$row['crr_reid'].');" class="btn btn-default btn_dislike_new btn-small pad_l0"><i class="fa fa-pencil-square" aria-hidden="true"></i><span class="r-report-button-text">Edit</span></button>';
					}
				}
				$html.='<span class = "pull-right" style = "margin-top:7px;">'.$crr_likes_cnt.' Likes</span>';
				$html.='</div></div></div>';

				$html2 .='<div class="col-xs-12 pad_l0 mar_t20 br_height" id = "individualReplies_'.$row['crr_id'].'">';
				$html2 .='<div class = "col-md-2 col-xs-4 pad_0">';
				if($row['u_picture']!=""){
						$html2 .= '<img class="img-circle reply-image" src="'.base_url().'asset/img/users/'.$row['u_picture'].'" alt="'.$u_username.'">';
				}else if($row['u_social_pic']!=""){
						$html2 .= '<img class="img-circle reply-image" src="'.$row['u_social_pic'].'" alt="'.$u_username.'">';
				}else{
						$html2 .= '<img class="img-circle reply-image" src="'. base_url().'asset/img/alt.jpg" alt="user image">';
				}
				$html2 .='</div><div class="col-md-10 col-xs-12 pad_0">';
				$old_date = timeago($row['crr_createdat']);
				$html2 .="<p><span class = 'time_stamp' style = 'float:right;'>".$old_date."</span>";
				$html2 .="<span>".$u_username."</span><br>";
				$html2 .="<span class='NoirProLight' style= 'font-size:11px;color:#424242;'>".$row['u_about']."</span></p>";
				$html2 .="<p id='replyreview_".$row['crr_id']."'>";
				$html2 .="".strip_tags($row['crr_decript'])."</p>";
				$replylikeval    = "'like'";
				$replyreviewval  = "'replies'";
				$replydislikeval = "'dislike'";
				$crr_likes_cnt= 0;
   				$crr_dislike_cnt = 0;
				$stringReply = strip_tags($row['crr_decript']);
				$html2.='<span id= "r_char_cnt'.$row['crr_id'].'" style = "display:none;"><span id = "review_char_count'.$row['crr_id'].'"></span>&nbsp;&nbsp;character(s) left</span>';
				$html2.='<div class="col-xs-12 pad_0" style = "padding-bottom:5px">';

				if($uid!=""){
					if($uid == $row['crr_uid']){
						$html2.='<label id = "save'.$row['crr_id'].'" for = "submit-form'.$row['crr_id'].'" tabindex = "0" class = "btn btn-default btn_dislike_new btn_small" style = "display:none;" value ="">Save</label>';
						$html2.='<button id="reply_reply_pop'.$row['crr_id'].'" onClick="replyReplyMessage('.$row['crr_id'].','.$row['crr_reid'].');" class="btn btn-default btn_dislike_new btn-small pad_l0"><i class="fa fa-pencil-square" aria-hidden="true"></i><span class="r-report-button-text">Edit</span></button>';
					}
				}
				$html2.='<span class = "pull-right" style = "margin-top:7px;">'.$crr_likes_cnt.' Likes</span>';
				$html2 .= '<span class="btn btn-default btn_dislike_new btn-small prof_reply_delte" style="margin-left:5px;" id="prof_reply_delete" onclick="showDelete('.$row['crr_id'].');">';
				$html2 .= "<i class='fa fa-trash' aria-hidden='true'></i><span class='r-report-button-text'>Delete</span></span>";
				$html2 .='<span id = "reply_delte_confirm'.$row['crr_id'].'" style = "padding:4px 9px;font-size:12.5px;border:1px solid transparent;display:none;">Are you sure ?
						  <a style = "color:red;cursor:pointer;" onclick = "reply_delete('.$row['crr_id'].');">Yes</a>
						  <a id = "no_delete'.$row['crr_id'].'" onclick = "hideDelete('.$row['crr_id'].');" style = "color:green;cursor:pointer;">No</a></span>';

				$html2.='</div></div></div>';

				$repliesCntt = sizeof($replies);

				$crr_id = $_POST['crr_id'];
				$reply_details = $this->Companies_model->fetchreply($crr_id);
				foreach ($reply_details as $row2){
					$edited_reply = $row2['crr_decript'];
				}
				echo json_encode(array('status'=>TRUE,'output'=>'success','resData'=>$html,'resData2'=>$html2,'repliesCntt'=>$repliesCntt,"edited_reply"=>	$edited_reply ));
			}
		}
		public function reviewsReplies(){
			$html = '';$data=Array();
			$this->load->helper(array('common'));
			if(isset($_POST['cm_id']) && $_POST['cm_id']!=""){
				$cm_id = $_POST['cm_id'];
				$hid_uniqueid = $_POST['hid_uniqueid'];
				$order_by = $_POST['order_by'];
				$unique_id = $this->Companies_model->getcompanyUniqueId($cm_id);
				//pagination for editorial board
					$config = array();
					$config["base_url"] = '#';
					$config["total_rows"] = $this->Companies_model->record_count($unique_id->cm_id);

					$config["per_page"] = 5;
					$config["uri_segment"] = 3;
					//sample
					$config['display_pages'] =TRUE;
					$config['use_page_numbers'] =TRUE;


					//sample
					//sample
					$config['display_pages'] =TRUE;
					$config['use_page_numbers'] =TRUE;

					 //config for bootstrap pagination class integration
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

					// $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					$page = $_POST['Pagee'];
					if($page > 0){
						$start=($page-1)*$config["per_page"];
					}else{
						$start = $page;
					}
				$limit = 5;
				$rows = $this->Companies_model->record_count($unique_id->cm_id);
				$data['reviewslist'] = $this->Companies_model->companyViewReviews($config["per_page"],$start,$cm_id,$order_by);
				$data['total'] = ceil($rows/$limit);
				$data['order_by'] = $order_by;
				$data['page'] = $page;
				$data['replies'] = array();
				foreach($data['reviewslist'] as $cr=>$review){
					$data['reviews'][$cr] = $review;
					$data['replies'][$review->re_id] = $this->Companies_model->reviewsRepliesList($review->re_id,$results_type);
					foreach($data['replies'][$review->re_id] as $crr=>$reply){
						$data['replies'][$review->re_id][$crr] = $reply;
					}
				}
				$data['companyview'] = $data;
				$dt = $this->load->view('review-replies-ajax',$data,true);
				// $links = $this->ajax_pagination->create_links();
				// $html = $this->load->view('review-replies-ajax',$data);
				// echo '<pre>';print_r($links);exit;
				/* if(sizeof($reviewslist)>0){ $j=1;
					foreach($reviewslist as $cr=>$review){
						if($review->u_username!=""){
							$u_username = ucfirst($review->u_username);
						}else if($review->u_firstname!=""){
							$u_username = ucfirst($review->u_firstname);
						}else{
							$u_username = "Guest User";
						}
						$html .= '<div class="box-comment">';
						if($review->u_picture!=""){
							$html .= '<img class="img-circle img-sm" src="'.base_url().'asset/img/users/'.$review->u_picture.'" alt="'.$u_username.'">';
						}else if($review->u_social_pic!=""){
							$html .= '<img class="img-circle img-sm" src="'.$review->u_social_pic.'" alt="'.$u_username.'">';
						}else{
							$html .= '<img class="img-circle img-sm" src="'. base_url().'images/user5-128x128.jpg" alt="user image">';
						}
						$html .="<div class='comment-text'>
							  <span class='username'>".$u_username."<span class='text-muted pull-right comment_date'>";
						$old_date = Date_create($review->re_createdat);
						$new_date = Date_format($old_date, "d/m/Y");
						if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
							$uid = $_SESSION['user_id'];
						}else{
							$uid = "";
						}
						if($uid!=""){
							if($uid == $review->re_uid){
								$html.='<a href="'.base_url().'edit-review/'.$review->re_id.'"><span id="review_edit_id_'.$cr.'">Edit Review</span></a>&nbsp;&nbsp;&nbsp;';
							}
						}
						$html .= $new_date." </span></span> <div>";
						$html .='<input id="rating_val" name="input-6" class="rating rating-loading" value="'.$review->re_rating.'" data-min="0" data-max="5" data-step="1" data-size="xss" data-readonly="true">';
						if($review->re_likes_cnt!="" && $review->re_likes_cnt!=0){
							$re_likes_cnt = $review->re_likes_cnt;
						}else{
							$re_likes_cnt = 0;
						}
						if($review->re_dislike_cnt!="" && $review->re_dislike_cnt!=0){
							$re_dislike_cnt = $review->re_dislike_cnt;
						}else{
							$re_dislike_cnt = 0;
						}
						$likeval     = "'like'";
						$reviewval   = "'review'";
						$dislikeval  = "'dislike'";
						$html .='</div>'.$review->re_decript.'<div class="clearfix"></div>';
						$html.=' <div class="mar_t15">
							  <div class="pull-left">
								<button id="btn_like_'.$cr.'" onClick="reviewLikeDisLike('.$re_likes_cnt.','.$review->re_id.','.$likeval.','.$reviewval.','.$cr.');" class="btn btn-default btn_like"> <i class="fa fa-thumbs-up" aria-hidden="true"></i>'.$re_likes_cnt.'</button>';
						$html.='<button id="btn_dislike_'.$cr.'" class="btn btn-default btn_dislike" onClick="reviewLikeDisLikee('.$re_dislike_cnt.','.$review->re_id.','.$dislikeval.','.$reviewval.','.$cr.');"><i class="fa fa-thumbs-down" aria-hidden="true"></i>'.$re_dislike_cnt.'</button>';
						$reviewpreport = "'reviewpreport'";
						$reviewpcheckreport = "'alreadyU'";
						$emptyQuotes = "''";
						$reportedStatus = checkUserReport($uid,$review->re_id);
						if($reportedStatus==1){
							$html .='<button onclick="reviewReportMethod('.$review->re_id.','.$reviewpreport.','.$reviewpcheckreport.');" class="btn btn-default btn_dislike">Reported</button>';
						}else{
							$html .='<button onclick="reviewReportMethod('.$review->re_id.','.$reviewpreport.','.$emptyQuotes.');" class="btn btn-default btn_dislike">Report</button>';
						}
						$html.='<button id="reply_dislike_pop" onClick="replyMessage('.$review->re_id.');" class="btn btn-default btn_dislike">Reply</button>
							  </div>
							   <div class="pull-right pad_t10">
								<ul class="social-network social-circle">

								</ul>
							   </div>
							   </div>
							</div>
							<div class="clearfix"></div>';
						$html .='<div class="reply_post">';
						$replies = $this->Companies_model->reviewsRepliesList($review->re_id,'likes');
						if(sizeof($replies)>0){
							foreach($replies as $crr=>$reviewReplay){
								if($reviewReplay->u_username!=""){
									$u_username = ucfirst($reviewReplay->u_username);
								}else if($reviewReplay->u_firstname!=""){
									$u_username = ucfirst($reviewReplay->u_firstname);
								}else{
									$u_username = "Guest User";
								}
								$html.='<div class="box-comment">';
								if($reviewReplay->u_picture!=""){
									$html .= '<img class="img-circle img-sm" src="'.base_url().'asset/img/users/'.$reviewReplay->u_picture.'" alt="'.$u_username.'">';
								}else if($reviewReplay->u_social_pic!=""){
									$html .= '<img class="img-circle img-sm" src="'.$reviewReplay->u_social_pic.'" alt="'.$u_username.'">';
								}else{
									$html .= '<img class="img-circle img-sm" src="'. base_url().'images/user5-128x128.jpg" alt="user image">';
								}
								$html .="<div class='comment-text'>
									  <span class='username'> ".$u_username." <span class='text-muted pull-right comment_date'>";
								$old_date = Date_create($reviewReplay->crr_createdat);
								$new_date = Date_format($old_date, "d/m/Y");

								$html .=$new_date."</span></span>";

								if($reviewReplay->crr_likes_cnt!="" && $reviewReplay->crr_likes_cnt!=0){
									$crr_likes_cnt = $reviewReplay->crr_likes_cnt;
								}else{
									$crr_likes_cnt = 0;
								}
								if($reviewReplay->crr_dislike_cnt!="" && $reviewReplay->crr_dislike_cnt!=0){
									$crr_dislike_cnt = $reviewReplay->crr_dislike_cnt;
								}else{
									$crr_dislike_cnt = 0;
								}
								$replylikeval    = "'like'";
								$replyreviewval  = "'replies'";
								$replydislikeval = "'dislike'";

								$html .= $reviewReplay->crr_decript.' <div class="clearfix"></div>';
								$html.=' <div class="mar_t15">
									  <div class="pull-left">
										<button id="reply_btn_like_'.$crr.'" class="btn btn-default btn_like" onClick="reviewLikeDisLike('.$crr_likes_cnt.','.$reviewReplay->crr_id.','.$replylikeval.','.$replyreviewval.','.$crr.');"> <i class="fa fa-thumbs-up" aria-hidden="true"></i>'.$crr_likes_cnt.'</button>';
								$html.='<button id="reply_btn_dislike_'.$crr.'" class="btn btn-default btn_dislike" onClick="reviewLikeDisLike('.$crr_dislike_cnt.','.$reviewReplay->crr_id.','.$replylikeval.','.$replydislikeval.','.$crr.');"><i class="fa fa-thumbs-down" aria-hidden="true"></i>'.$crr_dislike_cnt.'</button>';
								$replypreport        = "'replypreport'";
								$reviewpcheckreports = "'alreadyReported'";
								$emptyQuotes = "''";
								$reportedStatuss = checkUserReplyReport($uid,$reviewReplay->crr_id);
								if($reportedStatuss==1){
									$html .='<button onclick="reviewReportMethod('.$reviewReplay->crr_id.','.$replypreport.','.$reviewpcheckreports.');" class="btn btn-default btn_dislike">Reported</button>';
								}else{
									$html .='<button onclick="reviewReportMethod('.$reviewReplay->crr_id.','.$replypreport.','.$emptyQuotes.');" class="btn btn-default btn_dislike">Report</button>';
								}
								if($uid!=""){
									if($uid == $reviewReplay->crr_uid){
										$html.='<button id="reply_reply_pop" onClick="replyReplyMessage('.$reviewReplay->crr_id.');" class="btn btn-default btn_dislike">Edit Reply</button>';
									}
								}
								$html.='</div>
									<div class="pull-right pad_t10">

									   </div>
								   </div>
							   </div>
							   </div>';
							}
						}
						$html.='</div>';
						$html.='</div>';
					$j++; }
				} */
				echo json_encode(array('status'=>TRUE,'output'=>'success','resData'=>$dt));
			}
		}
		public function insertWriteReview(){
			if(isset($_POST['re_cmid']) && $_POST['re_cmid']!=""){
				$re_cmid    = $_POST['re_cmid'];
				$re_rating  = $_POST['re_rating'];
				$re_decript = $_POST['re_decript'];
				$re_agree   = $_POST['re_agree'];
				$re_uid     = $this->session->userdata('user_id');
				$re_rating = $re_rating/2;
				//checking same review
				$checkReview = $this->Companies_model->checkDuplicateReview($re_cmid,$re_rating,$re_decript);
				if(count($checkReview) > 0)
				{
					echo json_encode(array('status'=>FALSE,'output'=>'failed'));
				}else{
					$insertedReview = $this->Companies_model->insertReview($re_cmid,$re_rating,$re_decript,$re_agree,$re_uid);
					$ratingv  = 0;
					$getCRRating = $this->Companies_model->getCompanyReviewRating($re_cmid);
					// $getCRRating = $this->Companies_model->getCompanyRwRating($re_cmid);
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
					//$getCRReviews = $this->Companies_model->record_count($re_cmid);
					if(count($getCRReviews)>0){
						$reviewA = count($getCRReviews);
					}
					$updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}
			}else{
				redirect('login', 'refresh');
			}
		}
		public function updateWriteReview(){
			if(isset($_POST['re_cmid']) && $_POST['re_cmid']!=""){
				$re_cmid    = $_POST['re_cmid'];
				$re_rating  = $_POST['re_rating'];
				$re_decript = $_POST['re_decript'];
				$re_agree   = $_POST['re_agree'];
				$re_id   = $_POST['re_id'];
				$re_uid     = $this->session->userdata('user_id');
				$re_rating  = $re_rating/2;
				$checkReview = $this->Companies_model->checkDuplctReview($re_cmid,$re_rating,$re_decript,$re_id);
				if(count($checkReview) > 0)
				{
					echo json_encode(array('status'=>FALSE,'output'=>'failed'));
				}else{

					$insertedReview = $this->Companies_model->updateReviewByUser($re_id,$re_decript,$re_rating);
					$ratingv  = 0;
					$getCRRating = $this->Companies_model->getCompanyReviewRating($re_cmid);
					// $getCRRating = $this->Companies_model->getCompanyRwRating($re_cmid);
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
					// $getCRReviews = $this->Companies_model->record_count($re_cmid);
					if(count($getCRReviews)>0){
						$reviewA = count($getCRReviews);
					}
					$updateReviews = $this->Companies_model->updateCompanyOverallReviews($re_cmid,$reviewA);
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}
			}else{
				redirect('login', 'refresh');
			}
		}
		public function editReview(){
			$this->load->library('ckeditor');
			$this->load->library('ckfinder');
			$this->ckeditor->basePath = base_url().'asset/ckeditor/';

			//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');

			$data = array();
			$re_id = $this->uri->segment(2);
			$cm_id_details = $this->Companies_model->getcompanyidfromreview($re_id);
			foreach ($cm_id_details as $row){
				$cm_id = $row['re_cmid'];
				$review_userid = $row['re_uid'];
			}
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				if(isset($cm_id) && $cm_id != ""){
					if($review_userid == $this->session->userdata('user_id')){
				$result = $this->Companies_model->getcompanyinfobycmid($cm_id);
				if(count($result) > 0){
					foreach($result as $key=>$details)
					{
						$data['cm_id']        = $details->cm_id;
						$data['cm_ctid']      = $details->cm_ctid;
						$data['cm_unique_id'] = $details->cm_unique_id;
						$data['cm_name'] 	  = $details->cm_name;
						$data['company_picture'] = $details->cm_picture;
					}
				}
				$results      = $this->Companies_model->editReview($re_id);
				$data['editReview'] = $results;
				$this->show('edit-review',$data);
			}else{
				show_404();
			}
			}else{
				show_404();
			}
			}
		}
		public function writeAreview(){
			$data = array();
			$cm_name_initial = str_replace("_"," ",$this->uri->segment(2));
			$red_name = $this->uri->segment(2);
			$this->load->library('ckeditor');
			$this->load->library('ckfinder');
			$this->ckeditor->basePath = base_url().'asset/ckeditor/';

			//Add Ckfinder to Ckeditor
			$this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');

			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				$this->session->set_userdata('redirect_page', 4);
				$this->session->set_userdata('redirect_page_name', $red_name);
				redirect('login', 'refresh');
			}else{
				$results = $this->Companies_model->getcompanyinfobyname($cm_name_initial);
				if(count($results) > 0){
					foreach($results as $key=>$details)
					{
						$data['cm_id']        = $details->cm_id;
						$data['cm_ctid']      = $details->cm_ctid;
						$data['cm_unique_id'] = $details->cm_unique_id;
						$data['cm_name'] 	  = $cm_name_initial;
						$data['company_picture'] = $details->cm_picture;
					}
				}

				$data['digitalAssetsImages']  = $this->Companies_model->getReviewList();
				$this->show('write-a-review',$data);
			}
		}
		public function myCompaniesList(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				$uuid = $this->session->userdata('user_id');
				$data = array();
				$cm_cpid  = 1;
				$limit    = 6;
				$offset   = 0;
				$oderBy  = "cm_overallrating";
				$ascDesc = "desc";
				$checkQuery = 'mydigital';
				$reviewscount = Array();
				$reviewsIcoscount = Array();

				$data['topda']      = $this->Companies_model->getTopCompanies($cm_cpid);
				//topcompanies reviews

				$data['totCntIcos'] = $this->Companies_model->totalCountCompaines($cm_cpid,$uuid);
				$data['icoTrackers']= $this->Companies_model->getDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
				$data['digitalAssetsImages']  = $this->Companies_model->getDigtalImageList();
				$this->show('my-digital-assets',$data);
			}
		}
		public function myIcoTrackers(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				$uuid = $this->session->userdata('user_id');
				$data = array();
				$cm_cpid  = 2;
				$limit    = 6;
				$offset   = 0;
				// $oderBy  = "cm_overallrating";
				// $ascDesc = "desc";
				$searchTerm = '';
				$oderBy  = "cm_ico_end_date";
				$ascDesc = "asc";
				$checkQuery = 'myicos';
				$data['topda']      = $this->Companies_model->getTopCompanies($cm_cpid);
				$data['totCntIcos'] = $this->Companies_model->totalCountCompaines($cm_cpid,$uuid);
				$reviewscount = Array();
				$reviewsIcoscount = Array();


				// $data['icoTrackers']= $this->Companies_model->getDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
				// $data['icoTrackers']= $this->Companies_model->getDigitalIcos1($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
				$data['icoTrackers']= $this->Companies_model->getSearchDgtlIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchTerm,$uuid,$checkQuery,7);
				$data['icoImages']  = $this->Companies_model->getIcoImageList();

				$this->show('my-ico-trackers',$data);
			}
		}
		public function digitalAssets(){
			$data = array();
			$cm_cpid  = 1;
			$limit    = 6;
			$offset   = 0;
			$checkQuery = 'mydigital';
			$uuid = "";
			$oderBy  = "cm_totalviews";
			$ascDesc = "desc";
			$checkQuery = 'digital';
			$reviewscount = Array();
			$reviewsIcoscount = Array();
			$data['topda']          = $this->Companies_model->getTopCompanies($cm_cpid);

			$data['totCntDigitals'] = $this->Companies_model->totalCountCompaines($cm_cpid,$uuid);
			$data['digitalAssets']  = $this->Companies_model->getDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
			$data['digitalAssetsImages']  = $this->Companies_model->getDigtalImageList();

			$this->show('digital-assets',$data);
		}
		public function Events()
		{
			$data = array();
			$limit    = 9;
			$offset   = 0;
			$data['totCntEvents'] = $this->Companies_model->totalCountEvents(1);
			$data['event_list'] = $this->Companies_model->getEventList($limit,$offset);
			$data['cities'] = $this->Companies_model->getCitiesSort(1);
			$data['countries'] = $this->Companies_model->getCountriesSort(1);
			$this->show('events',$data);
		}
		public function loadmoreEvents(){
			$html= "";
			$checkRecords = 0;
			$cnt = 0;
			$counts = "";
			$this->load->helper('common');
			if(isset($_POST['pageMode']) && $_POST['pageMode']!=""){
				$limit   = $_POST['limitpage'];
				$offset  = $_POST['offsetpage'];
				if($_POST['filterId'] == 'Select' ||  $_POST['filterId'] == 'de') //default
				{
					$city = '';
				}else{
					$city = $_POST['filterId'];
				}


				if(($_POST['filterCountryId'] == 'Select') || ($_POST['filterCountryId'] == 'de')) //default
				{
					$country = '';
				}else{
					$country = $_POST['filterCountryId'];
				}


				if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
					$uuid = "";
				}else{
					$uuid = $this->session->userdata('user_id');
				}
				// lprice,ends
				$filterType = $_POST['filterType'];
				$oderBy 	= "ev_price";
				$ascdesc 	= "asc";
	


					if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
						// $searchterms  = $_POST['searchterms'];
						// $getCompanies = $this->Companies_model->getSerachDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);
						$searchterms  = strtolower($_POST['searchterms']);
						$getEvents = $this->Companies_model->getSearchEvents($limit,$offset,$oderBy,$ascdesc,$searchterms,$city,$country,$filterType);
						$cnt = $this->Companies_model->getSearchEventsCnt($limit,$offset,$oderBy,$ascdesc,$searchterms);
						$counts = $this->Companies_model->getSearchEventsCount($oderBy,$ascdesc,$searchterms,$city);

					}else{
						// $searchterms = '';
						// $getCompanies = $this->Companies_model->getDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
						$searchterms = '';
						$getEvents = $this->Companies_model->getSearchEvents($limit,$offset,$oderBy,$ascdesc,$searchterms,$city,$country,$filterType);
						$cnt = $this->Companies_model->getEventsCount($limit,$offset,$oderBy,$ascdesc);
						$counts = $this->Companies_model->getSearchEventsCount($oderBy,$ascdesc,$searchterms,$city);
					}

				if(sizeof($getEvents)>0){
					$checkRecords =1;
					foreach($getEvents as $key=>$value){
						$data = array();
						$event_id = $value->ev_id;
						$speakers_num =  $this->Companies_model->CountSpeakers($event_id);
						$eventDate = CombineDate(date('m/d/Y',strtotime($value->ev_sd)),date('m/d/Y',strtotime($value->ev_ed)));
						$html .='<div class="col-md-4 mar_t80">
						<ul class="products-list product-list-in-box">
							<li class="item center">
							<div class="product_zorder">
							  <div class="product-img company_img_width">';
							  if($value->ev_picture!="" && $value->ev_picture != ''){
								$html.='<a href="'.base_url().'event-full-view/'.$event_id.'"><img src = "'.base_url().'asset/img/events/main/'.$value->ev_picture.'" alt = "'.$value->ev_name.'" class = "img-responsive img-circle digital_box_image"></a>';

							  }else{
								$html.='<a href="'.base_url().'event-full-view/'.$event_id.'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="'.$value->ev_name.'" class="img-responsive img-circle digital_box_image"></a>';
							  }
						$html.='</div>
							  <div class="product-info text-left">';
						$html.='<a title="'.$value->ev_name.'" href="'.base_url().'event-full-view/'.$event_id.'" class="product-title NoirProSemiBold">'.ucfirst($value->ev_name).'</a>';
						$html.='<div style = "padding:5px 0px 0px 5px";>';
						$html.='<p><i class="fa fa-location-arrow" aria-hidden="true"></i> Location: '.ucfirst($value->ev_city).'<p>';
						$html.='<p><i class="fa fa-calendar" aria-hidden="true"></i> Date : '.$eventDate.'</p>';
						$html.='<p><i class="fa fa-money" aria-hidden="true"></i> Price : $ '.$value->ev_price.'</p>';
						$html.='<p><i class="fa fa-microphone" aria-hidden="true"></i> Speakers : '.$speakers_num.'</p>';
						$html.='<p><i class="fa fa-users"></i> Attendees : '.$value->ev_num.'</p>';
						$html.='</div>';
						$html.='<hr>';
						$html.='<div class = "text-right">';
						$html.='<a href = "'.base_url().'event-full-view/'.$event_id.'" class = "btn btn-default" role ="button">View More</a>';
						$html.='</div>';




							//$html.=$cm_totalviews. ' Reviews';

							/* if($value->cm_overallrating != ''){
								$cMOvrlRtng = $value->cm_overallrating;
							}else{
								$cMOvrlRtng = 0;
							}
							*/
							/*

							$html.='&nbsp;'.number_format($cMOvrlRtng, 1, '.', '').'&nbsp;';
							$html.='</span></strong><span class="grey small">/</span><span class="grey small">10</span></div>';
							$html.='<a href="#" class="rating_count"><span class="small">'.$cm_totalviews.'</span></a></div>';
							$html.='<a href="'.base_url().'write-a-review/'.$value->cm_unique_id.'"><div class="image_rating_ad image_rating_ad_hover">
							<small><span class="rate_text mar_tt_5">Rate</span><span class="rate_text mar_t_5">This</span></small></div></a></div>';
								 */



							$html.=	'</div>	';
							$html.='</div>';

						$html.='</li>
						</ul>
						</div>';
					}
					if(isset($_POST["filter"]) && $_POST["filter"]=="filetrfrom"){
						$html.='<span id="loadingData"></span>';
					}
					echo json_encode(array('status'=>TRUE,'output'=>'success','resData'=>$html,'cnt'=>count($counts)));exit;
				}else{
					if($checkRecords==0){
						if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
							$html.="There are no search records found.";
						}else if($_POST['pageMode']=='events'){
							$html.="There are no events.";
						}
						echo json_encode(array('status'=>TRUE,'output'=>'norecoreds','resData'=>$html,'cnt'=>count($counts)));exit;
					}
				}
			}
		}
		public function icoTracker(){
			$data = array();
			$cm_cpid = 2;
			$limit   = 6;
			$offset  = 0;
			// $oderBy  = "cm_overallrating";
			// $ascDesc = "desc";
			$oderBy  = "cm_ico_end_date";
			$ascDesc = "asc";
			$uuid = "";
			$checkQuery = 'icos';
			$seacrhTerm = '';
			$reviewscount = Array();
			$reviewsIcoscount = Array();
			$data['topda']       = $this->Companies_model->getTopCompanies($cm_cpid);

			$data['totCntIcos']  = $this->Companies_model->totalCountCompaines($cm_cpid,$uuid);
			// $data['icoTrackers'] = $this->Companies_model->getDigitalIcos1($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
			$data['icoTrackers'] = $this->Companies_model->getSearchDgtlIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$seacrhTerm,$uuid,$checkQuery,7);
			$data['icoImages']  = $this->Companies_model->getIcoImageList();
			$this->show('ico-tracker',$data);
		}

		public function loadmoreCompaniesHome(){
			$html= "";
			$checkRecords = 0;
			$cnt = 0;
			$counts = "";
			$checkQuery = '';
			$oderBy = 'cm_totalviews';
			$ascdesc = 'desc';
			$reviewsCompcount = Array();
			if(isset($_POST['pageMode']) && $_POST['pageMode']!=""){
				$limit   = $_POST['limitpage'];
				$offset  = $_POST['offsetpage'];

				if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
					$uuid = "";
				}else{
					$uuid = $this->session->userdata('user_id');
				}
				// $oderBy = "cm_overallrating";
				if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
						// $searchterms  = $_POST['searchterms'];
						// $getCompanies = $this->Companies_model->getSerachDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);
						$searchterms  = $_POST['searchterms'];
						$getCompanies = $this->Companies_model->getSearchDgtlIcosHome($limit,$offset,$oderBy,$ascdesc,$searchterms,$uuid);
						$cnt		 = $this->Companies_model->getSerachDigitalIcosCountHome($limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid);
						$counts = $this->Companies_model->getSearchDgtlIcosCountsHome($oderBy,$ascdesc,$searchterms,$uuid);

				}else{
						// $searchterms = '';
						// $getCompanies = $this->Companies_model->getDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
						$searchterms = '';
						$getCompanies = $this->Companies_model->getSearchDgtlIcosHome($limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid);
						$cnt		 = $this->Companies_model->getSerachDigitalIcosCountHome($limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid);
						$counts = $this->Companies_model->getSearchDgtlIcosCountsHome($oderBy,$ascdesc,$searchterms,$uuid);
					}

				if(sizeof($getCompanies)>0){
					$checkRecords =1;
					foreach($getCompanies as $key=>$value){
						$data = array();
						$company_id = $value->cm_id;
						$number_of_reviews = $this->Companies_model->count_reviews($company_id);
						$company_reviews = $this->Companies_model->assetLastReview($company_id);
						$total_likes_count = 0;
						$total_dislikes_count = 0;
						foreach($company_reviews->result_array() as $row){
							if(isset($row['re_likes_cnt'])){
								$re_likes_cnt = $row['re_likes_cnt'];
							}
							else{
								$re_likes_cnt = 0;
							}
							$total_likes_count = $total_likes_count + $re_likes_cnt;

							if(isset($row['re_dislike_cnt'])){
								$re_dislikes_cnt = $row['re_dislike_cnt'];
							}
							else{
								$re_dislikes_cnt = 0;
							}
							$total_dislikes_count = $total_dislikes_count + $re_dislikes_cnt;
						}
						$last_review = $company_reviews->last_row('array');
						$last_review_userid = $last_review['re_uid'];
						$last_review_details = $this->User_model->getUserDetails($last_review_userid);
						$html .='<div class="col-md-4 mar_t40" style = "min-height:410px;">
						<ul class="products-list product-list-in-box">
							<li class="item center">
							<div class="product_zorder">
							  <div class="product-img company_img_width">';
							  if($value->cm_picture!=""){
								  if($value->cm_ctid == 1){
									 if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){
										$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
									 }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){
										$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
									 }else if($value->cm_picture!=""){
					$srcc = base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
										if(@getimagesize($srcc)){
											$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
										}else{
											$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
										}
									 }else{
										$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
									}
								}else if($value->cm_ctid == 2){
									if($value->cm_picture!=""){
										$srcc = base_url().'asset/img/companies/icotracker/'.$value->cm_picture;
										if(@getimagesize($srcc)){
											$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive  img-circle digital_box_image"></a>';
										}else{
											$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu"
											class="img-responsive  img-circle digital_box_image"></a>';
										}
									}else{
										$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu"
										class="img-responsive img-circle digital_box_image"></a>';
									}
								}
							  }else{
								  if($value->cm_ctid == 1){
								$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
								  }elseif($value->cm_ctid == 2){
									$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
								  }
							  }
						$html.='</div>
							  <div class="product-info text-left">';
						if($value->cm_ctid == 1){
							$html.='<a title="'.$value->cm_name.'" href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'" class="product-title NoirProSemiBold">'.$value->cm_name.'</a><input id="rating_val" name="input-6" class="rating rating-loading" value="'.$value->cm_overallrating.'" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">';
						}elseif($value->cm_ctid == 2){
							$html.='<a title="'.$value->cm_name.'" href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'" class="product-title NoirProSemiBold">'.$value->cm_name.'</a><input id="rating_val" name="input-6" class="rating rating-loading" value="'.$value->cm_overallrating.'" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">';
						}
						$html.='<span class="product-description">';
						$html.='<div class="star_in"><div class="rating_value">
								<span>';
						$html.='<div class="row">';

						if(isset($last_review)){
						if($uuid == $last_review_details->u_uid){
							$html.='<div class="col-xs-12 NoirProMedium"><a href = "'.base_url().'display-profile">'.ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname).'</a></div>';
						}else{
							$html.='<div class="col-xs-12 NoirProMedium"><a href = "'.base_url().'Profile/'.$last_review_details->u_username.'">'.ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname).'</a></div>';
						}
						if($last_review_details->u_about != ""){
							$html.='<div class="col-xs-12 NoirProLight" style="font-size:11px;color:#424242;">'.ucfirst($last_review_details->u_about).'</div>';
						}else{
							$html.='<div><span class="col-xs-12 set_height_br"></span></div>';
						}
                        $string = strip_tags($last_review['re_decript']);
							if (strlen($string) > 100) {

								$stringCut = substr($string, 0, 100);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
							}
						$html.='<div class="col-xs-12" style="height:90px;">'.ucfirst($string).'</div>';
						}else{
						$string = strip_tags($value->cm_decript);
							if (strlen($string) > 100) {

								$stringCut = substr($string, 0, 100);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
							}
						$html.='<div class="col-xs-12 NoirProMedium">DESCRIPTION</div><div><span class="col-xs-12 set_height_br"></span></div><span class="col-xs-12" style="height:90px;">'.ucfirst($string).'</span><br>';

						}
						if($value->cm_ctid == 1){
							$html.='<br/><a class="col-xs-12" href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
						}elseif($value->cm_ctid == 2){
							$html.='<br/><a class="col-xs-12" href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
						}
						$html.='<hr class="col-xs-12">';




							//$html.=$cm_totalviews. ' Reviews';
							if ($number_of_reviews == 1){
								$review_s = 'Review';
							}
							else{
								$review_s = 'Reviews';
							}
							if ($total_likes_count == 1){
								$like_s = 'Like';
							}
							else{
								$like_s = 'Likes';
							}
							if ($total_dislikes_count == 1){
									$dislike_s = 'Dislike';
							}
							else{
									$dislike_s = 'Dislikes';
							}
							$html.='<div class="col-xs-12"><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$total_likes_count.' '.'<span class="dis2_block">'.$like_s.'</span></span></div><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$total_dislikes_count.' '.'<span class="dis2_block">'.$dislike_s.'</span></span></div><div class="col-xs-4 pad_0"><i class="fa fa-commenting" aria-hidden="true"></i><span> '.$number_of_reviews.' '.'<span class="dis2_block">'.$review_s.'</span></span></div></div>';
							/* if($value->cm_overallrating != ''){
								$cMOvrlRtng = $value->cm_overallrating;
							}else{
								$cMOvrlRtng = 0;
							}
							*/
							$html.='<a href="'.base_url().'company-full-view/'.str_replace(" ","_",$value->cm_name).'" style="color:black;"><button class = "pull-right btn btn-default" style="color:orange;display:none;">View Reviews</button></a>';
							/*

							$html.='&nbsp;'.number_format($cMOvrlRtng, 1, '.', '').'&nbsp;';
							$html.='</span></strong><span class="grey small">/</span><span class="grey small">10</span></div>';
							$html.='<a href="#" class="rating_count"><span class="small">'.$cm_totalviews.'</span></a></div>';
							$html.='<a href="'.base_url().'write-a-review/'.$value->cm_unique_id.'"><div class="image_rating_ad image_rating_ad_hover">
							<small><span class="rate_text mar_tt_5">Rate</span><span class="rate_text mar_t_5">This</span></small></div></a></div>';
								 */



							$html.=	'</div>	';
							$html.='</span>

							  </div>';
							if($_POST['pageMode']=='mylist_digital' || $_POST['pageMode']=='mylist_icos'){
								$html.='<div class="company_ed_icons">';
								$html.='<a href="javascript:void(0);" onclick="eidtCompanyView('.$value->cm_id.','.$value->cm_ctid.');" class="btn btn-default c_pad_btn1"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
							<a href="javascript:void(0);" onClick="deleteCompanyview('.$value->cm_id.','.$value->cm_ctid.')"class="btn btn-default c_pad_btn2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						  </div>';
							}
						$html.='</li>
						</ul>
						</div>';
					}
					if(isset($_POST["filter"]) && $_POST["filter"]=="filetrfrom"){
						$html.='<span id="loadingData"></span>';
					}
					echo json_encode(array('status'=>TRUE,'output'=>'success','resData'=>$html,'cnt'=>count($counts)));exit;
				}else{
					if($checkRecords==0){
						if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
							$html.="There are no search records found.";
						}else if($_POST['pageMode']=='digital'){
							$html.="There are no assets.";
						}else if($_POST['pageMode']=='mylist_digital'){
							$html.="You have not yet added any companies.";
						}else if($_POST['pageMode']=='mylist_icos'){
							$html.="You have not yet added any companies.";
						}else{
							$html.="No ICOs listed.";
						}
						echo json_encode(array('status'=>TRUE,'output'=>'norecoreds','resData'=>$html,'cnt'=>count($counts)));exit;
					}
				}
			}
		}

		public function loadmoreCompanies(){
			$html= "";
			$checkRecords = 0;
			$cnt = 0;
			$counts = "";
			$checkQuery = '';
			$reviewsCompcount = Array();
			if(isset($_POST['pageMode']) && $_POST['pageMode']!=""){
				$limit   = $_POST['limitpage'];
				$offset  = $_POST['offsetpage'];
				if($_POST['pageMode']=='digital'){
					$cm_cpid = 1;
				}else if($_POST['pageMode']=='mylist_digital'){
					$checkQuery = 'mydigital';
					$cm_cpid = 1;
				}else if($_POST['pageMode']=='mylist_icos'){
					$cm_cpid = 2;
					$checkQuery = 'myicos';
				}else{
					$cm_cpid = 2;
				}
				if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
					$uuid = "";
				}else{
					$uuid = $this->session->userdata('user_id');
				}
				// $oderBy = "cm_overallrating";
				$oderBy 	= "cm_ico_end_date";
				$ascDesc 	= "asc";
				if($_POST['filterId']=='1'){
					$oderBy  = "cm_overallrating";
					$ascDesc = "desc";
				}else if($_POST['filterId']=='2'){
					$oderBy  = "cm_totalviews";
					$ascDesc = "desc";
				}else if($_POST['filterId']=='3'){
					$oderBy  = "cm_marketcap";
					$ascDesc = "desc";
				}else if($_POST['filterId']=='4'){
					$oderBy  = "cm_marketcap";
					$ascDesc = "asc";
				}else if($_POST['filterId']=='5'){
					$oderBy  = "cm_ico_start_date";
					$ascDesc = "asc";
				}else if($_POST['filterId']=='6'){
					$oderBy  = "cm_ico_start_date";
					$ascDesc = "desc";
				}else if($_POST['filterId']=='7'){
					$oderBy  = "cm_ico_end_date";
					$ascDesc = "asc";
				}else if($_POST['filterId']=='8'){
					$oderBy  = "cm_ico_end_date";
					$ascDesc = "desc";
				}
				if($oderBy == 'cm_ico_start_date' || $oderBy == 'cm_ico_end_date'){
					if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
						$searchterms  = $_POST['searchterms'];
						// $getCompanies = $this->Companies_model->getSerachDigitalIcos1($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);
						$getCompanies = $this->Companies_model->getSearchDgtlIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);
						$cnt = $this->Companies_model->getSerachDigitalIcos1Count($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);$counts = $this->Companies_model->getSearchDgtlIcosCounts($cm_cpid,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);


					}else{
						$searchterms  =  '';
						// $getCompanies = $this->Companies_model->getDigitalIcos1($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);

						$getCompanies = $this->Companies_model->getSearchDgtlIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);
						$cnt = $this->Companies_model->getDigitalIcos1Count($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
						$counts = $this->Companies_model->getSearchDgtlIcosCounts($cm_cpid,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);

					}
				}else{

					if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
						// $searchterms  = $_POST['searchterms'];
						// $getCompanies = $this->Companies_model->getSerachDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);
						$searchterms  = $_POST['searchterms'];
						$getCompanies = $this->Companies_model->getSearchDgtlIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);
						$cnt		 = $this->Companies_model->getSerachDigitalIcosCount($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);
						$counts = $this->Companies_model->getSearchDgtlIcosCounts($cm_cpid,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);

					}else{
						// $searchterms = '';
						// $getCompanies = $this->Companies_model->getDigitalIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$uuid,$checkQuery);
						$searchterms = '';
						$getCompanies = $this->Companies_model->getSearchDgtlIcos($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);
						$cnt = $this->Companies_model->getDigitalIcosCount($cm_cpid,$limit,$offset,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery);
						$counts = $this->Companies_model->getSearchDgtlIcosCounts($cm_cpid,$oderBy,$ascDesc,$searchterms,$uuid,$checkQuery,$_POST['filterId']);
					}
				}
				if(sizeof($getCompanies)>0){
					$checkRecords =1;
					foreach($getCompanies as $key=>$value){
						$data = array();
						$company_id = $value->cm_id;
						$number_of_reviews = $this->Companies_model->count_reviews($company_id);
						$company_reviews = $this->Companies_model->assetLastReview($company_id);
						$total_likes_count = 0;
						$total_dislikes_count = 0;
						foreach($company_reviews->result_array() as $row){
							if(isset($row['re_likes_cnt'])){
								$re_likes_cnt = $row['re_likes_cnt'];
							}
							else{
								$re_likes_cnt = 0;
							}
							$total_likes_count = $total_likes_count + $re_likes_cnt;

							if(isset($row['re_dislike_cnt'])){
								$re_dislikes_cnt = $row['re_dislike_cnt'];
							}
							else{
								$re_dislikes_cnt = 0;
							}
							$total_dislikes_count = $total_dislikes_count + $re_dislikes_cnt;
						}
						$last_review = $company_reviews->last_row('array');
						$last_review_userid = $last_review['re_uid'];
						$last_review_details = $this->User_model->getUserDetails($last_review_userid);
						$html .='<div class="col-md-4 mar_t40" style = "min-height:410px;">
						<ul class="products-list product-list-in-box">
							<li class="item center">
							<div class="product_zorder">
							  <div class="product-img company_img_width">';
							  if($value->cm_picture!=""){
								  if($value->cm_ctid == 1){
									 if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){
										$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
									 }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){
										$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
									 }else if($value->cm_picture!=""){
					$srcc = base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
										if(@getimagesize($srcc)){
											$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
										}else{
											$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
										}
									 }else{
										$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
									}
								}else if($value->cm_ctid == 2){
									if($value->cm_picture!=""){
										$srcc = base_url().'asset/img/companies/icotracker/'.$value->cm_picture;
										if(@getimagesize($srcc)){
											$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'" alt="Coinenthu" class="img-responsive  img-circle digital_box_image"></a>';
										}else{
											$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu"
											class="img-responsive  img-circle digital_box_image"></a>';
										}
									}else{
										$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu"
										class="img-responsive img-circle digital_box_image"></a>';
									}
								}
							  }else{
								  if($value->cm_ctid == 1){
									$html.='<a href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
								  }else if($value->cm_ctid == 2){
									$html.='<a href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'"><img src="'.base_url().'images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image"></a>';
								  }
								}
						$html.='</div>
							  <div class="product-info text-left">';
							  if($value->cm_ctid == 1){
									$html.='<a title="'.$value->cm_name.'" href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'" class="product-title NoirProSemiBold">'.$value->cm_name.'</a><input id="rating_val" name="input-6" class="rating rating-loading" value="'.$value->cm_overallrating.'" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">';
							  }elseif($value->cm_ctid == 2){
								$html.='<a title="'.$value->cm_name.'" href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'" class="product-title NoirProSemiBold">'.$value->cm_name.'</a><input id="rating_val" name="input-6" class="rating rating-loading" value="'.$value->cm_overallrating.'" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">';
							  }
						$html.='<span class="product-description">';
						$html.='<div class="star_in"><div class="rating_value">
								<span>';
						$html.='<div class="row">';

						if(isset($last_review)){
						if($uuid == $last_review_details->u_uid){
							$html.='<div class="col-xs-12 NoirProMedium"><a href = "'.base_url().'display-profile">'.ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname).'</a></div>';
						}else{
							$html.='<div class="col-xs-12 NoirProMedium"><a href = "'.base_url().'Profile/'.$last_review_details->u_username.'">'.ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname).'</a></div>';
						}
						if($last_review_details->u_about != ""){
							$html.='<div class="col-xs-12 NoirProLight" style="font-size:11px;color:#424242;">'.ucfirst($last_review_details->u_about).'</div>';
						}else{
							$html.='<div><span class="col-xs-12 set_height_br"></span></div>';
						}
                        $string = strip_tags($last_review['re_decript']);
							if (strlen($string) > 100) {

								$stringCut = substr($string, 0, 100);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
							}
						$html.='<div class="col-xs-12" style="height:90px;">'.ucfirst($string).'</div>';
						}else{
						$string = strip_tags($value->cm_decript);
							if (strlen($string) > 100) {

								$stringCut = substr($string, 0, 100);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
							}
						$html.='<div class="col-xs-12 NoirProMedium">DESCRIPTION</div><div><span class="col-xs-12 set_height_br"></span></div><span class="col-xs-12" style="height:90px;">'.ucfirst($string).'</span><br>';


						}
						if($value->cm_ctid == 1){
							$html.='<br/><a class="col-xs-12" href="'.base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name).'" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
						}elseif($value->cm_ctid ==2){
							$html.='<br/><a class="col-xs-12" href="'.base_url().'ICOs/'.str_replace(" ","_",$value->cm_name).'" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
						}
						$html.='<hr class="col-xs-12">';




							//$html.=$cm_totalviews. ' Reviews';
							if ($number_of_reviews == 1){
								$review_s = 'Review';
							}
							else{
								$review_s = 'Reviews';
							}
							if ($total_likes_count == 1){
								$like_s = 'Like';
							}
							else{
								$like_s = 'Likes';
							}
							if ($total_dislikes_count == 1){
									$dislike_s = 'Dislike';
							}
							else{
									$dislike_s = 'Dislikes';
							}
							$html.='<div class="col-xs-12"><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> '.$total_likes_count.' '.'<span class="dis2_block">'.$like_s.'</span></span></div><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> '.$total_dislikes_count.' '.'<span class="dis2_block">'.$dislike_s.'</span></span></div><div class="col-xs-4 pad_0"><i class="fa fa-commenting" aria-hidden="true"></i><span> '.$number_of_reviews.' '.'<span class="dis2_block">'.$review_s.'</span></span></div></div>';
							/* if($value->cm_overallrating != ''){
								$cMOvrlRtng = $value->cm_overallrating;
							}else{
								$cMOvrlRtng = 0;
							}
							*/
							$html.='<a href="'.base_url().'company-full-view/'.str_replace(" ","_",$value->cm_name).'" style="color:black;"><button class = "pull-right btn btn-default" style="color:orange;display:none;">View Reviews</button></a>';
							/*

							$html.='&nbsp;'.number_format($cMOvrlRtng, 1, '.', '').'&nbsp;';
							$html.='</span></strong><span class="grey small">/</span><span class="grey small">10</span></div>';
							$html.='<a href="#" class="rating_count"><span class="small">'.$cm_totalviews.'</span></a></div>';
							$html.='<a href="'.base_url().'write-a-review/'.$value->cm_unique_id.'"><div class="image_rating_ad image_rating_ad_hover">
							<small><span class="rate_text mar_tt_5">Rate</span><span class="rate_text mar_t_5">This</span></small></div></a></div>';
								 */



							$html.=	'</div>	';
							$html.='</span>

							  </div>';
							if($_POST['pageMode']=='mylist_digital' || $_POST['pageMode']=='mylist_icos'){
								$html.='<div class="company_ed_icons">';
								$html.='<a href="javascript:void(0);" onclick="eidtCompanyView('.$value->cm_id.','.$value->cm_ctid.');" class="btn btn-default c_pad_btn1"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
							<a href="javascript:void(0);" onClick="deleteCompanyview('.$value->cm_id.','.$value->cm_ctid.')"class="btn btn-default c_pad_btn2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						  </div>';
							}
						$html.='</li>
						</ul>
						</div>';
					}
					if(isset($_POST["filter"]) && $_POST["filter"]=="filetrfrom"){
						$html.='<span id="loadingData"></span>';
					}
					echo json_encode(array('status'=>TRUE,'output'=>'success','resData'=>$html,'cnt'=>count($counts)));exit;
				}else{
					if($checkRecords==0){
						if(isset($_POST['searchterms']) && $_POST['searchterms']!=""){
							$html.="There are no search records found.";
						}else if($_POST['pageMode']=='digital'){
							$html.="There are no assets.";
						}else if($_POST['pageMode']=='mylist_digital'){
							$html.="You have not yet added any companies.";
						}else if($_POST['pageMode']=='mylist_icos'){
							$html.="You have not yet added any companies.";
						}else{
							$html.="No ICOs listed.";
						}
						echo json_encode(array('status'=>TRUE,'output'=>'norecoreds','resData'=>$html,'cnt'=>count($counts)));exit;
					}
				}
			}
		}
		public function addDigitalAsset(){
			$data = Array();
			$this->session->set_userdata('redirect_page', 0);
			$data['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();
			if($this->session->userdata('user_id') != ""){
				$this->show('add-digital-asset',$data);
			}else{
				$this->session->set_userdata('redirect_page', 1);
				redirect(base_url().'login');
			}
		}

		public function addEvent(){
			$data = Array();
			$this->session->set_userdata('redirect_page', 0);
			if($this->session->userdata('user_id') != ""){
				$data['cities'] = $this->Companies_model->getCitiesSort(1);
				$data['countries'] = $this->Companies_model->getCountriesSort(1);
				$this->show('add-event',$data);
			}else{
				$this->session->set_userdata('redirect_page', 3);
				redirect(base_url().'login');
			}
		}
		public function addEventView(){
			$this->load->helper(array('common'));
			if(isset($_POST) && !empty($_POST)){
				if(isset($_FILES['event_uploaded_file']['name']) && $_FILES['event_uploaded_file']['name'] != ""){
					$evntName = $_POST['ev_name'];
					$eventName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $evntName));
					$fileName = $_FILES["event_uploaded_file"]["name"];
					$fileTmpLoc = $_FILES["event_uploaded_file"]["tmp_name"];
					$target_dir     = base_url().'asset/img/events/main/';
					$temp           = explode(".", $_FILES['event_uploaded_file']["name"]);
					$newfilename    = date('Ymd_His') . '.' . end($temp);
					move_uploaded_file($_FILES["event_uploaded_file"]["tmp_name"], 'asset/img/events/main/'.$newfilename);
					// move_uploaded_file( $_FILES['digital_uploaded_file']["tmp_name"],$target_file);
					$kaboom = explode(".", $fileName);
					$fileExt = end($kaboom);
					$target_file = 'asset/img/events/main/'.$newfilename;
					$resized_file = 'asset/img/events/main/event_'.$eventName.'_'.$newfilename;
					$wmax = 160;
					$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
					$reImage = explode('/',$getImagNames);
					$resizeImg = $reImage[4];
				}
				$user_id = $this->session->userdata('user_id');
				$insert_from = 'User';
				$country_id= $this->Companies_model->AddEventCountry($this->input->post(),$insert_from  );
				$city_id =   $this->Companies_model->AddEventCity($this->input->post(),$insert_from,$country_id  );

				//echo $city_id;exit;
				$event_id =  $this->Companies_model->AddEvent($this->input->post(),$user_id,$insert_from,$resizeImg,$city_id,$country_id);

				if(!empty($_POST['sp_name'])){
					foreach($_POST['sp_name'] as $key=>$spname)
					{
						if(isset($_FILES['sp_profile_image']['name'][$key]) && $_FILES['sp_profile_image']['name'][$key] != ""){
							$spkrName = $_POST['sp_name'][$key];
							$speakerName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $spkrName));
							$fileName2 = $_FILES["sp_profile_image"]["name"][$key];
							$fileTmpLoc2 = $_FILES["sp_profile_image"]["tmp_name"][$key];
							$target_dir2     = base_url().'asset/img/events/speakers/';
							$temp2           = explode(".", $_FILES['sp_profile_image']["name"][$key]);
							$newfilename2    = date('Ymd_His') . '.' . end($temp2);
							move_uploaded_file($_FILES["sp_profile_image"]["tmp_name"][$key], 'asset/img/events/speakers/'.$newfilename2);
							// move_uploaded_file( $_FILES['digital_uploaded_file']["tmp_name"],$target_file);
							$kaboom2 = explode(".", $fileName2);
							$fileExt2 = end($kaboom2);
							$target_file2 = 'asset/img/events/speakers/'.$newfilename2;
							$resized_file2 = 'asset/img/events/speakers/speaker_'.$speakerName.'_'.$newfilename2;
							$wmax2 = 160;
							$getImagNames2 = ak_img_resize($target_file2, $resized_file2, $wmax2, $fileExt2);
							$reImage2 = explode('/',$getImagNames2);
							$spimage = $reImage2[4];

						}else{
							$spimage = '';
						}
						$ctResult 	= $this->Companies_model->addEventSpeakers($event_id,$spname,$_POST['sp_designation'][$key],$_POST['sp_profile_url'][$key],$spimage);
					}
				}
				$day_of_agenda = 1;
				if(!empty($_POST['time1'])){
					foreach($_POST['time1'] as $key=>$agtime){
						if($agtime != ""){
							$agendaStatus = $this->Companies_model->addEventAgendaZ($event_id,$agtime,$_POST['event1'][$key],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time2'])){
					foreach($_POST['time2'] as $key2=>$agtime2){
						if($agtime2 != ""){
							$agendaStatus2 = $this->Companies_model->addEventAgendaZ($event_id,$agtime2,$_POST['event2'][$key2],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time3'])){
					foreach($_POST['time3'] as $key3=>$agtime3){
						if($agtime3 != ""){
							$agendaStatus3 = $this->Companies_model->addEventAgendaZ($event_id,$agtime3,$_POST['event3'][$key3],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time4'])){
					foreach($_POST['time4'] as $key4=>$agtime4){
						if($agtime4 != ""){
							$agendaStatus4 = $this->Companies_model->addEventAgendaZ($event_id,$agtime4,$_POST['event4'][$key4],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}

				if(!empty($_POST['time5'])){
					foreach($_POST['time5'] as $key5=>$agtime5){
						if($agtime5 != ""){
							$agendaStatus5 = $this->Companies_model->addEventAgendaZ($event_id,$agtime5,$_POST['event5'][$key5],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}

				if(!empty($_POST['time6'])){
					foreach($_POST['time6'] as $key6=>$agtime6){
						if($agtime6 != ""){
							$agendaStatus6 = $this->Companies_model->addEventAgendaZ($event_id,$agtime6,$_POST['event6'][$key6],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time7'])){
					foreach($_POST['time7'] as $key7=>$agtime7){
						if($agtime7 != ""){
							$agendaStatus7 = $this->Companies_model->addEventAgendaZ($event_id,$agtime7,$_POST['event7'][$key7],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time8'])){
					foreach($_POST['time8'] as $key8=>$agtime8){
						if($agtime8 != ""){
							$agendaStatus8 = $this->Companies_model->addEventAgendaZ($event_id,$agtime8,$_POST['event8'][$key8],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time9'])){
					foreach($_POST['time9'] as $key9=>$agtime9){
						if($agtime9 != ""){
							$agendaStatus9 = $this->Companies_model->addEventAgendaZ($event_id,$agtime9,$_POST['event9'][$key9],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time10'])){
					foreach($_POST['time10'] as $key10=>$agtime10){
						if($agtime10 != ""){
							$agendaStatus10 = $this->Companies_model->addEventAgendaZ($event_id,$agtime10,$_POST['event10'][$key10],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time11'])){
					foreach($_POST['time11'] as $key11=>$agtime11){
						if($agtime11 != ""){
							$agendaStatus11 = $this->Companies_model->addEventAgendaZ($event_id,$agtime11,$_POST['event11'][$key11],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time12'])){
					foreach($_POST['time12'] as $key12=>$agtime12){
						if($agtime12 != ""){
							$agendaStatus12 = $this->Companies_model->addEventAgendaZ($event_id,$agtime12,$_POST['event12'][$key12],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time13'])){
					foreach($_POST['time13'] as $key13=>$agtime13){
						if($agtime13 != ""){
							$agendaStatus13 = $this->Companies_model->addEventAgendaZ($event_id,$agtime13,$_POST['event13'][$key13],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time14'])){
					foreach($_POST['time14'] as $key14=>$agtime14){
						if($agtime14 != ""){
							$agendaStatus14 = $this->Companies_model->addEventAgendaZ($event_id,$agtime14,$_POST['event14'][$key14],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				if(!empty($_POST['time15'])){
					foreach($_POST['time15'] as $key15=>$agtime15){
						if($agtime15 != ""){
							$agendaStatus15 = $this->Companies_model->addEventAgendaZ($event_id,$agtime15,$_POST['event15'][$key15],$day_of_agenda);
						}
					}
					$day_of_agenda++;
				}
				$getAdminDtls = $this->Companies_model->getAdminDetails( );
				$mailDetails = Array();
				$mailDetails['name'] = $_POST['ev_name'];
				$config = array (
					'mailtype' => 'html',
					'charset'  => 'utf-8',
					'priority' => '1'
				);
				$email = $getAdminDtls->u_email;
				$this->email->initialize($config);
				$this->load->library('email');
				$from_email = $this->input->post('cm_email');
				$to_email   = 'info@coinenthu.com';
				$this->email->from($from_email, 'Coinenthu');
				$this->email->to($to_email);
				$this->email->subject('Event Approval.');
				$message = $this->load->view('mail_templates/daico-mail-template',$mailDetails,TRUE);
				$this->email->message($message);
				$this->email->send();
				// echo $message;exit;
				echo $event_id;exit;

			}

		}

		public function getComonImage(){
			$this->load->helper(array('common'));
			//print_r($_FILES);exit;
			/* if(isset($_FILES['digital_uploaded_file']['name']) && $_FILES['digital_uploaded_file']['name'] != ""){
				$fileName = $_FILES["digital_uploaded_file"]["name"];
				//print_r($fileName)	;exit;
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
				$resized_file = 'asset/img/companies/digitalasset/digital_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[4];
				//print_r($resizeImg);exit;
			}else if($_FILES['ico_uploaded_file']['name'] && $_FILES['ico_uploaded_file']['name'] != ""){
				//echo 'else';exit;
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
				$resized_file = 'asset/img/companies/icotracker/ico_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[4];
				//print_r($resizeImg);exit;
			}else  */if($_FILES['edit_user_file']['name'] && $_FILES['edit_user_file']['name'] != ""){
				//echo 'else';exit;
				$fileName = $_FILES["edit_user_file"]["name"];
				$fileTmpLoc = $_FILES["edit_user_file"]["tmp_name"];
				$target_dir     = base_url().'asset/img/users/';
				$temp           = explode(".", $_FILES['edit_user_file']["name"]);
				$newfilename    = date('Ymd_His') . '.' . end($temp);
				//$target_file     = $target_dir . $newfilename;
				move_uploaded_file($_FILES["edit_user_file"]["tmp_name"], 'asset/img/users/'.$newfilename);
				// move_uploaded_file( $_FILES['uploaded_file']["tmp_name"],$target_file);
				$kaboom = explode(".", $fileName);
				$fileExt = end($kaboom);
				$target_file = 'asset/img/users/'.$newfilename;
				$resized_file = 'asset/img/users/users_'.$newfilename;
				$wmax = 160;
				$getImagNames = ak_img_resize($target_file, $resized_file, $wmax, $fileExt);
				$reImage = explode('/',$getImagNames);
				$resizeImg = $reImage[3];
				//print_r($reImage);exit;
			}
			$modifiedImag = $resizeImg;
			echo json_encode(array('status'=>TRUE,'output'=>$modifiedImag));
		}
		public function addDigitalAssetView()
		{
			$this->load->helper(array('common'));
			if(isset($_POST) && !empty($_POST))
			{
				if(isset($_FILES['digital_uploaded_file']['name']) && $_FILES['digital_uploaded_file']['name'] != ""){
					$comName = $_POST['cm_name'];
					$compName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $comName));
					$fileName = $_FILES["digital_uploaded_file"]["name"];
					$fileTmpLoc = $_FILES["digital_uploaded_file"]["tmp_name"];
					$target_dir     = base_url().'asset/img/companies/digitalasset/';
					$temp           = explode(".", $_FILES['digital_uploaded_file']["name"]);
					$newfilename    = date('Ymd_His') . '.' . end($temp);
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
				//print_r($resizeImg);exit;
				$userId = $this->session->userdata('user_id');
				$insert_from = 'User';
				/* $resizImg = $_POST['userhidImage'];
				$imgarry =  explode('_',$resizImg);
				$comName = $_POST['cm_name'];
				$compName = strtolower(preg_replace('/[^a-zA-Z0-9-_\.]/','_', $comName));
				$resizeImg = $imgarry[0].'_'.$compName._.$imgarry[1].'_'.$imgarry[2];
				//print_r($resizeImg);exit; */
				$companyId = $this->Companies_model->addDigitalAsset($this->input->post(),$userId,$insert_from,$resizeImg);
				$cm_unique_id = 'BOP'.str_pad((int)$companyId, 6, "0", STR_PAD_LEFT);
				$inserted_unqiue_code = $this->Companies_model->insertedUnqiueCode($companyId,$cm_unique_id);
				//coreteam
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
							$mileStResult 	= $this->Companies_model->addMileStone($companyId,$milestonename,$_POST['ms_link'][$mkey],2);
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
				//mail to Admin
				//Mail
				$getAdminDtls = $this->Companies_model->getAdminDetails( );
				$mailDetails = Array();
				$mailDetails['name'] = $_POST['cm_name'];
				$config = array (
					'mailtype' => 'html',
					'charset'  => 'utf-8',
					'priority' => '1'
				);
				$email = $getAdminDtls->u_email;
				$this->email->initialize($config);
				$this->load->library('email');
				$from_email = $this->input->post('cm_email');
				$to_email   = 'info@coinenthu.com';
				$this->email->from($from_email, 'Coinenthu');
				$this->email->to($to_email);
				$this->email->subject('Digital Asset OR ICO Approval.');
				$message = $this->load->view('mail_templates/daico-mail-template',$mailDetails,TRUE);
				$this->email->message($message);
				$this->email->send();
				// echo $message;exit;
				echo $companyId;exit;
			}else{
				$data = Array();
				$data['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();

				$this->show_admin('admin/add-digital-asset',$data);
			}
		}
		public function digitalAssetEdit(){
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') == ""){
				redirect('login', 'refresh');
			}else{
				$data = array();
				$urlData 	= $this->uri->segment(2);
				$explodedData = explode('-',$urlData);
				$companyType 	= $explodedData[0];
				$companyId 	 	= $explodedData[1];
				$userId 		= $this->session->userdata('user_id');
				$results 		= $this->Companies_model->getDigitalAssetDetails($companyId,$userId,$companyType);
				// echo '<pre>';print_r($results);exit;
				$finalData['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();
				if(sizeof($results) > 0){
					foreach($results as $key=>$details)
					{
						$data['company_id'] = $details->cm_id;
						if(isset($details->cm_name) && $details->cm_name != ""){
							$data['company_name'] = $details->cm_name;
						}else{
							$data['company_name'] = '';
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
						if(isset($details->cm_coinmarket_cap) && $details->cm_coinmarket_cap != ""){
							$data['cm_coinmarket_cap'] = $details->cm_coinmarket_cap;
						}else{
							$data['cm_coinmarket_cap'] = '';
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
						if(isset($details->cm_discord) && $details->cm_discord != ""){
							$data['cm_discord'] = $details->cm_discord;
						}else{
							$data['cm_discord'] = '';
						}
						if(isset($details->cm_twitter) && $details->cm_twitter != ""){
							$data['cm_twitter'] = $details->cm_twitter;
						}else{
							$data['cm_twitter'] = '';
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
					if($companyType==1){
						$this->show('digital-asset-edit',$finalData);
					}else{
						$this->show('ico-tracker-edit',$finalData);
					}
				}
			}
		}
		public function updateDigitalAsset()
		{
			$userId = $this->session->userdata('user_id');
			$this->load->helper(array('common'));
			if(isset($_POST) && $_POST != "" && !empty($_POST))
			{
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
		private function bopUploadUpdateFiles($uId,$uploadFiles,$post){
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
		public function addIcoTracker(){
			$this->session->set_userdata('redirect_page', 0);
			if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){	   $this->session->set_userdata('redirect_page',2);
				redirect('login', 'refresh');
			}else{
				$data = Array();
				$data['milestoneStatuses'] = $this->Companies_model->getMilestoneStatuses();
				$this->show('add-ico-tracker',$data);
			}
		}
		public function deleteCompaniesMethod(){
			if(isset($_POST['hidcmid']) && $_POST['hidcmid']!=""){
				$cm_id = $_POST['hidcmid'];
				$cm_uid = $this->session->userdata('user_id');
				$reg_id = $this->Companies_model->deleteCompanyLists($cm_id,$cm_uid );
				echo json_encode(array('status'=>TRUE,'output'=>'success'));
			}
		}
		public function icoPostsExpiration()
		{
			$icoEndDates = $this->Companies_model->getIcoEndDates();
			if(count($icoEndDates) > 0)
			{
				foreach($icoEndDates as $icoendDt)
				{
					if($icoendDt->cm_ico_end_date != ""){
						$d1 			= new DateTime($icoendDt->cm_ico_end_date);
						$d2 			= new DateTime(date('Y-m-d'));
						$numOfDays 		= $d1->diff($d2)->d;
						if($numOfDays > 10)
						{
							$icoEndDates = $this->Companies_model->updateIcosAsDa($icoendDt->cm_id);

						}
					}

				}
				echo 'Updated Successfully';
			}else{
				echo 'Some error occurs,Please try again.';
			}
		}
		private function getCompDtlsApi($company)
		{   $name_error_coins = array("37","42","49","58","56","74","195","79","84","87","110","117","118","121","124","136","141","155","163","166","168","183","199","201","203","219","243","385","388","391","123","176");
			$result = $this->Companies_model->getcompanyinfobyname($company);
			if (count($result)>0){
				foreach($result as $key=>$value){
					$company_id = $value->cm_id;
					if(in_array($company_id,$name_error_coins)){
						$cm_api_name = $value->cm_apiname;
					}
					else{
						$cm_api_name = $company;
					}
				}
			}

			$url = "https://api.coinmarketcap.com/v1/ticker/".$cm_api_name."/";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL,$url);
			$result=curl_exec($ch);
			curl_close($ch);

			$res =  json_decode($result, true);
			return $res;exit;

		}
		public function getCompDetailsApi()
		{
			if(isset($_POST['companyId']) && $_POST['companyId'] != "") {
				$companyId = $_POST['companyId'];
				$data = Array();
				$comp = $this->Companies_model->getcompanyUniqueId($companyId);
				$name_error_coins = array("37","42","49","58","56","74","195","79","84","87","110","117","118","121","124","136","141","155","163","166","168","183","199","201","203","219","243","385","388","391","123","176");
				if(in_array($companyId, $name_error_coins)){
					$compnyName = $comp->cm_apiname;
				}
				else{
					$compnyName = $comp->cm_name;
				}
				$url = "https://api.coinmarketcap.com/v1/ticker/".$compnyName."/";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_URL,$url);
				$result=curl_exec($ch);
				curl_close($ch);
				$res =  json_decode($result, true);

				if(count($res) >0 && !isset($res['error']))
				{
					$data['market_cap'] 				= number_format($res[0]['market_cap_usd']);
					$data['price_usd']					= number_format($res[0]['price_usd'], 2, '.', ',');
					$data['volume'] 					= number_format($res[0]['24h_volume_usd']);
					$data['percent_change_24h'] 		= number_format($res[0]['percent_change_24h'], 2, '.', ',');
					$data['available_supply'] 			= number_format($res[0]['available_supply']);
					$data['total_supply'] 				= number_format($res[0]['total_supply']);
				}
				if(isset($data['market_cap']) && $data['market_cap'] != ""){
					$updteMarketcap = $this->Companies_model->updateMarketCapVal($data['market_cap'],$companyId);
				}
				echo json_encode($data);exit;
			} else {
				$companies = $this->Companies_model->getCompanies(1);
				$i=0;
				$cnt = 0;
				$name_error_coins = array("37","42","49","58","56","74","195","79","84","87","110","117","118","121","124","136","141","155","163","166","168","183","199","201","203","219","243","385","388","391","123","176");
				foreach($companies as $key=>$comp) {
					$companyId = $comp->cm_id;
					$data = Array();
                    if(in_array($companyId,$name_error_coins)){
						$compnyName = $comp->cm_apiname;
					}
					else{
						$compnyName = $comp->cm_name;
					}
					echo "CompanyName: ".$compnyName.' --- update is waiting. <br/>';
					$url = "https://api.coinmarketcap.com/v1/ticker/".$compnyName."/";
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_URL,$url);
					$result=curl_exec($ch);
					curl_close($ch);
					$res =  json_decode($result, true);
					if(count($res) >0 && !isset($res['error']))
					{
						$data['market_cap'] 				= number_format($res[0]['market_cap_usd']);
						$data['price_usd']					= number_format($res[0]['price_usd'], 2, '.', ',');
						$data['volume'] 					= number_format($res[0]['24h_volume_usd']);
						$data['percent_change_24h'] 		= number_format($res[0]['percent_change_24h'], 2, '.', ',');
						$data['available_supply'] 			= number_format($res[0]['available_supply']);
						$data['total_supply'] 				= number_format($res[0]['total_supply']);
					}
					if(isset($data['market_cap']) && $data['market_cap'] != ""){
						$cnt = $cnt+1;
						$updteMarketcap = $this->Companies_model->updateMarketCapVal($data['market_cap'],$companyId);
						echo "CompanyName: ".$compnyName.' ---- is Updated. <br/>';
					}
					$updateCronChecker = $this->Companies_model->updateChecker($companyId,"cmid");
					$i++;
				}
				$updatedCompaniesCount = 0;
				$updatedCompaniesCount = $this->Companies_model->getCronCheckerCount();
				if($updatedCompaniesCount=='0'){
					$updateCronChecker = $this->Companies_model->updateChecker(1,"ucmid");
				}
				echo $cnt;exit;
			}
		}
		public function checkReviewForallow()
		{
			$date = date('Y-m-d');
			$hour = date('H');
			$minute = date('i');
			$lastreview = $this->Companies_model->getLastReviews($date,$hour,$minute,$_POST);
			echo json_encode(array('status'=>TRUE,'output'=>count($lastreview)));
		}
		public function checkReplyForallow()
		{
			$date = date('Y-m-d');
			$hour = date('H');
			$minute = date('i');
			$lastreply = $this->Companies_model->getLastReply($date,$hour,$minute,$_POST);
			echo json_encode(array('status'=>TRUE,'output'=>count($lastreply)));
		}

	}


?>
