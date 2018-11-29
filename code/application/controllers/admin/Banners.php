<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banners extends MY_Controller {
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
	public function banerActions(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{			
			$data = array();
			
			$this->show_admin('admin/banner-management',$data);
		}		
	}
	public function bannerList(){
		$result = $this->Admin_model->getBannerList();
		if(count($result) != 0){
			foreach($result as $key=>$ad){
				$baseUrl = '';
				if(isset($ad->sb_ct_id) && $ad->sb_ct_id != "" && $ad->sb_ct_id == 1)
				{
					$data[$key]['ct_name']  = 'Digital Asset';
				}else if(isset($ad->sb_ct_id) && $ad->sb_ct_id != "" && $ad->sb_ct_id == 2)
				{
					$data[$key]['ct_name']  = 'ICO';
				}else if(isset($ad->sb_ct_id) && $ad->sb_ct_id != "" && $ad->sb_ct_id == 3)
				{
					$data[$key]['ct_name']  = 'Review';
				}else{
					$data[$key]['ct_name']  = "";
				}
				
				if(isset($ad->sb_imagename) && $ad->sb_imagename != "" )
				{
					$data[$key]['sb_imagename'] ="<img src='".base_url()."asset/img/banners/".$ad->sb_imagename."' style='height:70px;width:70px' />";
				}else{
					$data[$key]['sb_imagename']  = "";
				}
							
				if(isset($ad->sb_link) && $ad->sb_link != "")
				{
					$data[$key]['sb_link']  = $ad->sb_link;
				}else{
					$data[$key]['sb_link']  = "";
				}
				if($ad->sb_status=='1'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Live" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>';
				}else if($ad->sb_status=='2'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Delete" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else if($ad->sb_status=='0'){
					$fqf_status						=	'<a href="javascript:void(0);" title="Hidden" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>';
				}
				$data[$key]['u_status']          	= 	$fqf_status;
				$whitchPage = "'usermanag'";
				if($ad->sb_status == 1){
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-banner/'.$ad->sb_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Hidden" onclick="bannerConforms('.$ad->sb_id.',0);" data-toggle="tooltip" data-placement="top" class="color_r"><i class="fa fa-times-circle"></i></a>
											<a href="javascript:void(0);" title="Delete" onclick="bannerConforms('.$ad->sb_id.',2);" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}else{
					$data[$key]['action']   = '<a href="'.base_url().'admin/edit-banner/'.$ad->sb_id.'"  title="Edit" class="color_b" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> </a>
											<a href="javascript:void(0);" title="Live" onclick="bannerConforms('.$ad->sb_id.',1);" data-toggle="tooltip" data-placement="top" class="color_g"><i class="fa fa-check-circle"></i> </a>
											<a href="javascript:void(0);" title="Delete" onclick="bannerConforms('.$ad->sb_id.',2);" data-toggle="tooltip" data-placement="top" style="color:red"><i class="fa fa-trash-o"></i></a>';
				}
			}
			$faqqstns['aaData'] = $data;
		}else{
			$faqqstns['aaData'] = array();		
		}
		echo json_encode($faqqstns); exit;
	}
	public function addBanner(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else if(isset($_POST['sb_ct_id']) && $_POST['sb_ct_id']!="" && isset($_POST['sb_link']) && $_POST['sb_link']!=""){
				$target_dir 	= './asset/img/banners/';
				$temp 			= explode(".", $_FILES["sb_imagename"]["name"]);
				$newfilename 	= date('Ymd_His') . '.' . end($temp);

				$target_file 	= $target_dir . $newfilename;
				copy( $_FILES["sb_imagename"]["tmp_name"],$target_file);	
					
				$bannerImgName = $newfilename;
				$data=$this->Admin_model->addBannerList($_POST,$bannerImgName);
				echo json_encode(array('status'=>TRUE,'output'=>'success'));
			}else{
				$data = array();
				$data['companyDetails'] = $this->Admin_model->getcompany();
				$this->show_admin('admin/add-banner',$data);
			}
		
	}
	public function editBanner(){
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else if(isset($_POST['sb_ct_id']) && $_POST['sb_ct_id']!="" && isset($_POST['sb_link']) && $_POST['sb_link']!=""){ 			
			if(isset($_FILES) && $_FILES["sb_imagename"]["name"]!=""){				
				$target_dir 	= './asset/img/banners/';
				$temp 			= explode(".", $_FILES["sb_imagename"]["name"]);
				$newfilename 	= date('Ymd_His') . '.' . end($temp);
				$target_file 	= $target_dir . $newfilename;
				copy( $_FILES["sb_imagename"]["tmp_name"],$target_file);			
				$bannerImgName = $newfilename;
			}else{
				$bannerImgName = $_POST['hid_image'];
			}			
			$data = $this->Admin_model->updateBaner($this->input->post(),$bannerImgName);
			echo json_encode(array('status'=>TRUE,'output'=>'success'));	
		}else{
			$uid = $this->uri->segment('3');
			$data = array();
			$data['companyDetails'] = $this->Admin_model->getcompany();
			$data['banerdeatils'] = $this->Admin_model->getBannerInfo($uid);
			$this->show_admin('admin/edit-banner',$data);
		}		
	}
	public function banerActions1()
	{
		if($this->session->userdata('user_id') == "" && $this->session->userdata('usertype') != 1){		
			redirect('admin', 'refresh');
		}else{
			$data = $this->Admin_model->baner_actions($this->input->post());
		}
	}
	
}