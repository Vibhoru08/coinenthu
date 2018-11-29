<?php
// echo '<pre>';print_r($digitalData['cm_ico_end_time']);exit;
$viewTime = date('Ymd') .'_'. date('His');
?>
<div class="content-wrapper">
	
	<!-- <div  style="border-bottom:1px solid #ddd"> -->
	<div class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">My ICO Trackers</li>
					</ol>
			</section>
		</div>
	</div>
	<div class="container-fluid m_margin_0">
	  <section class="content no-margin">
		<div class="row">
			<div class="col-md-9">
			<div class="box mar_b5 sorting home_box_n">
				<div class="box-header">
				<div class="row">
					<div class="col-md-4 msearch_bg mpad_b10">
						<input class="form-control brg_focus_n" onkeyup="sreachterm();" type="text" name="searchterms" id="searchterms" placeholder="Search ICOs">
					</div>
					<div class="col-md-8 text-right msearch_bg mpad_b3">
						<div class="select_style">
							<form class="form-inline">
							<div class="form-group">
								<ul class="nav navbar-nav">
								 <li class="dropdown mpull_right select_dropdown" id="change_u">
								  Sort By &nbsp; <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true" style="background:#fff;width:232px;;text-align:left;padding:6px 19px;" id="filtername">
								   Ending soon<div class="arrow_down"><span class="caret"></span></div>
								  </button>
								  <input type="hidden" id="filter_id" value="1">
								  <ul class="dropdown-menu user_dropdown_t" role="menu" style="width:232px">
									<li><a onClick="filterCompanies('rating');" href="javascript:void('0');">Highest rating</a></li>
									<li><a onClick="filterCompanies('viewed');" href="javascript:void('0');">Most reviewed</a></li>
									<li><a onClick="filterCompanies('mch');" href="javascript:void('0');">Market cap(High to Low)</a></li>
									<li><a onClick="filterCompanies('mcl');" href="javascript:void('0');">Market cap(Low to High)</a></li>
									
								  <li><a onClick="filterCompanies('edtA');" href="javascript:void('0');">Ending soon</a></li>
								  </ul>
								  </li>
								</ul>
							</div>
							</form>
						</div>
					</div>
				</div>
				</div>
			</div>
			<input type="hidden" id="totcntcompanies" value="<?php echo $totCntIcos; ?>" />
			<input type="hidden" id="limitpage"  value="12" />
			<input type="hidden" id="offsetpage" value="12" />
			<input type="hidden" id="pageMode" value="mylist_icos" />
			<div class="row company_list">
			<?php if(sizeof($icoTrackers)>0){ foreach($icoTrackers as $key=>$value){?>
				<div class="col-md-4">
					<ul class="products-list product-list-in-box">
						<li class="item center">
						<div class="product_zorder">
						  <div class="product-img company_img_width">
							<a href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id;?>">
								<?php if($value->cm_picture!=""){ ?>
									<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive">
								<?php }else{?>
									<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive">
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
							<a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id;?>" class="product-title"><?php echo $string; ?></a>
							<span class="product-description">
							

							<div>
								<input id="input-6" name="input-6" class="rating rating-loading" value="<?php echo $value->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
								<p><span class=""><?php // echo $value->cm_totalviews; ?> <?php
											if(isset($value->cm_totalviews) && $value->cm_totalviews!=''){
												$reviews = $value->cm_totalviews;
											}else{
												$reviews = '0';
											}
											 echo $reviews; ?> reviews</span></p>
							</div>
							</span>
						  </div>
						  </div>
						  <div class="company_ed_icons">
							<a href="javascript:void('0');" onclick="eidtCompanyView('<?php echo $value->cm_id;?>','<?php echo $value->cm_ctid;?>');" class="btn btn-default c_pad_btn1"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
							<a href="javascript:void('0');" onClick="deleteCompanyview('<?php echo $value->cm_id;?>','<?php echo $value->cm_ctid;?>')"class="btn btn-default c_pad_btn2"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						  </div>
						</li>
					</ul>
				</div>
			<?php } }else{ ?>
					 You have not yet added any Assets.
					<?php } ?>
				<span id="loadingData"></span>
			</div>
			<?php if($totCntIcos > 12){?>
			<div id="loadingHash1" class="text-center font_s22 mar_t20 "><a href="javascript:void(0);" onClick="GetMoreCompaniesLoad();" class="btn btn-danger">&nbsp;&nbsp;&nbsp;LOAD MORE &nbsp;&nbsp;&nbsp;</a></div>
			<?php } ?>
			</div>
			<div class="col-md-3">
				<div class="box overflow_hidden right_box_mar_t11">
					<div class="box-header with-border header_bg">
						<h3 class="" style="display: inline-block;font-size: 18px;line-height: 1;
						margin: 0;position: relative;top: 1px;">Our ICO Picks</h3>
					</div>
					<div class="box-body no-padding">
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
						<ol class="carousel-indicators">
							<?php
							if(count($icoImages) > 0)
							{
								foreach($icoImages as $key=>$value)
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
								if(count($icoImages) > 0){
								foreach($icoImages as $key=>$value)
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
							 <a href="<?php echo $sb_linkUrl; ?>" target="_blank"> <img src="<?php echo base_url();?>asset/img/banners/<?php echo $value->sb_imagename; ?>" style="width:100%" class="img-responce"></a>
							  </div>
							</div>
							<?php }
								}else{?>
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
								<?php } ?>
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
					<div class="box-header with-border header_bg">
						<h3 style="display: inline-block;font-size: 18px;line-height: 1;
						margin: 0;position: relative;top: 1px;">Trending</h3>
						<div style="position:absolute;top:12px;right:12px;"><a href="https://twitter.com/Coinenthu" class="twitter-follow-button" data-show-screen-name="false" data-show-count="false" > Coinenthu</a></div>
					</div>
					<div class="box-body">
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
	$(document).ready(function() {
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
				autoplayHoverPause: true
			});
		}else{
			var owl = $('.owl-carousel');
				owl.owlCarousel({
				items: 4,
				loop: true,
				margin: 20,
				autoplay: true,
				autoplayTimeout: 4000,
				autoplayHoverPause: true
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
		 // event.preventDefault();
	  }
	});
	$('#carousel-example-generic').carousel({
	  interval: 3000
	});
</script>
