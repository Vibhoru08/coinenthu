<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Change Password</h1>
		<ol class="breadcrumb">
			<?php if(isset($_SESSION['admin']['usertype']) && $_SESSION['admin']['usertype']!=1){?>
					 <li><a href="<?php echo $baseUrl?>user-management"><i class="fa fa-dashboard"></i> Home</a></li>

			<?php }else{ ?>
					 <li><a href="<?php echo $baseUrl?>user-management"><i class="fa fa-dashboard"></i> Home</a></li>

			<?php } ?>
			<li class="active">Change Password</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<!-- form start -->
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
						<a href="<?php echo $this->baseUrl;?>user-management" class="btn btn-default">Cancel
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
	</section>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#uChangePwd').formValidation();
	});
</script>