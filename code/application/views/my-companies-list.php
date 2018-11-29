<div class="content-wrapper">
	<section class="pos_r slider_grid mtop_30">
		<div class='row'>
			<div class='col-md-12'>
			   <div class="carousel carousel-showmanymoveone slide " id="carousel123">
					<div class="carousel-inner">
					<?php if(sizeof($topda)>0){ foreach($topda as $key=>$value){ 
						$activeDiv = "";
						if($key == 0){
							$activeDiv = "active";
						}
					?>
						<div class="item <?php echo $activeDiv; ?> ">
							<div class="col-xs-12 col-sm-6 col-md-3">
								<ul class="products-list product-list-in-box">		
									<li class="item active">
									<div class="product_zorder">
									  <div class="product-img">
										<img src="<?php echo base_url();?>images/1.png" alt="Product Image">
									  </div>
									  <div class="product-info">
										<a href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id;?>" class="product-title"><?php echo ucfirst($value->cm_name); ?></a>
										<span class="product-description">
										<div id="stars-existing" class="starrr">
											<?php $i=1; if($value->cm_overallrating!="") {  
												for($i=1;$i<=5;$i++){ 
												$rating_c ="";
												if($i<=$value->cm_overallrating){ 
													$rating_c = 'rating_c';
												} 
											?>
												<span class="glyphicon glyphicon-star <?php echo $rating_c; ?>"></span>
											<?php } 
											}else { 
												for($i=1;$i<=5;$i++){ 
											?>
													<span class="glyphicon glyphicon-star"></span>
											<?php } } ?>
											<p><span class=""><?php echo $value->cm_totalviews; ?> reviews</span></p>
										</div>
										  </a>
										</span>
									  </div>
									  </div>
									</li>
								</ul>
							</div>
						</div>
					<?php } } ?>	
					</div>
				</div>
				<a data-slide="prev" href="#media" class="left carousel-control"></a>
				<a data-slide="next" href="#media" class="right carousel-control"></a>
			</div>                          
		</div>
	</section>
	<div  style="border-bottom:1px solid #ddd">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">My Companies List</li>
					</ol>
			</section>
		</div>
	</div>
	<div class="container-fluid m_margin_0">
	  <section class="content no-margin pad_t30">
		<div class="row">
			<div class="col-md-9">
			<div class="box mar_b5 sorting home_box_n">
				<div class="box-header">
				<div class="row">
					<div class="col-md-4 msearch_bg mpad_b10">
						<input class="form-control brg_focus_n" onmouseleave="sreachterm();" type="text" name="searchterms" id="searchterms" placeholder="Search ICOs">
					</div>
					<div class="col-md-8 text-right msearch_bg mpad_b3">
						<div class="select_style">
							<form class="form-inline">							
							<div class="form-group">						
								<ul class="nav navbar-nav">
								 <li class="dropdown mpull_right select_dropdown" id="change_u">
								  Sort By &nbsp; <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true" style="background:#fff;width:200px;text-align:left;padding:6px 19px;" id="filtername">
								   Highest rating <div class="arrow_down"><span class="caret"></span></div>
								  </button>
								  <input type="hidden" id="filter_id" value="1">
								  <ul class="dropdown-menu user_dropdown_t" role="menu">
									<li><a onClick="filterCompanies('rating');" href="javascript:void('0');">Highest rating</a></li>
									<li><a onClick="filterCompanies('viewed');" href="javascript:void('0');">Most reviewed</a></li>
									<li><a onClick="filterCompanies('mch');" href="javascript:void('0');">Market cap (High to Low)</a></li>
									<li><a onClick="filterCompanies('mcl');" href="javascript:void('0');">Market cap (Low to High)</a></li>
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
			<input type="hidden" id="limitpage"  value="1" />
			<input type="hidden" id="offsetpage" value="1" />
			<input type="hidden" id="pageMode" value="digital" />
			<div class="row company_list">
			<?php if(sizeof($icoTrackers)>0){ foreach($icoTrackers as $key=>$value){?>
				<div class="col-md-4">
					<ul class="products-list product-list-in-box">
						<li class="item center">
						<div class="product_zorder">
						  <div class="product-img">
							<a href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id;?>"><img src="<?php echo base_url();?>images/clogo2.png" alt="Product Image" class="img-responsive"></a>
						  </div>
						  <div class="product-info">
							<a href="<?php echo base_url();?>company-full-view/<?php echo $value->cm_unique_id;?>" class="product-title"><?php echo $value->cm_name; ?></a>
							<span class="product-description">
							<div id="stars-existing" class="starrr">
								<?php $i=1; if($value->cm_overallrating!="") {  
									for($i=1;$i<=5;$i++){ 
									$rating_c ="";
									if($i<=$value->cm_overallrating){ 
										$rating_c = 'rating_c';
									} 
								?>
									<span class="glyphicon glyphicon-star <?php echo $rating_c; ?>"></span>
								<?php } 
								}else { 
									for($i=1;$i<=5;$i++){ 
								?>
										<span class="glyphicon glyphicon-star"></span>
								<?php } } ?>
								<p><span class=""><?php echo $value->cm_totalviews; ?> reviews</span></p>
							</div>							 
							</span>
						  </div>
						  </div>
						</li>
					</ul>
				</div>
			<?php } } ?>
				<span id="loadingData"></span>
			</div>
			<div class="text-center font_s22 mar_t20 mm_bttom hide"><i class="fa fa-spinner" aria-hidden="true"></i> Loading </div>
			</div>
			<div class="col-md-3">
				<div class="box overflow_hidden">
					<div class="box-header with-border header_bg">
						<h3 class="box-title">live products</h3>
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
							  <img src="<?php echo base_url();?>images/sm_slide1.png" style="width:100%">
							  </div>
							</div>
							<div class="item">
								<div class="text-center">
							  <img src="<?php echo base_url();?>images/sm_slide1.png" style="width:100%">
							</div>
							</div>
							<div class="item">
								<div class="text-center">
							  <img src="<?php echo base_url();?>images/sm_slide1.png" style="width:100%">
							</div>
							</div>
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
						<h3 class="box-title">Trollbox</h3>
					</div>
					<div class="box-body">
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> 
					</div>
				</div>
			</div>
		</div>
	  </section>
	  <div class="mar_b40"></div>
	</div>
    </div>
<script>
   (function(){
		$('#carousel123').carousel({ interval: 2000});
		$('.carousel-showmanymoveone .item').each(function(){
			var itemToClone = $(this);
			for (var i=1;i<4;i++) {
				itemToClone = itemToClone.next();
				if (!itemToClone.length) {
					itemToClone = $(this).siblings(':first');
				}
				itemToClone.children(':first-child').clone().addClass("cloneditem-"+(i)).appendTo($(this));
			}
		});
	}());	
</script>
