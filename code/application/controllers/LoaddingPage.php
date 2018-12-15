<?php
class LoaddingPage extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->library(array('email','form_validation','session','pagination'));
        $this->load->database();              
		$this->load->model('Admin_model');
		$this->load->library('pagination');
		$this->load->helper('url');	
	}
	/* public function index()
	{
		$data = array();	
		// echo "Dileep";exit;
		$this->show('index',$data);		
	}*/
	public function index()
	{		
		$redirectUrl = base_url().'home';
		redirect($redirectUrl);		
	}
	public function Home()
	{
		$data = array();
		$this->show('home',$data);
	}
	public function aboutUs()
	{
		$data = array();	
		$this->show('index',$data);		
	}	

	public function commentsPolicy()
	{
		# code...
		$data = array();	
		$this->show('comments-policy', $data);		
	}
	public function privacyPolicy()
	{
		# code...
		$data = array();	
		$this->show('privacy-policy', $data);		
	}
	public function termsOfUse()
	{
		# code...
		$data = array();	
		$this->show('terms-of-use', $data);
	}
}
?>