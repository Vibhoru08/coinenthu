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
		<link rel="stylesheet" href="<?php echo base_url();?>asset/css/at-formValidation.css">

		<script src="<?php echo base_url();?>js/jquery.js"></script>
		<script src="<?php echo base_url();?>js/main.js"></script>
		<script src="<?php echo base_url();?>js/at-formValidation.js"></script>
		<script src="<?php echo base_url();?>js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>js/app.js"></script>
		<script>var baseUrl = '<?php echo base_url(); ?>admin'; </script>
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>Coinenthu</b> Admin</a>
			</div>
			<div class="login-box-body">
				<form id="adminLogin" name="adminLogin" method="POST" data-fv-message="This value is not valid"
				  data-fv-icon-valid="glyphicon glyphicon-ok"
				  data-fv-icon-invalid="glyphicon glyphicon-remove"
				  data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="loginBtnV('adminLogin');">
					<div class="form-group has-feedback">
						<input type="text" class="form-control" name="u_email" id="u_email" placeholder="Email" required
						data-fv-notempty-message="The email is required" data-fv-regexp="true" data-fv-regexp-regexp="^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"  data-fv-regexp-message="The input is not a valid email address"/>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="u_password" id="u_password" placeholder="Password" required data-fv-notempty-message="The password is required"/>
					</div>
					<div class="row">
						<div class="col-xs-8">
						<span id="loadingError" style="display:none;"> Loading...</span>
						<span id="loginstatus"></span>
						</div>
						<div class="col-xs-4">
							<button type="submit" id="aLoginBtn"  name="aLoginBtn" class="btn btn-primary btn-block btn-flat">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		$("#u_email").val('');
		$("#u_password").val('');
		$('#adminLogin').formValidation();
	});
	function loginBtnV(jForm){
		$("#adminLogin").formValidation().on('success.form.fv', function(e) {
			e.stopImmediatePropagation();
			$("#loginstatus").html('');
			var u_email    = $("#u_email").val();
			var u_password = $("#u_password").val();
			$("#loadingError").show();
			$.ajax({
				type		:	'POST',
				url			:  	baseUrl+'/admin-login',
				dataType	: 	"json",
				data		:	{u_email:u_email,u_password:u_password},
				success: function(data){
					$("#loadingError").hide();
					if(data.output=="success"){
						$("#loginstatus").html('Login successful').css("color","green");
						window.location = baseUrl+"/digital-assets";
					}else{
						$("#loginstatus").html('Please enter valid Email and Password.').css("color","red");
					}
				}
			});
			e.preventDefault();
		});
	}
</script>
