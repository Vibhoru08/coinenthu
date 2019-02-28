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
		<div class="row mmar_t40 mmar_b10 mar_t30 mar_b40">
			<div class="col-xs-12 text-center banner_head">
				WELCOME TO THE CRYPTO WORLD
		<!--<hr style="width:5%;border:2px solid #ffff">-->
				<div class="banner_desc m_hide">
				Let’s not invest blindly, get the correct information on your Digital Assets.
				<div>Search for them.</div>
			</div>
			<div class="row mar_t10">
			<div class="col-xs-10 col-xs-offset-1 msearch_bg big_hide">
				<div class = "col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<div class="row search_total">
						<label class="col-xs-1 search_hme_icon" for="searchterms"><i class="fa fa-search searchtrem_style" aria-hidden="true"></i></label>

				<input class="form-control brg_focus_n searchhome col-xs-11" type="text" onkeyup="sreachterm2();" type="text" name="searchterms" id="searchterms" placeholder="Search for your Events">
				</div>
			</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="row mobile_login NoirProSemiBold big_hide text-center">
		<div class="col-xs-12">
			<div class="col-xs-6 pad_t10 pad_b10 text-center review_log" id="review_log">
				EVENTS
			</div>
			<div class="col-xs-6 pad_t10 pad_b10 text-center news_log" id="news_log">
				NEWS
			</div>
		</div>
	</div>
	<div class="container-fluid m_margin_0">
	  <section class="content no-margin">
		<div class="row mar_b40 mar_t40" id="sort_by_main">
			<div class="col-md-12 pad_0">
			<div class="box mar_b5 sorting home_box_n">
				<div class="box-header pad_0">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
					<div class="col-md-5 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 msearch_bg m_hide" style="padding-left:25px;">
						<div class = "row s_width">
						<div class = "col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-6 col-xs-offset-2  ss_width">
						<input class="form-control brg_focus_n" type="text" onkeyup="sreachterm2();" type="text" name="searchterms" id="searchterms1" placeholder="Search for your Events">
						</div>
					<div class = "col-md-2 col-sm-1 col-xs-3 pad_l0" style = "height:34px;width:34px;background-color:#e31c77;border-radius:5px;">
						<img src="<?php echo base_url().'asset/img/search.png'; ?>" alt="search button" style = "height:23px;padding-top:10px;padding-left:10px;">
					</div>
						</div>
					</div>
					<div class="col-md-3  col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 set_styleforsore">
							<div class="row sorts_by_align_forbig">
							<div class="col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-12 col-xs-offset-0 pad_0 centered ">
						<div class="select_style">
							<form class="form-inline">
							<div class="form-group"><nobr>
								<ul class="nav navbar-nav ">
								 <li class="dropdown mpull_right sorts_dropdown" id="change_u"><span class="for-border">
								  <span id="sort_by2">Sort By </span><button class="btn btn-default dropdown-toggle no-border" type="button" data-toggle="dropdown" aria-expanded="true" style="text-align:left;padding:6px 13px;" id="filtername2">
								  Ending Soon</span><div class="arrow_down"><span class="caret"></span></div>
								  </button>
									 <input type="hidden" id="filter_type" value="ends">
								  <ul class="dropdown-menu user_dropdown_t hide_menu own_t_event" role="menu">

			    						<li><a href="#" onClick="filterEvents('ends','1');">Ending Soon</a></li>
			    						<li><a href="#" onClick="filterEvents('lprice','1');">Lowest Price</a></li>



								</ul>
							</div>
							</form>
						</div>
					</div>
				</div>
				</div>
					<div class="col-md-4 col-md-offset-0	col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 msearch_bg mpad_b3 pad_l0 a_width">
						<div class="row sort_by_align_forbig">
							<div class="col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-12 col-xs-offset-0 pad_0 centered ">
						<div class="select_style">
							<form class="form-inline">
							<div class="form-group"><nobr>
								<ul class="nav navbar-nav ">
								 <li class="dropdown mpull_right selects_dropdown" id="change_u"><span class="for-border">
								  <span id="sort_by">Select</span><button class="btn btn-default dropdown-toggle no-border" type="button" data-toggle="dropdown" aria-expanded="true" style="text-align:left;padding:6px 13px;" id="filtername">
								  Location</span><div class="arrow_down"><span class="caret"></span></div>
								  </button>
								  <input type="hidden" id="filter_id" value="Select">
									<input type="hidden" id="filter_countryid" value="Select">
									<input type="hidden" id="filter_countryName" value="Select">
									<input type="hidden" id="filter_cityName" value="Select">
								  <ul class="dropdown-menu user_dropdown_t hide_menu user_dropdown_t_event" role="menu">
											<li><a class="close_selects_select" tabindex="-1" onClick="filterEvents('de','de','de','de','1');" href = "javascript:void('0');">Select</a></li>
									<?php
								 	foreach($countries as $country){?>
										<li class="dropdown-submenu">
	  									<a class="test" tabindex="-1" href="#"><?php echo ucwords($country['co_name']).' ('.$country['co_cnt'].')'; ?>
	  									<span class="caret" style="float:right;"></span></a>
	  								<ul class="dropdown-menu drop_style_event">
											<?php
										 	foreach($cities as $city){
												if($city['ci_country_id']==$country['co_id']){?>
											<li><a class="close_selects" tabindex="-1" onClick="filterEvents('<?php echo $city['ci_id']; ?>','<?php echo $country['co_id']; ?>','<?php echo ucwords($city['ci_name']); ?>','<?php echo ucwords($country['co_name']); ?>','1');" href = "javascript:void('0');"><?php echo ucwords($city['ci_name']).' ('.$city['ci_cnt'].')'; ?></a></li>
	    							<?php }
												}?>
	  									</ul>
										</li>
									<!--<li><a onClick="filterEvents('<?php echo $country['co_name']; ?>','1');" href = "javascript:void('0');"><?php echo $country['co_name']; ?></a></li>-->
									<?php } ?>


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
</div>
<div class = "row">
	<div class = "col-md-10 col-md-offset-1">
			<input type="hidden" id="totcntevents" value="<?php echo $totCntEvents; ?>" />
			<input type="hidden" id="limitpage"  value="9" />
			<input type="hidden" id="offsetpage" value="9" />
			<input type="hidden" id="pageMode" value="events" />
			<div class="row company_list">
				<?php if(sizeof($event_list)>0){ foreach($event_list as $event){?>
					<div class="col-md-4 mar_t80">
						<ul class="products-list product-list-in-box">
							<li class="item center">
							<div class="product_zorder">
							<div class="product-img company_img_width">
								<a href="<?php echo base_url();?>event-full-view/<?php echo $event->ev_id; ?>">
									<?php if (isset($event->ev_picture) && $event->ev_picture != ''){ ?>
										<img src = "<?php echo base_url().'asset/img/events/main/'.$event->ev_picture.'?id ='.$viewTime;  ?>" alt = "<?php echo $event->ev_name; ?>" class = "img-responsive img-circle digital_box_image" >
									<?php }else{ ?>
										<img src = "<?php echo base_url().'images/Felix_the_Cat.jpg'; ?>" alt = "<?php echo $event->ev_name; ?>" class = "img-responsive img-circle digital_box_image">
									<?php } ?>
								</a>
							  </div>
							  <div class="product-info text-left">
							  	<a title="<?php echo $event->ev_name; ?>" href="<?php echo base_url();?>event-full-view/<?php echo $event->ev_id; ?>" class="product-title NoirProSemiBold"><?php echo ucfirst($event->ev_name); ?></a>
								<div style = "padding:5px 0px 0px 5px";>
									<?php
										$event_id = $event->ev_id;
										$eventSpeakersCount = $this->Companies_model->CountSpeakers($event_id);
										$this->load->helper('common');
										$eventDate = ConvertDateFormat(date('m/d/Y',strtotime($event->ev_sd)));
									?>
									<p><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp;Location:<?php echo ' '.ucfirst($event->ev_city);?></p>
									<p><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Date:<?php echo ' '.$eventDate; ?></p>
									<p><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Price:<?php echo ' $ '.$event->ev_price; ?></p>
									<p><i class="fa fa-microphone" aria-hidden="true"></i>&nbsp;Speakers:<?php echo ' '.$eventSpeakersCount; ?></p>
									<p><i class="fa fa-users"></i>&nbsp;Attendees:<?php echo ' '.$event->ev_num; ?></p>
									</div>
									<hr>
									<div class = "text-right">
									<a href="<?php echo base_url().'event-full-view/'.$event->ev_id; ?>" class="btn btn-default" role="button">View More</a>
							        </div>
								</div>
							  </div>
							</li>
						</ul>
					</div>
				<?php } }else{ ?>
				 There are no events available.
				<?php } ?>
				<span id="loadingData"></span>
			</div>
			<!--<div id="loadingHash" class="text-center font_s22 mar_t20 mm_bttom hide"><i class="fa fa-spinner" aria-hidden="true"></i> Loading </div>-->
			<?php if($totCntEvents > 9){?>
			<div id="loadingHash1" class="text-center font_s22 mar_t20 "><a href="javascript:void(0);" onClick="GetMoreEventsLoad();" class="btn btn-custom">&nbsp;&nbsp;&nbsp;LOAD MORE &nbsp;&nbsp;&nbsp;</a></div>
			<span id="m_hide"><br/></span>
			<?php } ?>
			</div>
			<div class="col-md-3 mar_t86 carousel_id mmar_t10 big_hide" id="carousel_id">
				<div class="new_boxes upcoming_box_padding">
					<div class = "text-center">
						<h4>UPCOMING EVENTS</h4>
					</div>
					<div>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

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
				<div class="box overflow_hidden mar_t40 new_boxes no_box_shadow twitter_box_padding text-center">
					<h4>TRENDING</h4>
				     <div class="">
						<div class="scroll twitter_feed">
						<p><a class="twitter-timeline" href="https://twitter.com/Coinenthu">Tweets by Coinenthu</a> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </section>
	  <div class="mar_b120"></div>
	</div>
    </div>
