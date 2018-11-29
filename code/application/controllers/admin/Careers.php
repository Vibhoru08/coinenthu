<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Careers extends MY_Controller {
    public $menucount = array();
	public $isSuperAdmin = 0;
    
    function __construct() {
        parent::__construct();
		$this->load->library(array('email','form_validation','session','pagination'));
        $this->load->database();              
		$this->load->model('Companies_model');
		$this->load->model('Admin_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('email');

    }	
	public function careerActions(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			$this->show_admin('admin/career-management',$data);
		}		
	}
	public function careerList(){
		$result = $this->Admin_model->getCareerList();
		if(count($result) != 0){
			foreach($result as $key=>$ad){
				$baseUrl = '';
				if(isset($ad->bop_job_id) && $ad->bop_job_id != "" )
				{
					$data[$key]['bop_job_id']  = $ad->bop_job_id;
				}else{
					$data[$key]['bop_job_id']  = "";
				}
				$date = date("d/m/Y", strtotime("$ad->bop_job_created_at"));
				if(isset($ad->bop_job_created_at) && $ad->bop_job_created_at != "" )
				{
					$data[$key]['bop_job_created_at']  = $date;
				}else{
					$data[$key]['bop_job_created_at']  = "";
				}
								
				if(isset($ad->bop_job_title) && $ad->bop_job_title != "")
				{
					$data[$key]['bop_job_title']  = $ad->bop_job_title;
				}else{
					$data[$key]['bop_job_title']  = "";
				}
				if(isset($ad->bop_job_description) && $ad->bop_job_description != "")
				{
					$data[$key]['bop_job_description']  = $ad->bop_job_description;
				}else{
					$data[$key]['bop_job_description']  = "";
				}
				if(isset($ad->bop_job_qualification) && $ad->bop_job_qualification != "")
				{
					$data[$key]['bop_job_qualification']  = $ad->bop_job_qualification;
				}else{
					$data[$key]['bop_job_qualification']  = "";
				}
				
				if($ad->bop_job_status=='1'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
				}else if($ad->bop_job_status=='2'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Delete" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else if($ad->bop_job_status=='0'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
				}
				$data[$key]['u_status']          	= 	$fqf_status;
				$whitchPage = "'usermanag'";
				if($ad->bop_job_status == 1){
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-career/'.$ad->bop_job_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Hidden" onclick="careerConforms('.$ad->bop_job_id.',0);" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
											<a href="javascript:void(0);" title="Delete" onclick="careerConforms('.$ad->bop_job_id.',2);" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else{
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-career/'.$ad->bop_job_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Live" onclick="careerConforms('.$ad->bop_job_id.',1);" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
											<a href="javascript:void(0);" title="Delete" onclick="careerConforms('.$ad->bop_job_id.',2);" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}
			}
			$faqqstns['aaData'] = $data;
		}else{
			$faqqstns['aaData'] = array();		
		}
		echo json_encode($faqqstns); exit;
	}
	public function addCareer(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$data = array();
			$this->show_admin('admin/add-career',$data);
		}
	}
	public function addCarer()
	{
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
				$result=$this->Admin_model->careerdataview($_POST);
				if(count($result) > 0)
				{
					echo json_encode(array('status'=>FALSE,'output'=>'fail'));
				}
				else
				{
					$data=array();
					$data=$this->Admin_model->addCareerList($_POST);
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}
			
			}
	}
	public function editCareer(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$uid = $this->uri->segment('3');
			$data = array();
			$data['careerdeatils'] = $this->Admin_model->getCareerInfo($uid);
			$this->show_admin('admin/edit-career',$data);
		}
	}
	public function updateCareer()
	{
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
				$result=$this->Admin_model->careerdataview($_POST);
				if(count($result) > 0)
				{
					echo json_encode(array('status'=>FALSE,'output'=>'fail'));
				}
				else
				{
					$data=array();
					$data = $this->Admin_model->updateCarer($this->input->post());
					echo json_encode(array('status'=>TRUE,'output'=>'success'));
				}			
		}
	}
	public function careerActions1()
	{
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$data = $this->Admin_model->career_actions($this->input->post());
		}
	}
	
}