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
		<hr style="width:5%;border:2px solid #ffff">
				<div class="banner_desc m_hide">
				Let’s not invest blindly, get the correct information on your Digital Assets.
				<div>Search for them.</div>
			</div>
			<div class="row mar_t10">
			<div class="col-xs-10 col-xs-offset-1 msearch_bg big_hide">
				<div class = "col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<input class="form-control brg_focus_n searchhome" type="text" onkeyup="sreachterm();" type="text" name="searchterms" id="searchterms" placeholder="&nbsp;&#xF002; &nbsp;&nbsp;Search for your Digital Assets">
			</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	<div class="row mobile_login NoirProSemiBold big_hide text-center">
		<div class="col-xs-12">
			<div class="col-xs-6 pad_t10 pad_b10 text-center review_log" id="review_log">
				REVIEWS
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
					<div class="col-md-5 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 msearch_bg m_hide">
						<div class = "row s_width">
						<div class = "col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-6 col-xs-offset-2  ss_width">
						<input class="form-control brg_focus_n" type="text" onkeyup="sreachterm();" type="text" name="searchterms" id="searchterms" placeholder="Search for your Digital Assets">
						</div>
					<div class = "col-md-2 col-sm-1 col-xs-3 pad_l0" style = "height:34px;width:34px;background-color:#e31c77;border-radius:10px;">
						<img src="<?php echo base_url().'asset/img/search.png'; ?>" alt="search button" style = "height:23px;padding-top:10px;padding-left:10px;">
					</div>
						</div>
					</div>
					<div class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12 col-xs-offset-0 msearch_bg mpad_b3 pad_l0 a_width">
						<div class="row">
							<div class="col-md-8 col-sm-9 col-sm-offset-1 col-md-offset-0 col-xs-12 col-xs-offset-0 pad_0 centered ">
						<div class="select_style">
							<form class="form-inline">
							<div class="form-group"><nobr>
								<ul class="nav navbar-nav ">
								 <li class="dropdown mpull_right select_dropdown" id="change_u"><span class="for-border">
								  <span id="sort_by">Sort By</span><button class="btn btn-default dropdown-toggle no-border" type="button" data-toggle="dropdown" aria-expanded="true" style="text-align:left;padding:6px 13px;" id="filtername">
								  Most reviewed</span><div class="arrow_down"><span class="caret"></span></div>
								  </button>
								  <input type="hidden" id="filter_id" value="1">
								  <ul class="dropdown-menu user_dropdown_t hide_menu" role="menu" style="width:auto;">
									<?php
								 	foreach($cities as $city){?>  
									<li><a onClick="filterEvents('<?php echo $city->ci_value; ?>','1');" href = "javascript:void('0');"><?php echo $city->ci_name; ?></li>
									<?php } ?> 
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
</div>
<div class = "row">
	<div class = "col-md-10 col-md-offset-1">
			<input type="hidden" id="totcntcompanies" value="<?php echo $totCntDigitals; ?>" />
			<input type="hidden" id="limitpage"  value="9" />
			<input type="hidden" id="offsetpage" value="9" />
			<input type="hidden" id="pageMode" value="digital" />
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
							  	<a title="<?php echo $event->ev_name; ?>" href="<?php echo base_url();?>event-full-view/<?php echo $event->ev_id; ?>" class="product-title"><?php echo ucfirst($event->ev_name); ?></a>
								<div style = "padding:5px 0px 0px 5px";>
									<?php
										$event_id = $event->ev_id;
										$eventSpeakersCount = $this->Companies_model->CountSpeakers($event_id);
										$dateBreak = explode('/',$event->ev_ed);
										$edm = $dateBreak[0];
										$edd = $dateBreak[1];
										$edy = $dateBreak[2];
										if($edm == '01'){
											$edmn = 'Jan';
										}
										elseif($edm == '02'){
											$edmn = 'Feb';		
										}
										elseif($edm == '03'){
											$edmn = 'Mar';
										}
										elseif($edm == '04'){
											$edmn = 'Apr';
										}
										elseif($edm == '05'){
											$edmn = 'May';
										}
										elseif($edm == '06'){
											$edmn = 'Jun';
										}
										elseif($edm == '07'){
											$edmn = 'Jul';
										}
										elseif($edm == '08'){
											$edmn = 'Aug';
										}
										elseif($edm == '09'){
											$edmn = 'Sept';
										}
										elseif($edm == '10'){
											$edmn = 'Oct';
										}
										elseif($edm == '11'){
											$edmn = 'Nov';	 	 
										}
										else{
											$edmn = 'Dec';
										}
										$eventDate = $edd.' '.$edmn.', '.$edy;
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
			<?php if($totCntDigitals > 6){?>
			<div id="loadingHash1" class="text-center font_s22 mar_t20 "><a href="javascript:void(0);" onClick="GetMoreCompaniesLoad();" class="btn btn-custom">&nbsp;&nbsp;&nbsp;LOAD MORE &nbsp;&nbsp;&nbsp;</a></div>
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