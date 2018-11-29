<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();  
		// return $this->db->last_query();
    }
	public function checkEmailExistsOrNot($u_email){
		$this->db->select('*');
        $this->db->from('bop_users');
        $this->db->where('u_email',$u_email);
        $this->db->where('u_ut_id',2);
		$this->db->where('u_status',1);
		$query = $this->db->get();
		return $query->row();
	}
    public function checkLogin($post)
    {
		$this->db->select('*');
        $this->db->from('bop_users');
        $this->db->where('u_email',$post['u_email']);
        $this->db->where('u_password',md5($post['u_password']));
        $this->db->where('u_ut_id',1);
		$this->db->where('u_status',1);
		$query = $this->db->get();
		return $query->row();
        
    }
	public function getUserInfo($uid){
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_uid',$uid);        
		$this->db->where('u_ut_id',2);  		 
		$this->db->where('(u_status = 0 OR u_status = 1)');
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function checkPassword($uid,$pwd){
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_uid',$uid);        
		$this->db->where('u_password',md5($pwd));  		 
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function updateAdminProfile($uid,$ufname,$ulname,$umobile){
		$data = array(
            'u_firstname'  => $ufname,
            'u_lastname'   => $ulname,
            'u_mobile'     => $umobile,
			'u_modifiedat' => date('Y-m-d H:i:s'),
        );			
		$this->db->where('u_uid',$uid);
		if($this->db->update('bop_users',$data) === FALSE){                
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function checkEmailConfig(){
		$this->db->select('*');
        $this->db->from('bop_settings');
		$this->db->where('se_email!=""');        
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	
	public function addEmailConfig($se_email,$se_id){
		if($se_id==""){
			$data = array(
				'se_email'     => $se_email,           
				'se_createdat' => date('Y-m-d H:i:s'),
			);
			if($this->db->insert('bop_settings', $data) === FALSE){                
				return FALSE;
			}else{
				return TRUE;
			}	
		}else{
			$data = array(
				'se_email'      => $se_email,
				'se_modifiedat' =>  date('Y-m-d H:i:s'),
			);			
			$this->db->where('se_id',$se_id);
			if ($this->db->update('bop_settings',$data) === FALSE)
			{                
				return FALSE;
			}else{
				return TRUE;
			}
		}		
	}
	public function getProfileInfo($uid){
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_uid',$uid);        
		$this->db->where('u_ut_id',1);        
		$this->db->where('u_status',1);  		 
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function updatePassword($uid,$pwd){
		$data = array(
            'u_password'   => md5($pwd),
			'u_modifiedat' => date('Y-m-d H:i:s'),
        );			
		$this->db->where('u_uid',$uid);
		if($this->db->update('bop_users',$data) === FALSE){                
			return FALSE;
		}else{
			return TRUE;
		}
	}
    public function addUserByAdmin($post,$resizeImg)
	{
		$data = array(
            'u_ut_id'      => 2,
            'u_firstname'  => $post['u_firstname'],
            'u_lastname'   => $post['u_lastname'],
            'u_username'   => $post['u_username'],
            'u_email'      => $post['u_email'],
            'u_mobile'     => $post['u_mobile'],
            'u_password'   => md5($post['u_password']),
            'u_picture'    => $resizeImg,
            'u_modifiedat' => date('Y-m-d H:i:s'),
            'u_createdat'  => date('Y-m-d H:i:s'),
            'u_status'     => 1,
        );
        if($this->db->insert('bop_users', $data) === FALSE){                
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function updateUserByAdmin($post,$resizeImg)
	{
		$data = array(
            'u_firstname'  => $post['u_firstname'],
            'u_lastname'   => $post['u_lastname'],
            'u_username'   => $post['u_username'],
            'u_mobile'     => $post['u_mobile'],
            'u_picture'    => $resizeImg,
            'u_modifiedat' => date('Y-m-d H:i:s'),
        );			
		$this->db->where('u_uid',$post['u_uid']);
		if ($this->db->update('bop_users',$data) === FALSE)
		{                
			return FALSE;
		}else{
			return TRUE;
		}
	}	
	public function getUsersList(){
		$this->db->select('*');
        $this->db->from('bop_users');
        $this->db->where('u_ut_id',2);
        $this->db->where('u_status!=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function user_actions($post)
	{
		$status = array(
			'u_status'     => $post['statusMode'],
			'u_modifiedat' => date('Y-m-d H:i:s'),                     
		); 
        $this->db->where('u_uid',$post['id']);
		$this->db->update('bop_users',$status);
	}
	public function deleteProviders($post)
	{
		$this->db->where('sp_uid', $post['id']);
		$this->db->delete('bop_social_providers');		
	}
	public function getCareerList(){
		$this->db->select('*');
        $this->db->from('bop_careers');
        $this->db->where('bop_job_status!=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function careerdataview($post)
	{
		//print_r($post);exit;
		$this->db->select('*');
		$this->db->from('bop_careers');
        $this->db->where('bop_job_status !=',2);
        $this->db->where('bop_job_title =',$post['bop_job_title']);
        $this->db->where('bop_job_description =',$post['bop_job_description']);
        $this->db->where('bop_job_qualification =',$post['bop_job_qualification']);
		$this->db->where('bop_job_id !=',$post['hid_bop_job_id']);
		$query = $this->db->get();
		return $query->result();
	}
	public function addCareerList($post)
    {
		$data = array(
            'bop_job_title' 				=>ucfirst($post['bop_job_title']),
            
            'bop_job_description' 			=>ucfirst($post['bop_job_description']),        
            'bop_job_qualification' 		=>ucfirst($post['bop_job_qualification']),        
            'bop_job_created_at' 			=> date('Y-m-d H:i:s'),
            'bop_job_updated_at' 			=> date('Y-m-d H:i:s'),
            'bop_job_status' 				=> 1
        );
       return $this->db->insert('bop_careers', $data);	
	}
	public function getCareerInfo($uid){
		$this->db->select('*');
        $this->db->from('bop_careers');
		$this->db->where('bop_job_id',$uid);        
		$this->db->where('bop_job_status !=',2);  		 
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function updateCarer($post)
	{
		//print_r($post);exit;
		$stats = array(
			'bop_job_title'	        	=> ucfirst($post['bop_job_title']),
			'bop_job_description' 	    => ucfirst($post['bop_job_description']),
			'bop_job_qualification' 	=> ucfirst($post['bop_job_qualification']),
			'bop_job_updated_at'        => date('Y-m-d H:i:s')                     
			); 
        $this->db->where('bop_job_id',$post['hid_bop_job_id']);
		return $this->db->update('bop_careers',$stats);
		
	}
	public function career_actions($post)
	{
		$stats = array(
			'bop_job_status' 	=> $post['confrm_type'],
			'bop_job_updated_at' => date('Y-m-d H:i:s'),                     
		 ); 
        $this->db->where('bop_job_id',$post['confrm_u_id']);
		$this->db->update('bop_careers',$stats);
	}
	public function getBannerList(){
		$this->db->select('*');
        $this->db->from('bop_slider_banners');
        $this->db->join('bop_company_type', 'bop_company_type.ct_id = bop_slider_banners.sb_ct_id','LEFT');
        $this->db->where('sb_status!=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getcompany(){
		$this->db->select('*');
        $this->db->from('bop_company_type');
        $this->db->where('ct_status!=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function addBannerList($post,$bannerImgName)
    {
		$data = array(
            'sb_ct_id' 				=> $post['sb_ct_id'],            
            'sb_imagename' 			=> $bannerImgName,        
            'sb_link' 				=> $post['sb_link'],        
            'sb_createdat' 			=> date('Y-m-d H:i:s'),
            'sb_updadtedat' 		=> date('Y-m-d H:i:s'),
            'sb_status' 			=> 1
        );
       return $this->db->insert('bop_slider_banners', $data);	
	}
	public function getBannerInfo($uid){
		$this->db->select('*');
        $this->db->from('bop_slider_banners');
		$this->db->where('sb_id',$uid);        
		$this->db->where('sb_status !=',2);  		 
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function baner_actions($post)
	{
		$stats = array(
			'sb_status' 	=> $post['confrm_type'],
			'sb_updadtedat' => date('Y-m-d H:i:s'),                     
		 ); 
        $this->db->where('sb_id',$post['confrm_u_id']);
		$this->db->update('bop_slider_banners',$stats);
	}
	public function updateBaner($post,$bannerImgName)
	{
		//print_r($post);exit;
		$stats = array(
			'sb_ct_id'	        	=> $post['sb_ct_id'],
			'sb_imagename' 	    	=> $bannerImgName, 
			'sb_link' 				=> $post['sb_link'],
			'sb_updadtedat'       	=> date('Y-m-d H:i:s')                     
			); 
        $this->db->where('sb_id',$post['sb_id']);
		return $this->db->update('bop_slider_banners',$stats);
		
	}
	public function getSubscribes(){
		$this->db->select('*');
        $this->db->from('bop_subscribe');
        $this->db->where('bop_sub_status !=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function checkEmailExists($email){
		$this->db->select('*');
        $this->db->from('bop_subscribe');
        $this->db->where('bop_sub_email',$email);
        $this->db->where('bop_sub_status',1);
		$query = $this->db->get();
		return $query->result();
	}
	public function addEmail($post)
	{
		$data = array(
			// 'bop_sub_name' 	 	 => $post['name'],
			'bop_sub_email' 	 => $post['email'],
            'bop_sub_created_at' => date('Y-m-d H:i:s'),
            'bop_sub_updated_at' => date('Y-m-d H:i:s'),
            'bop_sub_status'     => 1,
        );
        if($this->db->insert('bop_subscribe', $data) === FALSE){                
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function getSubscriberInfo($uid){
		$this->db->select('*');
        $this->db->from('bop_subscribe');
		$this->db->where('bop_sub_id',$uid);        
		$this->db->where('bop_sub_status =',1);  		 
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function updateEmail($post)
	{
		$stats = array(
			// 'bop_sub_name'	        	=> $post['name'],
			'bop_sub_email'	        	=> $post['email'],
			'bop_sub_updated_at'       	=> date('Y-m-d H:i:s')                     
			); 
        $this->db->where('bop_sub_id',$post['h_subid']);
		return $this->db->update('bop_subscribe',$stats);
		
	}
	public function email_actions($post)
	{
		$stats = array(
			'bop_sub_status' 	=> $post['email_confrm_type'],
			'bop_sub_updated_at' => date('Y-m-d H:i:s'),                     
		 ); 
        $this->db->where('bop_sub_id',$post['email_u_id']);
		$this->db->update('bop_subscribe',$stats);
	}
	public function getCheckboxces(){
		$this->db->select('*');
        $this->db->from('bop_subscribe');
        $this->db->where('bop_sub_status !=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function getCheckMails($val){
		$this->db->select('*');
        $this->db->from('bop_subscribe');
        $this->db->where('bop_sub_id =',$val);
        $this->db->where('bop_sub_status !=2');
		$query = $this->db->get();
		return $query->row();	
	}
	
	public function insertSelectedMails($post,$addtemplateres)
	{
		$data = array(
			'bop_sel_sub_id' 	 => $post->bop_sub_id,
			// 'bop_sel_name' 	 	 => $post->bop_sub_name,
			'bop_sel_email' 	 => $post->bop_sub_email,
			'bop_sel_temp_id' 	 => $addtemplateres,
            'bop_sel_created_at' => date('Y-m-d H:i:s'),
            'bop_sel_updatedat' => date('Y-m-d H:i:s'),
            'bop_sel_status'     => 0,
        );
        $this->db->insert('bop_selected_users', $data);
	}
	public function getselectedMails(){
		$this->db->select('*');
        $this->db->from('bop_selected_users');
		$this->db->join('bop_subscribe', 'bop_subscribe.bop_sub_id = bop_selected_users.bop_sel_sub_id','LEFT');
        //$this->db->where('bop_sel_sub_id =',$val);
        $this->db->where('bop_sel_status !=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function updateselectedMails($selid)
	{
		$status = array(
			'bop_sel_status' 	=> 1,
			'bop_sel_updatedat' => date('Y-m-d H:i:s'),                     
		 ); 
        $this->db->where('bop_sel_id',$selid);
		$this->db->update('bop_selected_users',$status);
	}
	public function updateunsubscribeMails($suburi)
	{
		$status = array(
			'bop_sub_status' 	=> 2,
			'bop_sub_updated_at' => date('Y-m-d H:i:s'),                     
		 ); 
        $this->db->where('bop_sub_id',$suburi);
		$this->db->update('bop_subscribe',$status);
	}
	public function addtemp($post)
	{
			$data = array(
				'bop_temp_desc' 	 => $post['article_desc'],
				'bop_temp_status'     => 1,
				'bop_created_at' => date('Y-m-d H:i:s'),
				'bop_updated_at' => date('Y-m-d H:i:s'),
				
			);
			$this->db->insert('bop_templates', $data);
		 return $this->db->insert_id();
	}
	public function updateSelectedMailtemp($post)
	{
		print_r($post);exit;
		$status = array(
			'bop_sel_template' 	=> $post['article_desc'],
			'bop_sel_updatedat' => date('Y-m-d H:i:s'),                     
		 ); 
        $this->db->where('bop_sel_sub_id',$post['hid_val']);
		$this->db->update('bop_selected_users',$status);
	}
	public function getselectedEmails(){
		$this->db->select('*');
        $this->db->from('bop_selected_users');
		$this->db->join('bop_subscribe', 'bop_subscribe.bop_sub_id = bop_selected_users.bop_sel_sub_id','LEFT');
		$this->db->join('bop_templates', 'bop_templates.bop_temp_id = bop_selected_users.bop_sel_temp_id','LEFT');
		$this->db->where('bop_sel_status =0');
		$query = $this->db->get();
		return $query->result();	
	}
	public function gettempid(){
		$this->db->select('*');
        $this->db->from('bop_templates');
        //$this->db->where('bop_sub_id =',$val);
        $this->db->where('bop_temp_status !=2');
		$query = $this->db->get();
		return $query->result();	
	}
	public function gettabledata($userEmail){
		$this->db->select('u_firstname');
        $this->db->from('bop_users');
        $this->db->where('u_email =',$userEmail);
        $this->db->where('u_status !=2');
		$query = $this->db->get();
		return $query->row();	
	}
	public function inserttabledata($post)
	{
		$data = array(
            'u_ut_id'      => 2,
            'u_firstname'  => $post['u_firstname'],
            'u_lastname'   => $post['u_lastname'],
            'u_username'   => $post['u_username'],
            'u_email'      => $post['u_email'],
            'u_mobile'     => $post['u_mobile'],
            'u_password'   => md5($post['u_password']),
            'u_picture'    => $post['u_picture'],
            'u_modifiedat' => date('Y-m-d H:i:s'),
            'u_createdat'  => date('Y-m-d H:i:s'),
            'u_status'     => 1,
        );
        if($this->db->insert('bop_users', $data) === FALSE){                
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function getCompanies($type) {
		$this->db->select('*');
        $this->db->from('bop_compaines');
        $this->db->where('cm_ctid =',$type);
        $this->db->where('cm_status !=2');
		$query = $this->db->get();
		return $query->result();	

	}

	public function getMilestones($cm_id)
	{
		# code...
		$this->db->select('*');
		$this->db->from('bop_company_milestones');
        $this->db->join('bop_company_milestone_status', 'bop_company_milestones.ms_mss_id = bop_company_milestone_status.mss_id');
        $this->db->where('ms_cmid=',$cm_id->cm_id);
		$this->db->where('ms_status !=2');
		$query = $this->db->get();
		return $query->result();	

	}


	public function getCoreTeam($cm_id)
	{
		# code..
		$this->db->select('*');
        $this->db->from('bop_company_coreteam');
        $this->db->where('cot_cmid =',$cm_id);
        $this->db->where('cot_status !=2');
		$query = $this->db->get();
		return $query->result();
	}

	public function getResources($cm_id)
	{
		# code...
		$this->db->select('*');
        $this->db->from('bop_company_resources');
        $this->db->where('cr_cmid =',$cm_id);
        $this->db->where('cr_status !=2');
		$query = $this->db->get();
		return $query->result();
	}

	public function getAdvisoryTeam($cm_id)
	{
		# code...
		$this->db->select('*');
        $this->db->from('bop_company_advisoryteam');
        $this->db->where('adt_cmid =',$cm_id);
        $this->db->where('adt_status !=2');
		$query = $this->db->get();
		return $query->result();
	}
	public function getTradeExchangeTeam($cm_id)
	{
		# code...
		$this->db->select('*');
        $this->db->from('bop_company_tradingexchanges');
        $this->db->where('te_cmid =',$cm_id);
        $this->db->where('te_status !=2');
		$query = $this->db->get();
		return $query->result();
	}
	public function getEscrowsTeam($cm_id)
	{
		# code...
		$this->db->select('*');
        $this->db->from('bop_escrow_details');
        $this->db->where('ed_cmid =',$cm_id);
        $this->db->where('ed_status !=2');
		$query = $this->db->get();
		return $query->result();
	}


	public function checkuniquieId($cm_unique_id)
	{
		# code...
		$this->db->select('cm_unique_id');
        $this->db->from('bop_compaines');
        $this->db->where('cm_unique_id', $cm_unique_id);
        $this->db->where('cm_status !=2');
		$query = $this->db->get();
		return $query->row();
	}

	public function insertComanydetails($comanyList)
	{
		# code...
		$cm_uid = $this->session->userdata('user_id');	

		$data = array(
			'cm_uid'				=> $cm_uid,
            'cm_unique_id'  		=> $comanyList['cm_unique_id'],
			'cm_ctid'				=> $comanyList['cm_ctid'],
            'cm_name'  				=> $comanyList['cm_name'],
            'cm_decript'  			=> $comanyList['cm_decript'],
            'cm_siteurl'  			=> $comanyList['cm_siteurl'],
            'cm_marketcap'  		=> $comanyList['cm_marketcap'],
            'cm_email'  			=> $comanyList['cm_email'],
            'cm_slack'  			=> $comanyList['cm_slack'],
            'cm_twitter'  			=> $comanyList['cm_twitter'],
            'cm_facebook'  			=> $comanyList['cm_facebook'],
            'cm_github'  			=> $comanyList['cm_github'],
            'cm_telegram'  			=> $comanyList['cm_telegram'],
            'cm_coinmarket_cap'  	=> $comanyList['cm_coinmarket_cap'],
            'cm_picture'  			=> $comanyList['cm_picture'],
            'cm_address'  			=> $comanyList['cm_address'],
            'cm_discord'  			=> $comanyList['cm_discord'],
			'cm_caretedat' 			=> date('Y-m-d H:i:s'),
			'cm_modifiedat' 		=> date('Y-m-d H:i:s'),
			'cm_status'				=> 1
        );			
		if($this->db->insert('bop_compaines', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}

	}

	public function insertToMilestones($mileStones)
	{
		# code...
		$data = array(
			'ms_cmid'				=> $mileStones['ms_cmid'],
			'ms_title'				=> $mileStones['ms_title'],
			'ms_mss_id'				=> $mileStones['ms_mss_id'],
			'ms_status'				=> 1,
			'ms_createdat' 			=> date('Y-m-d H:i:s'),
			'ms_modifiedat' 		=> date('Y-m-d H:i:s'),
		);
		if($this->db->insert('bop_company_milestones', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function insertToResources($resources)
	{
		# code...
		$data = array(
			'cr_name'				=> $resources['cr_name'],
			'cr_cmid'				=> $resources['cr_cmid'],
			'cr_url'				=> $resources['cr_url'],
			'cr_status'				=> 1,
			'cr_created_at' 			=> date('Y-m-d H:i:s'),
			'cr_updated_at' 		=> date('Y-m-d H:i:s'),
		);
		if($this->db->insert('bop_company_resources', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function insertToCoreTeam($coreTeam)
	{
		# code...
		$data = array(
			'cot_name'				=> $coreTeam['cot_name'],
			'cot_cmid'				=> $coreTeam['cot_cmid'],
			'cot_profile_url'		=> $coreTeam['cot_profile_url'],
			'cot_status'			=> 1,
			'cot_modifiedat' 		=> date('Y-m-d H:i:s'),
		);
		if($this->db->insert('bop_company_coreteam', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function insertToAdtTeam($adtTeam)
	{
		# code...
		$data = array(
			'adt_name'				=> $adtTeam['adt_name'],
			'adt_cmid'				=> $adtTeam['adt_cmid'],
			'adt_profile_url'		=> $adtTeam['adt_profile_url'],
			'adt_status'			=> 1,
			'adt_modifiedat' 		=> date('Y-m-d H:i:s'),
		);
		if($this->db->insert('bop_company_advisoryteam', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function insertToTradeExchange($tradeExchange)
	{
		# code...
		$data = array(
			'te_title'				=> $tradeExchange['te_title'],
			'te_cmid'				=> $tradeExchange['te_cmid'],
			'te_url'				=> $tradeExchange['te_url'],
			'te_status'				=> 1,
			'te_createdat' 			=> date('Y-m-d H:i:s'),
			'te_modifiedat' 		=> date('Y-m-d H:i:s'),
		);
		if($this->db->insert('bop_company_tradingexchanges', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}


	public function insertICOComanydetails($comanyList)
	{
		# code...
		$cm_uid = $this->session->userdata('user_id');	

		$data = array(
			'cm_uid'								=> $cm_uid,
            // 'cm_unique_id'  						=> $comanyList['cm_unique_id'],
			'cm_ctid'								=> $comanyList['cm_ctid'],
            'cm_name'  								=> $comanyList['cm_name'],
            'cm_decript'  							=> $comanyList['cm_decript'],
            'cm_siteurl'  							=> $comanyList['cm_siteurl'],
            'cm_marketcap'  						=> $comanyList['cm_marketcap'],
            'cm_total_token_supply'  				=> $comanyList['cm_total_token_supply'],
            'cm_tokens_available_crowd_sale'  		=> $comanyList['cm_tokens_available_crowd_sale'],
            'cm_ico_start_date'  					=> $comanyList['cm_ico_start_date'],
            'cm_ico_start_time'  					=> $comanyList['cm_ico_start_time'],
            'cm_ico_end_date'  						=> $comanyList['cm_ico_end_date'],
            'cm_ico_end_time'  						=> $comanyList['cm_ico_end_time'],
            'cm_email'  							=> $comanyList['cm_email'],
            'cm_slack'  							=> $comanyList['cm_slack'],
            'cm_twitter'  							=> $comanyList['cm_twitter'],
            'cm_facebook'  							=> $comanyList['cm_facebook'],
            'cm_github'  							=> $comanyList['cm_github'],
            'cm_telegram'  							=> $comanyList['cm_telegram'],
            'cm_coinmarket_cap'  					=> $comanyList['cm_coinmarket_cap'],
            'cm_address'  							=> $comanyList['cm_address'],
            'cm_picture'  							=> $comanyList['cm_picture'],
            'cm_discord'  							=> $comanyList['cm_discord'],
			'cm_caretedat' 							=> date('Y-m-d H:i:s'),
			'cm_modifiedat' 						=> date('Y-m-d H:i:s'),
			'cm_status'								=> 1
        );			
		// $this->db->where('u_uid',$uid);
		if($this->db->insert('bop_compaines', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}

	}

	public function insertToEscrowDetails($escrowAdd)
	{
		# code...
		$data = array(
			'ed_name'				=> $escrowAdd['ed_name'],
			'ed_cmid'				=> $escrowAdd['ed_cmid'],
			'ed_url'				=> $escrowAdd['ed_url'],
			'ed_status'				=> 1,
			'ed_created_at' 		=> date('Y-m-d H:i:s'),
			'ed_updated_at' 		=> date('Y-m-d H:i:s'),
		);
		if($this->db->insert('bop_escrow_details', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}

	public function insertedUnqiueCode($cm_id, $cm_unique_id)
	{
		# code...
		print_r($cm_id.' '.$cm_unique_id);exit;
		$data = array(
			'cm_unique_id'     	=> $cm_unique_id,
		);
        $this->db->where('cm_id',$cm_id);
		$this->db->update('bop_compaines',$data);
	}

}