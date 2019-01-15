<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->

<footer >
 <div class="container-fluid pad_b30">
   <div class="row" >
     <div class="col-xs-10 col-xs-offset-1 pad_0">
     <div class="col-md-4 col-xs-6 paddingtop-bottom">
       <h6 class="heading7">Navigation</h6>
       <hr class="footer_hr">
       <ul class="footer-ul">
         <li><a href="<?php echo base_url();?>about-us">About Us </a></li>
         <li><a href="<?php echo base_url(); ?>add-digital-asset">Add Digital Asset </a></li>
         <li><a href="<?php echo base_url(); ?>add-ico-tracker">Add ICO </a></li>
         <li><a href="<?php echo base_url(); ?>add-event">Add An Event </a></li>
     <li><a href="<?php echo base_url(); ?>contact-us">Contact us</a></li>
         <li><a href="javascript:void(0);" data-toggle="modal" data-target="#suggestions">Suggest us</a></li>
       </ul>
     </div>
     <div class="col-md-8 col-xs-6 paddingtop-bottom">
   <div class="col-md-6 col-sm-12 footer_left">
       <h6 class="heading7">Terms</h6>
       <hr class="footer_hr">
       <ul class="footer-ul">
         <li><a href="<?php echo base_url();?>terms-of-use" >Terms & Conditions </a></li>
         <li><a href="<?php echo base_url();?>comments-policy" >Comments Policy </a></li>
         <!--<li><a href="<?php echo base_url();?>privacy-policy" >Privacy Policy </a></li>-->
       </ul>
     </div>

   <!--<div class="col-md-1 m_hide">&nbsp;</div>-->
     <div class="col-md-6 col-sm-12 mar_t0 mar_xs_20 socila_links social_icons text-left footer_leftt">
        <h6 class="heading7">Follow Us</h6>
        <hr class="footer_hr">
     <ul class="social-network social-circle" style="margin-left:0;padding-left:0;">
     <!--<li><a href="#" class="github" title="Github"><i class="fa fa-github"></i></a></li>-->
     <li><a href="https://twitter.com/coinenthu" class="icoTwitter footer_social_icon" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
     <!--<li><a href="https://discord.gg/MHwEEXd" target="_blank" class="discord" title="Discord"><i class="fa "><img style="margin-top:5px;margin-left:4px" src="<?php echo base_url();?>asset/forntend/images/discord.png"/></i></a></li>-->
     <li><a href="https://t.me/joinchat/FXFSjQ2ZWlb9B4w9aRbP3w" class="telegram" target="_blank" title="Telegram"><i class="fa "><img style="margin-top:5px;margin-left:4px;width:14px" src="<?php echo base_url();?>asset/forntend/images/telegram-app.png"/></i></a></li>

     <!--<li><a href="https://Coinenthu.slack.com/shared_invite/MTgyMDI4MDM3NjM5LTE0OTQzODMzNzgtZGEyMjc0ODBhNQ" target="_blank" class="icoGoogle" title="Slack"><i class="fa "><img style="margin-top:5px;margin-left:4px" src="<?php echo base_url();?>asset/forntend/images/slack_ie11.png"/></i></a></li>
     <li><a href="#" class="icon_market" title="Coinmarketcap"><i class="fa "><img style="margin-top:5px;margin-left:4px" src="<?php echo base_url();?>asset/forntend/images/bitcoin.png"/></i></a></li>-->
     <li><a href="https://www.linkedin.com/company/Coinenthu/" class="icoLinkedin footer_social_icon" target="_blank" title="Linkedin"><i class="fa fa-linkedin" style="color:#000046;"></i></a></li>
     <li><a href="https://www.facebook.com/Coinenthu"  target="_blank" class="icoFacebook footer_social_icon" title="Facebook"><i class="fa fa-facebook" style="color:#000046;"></i></a></li>
     <!--<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>-->
     </ul>
     <p class="mar_t20 NoirProLight m_hide">&nbsp;info@coinenthu.com</p>


     <div class="input-group input-group-sm m_hide">
               <input class="form-control" type="text" placeholder="Enter Your Email" id="subemail" name="subemail">
                   <span class="input-group-btn">
                     <button type="button" class="btn btn-info btn-cstm mar_left10" onClick="subscriber();">Subscribe</button>
                   </span>
     </div>
     <span id="successMsg" ></span>

     </div>
   </div>
   <div class="col-xs-12 pad_0 mar_t20 text-center big_hide">
     <hr style="border:none;color:#ffff;height:1px;background-color: #fff;margin-bottom:0px;">
   <p class="mar_t30 NoirProLight">&nbsp;info@coinenthu.com</p>


   <div class="input-group input-group-sm">
             <input class="form-control" type="text" placeholder="Enter Your Email" id="subemail" name="subemail">
                 <span class="input-group-btn">
                   <button type="button" class="btn btn-info btn-cstm mar_left10" onClick="subscriber();">Subscribe</button>
                 </span>
   </div>
   <span id="successMsg" ></span>
 </div>
   </div>
   </div>
   <div class="row">
     <div class="col-xs-10 col-xs-offset-1 pad_0 mar_t30">
   <hr style="border:none;color:#ffff;height:1px;background-color: #fff;margin-bottom:0px;">
  </div>
