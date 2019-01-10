<?php
ini_set('display_errors', '0');
$viewTime = date('Ymd') .'_'. date('His');
$title = 'Coinenthu.com – Community based crypto reviews!';
$desc = 'Coinenthu is a platform that allows anyone from a newbie to an expert to explore existing and upcoming blockchain projects';
$img =  base_url().'images/logo.png';
	// $page=basename($_SERVER['PHP_SELF']);
	$page = $this->uri->segment(1);
	if($page=="home" || $page == ""){
		$home = "active";
	}
	if($page=="about-us" ){
		$about="active";
	}
	if($page=="digital-assets"){
		$assets="active";
	}
	if($page=="ico-tracker"){
		$ico="active";
	}
	if($page=="company-full-view"){
		// echo '<pre>';print_r($CompanyDetails);exit;
		if(count($CompanyDetails) > 0)
		{
			if(isset($CompanyDetails[0]->cm_name) && $CompanyDetails[0]->cm_name != "")
			{
				$title = $CompanyDetails[0]->cm_name;

			}else{
				$title = 'Coinenthu';
			}
			if(isset($CompanyDetails[0]->cm_decript) && $CompanyDetails[0]->cm_decript != "")
			{
				$desc = $CompanyDetails[0]->cm_decript;

			}else{
				$desc = 'Coinenthu is a platform that allows anyone from a newbie to an expert to explore existing and upcoming blockchain projects';
			}
			if(isset($CompanyDetails[0]->cm_picture) && $CompanyDetails[0]->cm_picture != "")
			{
				$img = base_url()."asset/img/companies/".$CompanyDetails[0]->cm_uid."/logos/".$CompanyDetails[0]->cm_picture;

			}else{
				$img = base_url().'images/logo.png';
			}
			if(isset($CompanyDetails[0]->cm_unique_id) && $CompanyDetails[0]->cm_unique_id != "")
			{
				$cm_unique_id = $CompanyDetails[0]->cm_unique_id;
				$shareUrl = base_Url().'company-full-view/'.$cm_unique_id;

			}else{
				$shareUrl = base_url();
			}
		}
	}
	// $page=basename($_SERVER['argv'][0]);
	// if($page=="/" || $page==''){
		// $home="active";
	// }
	// if($page=="digital-assets"){
		// $about="active";
	// }
	// if($page=="ico-tracker"){
		// $ico="active";
	// }
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Coinenthu.com – Community based crypto reviews!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="og:title" content="<?php echo $title; ?>"/>
	<meta property="og:url" content="<?php echo $shareUrl; ?>"/>
	<meta property="og:image" content="<?php echo $img; ?>" />
	<meta property="og:image:width" content="300" />
	<meta property="og:image:height" content="300" />
	<meta property="og:site_name" content="<?php echo $title; ?>"/>
	<meta property="og:description" content="<?php echo $desc; ?>"/>
	<meta property="og:type" content="website"/>

	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>asset/forntend/images/favicon.png"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/at-formValidation.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>asset/forntend/css/bootstrap.css">
    <link rel="stylesheet"  href="<?php echo base_url();?>asset/forntend/css/AdminLTE.css?type='<?php echo time(); ?>'">
	 <link rel="stylesheet" href="<?php echo base_url();?>asset/forntend/css/default.css?type='<?php echo time(); ?>'">
    <link rel="stylesheet"  href="<?php echo base_url();?>asset/forntend/css/_all-skins.css">
	<link rel="stylesheet"  href="<?php echo base_url();?>asset/forntend/css/rangeSlider.css">
	<link rel="stylesheet"  href="<?php echo base_url();?>asset/forntend/css/bscarousel.css">

	<link rel="stylesheet" href="<?php echo base_url();?>asset/forntend/css/star-rating.css">
	<link rel="stylesheet"  href="<?php echo base_url();?>asset/forntend/css/star-rating.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/forntend/css/owl.carousel.min.css">

	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/jcrop.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/jquery.ui.timepicker.css">

	<!--[if IE 11]> <link rel="stylesheet" media="print" title="Print" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /><![endif]-->
<!--[if lte IE 10]> <link rel="stylesheet" media="print" title="Print" type="text/css" href="/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /><![endif]-->
<!--[if !IE]>--><link rel="stylesheet" media="print" title="Print" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /><!--<![endif]-->
	<script src="<?php echo base_url();?>asset/forntend/js/slim-min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.js"></script>
