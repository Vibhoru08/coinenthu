<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box controls">
				<section class="content-header">
				  <h1>
				  Add Digital Asset
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/digital-assets" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="add_digital_asset" id="add_digital_asset" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="addDigitalAsset();">
                  <div class="box-body mandatory_color">
				  <div class="col-md-2">
					<div class="text-center">
						<img src="<?php echo base_url().'images/Felix_the_Cat.jpg'; ?>" alt="User Image" class="img-thumbnail" id="image" name="image" style="width:160px;height:160px;">
					</div>
					<div class="text-center" style="padding-top:10px;">
						<!--<a href="javascript:void(0);" class="text-center" onclick="showCropPopup1(1)">ADD LOGO <i class="fa fa-edit"></i></a>-->
						<input name="digital_uploaded_file" id="digital_uploaded_file" type="file" accept="image/x-png,image/jpeg"/><br/>
					</div>
				  </div>
				  <div class="col-md-7">

                    <div class="form-group" >
                      <label for="firstname" class="col-sm-3 control-label">Digital Asset Name <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cm_name" name="cm_name" placeholder="Digital Asset Name" required data-fv-notempty-message="The asset name is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The asset name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="2000" data-fv-stringlength-message="The asset name must be less than 2000 characters">
						 <p id="da_name_error" name="fname_error"></p>
                      </div>
					 <input type="hidden" id="noaNoOfRegFiles" value="1" />
					 <input type="hidden" id="noaNoOfAdvisoryFiles" value="1" />
					 <input type="hidden" id="noaNoOfTrExFiles" value="1" />
					 <input type="hidden" id="noaNoOfMileFiles" value="1" />
					 <input type="hidden" id="noaNoOfUploadFiles" value="1" />
                    </div>
                    <div class="form-group">
                      <label for="lastname" class="col-sm-3 control-label">Description <sup>*</sup></label>
                      <div class="col-sm-8">
                        <textarea id="cm_decript" name="cm_decript" class="form-control" placeholder="Add Organization URL also"required data-fv-notempty-message="The description is required and cannot be empty" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The description can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="The description must be less than 1000 characters"></textarea>
						<p id="da_desc_error" name="fname_error"></p>
                      </div>
                    </div>
					<div class="" id="noaSpanMileFileDivs">
						<div class="voca form-group" id="noaDivMileFile_1">
							<div class="col-md-3 control-label">
							<label>Project Updates</label>
							</div>
							<div class="col-md-4">
								<textarea class="form-control" placeholder="Project Updates" name="ms_title[]"  id="ms_title_0"  value=""></textarea>
							</div>

							<div class="col-md-4">
								<input class="form-control" type="text" placeholder="URL" name="ms_link[]"  id="ms_link_0">
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-success btn-add"  id="noaBtnMileFile_1" OnClick="noaMileAddIFile(1);">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
								</button>
							</div>
						</div>
					</div>

									<input type="hidden" id="resources_cnt" value="1" />
									  <span id="resources_divs">
										  <div class="form-group" id="resource_1">
											<label for="Contact number" class="col-sm-3 control-label">Resources </label>
											<div class="col-md-4">
											 <input type="text" class="form-control" name="resource_name[]"  id="resource_name_0" placeholder="White Paper">
											</div>
											<div class="col-md-4 mmar_t15">
											  <input type="text" class="form-control" name="resource_url[]" id="resource_url_0" placeholder="URL" >
											</div>
											<div class="more_input_boxes col-md-1" id="resource_btn_1">
												<a href="javascript:void('0');" onClick="resources(1);" class="btn btn-success"><span class="fa fa-plus" aria-hidden="true"></span></a>
											</div>

										 </div>
									  </span>
					<div class="form-group">
                      <label for="emailaddress" id="label_mar" class="col-sm-3 control-label">Market Cap (in US$)</label>
                      <div class="col-sm-8">
                       <input type="text" id="cm_marketcap" name="cm_marketcap" class="form-control" placeholder="Market Cap" data-fv-regexp="true"
						data-fv-regexp-regexp="^\d+(,\d+)*$" onBlur="marketCapFun();">
						<p id="cm_marketcap_error" style="color:#a94442" name="cm_marketcap_error"></p>
					   <p id="da_mcap_error" name="fname_error"></p>
                      </div>
                    </div>
					<div class="" id="noaSpanRegFileDivs">
						<div class="voca form-group" id="noaDivRegFile_1">
							<div class="col-md-3 control-label">
							<label>Core Team</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" placeholder="Core Team" name="cot_name[]"  id="cot_name_0" type="text" value="">
							</div>
							<div class="col-md-4">
								<input class="form-control" placeholder="Linkedin URL" name="cot_profile_url[]" id="cot_profile_url_0" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The Linkedin URL must be less than 100 characters" >
							</div>

							<div class="col-md-1">
								<button type="button" class="btn btn-success btn-add"  id="noaBtnRegnFile_1" OnClick="noaRegnAddIFile(1);">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
								</button>
							</div>
						</div>
					</div>
					<div class="" id="noaSpanAdvisoryDivs">
						<div class="voca form-group" id="noaDivAdvisoryFile_1">
							<div class="col-md-3 control-label">
							<label>Advisory Team</label>
							</div>
							<div class="col-md-4">
								<input class="form-control" placeholder="Advisory Team" name="adt_name[]"  id="adt_name_0" type="text" value="">
							</div>
							<div class="col-md-4">
								<input class="form-control" placeholder="Linkedin URL" name="adt_profile_url[]" id="adt_profile_url_0" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The Linkedin URL must be less than 100 characters" >
							</div>

							<div class="col-md-1">
								<button type="button" class="btn btn-success btn-add"  id="noaBtnAdvisoryFile_1" OnClick="noaAdvisoryAddIFile(1);">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
								</button>
							</div>
						</div>
					</div>
					<input type="hidden" id="treadin_exchange_cnt" value="1" />
				  <span id="treading_exchange_divs">
					  <div class="form-group" id="treading_exchange_1">
						<label for="Contact number" class="col-sm-3 control-label">Add Exchange </label>
						<div class="col-md-4">
						 <input type="text" class="form-control" name="te_title[]"  id="te_title_0" placeholder="Exchange name">
						</div>
						<div class="col-md-4 mmar_t15">
						  <input type="text" class="form-control" name="trading_exchange_url[]" id="trading_exchange_url_0" placeholder="Exchange URL" >
						</div>
						<div class="more_input_boxes col-md-1" id="te_btn_1"><a href="javascript:void('0');" onClick="treading_exchange(1);" class="btn btn-success"><span class="fa fa-plus" aria-hidden="true"></span></a></div>
					</div>
				  </span>


					<div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Email ID <span style="color:red;">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cm_email" name="cm_email" placeholder="Email ID"
						required data-fv-notempty-message="The email is required and cannot be empty" data-fv-emailaddress="true"
						data-fv-emailaddress-message="The input is not a valid email address" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The email address must be less than 100 characters" data-fv-regexp="true" data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The email can consist of alphanumarical characters">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Website URL </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cm_siteurl" name="cm_siteurl" placeholder="Website URL" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The website url must be less than 100 characters" >
                      </div>
                    </div>
					<div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Twitter </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cm_twitter" name="cm_twitter" placeholder="Twitter " data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The twitter url must be less than 100 characters" >
                      </div>
                    </div>
					<div class="form-group">
                      <label for="password" class="col-sm-3 control-label">Slack </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cm_slack" name="cm_slack" placeholder="Slack" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The slack url must be less than 100 characters" >
                      </div>
                    </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Telegram</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="cm_telegram" name="cm_telegram" value="" placeholder="Telegram" data-fv-stringlength-message="The telegram url must be less than 100 characters" >
						</div>
                    </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Github</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="cm_github" name="cm_github" value="" placeholder="Github" data-fv-stringlength-message="The github url must be less than 100 characters" >
						</div>
                    </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Discord</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="cm_discord" name="cm_discord" value="" placeholder="Discord" data-fv-stringlength-message="The Discord url must be less than 100 characters" >
						</div>
                    </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Facebook</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="cm_facebook" name="cm_facebook" value="" placeholder="Facebook" data-fv-stringlength-message="The facebook url must be less than 100 characters" >
						</div>
                    </div>
					<div class="form-group">
					<label for="Facebook " class="col-sm-3 control-label">Coinmarketcap</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" id="cm_coinmarket_cap" name="cm_coinmarket_cap" value="" placeholder="Coinmarketcap" data-fv-stringlength-message="The Coinmarketcap must be less than 100 characters" >
					</div>
				  </div>
					<div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
						<div class="col-sm-8">
							<textarea class="form-control" id="cm_address" name="cm_address" value="" placeholder="Address"></textarea>
						</div>
                    </div>

					</div>
                  </div>

				  <input type="hidden" id="userhidImage" name="userhidImage">
				  <input type="hidden" id="hidCompanyType" name="hidCompanyType" value="1">
				  <div class="clearfix"></div>
                  <div class="box-footer">
					<span id="loadAddDigital"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<span id="successMsg"></span>
                    <button type="submit" class="btn btn-info pull-right">Add </button>
					<a href="<?php echo base_url();?>admin/digital-assets"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
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
				<h3 class="modal-title" id="myModalLabel">Upload  Image</h3>
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
<input type="hidden" name="mileStonesBoxesCnt" id="mileStonesBoxesCnt" value="1">
<input type="hidden" name="coreTeamBoxesCnt" id="coreTeamBoxesCnt" value="1">
<input type="hidden" name="advisoryTeamBoxesCnt" id="advisoryTeamBoxesCnt" value="1">
<input type="hidden" name="tradeExchBoxesCnt" id="tradeExchBoxesCnt" value="1">
<input type="hidden" name="ResourcesCnt"    	id="ResourcesCnt"    value="1">
<input type="hidden" name="uploadDocumentsCnt" id="uploadDocumentsCnt" value="1">
<script>
	$(document).ready(function() {
		$('#add_digital_asset').formValidation();
	});
	var userId = '<?php echo $this->session->userdata('user_id'); ?>';
	var _URL = window.URL || window.webkitURL;
	function showCropPopup1(cropType){
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
						aspectRatio: 1,
						setSelect: [0,160 ,160,0],
						onSelect: updateCoords,
						rotate : 90
					});
				}else{
					jQuery('#cropbox').Jcrop({
						setSelect: [0,160 ,160,0],
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
					setSelect: [0,160 ,160,0],
					onSelect: updateCoords,
					rotate : 90
				});
			}else{
				jQuery('#cropbox').Jcrop({
					setSelect: [0,160 ,160,0],
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
			var catImageBasicUploadUrl = baseUrl+'/user/upload_company_image';
			var companyType = $('#hidCompanyType').val();
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
			form_data.append('companyType',companyType);
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
						var newCatImageFullPath = mainUrl+'asset/img/companies/digital/'+data.imageName+'?t='+timestamp;
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
		var companyType = $('#hidCompanyType').val();
		var fd = new FormData();
		switch($('#'+fieldID).val().substring($('#'+fieldID).val().lastIndexOf('.') + 1).toLowerCase()){
			case 'png': case 'jpg': case 'jpeg': case 'jpe': case 'gif':
			image = new Image();
			image.src = _URL.createObjectURL($('#'+fieldID)[0].files[0]);
			image.onload = function() {
				fd.append( fieldID, $('#'+fieldID)[0].files[0]);
				fd.append( 'companyType', companyType);
				$.ajax({
					url: baseUrl+'/user/upload_cropcompany_image',
					data: fd,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType:'json',
					cache:	false,
					success: function(returned){
						if(companyType == 1) {
							$('#cropbox').attr('src', mainUrl+'asset/img/companies/digital/'+returned.imageName);
							$('#hid_imageName').val(returned.imageName);
							$('#userhidImage').val(returned.imageName);
							displayCrop(width,height,src);
						} else {
							$('#cropbox').attr('src', mainUrl+'asset/img/companies/ico_trakers/'+returned.imageName);
							$('#hid_imageName').val(returned.imageName);
							$('#userhidImage').val(returned.imageName);
							displayCrop(width,height,src);
						}

					}
				});
			}
			break;
			default:
			$('#'+fieldID).val('');
			alert('Please upload JPG,JPEG,JPE and PNG formats');
			break;
		}
	}
</script>
<script>

function noaRegnAddIFile( existingFNo )
{
	var noaNoOfRegFiles = $('#noaNoOfRegFiles').val().trim();
	var noaNewRegFileId = parseInt( noaNoOfRegFiles )+parseInt("1");

	var TotCoreTeamBoxesCnt = $('#coreTeamBoxesCnt').val();


	// For Delete : existingFNo
		var existingFText = $('#noaBtnRegnFile_'+existingFNo+' span ').attr('class');
		if( existingFText == "glyphicon glyphicon-minus-sign" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='cot_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("cot_name_", ""));
				if( $('#cot_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#noaDivRegFile_'+existingFNo).remove();
				$('#coreTeamBoxesCnt').val(parseInt(TotCoreTeamBoxesCnt)-parseInt(1));
				return false;
			}
		}

	if(TotCoreTeamBoxesCnt < 20){
		$('#coreTeamBoxesCnt').val(parseInt(TotCoreTeamBoxesCnt)+parseInt(1));

		$('#noaBtnRegnFile_'+existingFNo+' span ').removeClass( "glyphicon glyphicon-plus-sign" );
		$('#noaBtnRegnFile_'+existingFNo+' span ').addClass( "glyphicon glyphicon-minus-sign" );

		var noaNewRegFileDivHtml = "";
		noaNewRegFileDivHtml = '<div class="voca form-group" id="noaDivRegFile_'+noaNewRegFileId+'">';
			noaNewRegFileDivHtml += '<div class="col-md-3 control-label"><label class="control-label">Core Team</label></div><div class="col-md-4">';

			noaNewRegFileDivHtml += '<input class="form-control" placeholder="Core Team" name="cot_name[]"  id="cot_name_'+noaNewRegFileId+'" type="text" value="" >';
			noaNewRegFileDivHtml +='</div><div class="col-md-4">';
			noaNewRegFileDivHtml +='<input class="form-control" placeholder="Linkedin URL" name="cot_profile_url[]" id="cot_profile_url_'+noaNewRegFileId+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The Linkedin URL must be less than 100 characters" data-fv-uri="true" data-fv-uri-message="The Linkedin URL is not valid Ex. http://abc.com"></div>';
			noaNewRegFileDivHtml +='<div class="col-md-1"><button type="button" class="btn btn-success btn-add"  OnClick="noaRegnAddIFile('+noaNewRegFileId+');" id="noaBtnRegnFile_'+noaNewRegFileId+'"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>';


			noaNewRegFileDivHtml += '</div>';
		noaNewRegFileDivHtml += '</div>';

		$('#noaSpanRegFileDivs').append(noaNewRegFileDivHtml);

		$('#noaNoOfRegFiles').val(noaNewRegFileId);

		return false;
	}else{
		alert('Allowed only 20 extra fields.');
	}
}
function noaAdvisoryAddIFile( existingFNo )
{
	var noaNoOfAdvisoryFiles = $('#noaNoOfAdvisoryFiles').val().trim();
	var noaNewRegFileId = parseInt( noaNoOfAdvisoryFiles )+parseInt("1");

	var TotadvisoryBoxesCnt = $('#advisoryTeamBoxesCnt').val();

	// For Delete : existingFNo
		var existingFText = $('#noaBtnAdvisoryFile_'+existingFNo+' span ').attr('class');
		if( existingFText == "glyphicon glyphicon-minus-sign" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='adt_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("adt_name_", ""));
				if( $('#adt_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#noaDivAdvisoryFile_'+existingFNo).remove();
				$('#advisoryTeamBoxesCnt').val(parseInt(TotadvisoryBoxesCnt)-parseInt(1));
				return false;
			}
		}

	if(TotadvisoryBoxesCnt < 20){
		$('#advisoryTeamBoxesCnt').val(parseInt(TotadvisoryBoxesCnt)+parseInt(1));

		$('#noaBtnAdvisoryFile_'+existingFNo+' span ').removeClass( "glyphicon glyphicon-plus-sign" );
		$('#noaBtnAdvisoryFile_'+existingFNo+' span ').addClass( "glyphicon glyphicon-minus-sign" );

		var noaNewRegFileDivHtml = "";
		noaNewRegFileDivHtml = '<div class="voca form-group" id="noaDivAdvisoryFile_'+noaNewRegFileId+'">';
			noaNewRegFileDivHtml += '<div class="col-md-3 control-label"><label class="control-label">Advisory Team</label></div><div class="col-md-4">';

			noaNewRegFileDivHtml += '<input class="form-control" placeholder="Advisory Team" name="adt_name[]"  id="adt_name_'+noaNewRegFileId+'" type="text" value="">';
			noaNewRegFileDivHtml +='</div><div class="col-md-4">';
			noaNewRegFileDivHtml +='<input class="form-control" placeholder="Linkedin URL" name="adt_profile_url[]" id="adt_profile_url_'+noaNewRegFileId+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The Linkedin URL must be less than 100 characters" data-fv-uri="true" data-fv-uri-message="The Linkedin URL is not valid Ex. http://abc.com"></div>';
			noaNewRegFileDivHtml +='<div class="col-md-1"><button type="button" class="btn btn-success btn-add"  OnClick="noaAdvisoryAddIFile('+noaNewRegFileId+');" id="noaBtnAdvisoryFile_'+noaNewRegFileId+'"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>';


			noaNewRegFileDivHtml += '</div>';
		noaNewRegFileDivHtml += '</div>';

		$('#noaSpanAdvisoryDivs').append(noaNewRegFileDivHtml);

		$('#noaNoOfAdvisoryFiles').val(noaNewRegFileId);

		return false;
	}else{
		alert('Allowed only 20 more fields.');
	}
}
function noaUploadAddIFile( existingFNo )
{
	var noaNoOfUploadFiles = $('#noaNoOfUploadFiles').val().trim();
	var noaNewRegFileId = parseInt( noaNoOfUploadFiles )+parseInt("1");

	var TotUploadDocumentsCnt = $('#uploadDocumentsCnt').val();

	// For Delete : existingFNo
		var existingFText = $('#noaBtnUploadFile_'+existingFNo+' span ').attr('class');
		if( existingFText == "glyphicon glyphicon-minus-sign" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='cp_picture_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("cp_picture_", ""));
				if( $('#cp_picture_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#noaDivUploadFile_'+existingFNo).remove();
				$('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)-parseInt(1));
				return false;
			}
		}

	if(TotUploadDocumentsCnt < 20){
		$('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)+parseInt(1));

		$('#noaBtnUploadFile_'+existingFNo+' span ').removeClass( "glyphicon glyphicon-plus-sign" );
		$('#noaBtnUploadFile_'+existingFNo+' span ').addClass( "glyphicon glyphicon-minus-sign" );

		var noaNewRegFileDivHtml = "";
		noaNewRegFileDivHtml = '<div class="voca form-group" id="noaDivUploadFile_'+noaNewRegFileId+'">';
			noaNewRegFileDivHtml += '<div class="col-md-3 control-label"><label class="control-label">Upload</label></div><div class="col-md-8">';

			noaNewRegFileDivHtml += '<input class="form-control" placeholder="Trading exange" name="cp_picture[]"  id="cp_picture_'+noaNewRegFileId+'" type="file" value="" style="height:auto;">';
			noaNewRegFileDivHtml +='</div>';
			noaNewRegFileDivHtml +='<div class="col-md-1"><button type="button" class="btn btn-success btn-add"  OnClick="noaUploadAddIFile('+noaNewRegFileId+');" id="noaBtnUploadFile_'+noaNewRegFileId+'"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>';


			noaNewRegFileDivHtml += '</div>';
		noaNewRegFileDivHtml += '</div>';

		$('#noaSpanUploadFileDivs').append(noaNewRegFileDivHtml);

		$('#noaNoOfUploadFiles').val(noaNewRegFileId);

		return false;
	}else{
		alert('Allowed only 20 more fields.');
	}
}
function noaTrExAddIFile( existingFNo )
{
	var noaNoOfTrExFiles = $('#noaNoOfTrExFiles').val().trim();
	var noaNewRegFileId = parseInt( noaNoOfTrExFiles )+parseInt("1");

	var TotTrExBoxesCnt = $('#tradeExchBoxesCnt').val();


	// For Delete : existingFNo
		var existingFText = $('#noaBtnTrExFile_'+existingFNo+' span ').attr('class');
		if( existingFText == "glyphicon glyphicon-minus-sign" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='te_title_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("te_title_", ""));
				if( $('#te_title_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#noaDivTrExFile_'+existingFNo).remove();
				$('#tradeExchBoxesCnt').val(parseInt(TotTrExBoxesCnt)-parseInt(1));
				return false;
			}
		}

	if(TotTrExBoxesCnt < 20){
		$('#tradeExchBoxesCnt').val(parseInt(TotTrExBoxesCnt)+parseInt(1));

		$('#noaBtnTrExFile_'+existingFNo+' span ').removeClass( "glyphicon glyphicon-plus-sign" );
		$('#noaBtnTrExFile_'+existingFNo+' span ').addClass( "glyphicon glyphicon-minus-sign" );

		var noaNewRegFileDivHtml = "";
		noaNewRegFileDivHtml = '<div class="voca form-group" id="noaDivTrExFile_'+noaNewRegFileId+'">';
			noaNewRegFileDivHtml += '<div class="col-md-3 control-label"><label class="control-label">Trading Exchange</label></div><div class="col-md-8">';

			noaNewRegFileDivHtml += '<input class="form-control" placeholder="Trading Exchange" name="te_title[]"  id="te_title_'+noaNewRegFileId+'" type="text" value="">';
			noaNewRegFileDivHtml +='</div>';
			noaNewRegFileDivHtml +='<div class="col-md-1"><button type="button" class="btn btn-success btn-add"  OnClick="noaTrExAddIFile('+noaNewRegFileId+');" id="noaBtnTrExFile_'+noaNewRegFileId+'"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>';


			noaNewRegFileDivHtml += '</div>';
		noaNewRegFileDivHtml += '</div>';

		$('#noaSpanTrExFileDivs').append(noaNewRegFileDivHtml);

		$('#noaNoOfTrExFiles').val(noaNewRegFileId);

		return false;
	}else{
		alert('Allowed only 20 more fields.');
	}
}
function noaMileAddIFile( existingFNo )
{
	var noaNoOfMileFiles = $('#noaNoOfMileFiles').val().trim();
	var noaNewRegFileId = parseInt( noaNoOfMileFiles )+parseInt("1");

	var TotMileStonesBoxesCnt = $('#mileStonesBoxesCnt').val();


	// For Delete : existingFNo
		var existingFText = $('#noaBtnMileFile_'+existingFNo+' span ').attr('class');
		if( existingFText == "glyphicon glyphicon-minus-sign" )
		{
			var noaCountRegFiles = 0;
			$("textarea[id^='ms_title_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("ms_title_", ""));
				if( $('#ms_title_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#noaDivMileFile_'+existingFNo).remove();
				$('#mileStonesBoxesCnt').val(parseInt(TotMileStonesBoxesCnt)-parseInt(1));
				return false;
			}
		}



	if(TotMileStonesBoxesCnt < 20){

		$('#noaBtnMileFile_'+existingFNo+' span ').removeClass( "glyphicon glyphicon-plus-sign" );
		$('#noaBtnMileFile_'+existingFNo+' span ').addClass( "glyphicon glyphicon-minus-sign" );

		$('#mileStonesBoxesCnt').val(parseInt(TotMileStonesBoxesCnt)+parseInt(1));

		var noaNewRegFileDivHtml = "";
		noaNewRegFileDivHtml = '<div class="voca form-group" id="noaDivMileFile_'+noaNewRegFileId+'">';
			noaNewRegFileDivHtml += '<div class="col-md-3 control-label"><label class="">Project Updates</label></div><div class="col-md-4">';

			noaNewRegFileDivHtml += '<textarea class="form-control" placeholder="Project Updates" name="ms_title[]"  id="ms_title_'+noaNewRegFileId+'"  value=""></textarea>';
			noaNewRegFileDivHtml +='</div>';
			noaNewRegFileDivHtml +='<div class="col-md-4"><input class="form-control background_color" type="text" required placeholder="URL" name="ms_link[]"  id="ms_link_'+noaNewRegFileId+'"  value="">';


			noaNewRegFileDivHtml +='</div>';
			noaNewRegFileDivHtml +='<div class="col-md-1"><button type="button" class="btn btn-success btn-add"  OnClick="noaMileAddIFile('+noaNewRegFileId+');" id="noaBtnMileFile_'+noaNewRegFileId+'"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></div>';


			noaNewRegFileDivHtml += '</div>';
		noaNewRegFileDivHtml += '</div>';

		$('#noaSpanMileFileDivs').append(noaNewRegFileDivHtml);

		$('#noaNoOfMileFiles').val(noaNewRegFileId);

		return false;
	}else{
		alert('Allowed only 20 more fields.');
	}
}
function resources(cnt){
		$("#maxfieldsallowed").modal('hide');
		var resources_cnt = $('#resources_cnt').val().trim();
		var count_resources  = parseInt( resources_cnt )+parseInt("1");
		var TotTrExBoxesCnt  = $('#ResourcesCnt').val();
		var existingFText    = $('#resource_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='resource_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("resource_name_", ""));
				if( $('#resource_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#resource_'+cnt).remove();
				$('#ResourcesCnt').val(parseInt(TotTrExBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotTrExBoxesCnt < 5){
			$('#ResourcesCnt').val(parseInt(TotTrExBoxesCnt)+parseInt(1));
			$('#resource_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#resource_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="resource_'+count_resources+'">';
			html += '<label for="Contact number" class="col-sm-3 control-label">Resources </label><div class="col-md-4">';

			html += '<input type="text" class="form-control" name="resource_name[]"  id="resource_name_'+count_resources+'" placeholder="White Paper">';

			html +='</div><div class="col-md-4 mmar_t15">';
			html +=' <input type="text" class="form-control" name="resource_url[]" id="resource_url_'+count_resources+'" placeholder="URL" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The url must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes col-md-1" id="resource_btn_'+count_resources+'"><a href="javascript:void(0);" onClick="resources('+count_resources+');" class="btn btn-success"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
			html += '</div>';

			$('#resources_divs').append(html);
			$('#resources_cnt').val(count_resources);
			return false;
		}else{
			alert('Allowed only 5 more fields.');
		}
	}
	function treading_exchange(cnt){
		$("#maxfieldsallowed").modal('hide');
		var treadin_exchange_cnt = $('#treadin_exchange_cnt').val().trim();
		var count_treading  = parseInt( treadin_exchange_cnt )+parseInt("1");
		var TotTrExBoxesCnt  = $('#tradeExchBoxesCnt').val();
		var existingFText    = $('#te_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='te_title_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("te_title_", ""));
				if( $('#te_title_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#treading_exchange_'+cnt).remove();
				$('#tradeExchBoxesCnt').val(parseInt(TotTrExBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotTrExBoxesCnt < 20){
			$('#tradeExchBoxesCnt').val(parseInt(TotTrExBoxesCnt)+parseInt(1));
			$('#te_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#te_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="treading_exchange_'+count_treading+'">';
			html += '<label for="Contact number" class="col-sm-3 control-label">Add Exchange </label><div class="col-md-4">';

			html += '<input class="form-control" placeholder="Exchange name" name="te_title[]"  id="te_title_'+count_treading+'" type="text" value="">';

			html +='</div><div class="col-md-4 mmar_t15">';
			html +='<input class="form-control" placeholder="Exchange URL" name="trading_exchange_url[]" id="trading_exchange_url_'+count_treading+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The url must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes col-md-1" id="te_btn_'+count_treading+'"><a href="javascript:void(0);" onClick="treading_exchange('+count_treading+');" class="btn btn-success"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
			html += '</div>';

			$('#treading_exchange_divs').append(html);
			$('#treadin_exchange_cnt').val(count_treading);
			return false;
		}else{
			alert('Allowed only 20 more fields.');
		}
	}
	function marketCapFun()
	{
		var cm_marketcap = $('#cm_marketcap').val();
		var numberTrimmed = cm_marketcap.replace(/,/g, '');
		var finalNum = commaSeparateNumber(numberTrimmed)
		$('#cm_marketcap').val(finalNum);
	}
	function commaSeparateNumber(val){
		while (/(\d+)(\d{3})/.test(val.toString())){
		  val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
		}
		return val;
	}
</script>
