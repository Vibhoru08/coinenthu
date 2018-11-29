<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    
    private $data;
    private $js_file;
    private $css_file;   
    private $folder;
    private $timeSetting;
    protected $login_check = TRUE;
	public $timeSettings = '18:00:00';
	private $whislist = array('userManagement','addUserView','editUser','subCatManagement','leavesManangement','viewLeave','holidayslist','addholidays','editholidays','projectslist','getyear','categories-management','usermanagement','subcategories-management','leaves-management','view-leave','holidays-list','addholidays','editholidays','projects-list','years-list');
            
	function __construct(){
        parent::__construct();
		ini_set('display_errors',0);
		$this->load->library(array('session'));
		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('User_model');		
		$this->load->model('Companies_model');		
        date_default_timezone_set('Asia/Kolkata');		
		$this->output->enable_profiler(FALSE);	
		$page_url = $this->uri->segment(1);
		if($this->session->userdata('usertype') == 'User')
		{
			if($page_url == 'admin')
			{
				redirect(base_url());
			}
		}
    }
    
	function array_push_assoc($array, $key, $value)
	{
		$array[$key] = $value;
		return $array;

	}

    
    
    public function set_folder($folder)
    {
        $this->folder = $folder;
    }

    public function show( $page, $val=null)
    {
        if ( ! file_exists('application/views/'.  $this->folder.'/'.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            $this->data = $val;
			if($this->uri->segment(1) == 'company-full-view')
			{
				$com_unique_id = $this->uri->segment(2);
				$this->data['CompanyDetails'] = $this->Companies_model->getcompanyinfo($com_unique_id);
			}
                       
			$this->data['main_content'] = $this->load->view($this->folder.'/'.$page, $this->data, true);
            $this->load->view('template', $this->data);
        }
    }   
    
	public function show_admin( $page, $val=null)
    {
		if ( ! file_exists('application/views/'.  $this->folder.'/'.$page.'.php' ) ){
            show_404();
        }else{
            $this->data = $val; 			
            $this->data['main_content'] = $this->load->view($this->folder.'/'.$page, $this->data, true);
			$this->load->view('admin/admin_template', $this->data);
        }
    }
	
    protected function no_cache()
      {
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
      }
}


