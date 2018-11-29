<div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <?php if(isset($editReview->cm_ctid) && $editReview->cm_ctid==2) { ?>
						<li class=""><a href="<?php echo base_url();?>ico-tracker">ICO Tracker</a></li>
					  <?php }else{ ?>
						<li class=""><a href="<?php echo base_url();?>digital-assets">Digital Assets</a></li>
					  <?php } ?>
					   <?php if(isset($editReview->cm_name) && $editReview->cm_name != "") { ?>
						<li class=""><a href="<?php echo base_url();?>company-full-view/<?php echo str_replace(' ','_',$editReview->cm_name); ?>"><?php echo $editReview->cm_name; ?></a></li>
					  <?php }?>
					  <li class="active">Edit a review</li>
					</ol>
			</section>
		</div>
		</div>
        <div class="container">
			<section class="content mar_b20 mar_t50">
			<div class="row">
					<div class="col-md-9">
						<div class="box mar_b50 box_shadow overflow_hidden">
							<div class="box-header with-border header_bg">
								<h3 style="display: inline-block;font-size: 18px;line-height: 1;
						margin: 0;position: relative;top: 1px;">Edit a review</h3>
							</div>
							<div class="box-body">
								<form class="form-horizontal mandatory" id="wirte_review" name="wirte_review" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="updateWriteaReview();">
								  <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Rating</label>
									<div class="col-sm-7">
									<select id="star-rating">
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
									   <?php
										if(isset($editReview->re_rating) && $editReview->re_rating != "") {
											$re_rating = 2*($editReview->re_rating);
										}else{
											$re_rating = 0;
										}
									   ?>
									  <input type="text" style="border:0;margin-top: 6px;display:none" name="re_rating" id="re_rating" value="<?php echo $re_rating; ?>">
									</div>
								  </div>
									<input type="hidden" name="company_name" id="company_name" value="<?php echo $editReview->cm_name; ?>">
								  <input type="hidden" name="re_id" id="re_id" value="<?php echo $editReview->re_id; ?>">
								  <input type="hidden" name="re_cmid" id="re_cmid" value="<?php echo $editReview->re_cmid; ?>">
								  <input type="hidden" name="cm_unique_id" id="cm_unique_id" value="<?php echo $editReview->cm_unique_id; ?>">
								  <div class="form-group">
									<label for="inputPassword3" class="col-sm-3 control-label">Review  <span class="mstar">*</span> </label>
									<div class="col-sm-6">
									  <textarea class="form-control" placeholder="Review" style="min-height:270px;" id="re_decript" name="re_decript" required data-fv-notempty-message="The review is required" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Review should have less than 1000 characters" onkeyup="countCharcter();"><?php echo @strip_tags(str_replace(' ','&nbsp;',$editReview->re_decript),'<br />'); ?></textarea>
									  <span id="r_char_cnt" style="display:none;"> <span id="review_char_count"></span>&nbsp;&nbsp;character(s) left</span>
									</div>
								  </div>
								  <div class="form-group">
								<label for="inputEmail3" class="col-sm-3 control-label">Agree <span class="mstar">*</span></label>
									<div class="col-sm-6">
									  <div class="checkbox">
										<label>
											<?php
												if($editReview->re_agree==1){
													$checked = "checked";
												}else{
													$checked = "";
												}
											?>
										  <input <?php echo $checked; ?> required data-fv-notempty-message="Please agree to our terms" type="checkbox" id="agree_check" name="agree_check"> Please do not use derogatory terminology. Try to back your facts with relevant reference links. This is not a place to spread fake news. We are on a mission to promote block chain technology. We hope that you will support us. Refer <a href="#">our comments policy</a>
										</label>
									  </div>
									</div>
								</div>
								  <div class="form-group text-right">
									<div class="col-sm-offset-3 col-sm-6">
									<span id="loadSuccess"  style="float:left;display:none">Updating...</span>
									  <a type="button" class="btn btn-default" onClick="redirectUrlMethod();">CANCEL</a>
									  <button type="submit" class="btn btn-danger">UPDATE</button>
									</div>
								  </div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					<div class="box overflow_hidden">
						<div class="box-header with-border header_bg">
							<h3 class="box-title">Upcoming Events</h3>
						</div>
						<div class="box-body no-padding">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
								<li data-target="#carousel-example-generic" data-slide-to="1"></li>
								<li data-target="#carousel-example-generic" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<div class="text-center">
								  <img src="<?php echo base_url()?>images/sm_slide1.png" class="img-responsive">
								  </div>
								</div>
								<div class="item">
									<div class="text-center">
								  <img src="<?php echo base_url()?>images/sm_slide2.png" class="img-responsive">
								</div>
								</div>
								<div class="item">
									<div class="text-center">
								  <img src="<?php echo base_url()?>images/sm_slide3.png" class="img-responsive">
								</div>
								</div>
							</div>
							 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						  </a>
							</div>
						</div>
					</div>
					<!--<div class="box overflow_hidden">
						<div class="box-header with-border header_bg">
							<h3 class="box-title">Live Tickers  </h3>
						</div>
						<div class="box-body">
							<p></p>
						</div>
					</div>-->
				</div>
				</div>
			</div>
			</section>
        </div>
    </div>
