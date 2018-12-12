
<?php
// echo '<pre>';print_r($digitalAssets);exit;
$viewTime = date('Ymd') .'_'. date('His');
?><?php // echo '<pre>';print_r($digitalAssetsImages);exit;?>
<div class="content-wrapper">

	<!-- <div  style="border-bottom:1px solid #ddd"> -->
	<!--<div class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">Digital Assets</li>
					</ol>
			</section>
		</div>
	</div> -->
	<div class="container-fluid banner_margin linear_color">
		<div class="row mmar_t40 mmar_b10 mar_t80 mar_b40">
			<div class="col-xs-12 text-center banner_head">
				DIGITAL ASSETS
				<hr style="width:5%;border:1px solid #ffff">
				<div class="banner_desc">
				Let’s not invest blindly, get the correct information on your Digital Assets.
				<div>Search for them.</div>
			</div>
			</div>
		</div>

	</div>
	<div class="container-fluid m_margin_0">
	  <section class="content no-margin">
		<div class="row mar_b80 mar_t40">
			<div class="col-md-12 pad_0">
			<div class="box mar_b5 sorting home_box_n">
				<div class="box-header pad_0">
				<div class="row  ">
					<div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 msearch_bg pad_0">
						<div class = "row s_width">
						<div class = "col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-6 col-xs-offset-2  ss_width">
						<input class="form-control brg_focus_n" type="text" onkeyup="sreachterm();" type="text" name="searchterms" id="searchterms" placeholder="Search for your Digital Assets">
						</div>
						<div class = "col-md-2 col-sm-1  col-xs-3 pad_l0" style = "height:34px;width:34px;background-color:grey;border-radius:8%;">
						<img src="<?php echo base_url().'asset/img/search.png'; ?>" alt="search button" style = "height:23px;padding-top:10px;padding-left:10px;">
						</div>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 msearch_bg mpad_b3 pad_l0 a_width" >
						<div class="row">
							<div class="col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-12 col-xs-offset-0 centered ">
						<div class="select_style">
							<form class="form-inline">
							<div class="form-group"><nobr>
								<ul class="nav navbar-nav ">
								 <li class="dropdown mpull_right select_dropdown" id="change_u"><span class="for-border">
								  Sort By<button class="btn btn-default dropdown-toggle no-border" type="button" data-toggle="dropdown" aria-expanded="true" style="background:#fff;text-align:left;padding:6px 13px;" id="filtername">
								   Most reviewed</span><div class="arrow_down"><span class="caret"></span></div>
								  </button>
								  <input type="hidden" id="filter_id" value="1">
								  <ul class="dropdown-menu user_dropdown_t hide_menu" role="menu" style="width:231px">
									<li><a onClick="filterCompanies('viewed','1');" href="javascript:void('0');">Most reviewed</a></li>
									<li><a onClick="filterCompanies('rating','1');" href="javascript:void('0');">Highest rating</a></li>
									<li><a onClick="filterCompanies('mch','1');" href="javascript:void('0');">Market cap(High to Low)</a></li>
									<li><a onClick="filterCompanies('mcl','1');" href="javascript:void('0');">Market cap(Low to High)</a></li>
								  </ul>
								  </li>
								</ul></nobr>
							</div>
							</form>
						</div>
					</div>
				</div>
				</div>
				</div>
				</div>
			</div>