</div>
 </div>

 <div class="sub_footer">
   <div class="container-fluid">
     <div class="row">
       <div class="col-xs-offset-1 col-xs-10 pad_0">
   © 2018, Coinenthu. All Rights Reserved. <a href="<?php echo base_url();?>terms-of-use"  data-target="#terms_conditions">Terms & Conditions.</a> <a href="<?php echo base_url();?>privacy-policy"  data-target="#commPolocy_modal">Privacy Policy</a>
   </div>
 </div>
</div>
 </div>

</footer>
   </div><!-- ./wrapper -->

<!-- Logout -->
 <div class="modal fade" id="userlogoutmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">LOG OUT CONFIRMATION</h4>
     </div>
     <div class="modal-body">Are you sure you want to logout?</div>
     <div class="modal-footer">
     <span id="logoutLoader" style="display:none" ><i class="fa fa-refresh fa-spin"></i></span>
     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
     <button type="button" class="btn btn-primary" onclick="logoutConfirm()">Ok</button>
     </div>
   </div>
   </div>
 </div>
<!-- logout-->
<div class="modal fade" id="scoial_hidden_common_fb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
   <button type="button" class="close" onClick="fbLogoutt();" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Email Checking</h4>
   </div>
   <div class="modal-body">
   <p><span id="sc_message">User with this email already exists.</span></p>
   </div>
   <div class="modal-footer">
   <button onClick="fbLogoutt();" type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
   </div>
 </div>
 </div>
</div>
<!-- Logout -->
 <div class="modal fade" id="maxfieldsallowed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Max fields allowed</h4>
     </div>
     <div class="modal-body">Maximum 20 fields allowed</div>
     <div class="modal-footer">
     <span id="logoutLoader" style="display:none" ><i class="fa fa-refresh fa-spin"></i></span>
     <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
     </div>
   </div>
   </div>
 </div>
 <div class="modal fade" id="maxfieldsallowedResources" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Max fields allowed</h4>
     </div>
     <div class="modal-body">Maximum 5 fields allowed</div>
     <div class="modal-footer">
     <span id="logoutLoader" style="display:none" ><i class="fa fa-refresh fa-spin"></i></span>
     <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
     </div>
   </div>
   </div>
 </div>
 <div class="modal fade" id="dates_errors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Error</h4>
     </div>
     <div class="modal-body" id="date_error_msg" style="text-align:center;"></div>
     <div class="modal-footer">
     <span id="logoutLoader" style="display:none" ><i class="fa fa-refresh fa-spin"></i></span>
     <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
     </div>
   </div>
   </div>
 </div>
<!-- logout-->
<!--Register Confirmation-->
<div class="modal fade" id="hidden_common" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
   <div class="modal-content modla_title_line">
     <div class="modal-header pop_title">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="myModalLabelw">Registration Confirmation</h4>
     </div>
     <div class="modal-body">
       <p><span id="alert-message"></span></p>
     </div>
     <div class="modal-footer">
       <button  type="button" class="btn   btn-raised btn-info btn-sm" data-dismiss="modal" id="cnfrmOk">Ok</button>
     </div>
   </div>
   </div>
</div>

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
     </div>
       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       <button type="button" class="btn btn-primary" onClick="confirmActions();">Ok</button>
     </div>
   </div>
 </div>
</div>


