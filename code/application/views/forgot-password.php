<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">Forgot Password</li>
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
								<h3 class="box-title">Forgot Password</h3>
							</div>
							<div class="box-body">								
								<div class="col-md-12">
									<form id="forgotPwdd" name="forgotPwdd" method="POST" class="form-horizontal" 
										data-fv-message="This value is not valid"
										data-fv-icon-valid="glyphicon glyphicon-ok"
										data-fv-icon-invalid="glyphicon glyphicon-remove"
										data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="forgotPasswordd()">
										<div class="box-body">													
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
												<div class="col-sm-4">
				<input type="text" class="form-control" id="fg_u_email" name="fg_u_email" placeholder="Email" required data-fv-notempty-message="The email is required"
													data-fv-regexp="true" data-fv-regexp-regexp="^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"  data-fv-regexp-message="The input is not a valid email address">
												</div>
											</div>
											
										</div><!-- /.box-body -->
										<div class="box-footer">
										<a href="<?php echo base_url();?>" class="btn btn-default">Cancel
										</a>
											<button type="submit"  id="forgotPwd"  name="forgotPwd" class="btn btn-info pull-right">submit</button>
											<center><span id="success" style="color:green"></span></center>
											<center><span id="errMesg" style="color:red"></span></center>
											<center><span id="loadingError" style="display:none;"> Loading...</span></center>
										</div><!-- /.box-footer -->						
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>
        </div>
    </div>
