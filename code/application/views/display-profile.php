<div class = "content">
    <section class = "content">
        <div class = "container-fluid banner_margin linear_color">
            <div class="row mmar_t40 mmar_b10 mar_t140 mar_b10">
					<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 text-center banner_head">
						MY PROFILE
						<hr style="width:5%;border:2px solid #ffff">
                        <div class = "mar_t50 text-left row">
                            <div class = "col-md-2 mar_l120">
                            <span style = "font-size:15px;"><?php echo ucfirst($userinfo->u_about); ?></span>
                            </div>
                        </div>
					</div>
			</div>
        </div>
        <div class="row">
	        <div class="text-right col-md-3">
            <?php
                if(isset($userinfo->u_picture) && $userinfo->u_picture!=""){
		            $imagepath = base_url().'asset/img/users/'.$userinfo->u_picture.'?id='.$viewTime;
		        }else if(isset($userinfo->u_social_pic) && $userinfo->u_social_pic!=""){
		            $imagepath = $userinfo->u_social_pic;
		        }else{
			        $imagepath = base_url().'asset/img/alt.jpg';
		        }
		    ?>
		        <img class = "img-rounded profile-image" src="<?php echo $imagepath; ?>" />
            </div>
            <div class = "col-md-2">
                <h2>Hi <?php echo ucfirst($userinfo->u_firstname); ?>!</h2>
            </div>
            <div class = "text-center col-md-2 mar_l70">
                <?php echo $nor; ?><br/>
                <i class="fa fa-commenting" aria-hidden="true"></i>
                <?php
                if ($nor == 1){
                    echo "Review";
                }
                else{
                    echo "Reviews";
                }
                ?>
            </div>
            <div class = "text-center col-md-2">
                <?php echo $nore; ?><br/>
                <i class="fa fa-reply" aria-hidden="true"></i>
                <?php
                if ($nore == 1){
                    echo "Reply";
                }
                else{
                    echo "Replies";
                }
                ?>
            </div>
            <div class = "text-center col-md-2">
                <?php echo $nou; ?><br/>
                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                <?php
                if ($nou == 1){
                    echo "Upvote";
                }
                else{
                    echo "Upvotes";
                }
                ?>
            </div>
        </div>
        <div class = "row">
                <div class ="col-md-8">
                </div>
                <div class = "col-md-3">
                <div class="new_boxes upcoming_box_padding">
					<div class = "text-center">
						<h4>UPCOMING EVENTS</h4>
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
    </section>
</div>