<div class="modal fade" id="common_modal_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="common_heading"></h3>
     </div>
     <div class="modal-body">
       <form class="form-horizontal">
     <div class="box-body">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
       <div class="col-sm-8">
       <p id="common_message"></p>
       </div>
     </div>
     </div>
       </form>
     </div>
     <div class="modal-footer">
       <a href="<?php echo base_url().'login'; ?>" class="btn btn-primary">Sign In</a>
       <button id="change_btn_name" type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
     </div>
   </div>
 </div>
</div>

<div class="modal fade" id="confirmation_modal_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="confirmation_heading"></h3>
     </div>
     <div class="modal-body">
       <form class="form-horizontal">
     <div class="box-body">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
       <div class="col-sm-8">
       <p id="confirmation_message"></p>
       </div>
     </div>
     <input type="hidden" name="reviewCnt" id="reviewCnt">
     <input type="hidden" name="reviewid" id="reviewid">
     <input type="hidden" name="type" id="type">
     <input type="hidden" name="typeMode" id="typeMode">
     <input type="hidden" name="reid" id="reid">
     </div>
       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       <button type="button" class="btn btn-primary" onClick="confirmReviewsActions();">Ok</button>
     </div>
   </div>
 </div>
</div>


<div class="modal fade" id="replypopup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" >
 <div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
   <button type="button" class="close" onClick="modalClearForm('replypopup');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Write a reply</h4>
   </div>
   <form  onSubmit="wirteareplySubmit();"  class="form-horizontal" id="replypopup" name="replypopup" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" >
   <div class="modal-body">
     <input type="hidden" id="crr_reid" name="crr_reid" value="">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-4 control-label no_padding_label validate_c">Reply<span class="mstar" style="color:red;"> *</span></label>
       <div class="col-sm-7" >
         <textarea class="form-control" rows="2" id="crr_decript" name="crr_decript" required data-fv-notempty-message="Required" placeholder="Reply" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Reply should have less than 1000 characters" onkeyup="countCharcter2();"></textarea>
         <span id="r_char_cnt" style="display:none;"> <span id="review_char_count"></span>&nbsp;&nbsp;character(s) left</span>
         <span id="errorNotes" style="color:#a94442;"></span>
       </div>
     </div>
   </div>
   <div class="modal-footer">
     <span id="successmessage" style="color:green"></span>
     <span class="vwdTitleError" style="color:#a94442;"></span>
       <span id="tp7" style="display:none;">
       <svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
     </span>
     <button type="button" class="btn btn-default btn-sm" onClick="modalClearForm('replypopup');">Cancel</button>
     <button type="submit" class="btn btn-primary btn-sm">Save</button>
   </div>
   </form>
 </div>
 </div>
</div>
<div class="modal fade" id="replyreplypopup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" >
 <div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
   <button type="button" class="close" onClick="modalClearForm('replyreplypopup');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Edit a Reply</h4>
   </div>
   <form  onSubmit="wirteareplyreplySubmit();"  class="form-horizontal" id="replyreplypopup" name="replyreplypopup" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" >
   <div class="modal-body">
     <input type="hidden" id="crr_id" name="crr_id" value="">
     <input type="hidden" id="crr_replyReviewId" name="crr_replyReviewId" value="">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-4 control-label no_padding_label validate_c">Reply Message <span class="mstar" style="color:red;"> *</span></label>
       <div class="col-sm-7" >
         <textarea class="form-control" rows="2" id="crrr_decript" name="crrr_decript" required data-fv-notempty-message="Required" placeholder="Reply Message" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="Reply should have less than 1000 characters" onkeyup="countCharcter1();"></textarea>
         <span id="r_char_cnt1" style="display:none;"> <span id="review_char_count1"></span>&nbsp;&nbsp;character(s) left</span>
         <span id="errorNotes" style="color:#a94442;"></span>
       </div>
     </div>
   </div>
   <div class="modal-footer">
     <span id="replysuccessmessage" style="color:green"></span>
     <span class="vwdTitleError" style="color:#a94442;"></span>
       <span id="tp9" style="display:none;">
       <svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
     </span>
     <button type="button" class="btn btn-default btn-sm" onClick="modalClearForm('replyreplypopup');">Cancel</button>
     <button type="submit" class="btn btn-primary btn-sm">Update</button>
   </div>
   </form>
 </div>
 </div>
</div>

