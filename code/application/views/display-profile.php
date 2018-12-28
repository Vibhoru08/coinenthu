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
	        <div class="text-left col-md-offset-1 col-md-3 pad_0">
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
        <div class = "row mar_t110">
                <div class ="col-md-8 col-md-offset-1">
					<?php if(sizeof($reviews) > 0){foreach($reviews as $cr=>$review){?>
					<div class = "row new_boxes upcoming_box_padding">
						<div class = "col-md-2 text-center">
							<div>
							<?php
							if($review->cm_picture!=""){
								  if($review->cm_ctid == 1){
									 if($review->cm_picture!="" && substr( $review->cm_picture, 0, 4 ) === "digi"){?>
										<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$review->cm_picture?>" alt="Coinenthu" class="img-responsive profile_box_image">
									 <?php
									 }else if(substr( $review->cm_picture, 0, 3 ) === "ico"){?>
										<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$review->cm_picture; ?>" alt="Coinenthu" class="img-responsive profile_box_image">
									 <?php
									 }else if($review->cm_picture!=""){
					              $srcc = base_url().'asset/img/companies/digitalasset/'.$review->cm_picture;
										if(@getimagesize($srcc)){?>
											<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$review->cm_picture; ?>" alt="Coinenthu" class="img-responsive profile_box_image">

									<?php
								}else{
									?>
											<img src="<?php echo base_url().'images/Felix_the_Cat.jpg'; ?>" alt="Coinenthu" class="img-responsive profile_box_image">
									<?php
										}
									 }else{
										 ?>
										<img src="<?php echo base_url().'images/Felix_the_Cat.jpg'; ?>" alt="Coinenthu" class="img-responsive profile_box_image">
                                    <?php
									}
								}else if($review->cm_ctid == 2){
									if($review->cm_picture!=""){
										$srcc = base_url().'asset/img/companies/icotracker/'.$review->cm_picture;
										if(@getimagesize($srcc)){?>
											<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$review->cm_picture;?>" alt="Coinenthu" class="img-responsive profile_box_image">
										<?php
										}else{
										?>
											<img src="<?php echo base_url().'images/Felix_the_Cat.jpg';?>" alt="Coinenthu" class="img-responsive profile_box_image">
										<?php
										}
									}else{
										?>
										<img src="<?php echo base_url().'images/Felix_the_Cat.jpg'; ?>" alt="Coinenthu" class="img-responsive profile_box_image">
									<?php
									}
								}
							  }else{
								  ?>
								<img src="<?php echo base_url().'images/Felix_the_Cat.jpg';?>" alt="Coinenthu" class="img-responsive profile_box_image">
							<?php
							}?>
							</div>
                            <div class="time_stamp">
							<?php
									$old_date = timeago($review->re_createdat);
									echo $old_date;
							?>
							</div>
							<div>
								You Rated<br>
								<?php echo $review->re_rating; ?>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>
							</div>
						</div>
						<div class = "col-md-10">
							<div>
							<span style="float:right;">
								Delete
							</span>
								<h4><?php echo $review->cm_name; ?></h4><input id="input-6" name="input-6" class="rating rating-loading" value="<?php echo $review->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">

							</div>
							<hr>
							<div>
								<p><?php echo $review->re_decript; ?></p>
							</div>
							<hr>
							<div>
							<?php
							if($review->re_likes_cnt!="" && $review->re_likes_cnt!=0){
										$re_likes_cnt = $review->re_likes_cnt;
									}else{
										$re_likes_cnt = 0;
									}
									if($review->re_dislike_cnt!="" && $review->re_dislike_cnt!=0){
										$re_dislike_cnt = $review->re_dislike_cnt;
									}else{
										$re_dislike_cnt = 0;
									}
							?>
							<span><?php echo $re_likes_cnt ?>&nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></span><span style="margin-left:20px;"><?php echo $re_dislike_cnt ?>&nbsp;<i class="fa fa-thumbs-down" aria-hidden="true"></i></span><span style="float:right;"><?php echo sizeof($replies[$review->re_id]);?>&nbsp;<i class ="fa fa-reply" aria-hidden="true"></i></span>
							</div>
							<?php if(sizeof($replies[$review->re_id] > 0)){foreach($replies[$review->re_id] as $crr=>$reply){ ?>
							<div class = "row mar_t20">
									<div class = "col-md-2">
									<?php if($reply->u_picture!=""){ ?>
									<img class="img-circle reply-image" src="<?php echo base_url().'asset/img/users/'.$reply->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
									<?php }else if($reply->u_social_pic!=""){ ?>
									<img class="img-circle reply-image" src="<?php echo $reply->u_social_pic; ?>" alt="<?php echo $u_username; ?>">
									<?php }else{?>
									<img class="img-circle reply-image" src="<?php echo base_url(); ?>asset/img/alt.jpg" alt="user image">
									<?php } ?>
									</div>
									<div class = "col-md-10">
									<p>
									<span class="time_stamp" style="float:right;"><?php

										 $old_date = timeago($reply->crr_createdat);
										 echo $old_date;

									?></span>
									<?php
										if($reply->u_username!=""){
											$u_username = ucfirst($reply->u_username);
										}else if($reply->u_firstname!=""){
											$u_username = ucfirst($reply->u_firstname);
										}else{
											$u_username = "Guest User";
										}
										echo $u_username;
									?><br style="margin-bottom:0px;">
									<span style= "font-size:11px;"><?php echo $reply->u_about; ?></span>
									</p>
									<p>
									<?php echo $reply->crr_decript; ?>
									</p>
									<p>
									<?php
									if($reviewReplay->crr_likes_cnt!="" && $reviewReplay->crr_likes_cnt!=0){
												$crr_likes_cnt = $reviewReplay->crr_likes_cnt;
											}else{
												$crr_likes_cnt = 0;
											}
											if($reviewReplay->crr_dislike_cnt!="" && $reviewReplay->crr_dislike_cnt!=0){
												$crr_dislike_cnt = $reviewReplay->crr_dislike_cnt;
											}else{
												$crr_dislike_cnt = 0;
											}
									?>
										<span><?php echo $crr_likes_cnt ?>&nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></span><span style="margin-left:15px;"><?php echo $crr_dislike_cnt; ?>&nbsp;<i class="fa fa-thumbs-down" aria-hidden="true"></i></span>
										<span style="float:right;font-size:13px;"><?php
											if($reply->crr_uid == $userinfo->u_uid){
												echo "Delete";
											}
										?></span>
									</p>
									</div>
							</div>
							<?php
							}}
							?>
						</div>
					</div>
					<p style="float:right;padding:5px 15px 0px 0px;">
                    <a href = "<?php echo base_url().'company-full-view/'.str_replace(" ","_",$review->cm_name); ?>" title = "<?php echo $review->cm_name; ?>">Go To Asset<i class="fa fa-arrow-right mar_l10" aria-hidden="true"></i></a>
					</p>
					<div class="mar_b80"></div>
					<?php
					}}
					?>
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
