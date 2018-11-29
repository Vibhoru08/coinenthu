<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{   
    public function __construct()
    {
        parent::__construct();    
		// return $this->db->last_query();
    }	
	public function deleteForgetToken($uid){
		$this->db->where('ft_uid', $uid);        
		$this->db->delete('bop_forgot_tokens');
		return 1;
	}
	public function updateForgetpwd($ft_id,$token){
		$data = array(
            'ft_tokencode'  => $token,
            'ft_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('ft_id',$ft_id);
		if ($this->db->update('bop_forgot_tokens',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		} 
	}
	public function insertForgetpwd($u_uid,$token){
		$data = array(
            'ft_uid'       => $u_uid,
            'ft_tokencode' => $token,
            'ft_status'    => 1,
            'ft_createdat' => date('Y-m-d H:i:s'),
        );
		if($this->db->insert('bop_forgot_tokens', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}  
	}
	//Careers start	
	public function getCareers($limit,$offset){
		$this->db->select('*');
        $this->db->from('bop_careers');
		$this->db->where('bop_job_status !=',2);
		$this->db->limit($limit,$offset);	
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function totalCountCareers(){
		$this->db->select('*');
        $this->db->from('bop_careers');       
		$this->db->where('bop_job_status !=',2);
		return $this->db->count_all_results();
	}
	public function getSearchcareers($limit,$offset){
		$this->db->select('*');
		$this->db->from('bop_careers');
		$this->db->where('bop_job_status =',1);
		$this->db->limit($limit,$offset);
		//echo $this->db->get_compiled_select();exit;
		$query = $this->db->get();
		return $query->result();
	}
	public function getSearchCareerCounts(){
		$this->db->select('*');
		$this->db->from('bop_careers');
		$this->db->where('bop_job_status =',1);
		//$this->db->limit($limit,$offset);
		//echo $this->db->get_compiled_select();exit;
		$query = $this->db->get();
		return $query->result();
	}
	
	public function checkForgotMail($uid){
		$this->db->select('*');
        $this->db->from('bop_forgot_tokens');
		$this->db->where('ft_uid',$uid); 
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getUserInfo($email){
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_email',$email); 
		$this->db->where('u_status',1); 
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getCountries(){
		$this->db->select('*');
        $this->db->from('bop_countries');
		$query = $this->db->get();
		return $result = $query->result();
	}
	
	public function insertuserinfotwitter($post){
		if(isset($post['first_name']) && $post['first_name']!=""){
			$u_firstname  = $post['first_name'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['last_name']) && $post['last_name']!=""){
			$u_lastname  = $post['last_name'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['username']) && $post['username']!=""){
			$u_username  = $post['username'];
		}else{
			$u_username  = "";
		}
		if(isset($post['picture_url']) && $post['picture_url']!=""){
			$userPic  = $post['picture_url'];
		}else{
			$userPic  = "";
		}
		if(isset($post['email']) && $post['email']!=""){
			$u_email  = $post['email'];
		}else{
			$u_email  = "";
		}
		$loggegwithscoial = 'twitterLogin';
		$data = array(
            'u_ut_id'      => 2,
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_username'   => $u_username,
            'u_email'      => $u_email,
            'u_social_pic' => $userPic,
            'u_logged_from'=> $loggegwithscoial,
            'u_modifiedat' => date('Y-m-d H:i:s'),
            'u_createdat'  => date('Y-m-d H:i:s'),
            'u_status'     => 1,
        );
        if($this->db->insert('bop_users', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function updateuserinfotwitter($post,$u_uid){
		if(isset($post['first_name']) && $post['first_name']!=""){
			$u_firstname  = $post['first_name'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['last_name']) && $post['last_name']!=""){
			$u_lastname  = $post['last_name'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['username']) && $post['username']!=""){
			$u_username  = $post['username'];
		}else{
			$u_username  = "";
		}
		if(isset($post['picture_url']) && $post['picture_url']!=""){
			$userPic  = $post['picture_url'];
		}else{
			$userPic  = "";
		}
		if(isset($post['email']) && $post['email']!=""){
			$u_email  = $post['email'];
		}else{
			$u_email  = "";
		}
		$data = array(
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_username'   => $u_username,
            'u_email'      => $u_email,
            'u_social_pic' => $userPic,
            'u_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('u_uid',$u_uid);
		if ($this->db->update('bop_users',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		} 
	}
	
	public function insertuserinfogmail($post){
		if(isset($post['given_name']) && $post['given_name']!=""){
			$u_firstname  = $post['given_name'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['family_name']) && $post['family_name']!=""){
			$u_lastname  = $post['family_name'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['picture']) && $post['picture']!=""){
			$userPic  = $post['picture'];
		}else{
			$userPic  = "";
		}
		if(isset($post['email']) && $post['email']!=""){
			$u_email  = $post['email'];
		}else{
			$u_email  = "";
		}
		$loggegwithscoial = 'gmailLogin';
		$data = array(
            'u_ut_id'      => 2,
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_email'      => $u_email,
            'u_social_pic' => $userPic,
            'u_logged_from'=> $loggegwithscoial,
            'u_modifiedat' => date('Y-m-d H:i:s'),
            'u_createdat'  => date('Y-m-d H:i:s'),
            'u_status'     => 1,
        );
        if($this->db->insert('bop_users', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function updateuserinfogmail($post,$u_uid)
	{
		if(isset($post['given_name']) && $post['given_name']!=""){
			$u_firstname  = $post['given_name'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['family_name']) && $post['family_name']!=""){
			$u_lastname  = $post['family_name'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['picture']) && $post['picture']!=""){
			$userPic  = $post['picture'];
		}else{
			$userPic  = "";
		}
		if(isset($post['email']) && $post['email']!=""){
			$u_email  = $post['email'];
		}else{
			$u_email  = "";
		}
		$data = array(
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_email'      => $u_email,
            'u_social_pic' => $userPic,
            'u_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('u_uid',$u_uid);
		if ($this->db->update('bop_users',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		} 
	}
	public function updateProfile($u_uid,$post){
		if(isset($post['u_firstname']) && $post['u_firstname']!=""){
			$u_firstname  = $post['u_firstname'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['u_lastname']) && $post['u_lastname']!=""){
			$u_lastname  = $post['u_lastname'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['u_username']) && $post['u_username']!=""){
			$u_username  = $post['u_username'];
		}else{
			$u_username  = "";
		}
		if(isset($post['u_picture']) && $post['u_picture']!=""){
			$userPic  = $post['u_picture'];
		}else{
			$userPic  = "";
		}
		$data = array(
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_username'   => $u_username,
            'u_picture'    => $userPic,
            'u_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('u_uid',$u_uid);
		if ($this->db->update('bop_users',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		} 
	}
	public function updateuserinfo($post,$u_uid)
	{
		if(isset($post['userName']) && $post['userName']!=""){
			$u_firstname  = $post['userName'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['last_name']) && $post['last_name']!=""){
			$u_lastname  = $post['last_name'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['userPic']) && $post['userPic']!=""){
			$userPic  = $post['userPic'];
		}else{
			$userPic  = "";
		}
		if(isset($post['email']) && $post['email']!=""){
			$u_email  = $post['email'];
		}else{
			$u_email  = "";
		}
		$data = array(
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_email'      => $u_email,
            'u_social_pic' => $userPic,
            'u_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('u_uid',$u_uid);
		if ($this->db->update('bop_users',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		} 
	}
	public function insertuserinfo($post){
		if(isset($post['userName']) && $post['userName']!=""){
			$u_firstname  = $post['userName'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['last_name']) && $post['last_name']!=""){
			$u_lastname  = $post['last_name'];
		}else{
			$u_lastname  = "";
		}
		if(isset($post['userPic']) && $post['userPic']!=""){
			$userPic  = $post['userPic'];
		}else{
			$userPic  = "";
		}
		if(isset($post['email']) && $post['email']!=""){
			$u_email  = $post['email'];
		}else{
			$u_email  = "";
		}
		$loggegwithscoial = 'fbLogin';
		$data = array(
            'u_ut_id'      => 2,
            'u_firstname'  => $u_firstname,
            'u_lastname'   => $u_lastname,
            'u_email'      => $u_email,
            'u_social_pic' => $userPic,
            'u_logged_from'=> $loggegwithscoial,
            'u_modifiedat' => date('Y-m-d H:i:s'),
            'u_createdat'  => date('Y-m-d H:i:s'),
            'u_status'     => 1,
        );
        if($this->db->insert('bop_users', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function updatetheUserStatus($u_uid){
		$data = array(
            'u_status'     => 1,
            'u_modifiedat' => date('Y-m-d H:i:s'),
        );
		$this->db->where('u_uid',$u_uid);
		if ($this->db->update('bop_users',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		}
	}
	public function insertData($post){
		if(isset($post['username']) && $post['username']!=""){
			$u_firstname  = $post['username'];
		}else{
			$u_firstname  = "";
		}
		if(isset($post['username']) && $post['username']!=""){
			$u_username  = $post['username'];
		}else{
			$u_username  = "";
		}
		if(isset($post['uemail']) && $post['uemail']!=""){
			$u_email	  = strtolower($post['uemail']);
		}else{
			$u_email  = "";
		}
		if(isset($post['upassword']) && $post['upassword']!=""){
			$upassword  = $post['upassword'];
		}else{
			$upassword  = "";
		}
		$data = array(
            'u_ut_id'      => 2,
            'u_firstname'  => $u_firstname,
            'u_username'  => $u_username,
            'u_email'      => $u_email,
            'u_password'   => md5($upassword),
            'u_modifiedat' => date('Y-m-d H:i:s'),
            'u_createdat'  => date('Y-m-d H:i:s'),
            'u_status'     => 0,
        );
        if($this->db->insert('bop_users', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function fbaddSocialProvide($sp_suid,$sp_uid){
		$data = array(
            'sp_suid'  => $sp_suid,
            'sp_uid'   => $sp_uid,
        );
        if($this->db->insert('bop_social_providers', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}
	public function checkEmailExists($email){
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_email',$email); 
		$this->db->where('u_status!=2');
		return $this->db->count_all_results();
	}
	public function checkUserNameExists($username){
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_username',$username); 
		$this->db->where('u_status!=2');
		return $this->db->count_all_results();
	}
	public function fbcheckProvider($uid){
		$this->db->select('*');
        $this->db->from('bop_social_providers');
		$this->db->where('sp_suid',$uid); 
		$query = $this->db->get();
		return $result = $query->row();
	}
    public function userLogin($email,$pwd){
		$passWord = md5($pwd);
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_email',$email); 
		$this->db->where('u_password',$passWord); 
		$this->db->where('u_ut_id',2); 
		$this->db->where('u_status',1); 
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function getUserDetails($uid)
	{
		$this->db->select('*');
        $this->db->from('bop_users');
		$this->db->where('u_uid',$uid);
		$query = $this->db->get();
		return $result = $query->row(); 
	}
	public function getCountryName($countryid){
		$this->db->select('name');
        $this->db->from('bop_countries');
		$this->db->where('id',$countryid); 
		$query = $this->db->get();
		return $result = $query->row();
	}
	public function add_Email($post){
		$data = array(
            // 'bop_sub_name'      => $post['subname'],
            'bop_sub_email'      => $post['email'],
            'bop_sub_created_at' => date('Y-m-d H:i:s'),
            'bop_sub_updated_at'  => date('Y-m-d H:i:s'),
            'bop_sub_status'     => 1,
        );
        if($this->db->insert('bop_subscribe', $data) === FALSE){                
			return 0;
		}else{
			return $this->db->insert_id();
		}
	}	

	public function checkEmail($post)
	{
		# code...
		$this->db->select('bop_sub_email');
        $this->db->from('bop_subscribe');
		$this->db->where('bop_sub_email',$post['email']); 
		$query = $this->db->get();
		return $result = $query->row();

	}

	public function updateSubscribe($post)
	{
		# code...
		$data = array(
			'bop_sub_updated_at' => date('Y-m-d H:i:s'),
		);
		$this->db->where('bop_sub_email',$post['email']); 
		if ($this->db->update('bop_subscribe',$data) === FALSE)
		{                
			return 0;
		}else{
			return 1;
		} 
	}

	public function getRemainingcareers($limit,$offset)
	{
		# code...
		$this->db->select('*');
        $this->db->from('bop_careers');
		$this->db->where('bop_job_status !=',2);
		$this->db->limit($limit,$offset);	
		$query = $this->db->get();
		//print_r($this->db->last_query());exit;
		return $result = $query->result();

	}

}