<div class="content-wrapper">
	<div class="container-fluid banner_margin photo_margin linear_color banner-asset-margin mob_height_banner">
		<div class="row mmar_t40 mmar_b10 mar_t30 mar_b40">
			<div class="col-xs-12 text-center banner_head">
			<?php echo strtoupper($companyview['company_name']);?> REVIEWS
			<div class="row lg_hide m_height">
			<div class="text-center">
			<?php if($companyview['company_picture']!=""){
										//print_r($companyview['cm_ctid']);exit;
										if($companyview['cm_ctid'] == 2){ ?>
											<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$companyview['company_picture'].''; ?>" class="img-rounded asset-image"/>
									<?php }else if($companyview['cm_ctid'] == 1){
									if($companyview['company_picture']!="" && substr( $companyview['company_picture'], 0, 4 ) === "digi"){ ?>
											<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$companyview['company_picture'].'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded asset-image"/>
										<?php }else if(substr( $companyview['company_picture'], 0, 3 ) === "ico"){?>
											<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$companyview['company_picture'].'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded asset-image"/>
										<?php } else if($companyview['company_picture']!=""){
							$srcc= base_url().'asset/img/companies/digitalasset/'.$companyview['company_picture'];
											if (@getimagesize($srcc)){
										?>
											<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$companyview['company_picture'].'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded asset-image"/>
										<?php }else{ ?>
												<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-rounded asset-image"/>
											<?php }?>
										<?php } else { ?>
											<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-rounded asset-image"/>
										<?php } ?>

									<?php }	}
									else { ?>
									<img src="<?php echo base_url(); ?>images/Felix_the_Cat.jpg" class="img-rounded asset-image"/>
									<?php } ?>
								</div>
							</div>
				<!--<hr style="width:5%;border:2px solid #ffff">-->
			</div>
		</div>
	</div>
	<div class="row sm_hide">
	<div class="text-center col-md-3 col-md-offset-1">
	<?php if($companyview['company_picture']!=""){
								//print_r($companyview['cm_ctid']);exit;
								if($companyview['cm_ctid'] == 2){ ?>
									<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$companyview['company_picture'].''; ?>" class="img-rounded asset-image"/>
							<?php }else if($companyview['cm_ctid'] == 1){
							if($companyview['company_picture']!="" && substr( $companyview['company_picture'], 0, 4 ) === "digi"){ ?>
									<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$companyview['company_picture'].'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded asset-image"/>
								<?php }else if(substr( $companyview['company_picture'], 0, 3 ) === "ico"){?>
									<img src="<?php echo base_url().'asset/img/companies/icotracker/'.$companyview['company_picture'].'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded asset-image"/>
								<?php } else if($companyview['company_picture']!=""){
					$srcc= base_url().'asset/img/companies/digitalasset/'.$companyview['company_picture'];
									if (@getimagesize($srcc)){
								?>
									<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$companyview['company_picture'].'?id='.$viewTime; ?>" alt="Coinenthu" class="img-rounded asset-image"/>
								<?php }else{ ?>
										<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-rounded asset-image"/>
									<?php }?>
								<?php } else { ?>
									<img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-rounded asset-image"/>
								<?php } ?>

							<?php }	}
							else { ?>
							<img src="<?php echo base_url(); ?>images/Felix_the_Cat.jpg" class="img-rounded asset-image"/>
							<?php } ?>
						</div>
					</div>
	<!--<div  class="bread_crumb">
	<div class="container-fluid">
		<section class="content-header">
				<h1 class="text-right m_hide">
				  &nbsp;
				</h1>
				<ol class="breadcrumb">
				  <li><a href="</*?php echo base_url();?*/>"><i class="fa fa-dashboard"></i> Home</a></li>
				  </*?php if(isset($companyview['cm_ctid']) && $companyview['cm_ctid']==2){
					if($companyview['companyOwner']==1){
				  ?*/>
					<li class=""><a href="</*?php echo base_url();?*/>my-ico-trackers">My ICO Trackers</a></li>
					</*?php }else{ ?*/>
					<li class=""><a href="</*?php echo base_url();?*/>ico-tracker">ICO Tracker</a></li>
					</*?php } ?*/>
				  </*?php } else{
					if($companyview['companyOwner']==1){
				  ?*/>
					<li class=""><a href="</*?php echo base_url();?*/>my-digital-assets">My Digital Assets</a></li>
					</*?php }else{ ?*/>
					<li class=""><a href="</*?php echo base_url();?*/>digital-assets">Digital Assets</a></li>
					</*?php } ?*/>
				  </*?php } ?*/>
				  <li class="active"></*?php echo ucfirst($companyview['company_name']);?*/></li>
				</ol>
		</section>
	</div>
</div>-->
<?php
	$cm_name = str_replace(' ','_',$companyview['company_name']);
	$cm_unique_id = $companyview['cm_unique_id'];
	if($companyview['cm_ctid'] == 1){
		$shareUrl = base_Url().'DigitalAssets/'.$cm_name;
	}else if($companyview['cm_ctid'] == 2){
		$shareUrl = base_Url().'ICOs/'.$cm_name;
	}
	$shareVia = '';
	$shareText = '';

