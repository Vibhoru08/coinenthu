<div class="content-wrapper">
	<div class="container-fluid banner_margin linear_color">
				<div class="row mmar_t40 mmar_b10 mar_t30 mar_b40">
					<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 text-center banner_head">
						YOUR REVIEW
						<!--<hr style="width:5%;border:1px solid #ffff">-->
					</div>
				</div>
		</div>
		<?php if($company_picture !=""){
								//print_r($companyview['cm_ctid']);exit;
								if($cm_ctid == 2){ ?>
									<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$company_picture.''; ?>" class="img-rounded review-asset-image"/>
							<?php }else if($cm_ctid == 1){
							if($company_picture !="" && substr( $company_picture, 0, 4 ) === "digi"){ ?>
									<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$company_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded review-asset-image"/>
								<?php }else if(substr( $company_picture, 0, 3 ) === "ico"){?>
									<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$company_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded review-asset-image"/>
								<?php } else if($company_picture !=""){
					$srcc= base_url().'asset/img/companies/digitalasset/'.$company_picture;
									if (@getimagesize($srcc)){
								?>
									<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$company_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded review-asset-image"/>
								<?php }else{ ?>
										<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-rounded review-asset-image"/>
									<?php }?>
								<?php } else { ?>
									<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-rounded review-asset-image"/>
								<?php } ?>

							<?php }	}
							else { ?>
							<img src="<?php echo base_url(); ?>images/Felix_the_Cat.jpg" class="img-rounded review-asset-image"/>
							<?php } ?>
	  <div class = "container-fluid mar_t10">
			<div class = "row">
					<div class = "col-md-4 col-md-offset-1 mar_b10 text-left review_head">
								<span><h3>Your review will help others make the right decision!</h3></span>
								<hr align="left" style="width:10%;border:4px solid black;">
					</div>
					<div class = "row">
						<div class = "col-md-7 col-md-offset-1">
								<div class = "new_boxes upcoming_box_padding">
									<form class="form-horizontal mandatory" id="wirte_review" name="wirte_review" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="insertWriteaReview();">
									<label for="inputEmail3" class="control-label">Rate The Asset</label>
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
										<input type="text" style="border:0;margin-top: 6px;display:none" name="re_rating" id="re_rating" value="">
										<input type="hidden" name="re_cmid" id="re_cmid" value="<?php echo $cm_id; ?>">
								  <input type="hidden" name="cm_unique_id" id="cm_unique_id" value="<?php echo $cm_unique_id; ?>">
									<input type="hidden" name="company_name" id="company_name" value="<?php echo $cm_name; ?>">
										<label for="inputPassword3" class="control-label">Add your review</label>
										<textarea class="form-control" placeholder="Review" style="min-height:270px;" required data-fv-notempty-message="The review is required" id="re_decript" name="re_decript" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Review should have less than 1000 characters" onkeyup="countCharcter();"></textarea>
									 <span id="r_char_cnt" style="display:none;"> <span id="review_char_count"></span>&nbsp;&nbsp;</span>
									 <div class = "mar_t30" style= "border:1px solid black;border-radius:10px;padding:10px 10px 10px 10px;">
									 <label>
										  Please do not use derogatory terminology. Try to back your facts with relevant reference links. This is not a place to spread fake news.We hope that you will support us. Please
										  refer <a href="<?php echo base_url();?>comments-policy">our comments policy</a><br/>
											<span style = "float:right;font-family:NoirPro Semibold;font-weight:600;">I AGREE&nbsp;&nbsp;<input required data-fv-notempty-message="Please agree to our terms" type="checkbox" id="agree_check" name="agree_check"></span>
										</label>
									</div>
									<span id="loadSuccess"  style="float:left;display:none">Submitting...</span>
									<button id="submit_b" type="submit" class="btn btn-primary pull-right mar_t30 mar_b20">SUBMIT</button>
								</form>
								</div>

						</div>
						<div class = "col-md-3">
						<div class="new_boxes upcoming_box_padding">
					<div class = "text-center">
						<h5>UPCOMING EVENTS</h5>
					</div>
					<div>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
						<ol class="carousel-indicators">
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
							if(count($digitalAssetsImages) > 0){
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
							}else{	?>
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
							<?php }?>
						</div>
						 <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>-->
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>-->
					  </a>
						</div>
					</div>
				</div>
						</div>
					</div>
			</div>
		</div>


<script src="<?php echo base_url();?>asset/forntend/js/jquery.validate.min.js"></script>
<script>

	$(document).ready(function() {

		CKEDITOR.replace('re_decript', {
			height: '300',
   maxlength: '400' ,
			 on: {
				 instanceReady: function() {
			 this.dataProcessor.htmlFilter.addRules({
					 elements: {
							 p: function( element ) {
									 // If there's no class, assing the custom one:
									 if ( !element.attributes.class )
											 element.attributes.class = 'pClass';

									 // It there's some other class, append the custom one:
									 else if ( !element.attributes.class.match( pClassRegexp ) )
											 element.attributes.class += ' ' + 'pClass';

									 // Add the subsequent id:
									 if ( !element.attributes.id ){
											// element.attributes.id = 'paragraph_';
							 }
						 }
					 }
			 });
	 }
}
});
		$('.gl-star-rating-tex').text('Rate me');
		$('#wirte_review').formValidation({
			ignore:[]
		});
		CKEDITOR.instances.re_decript.on('change', function() {

			CKEDITOR.instances.re_decript.updateElement();
			var text=CKEDITOR.instances.re_decript.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/\&nbsp;/g, '').replace(/^\s+|\s+$/g, '');


		});






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
		for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
    }
		CKEDITOR.instances.re_decript.updateElement();
		var text=CKEDITOR.instances.re_decript.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/\&nbsp;/g, '').replace(/^\s+|\s+$/g, '');
		console.log(text.length );
		debugger;
		if(text.length==0 || text==""){
			$('#r_char_cnt').show();
			$('#review_char_count').html('<span style="color:red;">The review is required</span>');
			$("#submit_b").prop("disabled", true);
		throw new Error("Something went badly wrong!");
		}else{
		$('#wirte_review').formValidation().on('success.form.fv', function(e) {
			e.stopImmediatePropagation();
			debugger;
			console.log(e);
			var re_agree = 0;
			var re_cmid      = $('#re_cmid').val();
			var re_rating    = $('#re_rating').val();
			var re_decript   = CKEDITOR.instances['re_decript'].getData();
			console.log(re_decript);
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
							window.location = baseUrl+'company-full-view/'+cm_name.replace(/\s/g,"_");
						}, 2000);
					}else if(data.output=='failed')
					{
						$("#loadSuccess").html('Review already exists.').css("color", "red");
						$("#submit_b").prop("disabled", true);
					}
				}
			});
			e.preventDefault();
		});
	 }
	}
	function redirectUrlMethod(){
		var cm_unique_id = $('#cm_unique_id').val();
		var cm_name = $('#company_name').val();
		window.location = baseUrl+'company-full-view/'+cm_name.replace(/\s/g,"_");
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
