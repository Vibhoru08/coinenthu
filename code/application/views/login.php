<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">Login/Register </li>
					</ol>
			</section>
		</div>
	</div>
	<div class="container">
			<section class="content mar_b20">
				<div class="row">
					<div class="col-md-2">&nbsp;</div>
						<div class="col-md-8">
							<div class="box mar_b50 mar_t50 box_shadow overflow_hidden">
								<div class="box-header with-border header_bg">
									<h3 class="box-title">Login/Register</h3>
								</div>
								<div class="box-body">
									<div class="row mar_t10">
									  <div class="col-md-6">
										  <div class="well no-marginv well_bg_none">
											  <form id="loginForm" name="loginForm" method="POST"data-fv-message="This value is not valid"
											  data-fv-icon-valid="glyphicon"
											  data-fv-icon-invalid="glyphicon"
											  data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="userLogin();">
												  <div class="form-group">
													  <label for="username" class="control-label">Email ID</label>
													  <input class="form-control" name="u_email" id="u_email" placeholder="Email" required
													  data-fv-notempty-message="The email is required"
													data-fv-regexp="true" data-fv-regexp-regexp="^[_a-zA-Z0-9]+(\.[_a-zA-Z0-9]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-z]{2,4})$"  data-fv-regexp-message="The input is not a valid email address">
													  <span class="help-block"></span>
												  </div>
												  <div class="form-group">
													  <label for="password" class="control-label">Password</label>
													  <input type="password" class="form-control" name="u_password" id="u_password" placeholder="Password" required data-fv-notempty-message="The password is required"/>
													  <span class="help-block"></span>
												  </div>
												  <div id="loginErrorMsg" class="" style="color:red;display:none;">Wrong username or password</div>
												  <div id="loading" class="hide">Loading..</div>
												  <div class="checkbox">
													  <label>
														  <input name="remember" id="remember" type="checkbox"> Remember Login
													  </label>   &nbsp;&nbsp;&nbsp;| &nbsp;
													   <a style="color:#424242" href="<?php echo base_url();?>forgot-password"> Forgot Password</a>
													  <p class="help-block"></p>
												  </div>

												  <input type="submit" class="btn btn-danger btn-block" style="margin-top:54px;" id="logBtn" value="Login" name="logBtn">
											  </form>
										  </div>
									  </div>
									  <div class="col-md-6 mbrgt pos_r" style="border-left:1px solid #ddd;">
										<div class="well no-margin well_bg_none">
											<div class="ligin_pos_ab"><span>OR</span></div>
											  <form id="regForm" name="regForm" method="POST" data-fv-message="This value is not valid"
											  data-fv-icon-valid="glyphicon"
											  data-fv-icon-invalid="glyphicon"
											  data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="userRegister();">
												  <div class="form-group">
													  <label for="username" class="control-label">Username</label>
													  <input class="form-control" id="username" name="username" value="" title="Please enter your username" placeholder="Username" type="text" required data-fv-notempty-message="The username is required">
													  <span class="help-block"></span>
												  </div>
												  <div class="form-group">
													  <label for="email" class="control-label">Email ID</label>
													  <input class="form-control" id="uemail" name="uemail" value="" placeholder="Email ID" title="Please enter your Email ID" type="text" placeholder="Email" required
													  data-fv-notempty-message="The email is required" data-fv-regexp="true" data-fv-regexp-regexp="^[_a-zA-Z0-9]+(\.[_a-zA-Z0-9]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-z]{2,4})$" data-fv-regexp-message="The input is not a valid email address">
													  <span class="help-block"></span>
												  </div>
												  <?php
													$redirect = 0;
												if($this->session->userdata('redirect_page')==1){
													$redirect = 1;
												}else if($this->session->userdata('redirect_page')==2){
													$redirect = 2;
												}else{
													$redirect = 0;
												}
												  ?>
												  <input type="hidden" id="redirectPage" value="<?php echo $redirect; ?>">
												  <div class="form-group">
													  <label for="password" class="control-label">Password</label>
													  <input class="form-control" id="upassword" name="upassword" value="" title="Please enter your password" type="password" placeholder="Password" required data-fv-notempty-message="The password is required">
													  <span class="help-block"></span>
												  </div>
												  <span id="loadingmine" class="hide">Loading...</span>
												  <span style="color:red" id="emailverified" class="hide">Email already exists. </span>
												  <span style="color:red" id="usernameverified" class="hide">Username already exists. </span>
												  <button type="submit" class="btn btn-primary btn-block">Register</button>
											  </form>
										  </div>
									  </div>
									  <div class="clearfix"></div>

								  </div>
								</div>
							</div>
						</div>
					<div class="col-md-2">&nbsp;</div>
				</div>
			</section>
		</div>
        </div>
    </div>
<style>
input:required:invalid {
    outline: none;
}
</style>
<script>
/* $( function()
{
$('form input[name=u_email]').blur();
 $('#logBtn').addAttr('disabled','');
$("form").validate().settings.ignore = "*";
});	 */
</script>