?>
    <div class = "container-fluid mar_b80 mar_tn10 mar_tm30">
		<div class ="row">
			<div class="col-md-3 col-md-offset-1 col-xs-12 xs-offset-0 asset-boxes text-left md_equal_margin">
				<div class="text-center">
					<h3  class="company_name mar_t10 mar_b0"><?php echo strtoupper($companyview['company_name']);?>&nbsp;<div style="position:relative;display:inline;cursor:pointer;"><i class="fa fa-share-alt share_icon" onclick="shareCoin();"></i>
						<ul class="social_share social-network social-circle sharing_img company_box_shadow sharing_img_new m_hide">
							<?php
							if($companyview['cm_ctid'] == 1){
								$whatsappLink = base_url().'DigitalAssets/'.$cm_name;
							}else if ($companyview['cm_ctid']  == 2){
								$whatsappLink = base_url().'ICOs/'.$cm_name;
							}
							?>
								<li><a href="<?php echo "https://twitter.com/intent/tweet?url=".$shareUrl."&via=". $shareVia."&text=". $shareText; ?>" target='_blank' class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li>
								<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" .$shareUrl; ?>" target='_blank' class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
								</li>
								<li><a href="<?php echo "https://plus.google.com/share?url=". $shareUrl; ?>" target='_blank' class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
								<li>
								<!--<a target="_blank" href="https://web.whatsapp.com/send?text=<?php // echo $whatsappLink; ?>" data-action="share/whatsapp/share" title="Whatsapp" class="icoWhatsapp"><i class="fa fa-whatsapp" ></i></a>-->
								<a data-text="<?php echo $companyview['company_name']; ?>" data-link="<?php
								if($companyview['cm_ctid'] == 1){
									echo 'http://Coinenthu.com/DigitalAssets/'.$cm_name;
								}else if($companyview['cm_ctid'] == 2){
									echo 'http://Coinenthu.com/ICOs/'.$cm_name;
								}
								?>" class="icoWhatsapp" title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
								</li>
							</ul>
					</div>
					<br>	<ul class="social_share social-network social-circle company_box_shadow sharing_img sharing_img_new big_hide">
						<?php
						if($companyview['cm_ctid'] == 1){
							$whatsappLink = base_url().'DigitalAssets/'.$cm_name;
						}else if ($companyview['cm_ctid'] == 2){
							$whatsappLink = base_url().'ICOs/'.$cm_name;
						}
						?>
							<li><a href="<?php echo "https://twitter.com/intent/tweet?url=".$shareUrl."&via=". $shareVia."&text=". $shareText; ?>" target='_blank' class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
							<li>
							<a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" .$shareUrl; ?>" target='_blank' class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
							</li>
							<li><a href="<?php echo "https://plus.google.com/share?url=". $shareUrl; ?>" target='_blank' class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
							<li>
							<!--<a target="_blank" href="https://web.whatsapp.com/send?text=<?php // echo $whatsappLink; ?>" data-action="share/whatsapp/share" title="Whatsapp" class="icoWhatsapp"><i class="fa fa-whatsapp" ></i></a>-->
							<a data-text="<?php echo $companyview['company_name']; ?>" data-link="<?php
							if($companyview['cm_ctid'] == 1){
								echo 'http://Coinenthu.com/DigitalAssets/'.$cm_name;
							}else if ($companyview['cm_ctid'] == 2){
								echo 'http://Coinenthu.com/ICOs/'.$cm_name;
							}
							?>"class="icoWhatsapp" title="Whatsapp"><i class="fa fa-whatsapp"></i></a>
							</li>
						</ul>
					</h3>


					<p class="adjust_margin" style="margin:0px 0px 5px;">
						<input id="input-6" name="input-6" class="rating rating-loading" value="<?php echo $companyview['cm_overallrating']; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
						<span>
						<?php if($companyview['cm_totalviews']!="") { echo $companyview['cm_totalviews']. ' reviews'; } ?>
						</span>

					</p>
					<p>
					<?php
							if($companyview['cm_siteurl']!=""){
								$webSiteUrl = $companyview['cm_siteurl'];
								$target = "target='_blank'";
								if (strpos($webSiteUrl, 'http') !== false) {
									$webSiteUrl = $webSiteUrl;
								}else{
									$webSiteUrl = '//'.$webSiteUrl;
								}
							}else{
								$webSiteUrl = "#";
								$target = "";
							}
					?>
						<span><a style = "text-decoration:underline;" href="<?php echo $webSiteUrl; ?>"
						<?php echo $target;?>>View Site</a></span>
					</p>
					<div class="row">
						<div class="col-xs-6 col-xs-offset-3 pad_0 mar_t10">
					<a href="javascript:void(0)" onclick="ReviewAllow();" class="col-xs-12 btn btn-cstm btn-review">Leave a Review</a>
				</div>
			</div>
				</div>
				<?php
						if(isset($companyview['cm_ico_end_date']) && $companyview['cm_ico_end_date'] != "" && $companyview['cm_ico_end_date'] >= date('Y-m-d') && $companyview['cm_ctid'] == 2){
						?>
						<div class="mar_t10">
						<hr>
							<?php
								$options = array();
								$optt    = '';
								$optEnd  = '';
								foreach (range(0,23) as $fullhour)
								{
								   $parthour = $fullhour > 12 ? $fullhour - 12 : $fullhour;
								   $sufix = $fullhour > 11 ? " PM" : " AM";
									if($parthour == '0')
									{
										$partHr = '12';
									}else{

										$partHr = $parthour;
									}
								   $options["$fullhour:00"] = $partHr.":00".$sufix;
								   $options["$fullhour:30"] = $partHr.":30".$sufix;
								}
								foreach($options as $k=>$opt)
								{
									if($companyview['cm_ico_start_time'] == $k)
									{
										$optt = $opt;
									}
								}
								foreach($options as $k=>$opt)
								{
									if($companyview['cm_ico_end_time'] == $k)
									{
										$optEnd = $opt;
									}
								}
								$originalDateS = $companyview['cm_ico_start_date'];
								$newDateS = date("d/m/Y", strtotime($originalDateS));
								$originalDateE = $companyview['cm_ico_end_date'];
								$newDateE = date("d/m/Y", strtotime($originalDateE));
							?>

							<h4> Start Date :  <?php echo $newDateS; ?> <?php if($optt!=""){ echo ' - '.$optt; } ?> </h4>
							<h4>End Date &nbsp;    :  <?php echo $newDateE; ?> <?php if($optEnd!=""){ echo ' - '.$optEnd; } ?></h4>
							<h4 id="demo"></h4>
						</div>
						<?php }else{ ?><h4 id="demo" style="display:none;"></h4><?php } ?>
						<?php if($companyview['cm_marketcap'] != "") { ?>
						<div class="mar_t10 market_value_count mar_t10 text-center">
						<?php
							if(isset($companyview['api_data']) && $companyview['api_data'] == 1)
							{?>
							<div class="text-left"><table class="table">
								<?php if($companyview['cm_ctid'] != 2){ ?>
								<tr><td class="mbrg_top_n"><h4 class="no-margin">Market Cap  </h4></td><td class="mbrg_top_n"><h4 class="NoirProLight no-margin"><a href="javascript:void('')" style="cursor :default;color:#404852;" id="mId">$<?php echo  number_format($companyview['cm_marketcap']); ?> </a></h4></td></tr>
								<tr><td><h4 class="no-margin">Current price </h4></td><td><h4 class="NoirProLight no-margin"> <a href="javascript:void('')" style="cursor :default;color:#404852;" id="curId">$<?php echo  number_format($companyview['price_usd'], 2, '.', ','); ?> </a></h4></td></tr>
								<tr><td><h4 class="no-margin">24 hr Volume  </h4></td><td><h4 class="NoirProLight no-margin"><a href="javascript:void('')" style="cursor :default;color:#404852;" id="volId">$<?php echo  number_format($companyview['24h_volume_usd']); ?> </a></h4></td></tr>
								<tr><td><h4 class="no-margin">Change (24 hr)  </h4></td><td><h4 class="NoirProLight no-margin"><a href="javascript:void('')" style="cursor :default;color:#404852;" id="chaId"><?php echo  $companyview['percent_change_24h']; ?>%</a></h4></td></tr>
								<?php } ?>
								</table></div>
							<?php
							}else if(isset($companyview['api_data']) && $companyview['api_data'] == 0)
							{?><div class="text-left"><table class="table">
								<?php if($companyview['cm_ctid'] == 1){ ?>
									<tr><td class="mbrg_top_n"><h4 class="no-margin">Market Cap  </h4></td><td class="mbrg_top_n"><h4 class="NoirProLight no-margin"><a href="javascript:void('')" style="cursor :default;color:#404852;">$<?php echo  number_format($companyview['cm_marketcap']); ?> </a></h4></td></tr>
								<tr><td><h4 class="no-margin">Current price </h4></td><td><h4 class="NoirProLight no-margin"> <a href="javascript:void('')" style="cursor :default;color:#404852;" id="curId">$<?php echo  number_format($companyview['price_usd'], 2, '.', ','); ?> </a></h4></td></tr>
								<tr><td><h4 class="no-margin">24 hr Volume  </h4></td><td><h4 class="NoirProLight no-margin"><a href="javascript:void('')" style="cursor :default;color:#404852;" id="volId">$<?php echo  number_format($companyview['24h_volume_usd']); ?> </a></h4></td></tr>
								<tr><td><h4 class="no-margin">Change (24 hr)  </h4></td><td><h4 class="NoirProLight no-margin"><a href="javascript:void('')" style="cursor :default;color:#404852;" id="chaId"><?php echo  $companyview['percent_change_24h']; ?>%</a></h4></td></tr>
								<?php } ?>
								<!--<h4 class="no-margin pad_b5">Market Cap : $<a href="javascript:void('')" style="cursor :default"><?php // echo  $companyview['cm_marketcap']; ?> </a></h4>-->
								</table></div>
							<?php

							}

						?>

						</div>
						<?php } ?>


				<?php if($companyview['cot_name'] != "") { ?>
					<div class="mar_t10">
					<hr>
						<h4 class="no-margin asset-heading pad_b5">Founding Team </h4>
							<?php if(sizeof($companyview['cot_name'])>0) {
							$arraySize = count($companyview['cot_name']);
							$i=1;
							foreach($companyview['cot_name'] as $key=>$foundTeam){
								$profileUrl ="";
								if($companyview['cot_profile_url'][$key]!=""){
									$profileUrl = $companyview['cot_profile_url'][$key];
									$target = "target='_blank'";
								}
								$comma = ($i<$arraySize) ? ", " : "";
								if($profileUrl == "")
								{
							?>
							<a class="left_panel_desc" href="javascript:void(0);" onClick="checkedUrl();" ><?php echo ucfirst($foundTeam).$comma; ?></a>
							<span id='clik_url'></span>
								<?php }else {
									if (strpos($profileUrl, 'http') !== false) {
										$cUrl = $profileUrl;
									}else{
										$cUrl = '//'.$profileUrl;
									}
								?>
								<a class="left_panel_desc" href="<?php echo $cUrl; ?>" <?php echo $target;?> ><?php echo ucfirst($foundTeam).$comma; ?></a>
								<?php } ?>
							<?php  $i++; } } else{ echo "No Founding Team"; } ?>
					</div>
					<?php } ?>


				<?php if($companyview['adt_name'] != "") { ?>
					<div class="mar_t10 ">
					<hr>
						<h4 class="no-margin asset-heading pad_b5">Advisory Team </h4>
							<?php if(sizeof($companyview['adt_name'])>0) {
							$arraySize = count($companyview['adt_name']);
							$i=1;
							foreach($companyview['adt_name'] as $key=>$advisoryTeam){
								$adtprofileUrl ="";
								if($companyview['adt_profile_url'][$key]!=""){
									$adtprofileUrl = $companyview['adt_profile_url'][$key];
									$target = "target='_blank'";
								}
								$comma = ($i<$arraySize) ? ", " : "";
								if($adtprofileUrl == "")
								{
							?>
							<a class="left_panel_desc" href="javascript:void(0);" onClick="checkedUrl();" ><?php echo ucfirst($advisoryTeam).$comma; ?></a>
							<span id='clik_url'></span>
								<?php }else {
									if (strpos($adtprofileUrl, 'http') !== false) {
										$adUrl = $adtprofileUrl;
									}else{
										$adUrl = '//'.$adtprofileUrl;
									}
								?>
								<a class="left_panel_desc" href="<?php echo $adUrl; ?>" <?php echo $target;?> ><?php echo ucfirst($advisoryTeam).$comma; ?></a>
								<?php } ?>
							<?php  $i++; } } else{ echo "No Advisory Team"; } ?>
					</div>
					<?php } ?>

				<?php if($companyview['resource_name'] != "") { ?>
						<div class="mar_t10">
						<hr>
						<h4 class="no-margin pad_b5">Resources </h4>
							<?php if(sizeof($companyview['resource_name'])>0) {
							$arraySize = count($companyview['resource_name']);
							$i=1;
							foreach($companyview['resource_name'] as $key=>$resource){
								$rsrcprofileUrl ="";
								if($companyview['resource_url'][$key]!=""){
									$rsrcprofileUrl = $companyview['resource_url'][$key];
									$target = "target='_blank'";
								}
								$comma = ($i<$arraySize) ? ", " : "";
								if($rsrcprofileUrl == "")
								{
							?>
							<a href="javascript:void(0);" onClick="checkedUrl();" ><?php echo ucfirst($resource).$comma; ?></a>
							<span id='clik_url'></span>
								<?php }else {

								if (strpos($rsrcprofileUrl, 'http') !== false) {
										$rUrl = $rsrcprofileUrl;
									}else{
										$rUrl = '//'.$rsrcprofileUrl;
									}
								?>
								<a href="<?php echo $rUrl; ?>" <?php echo $target;?> ><?php echo ucfirst($resource).$comma; ?></a>
								<?php } ?>
							<?php  $i++; } } else{ echo "No Resources"; } ?>
						</div>
						<?php } ?>
						<?php if($companyview['cm_ctid'] == 2 && $companyview['escrow_name'] !="") { ?>
						<div class="mar_t10">
						<hr>
						<h4 class="no-margin pad_b5">Escrow Details</h4>
							<!--<p><?php // echo $companyview['cm_escrow']; ?></p>-->
							<?php if(sizeof($companyview['escrow_name'])>0) {
							$arraySize = count($companyview['escrow_name']);
							$i=1;
							foreach($companyview['escrow_name'] as $key=>$escrowDtls){
								$adtprofileUrl ="";
								if($companyview['escrow_url'][$key]!=""){
									$adtprofileUrl = $companyview['escrow_url'][$key];
									$target = "target='_blank'";
								}
								$comma = ($i<$arraySize) ? ", " : "";
								if($adtprofileUrl == "")
								{
							?>
							<a href="javascript:void(0);" onClick="checkedUrl();" ><?php echo ucfirst($escrowDtls).$comma; ?></a>
							<span id='clik_url'></span>
								<?php }else {
								if (strpos($adtprofileUrl, 'http') !== false) {
										$esUrl = $adtprofileUrl;
									}else{
										$esUrl = '//'.$adtprofileUrl;
									}
								?>
								<a href="<?php echo $esUrl; ?>" <?php echo $target;?> ><?php echo ucfirst($escrowDtls).$comma; ?></a>
								<?php } ?>
							<?php  $i++; } } else{ echo "No Escrow Details"; } ?>
						</div>
						<?php } ?>
						<?php if($companyview['ms_title'] != "") { ?>
						<div class="mar_t10">
						<hr>
						<h4 class="no-margin asset-heading pad_b10">Project Updates</h4>
							<?php if(sizeof($companyview['ms_title'])>0){ $i=1; echo '<ul style="padding-left:20px;">';foreach($companyview['ms_title'] as $key=>$milestones){
							if($i==1){
								$mar_t10 = '';
							}else{
								$mar_t10 = 'mar_t10';
							}
							?>
							<?php if (strpos($companyview['ms_link'][$key], 'http') !== false) {
										$msUrl = $companyview['ms_link'][$key];
									}else{
										$msUrl = '//'.$companyview['ms_link'][$key];
									}
								?>
							<!--<div class="pending_bg pos_r <?php echo $mar_t10; ?>" style="padding:10px 0px;">-->
							<!--<div class="pending_b"><img src="<?php// echo base_url(); ?>images/pending.png" width="30"></div>-->
							<!--<div class="mailston_bg" style="border-left:none;">--><li><a href = "<?php echo $msUrl; ?>" title = "<?php echo $milestones; ?>" target = "_blank"><?php echo $milestones; ?></a></li><!--</div></div>-->
							<?php $i++; }echo '</ul>' ;} else{ echo "No Project Updates"; } ?>
						</div>
						<?php } ?>
						<div class="mar_t10 text-center">
							<hr>
							<ul class="social-network social-circle social_brg_b pad_0">
								<?php
									/* if($companyview['cm_facebook']!=""){
										$facebookUrl = $companyview['cm_facebook'];
										$target = "target='_blank'";
									}*/

									$target = "target='_blank'";
								?>
								<?php if($companyview['cm_github'] != "") {
								$URL = $companyview['cm_github'];
								$githubWeblink =   $URL;
								if(strpos($githubWeblink, "http") !== false){
									$githubWeblink =   $URL;
								}
								else {
									$githubWeblink = "//".$githubWeblink;
								}
								?>
								<li><a href="<?php echo $githubWeblink; ?>" <?php echo $target;?> class="github_c" title="Github"><i class="fa fa-github" ></i></a></li>
								<?php } ?>
								<?php
								if($companyview['cm_twitter'] != "") {
								$URL = $companyview['cm_twitter'];
								$twitterWeblink =   $URL;
								if(strpos($twitterWeblink, "http") !== false){
									$twitterWeblink =   $URL;
								}
								else {
									$twitterWeblink = "//".$twitterWeblink;
								}
								?>
								<li><a href="<?php echo $twitterWeblink; ?>" <?php echo $target;?> class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<?php } ?>
								<?php if($companyview['cm_telegram'] != "") {
								$URL = $companyview['cm_telegram'];
								$telegramWeblink =   $URL;
								if(strpos($telegramWeblink, "http") !== false){
									$telegramWeblink =   $URL;
								}
								else {
									$telegramWeblink = "//".$telegramWeblink;
								}
								?>
								<li><a href="<?php echo $telegramWeblink; ?>" <?php echo $target;?> class="icoLinkedin" title="Telegram"><i class="fa "><img style="margin-top:-3px;margin-left:0;width:12px" src="<?php echo base_url();?>asset/forntend/images/telegram.png"/></i></a></li>
								<?php } ?>
								<?php
								if($companyview['cm_discord'] != "") {
								$URL = $companyview['cm_discord'];
								$discordWeblink =   $URL;
								if(strpos($discordWeblink, "http") !== false){
									$discordWeblink =   $URL;
								}
								else {
									$discordWeblink = "//".$discordWeblink;
								}
								?>
								<li><a href="<?php echo $discordWeblink; ?>" <?php echo $target;?> class="discord" title="Discord"><i class="fa "><img style="margin-top: -3px;margin-left: 0px;" src="<?php echo base_url();?>asset/forntend/images/discord.png"/></i></a></li>
								<?php } ?>

								<?php if($companyview['cm_slack'] != "") {
								$URL = $companyview['cm_slack'];
								$slackWeblink =   $URL;
								if(strpos($slackWeblink, "http") !== false){
									$slackWeblink =   $URL;
								}
								else {
									$slackWeblink = "//".$slackWeblink;
								}
								?>
								<li><a href="<?php echo $slackWeblink; ?>" <?php echo $target;?> class="icoGoogle" title="Slack"><i class="fa "><img style="margin-top:-3px;margin-left:0" src="<?php echo base_url();?>/asset/forntend/images/slack_ie11.png"/></i></a></li>
								<?php } ?>
								<?php if($companyview['cm_coinmarket_cap'] != "") {
								$URL = $companyview['cm_coinmarket_cap'];
								$coinmarketWeblink =   $URL;
								if(strpos($coinmarketWeblink, "http") !== false){
									$coinmarketWeblink =   $URL;
								}
								else {
									$coinmarketWeblink = "//".$coinmarketWeblink;
								}
								?>
								<li><a href="<?php echo $coinmarketWeblink; ?>" <?php echo $target;?> class="icon_market" title="Coinmarketcap"><i class="fa "><img style="margin-top:-3px;margin-left:0;width:13px" src="<?php echo base_url();?>asset/forntend/images/coinmarket.png"/></i></a></li>
								<?php } ?>
								<?php if($companyview['cm_facebook'] != "") {
								$URL = $companyview['cm_facebook'];
								$fbWeblink =   $URL;
								if(strpos($fbWeblink, "http") !== false){
									$fbWeblink =   $URL;
								}
								else {
									$fbWeblink = "//".$fbWeblink;
								}
								?>
								<li><a href="<?php echo $fbWeblink; ?>" <?php echo $target;?> class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<?php } ?>

								<!--<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
								<li><a <?php echo $target;?> href="<?php echo $linkedinUrl; ?>" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>-->
							</ul>
						</div>
			</div>
			<div class = "col-md-7 mar_l30 col-xs-12">
				<div class= "row asset-boxes asset-padding text-justify">
				<!--<p><//?php echo ucfirst($companyview['company_desc']); ?></p>-->
				<p><?php if(strlen($companyview['company_desc']) < 300){
								$string2 = strip_tags($companyview['company_desc']);
							}
						else{
							$string2 = strip_tags($companyview['company_desc']);
							$stringCut2 = substr($string2, 0, 300);
							$string2 = substr($stringCut2, 0, strrpos($stringCut2, ' ')).'... <a style="cursor:pointer;color:#1546a5" href="javascript:void(0);" onClick="readMoreSpan('.$companyview['company_id'].');">More <i class="fa fa-angle-double-right font_s16" aria-hidden="true"></i></a>';
							}

						?>
							<span id="spanLess_<?php echo $companyview['company_id']; ?>" style="overflow-wrap: break-word;"><?php echo $string2; ?></span>
							<span id="expandSpan_<?php echo $companyview['company_id']; ?>" style="display:none;overflow-wrap: break-word;" > <?php echo $companyview['company_desc'].' '.'<a href="javascript:void(0);" onClick="readLessSpan('.$companyview['company_id'].');"><i class="fa fa-angle-double-left font_s16" aria-hidden="true"></i> Less </a>'; ?></span></p>
				</div>
				<div class= "row" style="padding:5px 0px 5px 0px;">
					<ul class="nav navbar-nav" style="float:right;">
							<li class="dropdown mpull_right select_dropdown ma_dw" id="change_u">
		 					 <span class="for-border">
							 <span id="sort_by">Sort By</span><button class="btn btn-default dropdown-toggle review_dw no-border" type="button" data-toggle="dropdown" aria-expanded="true" id="filtername">
		   					<?php
		   						if($companyview['results_type'] == 'likes')
		   							{
			   							echo 'Up Votes';
		   							}else if($companyview['results_type'] == 'dislikes')
		   							{
										echo 'Down Votes';
		   							}else if($companyview['results_type'] == 'oldest')
		   							{
										echo 'Oldest';
		   							}else if($companyview['results_type'] == 'newlist')
		   							{
										echo 'Newest';
		   							}else{

			   							echo 'Up Votes';
		   							}
		   					?></span>
							<div class="arrow_down"><span class="caret"></span></div>
		  					</button>
		  					<ul class="dropdown-menu user_dropdown_t" role="menu" style="left:0px;">
								<li><a onClick="fullViewFilter('likes',1);" href="javascript:void('0')">Up Votes</a></li>
								<li><a onClick="fullViewFilter('dislikes',1);" href="javascript:void('0')">Down Votes</a></li>
								<li><a onClick="fullViewFilter('oldest',1);" href="javascript:void('0')">Oldest</a></li>
								<li><a onClick="fullViewFilter('newlist',1);" href="javascript:void('0')">Newest</a></li>
		  					</ul>
							</li>
					</ul>
			    </div>
                <div class = "row asset-boxes reviews_lastborder pad_0">
				    <?php if(sizeof($companyview['reviews'])>0){foreach($companyview['reviews'] as $cr=>$review){

								if($review->u_username!=""){
									$u_username = ucfirst($review->u_username);
								}else if($review->u_firstname!=""){
									$u_username = ucfirst($review->u_firstname);
								}else{
									$u_username = "Guest User";
								}
					?>
					<div class="row border_bottom asset-padding mar_0" id="review_<?php echo $review->re_id; ?>">
					<div class = "col-md-2 col-xs-12">
					<a href = "<?php
									if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
										$uid = $_SESSION['user_id'];
									}else{
										$uid = "";
									}
									if ($uid == $review->u_uid){
										echo base_url().'display-profile';
									}else{
										echo base_url().'view-profile/'.str_replace(' ','_',$review->u_username);
									}									
									?>" title = "<?php
									if($uid == $review->u_uid){
										echo 'View Your Profile';
									}else{
										echo 'Visit '.$review->u_username.'\'s Profile';
									}
									?>">
						<?php if($review->u_picture!=""){ ?>
						<img class="img-circle review-image" src="<?php echo base_url().'asset/img/users/'.$review->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
						<?php }else if($review->u_social_pic!=""){ ?>
						<img class="img-circle review-image" src="<?php echo $review->u_social_pic; ?>" alt="<?php echo $u_username; ?>">
						<?php }else{?>
						<img class="img-circle review-image" src="<?php echo base_url(); ?>asset/img/alt.jpg" alt="user image">
						<?php } ?>
					</a>	
					</div>
					<div class = "col-md-10 col-xs-12">
						<div class = "col-xs-12" style="padding-top:15px;">
							<span class="pull-right">
									<?php
										if($uid!=""){
											if($uid == $review->re_uid){
									?>
									<div class="dropdown edde_hover" style="float:right;">
	                  <button class="btn btn-dis dropdown-toggle" type="button" data-toggle="dropdown">
	                  <span class="fa fa-ellipsis-h"></span></button>
	                  <ul class="dropdown-menu display-dropdown dropdown_style">
	                    <li><a href="<?php echo base_url();?>edit-review/<?php echo $review->re_id; ?>"><span id="review_edit_id_<?php echo $cr; ?>"><i class="fa fa-pencil-square mar_r10" aria-hidden="true"></i>Edit</span></a></li>
	                    <li><a  onclick="deleteComment('<?php echo $review->re_id; ?>');"><i class="fa fa-trash" aria-hidden="true"></i>Delete
	      							</a></li>
	                  </ul>
	                </div>

									<?php } } ?>
							</span>
							<input id="input-6" name="input-6" class="rating rating-loading" value="<?php echo $review->re_rating; ?>" data-min="0" data-max="5" data-step="1" data-size="xss" data-readonly="true" style="font-size:16px">
							<?php 
							if($uid == $review->u_uid){
								echo 'By'.' '.'<span style="font-family:NoirPro Medium;font-weight: 500;"><a href = "'.base_url().'display-profile">'.$u_username.'</a></span>';
							}else{
								echo 'By'.' '.'<span style="font-family:NoirPro Medium;font-weight: 500;"><a href = "'.base_url().'view-profile/'.str_replace(' ','_',$review->u_username).'">'.$u_username.'</a></span>';
							}
							?>
							<?php
									$old_date = timeago($review->re_createdat);
									echo '<div class="time_stamp">'.$old_date.'</div>';

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

						</div>
						<div class = "col-xs-12" style="padding-top:2px;padding-bottom:2px;">
						<?php
						    if(strlen($review->re_decript) < 150){
								$string = $review->re_decript;
							}
							else{
								$string = strip_tags($review->re_decript);
								$stringCut = substr($string, 0, 150);
								$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="cursor:pointer;color:#1546a5" href="javascript:void(0);" onClick="readMoreSpan('.$review->re_id.');">More <i class="fa fa-angle-double-right font_s16" aria-hidden="true"></i></a>';
							}

						?>
							<span id="spanLess_<?php echo $review->re_id; ?>" style="overflow-wrap: break-word;"><?php echo $string; ?></span>
							<span id="expandSpan_<?php echo $review->re_id; ?>" style="display:none;overflow-wrap: break-word;" > <?php echo $review->re_decript.' '.'<a href="javascript:void(0);" onClick="readLessSpan('.$review->re_id.');"><i class="fa fa-angle-double-left font_s16" aria-hidden="true"></i> Less </a>'; ?></span>
						</div>
						<div class = "col-xs-12" style="padding-top:2px;padding-bottom:2px;">
							<div class="col-xs-12 col-sm-8 col-md-12 col-lg-8 pad_0">
							<?php
							if(isset($_SESSION['user_id']))
							{
								if($uid == $review->re_uid){
							?>
							<button id="reply_dislike_pop<?php echo $review->re_id; ?>" onClick="reply_Message('<?php echo $review->re_id; ?>');" class="btn btn-default btn_dislike_new clickable"><i class="fa fa-reply" aria-hidden="true"></i><span class = "reply-button-text">Reply</span></button>
							<?php } else { ?>
								<button id="reply_dislike_pop<?php echo $review->re_id; ?>" onClick="reply_Message('<?php echo $review->re_id; ?>');" class="btn btn-default btn_dislike_new clickable"><i class="fa fa-reply" aria-hidden="true"></i><span class = "reply-button-text">Reply</span></button>
							<button id="btn_like_<?php echo $review->re_id; ?>" onClick="reviewLikeDisLike('<?php echo $re_likes_cnt; ?>','<?php echo $review->re_id; ?>','like','review','<?php echo $cr; ?>');" class="btn btn-default btn_dislike_new"><?php $checkedRes1 = $this->Companies_model->checkUserLiked($uid,$review->re_id,'like');
							      if(isset($checkedRes1->rr_id) && $checkedRes1->rr_id!=''){
									echo ' <i class="fa fa-thumbs-up" aria-hidden="true" style="color:#065FD4;"></i><span class = "like-button-text" style="color:#065FD4;">Liked</span>';
									}
								  else{
									echo ' <i class="fa fa-thumbs-up" aria-hidden="true"></i><span class = "like-button-text">Like</span>';
								  }
							?></button>
							<button id="btn_dislike_<?php echo $review->re_id; ?>" onClick="reviewLikeDisLikee('<?php echo $re_dislike_cnt; ?>','<?php echo $review->re_id; ?>','dislike','review','<?php echo $cr; ?>');" class="btn btn-default btn_dislike_new"><?php
							$checkedRes2 = $this->Companies_model->checkUserLiked($uid,$review->re_id,'dislike');
							if(isset($checkedRes2->rr_id) && $checkedRes2->rr_id!=''){
								echo '<i class="fa fa-thumbs-down" aria-hidden="true" style="color:#065FD4;"></i><span class = "dislike-button-text" style="color:#065FD4;">Disliked</span>';
							   }
							else{
								echo '<i class="fa fa-thumbs-down" aria-hidden="true"></i><span class = "dislike-button-text">Dislike</span>';
							}
							?></button>
							<?php
									$reportedStatus = checkUserReport($uid,$review->re_id);
							?>
							<?php if($reportedStatus==1){ ?>
							<span id="reviewReportId_<?php echo $review->re_id; ?>"><button onclick="reviewReportMethod('<?php echo $review->re_id; ?>','reviewpreport','alreadyU');" class="btn btn-default btn_dislike_new"><i class="fa fa-flag" aria-hidden="true"></i><span class="report-button-text">Reported</span></button></span>
							<?php }else{ ?>
							<span id="reviewReportId_<?php echo $review->re_id; ?>"><button onclick="reviewReportMethod('<?php echo $review->re_id; ?>','reviewpreport','');" class="btn btn-default btn_dislike_new"><i class="fa fa-flag" aria-hidden="true"></i><span class = "report-button-text">Report</span></button></span>
							<?php } ?>
							<?php }}else{ ?>
							<button id="reply_dislike_pop<?php echo $review->re_id; ?>" onClick="reply_Message('<?php echo $review->re_id; ?>');" class="btn btn-default btn_dislike_new clickable"><i class="fa fa-reply" aria-hidden="true"></i><span class = "reply-button-text">Reply</span></button>
							<button id="btn_like_<?php echo $review->re_id; ?>" onClick="reviewLikeDisLike('<?php echo $re_likes_cnt; ?>','<?php echo $review->re_id; ?>','like','review','<?php echo $cr; ?>');" class="btn btn-default btn_dislike_new"> <i class="fa fa-thumbs-up" aria-hidden="true"></i><span class = "like-button-text">Like</span></button>
							<button id="btn_dislike_<?php echo $review->re_id; ?>" onClick="reviewLikeDisLikee('<?php echo $re_dislike_cnt; ?>','<?php echo $review->re_id; ?>','dislike','review','<?php echo $cr; ?>');" class="btn btn-default btn_dislike_new"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span class = "dislike-button-text">Dislike</span></button>
							<?php
									$reportedStatus = checkUserReport($uid,$review->re_id);
							?>
							<?php if($reportedStatus==1){ ?>
							<span id="reviewReportId_<?php echo $review->re_id; ?>"><button onclick="reviewReportMethod('<?php echo $review->re_id; ?>','reviewpreport','alreadyU');" class="btn btn-default btn_dislike_new"><i class="fa fa-flag" aria-hidden="true"></i><span class="report-button-text">Reported</span></button></span>
							<?php }else{ ?>
							<span id="reviewReportId_<?php echo $review->re_id; ?>"><button onclick="reviewReportMethod('<?php echo $review->re_id; ?>','reviewpreport','');" class="btn btn-default btn_dislike_new"><i class="fa fa-flag" aria-hidden="true"></i><span class = "report-button-text">Report</span></button></span>
							<?php }} ?>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-12 col-lg-4 pad_0 small_replies_dropdown" id="reply_show<?php echo $review->re_id; ?>" onclick="reply_show('<?php echo $review->re_id; ?>')">
							<span class="pull-right no-pull-right"><i class="fa fa-reply reply" aria-hidden="true"></i>&nbsp;
								<span id="repliesCntt_<?php echo $review->re_id; ?>" class="no_of_replies<?php echo $review->re_id; ?>"><?php echo sizeof($companyview['replies'][$review->re_id]);?></span>
									<span id="repliesText_<?php echo $review->re_id; ?>"> <?php if(sizeof($companyview['replies'][$review->re_id]) == 1){
								echo " Reply &nbsp; ";
							}else{
								echo " Replies &nbsp; ";
							} ?></span>
								<span class="no_of_likes<?php echo $review->re_id; ?>"><?php echo $re_likes_cnt; ?><?php if($re_likes_cnt == 1){
								echo " Like &nbsp;";
							}else{
								echo " Likes &nbsp; ";
							} ?></span>
								<span class="no_of_dislikes<?php echo $review->re_id; ?>"><?php echo $re_dislike_cnt;?><?php if($re_dislike_cnt == 1){
								echo " Dislike";
							}else{
								echo " Dislikes";
							} ?></span></span>
						</div>
						</div>
						<?php if(isset($this->session->userdata['user_id']) && $this->session->userdata['user_id'] != "" ){ ?>
						<div class="col-xs-12 mar_t20" id="replypopup_m<?php echo $review->re_id; ?>" style="display:none;">
									 <form  onSubmit="wirteareplySubmit(<?php echo $review->re_id; ?>);"  class="form-horizontal replypopup" id="replypopup<?php echo $review->re_id; ?>" name="replypopup" method="POST" data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon" data-fv-icon-invalid="glyphicon" data-fv-icon-validating="glyphicon glyphicon-refresh" >
									 <div class="col-xs-10 pad_l0">
										 <input type="hidden" id="crr_reid<?php echo $review->re_id; ?>" name="crr_reid" value="">
										 <div class="form-group">
											 <label for="inputEmail3" class="col-xs-2 no_padding_label control-label validate_c"><?php
                if(isset($companyview['user_profile_info']->u_picture) && $companyview['user_profile_info']->u_picture!=""){
		            $imagepath = base_url().'asset/img/users/'.$companyview['user_profile_info']->u_picture.'?id='.$viewTime;
		        }else if(isset($companyview['user_profile_info']->u_social_pic) && $companyview['user_profile_info']->u_social_pic!=""){
		            $imagepath = $companyview['user_profile_info']->u_social_pic;
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
								<?php }?>
								<div id="repliesDiv_<?php echo $review->re_id; ?>" style="display:none;">
						<?php if(sizeof($companyview['replies'][$review->re_id])>0){foreach($companyview['replies'][$review->re_id] as $crr=>$reviewReplay){?>

						<div class = "col-xs-12" id="individualReplies_<?php echo $reviewReplay->crr_id; ?>">
					        <?php
								if($reviewReplay->u_username!=""){
									$u_username = ucfirst($reviewReplay->u_username);
								}else if($reviewReplay->u_firstname!=""){
									$u_username = ucfirst($reviewReplay->u_firstname);
								}else{
									$u_username = "Guest User";
								}
							?>
							<div class = "col-md-2 col-xs-4 pad_0">
									<a href = "<?php
									if($uid == $reviewReplay->crr_uid){
										echo base_url().'display-profile';
									}else{
										echo base_url().'view-profile/'.str_replace(' ','_',$reviewReplay->u_username);
									}	
									?>">	
							        <?php if($reviewReplay->u_picture!=""){ ?>
									<img class="img-circle reply-image" src="<?php echo base_url().'asset/img/users/'.$reviewReplay->u_picture.''; ?>" alt="<?php echo $u_username; ?>">
									<?php }else if($reviewReplay->u_social_pic!=""){ ?>
									<img class="img-circle reply-image" src="<?php echo $reviewReplay->u_social_pic; ?>" alt="<?php echo $u_username; ?>">
									<?php }else{?>
									<img class="img-circle reply-image" src="<?php echo base_url(); ?>asset/img/alt.jpg" alt="user image">
									<?php } ?>
									</a>
							</div>
							<div class = "col-md-10 col-xs-12 pad_0">
								<div class = "col-xs-12 mar_0 pad_0" style="padding-top:5px;padding-bottom:5px;">
									<?php 
									if($uid == $reviewReplay->crr_uid){
										echo 'By'.' '.'<span style="font-family:NoirPro Medium;font-weight: 500;"><a href = "'.base_url().'display-profile">'.$u_username.'</a></span>';
									}else{
										echo 'By'.' '.'<span style="font-family:NoirPro Medium;font-weight: 500;"><a href = "'.base_url().'view-profile/'.str_replace(' ','_',$reviewReplay->u_username).'">'.$u_username.'</a></span>';
									}
									?>
									<?php
											$old_date = timeago($reviewReplay->crr_createdat);
											echo '<div class="time_stamp">'.$old_date.'</div>';
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
								</div>






























								<div id="replyreview_<?php echo $reviewReplay->crr_id; ?>" class = "col-xs-12 pad_0" style="margin:0px;">
									<?php

									$stringReply = strip_tags($reviewReplay->crr_decript);
									if (strlen($stringReply) > 150) {

									$stringCut = substr($stringReply, 0, 150);
									$stringReply = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="cursor:pointer;color:#1546a5" href="javascript:void(0);" onClick="readReplyMoreSpan('.$reviewReplay->crr_id.');">More <i class="fa fa-angle-double-right font_s16" aria-hidden="true"></i></a>';
									}
									?>
									<span id="replyspanLess_<?php echo $reviewReplay->crr_id; ?>" style="overflow-wrap: break-word;"><?php echo $stringReply; ?>
									</span>
									<span id="replyexpandSpan_<?php echo $reviewReplay->crr_id; ?>" style="display:none;overflow-wrap: break-word;" > <?php echo nl2br($review->re_decript).' '.'<a href="javascript:void(0);" onClick="readReplyLessSpan('.$reviewReplay->crr_id.');"><i class="fa fa-angle-double-left font_s16" aria-hidden="true"></i> Less </a>'; ?>
								    </span>
								</div>
								<span id="successMessage_<?php echo $reviewReplay->crr_id; ?>" ></span>
									 <span id="r_char_cnt<?php echo $reviewReplay->crr_id; ?>" style="display:none;"> <span id="review_char_count<?php echo $reviewReplay->crr_id; ?>"></span>&nbsp;&nbsp;character(s) left</span>
								<div class = "col-xs-12 pad_0" style="padding-bottom:5px">
									<?php
											if(isset($_SESSION['user_id'])){
												if($uid == $reviewReplay->crr_uid){
									?>
									<label  id="save<?php echo $reviewReplay->crr_id; ?>" for="submit-form<?php echo $reviewReplay->crr_id; ?>" tabindex="0" class="btn btn-default btn_dislike_new btn-small" style="display:none;" value="">Save</label>
									<!--<button id="save<?php //echo $reviewReplay->crr_id; ?>" type="submit" class="btn btn-default btn_dislike btn-small" style="display:none;" value="">Save</button> -->
									<button id="reply_reply_pop<?php echo $reviewReplay->crr_id; ?>" onClick="replyReplyMessage('<?php echo $reviewReplay->crr_id; ?>','<?php echo $reviewReplay->crr_reid; ?>');" class="btn btn-default btn_dislike_new btn-small pad_l0"><i class="fa fa-pencil-square" aria-hidden="true"></i><span class="r-report-button-text">Edit</span></button>
									<?php } else{ ?>
										<button id="reply_btn_like_<?php echo $reviewReplay->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small pad_l0" onClick="reviewLikeDisLike('<?php echo $crr_likes_cnt; ?>','<?php echo $reviewReplay->crr_id; ?>','like','replies','<?php echo $crr; ?>');"><?php
							$checkedRow1 = $this->Companies_model->checkUserReplyLiked($uid,$reviewReplay->crr_id,'like');
							if(isset($checkedRow1->rrr_id) && $checkedRow1->rrr_id!=''){
								echo '<i class="fa fa-thumbs-up" aria-hidden="true" style="color:#065FD4;"></i><span class = "r-like-button-text" style="color:#065FD4;">Liked</span>';
							   }
							else{
								echo '<i class="fa fa-thumbs-up" aria-hidden="true"></i><span class = "r-like-button-text">Like</span>';
							}
							?></button>
									<button id="reply_btn_dislike_<?php echo $reviewReplay->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small" onClick="reviewLikeDisLikee('<?php echo $crr_dislike_cnt; ?>','<?php echo $reviewReplay->crr_id; ?>','dislike','replies','<?php echo $crr; ?>');"><?php
							$checkedRow2 = $this->Companies_model->checkUserReplyLiked($uid,$reviewReplay->crr_id,'dislike');
							if(isset($checkedRow2->rrr_id) && $checkedRow2->rrr_id!=''){
								echo '<i class="fa fa-thumbs-down" aria-hidden="true" style="color:#065FD4;"></i><span class = "r-dislike-button-text" style="color:#065FD4;">Disliked</span>';
							   }
							else{
								echo '<i class="fa fa-thumbs-down" aria-hidden="true"></i><span class = "r-dislike-button-text">Dislike</span>';
							}
							?></button>
									<?php
									$reportedReplyStatus = checkUserReplyReport($uid,$reviewReplay->crr_id);
									?>
									<?php if($reportedReplyStatus==1){ ?>
									<span id="replyReportId_<?php echo $reviewReplay->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reviewReplay->crr_id; ?>','replypreport','alreadyReported');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Reported</span></button></span>
									<?php }else{ ?>
									<span id="replyReportId_<?php echo $reviewReplay->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reviewReplay->crr_id; ?>','replypreport','');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Report</span></button></span>
									<?php } ?>
									<?php }}else{ ?>
									<button id="reply_btn_like_<?php echo $reviewReplay->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small pad_l0" onClick="reviewLikeDisLike('<?php echo $crr_likes_cnt; ?>','<?php echo $reviewReplay->crr_id; ?>','like','replies','<?php echo $crr; ?>');"> <i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="r-like-button-text">Like</span>
									</button>
									<button id="reply_btn_dislike_<?php echo $reviewReplay->crr_id; ?>" class="btn btn-default btn_dislike_new btn-small" onClick="reviewLikeDisLikee('<?php echo $crr_dislike_cnt; ?>','<?php echo $reviewReplay->crr_id; ?>','dislike','replies','<?php echo $crr; ?>');"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i><span class="r-dislike-button-text">Dislike</span>
									</button>
									<?php
									$reportedReplyStatus = checkUserReplyReport($uid,$reviewReplay->crr_id);
									?>
									<?php if($reportedReplyStatus==1){ ?>
									<span id="replyReportId_<?php echo $reviewReplay->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reviewReplay->crr_id; ?>','replypreport','alreadyReported');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Reported</span></button></span>
									<?php }else{ ?>
									<span id="replyReportId_<?php echo $reviewReplay->crr_id; ?>"><button onclick="reviewReportMethod('<?php echo $reviewReplay->crr_id; ?>','replypreport','');" class="btn btn-default btn_dislike_new btn-small"><i class="fa fa-flag" aria-hidden="true"></i></i><span class="r-report-button-text">Report</span></button></span>
									<?php }} ?>
									<span id="replies_count_<?php echo $reviewReplay->crr_id; ?>" class = "pull-right" style="margin-top:7px;"><?php echo $crr_likes_cnt; ?>
									<?php if ($crr_likes_cnt == 1){
										echo " Like";
									} else {
										echo " Likes";
									}?>
									</span>
								</div>


							</div>
						</div>

						<?php }} ?></div>

					</div>
					</div>

					<?php }}else{ ?>
					<div class ="pad_l15 pad_t10 pad_b10">
						There are no reviews available.
					</div>
					<?php } ?>
				</div>
				<?php
					if(isset($companyview['links']) && $companyview['links'] != ""){ ?>
					<nav aria-label="Page navigation example" style="text-align:center;margin-top:20px;" id="fullviewPagy">

						<?php echo $companyview['links'];?>

					</nav>
					<?php
					 }
					 ?>
 			</div>
		</div>
	</div>







