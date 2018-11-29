	<?php 
	//print_r($subscriberdeatils);exit;
	//include('header.php')?>
	
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Update Email
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/subscribe" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="edit_email" id="edit_email" enctype="multipart/form-data" data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" >
                  <div class="box-body mandatory_color">								  
				  <div class="col-md-7"> 
					
							<div class="form-group">
								<?php 
									if(isset($subscriberdeatils->bop_sub_email) && $subscriberdeatils->bop_sub_email!=""){
										$bop_sub_email = $subscriberdeatils->bop_sub_email;
									}else{
										$bop_sub_email = '';
									}
								?>	
                <label for="email" class="col-sm-3 control-label">Email <sup>*</sup></label>
                <div class="col-sm-8">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required data-fv-notempty-message="The email is required and cannot be empty" 
								data-fv-emailaddress="true"
								data-fv-emailaddress-message="The input is not a valid email address" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The email address must be less than 100 characters" data-fv-regexp="true" data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The email can consist of alphanumarical characters" value="<?php echo $bop_sub_email;?>">				  
								<p id="email_error" name="fname_error"></p>
              </div>
            </div>                   
				  <div class="clearfix"></div>
                  <div class="box-footer">
									<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
									<input type="hidden" id="h_subid" name="h_subid" value="<?php if(isset($subscriberdeatils->bop_sub_id) && $subscriberdeatils->bop_sub_id!=""){ echo $subscriberdeatils->bop_sub_id; }else{ }?>">
									<span id="successMsg"></span>
                  <button type="submit" class="btn btn-info pull-right" onClick="editEmails();">update Email</button>
										<a href="<?php echo base_url();?>admin/subscribe"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
                  </div>
                </form>
				<!-- Form End -->
            </div>
            </div>
            </div>
		 </section>
	</div>

<!-- Crop User Profile Image -->
<script>				
	$( "#email" ).change(function() {
		$('#email_error').html('');
	});
	
</script>