<div class="modal fade" id="reviewreportpopup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" >
 <div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
   <button type="button" class="close" onClick="modalClearForm('reportpopup');" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">Report Reason</h4>
   </div>
   <form  onSubmit="reviewReportingSubmit();"  class="form-horizontal" id="reviewReport" name="reviewReport" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" >
   <div class="modal-body">
     <input type="hidden" id="rr_reid" name="rr_reid" value="">
     <input type="hidden" id="rr_reid_type" name="rr_reid_type" value="">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-4 control-label no_padding_label validate_c">Reason<span class="mstar" style="color:red;"> *</span></label>
       <div class="col-sm-7 select_style" >
         <select class="form-control" id="rr_report_reponse" name="rr_report_reponse" required data-fv-notempty-message="Required">
           <option value="">Reason</option>
           <option value="1">Spam</option>
           <option value="2">Inaccurate</option>
           <option value="3">Offensive</option>
           <option value="4">FUD</option>
         </select>
       </div>
     </div>
   </div>
   <div class="modal-footer">
     <span id="successmessagereponse" style="color:green"></span>
     <span class="vwdTitleError" style="color:#a94442;"></span>
       <span id="tp8" style="display:none;">
       <svg width='20px' height='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring-alt"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="#f9f9f9 " fill="none" stroke-width="10" stroke-linecap="round"></circle><circle cx="50" cy="50" r="40" stroke="#00a7af " fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="2s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="2s" repeatCount="indefinite" values="200.8 50.19999999999999;1 250;200.8 50.19999999999999"></animate></circle></svg>
     </span>
     <button type="button" class="btn btn-default btn-sm" onClick="modalClearForm('reportpopup');">Cancel</button>
     <button type="submit" class="btn btn-primary btn-sm">Save</button>
   </div>
   </form>
 </div>
 </div>
</div>



<div class="modal fade" id="ChangePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false" >
 <div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
   <button type="button" class="close" onClick="" aria-label="Close" data-dismiss="modal" title="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel">CHANGE PASSWORD</h4>
   </div>
    <form id="uChangePwd" name="uChangePwd" method="POST" class="form-horizontal"
										data-fv-message="This value is not valid"
										data-fv-icon-valid="glyphicon glyphicon-ok"
										data-fv-icon-invalid="glyphicon glyphicon-remove"
										data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="changePassword()">


      <div class="modal-body">

          <div class="form-group">
            <label for="inputEmail3" class="control-label">Current Password</label>
            <i class = "fa fa-eye cp-eye" id = "eye1"></i>
            <input type="password" class="form-control cp-form" id="o_u_password" name="o_u_password" placeholder="Current Password" value=""
													required data-fv-notempty-message="Please enter a current password">
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="control-label">New Password</label>
            <i class = "fa fa-eye cp-eye"></i>
            <input type="password" class="form-control cp-form" id="n_u_password" name="n_u_password" placeholder="New Password" value=""
                          required data-fv-notempty-message="Please enter a new password">
            <span id="ErrorM" style="font-size:14px;color:#a94442;"><?php if(isset($this->ErrorM) && $this->ErrorM!=""){ echo $this->ErrorM; }?></span>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="control-label">Confirm Password</label>
            <i class = "fa fa-eye cp-eye"></i>
            <input type="password" class="form-control cp-form" id="u_password" name="u_password" placeholder="Confirm Password" value=""
													required data-fv-notempty-message="Please enter a confirm password">
          </div>
          <input type="hidden" id="u_id" name="u_id" value="">
      </div>
      <div class="modal-footer">
      <button type="submit"  id="changePwdTbtn"  name="changePwdTbtn" class="btn btn-info pull-right">Save</button>
      <center><span id="success" style="color:green"></span></center>
											<center><span id="errMesg" style="color:red"></span></center>
											<center><span id="loadingError" style="display:none;"> Loading...</span></center>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delete_confirmation_modal_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="confirmation_delete_heading"></h3>
     </div>
     <div class="modal-body">
       <form class="form-horizontal">
     <div class="box-body">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
       <div class="col-sm-8">
       <p id="confirmation_delete_message">Are You Sure You Want to Delete your Review?</p>
       </div>
     </div>
     <input type="hidden" name="hidcmid" id="hidcmid">
     <input type="hidden" name="hidcType" id="hidcType">
     </div>
       </form>
     </div>
     <div class="modal-footer">
   <span id="successfullDelete" style="color:green"></span>
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       <button id="delete_button" type="button" class="btn btn-primary" onClick="confirmDeleteActions();" value="">Ok</button>
     </div>
   </div>
 </div>