<script type="application/javascript" src="<?php echo base_url();?>js/fastclick.js"></script>
	<script src="<?php echo base_url();?>asset/forntend/js/jquery.cookie.js"></script>
	<script src="<?php echo base_url();?>js/at-formValidation.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>asset/forntend/js/owl.carousel.js"></script>
	<script src="<?php echo base_url();?>asset/forntend/js/jQuery-ui.js"></script>
	<script src="<?php echo base_url();?>asset/forntend/js/app.js"></script>
	<script src="<?php echo base_url();?>asset/forntend/js/rangeSlider.js"></script>
	<script src="<?php echo base_url();?>/js/oauthpopup.js"></script>
    <script src="<?php echo base_url();?>asset/forntend/js/custom.js"></script>
	<script src="<?php echo base_url();?>js/jquery.slimscroll.min.js"></script>
	<!--<script src="<?php // echo base_url();?>js/jquery-scroll-bottom.js"></script>-->

	<script src="<?php echo base_url();?>js/jcrop.min.js"></script>
	<!--<script src="<?php echo base_url();?>js/xds-ui-timepicker.js"></script>-->
	<script src="<?php echo base_url();?>asset/forntend/js/star-ratingss.min.js"></script>
	<script src="<?php echo base_url();?>asset/forntend/js/star-rating.min.js"></script>
    <script src="<?php echo base_url();?>asset/forntend/js/dk-scripts.js?type='<?php echo time(); ?>'"></script>
	<script async src="<?php echo base_url(); ?>js/twitter.js" charset="utf-8"></script>
	<script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js"></script>