<input type="hidden" id="hid_sessionid" name="hid_sessionid" value="<?php if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){ echo $_SESSION['user_id']; }else{}?>">
<input type="hidden" id="hid_filter" name="hid_filter" value="1">
<?php
if(isset($companyview['cm_ico_end_date']) && $companyview['cm_ico_end_date'] != "" && $companyview['cm_ico_end_time'] != "")
{
	$endDateTime = $companyview['cm_ico_end_date'].' '.$companyview['cm_ico_end_time'].':00';
}else if(isset($companyview['cm_ico_end_date']) && $companyview['cm_ico_end_date'] != "" && $companyview['cm_ico_end_time'] == ""){

	$endDateTime = $companyview['cm_ico_end_date'].' '.'00:00:00';
}
?>

<input type="hidden" id="hid_cmid" name="hid_cmid" value="<?php echo $companyview['company_id']; ?>">
						<input type="hidden" id="hid_cmname" name="hid_cmname" value="<?php echo $companyview['company_name']; ?>">
						<?php //echo "<pre>"; print_r($companyview);echo "</pre>";exit; ?>
						<input type="hidden" id="hid_userid" name="hid_userid" value="<?php
						if( $this->session->userdata('user_id') )
						{
							echo $this->session->userdata('user_id');
						}else{
							echo '';
						}
						?>">
						<input type="hidden" name="company_name" id="company_name" value="<?php echo $companyview['company_name']; ?>">
						<input type="hidden" id="hid_uniqueid" name="hid_uniqueid" value="<?php echo$companyview['cm_unique_id']; ?>">
						<input type = "hidden" name = "company_type" id = "company_type" value = "<?php echo $companyview['cm_ctid']; ?>">





