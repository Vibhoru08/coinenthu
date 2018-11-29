<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">Change Password</li>
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
								<h3 class="box-title">Change Password</h3>
							</div>
							<div class="box-body">								
								<div class="col-md-12">
									<form id="uChangePwd" name="uChangePwd" method="POST" class="form-horizontal" 
										data-fv-message="This value is not valid"
										data-fv-icon-valid="glyphicon glyphicon-ok"
										data-fv-icon-invalid="glyphicon glyphicon-remove"
										data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="changePassword()">
										<div class="box-body">													
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 control-label">Current Password</label>
												<div class="col-sm-4">
													<input type="password" class="form-control" id="o_u_password" name="o_u_password" placeholder="Current Password" value=""
													required data-fv-notempty-message="Please enter a current password">
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
												<div class="col-sm-4">
													<input type="password" class="form-control" id="n_u_password" name="n_u_password" placeholder="New Password" value=""
													required data-fv-notempty-message="Please enter a new password">
												</div>
												<span id="ErrorM" style="font-size:14px;color:#a94442;"><?php if(isset($this->ErrorM) && $this->ErrorM!=""){ echo $this->ErrorM; }?></span>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
												<div class="col-sm-4">
													<input type="password" class="form-control" id="u_password" name="u_password" placeholder="Confirm Password" value=""
													required data-fv-notempty-message="Please enter a confirm password">
												</div>
											</div>
											<input type="hidden" id="u_id" name="u_id" value="">
										</div><!-- /.box-body -->
										<div class="box-footer">
										<a href="<?php echo base_url();?>" class="btn btn-default">Cancel
										</a>
											<button type="submit"  id="changePwdTbtn"  name="changePwdTbtn" class="btn btn-info pull-right">Change Password</button>
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
