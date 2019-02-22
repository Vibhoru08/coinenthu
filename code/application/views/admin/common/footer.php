	<?php
		$ThisYear  = date('Y');
		$nextYear = date('Y', strtotime('+1 year'));
		$years = $ThisYear.'-'.$nextYear;
	?>
	<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
        <strong>Copyright &copy; <?php echo $years; ?> <a href="<?php echo base_url(); ?>" target="_blank">Coinenthu</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- LogOut Confirmation -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
			<h3 class="modal-title" id="myModalLabel">Logout Confirmation</h3>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal">
			  <div class="box-body">
				<div class="form-group">
				  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
				  <div class="col-sm-8">
					<p>Are you sure you want to logout?</p>
				  </div>
				</div>

			  </div>
			</form>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<button type="button" class="btn btn-info" onClick="logoutConfirm();">Ok</button>
		  </div>
		</div>
	  </div>
	</div>
<!-- End -->
<div class="modal fade" id="confirmationDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabels"></h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p id="statusmesg"></p>
			  </div>
			</div>
			<input type="hidden" name="confrm_u_id" id="confrm_u_id">
			<input type="hidden" name="confrm_type" id="confrm_type">
			<input type="hidden" name="whitchPage" id="whitchPage">
			<input type="hidden" name="ev_country" id="ev_country">
			<input type="hidden" name="ev_city"    id="ev_city">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="confirmActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Edit Review</h3>
      </div>
      <div class="modal-body mandatory_color">
        <form method="post" class="form-horizontal" id="updateReviews" name="updateReviews" onSubmit="updateReview()" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon"
        data-fv-icon-validating="glyphicon glyphicon-refresh" >
                  <div class="box-body">
					<div class="form-group" style="margin-bottom:0 !important">
                      <label for="inputEmail3" class="col-sm-3 control-label">Rating<sup>*</sup></label>
                      <div class="col-sm-8 pos_r">
                        <select class="form-control" id="re_rating" name="re_rating" required data-fv-notempty-message="The rating is required">
							<option value="">Select a rating </option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>​
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Review Description <sup>*</sup></label>
                      <div class="col-sm-8">
                        <textarea class="form-control" id="re_decript"  name="re_decript" placeholder="Description" required data-fv-notempty-message="The description is required" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Review should have less than 1000 characters" onkeyup="countCharcter();"></textarea>
						 <span id="rr_char_cnt" style="display:none;"> <span id="rreview_char_count"></span>&nbsp;&nbsp;character(s) left</span>
                      </div>

                    </div>
                  </div>
				  <script>
					function countCharcter()
					{
						var textLength = $('#re_decript').val().length;
						var FinalLength = parseInt(1000)-parseInt(textLength);
						if(parseInt(FinalLength) >=1){
							$('#rr_char_cnt').show();
							$('#rreview_char_count').html(FinalLength);
						}else{
							$('#rr_char_cnt').hide();
							$('#rreview_char_count').html('');
						}
					}
				  </script>
				  <input type="hidden" id="hid_reid" name="hid_reid" value="">
				  <input type="hidden" id="hid_re_cmid" name="hid_re_cmid" value="">
				<div class="modal-footer">
					​<span style="display:none;float:left;" id="reviewLoader" class="overlay">
						<i class="fa fa-refresh fa-spin"></i>
					</span>​
					<span id="successMsg" style="color:green;float:left"></span>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-info">Update</button>
				</div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editReviewReply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Edit Reply</h3>
      </div>
      <div class="modal-body mandatory_color">
        <form method="post" class="form-horizontal" id="updateReviewReplys" name="updateReviewReplys" onSubmit="updateReviewReply()" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon"
        data-fv-icon-validating="glyphicon glyphicon-refresh" >
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Reply Description <sup>*</sup></label>
                      <div class="col-sm-8">
                        <textarea class="form-control" id="crr_decript"  name="crr_decript" placeholder="Description" required data-fv-notempty-message="The description is required" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Reply should have less than 1000 characters" onkeyup="countReplyCharcter();"></textarea>
						 <span id="rrr_char_cnt" style="display:none;"> <span id="rrreview_char_count"></span>&nbsp;&nbsp;character(s) left</span>
                      </div>
                    </div>
                  </div>
				  <script>
					function countReplyCharcter()
					{
						var textLength = $('#crr_decript').val().length;
						var FinalLength = parseInt(1000)-parseInt(textLength);
						if(parseInt(FinalLength) >=1){
							$('#rrr_char_cnt').show();
							$('#rrreview_char_count').html(FinalLength);
						}else{
							$('#rrr_char_cnt').hide();
							$('#rrreview_char_count').html('');
						}
					}
				  </script>
				  <input type="hidden" id="crr_id" name="crr_id" value="">
				<div class="modal-footer">
					​<span style="display:none;float:left;" id="reviewLoader" class="overlay">
						<i class="fa fa-refresh fa-spin"></i>
					</span>​
					<span id="successMsg" style="color:green;float:left"></span>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-info">Update</button>
				</div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="carerconfDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p>Are you sure you want to delete?</p>
			  </div>
			</div>
			<input type="hidden" name="art_confrm_u_id" id="art_confrm_u_id">
			<input type="hidden" name="art_confrm_type" id="art_confrm_type">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
		<span id="conftp10" style="display:none;">
							<svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
		</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="careerconfActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="carerCfionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Confirmation</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p>Are you sure you want to continue?</p>
			  </div>
			</div>
			<input type="hidden" name="confrm_u_id" id="confrm_u_id">
			<input type="hidden" name="confrm_type" id="confrm_type">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
		<span id="conftp10" style="display:none;">
							<svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
		</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="careerconfActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="banerconfDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p>Are you sure you want to delete?</p>
			  </div>
			</div>
			<input type="hidden" name="art_confrm_u_id" id="art_confrm_u_id">
			<input type="hidden" name="art_confrm_type" id="art_confrm_type">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
		<span id="conftp10" style="display:none;">
							<svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
		</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="banerconfActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="banerCfionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Confirmation</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p>Are you sure you want to continue?</p>
			  </div>
			</div>
			<input type="hidden" name="confrm_u_id" id="confrm_u_id">
			<input type="hidden" name="confrm_type" id="confrm_type">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
		<span id="conftp10" style="display:none;">
							<svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
		</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="banerconfActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="emailconfDeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p>Are you sure you want to delete?</p>
			  </div>
			</div>
			<input type="hidden" name="art_confrm_u_id" id="art_confrm_u_id">
			<input type="hidden" name="art_confrm_type" id="art_confrm_type">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
		<span id="conftp11" style="display:none;">
							<svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
		</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="emailconfActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="emailCfionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Confirmation</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
		  <div class="box-body">
			<div class="form-group">
			  <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
			  <div class="col-sm-8">
				<p>Are you sure you want to continue?</p>
			  </div>
			</div>
			<input type="hidden" name="email_u_id" id="email_u_id">
			<input type="hidden" name="email_confrm_type" id="email_confrm_type">
		  </div>
        </form>
      </div>
      <div class="modal-footer">
		<span id="conftp11" style="display:none;">
							<svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
		</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-info" onClick="emailconfActions();">Ok</button>
      </div>
    </div>
  </div>
</div>
