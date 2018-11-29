	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Add Student
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>usermanagement" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>

                <!-- form start -->
                <form class="form-horizontal" action="" method="POST" name="add_user" id="add_user" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" >
                  <div class="box-body mandatory_color">

				  <div class="col-md-9">

                    <div class="form-group">
                      <label for="firstname" class="col-sm-3 control-label">First Name <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Fist Name" required data-fv-notempty-message="The firstname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The first name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The first name must be less than 100 characters">
						<p id="fname_error" name="fname_error"></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lastname" class="col-sm-3 control-label">Last Name <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required data-fv-notempty-message="The lastname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The last name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The last name must be less than 100 characters">
						<p id="lname_error" name="lname_error"></p>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="emailaddress" class="col-sm-3 control-label">User Name<sup>* </sup></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="email_address" name="email_address" placeholder="User Name" required data-fv-notempty-message="The email is required and cannot be empty"
						data-fv-emailaddress="true"
					   data-fv-emailaddress-message="The input is not a valid email address" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The email address must be less than 100 characters" data-fv-regexp="true" data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The email can consist of alphanumarical characters">
					   <p id="email_error" name="email_error"></p>
                      </div>
                    </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Mobile Number</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile Number">
							<p id="mobile_error" name="mobile_error"></p>
						</div>
                    </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"> Project Name </label>
						<div class="col-sm-8">
							<select id="projid" class="form-control" name="projid">
								<option value="">Select a Project Name</option>
								<?php if(count($categories>0)){ foreach($categories as $proj){?>
									<option value="<?php echo $proj->php_cat_id; ?>"><?php echo ucfirst($proj->php_cat_name); ?></option>
								<?php } } ?>
							</select>
							<p id="projname_error" name="projname_error"></p>
						</div>
                    </div>

					<div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Password <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="u_password" name="u_password" placeholder="Password" required
						data-fv-notempty-message="The password is required and cannot be empty"
						data-fv-regexp="true"
						data-fv-regexp-regexp="^(?=.*[A-Z])(?=.*\d)(?=.{8,}).+$"
						data-fv-regexp-message="Password must be a minimum of 8 characters, and contain at least one uppercase letter and one number.">
						<p id="Password_error" name="Password_error"></p>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="confirmpassword" class="col-sm-3 control-label">Confirm Password <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required
						data-fv-notempty-message="The confirm password is required and cannot be empty"
						data-fv-identical="true"
						data-fv-identical-field="password"
						data-fv-identical-message="The password and its confirm are not the same"
						data-fv-regexp="true"
						data-fv-regexp-regexp="^(?=.*[A-Z])(?=.*\d)(?=.{8,}).+$"
						data-fv-regexp-message="Password must be a minimum of 8 characters, and contain at least one uppercase letter and one number.">
						<p id="confirm_error" name="confirm_error"></p>
                      </div>
                    </div>

					</div>
                  </div>

				  <input type="hidden" id="userhidImage" name="userhidImage">
				  <div class="clearfix"></div>
                  <div class="box-footer">
                    <button type="button" class="btn btn-info pull-right" onClick="addUser();">Add Student</button>
					<a href="<?php echo base_url(); ?>usermanagement"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
                  </div>
                </form>
				<!-- Form End -->
            </div>
            </div>
            </div>
		 </section>
	</div>

<!-- Crop User Profile Image -->
<div class="modal fade" id="crop_user_profile_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Upload Profile Image</h3>
				<span style="float: right; margin-top: -33px;" ><button type="button" class="btn btn-info" onclick="selectCropImage();">Upload Image</button></span>
			</div>
			<div class="modal-body">
				<div id="cropSrcImgContainer" style="min-height:300px;margin-top:30px;" class="img-responsive">
					<img alt="" src="" id="cropbox" />
				</div>
				<div class="jc_coords">
					<form id="CropForm" method="post" >
						<input type="hidden" id="x" name="x" />
						<input type="hidden" id="y" name="y" />
						<input type="hidden" id="w" name="w" />
						<input type="hidden" id="h" name="h" />
					</form>
				</div>
				<div class="modal-footer">
					<span id="loadCrop"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-info export" onclick="checkCoords();" style="display:none">Crop</button>
				</div>
				<input type="file" id="fileCropInp" name="fileCropInp" style="display:none;"  />
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="hidCropType">
<input type="hidden" id="hid_imageName">
	<?php // include('footer.php')?>

