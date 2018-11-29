<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <?php if(isset($cm_ctid) && $cm_ctid==2) { ?>
						<li class=""><a href="<?php echo base_url();?>ico-tracker">ICO Tracker</a></li>
					  <?php }else{ ?>
						<li class=""><a href="<?php echo base_url();?>digital-assets">Digital Assets</a></li>
					  <?php } ?>
					  <?php if(isset($cm_name) && $cm_name != "") { ?>
						<li class=""><a href="<?php echo base_url();?>company-full-view/<?php echo str_replace(" ","_",$cm_name); ?>"><?php echo $cm_name; ?></a></li>
					  <?php }?>
					  <li class="active">Write a review</li>
					</ol>
			</section>
		</div>
		</div>
        <div class="container">
			<section class="content mar_b20 mar_t50">
			<div class="row">
					<!--<div class="col-md-9">-->
					<div class="">
						<div class="box mar_b50 box_shadow overflow_hidden">
							<div class="box-header with-border header_bg">
								<h3 style="display: inline-block;font-size: 18px;line-height: 1;
						margin: 0;position: relative;top: 1px;">Write a review</h3>
							</div>
							<div class="box-body">
								<form class="form-horizontal mandatory" id="wirte_review" name="wirte_review" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="insertWriteaReview();">
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Rating <span class="mstar">*</span></label>
									<div class="col-sm-7">
									<select id="star-rating" name="star-rating" class="form-control" required data-fv-notempty-message="The rating is required">
									  <option value="">Select a rating</option>
									  <option value="10">10</option>
									  <option value="9">9</option>
									  <option value="8">8</option>
									  <option value="7">7</option>
									  <option value="6">6</option>
									  <option value="5">5</option>
									  <option value="4">4</option>
									  <option value="3">3</option>
									  <option value="2">2</option>
									  <option value="1">1</option>
									</select>
									</div>
									<div class="col-sm-1">
									  <input type="text" style="border:0;margin-top: 6px;display:none" name="re_rating" id="re_rating" value="">
									</div>
								  </div>
								  <input type="hidden" name="re_cmid" id="re_cmid" value="<?php echo $cm_id; ?>">
								  <input type="hidden" name="cm_unique_id" id="cm_unique_id" value="<?php echo $cm_unique_id; ?>">
									<input type="hidden" name="company_name" id="company_name" value="<?php echo $cm_name; ?>">
									<?php //echo "a";echo "$cm_name";echo "<pre>"; print_r($cm_name);echo "</pre>";exit; ?>
								  <div class="form-group">
									<label for="inputPassword3" class="col-sm-3 control-label">Review  <span class="mstar">*</span></label>
									<div class="col-sm-6">
									  <textarea class="form-control" placeholder="Review" style="min-height:270px;" required data-fv-notempty-message="The review is required" id="re_decript" name="re_decript" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Review should have less than 1000 characters" onkeyup="countCharcter();"></textarea>
									 <span id="r_char_cnt" style="display:none;"> <span id="review_char_count"></span>&nbsp;&nbsp;character(s) left</span>
									</div>
								  </div>
								  <div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Agree <span class="mstar">*</span></label>
									<div class="col-sm-6">
									  <div class="checkbox">
										<label>
										  <input required data-fv-notempty-message="Please agree to our terms" type="checkbox" id="agree_check" name="agree_check"> Please do not use derogatory terminology. Try to back your facts with relevant reference links. This is not a place to spread fake news.We hope that you will support us. Please
										  refer <a href="<?php echo base_url();?>comments-policy">our comments policy</a>
										</label>
									  </div>
									</div>
								</div>
								  <div class="form-group text-right">

									<div class="col-sm-offset-3 col-sm-6">
									<span id="loadSuccess"  style="float:left;display:none">Submitting...</span>
									  <a type="button" class="btn btn-default" onClick="redirectUrlMethod();">CANCEL</a>
									  <button type="submit" class="btn btn-danger">SUBMIT</button>
									</div>
								  </div>
								</form>
							</div>
						</div>
					</div>
					
						<?php
						if(count($digitalAssetsImages) > 0)
						{
							foreach($digitalAssetsImages as $key=>$value)
								{
									if($key == 0)
									{
										$active = 'active';
									}else{
										$active = '';
									}
									?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" class="<?php echo $active; ?>"></li>
								<?php
								}
						}else{?>
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>

						<?php
						}

						?>

						</ol>
						<div class="carousel-inner" role="listbox">
							<?php
								if(count($digitalAssetsImages) >0 ){
								foreach($digitalAssetsImages as $key=>$value)
								{
									$active ="";
									if($key == 0){
										$active = "active";
									}
							?>
							<div class="item <?php echo $active; ?>">
								<div class="text-center">
								<?php
									$sb_link = "";
									$sb_link = $value->sb_link;
									if (strpos($sb_link, 'http') !== false) {
										$sb_linkUrl = $sb_link;
									}else{
										$sb_linkUrl = '//'.$sb_link;
									}
								?>
							  <a href="<?php echo $sb_linkUrl; ?>" target="_blank"><img src="<?php echo base_url();?>asset/img/banners/<?php echo $value->sb_imagename; ?>" style="width:100%" class="img-responce"></a>
							  </div>
							</div>
							<?php }
								}else{
								?>
								<div class="item active">
									<div class="text-center">
										<a href="#" target="_blank"><img src="<?php echo base_url();?>images/architecture.jpg" style="width:100%" class="img-responce"></a>
								  </div>
								</div>
								<div class="item">
									<div class="text-center">
										<a href="#" target="_blank"><img src="<?php echo base_url();?>images/bannerrrrjpg.jpg" style="width:100%" class="img-responce"></a>
								  </div>
								</div>
								<?php
								}
								?>
						</div>
						 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						
				</div>
			</div>
			</section>
        </div>
    </div>