<script> var baseUrl      = '<?php echo base_url(); ?>';$(document).ready(function() {
    FastClick.attach(document.body);
});	</script>
  </head>
  <body class="hold-transition skin-blue fixed  layout-top-nav">
    <div class="wrapper">
      <header class="main-header">

	    <nav class="navbar navbar-static-top">
		  <div class="container-fluid pos_r logo_one">
            <div class="navbar-header">
			<a href="javascript:void(0);" onClick="return redirectPage('home');" class="navbar-brand navbar-brand-logo"><img src="<?php echo base_url();?>asset/forntend/images/logo.png"/></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse pull-left mmpull_right" id="navbar-collapse">

				<!--<li class="dropdown mpull_right dropdown_hover" id="change_u">-->
                  <!--<a href="#" class="dropdown-toggle active_bg mobile_pad" data-toggle="dropdown" aria-expanded="true">-->
				   <?php
					$styleWidth1 ="";
					if(isset($_SESSION['profileImg']) && $_SESSION['profileImg']!=""){
						if($_SESSION['profileImg'] != "" )
						{
							$imagePath = base_url().'asset/img/users/'.$_SESSION['profileImg'].'?id='.$viewTime;
						}else{
							$imagePath = base_url().'images/empty_thumb.jpg';
						}
						if(@getimagesize($imagePath)){
							$imagePath = $imagePath;
						}else{

							$imagePath = base_url().'images/empty_thumb.jpg';

						}
						$styleWidth = '';
						$styleWidth1 = 'img_c';
						$title = $_SESSION['uname'];
						$user_bg_ico ='profile_pic';
						$left_dm ='left_m';
					}else if(isset($_SESSION['sprofileImg']) && $_SESSION['sprofileImg']!=""){
						if($_SESSION['sprofileImg'] != "" )
						{
							$imagePath = $_SESSION['sprofileImg'];
						}else{
							$imagePath = base_url().'images/empty_thumb.jpg';
						}
						$styleWidth = 'style="width:35px"';
						$title = $_SESSION['uname'];
						$user_bg_ico ='profile_pic';
						$left_dm ='left_m';
					}else{
						if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
							$styleWidth = 'style="width:35px;"';
							$title = "User";
							$user_bg_ico ='profile_pic';
							$left_dm ='left_m';
							$imagePath = base_url().'images/empty_thumb.jpg';
						}else{
							$styleWidth = 'style="width:15px;"';
							$title = "Guest - User";
							$user_bg_ico ='user_bg_ico';
							$left_dm ='';
							$imagePath = base_url().'asset/forntend/images/user2.png';

						}

					} ?>
				  <!--<span class="<?php/* echo $user_bg_ico; */?>">-->


				  <!--<img src="<?php/* echo $imagePath;*/?>" alt="<?php/* echo $title; */?>" class="user_w <?php/* echo $styleWidth1;*/?>" <?php/* echo $styleWidth;*/ ?>/>
				  </span></a>-->
                  <!--<ul class="dropdown-menu user_dropdown_t user_menu <?php/* echo $left_dm; */?>" role="menu" style="top:80%;">-->
					<?php
						if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
							$urlDigtal = base_url().'add-digital-asset';
							$urlIco    = base_url().'add-ico-tracker';
						}else{
							$urlDigtal = base_url().'login';
							$urlIco    = base_url().'login';
						}
					?>
					<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){?>
					<div class="dropdown mar_t5 float_right mar_r30 p_hover">
					<button type="button" class="dropdown-toggle nav_user" data-toggle="dropdown" style="position:relative;">
						<img src = "<?php echo $imagePath; ?>" class = "img-circle reply-image">&nbsp;&nbsp;<span class="caret_change"><span class="caret"></span></span></button>


					<ul class= "dropdown-menu ul_left_m">

						<li class="signup_box"><a href="<?php echo base_url();?>display-profile">MY PROFILE</a></li>
						<!--<li class="h_hover"><a href="</*?php echo base_url();?*/>my-digital-assets">My ASSETS </a></li>
						<li class="h_hover"><a href="</*?php echo $urlDigtal; ?*/>">ADD AN ASSET </a></li>
						<li class="h_hover"><a href="</*?php echo base_url();?*/>my-ico-trackers">My ICOS </a></li>
						<li class="h_hover"><a href="</*?php echo $urlIco; ?*/>">ADD AN ICO </a></li>-->
					<?php if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=="Normal"){?>
						<li class = "signup_box"><a href="<?php echo base_url();?>change-password">CHANGE PASSWORD</a></li>
					<?php } ?>
						<li class = "signup_box"><a href="javascript:void(0);" onClick="userlogoutmode();">LOGOUT</a></li>
					</ul>
				</div>
					<?php }else{?>
						<ul class="nav navbar-nav navbar-right l_hover">
						<li class = "signup_box"><a href="<?php echo base_url();?>login">Login</a></li>
						<li class = "signup_box" ><a style="border: 2px solid #8e44ad;" href="<?php echo base_url();?>add-digital-asset">Signup</a></li>
					</ul>
					<?php } ?>


							<ul class="nav navbar-nav mar_t0 margin-right">
			  <li class="<?php echo $home;?> h_hover"><a href="javascript:void(0);" onClick="return redirectPage('home');">Home</a></li>
			   <li class="<?php echo $assets;?> h_hover">
					<a href="javascript:void(0);" onClick="return redirectPage('digi');" id="company">Digital Assets</a>
				</li>
                <li class="<?php echo $ico;?> h_hover">
					<a href="javascript:void(0);" onClick="return redirectPage('ico');" id="icotracker">ICO Tracker</a>

				</li>
				<li>
  					<a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#ChangePass">Change Password</a>
				</li>

			  </ul>
				<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){?>
				<ul class= "nav navbar-nav mar_t0 pm_hover">

					<li class="signup_box"><a href="<?php echo base_url();?>display-profile">MY PROFILE</a></li>
					<!--<li class="h_hover"><a href="</*?php echo base_url();?*/>my-digital-assets">My ASSETS </a></li>
					<li class="h_hover"><a href="</*?php echo $urlDigtal; ?*/>">ADD AN ASSET </a></li>
					<li class="h_hover"><a href="</*?php echo base_url();?*/>my-ico-trackers">My ICOS </a></li>
					<li class="h_hover"><a href="</*?php echo $urlIco; ?*/>">ADD AN ICO </a></li>-->
				<?php if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=="Normal"){?>
					<li class = "signup_box"><a href="<?php echo base_url();?>change-password">CHANGE PASSWORD</a></li>
				<?php } ?>
					<li class = "signup_box"><a href="javascript:void(0);" onClick="userlogoutmode();">LOGOUT</a></li>
				</ul>
			</div>
				<?php }else{?>
					<ul class="nav navbar-nav navbar-right lm_hover">
					<li class = "signup_box"><a href="<?php echo base_url();?>login">Login</a></li>
					<li class = "signup_box" ><a style="border: 2px solid #8e44ad;" href="<?php echo base_url();?>add-digital-asset">Signup</a></li>
				</ul>
				<?php } ?>
            </div>
          </nav>
	</header>
