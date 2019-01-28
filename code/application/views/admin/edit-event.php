<div class="content-wrapper">
<div class = "content about-bg text-color">
    <section class = "content">
        <div class="row">
   		 <div class="col-md-12">
   			<div class="box controls">
   				<section class="content-header">
   				  <h1>
   				  UPDATE EVENT
   				  </h1>
   				  <ol class="breadcrumb">
   					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/events" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
   				  </ol>
    </section>

<div class="container-fluid">

<div class="row">
  <div class="col-md-12">
    <div class="no_background mar_b0  mar_t0 no_shadow overflow_hidden">
      <form class="form-horizontal mandatory" action="" method="POST" name="add_digital_asset" id="add_digital_asset" enctype="multipart/form-data"  data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon"
          data-fv-icon-invalid="glyphicon"            data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="addEvent();">
      <div class="box-body pad_t30">
        <div class="col-md-3 text-center">
          <div class="add_company">
            <img class="img-responsive" src = "<?php
            if(isset($event_picture) && $event_picture != ''){
                echo base_url().'asset/img/events/main/'.$event_picture;
            }else{
                echo base_url().'images/Felix_the_Cat.jpg';
            }
              ?>" src="<?php echo base_url(); ?>images/Felix_the_Cat.jpg" id="image" name="image" style="width:auto;height:200px;margin:auto;"/>
          </div>
          <div class="pad_t20 text-center">
          <!--<a href="javascript:void(0);" onclick="showCropPopup1(1)" class="btn btn-default btn_like"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ADD LOGO</a>-->
            <!--<label for="digital_uploaded_file" class="btn btn-default">Upload an image</label>-->
          <input name="event_uploaded_file" id="digital_uploaded_file" type="file" accept="image/x-png,image/jpeg" /><br/>
          </div>
        </div>
        <div class="col-md-7">

          <input type="hidden" id="userhidImage" name="userhidImage" value = "<?php echo $event_picture; ?>">
		  <input type = "hidden" id = "event_unique_id" name = "event_unique_id" value = <?php echo $event_id; ?>>

            <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">Title<span class="mstar">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control background_color" id="cm_name" name="ev_name" value = "<?php echo $event_name; ?>" placeholder="" required data-fv-notempty-message="The event title is required and cannot be empty" data-fv-regexp="true"
            data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" data-fv-regexp-message="The asset name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The asset name must be less than 100 characters">
            </div>
            </div>
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Location<span class="mstar">*</span></label>
            <div class="col-sm-9">
              <textarea class="form-control background_color" required rows="1" id="cm_address" name="ev_loc" value="" placeholder="" data-fv-notempty-message="The event location is required and cannot be empty"><?php echo $event_location; ?></textarea>
            </div>
            </div>
			<div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">City<span class="mstar">*</span></label>
            <div class="col-sm-9">
              <select name = "ev_city" required>
				<option value = "">None</option>
				<?php
				foreach($cities as $city){?>
                    <option value = "<?php echo $city->ci_value; ?>"
                    <?php
                    if($city->ci_value == $event_city){
                        echo "selected";
                    }
                    ?>><?php echo $city->ci_name; ?></option>
                <?php
                }
				?>
			  </select>
            </div>
            </div>
            <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Description <span class="mstar">*</span></label>
            <div class="col-sm-9">
              <textarea id="cm_decript" name="ev_decript" class="form-control background_color" placeholder="" required data-fv-notempty-message="The description is required and cannot be empty" data-fv-regexp="true"
            data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" data-fv-regexp-message="The description can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="2000" data-fv-stringlength-message="The description must be less than 2000 characters"><?php echo $event_decript; ?></textarea>
            </div>
            </div>

            <input type="hidden" id="mailstone_boxes_cnt" value="1" />
            <input type="hidden" id="core_team_cnt" value="1" />
             <input type="hidden" id="advisory_cnt" value="1" />
             <input type="hidden" id="escrow_cnt" value="1" />
             <div class="form-group">
             <label for="Inflation" class="col-sm-3 control-label">Event Start Date & Time <span class="mstar">*</span></label>
             <div class="col-sm-9">
               <div class="row">
                 <div class="col-md-6">
                  <input type="text" class="form-control" id="cm_ico_start_date" name="ev_sd" value = "<?php echo $event_sd; ?>" class="form-control" placeholder="Event Start Date " readonly style="background-color:#fff;" required data-fv-notempty-message="The start date is required" >
                 </div>
                 <div class="col-md-6 mmar_t15">
                  <select name="ev_st" value = "<?php echo $event_st; ?>" id="cm_ico_start_time" class="form-control" required data-fv-notempty-message="The start time is required">
                  <option value="">Event Start Time (UTC)</option>
                  <?php
                 $options = array();
                 foreach (range(0,23) as $fullhour)
                 {
                    $parthour = $fullhour > 12 ? $fullhour - 12 : $fullhour;
                    $sufix = $fullhour > 11 ? " pm" : " am";
                   if($parthour == '0')
                   {
                     $partHr = '12';
                   }else{

                     $partHr = $parthour;
                   }
                    $options["$fullhour:00"] = $partHr.":00".$sufix;
                    $options["$fullhour:30"] = $partHr.":30".$sufix;
                 }
                 foreach($options as $k=>$opt)
                 {?>
                 <option value="<?php echo $k; ?>"
                 <?php
                    if ($k == $event_st){
                        echo 'selected';
                    }
                 ?>><?php echo $opt; ?></option>
                 <?php
                 }
                 ?>

                  </select>
                 </div>
               </div>
             </div>
             </div>
             <div class="form-group">
             <label for="Inflation" class="col-sm-3 control-label">Event End Date & Time <span class="mstar">*</span></label>
             <div class="col-sm-9">
               <div class="row">
                 <div class="col-md-6">
                  <input type="text" id="cm_ico_end_date" name="ev_ed" value = "<?php echo $event_ed; ?>" class="form-control" placeholder="Event End Date "  readonly style="background-color:#fff;" required data-fv-notempty-message="The end date is required">
                 </div>
                 <div class="col-md-6 mmar_t15">
                   <select name="ev_et" id="cm_ico_end_time" class="form-control" required data-fv-notempty-message="The end time is required">
                  <option value="">Event End Time (UTC)</option>
                  <?php
                 $options = array();
                 foreach (range(0,23) as $fullhour)
                 {
                    $parthour = $fullhour > 12 ? $fullhour - 12 : $fullhour;
                    $sufix = $fullhour > 11 ? " pm" : " am";
                   if($parthour == '0')
                   {
                     $partHr = '12';
                   }else{

                     $partHr = $parthour;
                   }
                    $options["$fullhour:00"] = $partHr.":00".$sufix;
                    $options["$fullhour:30"] = $partHr.":30".$sufix;
                 }
                 foreach($options as $k=>$opt)
                 {?>
                 <option value="<?php echo $k; ?>"
                 <?php
                 if($k==$event_et){
                     echo 'selected';
                 }
                 ?>
                 ><?php echo $opt; ?></option>
                 <?php
                 }
                 ?>

                  </select>
                 </div>
               </div>
             </div>
             </div>
            <input type="hidden" id="resources_cnt" value="1" />

           <div class="form-group">
            <label id="label_mar" for="inputPassword3" class="col-sm-3 control-label">Price (in US$)<span class="mstar">*</span></label>
            <div class="col-sm-9">
             <input type="text" id="cm_marketcap" name="ev_price" value = "<?php echo $event_price; ?>" class="form-control background_color" placeholder="" required data-fv-regexp="true"
             data-fv-regexp-regexp="^\d+(,\d+)*$"  onBlur="marketCapFun();">
             <p id="cm_marketcap_error" style="color:#a94442" name="cm_marketcap_error"></p>
            </div>

            </div>
            <span id="core_team_divs">
			<?php foreach($speakers as $n=>$speaker){ ?>
              <div class="form-group" id="core_team_<?php echo $n + 1; ?>">
              <label for="Core Team" class="col-sm-3 control-label">Speakers<span class="mstar">*</span></label>
              <div class="col-sm-9">
              <div class="row pos_r">
                <div class="col-md-5">
                  <input type="text" value = "<?php echo $speaker; ?>" class="form-control background_color"  placeholder="Name" required name="sp_name[]"  id="cot_name_<?php echo $n + 1; ?>" data-fv-notempty-message="Name is required and cannot be empty" data-fv-regexp="true"
                data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" data-fv-regexp-message="Name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="Name must be less than 100 characters">
                </div>
                <div class="col-md-6 mmar_t15">
                  <input type="text" value = "<?php echo $speakers_url[$n]; ?>" class="form-control background_color" name="sp_profile_url[]" id="cot_profile_url_<?php echo $n + 1; ?>" placeholder="LinkedIn URL" >
                </div>
                <div class="col-md-1 form-group more_input_boxes" id="coreteam_<?php echo $n + 1; ?>"><a href="javascript:void(0);" onClick="coreTeam(<?php echo $n + 1; ?>);" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>

                <div class="col-md-12 mar_t15">
                  Upload Image &nbsp;<input style="display:inline;" type="file" placeholder="Name" name="sp_profile_image[]" id="cot_profile_image_<?php echo $n + 1; ?>" accept="image/x-png,image/jpeg" />
                </div>
                  </div>
              </div>
              </div>
			<?php } ?>
			<div class="form-group" id="core_team_<?php echo $speaker_count + 1; ?>">
              <label for="Core Team" class="col-sm-3 control-label">Speakers</label>
              <div class="col-sm-9">
              <div class="row pos_r">
                <div class="col-md-5">
                  <input type="text" value = "" class="form-control background_color"  placeholder="Name" name="sp_name[]"  id="cot_name_<?php echo $speaker_count + 1; ?>"  data-fv-regexp="true"
                data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" data-fv-regexp-message="Name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="Name must be less than 100 characters">
                </div>
                <div class="col-md-6 mmar_t15">
                  <input type="text" value = "" class="form-control background_color" name="sp_profile_url[]" id="cot_profile_url_<?php echo $speaker_count + 1; ?>" placeholder="LinkedIn URL" >
                </div>
                <div class="col-md-1 form-group more_input_boxes" id="coreteam_<?php echo $speaker_count + 1; ?>"><a href="javascript:void(0);" onClick="coreTeam(<?php echo $speaker_count + 1; ?>);" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>

                <div class="col-md-12 mar_t15">
                  Upload Image &nbsp;<input style="display:inline;" type="file" placeholder="Name" name="sp_profile_image[]" id="cot_profile_image_<?php echo $speaker_count + 1; ?>" accept="image/x-png,image/jpeg" />
                </div>
                  </div>
              </div>
              </div>

            </span>


            <span id="agenda_divs">
              <div class="form-group" id="agenda_1">
              <label for="Core Team" class="col-sm-3 control-label">Agenda<span class="mstar">*</span></label>

              <div class="col-sm-9">
              <div class="row pos_r days">
			  <?php foreach($Agenda as $day=>$event){ ?>
                <div class="day_<?php echo $day; ?> mar_t5" id="day_<?php echo $day; ?>">
                <div class="col-xs-3"><strong>Day <?php echo $day; ?></strong></div>
                <div class="form-group more_input_boxess col-xs-9" id="day<?php echo $day; ?>"><a href="javascript:void(0);" onClick="dayadd(<?php echo $day; ?>);" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
                <?php foreach($event as $k=>$v){ ?>
				<div class="col-xs-12 pad_0 mar_t15" id="agenda<?php echo $day; ?><?php echo $k + 1; ?>">
				<input type="hidden" id="agenda_cnt<?php echo $day; ?>" value="<?php echo $k + 1; ?>" />
                <input type="hidden" name="agendaBoxesCnt"     id="agendaBoxesCnt<?php echo $day; ?>"     value="<?php echo $k + 1; ?>">
                <div class="col-md-5">
                  <input type="text" class="form-control background_color"  placeholder="Time" required name="time<?php echo $day; ?>[]" value = "<?php echo $v->ag_time; ?>"  id="time_<?php echo $day; ?><?php echo $k + 1; ?>" data-fv-notempty-message="Time is required and cannot be empty"
                 data-fv-stringlength="true" data-fv-stringlength-max="10" data-fv-stringlength-message="Time must be less than 10 characters">
                </div>
                <div class="col-md-6 mmar_t15">
                  <input type="text" class="form-control background_color" name="event<?php echo $day; ?>[]" value = "<?php echo $v->ag_event; ?>" id="event_<?php echo $day; ?><?php echo $k + 1; ?>" placeholder="Event" >
                </div>
                  <div class="col-md-1 form-group more_input_boxess new_input_boxes" id="agenda_<?php echo $day; ?><?php echo $k + 1; ?>"><a href="javascript:void(0);" onClick="agenda(<?php echo $day; ?>,<?php echo $k + 1; ?>);" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
              </div>
				<?php } ?>
            </div>
			<?php } ?>
			<div class="day_<?php echo $day_count + 1; ?> mar_t5" id="day_<?php echo $day_count + 1; ?>">
                <div class="col-xs-3"><strong>Day <?php echo $day_count + 1; ?></strong></div>
                <div class="form-group more_input_boxess col-xs-9" id="day<?php echo $day_count + 1; ?>"><a href="javascript:void(0);" onClick="dayadd(<?php echo $day_count + 1; ?>);" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
                <div class="col-xs-12 pad_0 mar_t15" id="agenda<?php echo $day_count + 1; ?>1">
				<input type="hidden" id="agenda_cnt<?php echo $day_count + 1; ?>" value="1" />
                <input type="hidden" name="agendaBoxesCnt"     id="agendaBoxesCnt<?php echo $day_count + 1; ?>"     value="1">
                <div class="col-md-5">
                  <input type="text" class="form-control background_color"  placeholder="Time" name="time<?php echo $day_count + 1; ?>[]" id="time_<?php echo $day_count + 1; ?>1"
                 data-fv-stringlength="true" data-fv-stringlength-max="10" data-fv-stringlength-message="Time must be less than 10 characters">
                </div>
                <div class="col-md-6 mmar_t15">
                  <input type="text" class="form-control background_color" name="event<?php echo $day_count + 1; ?>[]" value = "" id="event_<?php echo $day_count + 1; ?>1" placeholder="Event" >
                </div>
                  <div class="col-md-1 form-group more_input_boxess new_input_boxes" id="agenda_<?php echo $day_count + 1; ?>1"><a href="javascript:void(0);" onClick="agenda(<?php echo $day_count + 1; ?>,1);" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
              </div>
				
            </div>
            </div>
              </div>

              </div>

            </span>

              <input type="hidden" id="day_cnt" value="<?php echo $day_count + 1; ?>" />
            <input type="hidden" id="treadin_exchange_cnt" value="1" />



            <div class="form-group">
             <label id="label_mar" for="inputPassword3" class="col-sm-3 control-label">Attendees Number<span class="mstar">*</span></label>
             <div class="col-sm-9">
              <input type="text" id="cm_marketcap" name="ev_num" value = "<?php echo $event_att; ?>" class="form-control background_color" placeholder="" required data-fv-regexp="true"
              data-fv-regexp-regexp="^\d+(,\d+)*$"  onBlur="marketCapFun();">
              <p id="cm_marketcap_error" style="color:#a94442" name="cm_marketcap_error"></p>
             </div>

             </div>




        <input type="hidden" id="hidCompanyType" name="hidCompanyType" value="1">

            <div class="form-group text-right">
             <span id="loadAddDigital"  style="float:left;display:none">Inserting...</span>

            </div>

        </div>

      </div>
      <div class="box-footer ">
        <!--<a href="<?php echo base_url();?>my-digital-assets" class="btn btn-default">CANCEL</a>-->
        <button type="submit" class="btn btn-info pull-right">UPDATE EVENT</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>
