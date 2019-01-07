<div class = "content">
    <section class = "content">
        <div class = "container-fluid banner_margin linear_color mob_height_banner">
            <div class="row mmar_t40 mmar_b10 mar_t80 mar_b10 smar_b50">
					<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 text-center banner_head">
						MY PROFILE
						<!--<hr style="width:5%;border:2px solid #ffff">-->
                        <div class = "mar_t50 text-left row">
                          <div class = "col-md-9 col-xs-12 mar_l40 profile_desx m_hide pad_0">
                              <h2 class="mar_0">Hi <?php echo ucfirst($userinfo->u_firstname); ?>!</h2>
                          </div>
                            <div class = "col-md-5 mar_l40 pad_0 m_hide">
                            <span style = "font-size:15px;"><?php echo ucfirst($userinfo->u_about); ?></span>
                            </div>
                        </div>
					</div>
			</div>
        </div>
        <input type="hidden" id="hid_sessionid" name="hid_sessionid" value="<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){ echo $_SESSION['user_id']; }else{}?>">
        <input type="hidden" id="hid_filter" name="hid_filter" value="1">
        <div class="row">
	        <div class="text-left col-md-offset-1 col-md-2 col-xs-12 profile_image pad_0">
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
            <div class = "col-md-2 col-xs-12 profile_desx pad_0 big_hide">
                <h2>Hi <?php echo ucfirst($userinfo->u_firstname); ?>!</h2>
            </div>
            <div class = "col-md-5 col-xs-12 profile_desx pad_0 big_hide">
            <span style = "font-size:15px;"><?php echo ucfirst($userinfo->u_about); ?></span>
            </div>
          <br>
        </div>
        <div class="row like_upvote">
          <div class = "text-center col-xs-4">
              <span id="no_rev"><?php echo $nor; ?></span>&nbsp;
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
          <div class = "text-center col-xs-4">
              <span id = "nor"><?php echo $nore; ?></span>&nbsp;
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
          <div class = "text-center col-xs-4">
              <?php echo $nou; ?>&nbsp;
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
        <div class = "row mar_t40">
                <div class ="col-md-8 col-md-offset-1">
					<?php if(sizeof($reviews) > 0){foreach($reviews as $cr=>$review){?>
					<div class = "row new_boxes upcoming_box_padding" id="review_<?php echo $review->re_id; ?>">
						<div class = "col-md-2 text-center">
							<div>
                <input type="hidden" id="hid_cmid<?php echo $review->re_id; ?>" name="hid_cmid" value="<?php echo $review->re_cmid; ?>">
                <input type="hidden" id="hid_cmname" name="hid_cmname" value="<?php echo $review->cm_name; ?>">
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
                <div class="dropdown" style="float:right;">
                  <button class="btn btn-dis dropdown-toggle" type="button" data-toggle="dropdown">
                  <span class="fa fa-ellipsis-h"></span></button>
                  <ul class="dropdown-menu display-dropdown">
                    <li><a href="<?php echo base_url();?>edit-review/<?php echo $review->re_id; ?>">Edit</a></li>
                    <li><a  onclick="deleteComment('<?php echo $review->re_id; ?>');">
      								       Delete
      							</a></li>
                  </ul>
                </div>

								<h4><a href = "<?php echo base_url().'company-full-view/'.str_replace(" ","_",$review->cm_name); ?>" title = "<?php echo $review->cm_name; ?>"><?php echo $review->cm_name; ?></a></h4><input id="input-6" name="input-6" class="rating rating-loading" value="<?php echo $review->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">

							</div>
							<hr>
							<div>
								<p class="<?php echo $review->re_id; ?>" id="<?php echo $review->re_id; ?>"><?php echo $review->re_decript; ?></p>
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
              <div id="repliesDiv_<?php echo $review->re_id; ?>">
							<?php if(sizeof($replies[$review->re_id] > 0)){foreach($replies[$review->re_id] as $crr=>$reply){ ?>

              <div class = "row mar_t20" id="individualReplies_<?php echo $reply->crr_id; ?>">
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
									<p id="replyreview_<?php echo $reply->crr_id; ?>">
									<?php echo strip_tags($reply->crr_decript); ?>
									</p>
                  <span id="successMessage_<?php echo $reviewReplay->crr_id; ?>" style="display:none;"></span>
                  <span id="r_char_cnt<?php echo $reply->crr_id; ?>" style="display:none;"> <span id="review_char_count<?php echo $reply->crr_id; ?>"></span>&nbsp;&nbsp;character(s) left</span>
               <div class = "row" style="padding-bottom:5px">
                 <?php
                 	$uid = $_SESSION['user_id'];
                     if(isset($_SESSION['user_id'])){
                       if($uid == $reply->crr_uid){
                 ?>
                 <label  id="save<?php echo $reply->crr_id; ?>" for="submit-form<?php echo $reply->crr_id; ?>" tabindex="0" class="btn btn-default btn_dislike_new btn-small" style="display:none;" value="">Save</label>
                 <!--<button id="save<?php //echo $reply->crr_id; ?>" type="submit" class="btn btn-default btn_dislike btn-small" style="display:none;" value="">Save</button> -->
                 <button id="reply_reply_pop<?php echo $reply->crr_id; ?>" onClick="replyReplyMessage('<?php echo $reply->crr_id; ?>','<?php echo $reply->crr_reid; ?>');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-pencil-square" aria-hidden="true"></i><span class="r-report-button-text">Edit</span></button>
                 <?php } else{ ?>
                   <button id="reply_btn_like_<?php echo $reply->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small" onClick="reviewLikeDisLike('<?php echo $crr_likes_cnt; ?>','<?php echo $reply->crr_id; ?>','like','replies','<?php echo $crr; ?>');"> <i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="r-like-button-text">Like</span>
                 </button>
                 <button id="reply_btn_dislike_new_<?php echo $reply->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small" onClick="reviewLikeDisLikee('<?php echo $crr_dislike_cnt; ?>','<?php echo $reply->crr_id; ?>','dislike','replies','<?php echo $crr; ?>');"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i><span class="r-dislike-button-text">Dislike</span>
                 </button>
                 <?php
                 $reportedReplyStatus = checkUserReplyReport($uid,$reply->crr_id);
                 ?>
                 <?php if($reportedReplyStatus==1){ ?>
                 <span id="replyReportId_<?php echo $reply->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reply->crr_id; ?>','replypreport','alreadyReported');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Reported</span></button></span>
                 <?php }else{ ?>
                 <span id="replyReportId_<?php echo $reply->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reply->crr_id; ?>','replypreport','');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Report</span></button></span>
                 <?php } ?>
                 <?php }}else{ ?>
                 <button id="reply_btn_like_<?php echo $reply->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small" onClick="reviewLikeDisLike('<?php echo $crr_likes_cnt; ?>','<?php echo $reply->crr_id; ?>','like','replies','<?php echo $crr; ?>');"> <i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="r-like-button-text">Like</span>
                 </button>
                 <button id="reply_btn_dislike_<?php echo $reply->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small" onClick="reviewLikeDisLikee('<?php echo $crr_dislike_cnt; ?>','<?php echo $reply->crr_id; ?>','dislike','replies','<?php echo $crr; ?>');"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i><span class="r-dislike-button-text">Dislike</span>
                 </button>
                 <?php
                 $reportedReplyStatus = checkUserReplyReport($uid,$reply->crr_id);
                 ?>
                 <?php if($reportedReplyStatus==1){ ?>
                 <span id="replyReportId_<?php echo $reply->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reply->crr_id; ?>','replypreport','alreadyReported');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Reported</span></button></span>
                 <?php }else{ ?>
                 <span id="replyReportId_<?php echo $reply->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reply->crr_id; ?>','replypreport','');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Report</span></button></span>
                 <?php }} ?>
                 <?php
									if($reply->crr_likes_cnt!="" && $reply->crr_likes_cnt!=0){
												$crr_likes_cnt = $reply->crr_likes_cnt;
											}else{
												$crr_likes_cnt = 0;
											}
											if($reply->crr_dislike_cnt!="" && $reply->crr_dislike_cnt!=0){
												$crr_dislike_cnt = $reply->crr_dislike_cnt;
											}else{
												$crr_dislike_cnt = 0;
											}
									?>
                 <span class = "pull-right" style="margin-top:7px;"><?php echo $crr_likes_cnt; ?>
                 <?php if ($crr_likes_cnt == 1){
                   echo " Like";
                 } else {
                   echo " Likes";
                 }?>
                 </span>
                 <span class="btn btn-default btn_dislike_new btn-small prof_reply_delte" id="prof_reply_delete" onclick="showDelete(<?php echo $reply->crr_id; ?>);">
                   <!--	<span><?php echo $crr_likes_cnt ?>&nbsp;<i class="fa fa-thumbs-up" aria-hidden="true"></i></span><span style="margin-left:15px;"><?php echo $crr_dislike_cnt; ?>&nbsp;<i class="fa fa-thumbs-down" aria-hidden="true"></i></span>
                   <span style="float:right;font-size:13px;">--><?php
                     if($reply->crr_uid == $userinfo->u_uid){
                       echo "<i class='fa fa-trash' aria-hidden='true'></i><span class='r-report-button-text'>Delete</span>";
                     }
                   ?>
                 </span>
                 <span id="reply_delte_confirm<?php echo $reply->crr_id; ?>" style="padding:4px 9px;font-size:12.5px;border:1px solid transparent;display:none;">Are you sure ?
                   <a style="color:red;cursor:pointer;" onclick="reply_delete(<?php echo $reply->crr_id; ?>);">Yes</a>
                   <a id="no_delete<?php echo $reply->crr_id; ?>" onclick="hideDelete(<?php echo $reply->crr_id; ?>);" style="color:green;cursor:pointer;">No</a>
                 </span>
               </div>

									</div>
							</div>
							<?php
							}}
							?>
            </div>
            <div class="row mar_t30" id="replypopup_m" style="">
									 <form  onSubmit="wirteareplySubmit(<?php echo $review->re_id; ?>);"  class="form-horizontal replypopup" id="replypopup<?php echo $review->re_id; ?>" name="replypopup" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" >
									 <div class="col-xs-10">
										 <input type="hidden" id="crr_reid<?php echo $review->re_id; ?>" name="crr_reid" value="">
										 <div class="form-group">
											 <label for="inputEmail3" class="col-xs-2 no_padding_label control-label validate_c"><?php
                if(isset($userinfo->u_picture) && $userinfo->u_picture!=""){
		            $imagepath = base_url().'asset/img/users/'.$userinfo->u_picture.'?id='.$viewTime;
		        }else if(isset($userinfo->u_social_pic) && $userinfo->u_social_pic!=""){
		            $imagepath = $userinfo->u_social_pic;
		        }else{
			        $imagepath = base_url().'asset/img/alt.jpg';
		        }
		    ?>
		        <img class = "img-circle reply-image" src="<?php echo $imagepath; ?>" /></label>
											 <div class="col-xs-10" >
												 <textarea class="form-control crr_decript" rows="1" id="crr_decript<?php echo $review->re_id; ?>" name="crr_decript" required data-fv-notempty-message="Required" placeholder="Reply" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Reply should have less than 1000 characters" onkeyup="countCharcter2(<?php echo $review->re_id; ?>);"></textarea>
												 <span id="r_char_cnt<?php echo $review->re_id; ?>" style="display:none;"> <span id="review_char_count<?php echo $review->re_id; ?>"></span>&nbsp;&nbsp;character(s) left</span>
												 <span id="errorNotes<?php echo $review->re_id; ?>" style="color:#a94442;"></span>
											 </div>
										 </div>
									 </div>
									 <div class="col-xs-2 pad_0">
										 <span id="successmessage<?php echo $review->re_id; ?>" style="color:green"></span>
										 <span class="vwdTitleError" style="color:#a94442;"></span>
											 <span id="tp7<?php echo $review->re_id; ?>" style="display:none;">
											 <svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
										 </span>
										 <button type="submit" class="btn btn-primary btn-custom btn-sm" style="width:100%;">Save</button>
                   </div>
									 </form>
								 </div>
							</div>
					</div>
					<div class="mar_b80"></div>
					<?php
					}}else{
					?>
          <div class = "pad_l25 pad_t30">
          <div class = "row">
          <span><h2>You have not written<br> any reviews yet.</h2></span>
          <hr align="left" style="width:10%;border:4px solid black;">
          </div>
          <div class = "row">
          <span>Read about <strong>DIGITAL ASSETS</strong>,<br>share your experience and help others make the right decision while investing.</span>
          </div>
          <div class = "row mar_t20">
          <a href="<?php echo base_url().'digital-assets';?>" class="btn btn-primary" role="button">Digital Assets</a>
          <a href="<?php echo base_url().'ico-tracker';?>" class="btn btn-primary" role="button">ICOs</a>
          </div>
          </div>
          <?php } ?>
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
<script>
$(document).ready(function() {



});
function reply_delete(id){
  if($("#hid_sessionid").val()!=""){

    $.ajax({
    type 		: "POST",
    url			: baseUrl+'Company/deleteReply?expireTime='+time,
    cache       : false,
    data        : {reply_id:id},
    dataType	: "json",
    success: function(data){
      if(data.output=='success')
      {
  	 $("#individualReplies_"+id).fadeOut();
  	  $("#nor").html(data.no_of_replies);

      }
      else if(data.output=='fail'){
        setTimeout(function(){
          $("#common_heading").html('Warning Message');
          $("#common_message").html('Login required');
          $('#common_modal_pop').modal('show');
                    }, 2000);
                  }

              }
            });
    }else{
        alert('Login Required');
      }









}
function hideDelete(id){
  $("#reply_delte_confirm"+id).fadeOut();
}

