<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
		// return $this->db->last_query();
		// echo $this->db->get_compiled_select();exit;

    }
	public function deleteTopCompany($tcm_id){

		$this->db->where('tcm_id', $tcm_id);
        $this->db->delete('bop_top_companies');

	}
	public function editReply($crr_id){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_id',$crr_id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getLastReviews($date,$hour,$minute,$post){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_uid',$post['userId']);
		$this->db->where('re_cmid',$post['companyId']);
		$this->db->where('DATE(re_createdat)',$date);
		$this->db->where('HOUR(re_createdat)',$hour);
		$this->db->where('MINUTE(re_createdat)',$minute);
		// $this->db->order_by('re_id','desc');
		$this->db->order_by('re_createdat','desc');
		// $this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}
	public function assetLastReview($company_id){
		$this->db->select('*');
		$this->db->from('bop_company_reviews');
		$this->db->where('re_cmid',$company_id);
		$query = $this->db->get();
		return $query;
	}
	public function getLastReplyByUser($review_id,$uid){
		$this->db->select('*');
		$this->db->from('bop_company_review_replies');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_company_review_replies.crr_uid','LEFT');
		$this->db->where('bop_company_review_replies.crr_reid',$review_id);
		$this->db->where('bop_company_review_replies.crr_uid',$uid);
		$query = $this->db->get();
		return $query;
	}

	public function userReviews($user_id){
		$this->db->select('*');
		$this->db->from('bop_company_reviews');
		$this->db->where('re_uid',$user_id);
		$query = $this->db->get();
		return $query;
	}
	public function userReplies($user_id){
		$this->db->select('*');
		$this->db->from('bop_company_review_replies');
		$this->db->where('crr_uid',$user_id);
		$query = $this->db->get();
		return $query;
	}
	public function getLastReply($date,$hour,$minute,$post){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_uid',$post['userId']);
		$this->db->where('crr_reid',$post['re_id']);
		$this->db->where('DATE(crr_createdat)',$date);
		$this->db->where('HOUR(crr_createdat)',$hour);
		$this->db->where('MINUTE(crr_createdat)',$minute);
		// $this->db->order_by('re_id','desc');
		$this->db->order_by('crr_createdat','desc');
		// $this->db->limit(5);
		$query = $this->db->get();

		return $query->result();
	}
	public function deleteReviewStatus($re_id,$statusMode){
		$this->db->where('re_id', $re_id);
        $this->db->delete('bop_company_reviews');
	}
	public function deleteReview($review_id){
		$this->db->where('re_id', $review_id);
		$this->db->delete('bop_company_reviews');
        return 1;  
	}
	public function deleteReviewReply($review_id){
		$this->db->where('crr_reid',$review_id);
		$this->db->delete('bop_company_review_replies');
		return 1;
	}
	public function deleteReply($reply_id){
		$this->db->where('crr_id',$reply_id);
		$this->db->delete('bop_company_review_replies');
		return 1;
	}

	public function deleteReplyStatus($crr_id,$statusMode){
		$this->db->where('crr_id', $crr_id);
        $this->db->delete('bop_company_review_replies');
	}
	public function deleteReviewReplies($crr_reid){
		$darray = array($crr_reid);
		$this->db->where_in('TRIM(bop_company_review_replies.crr_reid)',$darray);
        $this->db->delete('bop_company_review_replies');
	}
	public function deleteReviewReport($rr_reid){
		$darray = array($rr_reid);
		$this->db->where_in('TRIM(bop_review_reponses.rr_reid)',$darray);
        $this->db->delete('bop_review_reponses');
	}
	public function deleteReplyReport($rrr_crr_id){
		$darray = array($rrr_crr_id);
		$this->db->where_in('TRIM(bop_replies_reponses.rrr_crr_id)',$darray);
        $this->db->delete('bop_replies_reponses');
	}
	public function getReviewReplies($crr_reid){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_reid',$crr_reid);
		$query = $this->db->get();
		return $query->result();
	}
	public function getIcoEndDates(){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where('cm_ctid',2);
		$query = $this->db->get();
		return $query->result();
	}
	public function changeReportStatus($rrr_id){
		$data = array(
			'rrr_report'         => '',
			'rrr_report_reponse' => '',
			'rrr_modifiedat'     => date('Y-m-d H:i:s'),
		);
		$this->db->where('rrr_id',$rrr_id);
		if($this->db->update('bop_replies_reponses',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function changeReviewReportStatus($rr_id){
		$data = array(
			'rr_report'         => '',
			'rr_report_reponse' => '',
			'rr_modifiedat'     => date('Y-m-d H:i:s'),
		);
		$this->db->where('rr_id',$rr_id);
		if($this->db->update('bop_review_reponses',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReplyReviewLikes($crr_id,$likesCount,$dislikesCount){
		$data = array(
			'crr_likes_cnt'   => $likesCount,
			'crr_dislike_cnt' => $dislikesCount,
			'crr_modifiedat' => date('Y-m-d H:i:s'),
		);
		$this->db->where('crr_id',$crr_id);
		if($this->db->update('bop_company_review_replies',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReviewLikes($re_id,$likesReviews,$dislikesCount,$type=null){

		$data = array(
			're_dislike_cnt' => $dislikesCount,
			're_likes_cnt'   => $likesReviews,
			're_modifiedat'  => date('Y-m-d H:i:s'),
		);

		$this->db->where('re_id',$re_id);
		if($this->db->update('bop_company_reviews',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getReviewLikesDislikes($re_id){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_id',$re_id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getreplyReviewLikesDislikes($crr_id){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_id',$crr_id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getReviewLikesOrDislikes($rr_reid,$type){
		$this->db->select('*');
        $this->db->from('bop_review_reponses');
		$this->db->where('rr_reid',$rr_reid);
		if($type=='like'){
			$this->db->where('rr_like_dislike',1);
		}else if($type=='dislike'){
			$this->db->where('rr_like_dislike',0);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function getReviewReports($rr_reid){
		$this->db->select('*');
        $this->db->from('bop_review_reponses');
		$this->db->where('rr_report',1);
		$this->db->where('rr_reid',$rr_reid);
		$query = $this->db->get();
		return $query->result();
	}
	public function reviewReports($cmid){
		$this->db->select('*');
        $this->db->from('bop_review_reponses');
		$this->db->join('bop_company_reviews', 'bop_company_reviews.re_id = bop_review_reponses.rr_reid','LEFT');
		$this->db->join('bop_compaines', 'bop_compaines.cm_id = bop_company_reviews.re_cmid','LEFT');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_review_reponses.rr_uid','LEFT');
		$this->db->where('bop_review_reponses.rr_report',1);
		if($cmid!='0'){
			$this->db->where('bop_compaines.cm_id',$cmid);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function replyReports($cmid){
		$this->db->select('*');
        $this->db->from('bop_replies_reponses');
		$this->db->join('bop_company_review_replies', 'bop_company_review_replies.crr_id = bop_replies_reponses.rrr_crr_id','LEFT');
		$this->db->join('bop_company_reviews', 'bop_company_review_replies.crr_reid = bop_company_reviews.re_id','LEFT');
		$this->db->join('bop_compaines', 'bop_compaines.cm_id = bop_company_reviews.re_cmid','LEFT');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_replies_reponses.rrr_uid','LEFT');
		$this->db->where('bop_replies_reponses.rrr_report',1);
		if($cmid!='0'){
			$this->db->where('bop_compaines.cm_id',$cmid);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function getReplyReports($rrr_crr_id){
		$this->db->select('*');
        $this->db->from('bop_replies_reponses');
		$this->db->where('rrr_report',1);
		$this->db->where('rrr_crr_id',$rrr_crr_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function getreplyReviewLikesOrDislikes($rrr_crr_id,$type){
		$this->db->select('*');
        $this->db->from('bop_replies_reponses');
		$this->db->where('rrr_crr_id',$rrr_crr_id);
		if($type=='like'){
			$this->db->where('rrr_likes_dislikes',1);
		}else if($type=='dislike'){
			$this->db->where('rrr_likes_dislikes',0);
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function updateReviewsReports($re_id,$cnt){
		$data = array(
			're_reports_cnt' => $cnt,
		);
		$this->db->where('re_id',$re_id);
		if($this->db->update('bop_company_reviews',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReplyReports($crr_id,$cnt){
		$data = array(
			'crr_reports_cnt' => $cnt,
		);
		$this->db->where('crr_id',$crr_id);
		if($this->db->update('bop_company_review_replies',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function insertedLike($uid,$rr_like_dislike,$rr_id,$rr_reid){
		if($rr_id==""){
			$data = array(
				'rr_uid'          => $uid,
				'rr_reid' 	      => $rr_reid,
				'rr_like_dislike' => $rr_like_dislike,
				'rr_status'       => 1,
				'rr_createdat'    => date('Y-m-d H:i:s'),
			);
			if($this->db->insert('bop_review_reponses', $data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$data = array(
				'rr_like_dislike' => $rr_like_dislike,
				'rr_modifiedat'   => date('Y-m-d H:i:s'),
			);
			$this->db->where('rr_id',$rr_id);
			if($this->db->update('bop_review_reponses',$data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	public function insertReviewReplyReport($rrr_uid,$rrr_crr_id,$rr_report_reponse,$rrr_id){
		if($rrr_id==""){
			$data = array(
				'rrr_uid'            => $rrr_uid,
				'rrr_crr_id' 	     => $rrr_crr_id,
				'rrr_report'         => 1,
				'rrr_report_reponse' => $rr_report_reponse,
				'rrr_status'         => 1,
				'rrr_createdat'      => date('Y-m-d H:i:s'),
			);
			if($this->db->insert('bop_replies_reponses', $data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$data = array(
				'rrr_report_reponse' => $rr_report_reponse,
				'rrr_report'         => 1,
				'rrr_modifiedat'     => date('Y-m-d H:i:s'),
			);
			$this->db->where('rrr_id',$rrr_id);
			if($this->db->update('bop_replies_reponses',$data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	public function insertReviewReport($uid,$rr_reid,$rr_report_reponse,$rr_id){
		if($rr_id==""){
			$data = array(
				'rr_uid'           => $uid,
				'rr_reid' 	       => $rr_reid,
				'rr_report'        => 1,
				'rr_report_reponse' => $rr_report_reponse,
				'rr_status'         => 1,
				'rr_createdat'      => date('Y-m-d H:i:s'),
			);
			if($this->db->insert('bop_review_reponses', $data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$data = array(
				'rr_report_reponse' => $rr_report_reponse,
				'rr_report'        => 1,
				'rr_modifiedat'   => date('Y-m-d H:i:s'),
			);
			$this->db->where('rr_id',$rr_id);
			if($this->db->update('bop_review_reponses',$data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	public function checkReviewReplyReport($rrr_uid,$rrr_crr_id){
		$this->db->select('*');
        $this->db->from('bop_replies_reponses');
		$this->db->where('rrr_uid',$rrr_uid);
		$this->db->where('rrr_crr_id',$rrr_crr_id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function checkReviewReport($uid,$rr_reid){
		$this->db->select('*');
        $this->db->from('bop_review_reponses');
		$this->db->where('rr_uid',$uid);
		$this->db->where('rr_reid',$rr_reid);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getCheckReviewReply($uid,$crr_reid,$crr_decript,$crr_id){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_uid',$uid);
		$this->db->where('crr_reid',$crr_reid);
		$this->db->where('crr_decript',$crr_decript);
		$this->db->where('crr_id !=',$crr_id);
		$query = $this->db->get();
		// echo $this->db->last_query();exit;
		return $result = $query->result();
	}
	public function getReviewId($crr_id){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_id',$crr_id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function insertReviewReply($uid,$crr_reid,$crr_decript,$crr_id){
		if($crr_id==""){
			$data = array(
				'crr_uid'         => $uid,
				'crr_reid' 	      => $crr_reid,
				'crr_decript'     => $crr_decript,
				'crr_likes_cnt'   => 0,
				'crr_dislike_cnt' => 0,
				'crr_status'      => 1,
				'crr_createdat'   => date('Y-m-d H:i:s'),
			);
			if($this->db->insert('bop_company_review_replies', $data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$data = array(
				'crr_decript'      => $crr_decript,
				'crr_modifiedat'   => date('Y-m-d H:i:s'),
			);
			$this->db->where('crr_id',$crr_id);
			if($this->db->update('bop_company_review_replies',$data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	public function insertedReplyLike($rrr_uid,$rrr_likes_dislikes,$rrr_id,$rrr_crr_id){
		if($rrr_id==""){
			$data = array(
				'rrr_uid'            => $rrr_uid,
				'rrr_crr_id' 	     => $rrr_crr_id,
				'rrr_likes_dislikes' => $rrr_likes_dislikes,
				'rrr_status'         => 1,
				'rrr_createdat'      => date('Y-m-d H:i:s'),
			);
			if($this->db->insert('bop_replies_reponses', $data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$data = array(
				'rrr_likes_dislikes' => $rrr_likes_dislikes,
				'rrr_modifiedat'     => date('Y-m-d H:i:s'),
			);
			$this->db->where('rrr_id',$rrr_id);
			if($this->db->update('bop_replies_reponses',$data) === FALSE){
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}
	public function checkUserReplyLiked($rrr_uid,$rrr_crr_id,$type){
		$this->db->select('*');
        $this->db->from('bop_replies_reponses');
		$this->db->where('rrr_uid',$rrr_uid);
		$this->db->where('rrr_crr_id',$rrr_crr_id);
		if($type=='like'){
			$this->db->where('rrr_likes_dislikes',1);
		}else if($type=='dislike'){
			$this->db->where('rrr_likes_dislikes',0);
		}
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function checkUserRow($rr_uid){
		$this->db->select('*');
        $this->db->from('bop_review_reponses');
		$this->db->where('rr_uid',$rr_uid);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function checkUserLiked($rr_uid,$rr_reid,$type){
		$this->db->select('*');
        $this->db->from('bop_review_reponses');
		$this->db->where('rr_uid',$rr_uid);
		$this->db->where('rr_reid',$rr_reid);
		if($type=='like'){
			$this->db->where('rr_like_dislike',1);
		}else if($type=='dislike'){
			$this->db->where('rr_like_dislike',0);
		}
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getCompanyReviewRating($cmid){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_cmid',$cmid);
		$this->db->where('re_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getCompanyRwRating($cmid){
		$this->db->select('*');
		$this->db->join('bop_users','bop_users.u_uid = bop_company_reviews.re_uid');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_cmid',$cmid);
		$this->db->where('re_status',1);
		$this->db->where('bop_users.u_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getCompanyReviewReviews($cmid){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_cmid',$cmid);
		$this->db->where('re_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getReviewInfo($re_id){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_id',$re_id);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function updateCompanyOverallRating($cm_id,$cm_overallrating){
		$data = array(
			'cm_overallrating' 	=> $cm_overallrating,
		);
		$this->db->where('cm_id',$cm_id);
		if($this->db->update('bop_compaines',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateCompanyOverallReviews($cm_id,$cm_totalviews){
		$data = array(
			'cm_totalviews' 	=> $cm_totalviews,
		);
		$this->db->where('cm_id',$cm_id);
		if($this->db->update('bop_compaines',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function insertReview($re_cmid,$re_rating,$re_decript,$re_agree,$re_uid){
		$data = array(
            're_rating'    => $re_rating,
            're_decript'   => $re_decript,
            're_uid'       => $re_uid,
            're_cmid' 	   => $re_cmid,
            're_agree' 	   => $re_agree,
            're_status'    => 1,
            're_createdat' => date('Y-m-d H:i:s'),
        );
		if($this->db->insert('bop_company_reviews', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReviewStatus($reId,$re_status){
		$data = array(
			're_status' 	=> $re_status,
		);
		$this->db->where('re_id',$reId);
		if($this->db->update('bop_company_reviews',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReplyStatus($crrId,$crr_status){
		$data = array(
			'crr_status' 	=> $crr_status,
		);
		$this->db->where('crr_id',$crrId);
		if($this->db->update('bop_company_review_replies',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReviewReply($crr_id,$crr_decript){
		$data = array(
            'crr_decript' 	 => $crr_decript,
            'crr_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('crr_id',$crr_id);
		if($this->db->update('bop_company_review_replies',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReview($re_id,$re_decript,$re_rating){
		$data = array(
            're_rating' 	=> $re_rating,
            're_decript' 	=> $re_decript,
            're_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('re_id',$re_id);
		if($this->db->update('bop_company_reviews',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateReviewByUser($re_id,$re_decript,$re_rating){
		$data = array(
            're_rating' 	=> $re_rating,
            're_decript' 	=> $re_decript,
           //  're_status' 	=> 2,
            're_status' 	=> 1,
            're_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('re_id',$re_id);
		if($this->db->update('bop_company_reviews',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function editReview($reid){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->join('bop_compaines', 'bop_compaines.cm_id = bop_company_reviews.re_cmid','LEFT');
		$this->db->where('re_id',$reid);
		// $this->db->where('re_status',1);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function editReviewReply($crrid){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->where('crr_id',$crrid);
		// $this->db->where('crr_status',1);
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function checkDuplicateReview($re_cmid,$re_rating,$re_decript){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_cmid',$re_cmid);
		$this->db->where('re_rating',$re_rating);
		$this->db->where('re_decript',$re_decript);
		$this->db->where('re_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function checkDuplctReview($re_cmid,$re_rating,$re_decript,$re_id){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('re_cmid',$re_cmid);
		$this->db->where('re_rating',$re_rating);
		$this->db->where('re_decript',$re_decript);
		$this->db->where('re_id !=',$re_id,False);
		$this->db->where('re_status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function companyViewReviewsReplies($cmid,$order_by){
		$this->db->select('rrr.*,bs.*,cr.*,bu.u_username as username, bu.u_picture as userpicture, bu.u_social_pic as usersocialpic');
        $this->db->from('bop_company_review_replies as rrr');
		$this->db->join('bop_users as bs', 'bs.u_uid = rrr.crr_uid','LEFT');
		$this->db->join('bop_company_reviews as cr', 'cr.re_id = rrr.crr_reid','LEFT');
		$this->db->join('bop_users as bu', 'bu.u_uid = cr.re_uid','LEFT');
		if($cmid!=0){
			$this->db->where('cr.re_cmid',$cmid);
		}
		if($order_by=='likes'){
			$this->db->order_by('cr.re_likes_cnt','DESC');
		}else if($order_by=='dislikes'){
			$this->db->order_by('cr.re_dislike_cnt','DESC');
		}else if($order_by=='oldest'){
			$this->db->order_by('cr.re_cmid','DESC');
		}else if($order_by=='newlist'){
			$this->db->order_by('cr.re_cmid','ASC');
		}
		$query = $this->db->get();
		return $this->db->last_query();
		return $query->result();
	}
	public function companyViewReviews($limit,$offset,$cmid,$order_by){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_company_reviews.re_uid','LEFT');
		$this->db->where('bop_company_reviews.re_cmid',$cmid);
		$this->db->where('bop_company_reviews.re_status',1);
		$this->db->where('bop_users.u_status',1);
		if($order_by=='likes'){
			$this->db->order_by('bop_company_reviews.re_likes_cnt','DESC');
		}else if($order_by=='dislikes'){
			$this->db->order_by('bop_company_reviews.re_dislike_cnt','DESC');
		}else if($order_by=='oldest'){
			$this->db->order_by('bop_company_reviews.re_id','ASC');
		}else if($order_by=='newlist'){
			$this->db->order_by('bop_company_reviews.re_id','DESC');
		}
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		// return $this->db->last_query();
		return $query->result();
	}
	public function reviewsRepliesList($reviewid,$order_by){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_company_review_replies.crr_uid','LEFT');
		$this->db->where('bop_company_review_replies.crr_reid',$reviewid);
		$this->db->where('bop_company_review_replies.crr_status',1);
		$this->db->where('bop_users.u_status',1);
		if($order_by=='likes'){
			$this->db->order_by('bop_company_review_replies.crr_likes_cnt','DESC');
			$this->db->order_by('bop_company_review_replies.crr_id','DESC');
		}else if($order_by=='dislikes'){
			$this->db->order_by('bop_company_review_replies.crr_dislike_cnt','DESC');
		}else if($order_by=='oldest'){
			$this->db->order_by('bop_company_review_replies.crr_id','DESC');
		}else if($order_by=='newlist'){
			$this->db->order_by('bop_company_review_replies.crr_id','ASC');
		}else{
			$this->db->order_by('bop_company_review_replies.crr_id','DESC');

		}
		$query = $this->db->get();
		return $query->result();
	}
	public function ReviewsReplies($cmid,$reportState){
		$this->db->select('*');
        $this->db->from('bop_company_review_replies');
		$this->db->join('bop_company_reviews', 'bop_company_reviews.re_id = bop_company_review_replies.crr_reid','LEFT');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_company_review_replies.crr_uid','LEFT');
		if($cmid!=0){
			$this->db->where('re_cmid',$cmid);
		}
		$this->db->where('re_id IS NOT NULL');
		if($reportState!=0){
			if($reportState==1){
				$valH = 0;
				$this->db->where('crr_reports_cnt',$valH);
			}else{
				$valH = 1;
				$this->db->where('crr_reports_cnt>=',$valH);
			}
		}
		$this->db->order_by('crr_reid','DESC');
		$query = $this->db->get();
		// return $this->db->last_query();
		return $query->result();
	}
	public function CompanyReviews($cmid,$reportState){
		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->join('bop_compaines', 'bop_compaines.cm_id = bop_company_reviews.re_cmid','LEFT');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_company_reviews.re_uid','LEFT');
		if($cmid!=0){
			$this->db->where('re_cmid',$cmid);
		}
		if($reportState!=0){
			if($reportState==1){
				$valH = 0;
				$this->db->where('re_reports_cnt',$valH);
			}else{
				$valH = 1;
				$this->db->where('re_reports_cnt>=',$valH);
			}
		}
		$this->db->order_by('re_id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllCompanies(){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where('cm_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getcompanyUniqueId($cm_id){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where('cm_id',$cm_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function addTopCompany($cmid){
		$data = array(
            'tcm_cmid'  	=> $cmid,
            'tcm_createdat' => date('Y-m-d H:i:s'),
            'tcm_status'    => 1,
        );
        if($this->db->insert('bop_top_companies', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getRestTopCompanies($cm_cpid){
		$this->db->select('tcm_cmid')->from('bop_top_companies');
		$subQuery =  $this->db->get_compiled_select();
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where("cm_id NOT IN ($subQuery)", NULL, FALSE);
		$this->db->where('cm_ctid',$cm_cpid);
		$this->db->where('cm_status',1);
		$this->db->group_by('cm_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function getTopCompanies($cm_cpid){
		$this->db->select('*');
        $this->db->from('bop_top_companies');
		$this->db->join('bop_compaines', 'bop_compaines.cm_id = bop_top_companies.tcm_cmid','LEFT');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_compaines.cm_uid');
		if($cm_cpid!='all'){
			$this->db->where('cm_ctid',$cm_cpid);
		}
		$this->db->where('cm_status',1);
		$this->db->where('bop_users.u_status',1);
		$this->db->group_by('bop_compaines.cm_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAssetsList($companyType){

		$this->db->select('*');
        $this->db->from('bop_compaines');
        $this->db->where('cm_status !=',2,False);
        $this->db->where('cm_ctid',$companyType);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDigtalImageList(){

		$this->db->select('*');
        $this->db->from('bop_slider_banners');
        $this->db->where('sb_status =',1,False);
        $this->db->where('sb_ct_id =',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getReviewList(){

		$this->db->select('*');
        $this->db->from('bop_slider_banners');
        $this->db->where('sb_status =',1,False);
        $this->db->where('sb_ct_id =',3);
		$query = $this->db->get();
		return $query->result();
	}
	public function getIcoImageList(){

		$this->db->select('*');
        $this->db->from('bop_slider_banners');
        //$this->db->where('sb_status !=',2,False);
        $this->db->where('sb_status =',1,False);
        $this->db->where('sb_ct_id =',2);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDigitalIcos($cm_cpid,$limit,$offset,$order_by,$ascDesc,$uuid,$checkQuery){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');
		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}

		$this->db->where('cm_status ',1);
		$this->db->where('bop_users.u_status ',1);
		$this->db->order_by($order_by,$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}
		$this->db->limit($limit,$offset);

		$query = $this->db->get();
		return $query->result();
	}
	public function getDigitalIcosCount($cm_cpid,$limit,$offset,$order_by,$ascDesc,$uuid,$checkQuery){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');
		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}

		$this->db->where('cm_status ',1);
		$this->db->where('bop_users.u_status ',1);
		$this->db->order_by($order_by,$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}
		 return $this->db->count_all_results();
	}
	public function getDigitalIcos1($cm_cpid,$limit,$offset,$order_by,$ascDesc,$uuid,$checkQuery){
		$this->db->select('*');
		$this->db->select('str_to_date('.$order_by.', "%Y-%m-%d") day1',false);
		$this->db->from('bop_compaines');
	    $this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');

		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}

		$this->db->where('cm_status ',1);
		$this->db->where('bop_users.u_status ',1);
		$this->db->order_by('day1',$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		return $query->result();
	}
	public function getDigitalIcos1Count($cm_cpid,$limit,$offset,$order_by,$ascDesc,$uuid,$checkQuery){
		$this->db->select('*');
		$this->db->select('str_to_date('.$order_by.', "%Y-%m-%d") day1',false);
		$this->db->from('bop_compaines');
	    $this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');

		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}

		$this->db->where('cm_status ',1);
		$this->db->where('bop_users.u_status ',1);
		$this->db->order_by('day1',$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);

		}
		 return $this->db->count_all_results();
	}
	public function getSerachDigitalIcos($cm_cpid,$limit,$offset,$order_by,$ascDesc,$serachTerm,$uuid,$checkQuery){
		$this->db->select('*');
		$this->db->from('bop_compaines');
		$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');
		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}
		$this->db->where('cm_status',1);
		$this->db->where('bop_users.u_status',1);
		$this->db->like('cm_name', $serachTerm);
		// $this->db->get_where('cm_name',$serachTerm);
		// $this->db->or_like(array('cm_name' => $serachTerm, 'cm_decript' => $serachTerm));
			// $this->db->like('cm_name', $serachTerm,'after');
			//$this->db->like('cm_decript', $serachTerm,'after');
		// $this->db->or_like(array('sender' => $k, 'msg' => $k));
		// $this->db->like('cm_decript', $serachTerm);


		// $this->db->where('MATCH (cm_name,cm_decript) AGAINST ("'.$serachTerm.'" IN BOOLEAN MODE)', NULL, false);
		// $this->db->order_by("relevance", "desc");

		$this->db->order_by($order_by,$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		return $query->result();
	}
	public function getSerachDigitalIcosCount($cm_cpid,$limit,$offset,$order_by,$ascDesc,$serachTerm,$uuid,$checkQuery){
		$this->db->select('*');
		$this->db->from('bop_compaines');
		$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');
		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}
		$this->db->where('cm_status',1);
		$this->db->where('bop_users.u_status',1);
		$this->db->like('cm_name', $serachTerm);


		$this->db->order_by($order_by,$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}
		 return $this->db->count_all_results();
	}
	public function getSearchDgtlIcos($cm_cpid,$limit,$offset,$order_by,$ascDesc,$serachTerm=null,$uuid,$checkQuery,$filterId)
	{
		if(isset($filterId) && $filterId != '')
		{
			$filter = $filterId;

		}else{
			$filter = 7;

		}
		if(isset($offset) && $offset != '')
		{
			$off = $offset;

		}else{
			$off = '0';

		}
		if($filter == 7)
		{
			if($checkQuery=="myicos")
			{
				$sql = "
					SELECT *, DATEDIFF(`cm_ico_end_date`, CURDATE()) AS
					diff FROM `bop_compaines` JOIN `bop_users` ON `bop_users`.`u_uid` = `bop_compaines`.`cm_uid`
					WHERE cm_status !=2 AND `cm_ctid` = 2 AND `cm_status` = 1 AND `u_uid` = '$uuid' AND `bop_users`.`u_status` = 1 AND
					`cm_name` LIKE '%$serachTerm%' ESCAPE '!' ORDER BY CASE WHEN diff < 0 THEN 1 ELSE 0 END, diff
					ASC LIMIT ".$off.",".$limit;
			}else{

				$sql = "
					SELECT *, DATEDIFF(`cm_ico_end_date`, CURDATE()) AS
					diff FROM `bop_compaines` JOIN `bop_users` ON `bop_users`.`u_uid` = `bop_compaines`.`cm_uid`
					WHERE cm_status !=2 AND `cm_ctid` = 2 AND `cm_status` = 1 AND `bop_users`.`u_status` = 1 AND
					`cm_name` LIKE '%$serachTerm%' ESCAPE '!' ORDER BY CASE WHEN diff < 0 THEN 1 ELSE 0 END, diff
					ASC LIMIT ".$off.",".$limit;

			}
			$query = $this->db->query($sql);
			return $query->result();

		}else{

			$this->db->select('*');
			$this->db->from('bop_compaines');
			$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');
			if($checkQuery=="myicos"){
				$this->db->where('cm_ctid',$cm_cpid);
				$this->db->where('cm_uid',$uuid);
			}else if($checkQuery=="mydigital"){
				$this->db->where('cm_ctid',$cm_cpid);
				$this->db->where('cm_uid',$uuid);
			}else{
				$this->db->where('cm_status !=',2,False);
				$this->db->where('cm_ctid',$cm_cpid);
			}
			$this->db->where('cm_status',1);
			$this->db->where('bop_users.u_status',1);
			$this->db->like('cm_name', $serachTerm);

			$this->db->order_by($order_by,$ascDesc);
			if($order_by == 'cm_ico_start_date')
			{
				$orderbyTime = 'cm_ico_start_time';
				$this->db->order_by($orderbyTime,$ascDesc);
			}else if($order_by == 'cm_ico_end_time'){
				$orderbyTime = 'cm_ico_end_time';
				$this->db->order_by($orderbyTime,$ascDesc);
			}
			$this->db->limit($limit,$off);
			// echo $this->db->get_compiled_select();exit;
			$query = $this->db->get();
			return $query->result();

		}


	}
	public function getSearchDgtlIcosCounts($cm_cpid,$order_by,$ascDesc,$serachTerm=null,$uuid,$checkQuery,$filterId)
	{

		if(isset($filterId) && $filterId != '')
		{
			$filter = $filterId;

		}else{
			$filter = 7;

		}

		if($filter == 7)
		{
			if($checkQuery=="myicos")
			{
				$sql = "
					SELECT *, DATEDIFF(`cm_ico_end_date`, CURDATE()) AS
					diff FROM `bop_compaines` JOIN `bop_users` ON `bop_users`.`u_uid` = `bop_compaines`.`cm_uid`
					WHERE cm_status !=2 AND `cm_ctid` = 2 AND `cm_status` = 1 AND `u_uid` = '$uuid' AND `bop_users`.`u_status` = 1 AND
					`cm_name` LIKE '%$serachTerm%' ESCAPE '!' ORDER BY CASE WHEN diff < 0 THEN 1 ELSE 0 END, diff
					ASC ";
			}else{
				$sql = "
					SELECT *, DATEDIFF(`cm_ico_end_date`, CURDATE()) AS
					diff FROM `bop_compaines` JOIN `bop_users` ON `bop_users`.`u_uid` = `bop_compaines`.`cm_uid`
					WHERE cm_status !=2 AND `cm_ctid` = 2 AND `cm_status` = 1 AND `bop_users`.`u_status` = 1 AND
					`cm_name` LIKE '%$serachTerm%' ESCAPE '!' ORDER BY CASE WHEN diff < 0 THEN 1 ELSE 0 END, diff
					ASC ";

			}
			$query = $this->db->query($sql);
			return $query->result();

		}else{

			$this->db->select('*');
			$this->db->from('bop_compaines');
			$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');
			if($checkQuery=="myicos"){
				$this->db->where('cm_ctid',$cm_cpid);
				$this->db->where('cm_uid',$uuid);
			}else if($checkQuery=="mydigital"){
				$this->db->where('cm_ctid',$cm_cpid);
				$this->db->where('cm_uid',$uuid);
			}else{
				$this->db->where('cm_status !=',2,False);
				$this->db->where('cm_ctid',$cm_cpid);
			}
			$this->db->where('cm_status',1);
			$this->db->where('bop_users.u_status',1);
			$this->db->like('cm_name', $serachTerm);

			$this->db->order_by($order_by,$ascDesc);
			if($order_by == 'cm_ico_start_date')
			{
				$orderbyTime = 'cm_ico_start_time';
				$this->db->order_by($orderbyTime,$ascDesc);
			}else if($order_by == 'cm_ico_end_time'){
				$orderbyTime = 'cm_ico_end_time';
				$this->db->order_by($orderbyTime,$ascDesc);
			}
			// $this->db->limit($limit,$offset);
			// echo $this->db->get_compiled_select();exit;
			$query = $this->db->get();
			return $query->result();

		}


	}
	public function getSerachDigitalIcos1($cm_cpid,$limit,$offset,$order_by,$ascDesc,$serachTerm,$uuid,$checkQuery){
		$this->db->select('*');
		$this->db->select('str_to_date('.$order_by.', "%Y-%m-%d") dayy',false);
		$this->db->from('bop_compaines');
		$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');

		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}

		$this->db->where('cm_status',1);
		$this->db->where('bop_users.u_status',1);
		$this->db->like('cm_name', $serachTerm);
		// $this->db->get_where('cm_name',$serachTerm);
		// $this->db->or_like(array('cm_name' => $serachTerm, 'cm_decript' => $serachTerm));
			// $this->db->like('cm_name', $serachTerm,'after');
			//$this->db->like('cm_decript', $serachTerm,'after');
		// $this->db->or_like(array('sender' => $k, 'msg' => $k));
		// $this->db->like('cm_decript', $serachTerm);


		// $this->db->where('MATCH (cm_name,cm_decript) AGAINST ("'.$serachTerm.'" IN BOOLEAN MODE)', NULL, false);
		// $this->db->order_by("relevance", "desc");

		$this->db->order_by('dayy',$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}

		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		// return $this->db->last_query();
		return $query->result();
	}
	public function getSerachDigitalIcos1Count($cm_cpid,$limit,$offset,$order_by,$ascDesc,$serachTerm,$uuid,$checkQuery){
		$this->db->select('*');
		$this->db->select('str_to_date('.$order_by.', "%Y-%m-%d") dayy',false);
		$this->db->from('bop_compaines');
		$this->db->join('bop_users','bop_users.u_uid = bop_compaines.cm_uid');

		if($checkQuery=="myicos"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else if($checkQuery=="mydigital"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_uid',$uuid);
		}else{
			$this->db->where('cm_status !=',2,False);
			$this->db->where('cm_ctid',$cm_cpid);
		}

		$this->db->where('cm_status',1);
		$this->db->where('bop_users.u_status',1);
		$this->db->like('cm_name', $serachTerm);

		$this->db->order_by('dayy',$ascDesc);
		if($order_by == 'cm_ico_start_date')
		{
			$orderbyTime = 'cm_ico_start_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}else if($order_by == 'cm_ico_end_time'){
			$orderbyTime = 'cm_ico_end_time';
			$this->db->order_by($orderbyTime,$ascDesc);
		}
		return $this->db->count_all_results();

	}
	public function totalCountCompaines($cm_cpid,$uuid){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		// if($cm_cpid!="all"){
			$this->db->where('cm_ctid',$cm_cpid);
			$this->db->where('cm_status !=',2,False);
		// }else{
			if($uuid!=""){
				$this->db->where('cm_uid',$uuid);
			}
		// }
		return $this->db->count_all_results();
	}
	public function getMilestoneStatuses(){

		$this->db->select('mss_id,mss_status');
        $this->db->from('bop_company_milestone_status');
       $query = $this->db->get();
		return $query->result();
	}
	public function getAdminDetails(){

		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_ut_id',1);
       $query = $this->db->get();
		return $query->row();
	}
	public function addDigitalAsset($post,$uid,$insertFrom,$resizeImg)
	{
		//print_r($resizeImg);exit;
		$cm_marketcap = '';
		if(isset($post['cm_total_token_supply']) && $post['cm_total_token_supply'] != "")
		{
			$cm_total_token_supply = $post['cm_total_token_supply'];
		}else{
			$cm_total_token_supply = '';
		}

		if(isset($post['cm_tokens_available_crowd_sale']) && $post['cm_tokens_available_crowd_sale'] != "")
		{
			$cm_tokens_available_crowd_sale = $post['cm_tokens_available_crowd_sale'];
		}else{
			$cm_tokens_available_crowd_sale = '';
		}

		if(isset($post['cm_inflation']) && $post['cm_inflation'] != "")
		{
			$cm_inflation = $post['cm_inflation'];
		}else{
			$cm_inflation = '';
		}

		if(isset($post['cm_ico_start_date']) && $post['cm_ico_start_date'] != "")
		{
			$cm_ico_start_date = $post['cm_ico_start_date'];
		}else{
			$cm_ico_start_date = '';
		}

		if(isset($post['cm_ico_end_date']) && $post['cm_ico_end_date'] != "")
		{
			$cm_ico_end_date = $post['cm_ico_end_date'];
		}else{
			$cm_ico_end_date = '';
		}

		if(isset($post['cm_ico_conditions']) && $post['cm_ico_conditions'] != "")
		{
			$cm_ico_conditions = $post['cm_ico_conditions'];
		}else{
			$cm_ico_conditions = '';
		}
		if(isset($post['cm_ico_end_time']) && $post['cm_ico_end_time'] != "")
		{
			$cm_ico_end_time = $post['cm_ico_end_time'];
		}else{
			$cm_ico_end_time = '';
		}
		if(isset($post['cm_ico_end_time']) && $post['cm_ico_end_time'] != "")
		{
			$cm_ico_end_time = $post['cm_ico_end_time'];
		}else{
			$cm_ico_end_time = '';
		}
		if(isset($post['cm_ico_start_time']) && $post['cm_ico_start_time'] != "")
		{
			$cm_ico_start_time = $post['cm_ico_start_time'];
		}else{
			$cm_ico_start_time = '';
		}
		if(isset($insertFrom) && $insertFrom == 'Admin')
		{
			$status = '1';
		}elseif(isset($insertFrom) && $insertFrom == 'User')
		{
			$status = '0';
		}else{
			$status = '0';
		}

		$data = array(
            'cm_uid'      						=> $uid,
            'cm_ctid'      						=> $post['hidCompanyType'],
            'cm_name'  							=> $post['cm_name'],
			'cm_total_token_supply'  			=> str_replace(',','',$cm_total_token_supply),
            'cm_tokens_available_crowd_sale' 	=> str_replace(',','',$cm_tokens_available_crowd_sale),
            'cm_inflation'  					=> $cm_inflation,
            'cm_ico_start_date'  				=> date('Y-m-d',strtotime($cm_ico_start_date)),
            'cm_ico_end_date'  					=> date('Y-m-d',strtotime($cm_ico_end_date)),
            'cm_ico_start_time'  				=> $post['cm_ico_start_time'],
            'cm_ico_end_time'  					=> $post['cm_ico_end_time'],
            'cm_ico_conditions'  				=> $cm_ico_conditions,
            // 'cm_resources'  					=> $post['cm_resources'],
            'cm_decript'   						=> $post['cm_decript'],
            'cm_marketcap'  					=> str_replace(',','',$post['cm_marketcap']),
            'cm_escrow'     					=> $post['cm_escrow'],
            'cm_mobile'   						=> $post['cm_mobile'],
            'cm_email'    						=> $post['cm_email'],
            'cm_slack'    						=> $post['cm_slack'],
            'cm_twitter'    					=> $post['cm_twitter'],
            'cm_facebook'   					=> $post['cm_facebook'],
            'cm_discord'    					=> $post['cm_discord'],
            'cm_github'    						=> $post['cm_github'],
            'cm_telegram'   					=> $post['cm_telegram'],
            'cm_address'    					=> $post['cm_address'],
            'cm_picture'    					=> $resizeImg,
            'cm_siteurl'    					=> $post['cm_siteurl'],
            'cm_coinmarket_cap'    				=> $post['cm_coinmarket_cap'],
            'cm_ico_start_time'    				=> $cm_ico_start_time,
            'cm_ico_end_time'    				=> $cm_ico_end_time,
            'cm_modifiedat' 					=> date('Y-m-d H:i:s'),
            'cm_caretedat'  					=> date('Y-m-d H:i:s'),
            'cm_status'     					=> $status,
        );
        if($this->db->insert('bop_compaines', $data) === FALSE){
			return FALSE;
		}else{
			return $this->db->insert_id();
		}
	}
	public function AddEvent($post,$uid,$ins_fr,$resizeImg){
		if(isset($post['ev_name']) && $post['ev_name'] != "")
		{
			$ev_name = $post['ev_name'];
		}else{
			$ev_name = '';
		}

		if(isset($post['ev_loc']) && $post['ev_loc'] != "")
		{
			$ev_loc = $post['ev_loc'];
		}else{
			$ev_loc = '';
		}

		if(isset($post['ev_decript']) && $post['ev_decript'] != "")
		{
			$ev_decript = $post['ev_decript'];
		}else{
			$ev_decript = '';
		}

		if(isset($post['ev_price']) && $post['ev_price'] != "")
		{
			$ev_price = $post['ev_price'];
		}else{
			$ev_price = '';
		}

		if(isset($post['ev_num']) && $post['ev_num'] != "")
		{
			$ev_num = $post['ev_num'];
		}else{
			$ev_num = '';
		}

		if(isset($post['ev_city']) && $post['ev_city'] != "")
		{
			$ev_city = $post['ev_city'];
		}else{
			$ev_city = '';
		}
		if(isset($ins_fr) && $ins_fr == 'Admin')
		{
			$status = '1';
		}elseif(isset($ins_fr) && $ins_fr == 'User')
		{
			$status = '0';
		}else{
			$status = '0';
		}

		$data = array(
            'ev_uid'      						=> $uid,
            'ev_name'  							=> $ev_name,
			'ev_decript'   						=> $ev_decript,
			'ev_picture'    					=> $resizeImg,
			'ev_loc'                            => $ev_loc,
			'ev_price'                          => $ev_price,
			'ev_num'                            => $ev_num,
			'ev_city'                           => $ev_city,
			'ev_status'     					=> $status,
            'ev_cd' 				        	=> date('Y-m-d H:i:s'),
            'ev_md'  					        => date('Y-m-d H:i:s'),
            
        );
        if($this->db->insert('bop_events', $data) === FALSE){
			return FALSE;
		}else{
			return $this->db->insert_id();
		}
	}
	public function UpdateDigitalAsset($post,$uid,$resizeImg)
	{
		if(isset($post['cm_total_token_supply']) && $post['cm_total_token_supply'] != "")
		{
			$cm_total_token_supply = $post['cm_total_token_supply'];
		}else{
			$cm_total_token_supply = '';
		}

		if(isset($post['cm_tokens_available_crowd_sale']) && $post['cm_tokens_available_crowd_sale'] != "")
		{
			$cm_tokens_available_crowd_sale = $post['cm_tokens_available_crowd_sale'];
		}else{
			$cm_tokens_available_crowd_sale = '';
		}

		if(isset($post['cm_inflation']) && $post['cm_inflation'] != "")
		{
			$cm_inflation = $post['cm_inflation'];
		}else{
			$cm_inflation = '';
		}

		if(isset($post['cm_ico_start_date']) && $post['cm_ico_start_date'] != "")
		{
			$cm_ico_start_date = $post['cm_ico_start_date'];
		}else{
			$cm_ico_start_date = '';
		}

		if(isset($post['cm_ico_end_date']) && $post['cm_ico_end_date'] != "")
		{
			$cm_ico_end_date = $post['cm_ico_end_date'];
		}else{
			$cm_ico_end_date = '';
		}

		if(isset($post['cm_ico_conditions']) && $post['cm_ico_conditions'] != "")
		{
			$cm_ico_conditions = $post['cm_ico_conditions'];
		}else{
			$cm_ico_conditions = '';
		}

		$data = array(
            'cm_name'  							=> $post['cm_name'],
			'cm_total_token_supply'  			=> str_replace(',','',$cm_total_token_supply),
            'cm_tokens_available_crowd_sale' 	=> str_replace(',','',$cm_tokens_available_crowd_sale),
            'cm_inflation'  					=> $cm_inflation,
            'cm_ico_start_date'  				=> date('Y-m-d',strtotime($cm_ico_start_date)),
            'cm_ico_end_date'  					=> date('Y-m-d',strtotime($cm_ico_end_date)),
            'cm_ico_start_time'  				=> $post['cm_ico_start_time'],
            'cm_ico_end_time'  					=> $post['cm_ico_end_time'],
            'cm_ico_conditions'  				=> $cm_ico_conditions,
            'cm_decript'   						=> $post['cm_decript'],
            'cm_marketcap'  					=> str_replace(',','',$post['cm_marketcap']),
            'cm_resources'  					=> $post['cm_resources'],
            'cm_escrow'     					=> $post['cm_escrow'],
            'cm_mobile'   						=> $post['cm_mobile'],
            'cm_email'    						=> $post['cm_email'],
            'cm_slack'    						=> $post['cm_slack'],
            'cm_twitter'    					=> $post['cm_twitter'],
            'cm_discord'   						=> $post['cm_discord'],
            'cm_facebook'   					=> $post['cm_facebook'],
            'cm_github'    						=> $post['cm_github'],
            'cm_telegram'   					=> $post['cm_telegram'],
            'cm_coinmarket_cap'   				=> $post['cm_coinmarket_cap'],
            'cm_address'    					=> $post['cm_address'],
            'cm_picture'    					=> $resizeImg,
            'cm_siteurl'    					=> $post['cm_siteurl'],
            'cm_modifiedat' 					=> date('Y-m-d H:i:s'),

        );
		$this->db->where('cm_id',$post['companyhidId']);
		if($this->db->update('bop_compaines',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateMarketCapVal($post,$companyId)
	{
		$data = array(
            'cm_marketcap'  					=> str_replace(',','',$post),
            'cm_modifiedat' 					=> date('Y-m-d H:i:s'),
        );
		$this->db->where('cm_id',$companyId);
		if($this->db->update('bop_compaines',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addCoreTeams($companyId,$ctname,$url)
	{
		$data = array(
            'cot_cmid'      	=> $companyId,
            'cot_profile_url'  	=> $url,
            'cot_name'   		=> $ctname,
            'cot_status'   		=> 1,
            'cot_modifiedat' 	=> date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_coreteam', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEventSpeakers($event_id,$spname,$url,$spimage)
	{
		$data = array(
			'sp_evid'           => $event_id,
			'sp_name'           => $spname,
			'sp_url'            => $url,
			'sp_image'          => $spimage,
			'sp_status'         => 1,
			'sp_md'             => date('Y-m-d H:i:s'),    	
		);
		if($this->db->insert('bop_events_speakers', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEventAgenda($event_id,$agtime,$agevent)
	{
		$data = array(
			'ag_evid'           => $event_id,
			'ag_day'            => 1,
			'ag_time'           => $agtime,
			'ag_event'          => $agevent,
			'ag_status'         => 1,
			'ag_md'             => date('Y-m-d H:i:s'),	
		);
		if($this->db->insert('bop_events_agenda', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEventAgenda2($event_id,$agtime,$agevent)
	{
		$data = array(
			'ag_evid'           => $event_id,
			'ag_day'            => 2,
			'ag_time'           => $agtime,
			'ag_event'          => $agevent,
			'ag_status'         => 1,
			'ag_md'             => date('Y-m-d H:i:s'),	
		);
		if($this->db->insert('bop_events_agenda', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEventAgenda3($event_id,$agtime,$agevent)
	{
		$data = array(
			'ag_evid'           => $event_id,
			'ag_day'            => 3,
			'ag_time'           => $agtime,
			'ag_event'          => $agevent,
			'ag_status'         => 1,
			'ag_md'             => date('Y-m-d H:i:s'),	
		);
		if($this->db->insert('bop_events_agenda', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEventAgenda4($event_id,$agtime,$agevent)
	{
		$data = array(
			'ag_evid'           => $event_id,
			'ag_day'            => 4,
			'ag_time'           => $agtime,
			'ag_event'          => $agevent,
			'ag_status'         => 1,
			'ag_md'             => date('Y-m-d H:i:s'),	
		);
		if($this->db->insert('bop_events_agenda', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEventAgenda5($event_id,$agtime,$agevent)
	{
		$data = array(
			'ag_evid'           => $event_id,
			'ag_day'            => 5,
			'ag_time'           => $agtime,
			'ag_event'          => $agevent,
			'ag_status'         => 1,
			'ag_md'             => date('Y-m-d H:i:s'),	
		);
		if($this->db->insert('bop_events_agenda', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addAdvosries($companyId,$adtname,$url)
	{
		$data = array(
            'adt_cmid'      	=> $companyId,
            'adt_profile_url'  	=> $url,
            'adt_name'  		=> $adtname,
            'adt_status'   		=> 1,
            'adt_modifiedat' 	=> date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_advisoryteam', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addEscrows($companyId,$escrname,$url)
	{
		$data = array(
            'ed_cmid'      		=> $companyId,
            'ed_url'  			=> $url,
            'ed_name'  			=> $escrname,
            'ed_status'   		=> 1,
            'ed_created_at' 	=> date('Y-m-d H:i:s'),
            'ed_updated_at' 	=> date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_escrow_details', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addTradeExchanges($companyId,$trexname,$trUrl)
	{
		$data = array(
            'te_cmid'      	=> $companyId,
            'te_title'  	=> $trexname,
            'te_url'  		=> $trUrl,
			'te_status'   	=> 1,
            'te_createdat' 	=> date('Y-m-d H:i:s'),
            'te_modifiedat' => date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_tradingexchanges', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	/* public function addResources($companyId,$rsrname,$trUrl)
	{
		$data = array(
            'cr_cmid'      	=> $companyId,
            'cr_name'  		=> $rsrname,
            'cr_url'  		=> $trUrl,
			'cr_status'   	=> 1,
            'cr_created_at' => date('Y-m-d H:i:s'),
            'cr_updated_at' => date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_resources', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	} */
	public function addEscrowDetails($companyId,$escrwname,$escrUrl)
	{
		$data = array(
            'ed_cmid'      		=> $companyId,
            'ed_name'  			=> $escrwname,
            'ed_url'  			=> $escrUrl,
			'ed_status'   		=> 1,
            'ed_created_at' 	=> date('Y-m-d H:i:s'),
            'ed_updated_at' 	=> date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_escrow_details', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addResources($companyId,$rsrcname,$rsrsUrl)
	{
		$data = array(
            'cr_cmid'      		=> $companyId,
            'cr_name'  			=> $rsrcname,
            'cr_url'  			=> $rsrsUrl,
			'cr_status'   		=> 1,
            'cr_created_at' 	=> date('Y-m-d H:i:s'),
            'cr_updated_at' 	=> date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_resources', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addMileStone($companyId,$mileStname,$mssid)
	{
		$data = array(
            'ms_cmid'      	=> $companyId,
            'ms_title'  	=> $mileStname,
			'ms_mss_id'   	=> $mssid,
			'ms_status'   	=> 1,
            'ms_createdat' 	=> date('Y-m-d H:i:s'),
            'ms_modifiedat' => date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_milestones', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function addUserCompanyFiles($companyId,$filename)
	{
		$data = array(
            'cp_cmid'      	=> $companyId,
            'cp_picture'  	=> $filename,
			'cp_status'   	=> 1,
            'cp_modifiedat' 	=> date('Y-m-d H:i:s'),

        );
        if($this->db->insert('bop_company_portfolio', $data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function UpdateDigitalstatus($id,$statusMode,$rating,$views)
	{
		$status = array(
			'cm_status'     		=> $statusMode,
			'cm_overallrating'     	=> $rating,
			'cm_totalviews'     	=> $views,
			'cm_modifiedat' 		=> date('Y-m-d H:i:s'),
		);
        $this->db->where('cm_id',$id);
		$this->db->update('bop_compaines',$status);
	}
	public function getDigitalAssetDetails($cmp_id,$user_id,$companyType)
	{
		$this->db->select('*');
        $this->db->from('bop_compaines');

		$this->db->where('cm_id',$cmp_id);
		$this->db->where('cm_ctid',$companyType);
		// $this->db->where('cm_uid',$user_id);
		$this->db->where('cm_status',1);
		$this->db->group_by('cm_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function getDigitalAssetDetailsForAdmin($cmp_id,$user_id,$companyType)
	{
		$this->db->select('*');
        $this->db->from('bop_compaines');

		$this->db->where('cm_id',$cmp_id);
		$this->db->where('cm_ctid',$companyType);
		// // $this->db->where('cm_uid',$user_id);
		$where = "((cm_status = 1 ) OR (cm_status = 0))";
		$this->db->where($where);
		$this->db->group_by('cm_id');
		// echo $this->db->get_compiled_select();exit;
		$query = $this->db->get();
		return $query->result();
	}
	public function getCompanyDetails($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_compaines');

		$this->db->where('cm_id',$cmp_id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getmileStonesOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_company_milestones');
		$this->db->join('bop_company_milestone_status', 'bop_company_milestone_status.mss_id = bop_company_milestones.ms_mss_id','LEFT');
		$this->db->where('ms_cmid',$cmp_id);
		$this->db->where('ms_status',1);
		$this->db->order_by('ms_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getradinExchnageOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_company_tradingexchanges');
		$this->db->where('te_cmid',$cmp_id);
		$this->db->where('te_status',1);
		$this->db->order_by('te_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getCoreTeamOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_company_coreteam');
		$this->db->where('cot_cmid',$cmp_id);
		$this->db->where('cot_status',1);
		$this->db->order_by('cot_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getEscrowOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_escrow_details');
		$this->db->where('ed_cmid',$cmp_id);
		$this->db->where('ed_status',1);
		$this->db->order_by('ed_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getResourcesOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_company_resources');
		$this->db->where('cr_cmid',$cmp_id);
		$this->db->where('cr_status',1);
		$this->db->order_by('cr_id','asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAdvisoryOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_company_advisoryteam');
		$this->db->where('adt_cmid',$cmp_id);
		$this->db->where('adt_status',1);
		$this->db->order_by('adt_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getuploadDocsOfCmp($cmp_id)
	{
		$this->db->select('*');
        $this->db->from('bop_company_portfolio');
		$this->db->where('cp_cmid',$cmp_id);
		$this->db->where('cp_status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function deleteMultiFiles($comp_id,$type)
	{
		if($type == 0){
			$this->db->where('ms_cmid', $comp_id);
			$this->db->delete('bop_company_milestones');
		}else if($type == 1)
		{
			$this->db->where('cot_cmid', $comp_id);
			$this->db->delete('bop_company_coreteam');
		}else if($type == 2)
		{
			$this->db->where('adt_cmid', $comp_id);
			$this->db->delete('bop_company_advisoryteam');
		}else if($type == 3)
		{
			$this->db->where('te_cmid', $comp_id);
			$this->db->delete('bop_company_tradingexchanges');
		}else if($type == 4)
		{
			$this->db->where('cp_cmid', $comp_id);
			$this->db->delete('bop_company_portfolio');
		}else if($type == 5)
		{
			$this->db->where('cr_cmid', $comp_id);
			$this->db->delete('bop_company_resources');
		}else if($type == 6)
		{
			$this->db->where('ed_cmid', $comp_id);
			$this->db->delete('bop_escrow_details');
		}
	}
	public function insertedUnqiueCode($cm_id,$cm_unique_id){
		$data = array(
			'cm_unique_id'     	=> $cm_unique_id,
		);
        $this->db->where('cm_id',$cm_id);
		$this->db->update('bop_compaines',$data);
	}
	public function updateIcosAsDa($cm_id){
		$data = array(
			'cm_ctid'  => 1,
		);
        $this->db->where('cm_id',$cm_id);
		$this->db->update('bop_compaines',$data);
	}

	public function getcompanyidfromreview($re_id){
		$this->db->select('re_cmid');
		$this->db->from('bop_company_reviews');
		$this->db->where('bop_company_reviews.re_id',$re_id);
		$this->db->where('bop_company_reviews.re_status',1);
		$query = $this->db->get();
		return $query->result_array();
	 
	}
    public function fetchreply($crr_id){
		$this->db->select('crr_decript');
		$this->db->from('bop_company_review_replies');
		$this->db->where('bop_company_review_replies.crr_id',$crr_id);
		$this->db->where('bop_company_review_replies.crr_status',1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getcompanyinfobycmid($cm_id){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where('bop_compaines.cm_id',$cm_id);
		$this->db->where('bop_compaines.cm_status',1);
		$query = $this->db->get();
		return $query->result();
	}

	public function getcompanyinfobyname($cm_name){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where('bop_compaines.cm_name',$cm_name);
		$this->db->where('bop_compaines.cm_status',1);
		$this->db->group_by('bop_compaines.cm_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function getEventInfoById($event_id)
	{
		$this->db->select('*');
		$this->db->from('bop_events');
		$this->db->where('ev_id',$event_id);
		$this->db->where('ev_status',0);
		$query = $this->db->get();
		return $query->result();
	}
	public function getcompanyinfo($cm_unique_id){
		$this->db->select('*');
        $this->db->from('bop_compaines');
		$this->db->where('bop_compaines.cm_unique_id',$cm_unique_id);
		$this->db->where('bop_compaines.cm_status',1);
		$this->db->group_by('bop_compaines.cm_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function record_count($cmid) {

		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->join('bop_users', 'bop_users.u_uid = bop_company_reviews.re_uid','LEFT');
		$this->db->where('bop_company_reviews.re_cmid',$cmid);
		$this->db->where('bop_company_reviews.re_status',1);
		$this->db->where('bop_users.u_status',1);
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function count_reviews($cmid) {

		$this->db->select('*');
        $this->db->from('bop_company_reviews');
		$this->db->where('bop_company_reviews.re_cmid',$cmid);
		$this->db->where('bop_company_reviews.re_status',1);
		$query = $this->db->get();
		return $query->num_rows();

	}
	public function deleteCompanyLists($cm_id,$cm_uid){
		$this->db->where('cm_id', $cm_id);
		$this->db->where('cm_uid', $cm_uid);
        $this->db->delete('bop_compaines');
	}

	public function getCompanies($type) {
		$this->db->select('cm_name,cm_id');
        $this->db->from('bop_compaines');
        $this->db->where('cm_ctid =',$type);
        $this->db->where('cm_status !=2');
        $this->db->where('cm_cron_checker =0');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}
	public function getCronCheckerCount() {
		$this->db->select('*');
        $this->db->from('bop_compaines');
        $this->db->where('cm_ctid =1');
        $this->db->where('cm_status !=2');
        $this->db->where('cm_cron_checker =0');
		return $this->db->count_all_results();
	}
	public function updateChecker($val,$type){
		if($type=='cmid'){
			$data = array(
				'cm_cron_checker'  => 1,
			);
			$this->db->where('cm_id',$val);
		}else{
			$value = 0;
			$data = array(
				'cm_cron_checker'  => $value,
			);
			$this->db->where('cm_cron_checker',$val);
		}
		if($this->db->update('bop_compaines',$data) === FALSE){
			return FALSE;
		}else{
			return TRUE;
		}
	}

}
