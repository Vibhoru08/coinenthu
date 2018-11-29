<?php // $this->ajax_pagination->initialize($config); ?>
<div class="box-comments">
					<?php if(sizeof($reviewslist)>0){ foreach($reviewslist as $cr=>$review){ 
					// echo '<pre>';print_r($companyview['reviews']);
					?>
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
							<img class="img-circle img-sm" src="<?php echo base_url().'asset/img/users/'.$review->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
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
									if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){ 
										$uid = $_SESSION['user_id'];
									}else{
										$uid = "";
									}
								?>
								<?php 
									if($uid!=""){
										if($uid == $review->re_uid){
								?>
								<a href="<?php echo base_url();?>edit-review/<?php echo $review->re_id; ?>"><span id="review_edit_id_<?php echo $cr; ?>">Edit Review</span></a>
								<?php } } ?> &nbsp;&nbsp;&nbsp;
								<?php 
									$old_date = Date_create($review->re_createdat);
									$new_date = Date_format($old_date, "d/m/Y");
									echo $new_date;
								
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
								</span>
							  </span>
							  
								<div>
									<input id="input-6" name="input-6" class="rating rating-loading" value="<?php echo $review->re_rating; ?>" data-min="0" data-max="5" data-step="1" data-size="xss" data-readonly="true" style="font-size:16px">
								</div>	
							<?php
							$string = strip_tags($review->re_decript);
							if (strlen($string) > 150) {

								$stringCut = substr($string, 0, 150);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="cursor:pointer;color:#1546a5" href="javascript:void(0);" onClick="readMoreSpan('.$review->re_id.');">More <i class="fa fa-angle-double-right font_s16" aria-hidden="true"></i></a>'; 
							}
							
							?>
							<span id="spanLess_<?php echo $review->re_id; ?>" style="overflow-wrap: break-word;"><?php echo $string; ?></span>
							<?php // echo $review->re_decript; ?><span id="expandSpan_<?php echo $review->re_id; ?>" style="display:none;overflow-wrap: break-word;" > <?php echo nl2br($review->re_decript).' '.'<a href="javascript:void(0);" onClick="readLessSpan('.$review->re_id.');"><i class="fa fa-angle-double-left font_s16" aria-hidden="true"></i> Less </a>'; ?></span>
							  <div class="clearfix"></div>
							  <div class="mar_t15">
							  <div class="pull-left">
								<button id="btn_like_<?php echo $review->re_id; ?>" onClick="reviewLikeDisLike('<?php echo $re_likes_cnt; ?>','<?php echo $review->re_id; ?>','like','review','<?php echo $cr; ?>');" class="btn btn-default btn_like"> <i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $re_likes_cnt; ?></button>
								<button id="btn_dislike_<?php echo $review->re_id; ?>" onClick="reviewLikeDisLikee('<?php echo $re_dislike_cnt; ?>','<?php echo $review->re_id; ?>','dislike','review','<?php echo $cr; ?>');" class="btn btn-default btn_dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo $re_dislike_cnt; ?></button>	
								<?php 
									$reportedStatus = checkUserReport($uid,$review->re_id);
								?>
								<?php if($reportedStatus==1){ ?>
								<span id="reviewReportId_<?php echo $review->re_id; ?>"><button onclick="reviewReportMethod('<?php echo $review->re_id; ?>','reviewpreport','alreadyU');" class="btn btn-default btn_dislike">Reported</button></span>
								<?php }else{ ?>								
								<span id="reviewReportId_<?php echo $review->re_id; ?>"><button onclick="reviewReportMethod('<?php echo $review->re_id; ?>','reviewpreport','');" class="btn btn-default btn_dislike">Report</button></span>							
								<?php } ?>		
								
								<button id="reply_dislike_pop" onClick="replyMessage('<?php echo $review->re_id; ?>');" class="btn btn-default btn_dislike">Reply</button>
							  </div>
							  <div class="pull-right pad_t10">
							  <?php 
								if(sizeof($companyview['replies'][$review->re_id])>0){
									// echo '<pre>';print_r($companyview['replies'][$review->re_id]);
									?>
								<div id="view_replies_id_<?php echo $review->re_id; ?>">
									<a href="javascript:void(0);" onClick="repliesFullView(<?php echo $review->re_id; ?>);">
								<span id="repliesCntt_<?php echo $review->re_id; ?>"><?php 
								echo (sizeof($companyview['replies'][$review->re_id])); ?></span> &nbsp;Replie(s)</a>
								</div>
								<?php }else{ ?>
								<div id="view_replies_id_<?php echo $review->re_id; ?>" style="display:none;">
									<a href="javascript:void(0);" onClick="repliesFullView(<?php echo $review->re_id; ?>);"><span id="repliesCntt_<?php echo $review->re_id; ?>"><?php 
									echo (sizeof($companyview['replies'][$review->re_id])); ?> </span>&nbsp;Replie(s)</a>
								</div>
							<?php } ?>
							  </div>
							   
							   </div>
							</div>
							<div class="clearfix"></div>
							
							<div class="" id="repliesDiv_<?php echo $review->re_id; ?>" style="display:none;">
							<?php 
							if(sizeof($companyview['replies'][$review->re_id])>0){?>
							<div class="reply_post">
							<?php
							foreach($companyview['replies'][$review->re_id] as $crr=>$reviewReplay){ 
								
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
									<img class="img-circle img-sm" src="<?php echo base_url().'asset/img/users/'.$reviewReplay->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
									<?php }else if($reviewReplay->u_social_pic!=""){ ?>
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
										</span>
									  </span>
									  <?php
									  
										$stringReply = strip_tags($reviewReplay->crr_decript);
										if (strlen($stringReply) > 150) {

											$stringCut = substr($stringReply, 0, 150);
											$stringReply = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="cursor:pointer;color:#1546a5" href="javascript:void(0);" onClick="readReplyMoreSpan('.$reviewReplay->crr_id.');">More <i class="fa fa-angle-double-right font_s16" aria-hidden="true"></i></a>'; 
										}
									?>
									<span id="replyspanLess_<?php echo $reviewReplay->crr_id; ?>" style="overflow-wrap: break-word;"><?php echo $stringReply; ?></span>
									<?php // echo $review->re_decript; ?><span id="replyexpandSpan_<?php echo $reviewReplay->crr_id; ?>" style="display:none;overflow-wrap: break-word;" > <?php echo nl2br($review->re_decript).' '.'<a href="javascript:void(0);" onClick="readReplyLessSpan('.$reviewReplay->crr_id.');"><i class="fa fa-angle-double-left font_s16" aria-hidden="true"></i> Less </a>'; ?></span>
							
										<!--<span style="overflow-wrap: break-word;"><?php // echo $reviewReplay->crr_decript; ?></span>-->
									  <div class="clearfix"></div>
									  <div class="mar_t15">
									  <div class="pull-left">
										<button id="reply_btn_like_<?php echo $reviewReplay->crr_id; ?>" class="btn btn-default btn_like" onClick="reviewLikeDisLike('<?php echo $crr_likes_cnt; ?>','<?php echo $reviewReplay->crr_id; ?>','like','replies','<?php echo $crr; ?>');"> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo $crr_likes_cnt; ?></button>
										<button id="reply_btn_dislike_<?php echo $reviewReplay->crr_id; ?>" class="btn btn-default btn_dislike" onClick="reviewLikeDisLikee('<?php echo $crr_dislike_cnt; ?>','<?php echo $reviewReplay->crr_id; ?>','dislike','replies','<?php echo $crr; ?>');"><i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo $crr_dislike_cnt; ?> </button>
										<?php 
											$reportedReplyStatus = checkUserReplyReport($uid,$reviewReplay->crr_id);
										?>
										<?php if($reportedReplyStatus==1){ ?>
											<span id="replyReportId_<?php echo $reviewReplay->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reviewReplay->crr_id; ?>','replypreport','alreadyReported');" class="btn btn-default btn_dislike">Reported</button></span>
										<?php }else{ ?>
											<span id="replyReportId_<?php echo $reviewReplay->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reviewReplay->crr_id; ?>','replypreport','');" class="btn btn-default btn_dislike">Report</button></span>
										<?php } ?>
									  </div>
										<?php 
											if($uid!=""){
												if($uid == $reviewReplay->crr_uid){
										?>
										<button id="reply_reply_pop" onClick="replyReplyMessage('<?php echo $reviewReplay->crr_id; ?>','<?php echo $reviewReplay->crr_reid; ?>');" class="btn btn-default btn_dislike">Edit Reply</button>
										<?php } } ?>
									   
									   </div>
									</div>
								</div>
								
							<?php } 
							
														
							 /* else{?>
								<!--<span>There are no replies for this review.</span>-->
							<?php }  */?>
							
							</div>
							<?php } ?>
							</div>
						</div>
					<?php } }else{ ?>
					<span>There are no reviews for this company.</span>
					<?php } ?>
					</div>
					<nav aria-label="Page navigation example" style="text-align:center">
					
						<?php // echo $this->pagination->create_links(); ?>
		<ul class="pagination">
		<?php
		$pageee = $order_by;
		for($i=1;$i<=$total;$i++)
		{
		if($i == $page ) {
		?> 
			<li class='active'><a href='javascript:void(0);'  ><?php echo $i; ?></a></li>
		<?php
		}
		else {?> 
			<li><a href='javascript:void(0);' onClick='reviewFilter("<?php echo $order_by; ?>",<?php echo $i; ?>);' ><?php echo $i; ?></a></li>
		<?php
		} ?>
		<?php
		}
		?>
		
	
	</ul>			
					
	</nav>
					