<script>
	$(document).ready(function() {
		var ratingVall = $('#re_rating').val();
		var starSelectedClas = (parseInt(ratingVall)*parseInt("10"));
		$('.gl-star-rating-stars').addClass('s'+starSelectedClas);
		$('.gl-star-rating-text').text(ratingVall);
		$('#wirte_review').formValidation();
	});
	function getRatingVall()
	{
		var rating = $('#re_rating').val($('.gl-star-rating-text').text());
		var ratingVall = $('#re_rating').val();
		var starSelectedClas = (parseInt(ratingVall)*parseInt("10"));
		$('.gl-star-rating-stars').addClass('s'+starSelectedClas);
	}
	(function () {
		$( '#star-rating' ).starrating({
		// clearable  : true,
		initialText: $('#re_rating').val(),
		onClick    : getRatingVall,
		showText   : true,
	});
	/* $( '.gl-star-rating-stars' ).mouseout(function() {
		var ratingVall = $('#re_rating').val();
		var starSelectedClas = (parseInt(ratingVall)*parseInt("10"));
		$('.gl-star-rating-stars').addClass('s'+starSelectedClas);
	}); */

		/* var re_rating = $("#re_rating").val();
		if(re_rating!=""){
			re_rating = parseInt(2)*re_rating;
		}else{
			re_rating = 0;
		}
		$('input[type="range"]').val(re_rating).change();
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
	function updateWriteaReview(){
		$('#wirte_review').formValidation().on('success.form.fv', function(e) {
			e.stopImmediatePropagation();
			var re_agree = 0;
			var re_cmid      = $('#re_cmid').val();
			var re_rating    = $('#re_rating').val();
			var re_decript   = $('#re_decript').val();
			var cm_unique_id = $('#cm_unique_id').val();
			var re_id = $('#re_id').val();
			var cm_name = $('#company_name').val();
			if($('#agree_check').prop('checked')) {
				re_agree =1;
			}
			$("#loadSuccess").html("Updating...");
			$("#loadSuccess").show();
			var url= baseUrl+'Company/updateWriteReview?id='+time;
			$.ajax({
				type 		: "POST",
				url			: url,
				cache       : false,
				data        : {re_cmid:re_cmid,re_rating:re_rating,re_decript:re_decript,re_agree:re_agree,re_id:re_id},
				dataType	: "json",
				success: function(data){
					console.log(data.output);
					if(data.output=='success'){
						$("#loadSuccess").html('Review is successfully updated.').css("color", "green");;
						setTimeout(function(){
							$("#loadSuccess").hide();
							window.location = baseUrl+'company-full-view/'+cm_name.replace(/\s/g,'_');
						}, 2000);
					}else if(data.output=='failed')
					{
						$("#loadSuccess").html('Review is already exists.').css("color", "red");;
					}
				}
			});
			e.preventDefault();
		});
	}
	function redirectUrlMethod(){
		var cm_name = $('#company_name').val();
		var cm_unique_id = $('#cm_unique_id').val();
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