</div>

<div class="modal fade" id="clickUrl_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
 <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="myModalLabel">Profile URL</h3>
     </div><br>
     <div class="modal-body">
       <form class="form-horizontal">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
       <div class="col-sm-8">
       <p>Profile not available</p>
       </div>
     </div>
       </form>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-info" onClick="urlconform();">Ok</button>
     </div>
   </div>
 </div>
</div>
<div class="modal fade" id="socia_pop_up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
 <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="myModalLabel">Social Link Confirmation</h3>
     </div><br>
       <div class="modal-body">
       <form class="form-horizontal">
     <div class="box-body">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
       <div class="col-sm-8">
       <p>Page not available</p>
       </div>
     </div>

     </div>
       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-info" onClick="socialconform();">Ok</button>
     </div>
   </div>
 </div>
</div>
<div class="modal fade" id="whats_pop_up" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
 <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title" id="myModalLabel">Whatsapp Share</h3>
     </div><br>
       <div class="modal-body">
       <form class="form-horizontal">
     <div class="box-body">
     <div class="form-group">
       <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;&nbsp;</label>
       <div class="col-sm-8">
       <p>Please share this article in mobile device</p>
       </div>
     </div>

     </div>
       </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-info" data-dismiss="modal">Ok</button>
     </div>
   </div>
 </div>
</div>


<!-- Comments Policy -->
<div class="modal fade" id="commPolocy_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="myModalLabel">Comments policy</h4>
     </div>
     <div class="modal-body">
       Will be updated soon..
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
     </div>
   </div>
 </div>
</div>
<!-- Terms and Conditions -->
<div class="modal fade" id="terms_conditions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="myModalLabel">Terms of use</h4>
     </div>
     <div class="modal-body">
       Will be updated soon..
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="button" class="btn btn-primary">Save changes</button>
     </div>
   </div>
 </div>
</div>
<!-- Terms and Conditions -->
<div class="modal fade" id="suggestions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-sm sm_ww" role="document">
   <div class="modal-content">
   <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     <h4 class="modal-title" id="myModalLabel">Hello, we'd like to hear your feedback.</h4>
   </div>
   <div class="box-body">
     <div class="col-md-12">
       <form onSubmit="subFeedback();"  class="form-horizontal" id="suggeform" name="suggeform" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh">
         <div class="box-body">
         <div class="">
           <div class="form-group">
             <label>Please provide your email(so we can follow up!) :</label>
               <input type="text" class="form-control" id="feedbackemail" name="feedbackemail" class="form-control" required data-fv-notempty-message="Email reqired" data-fv-regexp="true" data-fv-regexp-regexp="^[_a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$"  data-fv-regexp-message="The input is not a valid email address">
           </div>
           <div class="form-group">
             <label>Please submit any comments for us below.</label>
               <textarea type="text" class="form-control" id="comments" name="comments" class="form-control" required data-fv-notempty-message="Comments reqired"></textarea>
           </div>
           <div class="form-group">
             <label>Would you like to speak with us to share your site experience?</label>
               <button type="button" id="site" name="site" class="form-control btn btn-default" onClick="country()">Yes</button>
           </div>
           <div class="form-group" id="show_country" style="display:none;">
               <select id = "countryid" class="form-control" name="countryid" required data-fv-notempty-message="Country reqired.">
                 <option value="">-Please Select-</option>
               </select>
           </div>
         </div>
         </div>
         <div class="box-footer" style="padding: 10px 0">
           <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-default">Cancel
           </a>
           <button type="submit" id="contactus" name="contactus" class="btn btn-danger pull-right">SUBMIT FEEDBACK</button>
           <p style="text-align:center;" id="sucess_msg"></p>
           <p style="text-align:center;" id="err_msg"></p>
         </div>
       </form>

     </div>
   </div>
   </div>
 </div>
</div>
<script>
var $item = $('#carousel-example .item');
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');


$('#carousel-example img').each(function() {
 var $src = $(this).attr('src');
 var $color = $(this).attr('data-color');
 $(this).parent().css({
   'background-image' : 'url(' + $src + ')',
   'background-color' : $color
 });
 $(this).remove();
});

$(window).on('resize', function (){
 $wHeight = $(window).height();
 $item.height($wHeight);
});