<script>

	var _URL = window.URL || window.webkitURL;
	function showCropPopup(cropType){
		$("#l_i_c").hide();
		$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" class="img-responsive"/>');
		$('.export').hide();
		$('#fileCropInp').val("");
		$('#upload_image_blank').show();
		$('#crop_user_profile_image').modal('show');
		$('#hidCropType').val(cropType);
	}
	function selectCropImage(){
		$('#fileCropInp').click();
	}
	$('#fileCropInp').change(function(click){
		 showCropButton(this);
	});
	function showCropButton(input){
		var imageOrNot = input.files[0].name.split('.');
		var extentionName = imageOrNot[1].toLowerCase();
		if(extentionName == "jpeg" || extentionName == "jpg" || extentionName == "jpe" || extentionName == "gif" || extentionName == "png")
		{
			var crop_width=0;
			var crop_height=0;
			var file, img;
			if ((file = input.files[0])) {
				img = new Image();
				img.src = _URL.createObjectURL(file);
				img.onload = function() {
					$('#upload_image_blank').hide();
					crop_width=this.width;
					crop_height=this.height;
					// $('.export').show();
					var cropTypeValue = $('#hidCropType').val();
					if(cropTypeValue == 1)
					{
						$('.export').show();
						cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					}else{

						$('.export').show();
						cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					}
					// cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					 //if(this.height <= '200' && this.width >= '400' ){
						// $('.export').show();
						// cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					// }else{
						 /* $('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" />');
						 $('.export').hide();
						 $('#fileCropInp').val("");
						 alert("Please upload image size is less than 400x200");
					 } */
				};
			}
		}else{
			alert("Please upload images only");
		}
	}
var jcropminLoaded = 0;
function cropImagePredefinedBothQ(width,height,src){
	$('#upload_image_loader').show();
	if( !parseInt(jcropminLoaded) ){
		uploadCropImage('fileCropInp',width,height,src);
	}else{
		$('#cropbox').remove();
		var cropBoxImg = $('<img alt = "" src="" id="cropbox" class="img-responsive" />');
		$('#cropSrcImgContainer').empty().append(cropBoxImg);
		uploadCropImage('fileCropInp',width,height,src);
	}
}
	var jcropminLoaded = 0;
	function displayCrop(width,height,src){
	var cropTypeValue = $('#hidCropType').val();
	if( !parseInt(jcropminLoaded) ){
		//$('#cropbox').attr('src', src);
		$.getScript( baseUrl+"js/xds-Jcrop.min.js" ).done(function( script, textStatus ){
			$('#upload_image_loader').hide();
			jcropminLoaded = 1;
			jQuery(function(){
				if(cropTypeValue == 1){
					jQuery('#cropbox').Jcrop({
						aspectRatio: 1,
						//allowResize: false,
						setSelect: [0,160 ,160,0],
						//allowSelect : false,
						onSelect: updateCoords,
						rotate : 90
					});
				}else{
					jQuery('#cropbox').Jcrop({
						//aspectRatio: 1,
						//allowResize: false,
						setSelect: [0,160 ,160,0],
						//allowSelect : false,
						onSelect: updateCoords,
						rotate : 90
					});
				}
			});
		});
	}else{
		$('#upload_image_loader').hide();
		jQuery(function(){
			if(cropTypeValue == 1){
				jQuery('#cropbox').Jcrop({
					aspectRatio: 1,
					//allowResize: false,
					setSelect: [0,160 ,160,0],
					//allowSelect : false,
					onSelect: updateCoords,
					rotate : 90
				});
			}else{
				jQuery('#cropbox').Jcrop({
					//aspectRatio: 1,
					//allowResize: false,
					setSelect: [0,160 ,160,0],
					//allowSelect : false,
					onSelect: updateCoords,
					rotate : 90
				});
			}
		});
	}
}
 function updateCoords(c){
		var ratioW = $('#cropbox')[0].naturalWidth / $('#cropbox').width();
		var ratioH = $('#cropbox')[0].naturalHeight / $('#cropbox').height();
		var currentRatio = Math.min(ratioW, ratioH);
        jQuery('#x').val(Math.round(c.x * currentRatio));
        jQuery('#y').val(Math.round(c.y * currentRatio));
        jQuery('#w').val(Math.round(c.w * currentRatio));
        jQuery('#h').val(Math.round(c.h * currentRatio));
	}
