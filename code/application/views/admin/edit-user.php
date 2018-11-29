<?php
// echo '<pre>';print_r($userdeatils);exit;

?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Edit User
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/user-management" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="edit_user" id="edit_user" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh"  onSubmit="editUser();">
                  <div class="box-body mandatory_color">
				  <div class="col-md-2">
					<div class="text-center">
					<?php
						$viewTime = date('Ymd') .'_'. date('His');
						if(isset($userdeatils->u_picture) && $userdeatils->u_picture!=""){
							$imagePath = base_url().'asset/img/users/'.$userdeatils->u_picture.'?id='.$viewTime;;
						}else{
							$imagePath = base_url().'images/Felix_the_Cat.jpg';
						}
					?>
						<img src="<?php echo $imagePath; ?>" alt="User Image" class="img-thumbnail" id="image" name="image" style="width:160px;height:160px;">
					</div>
					<div class="text-center" style="padding-top:10px;">
						<!--<a href="javascript:void(0);" class="text-center" onclick="showCropPopup(1)">Update Photo <i class="fa fa-edit"></i></a>-->
						<input name="uploaded_file" id="uploaded_file" type="file" accept="image/x-png,image/jpeg"/><br/>

					</div>
				  </div>
				  <div class="col-md-7">
					<?php
						if(isset($userdeatils->u_firstname) && $userdeatils->u_firstname!=""){
							$u_firstname = $userdeatils->u_firstname;
						}else{
							$u_firstname = '';
						}
					?>
                    <div class="form-group">
                      <label for="firstname" class="col-sm-3 control-label">First Name <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input value="<?php echo $u_firstname; ?>" type="text" class="form-control" id="fname" name="fname" placeholder="Fist Name" required data-fv-notempty-message="The firstname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The first name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The first name must be less than 100 characters">
						 <p id="fname_error" name="fname_error"></p>
                      </div>

                    </div>
					<?php
						if(isset($userdeatils->u_lastname) && $userdeatils->u_lastname!=""){
							$u_lastname = $userdeatils->u_lastname;
						}else{
							$u_lastname = '';
						}
					?>
                    <div class="form-group">
                      <label for="lastname" class="col-sm-3 control-label">Last Name <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input value="<?php echo $u_lastname; ?>" type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required data-fv-notempty-message="The lastname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The last name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The last name must be less than 100 characters">
						<p id="lname_error" name="fname_error"></p>
                      </div>
                    </div>
					<?php
						if(isset($userdeatils->u_username) && $userdeatils->u_username!=""){
							$u_username = $userdeatils->u_username;
						}else{
							$u_username = '';
						}
					?>
					<div class="form-group">
                      <label for="lastname" class="col-sm-3 control-label">User Name <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input value="<?php echo $u_username; ?>" type="text" class="form-control" id="u_username" name="u_username" placeholder="User Name" required data-fv-notempty-message="The lastname is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The user name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The user name must be less than 100 characters">
						<p id="lname_error" name="fname_error"></p>
                      </div>
                    </div>
					<?php
						if(isset($userdeatils->u_email) && $userdeatils->u_email!=""){
							$u_email = $userdeatils->u_email;
						}else{
							$u_email = '';
						}
					?>
					<div class="form-group">
                      <label for="emailaddress" class="col-sm-3 control-label">Email Address </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo $u_email; ?>">
                      </div>
                    </div>
					<?php
						if(isset($userdeatils->u_mobile) && $userdeatils->u_mobile!=""){
							$u_mobile = $userdeatils->u_mobile;
						}else{
							$u_mobile = '';
						}
					?>

					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Mobile Number</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="u_mobile" name="u_mobile" value="<?php echo $u_mobile; ?>" placeholder="Mobile Number">
						</div>
                    </div>
					</div>
                  </div>

				  <input type="hidden" value="<?php if(isset($userdeatils->u_picture) && $userdeatils->u_picture!=""){ echo $userdeatils->u_picture; }else{ }?>" id="userhidImage" name="userhidImage">
				  <input type="hidden" id="u_uid" name="u_uid" value="<?php if(isset($userdeatils->u_uid) && $userdeatils->u_uid!=""){ echo $userdeatils->u_uid; }else{ }?>">
				  <div class="clearfix"></div>

                  <div class="box-footer">
				  <span id="successMsg"></span>
					<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
                    <button type="submit" class="btn btn-info pull-right">Update User</button>
					<a href="<?php echo base_url();?>admin/user-management"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
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

<script>
	$(document).ready(function() {
		$('#edit_user').formValidation();
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
		$.getScript( mainUrl+"js/jcrop.min.js" ).done(function( script, textStatus ){
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
			var catImageBasicUploadUrl = baseUrl+'/user/upload_profile_image';
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
						var newCatImageFullPath = mainUrl+'asset/img/users/'+data.imageName+'?t='+timestamp;
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
					url: baseUrl+'/user/upload_crop_image',
					data: fd,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType:'json',
					cache:	false,
					success: function(returned){
						$('#cropbox').attr('src', mainUrl+'asset/img/users/'+returned.imageName);
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
</script>