function showDelete(id){
  $("#reply_delte_confirm"+id).fadeIn();
}

function deleteComment(id){
  if($("#hid_sessionid").val()!=""){
  $("#delete_confirmation_modal_pop").modal('show');
  $("#delete_button").val(id);
}else{
  alert('Login Required');
}
}
function confirmDeleteActions(){

  var Id= $("#delete_button").val();
  $.ajax({
  type 		: "POST",
  url			: baseUrl+'Company/deleteComment?expireTime='+time,
  cache       : false,
  data        : {Id:Id},
  dataType	: "json",
  success: function(data){
    if(data.output=='success')
    {
      $("#delete_confirmation_modal_pop").modal('hide');
	  $("#review_"+ Id).hide();
	  $("#nor").html(data.no_of_replies);
    var no_rev=parseInt(($("#no_rev").text())) - 1;
    $("#no_rev").html(no_rev);

    }
    else if(data.output=='fail'){
        $("#delete_confirmation_modal_pop").modal('hide');
      setTimeout(function(){
        $("#common_heading").html('Warning Message');
        $("#common_message").html('Login required');
        $('#common_modal_pop').modal('show');
                  }, 2000);
                }

            }
          });
        }


        function shareCoin(){
          //document.getElementById(".social_share").style.display = "inline";
          if ($('.social_share').hasClass("clicked-once")) {
              // already been clicked once, hide it
              $(".social_share").css({"display":"none"});
              $('.social_share').removeClass("clicked-once");
          }
          else {
              // first time this is clicked, mark it
              $('.social_share').addClass("clicked-once");
              $(".social_share").css({"display":"inline", WebkitTransition : 'display 10s',
              MozTransition    : 'display 10s',
              MsTransition     : 'display 10s',
              OTransition      : 'display 10s',
              transition       : 'all 10s ease-in-out 10s'});
          }

          }
        function newPopup(url) {

          popupWindow = window.open(

            url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')

        }
        function checkedUrl(){
          $('#clickUrl_pop').modal('show');
        }

        function urlconform(){
          $('#clickUrl_pop').modal('hide');
        }

        $(document).ready(function() {
          $('.caption').hide();
          $('.clear-rating').hide();
          $('.replypopup').formValidation();
          $('#reviewReport').formValidation();
          $('#replyreplypopup').formValidation();
        /*	$("textarea").focus(function(){
            debugger;
            var id = $('form').attr('id');
            $(id).formValidation();
          });*/
        });
        function reviewReportMethod(re_id,type,checkUser){
          $("#change_btn_name").html('Cancel');
          if(checkUser=='alreadyReported'){
            $("#common_heading").html('Warning');
            $("#common_message").html('You reported already for this reply.');
            $("#change_btn_name").html('Ok');
            $('#common_modal_pop').modal('show');
          }else if(checkUser=='alreadyU'){
            $("#common_heading").html('Warning');
            $("#common_message").html('You already reported this review');
            $("#change_btn_name").html('Ok');
            $('#common_modal_pop').modal('show');
          }else{
            if($("#hid_sessionid").val()!=""){
              $("#rr_reid").val(re_id);
              $("#rr_reid_type").val(type);
              $("#reviewreportpopup_modal").modal('show');
            }else{
              $("#confirmation_modal_pop").modal('hide');
              $("#common_modal_pop").modal('hide');
              $("#reviewreportpopup_modal").modal('hide');
              setTimeout(function(){
                $("#common_heading").html('Warning Message');
                $("#common_message").html('Login required');
                $('#common_modal_pop').modal('show');
              }, 1000);
            }
          }
        }
        function reviewReportingSubmit(){
          $("#successmessagereponse").html('');
          $("#change_btn_name").html('Cancel');
          if($("#hid_sessionid").val()!=""){
            $('#common_modal_pop').modal('hide');
            $('#reviewReport').formValidation().on('success.form.fv', function(e) {
              e.stopImmediatePropagation();
              var rr_reid           = $("#rr_reid").val();
              var rr_report_reponse = $("#rr_report_reponse").val();
              var type = $("#rr_reid_type").val();
              if(type=='reviewpreport'){
                var url = baseUrl+'Company/reportSaveMethod?expireTime='+time;
              }else{
                var url = baseUrl+'Company/replyReportSaveMethod?expireTime='+time;
              }
              $.ajax({
                type 		: "POST",
                url			: url,
                cache       : false,
                data        : {rr_reid:rr_reid,rr_report_reponse:rr_report_reponse},
                dataType	: "json",
                success: function(data){
                  if(data.output=='success'){
                    $("#successmessagereponse").html('Reported successfully');

                    if(type=='reviewpreport'){
                      $('#reviewReportId_'+rr_reid).html(data.butnreview);
                    }else{
                      $('#replyReportId_'+rr_reid).html(data.butn);
                    }

                    setTimeout(function(){
                      var filterType = 'likes';
                      var hid_filter = $("#hid_filter").val();
                      if(hid_filter=='1'){
                        filterType = 'likes';
                      }else if(hid_filter=='2'){
                        filterType = 'dislikes';
                      }else if(hid_filter=='3'){
                        filterType = 'oldest';
                      }else if(hid_filter=='4'){
                        filterType = 'newlist';
                      }
                      var htmlReload = filterType+' <div class="arrow_down"><span class="caret"></span></div>';
                      $("#filtername").html(htmlReload);
                      reviewReplyFilter(filterType,rr_reid);
                      // window.location.reload();
                      $("#reviewReport").trigger('reset');
                      $('#reviewReport').formValidation('resetForm', true);
                      $('#reviewReport').data('formValidation').resetForm();
                      $("#successmessagereponse").html('');
                      $("#reviewreportpopup_modal").modal('hide');
                    },2000);
                  }else{
                    $("#successmessagereponse").html('');
                    $("#confirmation_modal_pop").modal('hide');
                    $("#common_modal_pop").modal('hide');
                    $("#reviewreportpopup_modal").modal('hide');
                    setTimeout(function(){
                      $("#common_heading").html('Warning Message');
                      $("#common_message").html('Login required');
                      $('#common_modal_pop').modal('show');
                    }, 1000);
                  }
                }
              });
              e.preventDefault();
            });
          }else{
            $("#confirmation_modal_pop").modal('hide');
            $("#common_modal_pop").modal('hide');
            $("#reviewreportpopup_modal").modal('hide');
            setTimeout(function(){
              $("#common_heading").html('Warning Message');
              $("#common_message").html('Login required');
              $('#common_modal_pop').modal('show');
            }, 1000);
          }
        }

        function reviewReplyFilter_New(type,crr_reid,crr_id){
      			debugger;
      		$("#change_btn_name").html('Cancel');
      		var hid_filter = $("#hid_filter").val();
      		var filterTitle = 'Up Votes';
      		if(type =='likes'){
      			filterTitle = "Up Votes";
      			$("#hid_filter").val(1);
      		}else if(type =='dislikes'){
      			filterTitle = "Down Votes";
      			$("#hid_filter").val(2);
      		}else if(type =='oldest'){
      			filterTitle = "Oldest";
      			$("#hid_filter").val(3);
      		}else if(type =='newlist'){
      			filterTitle = "Newest";
      			$("#hid_filter").val(4);
      		}
      		var htmlReload = filterTitle+'<div class="arrow_down"><span class="caret"></span></div>';
      	//	$("#filtername").html(htmlReload);
        if( $("#hid_cmid").val() == undefined){
          var cm_id   = $("#hid_cmid"+crr_reid).val();
        }else{
        var cm_id   = $("#hid_cmid").val();}
      		// $('.box-comments').html('');
      		var url = baseUrl+'Company/getReviewBasedReplies?expireTime='+time;
      		var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
      		//$('#repliesDiv_'+crr_reid).html(relaoding);
      		$.ajax({
      			type 		: "POST",
      			url			: url,
      			cache       : false,
      			data        : {cm_id:cm_id,order_by:type,crr_reid:crr_reid,crr_id:crr_id},
      			dataType	: "json",
      			success: function(data){
      				console.log(data.output);
      			//	console.log(data.resData);
      				console.log(data.repliesCntt);
      					console.log(data.edited_reply);
      				if(data.output=='success'){
      					setTimeout(function(){
      						$("#reply_reply_pop"+crr_id).fadeIn();
      							$('#r_char_cnt'+crr_id).hide();
      							$("#save"+crr_id).hide();
      					//	$("#save"+crr_id).fadeIn();
      						$("#replyreview_"+crr_id).html(data.edited_reply);
      					//	$("#crrr_decript").val(data.crr_decript);
      					//	$("#save"+crr_id).val(crr_id);
      						//	$("#submit-form").attr('id',   "submit-form"+crr_id);
      					//	$("#form_decript").attr('id',   "form_decript"+crr_id);
      					//	$("#res_decript").attr('id',   "res_decript"+crr_id);
      						//	$("#form_decript"+crr_id).attr('onSubmit',   "wirteareplyreplySubmit("+crr_id+")");
      					//		$("#res_decript"+crr_id).attr("onkeyup",   "countCharcter("+crr_id+")");
      					//	$("#res_decript"+crr_id).val(data.crr_decript);
      					//	$("#form_decript"+crr_id).formValidation();
      				//		$("#res_decript"+crr_id).focus();
      					//	$("#replyreplypopup_modal").modal('show');

      						if(data.resData != ""){
      					//		$('#repliesDiv_'+crr_reid).html(data.resData);
      					//		$('#repliesDiv_'+crr_reid).show();
      					//		$('#repliesCntt_'+crr_reid).html(data.repliesCntt);
      							if(data.repliesCntt == 1)
      							{
      								$('#repliesText_'+crr_reid).html('Reply');
      							}else{
      								$('#repliesText_'+crr_reid).html('Replies');
      							}
      							$('#view_replies_id_'+crr_reid).show();
      						}
      						else{
      							$('#repliesDiv_'+crr_reid).html('There are no reviews for this company.');
      						}
      						var $input = $('.rating-loading');
      						$input.rating();
      						$('.caption').hide();
      						$('.clear-rating').hide();
      					}, 500);
      				}
      			}
      		});
      	}


        function wirteareplyreplySubmit(crr_id){
          console.log("data.oddddutput");
          debugger;
          $("#change_btn_name").html('Cancel');
          $("#successmessage").html('');
          if($("#hid_sessionid").val()!=""){
            $('#common_modal_pop').modal('hide');
            console.log("data.output");
            $('#form_decript'+crr_id).formValidation().on('success.form.fv', function(e) {
              console.log("data.8output");
              e.stopImmediatePropagation();
              var crr_replyReviewId       = $("#crr_replyReviewId").val();
              var crrr_decript = $("#res_decript"+crr_id).val();
              var url = baseUrl+'Company/replyReplies?expireTime='+time;
              $("#tp9").show();
              $.ajax({
                type 		: "POST",
                url			: url,
                cache       : false,
                data        : {crr_id:crr_id,crrr_decript:crrr_decript},
                dataType	: "json",
                success: function(data){
                  $("#tp9").hide();
                  console.log(data.output);
                  if(data.output=='success'){
                    $("#successMessage_"+crr_id).html('Reply successfully updated').css('color','green');
                    $("#replysuccessmessage").html('Reply successfully updated').css('color','green');
                    setTimeout(function(){
                      $("#successMessage_"+crr_id).html('');
                      $("#replysuccessmessage").html('');
                      var filterType = 'likes';
                      var hid_filter = $("#hid_filter").val();
                      if(hid_filter=='1'){
                        filterType = 'likes';
                      }else if(hid_filter=='2'){
                        filterType = 'dislikes';
                      }else if(hid_filter=='3'){
                        filterType = 'oldest';
                      }else if(hid_filter=='4'){
                        filterType = 'newlist';
                      }
                      var htmlReload = filterType+' <div class="arrow_down"><span class="caret"></span></div>';
                      $("#filtername").html(htmlReload);
                      reviewReplyFilter_New(filterType,crr_replyReviewId,crr_id);
                      // window.location.reload();
                      $("#replyreplypopup").trigger('reset');
                      $('#replyreplypopup').formValidation('resetForm', true);
                      $('#replyreplypopup').data('formValidation').resetForm();
                      $("#replyreplypopup_modal").modal('hide');
                    }, 2000);
                  }else if(data.output=='exists')
                  {
                    $("#successMessage_"+crr_id).html('Reply already exists').css('color','red');
                    $('#replysuccessmessage').html('Reply already exists').css('color','red');
                  }else if(data.output=='fail'){
                    $("#replyreplypopup_modal").modal('hide');
                    setTimeout(function(){
                      $("#common_heading").html('Warning Message');
                      $("#common_message").html('Login required');
                      $('#common_modal_pop').modal('show');
                    }, 2000);
                  }
                }
              });
              e.preventDefault();
            });
          }else{
            $("#confirmation_modal_pop").modal('hide');
            $("#common_modal_pop").modal('hide');
            setTimeout(function(){
              $("#common_heading").html('Warning Message');
              $("#common_message").html('Login required');
              $('#common_modal_pop').modal('show');
            }, 1000);
          }
        }

        function wirteareplySubmit(re_id){
          debugger;
          $('#replypopup'+re_id).formValidation();
          replyMessage(re_id);
          $("#change_btn_name").html('Cancel');
          $("#successmessage"+re_id).html('');
          if($("#hid_sessionid").val()!=""){
            $('#common_modal_pop').modal('hide');
            var reply='#replypopup'+re_id;
            $('#replypopup'+re_id).formValidation().on('success.form.fv', function(e) {
              e.stopImmediatePropagation();
              var crr_reid    = $("#crr_reid"+re_id).val();
              var crr_decript = $("#crr_decript"+re_id).val();
              var url = baseUrl+'Company/replySaveMethod?expireTime='+time;
              $("#tp7"+re_id).show();
              $.ajax({
                type 		: "POST",
                url			: url,
                cache       : false,
                data        : {crr_reid:crr_reid,crr_decript:crr_decript},
                dataType	: "json",
                success: function(data){
                  $("#tp7"+re_id).hide();
                  console.log(data.output);
                  if(data.output=='success'){
                    $("#successmessage"+re_id).html('Reply successfully saved').css('color','green');
                    setTimeout(function(){
                      $("#successmessage"+re_id).html('');
                      var filterType = 'likes';
                      var hid_filter = $("#hid_filter").val();
                      if(hid_filter=='1'){
                        filterType = 'likes';
                      }else if(hid_filter=='2'){
                        filterType = 'dislikes';
                      }else if(hid_filter=='3'){
                        filterType = 'oldest';
                      }else if(hid_filter=='4'){
                        filterType = 'newlist';
                      }
                      var htmlReload = filterType+' <div class="arrow_down"><span class="caret"></span></div>';
                      $("#filtername").html(htmlReload);
                      //reviewFilter(filterType);
                      reviewReplyFilter(filterType,crr_reid,re_id);
                      // window.location.reload();
                      $("#replypopup"+re_id).trigger('reset');
                      $('#replypopup'+re_id).formValidation('resetForm', true);
                      $('#replypopup'+re_id).data('formValidation').resetForm();
                      $("#replypopup_modal").modal('hide');
                    }, 2000);
                  }else if(data.output=='exists'){
                    $("#successmessage"+re_id).html('Reply already exists').css('color','red');

                  }else if(data.output=='fail'){
                    $("#replypopup_modal").modal('hide');
                    setTimeout(function(){
                      $("#common_heading").html('Warning Message');
                      $("#common_message").html('Login required');
                      $('#common_modal_pop').modal('show');
                    }, 2000);
                  }
                },error:function(jqXHR,textStatus, errorThrown){
                  console.log( jqXHR);
                    console.log( textStatus);
                      console.log(errorThrown);
                    console.log(jqXHR.output);
                  console.log('ERROR: ' + jqXHR.status);
              }
              });
              e.preventDefault();
            });
          }else{
            $("#confirmation_modal_pop").modal('hide');
            $("#common_modal_pop").modal('hide');
            setTimeout(function(){
              $("#common_heading").html('Warning Message');
              $("#common_message").html('Login required');
              $('#common_modal_pop').modal('show');
            }, 1000);
          }
        }
        function replyMessage(re_id){
          $('#replypopup'+re_id).formValidation();
          console.log($('#replypopup'+re_id).formValidation());
          $("#change_btn_name").html('Cancel');
          $("#review_char_count"+re_id).html('1000');
          $("#successmessage"+re_id).html('');
          $("#crr_reid"+re_id).val(re_id);
          if($("#hid_sessionid").val()!=""){
            var userId = $("#hid_sessionid").val();
            $.ajax({
            type 		: "POST",
            url			: baseUrl+'Company/checkReplyForallow',
            cache       : false,
            data        : {userId:userId,re_id:re_id},
            dataType	: "json",
            beforeSend: function(xhr) {

         },
            success: function(data){
              console.log(data.output);
              if(data.output < 5)
              {
                console.log("S");
              //	$("#crr_decript"+re_id).show();
              }else{
                alert('You cannot add more than 5 replies in a minute.');
              }
            },
            error:function(jqXHR){
              console.log('ERROR: ' + jqXHR.status);
          }
          });


          }else{
            $("#confirmation_modal_pop").modal('hide');
            $("#common_modal_pop").modal('hide');
            setTimeout(function(){
              $("#common_heading").html('Warning Message');
              $("#common_message").html('Login required');
              $('#common_modal_pop').modal('show');
            }, 1000);
          }
        }
        function replyReplyMessage(crr_id,crr_reid){
          $("#crr_id").val(crr_id);
          $("#crr_replyReviewId").val(crr_reid);
          if($("#hid_sessionid").val()!=""){
            var url = baseUrl+'Company/replyReplies?crr_id='+crr_id+'&expireTime='+time;
            $.ajax({
              type 		: "GET",
              url			: url,
              cache       : false,
              dataType	: "json",
              success: function(data){
                console.log(data.output);
                if(data.output=='success'){
                  $("#reply_reply_pop"+crr_id).fadeOut();
                  setTimeout(function(){
                    $("#save"+crr_id)
                      .css('opacity', 0)
                      .slideDown('slow')
                      .animate(
                            { opacity: 1 },
                            { queue: false, duration: 'fast' }
                              );
                //	$("#save"+crr_id).fadeIn();
                  $("#replyreview_"+crr_id).html('<form onSubmit="wirteareplyreplySubmit();" id="form_decript" class="form-horizontal replypopup" name="replypopup" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh"><div class="form-group"><textarea class="form-control crr_decript" placeholder="Review" style="min-height:100px;" required data-fv-notempty-message="The review is required" id="res_decript" name="re_decript" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Review should have less than 1000 characters" onkeyup="countCharcter();"></textarea></div><input type="submit" id="submit-form" class="hidden" /></form>');
      						$("#crrr_decript").val(data.crr_decript);
                  $("#save"+crr_id).val(crr_id);
                    $("#submit-form").attr('id',   "submit-form"+crr_id);
                  $("#form_decript").attr('id',   "form_decript"+crr_id);
                  $("#res_decript").attr('id',   "res_decript"+crr_id);
                    $("#form_decript"+crr_id).attr('onSubmit',   "wirteareplyreplySubmit("+crr_id+")");
                    $("#res_decript"+crr_id).attr("onkeyup",   "countCharcter("+crr_id+")");
                  $("#res_decript"+crr_id).val(data.crr_decript);
                  $("#form_decript"+crr_id).formValidation();
                  $("#res_decript"+crr_id).focus();
                //	$("#replyreplypopup_modal").modal('show');
              },0 );
                }
              }
            });

          }else{
            $("#confirmation_modal_pop").modal('hide');
            $("#common_modal_pop").modal('hide');
            $("#replyreplypopup_modal").modal('hide');
            setTimeout(function(){
              $("#common_heading").html('Warning Message');
              $("#common_message").html('Login required');
              $('#common_modal_pop').modal('show');
            }, 1000);
          }
        }
        function countCharcter(crr_id)
        {
          var textLength = $('#res_decript'+crr_id).val().length;
          var FinalLength = parseInt(1000)-parseInt(textLength);
          if(parseInt(FinalLength) >=1){
            $('#r_char_cnt'+crr_id).show();
            $('#review_char_count'+crr_id).html(FinalLength);
          }else{
            $('#r_char_cnt'+crr_id).hide();
            $('#review_char_count'+crr_id).html('');
          }
        }
        function fullViewFilter(typeee,Pagee){
          var cm_name = $('#company_name').val();
          var hid_uniqueid   = $("#hid_uniqueid").val();
          window.location = baseUrl+'company-full-view/'+cm_name.replace(/\s/g,'_')+'&'+typeee;
        }
        function reviewFilter(type,Pagee){
          $("#change_btn_name").html('Cancel');
          var hid_filter = $("#hid_filter").val();
          var filterTitle = 'Up Votes';
          if(type =='likes'){
            filterTitle = "Up Votes";
            $("#hid_filter").val(1);
          }else if(type =='dislikes'){
            filterTitle = "Down Votes";
            $("#hid_filter").val(2);
          }else if(type =='oldest'){
            filterTitle = "Oldest";
            $("#hid_filter").val(3);
          }else if(type =='newlist'){
            filterTitle = "Newest";
            $("#hid_filter").val(4);
          }
          var htmlReload = filterTitle+'<div class="arrow_down"><span class="caret"></span></div>';
          $("#filtername").html(htmlReload);
          var cm_id   = $("#hid_cmid").val();
          var hid_uniqueid   = $("#hid_uniqueid").val();
          $('.box-comments').html('');
          var url = baseUrl+'Company/reviewsReplies?expireTime='+time;
          // var url = baseUrl+'Company/companyFullView?expireTime='+time;
          var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
          $('.box-comments').html(relaoding);
          $.ajax({
            type 		: "POST",
            url			: url,
            cache       : false,
            data        : {cm_id:cm_id,order_by:type,hid_uniqueid:hid_uniqueid,Pagee:Pagee},
            dataType	: "json",
            success: function(data){
              if(data.output=='success'){
                $('#fullviewPagy').hide();
                setTimeout(function(){
                  if(data.resData != ""){
                    $(".box-comments").html(data.resData);
                  }
                  else{
                    $('.box-comments').html('There are no reviews for this company.');
                  }
                  var $input = $('.rating-loading');
                  $input.rating();
                  $('.caption').hide();
                  $('.clear-rating').hide();
                }, 1000);
              }
            }
          });
        }
        function reviewReplyFilter(type,crr_reid,re_id){
          debugger;
          $("#change_btn_name").html('Cancel');
          var hid_filter = $("#hid_filter").val();
          var filterTitle = 'Up Votes';
          if(type =='likes'){
            filterTitle = "Up Votes";
            $("#hid_filter").val(1);
          }else if(type =='dislikes'){
            filterTitle = "Down Votes";
            $("#hid_filter").val(2);
          }else if(type =='oldest'){
            filterTitle = "Oldest";
            $("#hid_filter").val(3);
          }else if(type =='newlist'){
            filterTitle = "Newest";
            $("#hid_filter").val(4);
          }
          var htmlReload = filterTitle+'<div class="arrow_down"><span class="caret"></span></div>';
          $("#filtername").html(htmlReload);
          if( $("#hid_cmid").val() == undefined){
            var cm_id   = $("#hid_cmid"+crr_reid).val();
          }else{
          var cm_id   = $("#hid_cmid").val();}
          // $('.box-comments').html('');
          var url = baseUrl+'Company/getReviewBasedReplies?expireTime='+time;
          var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        //  $('#repliesDiv_'+crr_reid).html(relaoding);
          $.ajax({
            type 		: "POST",
            url			: url,
            cache       : false,
            data        : {cm_id:cm_id,order_by:type,crr_reid:crr_reid,re_id:re_id},
            dataType	: "json",
            success: function(data){
              console.log(data.output);
              console.log(data.resData);
              console.log(data.repliesCntt);

              if(data.output=='success'){
                setTimeout(function(){
                  if(data.resData != ""){
                    $('#repliesDiv_'+crr_reid).append(data.resData2);
                    $('#repliesDiv_'+crr_reid).show();
                    $('#repliesCntt_'+crr_reid).html(data.repliesCntt);
                    if(data.repliesCntt == 1)
                    {
                      $('#repliesText_'+crr_reid).html('Reply');
                    }else{
                      $('#repliesText_'+crr_reid).html('Replies');
                    }
                    $('#view_replies_id_'+crr_reid).show();
                  }
                  else{
                    $('#repliesDiv_'+crr_reid).html('There are no reviews for this company.');
                  }
                  var $input = $('.rating-loading');
                  $input.rating();
                  $('.caption').hide();
                  $('.clear-rating').hide();
                }, 1000);
              }
            }
          });
        }
        function confirmReviewsActions(){
          $("#common_modal_pop").modal('hide');
          $("#confirmation_modal_pop").modal('hide');
          var reviewCnt = $("#reviewCnt").val();
          var reviewid  = $("#reviewid").val();
          var type      = $("#type").val();
          var typeMode  = $("#typeMode").val();
          var reid      = $("#reid").val();
          reviewLikeDisLike(reviewCnt,reviewid,type,typeMode,reid);
        }
        function reviewLikeDisLikee(reviewCnt,reviewid,type,typeMode,reid){
          $("#change_btn_name").html('Cancel');
          $("#common_modal_pop").modal('hide');
          $("#reviewCnt").val(reviewCnt);
          $("#reviewid").val(reviewid);
          $("#type").val(type);
          $("#typeMode").val(typeMode);
          $("#reid").val(reid);
          $('#confirmation_heading').html('Dislike confirmation');
          if(typeMode=="replies"){
            $('#confirmation_message').html('Do you want to dislike this reply?');
          }else{
            $('#confirmation_message').html('Do you want to dislike this review?');
          }
          if($("#hid_sessionid").val()!=""){
            //$("#confirmation_modal_pop").modal('show');
          var url = baseUrl+'Company/checklikesDislikes?expireTime='+time;
          $.ajax({
            type 		: "POST",
            url			: url,
            cache       : false,
            data        : {reviewCnt:reviewCnt,reviewid:reviewid,type:type,typeMode:typeMode},
            dataType	: "json",
            success: function(data){
              console.log(data.output);
              if(data.output=='success'){
                if(data.alreadyReplyDisliked=='1'){
                  $("#common_heading").html('Dislike status');
                  $("#common_message").html('Already disliked.');
                  $("#common_modal_pop").modal('show');
                  $("btn_like").html();
                }else if(data.alreadyReplyLiked=='1'){
                  $("#common_heading").html('Like status');
                  $("#common_message").html('You already liked this reply.');
                  $("#common_modal_pop").modal('show');
                }else if(data.alreadyDisliked=='1'){
                  $("#common_heading").html('Dislike status');
                  $("#common_message").html('Already disliked.');
                  $("#common_modal_pop").modal('show');
                  $("btn_like").html();
                }else if(data.alreadyLiked=='1'){
                  $("#common_heading").html('Like status');
                  $("#common_message").html('You already liked this review.');
                  $("#common_modal_pop").modal('show');
                }else{
                  $("#confirmation_modal_pop").modal('show');
                }
              }else if(data.output=='fail'){
                $("#confirmation_modal_pop").modal('hide');
                $("#common_modal_pop").modal('hide');
                if(data.loginrequired=='1'){
                  setTimeout(function(){
                    $("#common_heading").html('Warning Message');
                    $("#common_message").html('Login required');
                    $('#common_modal_pop').modal('show');
                  }, 1000);
                }
              }
            }
          });
          }else{
            $("#confirmation_modal_pop").modal('hide');
            $("#common_modal_pop").modal('hide');
            setTimeout(function(){
              $("#common_heading").html('Warning Message');
              $("#common_message").html('Login required');
              $('#common_modal_pop').modal('show');
            }, 1000);
          }
        }
        function reviewLikeDisLike(reviewCnt,reviewid,type,typeMode,reid){
          $("#change_btn_name").html('Cancel');
          $('#common_modal_pop').modal('hide');
          $("#confirmation_modal_pop").modal('hide');
          $("#common_modal_pop").modal('hide');
          var url = baseUrl+'Company/likesDislikes?expireTime='+time;
          $.ajax({
            type 		: "POST",
            url			: url,
            cache       : false,
            data        : {reviewCnt:reviewCnt,reviewid:reviewid,type:type,typeMode:typeMode},
            dataType	: "json",
            success: function(data){
              console.log(data.output);
              if(data.output=='success'){
                if(data.alreadyReplyDisliked=='1'){
                  $("#common_heading").html('Dislike status');
                  $("#common_message").html('You already disliked this reply.');
                  $("#common_modal_pop").modal('show');
                  $("btn_like").html();
                }else if(data.alreadyReplyLiked=='1'){
                  $("#common_heading").html('Like status');
                  $("#common_message").html('You already liked this reply.');
                  $("#common_modal_pop").modal('show');
                }else if(data.alreadyDisliked=='1'){
                  $("#common_heading").html('Dislike status');
                  $("#common_message").html('You already disliked this review.');
                  $("#common_modal_pop").modal('show');
                  $("btn_like").html();
                }else if(data.alreadyLiked=='1'){
                  $("#common_heading").html('Like status');
                  $("#common_message").html('You already liked this review.');
                  $("#common_modal_pop").modal('show');
                }else{
                  if(typeMode=='review'){
                    if(type=='like'){
                      $("#btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="like-button-text">Like</span>');
                      $("#btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i><span class ="dislike-button-text">Dislike</span>');
                    }else{
                      $("#btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="like-button-text">Like</span>');
                      $("#btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i><span class ="dislike-button-text">Dislike</span>');
                    }
                  }else if(typeMode=='replies'){
                    if(type=='like'){
                      $("#reply_btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>'+ data.cntLikeDislikes);
                      $("#reply_btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>'+ data.dislikescnt);
                    }else{
                      $("#reply_btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>'+ data.cntLikeDislikes);
                      $("#reply_btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>'+ data.dislikescnt);
                    }
                  }
                  /*}else if(typeMode=='replies'){
                    if(type=='like'){
                      $("#reply_btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>'+ data.cntLikeDislikes);
                      $("#reply_btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>'+ data.dislikescnt);
                    }else{
                      $("#reply_btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>'+ data.cntLikeDislikes);
                      $("#reply_btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>'+ data.dislikescnt);
                    }
                  }*/
                }
              }else if(data.output=='fail'){
                $("#confirmation_modal_pop").modal('hide');
                $("#common_modal_pop").modal('hide');
                if(data.loginrequired=='1'){
                  setTimeout(function(){
                    $("#common_heading").html('Warning Message');
                    $("#common_message").html('Login required');
                    $('#common_modal_pop').modal('show');
                  }, 1000);
                }
              }
            }
          });
        }








</script>
