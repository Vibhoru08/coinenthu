
					<?php if(sizeof($companyview['reviews'])>0){ foreach($companyview['reviews'] as $review){ ?>
						<div class="box-comment">
							<!-- User image -->
							<?php 
								if($review->u_username!=""){
									$u_username = ucfirst($review->u_username);
								}else if($review->u_firstname!=""){
									$u_username = ucfirst($review->u_firstname);
								}else{
									$u_username = "Guest User";
								}																
							?>
							<?php if($review->u_picture!=""){ ?>
							<img class="img-circle img-sm" src="<?php echo base_url().'asset/img/companies/'.$review->u_uid.'/logos/'.$review->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
							<?php }else if($review->u_social_pic!=""){ ?>
							<img class="img-circle img-sm" src="<?php echo $review->u_social_pic; ?>" alt="<?php echo $u_username; ?>">
							<?php }else{?>
							<img class="img-circle img-sm" src="<?php echo base_url(); ?>images/user5-128x128.jpg" alt="user image">
							<?php } ?>
							<div class="comment-text">
							  <span class="username">
								<?php echo $u_username; ?>
								<span class="text-muted pull-right comment_date">
								<?php 
									$old_date = Date_create($review->re_createdat);
									$new_date = Date_format($old_date, "d/m/Y");
									echo $new_date;
								?>
								</span>
							  </span>
								<div id="stars-existing" class="starrr comment_c">
									<?php $i=1; if($review->re_rating!="") {  
											for($i=1;$i<=5;$i++){ 
											$rating_c ="";
											if($i<=$review->re_rating){ 
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
								</div>
							<?php echo $review->re_decript; ?>
							  <div class="clearfix"></div>
							  <div class="mar_t15">
							  <div class="pull-left">
								<button class="btn btn-default btn_like"> <i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $review->re_likes_cnt; ?></button>
								<button class="btn btn-default btn_dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo $review->re_dislike_cnt; ?></button>								
								<?php if($review->re_reports_cnt==1){ ?>
									<button class="btn btn-default btn_dislike">Reported</button>
								<?php }else{ ?>
									<button class="btn btn-default btn_dislike">Report</button>
								<?php } ?>		
								
								<button class="btn btn-default btn_dislike">Reply</button>
							  </div>
							   <div class="pull-right pad_t10">
								<ul class="social-network social-circle">
									<li>Share </li>
									<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							   </div>
							   </div>
							</div>
							<div class="clearfix"></div>
							<div class="reply_post">
							<?php if(sizeof($companyview['replies'][$review->re_id])>0){ foreach($companyview['replies'][$review->re_id] as $reviewReplay){ 
								
								if($reviewReplay->u_username!=""){
									$u_username = ucfirst($reviewReplay->u_username);
								}else if($reviewReplay->u_firstname!=""){
									$u_username = ucfirst($reviewReplay->u_firstname);
								}else{
									$u_username = "Guest User";
								}																
						
							?>
								<div class="box-comment">
									<!-- User image -->
									<?php if($reviewReplay->u_picture!=""){ ?>
									<img class="img-circle img-sm" src="<?php echo base_url().'asset/img/companies/'.$reviewReplay->u_uid.'/logos/'.$review->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
									<?php }else if($review->u_social_pic!=""){ ?>
									<img class="img-circle img-sm" src="<?php echo $reviewReplay->u_social_pic; ?>" alt="<?php echo $u_username; ?>">
									<?php }else{?>
									<img class="img-circle img-sm" src="<?php echo base_url(); ?>images/user5-128x128.jpg" alt="user image">
									<?php } ?>
									<div class="comment-text">
									  <span class="username">
										<?php echo $u_username; ?>
										<span class="text-muted pull-right comment_date">
										<?php 
											$old_date = Date_create($reviewReplay->crr_createdat);
											$new_date = Date_format($old_date, "d/m/Y");
											echo $new_date;
										?>
										</span>
									  </span>
										<div id="stars-existing" class="starrr comment_c">
											<?php $i=1; if($reviewReplay->crr_rating!="") {  
													for($i=1;$i<=5;$i++){ 
													$rating_c ="";
													if($i<=$reviewReplay->crr_rating){ 
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
										</div>
										<?php echo $reviewReplay->crr_decript; ?>
									  <div class="clearfix"></div>
									  <div class="mar_t15">
									  <div class="pull-left">
										<button class="btn btn-default btn_like"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo $reviewReplay->crr_likes_cnt; ?></button>
										<button class="btn btn-default btn_dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo $reviewReplay->crr_dislike_cnt; ?> </button>
										<?php if($reviewReplay->crr_reports_cnt==1){ ?>
											<button class="btn btn-default btn_dislike">Reported</button>
										<?php }else{ ?>
											<button class="btn btn-default btn_dislike">Report</button>
										<?php } ?>
									  </div>
									   <div class="pull-right pad_t10">
										<ul class="social-network social-circle">
											<li>Share </li>
											<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
										</ul>
									   </div>
									   </div>
									</div>
								</div>
							<?php } } ?>
							</div>
						</div>
					<?php } } ?>
