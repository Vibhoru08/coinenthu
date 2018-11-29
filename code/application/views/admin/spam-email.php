<div class="content-wrapper">
	<section class="content">
		<div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Email Setting
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo $baseUrl?>user-management" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                
                <form class="form-horizontal" method="POST" name="spamemail" id="spamemail" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="saveSpamEmail();">
					  <div class="box-body mandatory_color">
						  <div class="col-md-9">                   
								<div class="form-group">
								  <label for="emailaddress" class="col-sm-3 control-label">Copy Email<sup>*</sup></label>
								  <div class="col-sm-8">
									<?php 
										if(isset($emailConfig->se_id) && $emailConfig->se_id!=""){
											$se_email = $emailConfig->se_email;
										}else{
											$se_email = $emailConfig->se_email;
										}
									?>
									<input value="<?php echo $se_email; ?>" type="text" class="form-control" id="u_email" name="u_email" placeholder="Email Address" required data-fv-notempty-message="The email is required and cannot be empty">
								  </div>
								</div>			
							</div>					
						</div>
						
				  <div class="clearfix"></div>
                  <div class="box-footer">
				  	<span id="loadingError"></span>
				  	<span id="loadingStatus"></span>

                    <button type="submit" class="btn btn-info pull-right">Save</button>
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
		$('#spamemail').formValidation();
	});
</script>