<?php
	$page=$this->uri->segment('2');
	$chpwd="";$mydash="";$tab1="";$spamemail="";
	$addUser="";$tab2="";$umang="";
	$tab3 = "";$cmang = "";$icotrac = "";
	$tab4 = "";$tdigitalc = "";$ticotrac = "";
	$tab5 = "";$creviewreply = "";$creview = ""; $templates="";
	if($page=="change-password"){
		$chpwd = "active";
		$tab1  = "active";
	}else if($page=="my-dashboard"){
		$mydash = "active";
		$tab1   = "active";
	}else if($page=="spam-email"){
		$spamemail = "active";
		$tab1      = "active";
	}else if($page=="add-user"){
		$addUser = "active";
		$tab2    = "active";
	}else if($page=="user-management"){
		$umang = "active";
		$tab2  = "active";
	}else if($page=="edit-user"){
		$umang = "active";
		$tab2  = "active";
	}else if($page=="digital-assets"){
		$digitalc = "active";
		$tab3  = "active";
	}else if($page=="add-digital-asset"){
		$digitalc = "active";
		$tab3  = "active";
	}else if($page=="edit-digital-asset"){
		$digitalc = "active";
		$tab3  = "active";
	}else if($page=="ico-trackers"){
		$icotrac = "active";
		$tab3  = "active";
	}else if($page=="events"){
		$events = "active";
		$tab3  = "active";
	}else if($page=="edit-event"){
		$events = "active";
		$tab3  = "active";
	}else if($page=="add-events"){
		$events = "active";
		$tab3  = "active";
	}else if($page=="edit-ico-tracker"){
		$icotrac = "active";
		$tab3  = "active";
	}else if($page=="add-ico-tracker"){
		$icotrac = "active";
		$tab3  = "active";
	}else if($page=="add-ico-tracker"){
		$icotrac = "active";
		$tab3  = "active";
	}else if($page=="top-digital-assets"){
		$tdigitalc = "active";
		$tab4  = "active";
	}else if($page=="top-ico-trckers"){
		$ticotrac = "active";
		$tab4  = "active";
	}else if($page=="company-reviews"){
		$creview = "active";
		$tab5  = "active";
	}else if($page=="reviews-replies"){
		$creviewreply = "active";
		$tab5  = "active";
	}else if($page=="reviews-reports"){
		$creviewreport = "active";
		$tab6  = "active";
	}else if($page=="reviews-replies-reports"){
		$creviewreplyreport = "active";
		$tab6  = "active";
	}else if($page=="careers" || $page=="add-career" || $page=="edit-career"){
		$careers = "active";
		$tab7  = "active";
	}else if($page=="banners" || $page=="add-banner" || $page=="edit-banner"){
		$banners = "active";
		$tab8  = "active";
	}else if($page=="subscribe" || $page=="add-subscribe" || $page=="edit-subscribe"){
		$subscribe = "active";
		$tab8  = "active";
	}else if($page=="sendmail" || $page == "ckeditor"){
		$sendmail = "active";
		$tab8  = "active";
	}else if($page=="excel-commands" || $page == "import-companies"|| $page == "export-companies"){
		$excelcomm = "active";
		$tab9  = "active";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Coinenthu - Admin</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/default.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/custom.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/dataTables.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/allskins.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/blue.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/jcrop.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/at-formValidation.css">
		<link rel="stylesheet" href="<?php echo base_url();?>/asset/css/fcbkcomplete.css">


		<script src="<?php echo base_url();?>js/jquery.js"></script>
		<script src="<?php echo base_url();?>js/main.js"></script>
		<script src="<?php echo base_url();?>js/jquery.dataTables.js"></script>
		<script src="<?php echo base_url();?>js/dataTables.js"></script>
		<script src="<?php echo base_url();?>js/at-formValidation.js"></script>
		<script src="<?php echo base_url();?>js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>js/app.js"></script>
		<script src="<?php echo base_url();?>js/moment.min.js"></script>
		<script src="<?php echo base_url();?>js/dk-common.js?type='<?php echo time(); ?>'"></script>
		<script src="<?php echo base_url();?>js/datepicker.js"></script>
		<script src="<?php echo base_url();?>js/tooltip.js"></script>
		<script src="<?php echo base_url();?>js/jcrop.min.js"></script>
		<script src="<?php echo base_url();?>/js/fcbkcomplete.js"></script>
		<script src="<?php echo base_url(); ?>asset/ckeditor/ckeditor.js?v=2"></script>
		<script src="<?php echo base_url(); ?>asset/ckeditor/samples/js/sample.js"></script>

		<script> var baseUrl = '<?php echo base_url();?>admin'; </script>
		<script> var mainUrl = '<?php echo base_url();?>'; </script>
	</head>
	<?php if($page!="login.php"){?>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<a href="<?php echo base_url(); ?>admin/user-management" class="logo">
					<span class="logo-mini"><b>Coinenthu</b></span>
					<span class="logo-lg"><b>Coinenthu</b> Admin</span>
				</a>
				<nav class="navbar navbar-static-top" role="navigation">
					<a href="javascript:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li class="dropdown user user-menu">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
									<?php
										if(isset($_SESSION['profileImg']) && $_SESSION['profileImg']!=""){
									?>
										<img src="<?php echo base_url().'asset/img/no_image.png'; ?>" class="user-image" alt="User Image">
									<?php
										}else{									?>
										<img src="<?php echo base_url().'asset/img/no_image.png'; ?>" class="user-image" alt="User Image">
									<?php } ?>
									<?php
										if(isset($_SESSION['uname']) && $_SESSION['uname']!=""){
											$name = $_SESSION['uname'];
										}else{
											$name = 'Admin';
										}
									?>
									<span class="hidden-xs"><?php echo $name; ?></span>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="btn btn-flat log_out" onClick="logout();"><span class="glyphicon glyphicon-off" style="top:3px;"></span> &nbsp;Log Out</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>

			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header" style="font-size:14px;">Main Menu</li>
						<li class="treeview <?php echo $tab1; ?>">
							<a href="javascript:void(0);"><span> Settings & Account</span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $mydash; ?>">
									<a href="<?php echo base_url();?>admin/my-dashboard">
										<i class="fa fa-user"></i> <span>My Profile</span></a>
								</li>
								<li class="<?php echo $chpwd; ?>">
									<a href="<?php echo base_url();?>admin/change-password">
									<i class="fa fa-circle"></i> <span>Change Password</span></a>
								</li>
								<li class="<?php echo $spamemail; ?>">
									<a href="<?php echo base_url();?>admin/spam-email">
									<i class="fa fa-cogs"></i> <span>Email Configuration</span></a>
								</li>
							</ul>
						</li>
						<li class="<?php echo $umang; ?>">
							<a href="<?php echo base_url();?>admin/user-management">
								<span>User Management </span></a>
						</li>
						<!--<li class="treeview <?php echo $tab2; ?>">
							<a href="javascript:void(0);"><span> Users </span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $umang; ?>">
									<a href="<?php echo base_url();?>admin/user-management">
										<i class="fa fa-users"></i> <span>User Management </span></a>
								</li>
								<li class="<?php echo $addUser; ?>">
								  <a href="<?php echo base_url(); ?>admin/add-user">
									<i class="fa fa-user"></i> <span>Add User</span>
								  </a>
								</li>
							</ul>
						</li>-->
						<li class="treeview <?php echo $tab3; ?>">
							<a href="javascript:void(0);"><span> Companies</span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $digitalc; ?>">
									<a href="<?php echo base_url();?>admin/digital-assets">
										<i class="fa fa-user"></i> <span>Digital Assets</span></a>
								</li>
								<li class="<?php echo $icotrac; ?>">
									<a href="<?php echo base_url();?>admin/ico-trackers">
									<i class="fa fa-circle"></i> <span>ICO Trackers</span></a>
								</li>
								<li class="<?php echo $events; ?>">
									<a href="<?php echo base_url();?>admin/events">
									<i class="fa fa-circle"></i> <span>Events</span></a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo $tab4; ?>">
							<a href="javascript:void(0);"><span> Top Companies</span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $tdigitalc; ?>">
									<a href="<?php echo base_url();?>admin/top-digital-assets">
										<i class="fa fa-user"></i> <span>Top Digital Assets</span></a>
								</li>
								<li class="<?php echo $ticotrac; ?>">
									<a href="<?php echo base_url();?>admin/top-ico-trckers">
									<i class="fa fa-circle"></i> <span>Top ICO Trackers</span></a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo $tab5; ?>">
							<a href="javascript:void(0);"><span> Reviews </span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $creview; ?>">
									<a href="<?php echo base_url();?>admin/company-reviews">
										<i class="fa fa-user"></i> <span>Company Reviews</span></a>
								</li>
								<li class="<?php echo $creviewreply; ?>">
									<a href="<?php echo base_url();?>admin/reviews-replies">
									<i class="fa fa-circle"></i> <span>Company Review Replies</span></a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php echo $tab6; ?>">
							<a href="javascript:void(0);"><span> Review Reports </span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $creviewreport; ?>">
									<a href="<?php echo base_url();?>admin/reviews-reports">
										<i class="fa fa-user"></i> <span>Reviews Reports</span></a>
								</li>
								<li class="<?php echo $creviewreplyreport; ?>">
									<a href="<?php echo base_url();?>admin/reviews-replies-reports">
									<i class="fa fa-circle"></i> <span>Replies Reports</span></a>
								</li>
							</ul>
						</li>
						<li class="<?php echo $careers?>">
							<a href="<?php echo base_url();?>admin/careers">
							<i class=""></i> <span>Careers</span></a>
						</li>

						<li class="<?php echo $banners?>">
							<a href="<?php echo base_url();?>admin/banners">
							<i class=""></i> <span>Banners</span></a>
						</li>
						<li class="<?php echo $subscribe?>">
							<a href="<?php echo base_url();?>admin/subscribe">
							<i class=""></i> <span>Subscribe</span></a>
						</li>
						<li class="<?php echo $sendmail?>">
							<a href="<?php echo base_url();?>admin/sendmail">
							<i class=""></i> <span>Send Emails</span></a>
						</li>
						<li class="treeview <?php echo $tab9; ?>">
							<a href="javascript:void(0);"><span>Imports and Exports</span></a>
							<ul class="treeview-menu">
								<li class="<?php echo $tab9; ?>">
									<a href="<?php echo base_url();?>admin/import-companies">
										<i class="fa fa-user"></i> <span>Import</span></a>
								</li>
								<li class="<?php echo $tab9; ?>">
									<a href="<?php echo base_url();?>admin/export-companies">
									<i class="fa fa-circle"></i> <span>Export</span></a>
								</li>
							</ul>
						</li>
					</ul>
				</section>
			</aside>
	<?php } ?>
	<script>
		$(document).ready(function() {
			$("body").tooltip({ selector: '[data-toggle=tooltip]' });
		});
	</script>
