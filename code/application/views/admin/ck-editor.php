	<?php //echo '<pre>';print_r($email_ids);exit;?>

	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Add CKEditor
				  </h1>

				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/sendmail" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="ck_editor" id="ck_editor" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh">
                  <div class="box-body mandatory_color">

				  <div class="col-md-7">

                    <div class="form-group">

                      <label for="emailaddress" class="col-sm-3 control-label">Send Mail <sup>*</sup></label>
                      <div class="col-sm-8">
                        <textarea class="form-control" id="article_desc" name="article_desc" rows="6"><!DOCTYPE html>
							<html>
							  <head>
								<title> Coinenthu - New User </title>&nbsp;

								<meta name="viewport" content="width=device-width, initial-scale=1.0">
							  </head>
							  <body>
								<div style="width:600px; font-family: Arial,sans-serif;font-size: 12px !important;line-height: 1.5;">
									<table  border="0" style="border-collapse: collapse; border:1px solid #E4E4E4;" cellpadding="10">
										<tr bgcolor="#f2f2f2">
											<td width="50%"><a href="<?php echo base_url(); ?>" alt="Coinenthu" target="_blank" style="text-decoration: none;">
												<img src="<?php echo base_url(); ?>asset/forntend/images/logo.png"></a>
											</td>
											<td width="50%" align="right"><a href="http://spreadthequote.com" target="_blank" style="text-decoration: none;">
											</td>
										</tr>
										<tr>

											<td colspan="3">
												<p><a href="javascript:void(0);" style="font:bold 12px arial; color:#333; text-decoration:none;"><strong>Dear</strong>&nbsp;&nbsp;<?php echo $name; ?>,</a></p>
												<center>
													You are registered to Coinenthu. Please click below link to login, your Login details are:<br/>
													Email : ,<br/>
													Please click the link to login <a href="<?php echo base_url(); ?>login" target="_blank"><?php echo base_url().'login'; ?></a><br/><br/>
												</center>
											</td>
										</tr>
										<tr >
											<td colspan="3">
											Regards,<br/>
											Coinenthu Team
											</td>
										</tr>
										<tr style="background-color:#f9f9f9; text-align:center;color:#515965">
											<td colspan="3">
												<a style="text-decoration: none; font-size:11px;" href="<?php echo base_url(); ?>" target="_blank">
												<strong>&copy; 2018 <span style="color:#515965;">Coinenthu</span>.  All Rights Reserved</strong>.
												</a>
											</td>
										</tr>
									</table>
								</div>
							</body>
							</html>
						</textarea>

						<p id="article_desc_error" ></p>
                      </div>
                    </div>

					</div>
                  </div>
				  <div class="clearfix"></div>
                  <div class="box-footer">
					<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<span id="successMsg"></span>
					<input type="hidden" name="hid_val" id="hid_val" value="<?php echo $email_ids; ?>">
                    <button type="button" class="btn btn-info pull-right" onClick="addtemplate();">Add Template</button>
					<a href="<?php echo base_url();?>admin/sendmail"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
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
		$('#add_user').formValidation();
		CKEDITOR.replace('article_desc', {

		'filebrowserImageBrowseUrl': '<?php echo base_url(); ?>asset/ckeditor/plugins/imageuploader/imgbrowser.php',
		'filebrowserImageUploadUrl': '<?php echo base_url(); ?>asset/ckeditor/plugins/imageuploader/imgupload.php',
		height: '300px',
		contentsCss: [ 'style.css']
  	});
	});
</script>
