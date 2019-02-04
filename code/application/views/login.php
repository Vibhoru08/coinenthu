<div class="content-wrapper">
	<!--<div  class="bread_crumb">
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
	</div>-->
	<div class="container-fluid banner_margin linear_color">
		<div class="row mmar_t40 mmar_b10 mar_t30 mar_b40">
			<div class="col-xs-12 text-center banner_head">
				LOGIN/SIGNUP
				<!--<hr style="width:5%;border:2px solid #ffff">-->
				<div class="banner_desc">
				<div></div>
			</div>
			</div>
		</div>
	</div>
	<div class="row mobile_login NoirProSemiBold big_hide text-center">
		<div class="col-xs-12">
			<div class="col-xs-6 pad_t10 pad_b10 text-center mob_login" id="mob_login">
				LOGIN
			</div>
			<div class="col-xs-6 pad_t10 pad_b10 text-center mob_register" id="mob_register">
				SIGNUP
			</div>
		</div>
	</div>
	<div class="container">
			<section class="content mar_b20 mar_t10 mmar_t0">
				<div class="row">
					<div class="col-md-1">&nbsp;</div>
						<div class="col-md-10">
							<div class="box mar_b50 mar_t30 mmar_t10 overflow_hidden">
							<!--<div class="box-header with-border header_bg">
									<h3 class="box-title">Login/Register</h3>
								</div>-->

								<div class="box-body">
									<div class="row mar_t10">
									  <div class="col-md-6 mob_s_login">
											<div class="col-xs-12 col-md-10 well_bg_none"><h3 class="box-title m_hide">Login</h3><hr class="col-xs-1 m_hide" style="width:4%;border-top:8px solid #424242;;margin-top:0;"></div>
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
														  <input name="remember" id="remember" type="checkbox">&nbsp; Remember Login
													  </label>   &nbsp;&nbsp;&nbsp; &nbsp;
													   <a class="forgot_password" href="<?php echo base_url();?>forgot-password"> Forgot Password</a>
													  <p class="help-block"></p>
												  </div>

												  <input type="submit" class="btn btn-custom btn-block" style="margin-top:54px;" id="logBtn" value="Login" name="logBtn">
											  </form>
										  </div>
									  </div>
									  <div class="col-md-6 mbrgt pos_r mob_s_register">
										<div class="col-xs-12 col-md-10 well_bg_none"><h3 class="box-title m_hide">Register</h3><hr class="col-xs-1 m_hide" style="width:4%;border-top:8px solid #424242;;margin-top:0;"></div>
										<div class="well no-margin well_bg_none">
											<!--<div class="ligin_pos_ab"><span>OR</span></div>-->
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
												}else if($this->session->userdata('redirect_page')==3){
													$redirect = 3;
												}else if($this->session->userdata('redirect_page')==4){
													$redirect = 4;
													$redirectname=$this->session->userdata('redirect_page_name');
												}else{
													$redirect = 0;
												}
												  ?>
													<input type="hidden" id="redirectPageName" value="<?php echo $redirectname; ?>">
												  <input type="hidden" id="redirectPage" value="<?php echo $redirect; ?>">
												  <div class="form-group">
													  <label for="password" class="control-label">Password</label>
													  <input class="form-control" id="upassword" name="upassword" value="" title="Please enter your password" type="password" placeholder="Password" required data-fv-notempty-message="The password is required">
													  <span class="help-block"></span>
												  </div>
												  <span id="loadingmine" class="hide">Loading...</span>
												  <span style="color:red" id="emailverified" class="hide">Email already exists. </span>
												  <span style="color:red" id="usernameverified" class="hide">Username already exists. </span>
												  <button type="submit" class="btn btn-custom btn-block">Register</button>
											  </form>
										  </div>
									  </div>
									  <div class="clearfix"></div>
										<div class="col-md-12 text-center mar_t20 socila_img" style="padding-bottom:3px;">
																				 <a  onclick="fbLogin();" href="javascript:void(0)" class="button facebook"><span><i class="fa fa-facebook"></i></span><p>Facebook</p></a>
																				  <a href="javascript:void(0);" id="bopTLogin" class="button twitter"><span><i class="fa fa-twitter"></i></span><p>Twitter</p></a>
																				  <a href="javascript:void(0);" id="gplus" class="button google-plus"><span><i class="fa fa-google-plus"></i></span><p>Google+</p></a>
																			</div>
								  </div>
								</div>
							</div>
						</div>
					<div class="col-md-1">&nbsp;</div>
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