</div>
</div>
<div class = "row">
	<div class = "col-md-8">
			<input type="hidden" id="totcntcompanies" value="<?php echo $totCntDigitals; ?>" />
			<input type="hidden" id="limitpage"  value="6" />
			<input type="hidden" id="offsetpage" value="6" />
			<input type="hidden" id="pageMode" value="digital" />
			<div class="row company_list">
				<?php if(sizeof($digitalAssets)>0){ foreach($digitalAssets as $key=>$value){?>
					<div class="col-md-5 col-md-offset-1">
						<ul class="products-list product-list-in-box">
							<li class="item center">
							<div class="product_zorder">
							  <div class="product-img company_img_width">
								<a href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id; ?>">
									<?php if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){ ?>
										<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive" >
									<?php }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){?>
										<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive" >
									<?php } else if($value->cm_picture!=""){
						$srcc= base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
										if (@getimagesize($srcc)){
									?>
										<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive" >
									<?php }else{ ?>
											<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive" >
										<?php }?>
									<?php } else { ?>
										<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive" >
									<?php } ?>
								</a>
							  </div>
							  <div class="product-info">
							  <?php
								  $string = strip_tags($value->cm_name);
								  if (strlen($string) > 18) {
									  $string = substr($string, 0, 18).'...';
								  }
								?>
								<a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id; ?>" class="product-title"><?php echo $string; ?></a>
								<span class="product-description">
								<div>


									<input id="input-7" name="input-7" class="rating rating-loading" value="<?php echo $value->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
									<p>
										<span class="">
												<?php
												if(isset($value->cm_totalviews) && $value->cm_totalviews!=''){
													$reviews = $value->cm_totalviews;
												}else{
													$reviews = '0';
												}

												echo $reviews; ?>  reviews
										</span>
									</p>
								</div>
								</span>
							  </div>
							  </div>
							</li>
						</ul>
					</div>
				<?php } }else{ ?>
				 There are no digital assets.
				<?php } ?>
				<span id="loadingData"></span>
			</div>
			<!--<div id="loadingHash" class="text-center font_s22 mar_t20 mm_bttom hide"><i class="fa fa-spinner" aria-hidden="true"></i> Loading </div>-->
			<?php if($totCntDigitals > 6){?>
			<div id="loadingHash1" class="text-center font_s22 mar_t20 "><a href="javascript:void(0);" onClick="GetMoreCompaniesLoad();" class="btn btn-danger">&nbsp;&nbsp;&nbsp;LOAD MORE &nbsp;&nbsp;&nbsp;</a></div>
			<span id="m_hide"><br/></span>
			<?php } ?>
			</div>
			<div class="col-md-3">
				<div class="box overflow_hidden right_box_mar_t11">
					<div class="box-header with-border header_bg">
						<h3 class="" style="display: inline-block;font-size: 18px;line-height: 1;
						margin: 0;position: relative;top: 1px;">Upcoming Events</h3>
					</div>
					<div class="box-body no-padding">
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
				<div class="box overflow_hidden">
					<div class="box-header with-border header_bg pos_r">
						<h3 style="display: inline-block;font-size: 18px;line-height: 1;
						margin: 0;position: relative;top: 1px;">Trending </h3>
						<div style="position:absolute;top:12px;right:12px;"><a href="https://twitter.com/Coinenthu" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false" > Coinenthu</a></div>
					</div>
					<div class="">
						<div class="scroll twitter_feed">
						<p><a class="twitter-timeline" href="https://twitter.com/Coinenthu">Tweets by Coinenthu</a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </section>
	  <div class="mar_b40"></div>
	</div>
    </div>
<script>
	$(function () {
        $(document).keydown(function (e) {
			// F5 = 116, Cntrl+R = 82
			var keyBoardCode = e.keyCode;
			if(keyBoardCode==116 || keyBoardCode==82){
				localStorage.setItem('type','viewed');
				localStorage.setItem('page_name',1);
				filterCompanies('viewed','1');
			}
        });
    });

	$(document).ready(function() {

		var filterType = localStorage.getItem('type');
		var pageMode   = localStorage.getItem('page_name');
		if(filterType!=""){
			localStorage.setItem('type',filterType);
			localStorage.setItem('page_name',pageMode);
		}else{
			localStorage.setItem('type','viewed');
			localStorage.setItem('page_name',1);
		}
		var filterType = localStorage.getItem('type');
		var pageMode   = localStorage.getItem('page_name');
		filterCompanies(filterType,pageMode);



		$('.caption').hide();
		$('.clear-rating').hide();
		$('#funny_div').hide();
		$('#funnyy_div').show();
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			var owl = $('.owl-carousel');
				owl.owlCarousel({
				items: 1,
				loop: true,
				margin: 20,
				autoplay: true,
				autoplayTimeout: 4000,
				autoplayHoverPause: false
			});
		}else{
			var owl = $('.owl-carousel');
				owl.owlCarousel({
				items: 4,
				loop: true,
				margin: 20,
				autoplay: true,
				autoplayTimeout: 4000,
				autoplayHoverPause: false
			});
		}
	});

   // (function(){
		// $('#carousel123').carousel({ interval: 2000});
		// $('.carousel-showmanymoveone .item').each(function(){
			// var itemToClone = $(this);
			// for (var i=1;i<4;i++) {
				// itemToClone = itemToClone.next();
				// if (!itemToClone.length) {
					// itemToClone = $(this).siblings(':first');
				// }
				// itemToClone.children(':first-child').clone().addClass("cloneditem-"+(i)).appendTo($(this));
			// }
		// });
	// }());

	$( "#searchterms" ).keypress(function( event ) {
	  if ( event.which == 13 ) {
		  sreachterm();
	  }
	});
	$('#carousel-example-generic').carousel({
	  interval: 3000
	});
</script>
