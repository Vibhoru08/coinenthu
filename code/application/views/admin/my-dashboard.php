<div class="content-wrapper">
	<section class="content">
		<div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  My Profile
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo $baseUrl?>user-management" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                
                <form class="form-horizontal" method="POST" name="updateprofile" id="updateprofile" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="updateAdminProfile();">
                  <div class="box-body mandatory_color">
				  	  <div class="col-md-9">				  
                    <div class="form-group">
                      <label for="firstname" class="col-sm-3 control-label">First Name <sup>*</sup></label>
                      <div class="col-sm-8">
					  <?php
					  if($userdetails->u_firstname != "" )
					  {
						  $fname = $userdetails->u_firstname;
					  }else{
						   $fname = '';
					  }
					  ?>
                        <input type="text" class="form-control" id="u_firstname" name="u_firstname" placeholder="Fist Name" required data-fv-notempty-message="The firstname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The first name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The first name must be less than 100 characters" value="<?php echo $fname;?>">
						<p id="fname_error" name="fname_error"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lastname" class="col-sm-3 control-label">Last Name <sup>*</sup></label>
                      <div class="col-sm-8">
					  <?php
					  if($userdetails->u_lastname!= "" )
					  {
						  $lname = $userdetails->u_lastname;
					  }else{
						   $lname = '';
					  }
					  ?>
                        <input type="text" class="form-control" id="u_lastname" name="u_lastname" placeholder="Last Name" required data-fv-notempty-message="The lastname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The last name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The last name must be less than 100 characters" value="<?php echo $lname; ?>">
						<p id="lname_error" name="lname_error"></p>
                      </div>
                    </div>
                   
					<div class="form-group">
                      <label for="emailaddress" class="col-sm-3 control-label">Email<sup>*</sup></label>
                      <div class="col-sm-8">
						<?php
						  if($userdetails->u_email != "" )
						  {
							  $email = $userdetails->u_email;
						  }else{
							   $email = '';
						  }
						?>
						<input value="<?php echo $email; ?>" type="text" readonly class="form-control" id="u_email" name="u_email" placeholder="Email Address" required data-fv-notempty-message="The email is required and cannot be empty">
                      </div>
                    </div>	
					<?php
					  if($userdetails->u_mobile != "" )
					  {
						  $php_u_mobile = $userdetails->u_mobile;
					  }else{
						   $php_u_mobile = '';
					  }
					  ?>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Mobile Number</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="u_mobile" name="u_mobile" value="<?php echo $php_u_mobile; ?>" placeholder="Mobile Number">
							<p id="mobile_error" name="mobile_error"></p>
						</div>
                    </div>
					
                    </div>					
					</div>
                  </div>
				  <input type="hidden" id="userhidImage" name="userhidImage" value="<?php echo $userdetails->u_picture; ?>">
				  <input type="hidden" id="userhidId" name="userhidId" value="<?php echo $userdetails->u_uid; ?>">
				  <div class="clearfix"></div>
                  <div class="box-footer">
				  	<span id="loadingError"></span>
				  	<span id="loadingStatus"></span>

                    <button type="submit" class="btn btn-info pull-right">Update</button>
					<a href="<?php echo $baseUrl?>user-management"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
                  </div>
                </form>
				<!-- Form End -->
            </div>
            </div>
            </div>
		 </section>
	</div>
<script>
	$(document).ready(function() {
		$('#updateprofile').formValidation();
	});
</script>