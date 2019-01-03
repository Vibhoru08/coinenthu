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
		$cm_cpid  = 1;
		$limit    = 9;
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
