<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">Contact Us</li>
					</ol>
			</section>
		</div>
	</div>
        <div class="container">
			<section class="content mar_b20">
			<div class="row">
					<div class="col-md-12">
						<div class="box mar_b50  mar_t20 box_shadow overflow_hidden">
							<div class="box-header with-border header_bg">
								<h3 class="box-title">Add Email</h3>
							</div>
							<div class="box-body">								
								<div class="col-md-12">
									<form class="form-horizontal" action="" method="POST" name="add_email" id="add_email" enctype="multipart/form-data" data-fv-message="This value is not valid"
									data-fv-icon-valid="glyphicon"
									data-fv-icon-invalid="glyphicon"
									data-fv-icon-validating="glyphicon glyphicon-refresh" >
									  <div class="box-body mandatory_color">				  
									  <div class="col-md-7">                   
										<div class="form-group">
										  <label for="email" class="col-sm-3 control-label">Email <sup>*</sup></label>
										  <div class="col-sm-8">
											<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required data-fv-notempty-message="The email is required and cannot be empty" 
											data-fv-emailaddress="true"
										   data-fv-emailaddress-message="The input is not a valid email address" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The email address must be less than 100 characters" data-fv-regexp="true" data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The email can consist of alphanumarical characters">				  
											<p id="email_error" name="fname_error"></p>
										  </div>
										</div>                   
									  <div class="clearfix"></div>
									  <div class="box-footer">
										<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
										<span id="successMsg"></span>
										<button type="submit" class="btn btn-info pull-right" onClick="addEmail();">Add Email</button>
										<a href="<?php echo base_url();?>admin/subscribe"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
									  </div>
									</form>	
								</div>
							</div>
						</div>
					</div>
			</div>
			</section>
		</div>
			
</div>
<script> 
	$( "#email" ).change(function() {
		$('#email_error').html('');
	});
</script>   