$('#carousel-example').carousel({
 interval: 6000,
 pause: "false"
});


var d 		= new Date();
var time 	= d.getTime();
function country()
{
 $.ajax({
   type	: 	"GET",
   cache	:	false,
   url		: 	baseUrl+'/Careers/getContries?timeRef='+time,
   dataType : 'json',
   success	: 	function(res) {
     if(res.status=='1'){

       var countires = res.countries;
       $("#countryid").html(countires);
     }else{
       var countires = res.countries;
       $("#countryid").html(countires);
     }
   }
 });
 $('#show_country').toggle();
}
function socialPopup()
{
 $('#socia_pop_up').modal('show');
}
function socialconform()
{
 $('#socia_pop_up').modal('hide');
}
function commPolocymodal()
{
 $('#commPolocy_modal').modal('show');
}
function commPolocymodal()
{
 $('#commPolocy_modal').modal('hide');
}
function termsndconditions()
{
 $('#terms_conditions').modal('show');
}
function termsndconditions()
{
 $('#terms_conditions').modal('hide');
}
$(document).ready(function(e) {
 $('#suggeform').formValidation();
 var windowtz = $( window );
 var d 		= new Date();
 var time 	= d.getTime();
 /* windowtz.on("scroll", function(event) {
   var scrollHeight   = $(document).height();
   var scrollPosition = windowtz.height() + windowtz.scrollTop();
   // It is only Destops
   // if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
   // It works mobile device and Destops
   // alert('innerHeight '+window.innerHeight+'--scrollY- '+window.scrollY+'offsetHeight -'+document.body.offsetHeight);
   if((window.innerHeight + Math.round(window.scrollY)) >= document.body.offsetHeight){
     if($("#offsetpage").val()!=undefined && $("#offsetpage").val()!=0){
       var offsetpage  = $("#offsetpage").val();
       var limitpage   = $("#limitpage").val();
       var minCount    = $("#totcntcompanies").val();
       var pageMode    = $("#pageMode").val();
       var filterId    = $("#filter_id").val();
       var searchterms = $("#searchterms").val();
       if(searchterms.length>=4){
         searchterms = searchterms;
       }else{
         searchterms = "";
       }

       console.log(minCount+'--'+offsetpage);
       if(parseInt(minCount)>parseInt(offsetpage)){
         $("#loadingHash").removeClass("hide");
         $("#loadingHash").addClass("show");
         var url = baseUrl+'Company/loadmoreCompanies?expireTime='+time;
         $.ajax({
           type 		: 	"POST",
           url			:	url,
           cache: false,
           data: {limitpage:limitpage,offsetpage:offsetpage,pageMode:pageMode,filterId:filterId,searchterms:searchterms},
           type: 'post',
           dataType	: 	"json",
           success: function(data){
             console.log(data.output);
             if(data.output=='success'){
               if(parseInt(offsetpage) <= parseInt(data.cnt)){
                 $("#loadingHash").removeClass("show");
                 $("#loadingHash").addClass("hide");
                 $("#loadingData").append(data.resData);
                 $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt($('#offsetpage').val()) );
                 var $input = $('.rating-loading');
                 $input.rating();
                 $('.caption').hide();
                 $('.clear-rating').hide();
               }
             }else if(data.output=='norecoreds'){
               setTimeout(function(){
                 $("#loadingData").html(data.resData);
                 // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
               }, 1000);
             }
           }
         });
       }
     }
     $("#loadingHash").removeClass("show");
     $("#loadingHash").addClass("hide");
   }
 }); */
});
function GetMoreCompaniesLoad()
{
 if($("#offsetpage").val()!=undefined && $("#offsetpage").val()!=0){

       var offsetpage  = $("#offsetpage").val();
       var limitpage   = $("#limitpage").val();
       var minCount    = $("#totcntcompanies").val();
       var pageMode    = $("#pageMode").val();
       var filterId    = $("#filter_id").val();
       var searchterms = $("#searchterms").val();
       if(searchterms.length>=4){
         searchterms = searchterms;
       }else{
         searchterms = "";
       }

       console.log(minCount+'--'+offsetpage);
       if(parseInt(minCount)>parseInt(offsetpage)){
         $("#loadingHash").removeClass("hide");
         $("#loadingHash").addClass("show");
         var url = baseUrl+'Company/loadmoreCompanies?expireTime='+time;
         $.ajax({
           type 		: 	"POST",
           url			:	url,
           cache: false,
           data: {limitpage:limitpage,offsetpage:offsetpage,pageMode:pageMode,filterId:filterId,searchterms:searchterms},
           type: 'post',
           dataType	: 	"json",
           success: function(data){
             console.log(data.output);
             // alert(parseInt(data.cnt));
             if(data.output=='success'){
               if(parseInt(offsetpage) <= parseInt(data.cnt)){
                 $("#loadingHash").removeClass("show");
                 $("#loadingHash").addClass("hide");
                 $("#loadingData").append(data.resData);
                 $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt($('#offsetpage').val()) );
                 var $input = $('.rating-loading');
                 $input.rating();
                 $('.caption').hide();
                 $('.clear-rating').hide();
               }
               offsetpage  = $("#offsetpage").val();
               if(parseInt(offsetpage) >= parseInt(data.cnt))
               {
                 $('#loadingHash1').addClass('mm_bttom hide');
               }
             }else if(data.output=='norecoreds'){
               setTimeout(function(){
                 $("#loadingData").html(data.resData);
                 // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
               }, 1000);
             }
           }
         });
       }else{
         $('#loadingHash1').addClass('mm_bttom hide');
       }
     }
     $("#loadingHash").removeClass("show");
     $("#loadingHash").addClass("hide");

}
function changePassword() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#uChangePwd').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var currentPass = $('#o_u_password').val();
        var newPass = $('#n_u_password').val();
        var confirmPass = $('#u_password').val();
        if (typeof(currentPass) != "undefined" && currentPass != "") {
            if (currentPass == newPass) {
                $('#errMesg').html('');
                flag = false;
            } else {
                flag = true;
            }
            if (newPass != confirmPass) {
                $('#errMesg').html('The new password and its confirm password are not same.');
                flag = false;
            } else {
                flag = true;
            }
        }
        if (flag == true) {
            $('#loadingError').show();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'User/updatePassword?id=' + time,
                data: { newPass: newPass, currentPass: currentPass },
                success: function(data) {
                    $('#loadingError').hide();
                    if (data == '1') {
                        $('#o_u_password').val('');
                        $('#n_u_password').val('');
                        $('#u_password').val('');
                        $("#uChangePwd").trigger('reset');
                        $('#uChangePwd').formValidation('resetForm', true);
                        $('#uChangePwd').data('formValidation').resetForm();
                        $('#errMesg').html('');
                        $('#success').html('Password updated successfully');
                    } else {
                        $('#errMesg').html('');
                        $('#errMesg').html('Entered current password is wrong.');
                    }
                }
            });
        }
        e.preventDefault();
    });
}
function togglePass(){

  var pwd = document.getElementById('o_u_password');
  var eye = document.getElementById('eye1');
  eye.addEventListener('click',togglePass);
  eye.classList.toggle('active');
  (pwd.type == 'password') ? pwd.type = 'text': pwd.type = 'password';
}
</script>


 <!-- Fb Login-->
 <script>
 window.fbAsyncInit = function() {
   FB.init({
    appId       : '<?php echo FACE_CLIENT_ID;?>', // 1846713508988128 //309566389455597
     cookie     : true,
     xfbml      : true,
     version    : 'v2.8'
   });

   FB.getLoginStatus(function(response) {
     if (response.status === 'connected') {
       //display user data
      //   getFbUserData();
     }
   });
 };

 // Load the JavaScript SDK asynchronously
 (function(d, s, id) {
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) return;
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
 var clickedFb = 0;
 // Facebook login with JavaScript SDK
 function fbLogin() {
   FB.login(function (response) {
      if (response.authResponse) {
       getFbUserData();
     } else {
       document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
     }
   }, {scope: 'email'});
 }

 // Fetch the user profile data from facebook
 function getFbUserData(){
   // if(clickedFb != 0){
     FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture.width(200).height(200)'},
     function (response) {
       var userId    = response.id;
       var userName  = response.first_name;
       var last_name = response.last_name;
       var email     = response.email;
       var userPic   = response.picture.data.url;
       var gender    = response.gender;
       var user_data = new FormData();
       user_data.append('userId', userId);
       user_data.append('userName', userName);
       user_data.append('last_name', last_name);
       user_data.append('email', email);
       user_data.append('userPic', userPic);
       user_data.append('gender',gender);
       $.ajax({
         type 		: 	"POST",
         url			:	baseUrl+"Login/facebookloginbop?revertTime="+time,
         cache: false,
         contentType: false,
         processData: false,
         data: user_data,
         type: 'post',
         dataType:'json',
         success: function(data){
           if(data.output=="success"){
             window.location = baseUrl;
           }else{
             $('#scoial_hidden_common_fb').modal('show');
           }
         }
       });
     });
   // }
 }

 // Logout from facebook
 function logoutConfirm()
 {
   <?php if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=="fb"){ ?>
       fbLogoutt();
   <?php } else if(isset($_SESSION['loginwith']) && $_SESSION['loginwith']=="gmail"){ ?>
       $.ajax({
         type 		: 	"GET",
         jsonp		: 	"callback",
         dataType 	: 	"jsonp",
         url			:	"https://www.google.com/accounts/Logout",
         success		: 	function( response ){
           console.log(response);
         }
       });
   <?php } ?>
   $.ajax({
     type	: 	"GET",
     cache	:	false,
     url		: 	baseUrl+'Login/logout?expireTime='+time,
     success	: 	function(res) {
       if(res == 1)
       {
         window.location = baseUrl;
       }
     }
   });
 }



 function fbLogoutt() {
   FB.logout(function() { window.location = baseUrl; });
 }
 <?php if(!isset($_SESSION['user_id'])){ ?>
   $('#bopTLogin').oauthpopup({
     path: baseUrl+'twitter-login-auth/twitter',
     width:650,
     height:350,
   });
   $.ajax({
     type		:	'GET',
     url			: baseUrl+'twitter-login-auth/twitter_login',
     dataType	: 	"json",
     success: function(data){
       if(data.output!= '1'){
         console.log('Success');
       }else if(data.output=='1'){
         setTimeout(function(){
           $.ajax({
             type	: 	"GET",
             cache	:	false,
             url		: 	baseUrl+'Login/logout?expireTime='+time,
             success	: 	function(res) {
               $('#scoial_hidden_common_fb').modal('show');
             }
           });
         }, 1500);
       }
     }
   });
 <?php } ?>
 <?php if(!isset($_SESSION['user_id'])){ ?>
   $('#gplus').oauthpopup({
     path: baseUrl+'social-sign-in/google',
     width:650,
     height:350,
   });
   $.ajax({
     type		:	'GET',
     url			: baseUrl+'social-sign-in/google_login',
     dataType	: 	"json",
     success: function(data){
       if(data.output!= '1'){
         console.log('Success');
       }else if(data.output=='1'){
         setTimeout(function(){
           $.ajax({
             type	: 	"GET",
             cache	:	false,
             url		: 	baseUrl+'Login/logout?expireTime='+time,
             success	: 	function(res) {
               $('#scoial_hidden_common_fb').modal('show');
             }
           });
           $.ajax({
             type 		: 	"GET",
             jsonp		: 	"callback",
             dataType 	: 	"jsonp",
             url			:	"https://www.google.com/accounts/Logout",
             success		: 	function( response ){
               console.log(response);
               // $('#scoial_hidden_common_fb').modal('show');
             }
           });
         }, 1500);
       }
     }
   });
 <?php } ?>
 function countCharcter2(id)
 {
   var textLength = $('#crr_decript'+id).val().length;
   var FinalLength = parseInt(1000)-parseInt(textLength);
   if(parseInt(FinalLength) >=1){
     $('#r_char_cnt'+id).show();
     $('#review_char_count'+id).html(FinalLength);
   }else{
     $('#r_char_cnt'+id).hide();
     $('#review_char_count'+id).html('');
   }
 }
 function countCharcter1()
 {
   var textLength = $('#crrr_decript').val().length;
   var FinalLength = parseInt(1000)-parseInt(textLength);
   if(parseInt(FinalLength) >=1){
     $('#r_char_cnt1').show();
     $('#review_char_count1').html(FinalLength);
   }else{
     $('#r_char_cnt1').hide();
     $('#review_char_count1').html('');
   }
 }
 /* function subscriber(){
   $( "#subname" ).change(function() {
   $('#subname_error').html('');
 });
 $( "#subemail" ).change(function() {
   $('#subemail_error').html('');
 });
 } */




 </script>

 </body>
</html>
