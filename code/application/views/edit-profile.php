<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid banner_margin linear_color">
			<section class="content-header">
			<div class="row mmar_t40 mmar_b10 mar_t30 mar_b40">
					<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 text-center banner_head">
						EDIT PROFILE
						<!--<hr style="width:5%;border:1px solid #ffff">-->

					</div>
				</div>
			</section>
		</div>
		</div>
        <div class="container-fluid">
			<section class="content mar_b20">
			<div class="row">
					<div class="col-md-12">
						<div class="box mar_b50  mar_t0  overflow_hidden">

							<div class="box-body pad_t30">
								<div class="col-md-3 text-center">
									<div class="add_company">
										<?php
										$viewTime = date('Ymd') .'_'. date('His');
									if(isset($userinfo->u_picture) && $userinfo->u_picture!=""){
										$imagepath = base_url().'asset/img/users/'.$userinfo->u_picture.'?id='.$viewTime;
									}else if(isset($userinfo->u_social_pic) && $userinfo->u_social_pic!=""){
										$imagepath = $userinfo->u_social_pic;
									}else{
										$imagepath = base_url().'asset/img/no_image.png';
									}
									?>
										<img style="width:100%;height:100%" id="image" name="image" class="img-responsive" src="<?php echo $imagepath; ?>" />
									</div>
									<div class="pad_t20">
									<!--<a onclick="showCropPopup(1)" href="javascript:void(0);" class="btn btn-default btn_like"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT PIC</a>-->
									<input name="edit_user_file" id="edit_user_file" type="file" accept="image/x-png,image/jpeg" /><br/>
									</div>
								</div>
								<div class="col-md-7">
									<form class="form-horizontal mandatory" id="profile_edit" name="profile_edit" method="POST" data-fv-message="This value is not valid"
											  data-fv-icon-valid="glyphicon"
											  data-fv-icon-invalid="glyphicon"
											  data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="userProfileUpdate();">
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">First Name<span class="mstar"></span></label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="p_u_firstname" name="p_u_firstname" placeholder="First Name" value="<?php echo $userinfo->u_firstname;?>">
										</div>
									  </div>
									  <?php
											if(isset($userinfo->u_picture) && $userinfo->u_picture!=""){
												$imagepath = base_url().'asset/img/users/'.$userinfo->u_picture;
											}
										?>

					<input value="<?php if(isset($userinfo->u_picture) && $userinfo->u_picture!=""){ echo $userinfo->u_picture; } ?>" type="hidden"
					id="userhidImage" name="userhidImage">

									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">Last Name<span class="mstar"></span></label>
										<div class="col-sm-9">
										  <input type="text" class="form-control"
										  id="p_u_lastname" name="p_u_lastname" placeholder="Last Name" value="<?php echo $userinfo->u_lastname; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">User Name<span class="mstar">*</span></label>
										<div class="col-sm-9">
										  <input type="text" class="form-control"
										  id="p_u_username" name="p_u_username" placeholder="User Name" required data-fv-notempty-message="The username is required" value="<?php echo $userinfo->u_username; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">About<span class="mstar"></span></label>
										<div class="col-sm-9">
										  <input type="text" class="form-control"
										  id="p_u_about" name="p_u_about" placeholder="Something about yourself" value="<?php echo $userinfo->u_about; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">Email</label>
										<div class="col-sm-9">
										  <input value="<?php echo $userinfo->u_email; ?>" readonly type="text" class="form-control"
										  id="p_u_email" name="p_u_email" placeholder="Email">
										</div>
									  </div>
									  <span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
									<span id="successMsg"></span>
									  <div class="form-group text-right">
										<div class="col-sm-offset-3 col-sm-9">
										 
										  <button type="submit" class="btn btn-primary">SAVE</button>
										</div>
									  </div>
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
<!-- Crop User Profile Image -->
<div class="modal fade" id="crop_user_profile_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Upload Profile Pitcure</h3>
				<span style="float: right; margin-top: -33px;" ><button type="button" class="btn btn-primary" onclick="selectCropImage();">Upload Image</button></span>
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
					<button type="button" class="btn btn-primary export" onclick="checkCoords();" style="display:none">Crop</button>
				</div>
				<input type="file" id="fileCropInp" name="fileCropInp" style="display:none;"  />
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="hidCropType">
<input type="hidden" id="hid_imageName">

<script>
	$(document).ready(function() {
		$('#add_user').formValidation();
	});
	$(document).ready(function() {
		$(document).on('change','#edit_user_file',function(){
			var file_data = document.getElementById('edit_user_file').files[0];
			var img_name = file_data.name;
			//var img_ext = img_name.split('.').pop().tolowerCase();
			//alert(img_name);return false;
			var form_data = new FormData();
			form_data.append('edit_user_file', file_data);
			$.ajax({
				url: baseUrl+'Company/getComonImage?id='+time,
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				dataType:'json',
				success: function(data){
					//alert(data.output);return false;
					var imgName = data.output;
					$('#userhidImage').val(imgName);
				}
			});
		});
	});
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
					var cropTypeValue = $('#hidCropType').val();
					if(cropTypeValue == 1)
					{
						$('.export').show();
						cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					}else{

						$('.export').show();
						cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					}

				};
			}
		}else{
			alert("Please upload images only.");
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
		$.getScript( baseUrl+"js/jcrop.min.js" ).done(function( script, textStatus ){
			$('#upload_image_loader').hide();
			jcropminLoaded = 1;
			jQuery(function(){
				if(cropTypeValue == 1){
					jQuery('#cropbox').Jcrop({
						minSize :[200,200],
                        aspectRatio: 1,
                        setSelect: [0,0,200,200],
                        //allowResize: false,
                        //allowSelect : false,
                        onChange: updateCoords,
                        rotate : 90
					});
				}else{
					jQuery('#cropbox').Jcrop({
						minSize :[200,200],
                        aspectRatio: 1,
                        setSelect: [0,0,200,200],
                        //allowResize: false,
                        //allowSelect : false,
                        onChange: updateCoords,
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
					minSize :[200,200],
					aspectRatio: 1,
					setSelect: [0,0,200,200],
					//allowResize: false,
					//allowSelect : false,
					onChange: updateCoords,
					rotate : 90
				});
			}else{
				jQuery('#cropbox').Jcrop({
					minSize :[200,200],
					aspectRatio: 1,
					setSelect: [0,0,200,200],
					//allowResize: false,
					//allowSelect : false,
					onChange: updateCoords,
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
			var catImageBasicUploadUrl = baseUrl+'User/upload_profile_image';
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
						var newCatImageFullPath = baseUrl+'asset/img/users/'+data.imageName+'?t='+timestamp;
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
					url: baseUrl+'User/upload_crop_image',
					data: fd,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType:'json',
					cache:	false,
					success: function(returned){
						$('#cropbox').attr('src', baseUrl+'asset/img/users/'+returned.imageName);
						$('#hid_imageName').val(returned.imageName);
						//$('#userhidImage').val(returned.imageName);
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
</script>