function checkCoords(){
	if( parseInt(jQuery('#w').val()) > 0 ){
		$("#l_i_c").show();
		var x=jQuery('#x').val();
		var y=jQuery('#y').val();
		var w=jQuery('#w').val();
		var h=jQuery('#h').val();
		var cropTypeValue 	= $('#hidCropType').val();
		if(cropTypeValue == 1){
			var existinImageId 	= $('#imageId').val();
		}else{
			var existinImageId 	= $('#hidImage').val();
		}
		var u_id 			= $('#hid_u_id').val();
		var catImageBasicUploadUrl = adminBaseUrl+'/user/upload_profile_image';
		//var file_data = $('#fileCropInp').prop('files')[0];
		var hid_imageName = $('#hid_imageName').val();
		var form_data = new FormData();
		form_data.append('imageName', hid_imageName);
		form_data.append('croppedX', x);
		form_data.append('croppedY', y);
		form_data.append('croppedNewWidth', w);
		form_data.append('croppedNewHeight', h);
		form_data.append('imageId',existinImageId);
		form_data.append('u_id',u_id);
		form_data.append('cropTypeValue',cropTypeValue);
		$('#loadCrop').show();
		$.ajax({
			url: catImageBasicUploadUrl,
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			dataType:'json',
			success: function(data){
				if(data.output == 1){
					var date = new Date();
					var timestamp = date.getTime();
					var newCatImageFullPath = baseUrl+'asset/admin/img/users/'+data.imageName+'?t='+timestamp;
					if(cropTypeValue == 1){
						$("#l_i_c").hide();
						$('#image').attr('src', newCatImageFullPath);
						$('#imageId').val(data.imageName);
						$('#loadCrop').hide();
						$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" class="img-responsive" />');
						$('.export').hide();
						$('#fileCropInp').val("");
						$('#crop_user_profile_image').modal('hide');
						$('#front-end-profile-image').attr('src', newCatImageFullPath);
					}else{
						$("#l_i_c").hide();
						$('#uploadedProfileLogo').attr('src', newCatImageFullPath);
						$('#hidImage').val(data.imageName);
						$('#loadCrop').hide();
						$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" class="img-responsive" />');
						$('.export').hide();
						$('#fileCropInp').val("");
						$('#crop_user_profile_image').modal('hide');
						//$('#front-end-profile-image').attr('src', newCatImageFullPath);
					}
				}else{
					$('#crop_image_validation_message').html('The given extention is not allowed.');
					$('$crop_image_validation').show();
				}
			}
		});
	}else{
		alert('Please select a crop region then press submit.');
	}
}

	/*function checkCoords(){
		if( parseInt(jQuery('#w').val()) > 0 ){
			$("#l_i_c").show();
			var x=jQuery('#x').val();
			var y=jQuery('#y').val();
			var w=jQuery('#w').val();
			var h=jQuery('#h').val();
			var cropTypeValue 	= $('#hidCropType').val();
			var existinImageId = $('#imageId').val();
			var u_id = $('#hid_u_id').val();
			var u_ut_id = $('#hid_u_admin').val();
			var quote_id = $('#quote_id').val();
			var add_quote_hid = $('#add_quote_hid').val();
			var catImageBasicUploadUrl = adminBaseUrl+'/user/upload_profile_image';
			var file_data = $('#fileCropInp').prop('files')[0];
			var form_data = new FormData();
			form_data.append('fileCropInp', file_data);
			form_data.append('croppedX', x);
			form_data.append('croppedY', y);
			form_data.append('croppedNewWidth', w);
			form_data.append('croppedNewHeight', h);
			form_data.append('imageId',existinImageId);
			form_data.append('u_id',u_id);
			form_data.append('quote_id',quote_id);
			form_data.append('add_quote_hid',add_quote_hid);
			form_data.append('u_admin',u_ut_id);
			$('#loadCrop').show();
			$.ajax({
				url: catImageBasicUploadUrl,
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				dataType:'json',
				success: function(data){
					console.log(data.imageName);
					var newCatImageFullPath = baseUrl+'asset/admin/img/users/'+data.imageName;
					$("#l_i_c").hide();
					$('#uploadedProfileImage').attr('src', newCatImageFullPath);
					$('#imageId').val(data.imageName);
					$('#loadCrop').hide();
					$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" />');
					$('.export').hide();
					$('#fileCropInp').val("");
					$('#crop_user_profile_image').modal('hide');
					/* if(u_ut_id == 4){ */
						/* $('#back-end-profile-image').attr('src', newCatImageFullPath);
						$('#qc_image').val( data.imageName ); */
					/* } */
				/* }
			});
		}else{
			alert('Please select a crop region then press submit.');
		}
	} */
	function uploadCropImage(fieldID,width,height,src){
	var _URL = window.URL || window.webkitURL;
	var image;
	var fd = new FormData();
	switch($('#'+fieldID).val().substring($('#'+fieldID).val().lastIndexOf('.') + 1).toLowerCase()){
		case 'png': case 'jpg': case 'jpeg': case 'jpe': case 'gif':
		image = new Image();
		image.src = _URL.createObjectURL($('#'+fieldID)[0].files[0]);
		image.onload = function() {
			fd.append( fieldID, $('#'+fieldID)[0].files[0]);
			$.ajax({
				url: adminBaseUrl+'/user/upload_crop_image',
				data: fd,
				processData: false,
				contentType: false,
				type: 'POST',
				dataType:'json',
				cache:	false,
				success: function(returned){
					// alert(returned.imageName);
					$('#cropbox').attr('src', baseUrl+'asset/admin/img/users/'+returned.imageName);
					//$('#image').attr('src', baseUrl+'asset/admin/img/users/'+returned.imageName);
					$('#hid_imageName').val(returned.imageName);
					$('#userhidImage').val(returned.imageName);
					displayCrop(width,height,src);
				}
			});
		}
		break;
		default:
		$('#'+fieldID).val('');
		alert('Please upload JPG, JPEG or PNG formats');
		break;
	}
}
	//Multiple select box
/* (function($) {
    $(function() {
        $('.test').fSelect();
    });
})(jQuery); */
	$( "#fname" ).change(function() {
	  $('#fname_error').html('');
	});
	$( "#lname" ).change(function() {
	  $('#lname_error').html('');
	});
	$( "#business_title" ).change(function() {
	  $('#business_error').html('');
	});
	$( "#email_address" ).change(function() {
	  $('#email_error').html('');
	});
	$( "#u_password" ).change(function() {
	  $('#Password_error').html('');
	});
	$( "#confirm_password" ).change(function() {
	  $('#confirm_error').html('');
	});
</script>
