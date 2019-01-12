<div class="content-wrapper">
	<!--<div  class="bread_crumb">
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
	</div>-->
	<div class="container-fluid banner_margin linear_color">
		<div class="row mmar_t40 mmar_b10 mar_t30 mar_b40">
			<div class="col-xs-12 text-center banner_head">
				CONTACT US
				<!--<hr style="width:5%;border:2px solid #ffff">-->
				<div class="banner_desc">
				Contact@coinenthu.com
				<div></div>
			</div>
			</div>
		</div>
	</div>
        <div class="container">
			<section class="content mar_b20">
			<div class="row">
					<div class="col-md-12">
						<div class="box mar_b50  mar_t20 overflow_hidden">
							<!--<div class="box-header with-border header_bg">
								<h3 class="box-title">Contact Us</h3>
							</div>-->
							<div class="box-body">
								<div class="col-xs-10 well_bg_none"><h3 class="box-title">CONNECT WITH US</h3><hr class="col-xs-1" style="width:4%;border-top:8px solid #424242;;margin-top:0;"></div>
								<div class="col-md-12">
									<form id="cont_us_mail" name="cont_us_mail" method="POST" class="form-horizontal"
										data-fv-message="This value is not valid"
										 onSubmit="contactMails();">
										<div class="box-body">
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 col-xs-3 pad_t7 pad_m0 control-label"> Your Email</label>
												<div class="col-sm-7 col-md-6 col-xs-9 pad_m0">
													<input type="text" class="form-control" id="email" name="email" placeholder="abc@gmail.com" required data-fv-notempty-message="Email required" data-fv-regexp="true" data-fv-regexp-regexp="^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"  data-fv-regexp-message="Not A Valid Email">
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 col-xs-3 pad_t7 pad_m0 control-label">Subject</label>
												<div class="col-sm-7 col-md-6 col-xs-9 pad_m0" >
													<input type="text" class="form-control" id="message_sub" name="message_sub" placeholder="Type the Subject" required data-fv-notempty-message="Subject required." data-fv-regexp="true"data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The first name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The first name must be less than 100 characters">
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 col-xs-3 pad_t7 pad_m0 control-label">Type</label>
												<div class="col-sm-7 col-md-6 col-xs-9 pad_m0 ty" placeholder="Select the type from dropdown">
													<select id="type" class="form-control" name="type" required data-fv-notempty-message="Subject type required.">
													<option value="">Select the type from dropdown</option>
													<option value="1">User issue</option>
													<option value="2">Digital Asset Related</option>
													<option value="3">ICO Related</option>
													<option value="4">Suggestions</option>
													<option value="5">Advertise with us</option>
													<option value="6">Other</option>

													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="inputPassword3" class="col-sm-2 col-xs-3 pad_t7 pad_m0 control-label">Body</label>
												<div class="col-sm-7 col-md-6 col-xs-9 pad_m0">
													<textarea rows="5" type="text" class="form-control" id="body" name="body" placeholder="Enter Your Message" required data-fv-notempty-message="Message Body required" ></textarea>
												</div>
											</div>

											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-7 col-md-6 col-xs-9 col-xs-offset-3 pad_m0 text-right">
													<!--<a href="<?php echo base_url();?>" class="btn btn-default">Cancel
													</a>-->
													<button type="submit" id="contactus" name="contactus" class="btn btn-custom">Send</button>
												</div>
											</div>

										</div><!-- /.box-body -->
										<span style="text-align:center;" id="sucess_msg"></span>

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
	$(document).ready(function() {
		$('#cont_us_mail').formValidation();
	});
</script>