</div>
</div>
<input type="hidden" name="coreTeamBoxesCnt"     id="coreTeamBoxesCnt"     value="1">
<input type="hidden" name="dayBoxesCnt"     id="dayBoxesCnt"     value="1">

<script>
	$(document).ready(function() {
		$('#add_digital_asset').formValidation();
    $( "#cm_ico_start_date" ).datepicker({
  		 minDate: 0,
  		onClose: function (selectedDate) {
              $("#cm_ico_end_date").datepicker("option", "minDate", selectedDate);
  			$('#add_digital_asset').formValidation('revalidateField', 'ev_sd');
          },
  		dateFormat: 'mm/dd/yy',
  		changeMonth: true,
  		changeYear: true,}).datepicker(	);
      $( "#cm_ico_end_date" ).datepicker({
  		minDate: 0,
  		onClose: function (selectedDate) {
              /* $("#cm_ico_start_date").datepicker("option", "maxDate", selectedDate); */
  			$('#add_digital_asset').formValidation('revalidateField', 'ev_ed');
          },
  		dateFormat: 'mm/dd/yy',
  		changeMonth: true,
  		changeYear: true,}).datepicker();
    } );
  	var d 		= new Date();
  	var time 	= d.getTime();

	/* $(document).ready(function() {
		$(document).on('change','#digital_uploaded_file',function(){
			var file_data = document.getElementById('digital_uploaded_file').files[0];
			var img_name = file_data.name;
			//var img_ext = img_name.split('.').pop().tolowerCase();
			//alert(img_name);return false;
			var comName = $('#cm_name').val();
			alert(comName);return false;
			var form_data = new FormData();
			form_data.append('digital_uploaded_file', file_data);
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
	}); */
	var d 		= new Date();
	var time 	= d.getTime();
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
		$.getScript( baseUrl+"js/jcrop.min.js" ).done(function( script, textStatus ){
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
			var catImageBasicUploadUrl = baseUrl+'User/upload_company_image';
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
						if(companyType == 1) {
							var newCatImageFullPath = baseUrl+'asset/img/companies/digital/'+data.imageName+'?t='+timestamp;
						} else if(companyType == 2) {
							var newCatImageFullPath = baseUrl+'asset/img/companies/ico_trakers/'+data.imageName+'?t='+timestamp;
						}
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
		// console.log(companyType);
		var fd = new FormData();
		switch($('#'+fieldID).val().substring($('#'+fieldID).val().lastIndexOf('.') + 1).toLowerCase()){
			case 'png': case 'jpg': case 'jpeg': case 'jpe': case 'gif':
			image = new Image();
			image.src = _URL.createObjectURL($('#'+fieldID)[0].files[0]);
			image.onload = function() {
				fd.append( fieldID, $('#'+fieldID)[0].files[0]);
				fd.append( 'companyType', companyType);
				$.ajax({
					url: baseUrl+'User/upload_cropcompany_image',
					data: fd,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType:'json',
					cache:	false,
					success: function(returned){
						if(companyType == 1) {
							$('#cropbox').attr('src', baseUrl+'asset/img/companies/digital/'+returned.imageName);
							$('#hid_imageName').val(returned.imageName);
							//$('#userhidImage').val(returned.imageName);
							displayCrop(width,height,src);
						} else {
							$('#cropbox').attr('src', baseUrl+'asset/img/companies/ico_trakers/'+returned.imageName);
							$('#hid_imageName').val(returned.imageName);
							//$('#userhidImage').val(returned.imageName);
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

	function mailstone_boxes( cnt )
	{
		$("#maxfieldsallowed").modal('hide');
		var mailstone_boxes_cnt   = $('#mailstone_boxes_cnt').val().trim();
		var count_mb              = parseInt( mailstone_boxes_cnt )+parseInt("1");
		var TotMileStonesBoxesCnt = $('#milestonesboxesCnt').val();
		var existingFText = $('#mb_b_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var cntfiles = 0;
			$("textarea[id^='ms_title_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("ms_title_", ""));
				if( $('#ms_title_'+textboxId).length > 0 )
				{
					cntfiles++;
				}
			});
			if( cntfiles > 1 )
			{
				$('#milestone_div_'+cnt).remove();
				$('#milestonesboxesCnt').val(parseInt(TotMileStonesBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotMileStonesBoxesCnt < 20){
			$('#mb_b_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#mb_b_'+cnt+' span ').addClass( "fa fa-minus" );
			$('#milestonesboxesCnt').val(parseInt(TotMileStonesBoxesCnt)+parseInt(1));
			var html = "";
			html = '<div class="form-group" id="milestone_div_'+count_mb+'">';
				html += '<label for="inputPassword3" class="col-sm-3 control-label">Milestones </label><div class="col-sm-9"><div class="row no-margin mailstone_pad_bg"><div class="col-md-8">';

				html += '<textarea class="form-control background_color" placeholder="Milestones" name="ms_title[]"  id="ms_title_'+count_mb+'"  value=""></textarea>';
				html +='</div>';
				html +='<div class="col-md-4 mmar_t15 select_style"><select class="form-control background_color" name="ms_mss_id[]" id="ms_mss_id_'+count_mb+'"><option value="0">Select Status</option>';

				html += '<?php if(sizeof($milestoneStatuses) > 0){ foreach($milestoneStatuses as $mstones){ ?><option value="<?php echo $mstones->mss_id ;?>"><?php echo $mstones->mss_status ;?></option><?php }} ?>';

				html +='</select></div>';
				html +='<div class="more_input_boxes"><a href="javascript:void(0);" id="mb_b_'+count_mb+'" OnClick="mailstone_boxes('+count_mb+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';

					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#milestones_boxes').append(html);

			$('#mailstone_boxes_cnt').val(count_mb);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
  function agenda(cnt,cnt2){
    debugger;
		$("#maxfieldsallowed").modal('hide');
		var agenda_cnt = $('#agenda_cnt'+cnt).val().trim();
		var count_ct      = parseInt( agenda_cnt )+parseInt("1");
		var TotagendaBoxesCnt = $('#agendaBoxesCnt'+cnt).val();
		var existingFText = $('#agenda_'+cnt+cnt2+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("div[id^='agenda"+cnt+"']").each(function()
			{
        debugger;
				var textboxId = parseInt(this.id.replace("agenda"+cnt, ""));
				if( $('#agenda'+cnt+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#agenda'+cnt+cnt2).remove();
				$('#agendaBoxesCnt'+cnt).val(parseInt(TotagendaBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotagendaBoxesCnt < 20){
			$('#agendaBoxesCnt'+cnt).val(parseInt(TotagendaBoxesCnt)+parseInt(1));
			//$('#day'+cnt+' span ').removeClass( "fa fa-plus" );
			//$('#day'+cnt+' span ').addClass( "fa fa-minus" );
      if(cnt==1){
        var x=cnt-1;
      }else{
        var x=cnt;
      }
			var html = "";
      html += '<div class="col-xs-12 pad_0 mar_t15" id="agenda'+cnt+count_ct+'">';
			html += '<div class="col-md-5">';
			html +='<input type="text" class="form-control background_color"  placeholder="Time" required name="time'+cnt+'[]"  id="time_'+cnt+count_ct+'" data-fv-notempty-message="Time is required and cannot be empty"';
			html +='data-fv-stringlength="true" data-fv-stringlength-max="10" data-fv-stringlength-message="Time must be less than 10 characters">';
      html +='</div>';
      html +='<div class="col-md-6 mmar_t15">';
      html += '<input type="text" class="form-control background_color" name="event'+cnt+'[]" id="event_'+cnt+count_ct+'" placeholder="Event" >';
      html += '</div>';
      html +='<div class="col-md-1 form-group more_input_boxess new_input_boxes" id="agenda_'+cnt+count_ct+'"><a href="javascript:void(0);" onClick="agenda('+cnt+','+count_ct+');" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>';
      html +='</div>';

			$('#day_'+cnt).append(html);

			$('#agenda_cnt'+cnt).val(count_ct);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
  function dayadd(cnt){
    debugger;
		$("#maxfieldsallowed").modal('hide');
		var day_cnt = $('#day_cnt').val().trim();
		var count_ct      = parseInt( day_cnt )+parseInt("1");
		var TotdayBoxesCnt = $('#dayBoxesCnt').val();
		var existingFText = $('#day'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("div[id^='day_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("day_", ""));
        console.log(textboxId);
				if( $('#day_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#day_'+cnt).remove();
				$('#dayBoxesCnt').val(parseInt(TotdayBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotdayBoxesCnt < 20){
			$('#dayBoxesCnt').val(parseInt(TotdayBoxesCnt)+parseInt(1));
      var start=parseInt(cnt)-parseInt(1);
			//$('#day'+cnt+' span ').removeClass( "fa fa-plus" );
			//$('#day'+cnt+' span ').addClass( "fa fa-minus" );
      if(cnt==1){
        var x=cnt-1;
      }else{
        var x=cnt;
      }
			var html = "";
      html+= '<input type="hidden" id="agenda_cnt'+count_ct+'" value="1" />';
      html+= '<input type="hidden" name="agendaBoxesCnt'+count_ct+'"     id="agendaBoxesCnt'+count_ct+'"     value="1">';
			html += '<div class="col-xs-12 pad_0 day_'+count_ct+' mar_t5" id="day_'+count_ct+'">';
      html +='<div class="col-xs-3"><strong>Day '+count_ct+'</strong></div>';
			html += '<div class="form-group more_input_boxess col-xs-9" style="position:relative;padding-bottom:5px;" id="day'+count_ct+'"><a href="javascript:void(0);" onClick="dayadd('+count_ct+');" class="btn btn-success btn-add"><span class="fa fa-minus" aria-hidden="true"></span></a></div>';
      html += '<div class="col-xs-12 pad_0 mar_t15" id="agenda'+count_ct+cnt+'">';
      html += '<div class="col-md-5">';
			html +='<input type="text" class="form-control background_color"  placeholder="Time" required name="time'+count_ct+'[]"  id="time_'+count_ct+cnt+'" data-fv-notempty-message="Time is required and cannot be empty"';
			html +='data-fv-stringlength="true" data-fv-stringlength-max="10" data-fv-stringlength-message="Time must be less than 10 characters">';
      html +='</div>';
      html +='<div class="col-md-6 mmar_t15">';
      html += '<input type="text" class="form-control background_color" name="event'+count_ct+'[]" id="event_'+count_ct+ cnt +'" placeholder="Event" >';
      html += '</div>';
      html +='<div class="col-md-1 form-group more_input_boxess new_input_boxes" id="agenda_'+count_ct+cnt+'"><a href="javascript:void(0);" onClick="agenda('+count_ct+','+cnt+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
          html += '</div>';

			$('.days').append(html);

			$('#day_cnt').val(count_ct);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function coreTeam(cnt){
    debugger;
		$("#maxfieldsallowed").modal('hide');
		var core_team_cnt = $('#core_team_cnt').val().trim();
		var count_ct      = parseInt( core_team_cnt )+parseInt("1");
		var TotCoreTeamBoxesCnt = $('#coreTeamBoxesCnt').val();
		var existingFText = $('#coreteam_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
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
				$('#core_team_'+cnt).remove();
				$('#coreTeamBoxesCnt').val(parseInt(TotCoreTeamBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotCoreTeamBoxesCnt < 20){
			$('#coreTeamBoxesCnt').val(parseInt(TotCoreTeamBoxesCnt)+parseInt(1));
			$('#coreteam_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#coreteam_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="core_team_'+count_ct+'">';
			html += '<label for="Core Team" class="col-sm-3 control-label">Speakers</label><div class="col-sm-9"><div class="row pos_r"><div class="col-md-5">';
			html += '<input class="form-control background_color" placeholder="Name" name="sp_name[]"  id="cot_name_'+count_ct+'" type="text" value="" >';
			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control background_color" placeholder="Linkden url" name="sp_profile_url[]" id="cot_profile_url_'+count_ct+'" type="text" value="" ></div>';
      html +='<div  class="col-md-1 form-group more_input_boxes" id="coreteam_'+count_ct+'"><a href="javascript:void(0);" onClick="coreTeam('+count_ct+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
      html +='<div class="col-md-12 mar_t15">';
      html +='  Upload Image &nbsp;<input style="display:inline;" type="file" placeholder="Name" name="sp_profile_image[]" id="cot_profile_image_'+count_ct+'" accept="image/x-png,image/jpeg" />';
      html += '</div>';
      html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#core_team_divs').append(html);

			$('#core_team_cnt').val(count_ct);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function advisory_team(cnt){
		$("#maxfieldsallowed").modal('hide');
		var advisory_cnt   = $('#advisory_cnt').val().trim();
		var count_advisory = parseInt( advisory_cnt )+parseInt("1");
		var TotadvisoryBoxesCnt = $('#advisoryTeamBoxesCnt').val();
		var existingFText = $('#advisory_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
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
				$('#advisory_team_'+cnt).remove();
				$('#advisoryTeamBoxesCnt').val(parseInt(TotadvisoryBoxesCnt)-parseInt(1));
				return false;
			}
		}

		if(TotadvisoryBoxesCnt < 20){
			$('#advisoryTeamBoxesCnt').val(parseInt(TotadvisoryBoxesCnt)+parseInt(1));
			$('#advisory_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#advisory_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="advisory_team_'+count_advisory+'">';
			html += '<label for="CAdvisory Team " class="col-sm-3 control-label">Advisory Team</label><div class="col-sm-9"><div class="row"><div class="col-md-6">';
			html += '<input class="form-control background_color" placeholder="Advisory Team" name="adt_name[]"  id="adt_name_'+count_advisory+'" type="text" value="">';
			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control background_color" placeholder="Linkden URL" name="adt_profile_url[]" id="adt_profile_url_'+count_advisory+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The Linkden url must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="advisory_btn_'+count_advisory+'"><a href="javascript:void(0);" OnClick="advisory_team('+count_advisory+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#advisory_team_divs').append(html);
			$('#advisory_cnt').val(count_advisory);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function escrow_details(cnt){
		$("#maxfieldsallowed").modal('hide');
		var escrow_cnt   = $('#escrow_cnt').val().trim();
		var count_escrow = parseInt( escrow_cnt )+parseInt("1");
		var TotescrowBoxesCnt = $('#escrowDetailsBoxesCnt').val();
		var existingFText = $('#escrow_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='escrow_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("escrow_name_", ""));
				if( $('#escrow_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				$('#escrow_team_'+cnt).remove();
				$('#escrowDetailsBoxesCnt').val(parseInt(TotescrowBoxesCnt)-parseInt(1));
				return false;
			}
		}

		if(TotescrowBoxesCnt < 20){
			$('#escrowDetailsBoxesCnt').val(parseInt(TotescrowBoxesCnt)+parseInt(1));
			$('#escrow_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#escrow_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="escrow_team_'+count_escrow+'">';
			html += '<label for="CAdvisory Team " class="col-sm-3 control-label">Escrow Details</label><div class="col-sm-9"><div class="row"><div class="col-md-6">';
			html += '<input class="form-control background_color" placeholder="Escrow Details" name="escrow_name[]"  id="escrow_name_'+count_escrow+'" type="text" value="">';
			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control background_color" placeholder="Linkden URL/Organzation URL" name="escrow_profile_url[]" id="escrow_profile_url_'+count_escrow+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The url must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="escrow_btn_'+count_escrow+'"><a href="javascript:void(0);" OnClick="escrow_details('+count_escrow+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#escrow_divs').append(html);
			$('#escrow_cnt').val(count_escrow);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
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
			html += '<label for="Contact number" class="col-sm-3 control-label">Add Exchange </label><div class="col-sm-9 pos_r"><div class="row"><div class="col-md-6">';

			html += '<input class="form-control background_color" placeholder="Exchange name" name="te_title[]"  id="te_title_'+count_treading+'" type="text" value="">';

			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control background_color" placeholder="Exchange URL" name="trading_exchange_url[]" id="trading_exchange_url_'+count_treading+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The url must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="te_btn_'+count_treading+'"><a href="javascript:void(0);" onClick="treading_exchange('+count_treading+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#treading_exchange_divs').append(html);
			$('#treadin_exchange_cnt').val(count_treading);
			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
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
			html += '<label for="Contact number" class="col-sm-3 control-label">Resources </label><div class="col-sm-9 pos_r"><div class="row"><div class="col-md-6">';

			html += '<input type="text" class="form-control background_color" name="resource_name[]"  id="resource_name_'+count_resources+'" placeholder="White Paper">';

			html +='</div><div class="col-md-6 mmar_t15">';
			html +=' <input type="text" class="form-control background_color" name="resource_url[]" id="resource_url_'+count_resources+'" placeholder="URL" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The url must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="resource_btn_'+count_resources+'"><a href="javascript:void(0);" onClick="resources('+count_resources+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#resources_divs').append(html);
			$('#resources_cnt').val(count_resources);
			return false;
		}else{
			$("#maxfieldsallowedResources").modal('show');
		}
	}
	function upload_muliple_files(cnt){
		$("#maxfieldsallowed").modal('hide');
		var upload_files_cnt = $('#upload_files_cnt').val().trim();
		var count_upload = parseInt( upload_files_cnt )+parseInt("1");
		var TotUploadDocumentsCnt = $('#uploadDocumentsCnt').val();
		var existingFText = $('#upload_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
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
				$('#uploads_div_'+cnt).remove();
				$('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)-parseInt(1));
				return false;
			}
		}
		if(TotUploadDocumentsCnt < 20){
			$('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)+parseInt(1));
			$('#upload_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#upload_btn_'+cnt+' span ').addClass( "fa fa-minus" );

			var html = "";
			html = '<div class="form-group" id="uploads_div_'+count_upload+'">';
			html += '<label for="telegram " class="col-sm-3 control-label">Upload</label><div class="col-sm-9 pos_r">';
			html += '<input class="form-control background_color" placeholder="Trading exange" name="cp_picture[]"  id="cp_picture_'+count_upload+'" type="file" value="" style="height:auto;"><p class="small mar_t5 text-right"><em>PDF, IMAGE, WORD, etc... </em></p>';
			html +='<div class="more_input_boxes" id="upload_btn_'+count_upload+'"><a href="javascript:void(0);" onClick="upload_muliple_files('+count_upload+');" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
			html += '</div>';
			html += '</div>';
			$('#upload_file_divs').append(html);
			$('#upload_files_cnt').val(count_upload);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function addEvent(){
		$("#cm_marketcap_error").html('');
		$('#add_digital_asset').formValidation().on('success.form.fv', function(e) {
			e.stopImmediatePropagation();
			$('#loadAddDigital').html("Inserting...");
				var flag = true;
				var filesNotGiven = false;
				var cm_marketcap = $('#cm_marketcap').val();
				var s = cm_marketcap.split(',').join('');
				if(s.length>16){
					flag = false;
					$('#cm_marketcap').focus();
					$("#cm_marketcap").css("border-color", "#a94442");
					$("#cm_marketcap").css("box-shadow", "none");
					$("#label_mar").css("color", "#a94442");
					$("#cm_marketcap_error").html('Please enter less than 16 characters');
				}else{
					$("#cm_marketcap").css("border-color", "#00a65a");
					$("#cm_marketcap").css("box-shadow", "none");
					$("#label_mar").css("color", "#00a65a");
					$("#cm_marketcap_error").html('');
				}
				$("input[id^='cp_picture_']").each(function()
				{
					var textboxId = parseInt(this.id.replace("cp_picture_", ""));
					userfile = $('#cp_picture_'+textboxId).val()
					if( userfile != "" )
					{
						filesNotGiven = true;
						return;
					}
				});
				if( filesNotGiven )
				{
					$("input[id^='cp_picture_']").each(function()
					{
						var textboxId = parseInt(this.id.replace("cp_picture_", ""));
						userfile = $('#cp_picture_'+textboxId).val()

					});
					var ext = userfile.split('.').pop().toLowerCase();
					if($.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1) {
						$('#upload_files_error').html('Please choose aalowed types only');
						flag = false;
					}
				}
				if(flag == true){
					$("#loadUpdateDigital").show();
					var form_data = new FormData($('#add_digital_asset')[0]);
					$.ajax({
						url: baseUrl+'/Companies/editEventView?id='+time,
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,
						type: 'post',
						dataType:'json',
						success: function(data){
							if(data != 0){
                debugger;
							    $('#loadAddDigital').html("Successfully added.").css('color','green');
								setTimeout(function(){
									$("#loadAddDigital").hide();
									window.location = baseUrl+'my-digital-assets';
								}, 3000);
							}
						}

					});
				}
			e.preventDefault();
		});
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