<script>
	$(document).ready(function() {
		$('.gl-star-rating-tex').text('Rate me');
		$('#wirte_review').formValidation();

	});
	function getRatingVall()
	{
		var rating = $('#re_rating').val($('.gl-star-rating-text').text());
	}
	(function () {
	$( '#star-rating' ).starrating({
		clearable  : true,
		initialText: "Rate me",
		onClick    : getRatingVall,
		showText   : true,
	});


		/* $('input[type="range"]').val(0).change();
		var  selector = '[data-rangeSlider]';
		var  elements = document.querySelectorAll(selector);
		function valueOutput(element) {
			var value = element.value;
			var output = $("#re_rating").val(value);
		}

		for (var i = elements.length - 1; i >= 0; i--) {
			valueOutput(elements[i]);
		}

		Array.prototype.slice.call(document.querySelectorAll('input[type="range"]')).forEach(function (el) {
			el.addEventListener('input', function (e) {
				valueOutput(e.target);
			}, false);
		});
		rangeSlider.create(elements, { }); */
	})();
	function insertWriteaReview(){
		$('#wirte_review').formValidation().on('success.form.fv', function(e) {
			e.stopImmediatePropagation();
			var re_agree = 0;
			var re_cmid      = $('#re_cmid').val();
			var re_rating    = $('#re_rating').val();
			var re_decript   = $('#re_decript').val();
			var cm_unique_id = $('#cm_unique_id').val();
			var cm_name = $('#company_name').val();
			if($('#agree_check').prop('checked')) {
				re_agree =1;
			}
			$("#loadSuccess").html("Submitting...");
			$("#loadSuccess").show();
			var url= baseUrl+'Company/insertWriteReview?id='+time;
			$.ajax({
				type 		: "POST",
				url			: url,
				cache       : false,
				data        : {re_cmid:re_cmid,re_rating:re_rating,re_decript:re_decript,re_agree:re_agree},
				dataType	: "json",
				success: function(data){
					console.log(data.output);
					if(data.output=='success'){
						$("#loadSuccess").html('Review successfully submitted.').css("color", "green");;
						setTimeout(function(){
							$("#loadSuccess").hide();
							window.location = baseUrl+'company-full-view/'+cm_name.replace(/\s/g,'_');
						}, 2000);
					}else if(data.output=='failed')
					{
						$("#loadSuccess").html('Review already exists.').css("color", "red");;
					}
				}
			});
			e.preventDefault();
		});
	}
	function redirectUrlMethod(){
		var cm_unique_id = $('#cm_unique_id').val();
		var cm_name = $('#company_name').val();
		window.location = baseUrl+'company-full-view/'+cm_name.replace(/\s/g,'_');
	}
	function countCharcter()
	{
		var textLength = $('#re_decript').val().length;
		var FinalLength = parseInt(1000)-parseInt(textLength);
		if(parseInt(FinalLength) >=1){
			$('#r_char_cnt').show();
			$('#review_char_count').html(FinalLength);
		}else{
			$('#r_char_cnt').hide();
			$('#review_char_count').html('');
		}
	}
</script>