<script>

$(window).resize(function(){
	var y=window.matchMedia("(max-width: 990px)");
	if (y.matches){
		if( $("#news_log").hasClass("register_design") ){
		$(".review_log").removeClass('login_design');
		$(".company_list").fadeIn();
		$("#sort_by_main").fadeIn();
		$(".carousel_id").hide();
		$("#loadingHash1").fadeIn();
	}else if( $("#review_log").hasClass("login_design") ){
		$(".news_log").removeClass('register_design');
		$(".company_list").hide();
		$("#loadingHash1").hide();
		$("#sort_by_main").hide();
	}else{
		$(".news_log").addClass('register_design');
		$(".carousel_id").hide();
	}

		$(".review_log").click(function(){
			$(".review_log").removeClass('login_design');
			$(".news_log").addClass('register_design');
			$(".company_list").fadeIn();
			$("#loadingHash1").fadeIn();
			$("#sort_by_main").fadeIn();
			$(".carousel_id").hide();
		});

		$(".news_log").click(function(){
			$(".news_log").removeClass('register_design');
			$(".review_log").addClass('login_design');
			$(".company_list").hide();
			$("#loadingHash1").hide();
			$("#sort_by_main").hide();
			$(".carousel_id").fadeIn();
		});
	}
	else{
		$(".carousel_id").show();
		$("#loadingHash1").show();
		$(".socila_img").show();
		$(".company_list").show();
		$("#sort_by_main").show();
	}
});

var y=window.matchMedia("(max-width: 990px)");
if (y.matches){
$(".news_log").addClass('register_design');
$(".carousel_id").hide();

$(".review_log").click(function(){
	$(".review_log").removeClass('login_design');
	$(".news_log").addClass('register_design');
	$(".company_list").fadeIn();
	$("#loadingHash1").fadeIn();
	$("#sort_by_main").fadeIn();
	$(".carousel_id").hide();
});

$(".news_log").click(function(){
	$(".news_log").removeClass('register_design');
	$(".review_log").addClass('login_design');
	$(".company_list").hide();
	$("#loadingHash1").hide();
	$("#sort_by_main").hide();
	$(".carousel_id").fadeIn();
});
}




$( "#searchterms" ).keypress(function( event ) {
	if ( event.which == 13 ) {
		sreachterm2();
	}
});
</script>