<input type="hidden" id="timeDate" name="timeDate" value="<?php print date("F d, Y H:i:s",strtotime($endDateTime)); ?>">
<input type="hidden" id="timeDate1" name="timeDate1" value="<?php print date("F d, Y H:i:s",strtotime(date('Y-m-d H:i:s'))); ?>">

<script>
function reply_show(id){
	if($('#reply_show'+id).hasClass("clicked")){
		$("#repliesDiv_"+id).hide();
		$("#reply_show"+id).removeClass("clicked");
		$("#replypopup_m"+id).hide();
	}else{
		$("#repliesDiv_"+id).show();
		$("#reply_show"+id).addClass("clicked");
		$("#replypopup_m"+id).show();
	}
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

		var x = window.matchMedia("(max-width: 990px)");

		if (x.matches){
			if ($('.social_share').hasClass("clicked-once")) {
	        // already been clicked once, hide it
					$(".adjust_margin").css("margin-top","50px").animate({marginTop:0},{queue: false, duration: 'slow'});
					$(".social_share").slideUp('slow');
	        $('.social_share').removeClass("clicked-once");
	    }
	    else {
	        // first time this is clicked, mark it
					$(".social_share").slideDown('slow');
					$(".adjust_margin").css("margin-top","0px").animate({marginTop:50},{queue: false, duration: 'normal'});
	        $('.social_share').addClass("clicked-once col-xs-8 col-xs-offset-2");

			}
		}else{
		if ($('.social_share').hasClass("clicked-once")) {
        // already been clicked once, hide it
				$(".social_share").animate({width: 'toggle'});
        $('.social_share').removeClass("clicked-once");
    }
    else {
        // first time this is clicked, mark it
        $('.social_share').addClass("clicked-once");
				$(".social_share").animate({width: 'toggle'});
		}
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
		setInterval(get_comdtls, 10000);
		$('.caption').hide();
		$('.clear-rating').hide();
		$('.replypopup').formValidation();
		$('#reviewReport').formValidation();
		$('#replyreplypopup').formValidation();
			$(window).resize(function(){
				$(".social_share").hide();

			});
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
					$('#not_login_footer_modal').show();
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
								$('#not_login_footer_modal').show();
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
				$('#not_login_footer_modal').show();
			}, 1000);
		}
	}

	function reviewReplyFilter_New(type,crr_reid,crr_id){
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
							$('#repliesCntt_'+crr_reid).html(data.repliesCntt);
							if(data.repliesCntt == 1)
							{
								$('#repliesText_'+crr_reid).html('Reply'+'\xa0\xa0\xa0');
							}else{
								$('#repliesText_'+crr_reid).html('Replies'+'\xa0\xa0');
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
		$("#change_btn_name").html('Cancel');
		$("#successmessage").html('');
		if($("#hid_sessionid").val()!=""){
			$('#common_modal_pop').modal('hide');
			$('#form_decript'+crr_id).formValidation().on('success.form.fv', function(e) {
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
								$('#not_login_footer_modal').show();
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
				$('#not_login_footer_modal').show();
			}, 1000);
		}
	}

	function wirteareplySubmit(re_id){
		$('#replypopup'+re_id).formValidation();debugger;
		replyMessage(re_id);
		$("#change_btn_name").html('Cancel');
		$("#successmessage"+re_id).html('');
		if($("#hid_sessionid").val()!=""){
			$('#common_modal_pop').modal('hide');
		  var reply='#replypopup'+re_id;
			$('#replypopup'+re_id).formValidation().on('success.form.fv', function(e) {
				e.stopImmediatePropagation();debugger;
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
						if(data.output=='success'){debugger;
							$("#successmessage"+re_id).html('Reply successfully saved').css('color','green');
							setTimeout(function(){debugger;
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
								$('#not_login_footer_modal').show();
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
				$('#not_login_footer_modal').show();
			}, 1000);
		}
	}
	function reply_Message(id){
		if($("#hid_sessionid").val()!=""){
			$("#replypopup_m"+id).show();
			$("#crr_decript"+id).focus();

				$("#crr_decript"+id).css({"background-color":"#8e44ad"})
				.animate({
					backgroundColor:"#ffff",
				},400,function() {
				});
			}else {
				$("#confirmation_modal_pop").modal('hide');
				$("#common_modal_pop").modal('hide');
				setTimeout(function(){
					$("#common_heading").html('Warning Message');
					$("#common_message").html('Login required');
					$('#common_modal_pop').modal('show');
					$('#not_login_footer_modal').show();
				}, 100);
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
				$('#not_login_footer_modal').show();
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
						$(".replypopup").formValidation();
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
				$('#not_login_footer_modal').show();
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
		var cm_ctid = $('#company_type').val();
		var hid_uniqueid   = $("#hid_uniqueid").val();
		if(cm_ctid == 1){
			window.location = baseUrl+'DigitalAssets/'+cm_name.replace(/\s/g,'_')+'&'+typeee;
		}else if(cm_ctid == 2){
			window.location = baseUrl+'ICOs/'+cm_name.replace(/\s/g,'_')+'&'+typeee;
		}
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
		$("#change_btn_name").html('Cancel');debugger;
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
		// $('.box-comments').html('');
		var url = baseUrl+'Company/getReviewBasedReplies?expireTime='+time;
		var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
	//	$('#repliesDiv_'+crr_reid).html(relaoding);
		$.ajax({
			type 		: "POST",
			url			: url,
			cache       : false,
			data        : {cm_id:cm_id,order_by:type,crr_reid:crr_reid,re_id:re_id},
			dataType	: "json",
			success: function(data){debugger;
				console.log(data.output);
				console.log(data.resData);
				console.log(data.repliesCntt);

				if(data.output=='success'){
					setTimeout(function(){
						if(data.resData != ""){
							$('#repliesDiv_'+crr_reid).prepend(data.resData);
							$('#repliesDiv_'+crr_reid).show();
							$('#repliesCntt_'+crr_reid).html(data.repliesCntt);
							$("#reply_show"+crr_reid).addClass("clicked");
							if(data.repliesCntt == 1)
							{
								$('#repliesText_'+crr_reid).html('Reply'+'\xa0\xa0\xa0');
							}else{
								$('#repliesText_'+crr_reid).html('Replies'+'\xa0\xa0');
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
							$('#not_login_footer_modal').show();
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
				$('#not_login_footer_modal').show();
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
								$("#btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true" style="color:#065FD4;"></i><span class="like-button-text" style="color:#065FD4;">Liked</span>');
								$("#btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i><span class ="dislike-button-text">Dislike</span>');
								if(data.cntLikeDislikes=="1"){var like_html="Like";}else{var like_html="Likes";}
								if(data.dislikescnt=="1"){var dislike_html="Dislike";}else{var dislike_html="Dislikes";}
								$(".no_of_likes"+reviewid).html(data.cntLikeDislikes+' '+like_html+'\xa0\xa0\xa0');
								$(".no_of_dislikes"+reviewid).html(data.dislikescnt+' '+dislike_html+' ');
							}else{
								$("#btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="like-button-text">Like</span>');
								$("#btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true" style="color:#065FD4;"></i><span class ="dislike-button-text" style="color:#065FD4;">Disliked</span>');
								if(data.cntLikeDislikes=="1"){var like_html="Like";}else{var like_html="Likes";}
								if(data.dislikescnt=="1"){var dislike_html="Dislike";}else{var dislike_html="Dislikes";}
								$(".no_of_likes"+reviewid).html(data.cntLikeDislikes+' '+like_html+'\xa0\xa0\xa0');
								$(".no_of_dislikes"+reviewid).html(data.dislikescnt+' '+dislike_html+' ');
							}
						}else if(typeMode=='replies'){
							if(type=='like'){
								$("#reply_btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true" style="color:#065FD4;"></i>&nbsp;<span style="color:#065FD4;">'+ data.cntLikeDislikes+'</span>');
								$("#reply_btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp;'+ data.dislikescnt);
								if(data.cntLikeDislikes=="1"){var like_html="Like";}else{var like_html="Likes";}
								$("#replies_count_"+reviewid).html(data.cntLikeDislikes+' '+like_html);
							}else{
								$("#reply_btn_like_"+reviewid).html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;'+ data.cntLikeDislikes);
								$("#reply_btn_dislike_"+reviewid).html('<i class="fa fa-thumbs-down" aria-hidden="true" style="color:#065FD4;"></i>&nbsp;<span style="color:#065FD4;">'+ data.dislikescnt+'</span>');
								if(data.cntLikeDislikes=="1"){var like_html="Like";}else{var like_html="Likes";}
								$("#replies_count_"+reviewid).html(data.cntLikeDislikes+' '+like_html);
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
							$('#not_login_footer_modal').show();
						}, 1000);
					}
				}
			}
		});
	}
	function modalClearForm(tba){
		if(tba=='reportpopup'){
			$("#reviewReport").trigger('reset');
			$('#reviewReport').formValidation('resetForm', true);
			$('#reviewReport').data('formValidation').resetForm();
			$("#reviewreportpopup_modal").modal('hide');
		}else if(tba=='replyreplypopup'){
			$("#replyreplypopup").trigger('reset');
			$('#replyreplypopup').formValidation('resetForm', true);
			$('#replyreplypopup').data('formValidation').resetForm();
			$("#replyreplypopup_modal").modal('hide');
		}else{
			$("#replypopup").trigger('reset');
			$('#replypopup').formValidation('resetForm', true);
			$('#replypopup').data('formValidation').resetForm();
			$("#replypopup_modal").modal('hide');
		}
	}
	function readMoreSpan(reviewId)
	{
		$('#spanLess_'+reviewId+'').css('display','none');
		$('#expandSpan_'+reviewId+'').css('display','block');

	}
	function readLessSpan(reviewId)
	{
		$('#spanLess_'+reviewId+'').css('display','block');
		$('#expandSpan_'+reviewId+'').css('display','none');

	}
	function readReplyMoreSpan(reviewId)
	{
		$('#replyspanLess_'+reviewId+'').css('display','none');
		$('#replyexpandSpan_'+reviewId+'').css('display','block');

	}
	function readReplyLessSpan(reviewId)
	{
		$('#replyspanLess_'+reviewId+'').css('display','block');
		$('#replyexpandSpan_'+reviewId+'').css('display','none');

	}

$(document).ready(function() {
var isMobile = {

    Android: function() {

        return navigator.userAgent.match(/Android/i);

    },

    BlackBerry: function() {

        return navigator.userAgent.match(/BlackBerry/i);

    },

    iOS: function() {

        return navigator.userAgent.match(/iPhone|iPad|iPod/i);

    },

    Opera: function() {

        return navigator.userAgent.match(/Opera Mini/i);

    },

    Windows: function() {

        return navigator.userAgent.match(/IEMobile/i);

    },

    any: function() {

        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());

    }

};

 $(document).on("click", '.icoWhatsapp', function() {

        if( isMobile.any() ) {


            var text = $(this).attr("data-text");

            var url = $(this).attr("data-link");

           // var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
           var message = encodeURIComponent(url);

            var whatsapp_url = "whatsapp://send?text=" + message;

            window.location.href = whatsapp_url;

        }else{

           // $('#whats_pop_up').modal('show');
		   var loc = $(location).attr('href');
		   var text = $(location).attr('data-text');
		   var message =  encodeURIComponent(loc);

		  // window.location = 'https://web.whatsapp.com/';
			window.open('https://web.whatsapp.com/send?text='+message);
        }



    });

});
var timeDate = $('#timeDate').val();
var timeDate1 = $('#timeDate1').val();
var countDownDate = new Date(timeDate).getTime();
// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date(timeDate1).getTime() + parseInt(1000);
	timeDate1 = now;
    // Find the distance between now an the count down date
	 var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = "Countdown (UTC) : "+days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is over, write some text
	if (distance < 0) {
        clearInterval(x);
       document.getElementById("demo").innerHTML = "Countdown (UTC) : "+"EXPIRED";
    }
}, 1000);

function ReviewAllow()
{
	var userId 		= $('#hid_userid').val();
	var companyId 	= $('#hid_cmid').val();
	var uniqueId 	= $('#hid_uniqueid').val();
	var companyName =$('#hid_cmname').val();
	var cm_name = $('#company_name').val();

	$.ajax({
			type 		: "POST",
			url			: baseUrl+'Company/checkReviewForallow',
			cache       : false,
			data        : {userId:userId,companyId:companyId},
			dataType	: "json",
			success: function(data){
				if(data.output < 5)
				{
					window.location = baseUrl+'write-a-review/'+cm_name.replace(/\s/g,'_');
				}else{
					alert('You cannot add more than 5 reviews in a minute.');
				}
			}
		});
}
function get_comdtls()
{
	var companyId 	= $('#hid_cmid').val();
	var uniqueId 	= $('#hid_uniqueid').val();
	$.ajax({
			type 		: "POST",
			url			: baseUrl+'Company/getCompDetailsApi',
			cache       : false,
			data        : {companyId:companyId},
			dataType	: "json",
			success: function(data){
				$('#mId').html('$'+data.market_cap);
				$('#tokId').html(data.total_supply);
				$('#toksupId').html(data.available_supply);
				$('#curId').html('$'+data.price_usd);
				$('#volId').html('$'+data.volume);
				$('#chaId').html(data.percent_change_24h+'%');
			}
		});
}
function repliesFullView(revId)
{
	 $('#repliesDiv_'+revId).toggle('slow');
}


window.onload = function () {
	if (typeof history.pushState === "function") {
		// history.pushState("back", null, null);
		window.onpopstate = function () {
			history.pushState('back', null, null);
			var filterType = localStorage.getItem('type');
			var pageMode   = localStorage.getItem('page_name');
			if(pageMode==1){
				window.location = baseUrl + 'digital-assets';
			}else if(pageMode==2){
				window.location = baseUrl + 'ico-tracker';
			}else if(pageMode==3){
				window.location = baseUrl + 'my-digital-assets';
			}else if(pageMode==4){
				window.location = baseUrl + 'my-ico-trackers';
			}

		 };
	 }
}
</script>
