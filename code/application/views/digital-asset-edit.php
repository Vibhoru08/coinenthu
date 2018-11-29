 <?php
 $viewTime = date('Ymd') .'_'. date('His');
 // echo $digitalData['cm_coinmarket_cap'];exit;
 ?>
 <div class="content-wrapper">
	<div  class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>
					<ol class="breadcrumb">
					  <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Home</a></li>
					  <li class="active">Edit an Asset</li>
					</ol>
			</section>
		</div>
		</div>
        <div class="container-fluid">
			<section class="content mar_b20">
			<div class="row">
					<div class="col-md-12">
						<div class="box mar_b50  mar_t20 box_shadow overflow_hidden">
							<div class="box-header with-border header_bg">
								<h3 class="box-title">Edit an Asset </h3>
							</div>
							<form class="form-horizontal mandatory" action="" method="POST" name="update_digital_asset" id="update_digital_asset" enctype="multipart/form-data"  data-fv-message="This value is not valid" data-fv-icon-valid="glyphicon"
									data-fv-icon-invalid="glyphicon"            data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="UpdateDigitalAsset();">
							<div class="box-body pad_t30">
								<div class="col-md-3 text-center">
									<div class="add_company">
									<?php
									if(isset($digitalData['company_picture']) && $digitalData['company_picture'] != ""){?>
										<img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$digitalData['company_picture'].'?id='.$viewTime; ?>" alt="User Image" class="img-responsive" id="image" name="image" style="width:auto;height:200px;">
									<?php }else if(isset($digitalData['company_picture']) && $digitalData['company_picture'] != ""){?>

										<img class="img-responsive" src="<?php echo base_url().'asset/img/companies/'.$this->session->userdata('user_id').'/logos/'.$digitalData['company_picture'].''; ?>" id="image" name="image" style="width:auto;height:200px;"/>

									<?php }else { ?>

										<img class="img-responsive" src="<?php echo base_url(); ?>images/Felix_the_Cat.jpg" id="image" name="image" style="width:auto;height:200px;"/>
									<?php } ?>
									</div>
									<div class="pad_t20">
									<!--<a href="javascript:void(0);" onclick="showCropPopup1(1)" class="btn btn-default btn_like"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ADD LOGO</a>-->
									<input name="digital_uploaded_file" id="digital_uploaded_file" type="file" accept="image/x-png,image/jpeg" /><br/>
									</div>
								</div>
								<div class="col-md-7">

									<input type="hidden" value="<?php echo $digitalData['company_picture']; ?>" id="userhidImage" name="userhidImage">
									  <div class="form-group">
										<label for="inputEmail3" class="col-sm-3 control-label" style="padding-top:0">Digital Asset  Name <span class="mstar">*</span></label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_name" name="cm_name" placeholder="Digital Asset Name" required data-fv-notempty-message="The asset name is required and cannot be empty" data-fv-regexp="true"
										data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The asset name can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="500" data-fv-stringlength-message="The asset name must be less than 500 characters" value="<?php echo $digitalData['company_name']; ?>">
										</div>
									  </div>

									  <div class="form-group">
										<label for="inputPassword3" class="col-sm-3 control-label">Description <span class="mstar">*</span></label>
										<div class="col-sm-9">
										  <textarea id="cm_decript" name="cm_decript" class="form-control" placeholder="Add organization URL also" required data-fv-notempty-message="The description is required and cannot be empty" data-fv-regexp="true"
										data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The description can consist of alphanumarical characters" data-fv-stringlength="true" data-fv-stringlength-max="1000" data-fv-stringlength-message="The description must be less than 1000 characters"><?php echo $digitalData['company_desc']; ?></textarea>
										</div>
									  </div>
									  <?php
									$finalMileCnt 		= count($digitalData['ms_title'])+1;
									$finalTrExCnt 		= count($digitalData['te_title'])+1;
									$finalCTCnt 		= count($digitalData['cot_name'])+1;
									$finalADTCnt 		= count($digitalData['adt_name'])+1;
									$finalEscrowCnt 	= count($digitalData['escrow_name'])+1;
									$finalUploadDocsCnt = count($digitalData['upload_docs'])+1;$finalResourcesCnt = count($digitalData['resrc_name'])+1;
									?>
									<input type="hidden" id="mailstone_boxes_cnt" value="<?php echo $finalMileCnt; ?>" />
									<input type="hidden" id="core_team_cnt" value="<?php echo $finalCTCnt; ?>" />
									<input type="hidden" id="advisory_cnt" value="<?php echo $finalADTCnt; ?>" />
									 <input type="hidden" id="escrow_cnt" value="<?php echo $finalEscrowCnt; ?>" />
									 <input type="hidden" id="resources_cnt" value="<?php echo $finalResourcesCnt; ?>" />

									  <span id="milestones_boxes">
										<?php
											$i = 1;
											if(count($digitalData['ms_title']) > 0){
											foreach($digitalData['ms_title'] as $ms=>$ms_title)
											{
										?>
										  <div class="form-group" id="milestone_div_<?php echo $i; ?>">
											<label for="inputPassword3" class="col-sm-3 control-label">Milestones</label>
											<div class="col-sm-9">
											<div class="row no-margin mailstone_pad_bg">
												<div class="col-md-8">
													<textarea class="form-control" placeholder="Milestones" name="ms_title[]"  id="ms_title_<?php echo $i; ?>"><?php echo $ms_title; ?></textarea>
												</div>
												<div class="col-md-4 mmar_t15 select_style">
													<select class="form-control" name="ms_mss_id[]" id="ms_mss_id_<?php echo $i; ?>">
													<option value="0">Select Status </option>
													<?php
														if(sizeof($milestoneStatuses)>0){
															foreach($milestoneStatuses as $mstones)
															{
															if($digitalData['ms_id'][$ms] == $mstones->mss_id){
																$selected = 'selected';
															}else{
																$selected = '';
															}

															?>
															<option <?php echo $selected; ?> value="<?php echo $mstones->mss_id ;?>"><?php echo $mstones->mss_status ;?></option>
															<?php

															}
														}
														$valueId = $ms + 1;
													?>
													</select>
												</div>
												<div class="more_input_boxes"><a href="javascript:void(0);" id="mb_b_<?php echo $i; ?>" OnClick="mailstone_boxes(<?php echo $i; ?>);" class="btn btn-primary"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
											  </div>
											</div>
										  </div>
										<?php
											$i++;
											}
										}
										?>

										<div class="form-group" id="milestone_div_<?php echo $i; ?>">
											<label for="inputPassword3" class="col-sm-3 control-label">Milestones </label>
											<div class="col-sm-9">
											<div class="row no-margin mailstone_pad_bg">
												<div class="col-md-8">
													<textarea class="form-control" placeholder="Milestones" name="ms_title[]"  id="ms_title_<?php echo $i; ?>"></textarea>
												</div>
												<div class="col-md-4 mmar_t15 select_style">
													<select class="form-control" name="ms_mss_id[]" id="ms_mss_id_<?php echo $i; ?>">
													<option value="0">Select Status </option>
													<?php
														if(sizeof($milestoneStatuses)>0){
															foreach($milestoneStatuses as $mstones)
															{
															?>
															<option value="<?php echo $mstones->mss_id ;?>"><?php echo $mstones->mss_status ;?></option>
															<?php

															}
														}
													?>
													</select>
												</div>
												<div class="more_input_boxes"><a href="javascript:void(0);" id="mb_b_<?php echo $i; ?>" OnClick="mailstone_boxes(<?php echo $i; ?>);" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>
											  </div>
											</div>
										  </div>


										</span>
									
									  <span id="resources_divs">
										<?php
											$Resrc = 1;
											if(count($digitalData['resrc_name']) > 0)
											{
												foreach($digitalData['resrc_name'] as $RSr=>$resrcs)
												{
										?>
										  <div class="form-group" id="resource_<?php echo $Resrc; ?>">
											<label for="Core Team" class="col-sm-3 control-label">Resources</label>
											<div class="col-sm-9">
											<div class="row pos_r">
												<div class="col-md-6">
												  <input type="text" class="form-control"  placeholder="White Paper" value="<?php echo $resrcs; ?>" name="resource_name[]"  id="resource_name_<?php echo $Resrc; ?>">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="resource_url[]" id="resource_url_<?php echo $Resrc; ?>" placeholder="URL"  value="<?php echo $digitalData['resrc_url'][$RSr]; ?>">
												</div>
												<div class="more_input_boxes" id="resource_btn_<?php echo $Resrc; ?>"><a href="javascript:void('0');" onClick="resources(<?php echo $Resrc; ?>);" class="btn btn-primary"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
											</div>
											</div>
										  </div>
										<?php
											$Resrc++;
											}
										}
										?>
										  <div class="form-group" id="resource_<?php echo $Resrc; ?>">
											<label for="Core Team" class="col-sm-3 control-label">Resources</label>
											<div class="col-sm-9">
											<div class="row pos_r">
												<div class="col-md-6">
												  <input type="text" class="form-control"  placeholder="White Paper" value="" name="resource_name[]" id="resource_name_<?php echo $Resrc; ?>">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="resource_url[]" id="resource_url_<?php echo $Resrc; ?>" placeholder="URL"  value="">
												</div>
												<div class="more_input_boxes" id="resource_btn_<?php echo $Resrc; ?>"><a href="javascript:void('0');" onClick="resources(<?php echo $Resrc; ?>);" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>
											</div>
											</div>
										  </div>
										</span>
									<div class="form-group">
										<label id="label_mar" for="inputPassword3" class="col-sm-3 control-label">Market Cap (in US$)</label>
										<div class="col-sm-9">
										<?php
										if(isset($digitalData['cm_marketcap']) && $digitalData['cm_marketcap'] != "" && $digitalData['cm_marketcap'] != 0){

											$marketCap = trim(number_format($digitalData['cm_marketcap']));
										}else{
											$marketCap = '';
										}
										?>
										 <input type="text" id="cm_marketcap" name="cm_marketcap" class="form-control" placeholder="Market cap" data-fv-regexp="true"
										 data-fv-regexp-regexp="^\d+(,\d+)*$" value="<?php echo $marketCap; ?>" onBlur= "marketCapFun();">
										 <p id="cm_marketcap_error" style="color:#a94442" name="cm_marketcap_error"></p>
										</div>
									  </div>
									  <span id="core_team_divs">
										<?php
											$coteTm = 1;
											if(count($digitalData['cot_name']) > 0)
											{
												foreach($digitalData['cot_name'] as $Ct=>$coreteam)
												{
										?>
										  <div class="form-group" id="core_team_<?php echo $coteTm; ?>">
											<label for="Core Team" class="col-sm-3 control-label">Core Team</label>
											<div class="col-sm-9">
											<div class="row pos_r">
												<div class="col-md-6">
												  <input type="text" class="form-control"  placeholder="Core Team" value="<?php echo $coreteam; ?>" name="cot_name[]"  id="cot_name_<?php echo $coteTm; ?>">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="cot_profile_url[]" id="cot_profile_url_<?php echo $coteTm; ?>" placeholder="LinkedIn URL"  value="<?php echo $digitalData['cot_profile_url'][$Ct]; ?>">
												</div>
												<div class="more_input_boxes" id="coreteam_<?php echo $coteTm; ?>"><a href="javascript:void(0);" onClick="coreTeam(<?php echo $coteTm; ?>);" class="btn btn-primary"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
											</div>
											</div>
										  </div>
										<?php
											$coteTm++;
											}
										}
										?>
										  <div class="form-group" id="core_team_<?php echo $coteTm; ?>">
											<label for="Core Team" class="col-sm-3 control-label">Core Team</label>
											<div class="col-sm-9">
											<div class="row pos_r">
												<div class="col-md-6">
												  <input type="text" class="form-control"  placeholder="Core Team" value="" name="cot_name[]" id="cot_name_<?php echo $coteTm; ?>">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="cot_profile_url[]" id="cot_profile_url_<?php echo $coteTm; ?>" placeholder="LinkedIn URL"  value="">
												</div>
												<div class="more_input_boxes" id="coreteam_<?php echo $coteTm; ?>"><a href="javascript:void(0);" onClick="coreTeam(<?php echo $coteTm; ?>);" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>
											</div>
											</div>
										  </div>
										</span>
										<span id="advisory_team_divs">
										<?php
										$adtTeam = 1;
										if(count($digitalData['adt_name']) > 0)
										{
											foreach($digitalData['adt_name'] as $adt=>$advteam)
										{
										?>
										  <div class="form-group" id="advisory_team_<?php echo $adtTeam; ?>">
											<label for="CAdvisory Team " class="col-sm-3 control-label">Advisory Team</label>
											<div class="col-sm-9">
											 <div class="row">
												<div class="col-md-6">
												  <input type="text" class="form-control" name="adt_name[]"  id="adt_name_<?php echo $adtTeam; ?>" placeholder="Advisory Team" value="<?php echo $advteam; ?>">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="adt_profile_url[]" id="adt_profile_url_<?php echo $adtTeam; ?>" placeholder="LinkedIn URL"  value="<?php echo $digitalData['adt_profile_url'][$adt]; ?>">
												</div>
												<div class="more_input_boxes" id="advisory_btn_<?php echo $adtTeam; ?>"><a href="javascript:void(0);" OnClick="advisory_team(<?php echo $adtTeam; ?>);" class="btn btn-primary"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
											</div>
											</div>
										  </div>
										<?php
												$adtTeam++;
												}
											}
										?>
										  <div class="form-group" id="advisory_team_<?php echo $adtTeam; ?>">
											<label for="CAdvisory Team " class="col-sm-3 control-label">Advisory Team</label>
											<div class="col-sm-9">
											 <div class="row">
												<div class="col-md-6">
												  <input type="text" class="form-control" name="adt_name[]"  id="adt_name_<?php echo $adtTeam; ?>" placeholder="Advisory Team" value="">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="adt_profile_url[]" id="adt_profile_url_<?php echo $adtTeam; ?>" placeholder="LinkedIn URL"  value="">
												</div>
												<div class="more_input_boxes" id="advisory_btn_<?php echo $adtTeam; ?>"><a href="javascript:void(0);" OnClick="advisory_team(<?php echo $adtTeam; ?>);" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>
											</div>
											</div>
										  </div>
										</span>
										
									  <input type="hidden" id="treadin_exchange_cnt" value="<?php echo $finalTrExCnt; ?>" />
									  <span id="treading_exchange_divs">
							<?php
								$trEx = 0;
								if(count($digitalData['te_title']) > 0){
									foreach($digitalData['te_title'] as $trex=>$te_title){?>
										  <div class="form-group" id="treading_exchange_<?php echo $trEx; ?>">
											<label for="Contact number" class="col-sm-3 control-label">Add Exchange </label>
											<div class="col-sm-9 pos_r">
											<div class="row">
												<div class="col-md-6">
												 <input type="text" class="form-control" name="te_title[]"  id="te_title_<?php echo $trEx; ?>" placeholder="Exchange name" value="<?php echo $te_title; ?>">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="trading_exchange_url[]" id="trading_exchange_url_<?php echo $trEx; ?>" placeholder="Exchange URL" value="<?php echo $digitalData['te_url'][$trex]; ?>">
												</div>
												<div class="more_input_boxes" id="te_btn_<?php echo $trEx; ?>"><a href="javascript:void('0');" onClick="treading_exchange(<?php echo $trEx; ?>);" class="btn btn-primary"><span class="fa fa-minus" aria-hidden="true"></span></a></div>
											</div>



											</div>
										  </div>
										<?php
											$trEx ++;
											}
										}
										?>
										<div class="form-group" id="treading_exchange_<?php echo $trEx; ?>">
											<label for="Contact number" class="col-sm-3 control-label">Add Exchange </label>
											<div class="col-sm-9 pos_r">
											<div class="row">
												<div class="col-md-6">
												 <input type="text" class="form-control" name="te_title[]"  id="te_title_<?php echo $trEx; ?>" placeholder="Exchange name" value="">
												</div>
												<div class="col-md-6 mmar_t15">
												  <input type="text" class="form-control" name="trading_exchange_url[]" id="trading_exchange_url_<?php echo $trEx; ?>" placeholder="Exchange URL" value="">
												</div>
												<div class="more_input_boxes" id="te_btn_<?php echo $trEx; ?>"><a href="javascript:void('0');" onClick="treading_exchange(<?php echo $trEx; ?>);" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>
											</div>



											</div>
										  </div>
									  </span>
									  <!--<div class="form-group">
										<label for="Contact number" class="col-sm-3 control-label">Contact Number</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_mobile" name="cm_mobile" placeholder="Contact number"    	  data-fv-regexp="true"
											data-fv-regexp-regexp="^\d*[0-9]{1,}\d*" $data-fv-regexp-message="The contact number can consist of numbers" data-fv-stringlength="true"  placeholder="Contact number" value="<?php echo $digitalData['cm_mobile']; ?>">
										</div>
									  </div>-->
									  <div class="form-group">
										<label for="Email ID " class="col-sm-3 control-label">Email ID <span class="mstar">*</span></label>
										<div class="col-sm-9">
										  <input type="text" id="cm_email" name="cm_email" class="form-control" required data-fv-notempty-message="The email is required and cannot be empty" data-fv-emailaddress="true"
											data-fv-emailaddress-message="The input is not a valid email address" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The email address must be less than 100 characters" data-fv-regexp="true" data-fv-regexp-regexp="^\d*[a-zA-Z]{1,}\d*" $data-fv-regexp-message="The email can consist of alphanumarical characters" placeholder="Email ID" value="<?php echo $digitalData['cm_email']; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="Slack" class="col-sm-3 control-label">Website Url</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_siteurl" name="cm_siteurl" placeholder="Website Url" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The website url must be less than 100 characters"  value="<?php echo $digitalData['cm_siteurl']; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="Twitter" class="col-sm-3 control-label">Twitter</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_twitter" name="cm_twitter" placeholder="Twitter " data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The twitter url must be less than 100 characters"  value="<?php echo $digitalData['cm_twitter']; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="Slack" class="col-sm-3 control-label">Slack</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_slack" name="cm_slack" placeholder="Slack" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The slack url must be less than 100 characters"  value="<?php echo $digitalData['cm_slack']; ?>">
										</div>
									  </div>
									   <div class="form-group">
										<label for="telegram " class="col-sm-3 control-label">Telegram</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_telegram" name="cm_telegram" value="<?php echo $digitalData['cm_telegram']; ?>"  placeholder="Telegram" data-fv-stringlength-message="The telegram url must be less than 100 characters" >
										</div>
									  </div>
									  <div class="form-group">
										<label for="github" class="col-sm-3 control-label">Github </label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_github" name="cm_github" value="<?php echo $digitalData['cm_github']; ?>" placeholder="Github" data-fv-stringlength-message="The github url must be less than 100 characters" >
										</div>
									  </div>
									  <div class="form-group">
										<label for="github" class="col-sm-3 control-label">Discord </label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_discord" name="cm_discord" value="<?php echo $digitalData['cm_discord']; ?>" placeholder="Discord" data-fv-stringlength-message="The Discord url must be less than 100 characters" >
										</div>
									  </div>
									  <div class="form-group">
										<label for="Facebook " class="col-sm-3 control-label">Facebook</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_facebook" name="cm_facebook" value="<?php echo $digitalData['cm_facebook']; ?>" placeholder="Facebook" data-fv-stringlength-message="The facebook url must be less than 100 characters" >
										</div>
									  </div>


									   <div class="form-group">
										<label for="Facebook " class="col-sm-3 control-label">Coinmarketcap</label>
										<div class="col-sm-9">
										  <input type="text" class="form-control" id="cm_coinmarket_cap" name="cm_coinmarket_cap"  placeholder="Coinmarketcap" data-fv-stringlength-message="The Coinmarketcap must be less than 100 characters" value="<?php echo $digitalData['cm_coinmarket_cap']; ?>">
										</div>
									  </div>
									  <div class="form-group">
										<label for="inputPassword3" class="col-sm-3 control-label">Address</label>
										<div class="col-sm-9">
										  <textarea class="form-control" id="cm_address" name="cm_address" placeholder="Address"><?php echo $digitalData['cm_address']; ?></textarea>
										</div>
									  </div>


								<input type="hidden" id="hidCompanyType" name="hidCompanyType" value="1">
								<input type="hidden" id="companyhidId" name="companyhidId" value="<?php echo $digitalData['company_id']; ?>">
									  <div class="form-group text-right">
									  <span id="loadUpdateDigital"  style="float:left;display:none">Inserting...</span>
										<div class="col-sm-offset-3 col-sm-9">
										  <a href="<?php echo base_url();?>my-digital-assets" class="btn btn-default">CANCEL</a>
										  <button type="submit" class="btn btn-danger">UPDATE <span class="mm_show">A </span> <span class="m_hide">DIGITAL</span> ASSET</button>
										</div>
									  </div>

								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</section>
        </div>
    </div>

<!-- Crop User Profile Image -->
<div class="modal fade" id="crop_user_profile_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel">Upload  Image</h3>
				<span style="float: right; margin-top: -33px;" ><button type="button" class="btn btn-primary" onclick="selectCropImage();">Upload Image</button></span>
			</div>
			<div class="modal-body">
				<div id="cropSrcImgContainer" style="min-height:300px;margin-top:30px;" class="img-responsive">
					<img alt="" src="" id="cropbox" />
				</div>
				<div class="jc_coords">
					<form id="CropForm" method="post" >
						<input type="hidden" id="x" name="x" />
						<input type="hidden" id="y" name="y" />
						<input type="hidden" id="w" name="w" />
						<input type="hidden" id="h" name="h" />
					</form>
				</div>
				<div class="modal-footer">
					<span id="loadCrop"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary export" onclick="checkCoords();" style="display:none">Crop</button>
				</div>
				<input type="file" id="fileCropInp" name="fileCropInp" style="display:none;"  />
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="hidCropType">
<input type="hidden" id="hid_imageName">
<input type="hidden" name="mileStonesBoxesCnt" id="mileStonesBoxesCnt" value="<?php echo count($digitalData['ms_title'])+1; ?>">

<input type="hidden" name="mileStonesTotBoxesCnt" id="mileStonesTotBoxesCnt" value="<?php echo count($digitalData['ms_title'])+1; ?>">
<input type="hidden" name="coreTeamBoxesCnt" id="coreTeamBoxesCnt" value="<?php echo count($digitalData['cot_name'])+1; ?>">
<input type="hidden" name="advisoryTeamBoxesCnt" id="advisoryTeamBoxesCnt" value="<?php echo count($digitalData['adt_name'])+1; ?>">
<input type="hidden" name="tradeExchBoxesCnt" id="tradeExchBoxesCnt" value="<?php echo count($digitalData['te_title'])+1; ?>">
<input type="hidden" name="escrowDetailsBoxesCnt" id="escrowDetailsBoxesCnt" value="<?php echo count($digitalData['escrow_name'])+1; ?>">
<input type="hidden" name="ResourcesCnt"    	id="ResourcesCnt"    value="<?php echo count($digitalData['resrc_name'])+1; ?>">
<input type="hidden" name="uploadDocumentsCnt" id="uploadDocumentsCnt" value="<?php echo count($digitalData['upload_docs'])+1; ?>">
<script>
	$(document).ready(function() {
		$('#update_digital_asset').formValidation();
	});
	var d 		= new Date();
	var time 	= d.getTime();
	var userId = '<?php echo $this->session->userdata('user_id'); ?>';
	var _URL = window.URL || window.webkitURL;
	function showCropPopup1(cropType){
		$("#l_i_c").hide();
		$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" class="img-responsive"/>');
		$('.export').hide();
		$('#fileCropInp').val("");
		$('#upload_image_blank').show();
		$('#crop_user_profile_image').modal('show');
		$('#hidCropType').val(cropType);
	}
	/* $(document).ready(function() {
		$(document).on('change','#digital_uploaded_file',function(){
			var file_data = document.getElementById('digital_uploaded_file').files[0];
			var img_name = file_data.name;
			//var img_ext = img_name.split('.').pop().tolowerCase();
			//alert(img_name);return false;
			var form_data = new FormData();
			form_data.append('digital_uploaded_file', file_data);
			$.ajax({
				url: baseUrl+'Company/getComonImage?id='+time,
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				dataType:'json',
				success: function(data){
					//alert(data.output);return false;
					var imgName = data.output;
					$('#userhidImage').val(imgName);
				}
			});
		});
	}); */
	function selectCropImage(){
		$('#fileCropInp').click();
	}
	$('#fileCropInp').change(function(click){
		 showCropButton(this);
	});
	function showCropButton(input){
		var imageOrNot = input.files[0].name.split('.');
		var extentionName = imageOrNot[1].toLowerCase();
		if(extentionName == "jpeg" || extentionName == "jpg" || extentionName == "jpe" || extentionName == "gif" || extentionName == "png")
		{
			var crop_width=0;
			var crop_height=0;
			var file, img;
			if ((file = input.files[0])) {
				img = new Image();
				img.src = _URL.createObjectURL(file);
				img.onload = function() {
					$('#upload_image_blank').hide();
					crop_width=this.width;
					crop_height=this.height;
					var cropTypeValue = $('#hidCropType').val();
					if(cropTypeValue == 1)
					{
						$('.export').show();
						cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					}else{

						$('.export').show();
						cropImagePredefinedBothQ(crop_width,crop_height,img.src);
					}

				};
			}
		}else{
			alert("Please upload images only");
		}
	}
	var jcropminLoaded = 0;
	function cropImagePredefinedBothQ(width,height,src){
		$('#upload_image_loader').show();
		if( !parseInt(jcropminLoaded) ){
			uploadCropImage('fileCropInp',width,height,src);
		}else{
			$('#cropbox').remove();
			var cropBoxImg = $('<img alt = "" src="" id="cropbox" class="img-responsive" />');
			$('#cropSrcImgContainer').empty().append(cropBoxImg);
			uploadCropImage('fileCropInp',width,height,src);
		}
	}
	var jcropminLoaded = 0;
	function displayCrop(width,height,src){
	var cropTypeValue = $('#hidCropType').val();
	if( !parseInt(jcropminLoaded) ){
		$.getScript( baseUrl+"js/jcrop.min.js" ).done(function( script, textStatus ){
			$('#upload_image_loader').hide();
			jcropminLoaded = 1;
			jQuery(function(){
				if(cropTypeValue == 1){
					jQuery('#cropbox').Jcrop({
						aspectRatio: 1,
						setSelect: [0,160 ,160,0],
						onSelect: updateCoords,
						rotate : 90
					});
				}else{
					jQuery('#cropbox').Jcrop({
						setSelect: [0,160 ,160,0],
						onSelect: updateCoords,
						rotate : 90
					});
				}
			});
		});
	}else{
		$('#upload_image_loader').hide();
		jQuery(function(){
			if(cropTypeValue == 1){
				jQuery('#cropbox').Jcrop({
					aspectRatio: 1,
					setSelect: [0,160 ,160,0],
					onSelect: updateCoords,
					rotate : 90
				});
			}else{
				jQuery('#cropbox').Jcrop({
					setSelect: [0,160 ,160,0],
					onSelect: updateCoords,
					rotate : 90
				});
			}
		});
	}
}
 function updateCoords(c){
		var ratioW = $('#cropbox')[0].naturalWidth / $('#cropbox').width();
		var ratioH = $('#cropbox')[0].naturalHeight / $('#cropbox').height();
		var currentRatio = Math.min(ratioW, ratioH);
        jQuery('#x').val(Math.round(c.x * currentRatio));
        jQuery('#y').val(Math.round(c.y * currentRatio));
        jQuery('#w').val(Math.round(c.w * currentRatio));
        jQuery('#h').val(Math.round(c.h * currentRatio));
	}
	function checkCoords(){
		if( parseInt(jQuery('#w').val()) > 0 ){
			$("#l_i_c").show();
			var x=jQuery('#x').val();
			var y=jQuery('#y').val();
			var w=jQuery('#w').val();
			var h=jQuery('#h').val();
			var cropTypeValue 	= $('#hidCropType').val();
			if(cropTypeValue == 1){
				var existinImageId 	= $('#imageId').val();
			}else{
				var existinImageId 	= $('#hidImage').val();
			}
			var u_id 			= $('#hid_u_id').val();
			var catImageBasicUploadUrl = baseUrl+'User/upload_company_image';
			var hid_imageName = $('#hid_imageName').val();
			var form_data = new FormData();
			form_data.append('imageName', hid_imageName);
			form_data.append('croppedX', x);
			form_data.append('croppedY', y);
			form_data.append('croppedNewWidth', w);
			form_data.append('croppedNewHeight', h);
			form_data.append('imageId',existinImageId);
			form_data.append('u_id',u_id);
			form_data.append('cropTypeValue',cropTypeValue);
			$('#loadCrop').show();
			$.ajax({
				url: catImageBasicUploadUrl,
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				type: 'post',
				dataType:'json',
				success: function(data){
					if(data.output == 1){
						var date = new Date();
						var timestamp = date.getTime();
						var newCatImageFullPath = baseUrl+'asset/img/companies/'+userId+'/logos/'+data.imageName+'?t='+timestamp;
						if(cropTypeValue == 1){
							$("#l_i_c").hide();
							$('#image').attr('src', newCatImageFullPath);
							$('#imageId').val(data.imageName);
							$('#loadCrop').hide();
							$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" class="img-responsive" />');
							$('.export').hide();
							$('#fileCropInp').val("");
							$('#crop_user_profile_image').modal('hide');
							$('#front-end-profile-image').attr('src', newCatImageFullPath);
						}else{
							$("#l_i_c").hide();
							$('#uploadedProfileLogo').attr('src', newCatImageFullPath);
							$('#hidImage').val(data.imageName);
							$('#loadCrop').hide();
							$('#cropSrcImgContainer').html('<img alt="" src="" id="cropbox" class="img-responsive" />');
							$('.export').hide();
							$('#fileCropInp').val("");
							$('#crop_user_profile_image').modal('hide');
						}
					}else{
						$('#crop_image_validation_message').html('The given extention is not allowed.');
						$('$crop_image_validation').show();
					}
				}
			});
		}else{
			alert('Please select a crop region then press submit.');
		}
	}

	function uploadCropImage(fieldID,width,height,src){
		var _URL = window.URL || window.webkitURL;
		var image;
		var fd = new FormData();
		switch($('#'+fieldID).val().substring($('#'+fieldID).val().lastIndexOf('.') + 1).toLowerCase()){
			case 'png': case 'jpg': case 'jpeg': case 'jpe': case 'gif':
			image = new Image();
			image.src = _URL.createObjectURL($('#'+fieldID)[0].files[0]);
			image.onload = function() {
				fd.append( fieldID, $('#'+fieldID)[0].files[0]);
				$.ajax({
					url: baseUrl+'User/upload_cropcompany_image',
					data: fd,
					processData: false,
					contentType: false,
					type: 'POST',
					dataType:'json',
					cache:	false,
					success: function(returned){
						$('#cropbox').attr('src', baseUrl+'asset/img/companies/'+userId+'/logos/'+returned.imageName);
						$('#hid_imageName').val(returned.imageName);
						//$('#userhidImage').val(returned.imageName);
						displayCrop(width,height,src);
					}
				});
			}
			break;
			default:
			$('#'+fieldID).val('');
			alert('Please upload JPG,JPEG,JPE and PNG formats');
			break;
		}
	}

	function mailstone_boxes( cnt )
	{
		$("#maxfieldsallowed").modal('hide');
		var mailstone_boxes_cnt   = $('#mailstone_boxes_cnt').val().trim();
		var count_mb              = parseInt( mailstone_boxes_cnt )+parseInt("1");
		var TotMileStonesBoxesCnt = $('#mileStonesTotBoxesCnt').val();
		var existingFText = $('#mb_b_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var cntfiles = 0;
			$("textarea[id^='ms_title_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("ms_title_", ""));
				if( $('#ms_title_'+textboxId).length > 0 )
				{
					cntfiles++;
				}
			});
			if( cntfiles > 1 )
			{
				deleteTopCompany(cnt,TotMileStonesBoxesCnt,'milestone');
				// $('#milestone_div_'+cnt).remove();
				// $('#mileStonesTotBoxesCnt').val(parseInt(TotMileStonesBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotMileStonesBoxesCnt < 20){
			$('#mb_b_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#mb_b_'+cnt+' span ').addClass( "fa fa-minus" );
			$('#mileStonesTotBoxesCnt').val(parseInt(TotMileStonesBoxesCnt)+parseInt(1));
			var html = "";
			html = '<div class="form-group" id="milestone_div_'+count_mb+'">';
				html += '<label for="inputPassword3" class="col-sm-3 control-label">Milestones </label><div class="col-sm-9"><div class="row no-margin mailstone_pad_bg"><div class="col-md-8">';

				html += '<textarea class="form-control" placeholder="Milestones" name="ms_title[]"  id="ms_title_'+count_mb+'"  value=""></textarea>';
				html +='</div>';
				html +='<div class="col-md-4 mmar_t15 select_style"><select class="form-control" name="ms_mss_id[]" id="ms_mss_id_'+count_mb+'"><option value="0">Select Status</option>';

				html += '<?php if(sizeof($milestoneStatuses) > 0){ foreach($milestoneStatuses as $mstones){ ?><option value="<?php echo $mstones->mss_id ;?>"><?php echo $mstones->mss_status ;?></option><?php }} ?>';

				html +='</select></div>';
				html +='<div class="more_input_boxes"><a href="javascript:void(0);" id="mb_b_'+count_mb+'" OnClick="mailstone_boxes('+count_mb+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';

					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#milestones_boxes').append(html);

			$('#mailstone_boxes_cnt').val(count_mb);

			return false;
		}else{
			// $("#maxfieldsallowed").modal('show');
		}
	}
	function coreTeam(cnt){
		$("#maxfieldsallowed").modal('hide');
		var core_team_cnt = $('#core_team_cnt').val().trim();
		var count_ct      = parseInt( core_team_cnt )+parseInt("1");
		var TotCoreTeamBoxesCnt = $('#coreTeamBoxesCnt').val();
		var existingFText = $('#coreteam_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='cot_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("cot_name_", ""));
				if( $('#cot_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				deleteTopCompany(cnt,TotCoreTeamBoxesCnt,'coreteam');
				// $('#core_team_'+cnt).remove();
				// $('#coreTeamBoxesCnt').val(parseInt(TotCoreTeamBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotCoreTeamBoxesCnt < 20){
			$('#coreTeamBoxesCnt').val(parseInt(TotCoreTeamBoxesCnt)+parseInt(1));
			$('#coreteam_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#coreteam_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="core_team_'+count_ct+'">';
			html += '<label for="Core Team" class="col-sm-3 control-label">Core Team</label><div class="col-sm-9"><div class="row pos_r"><div class="col-md-6">';
			html += '<input class="form-control" placeholder="Core Team" name="cot_name[]"  id="cot_name_'+count_ct+'" type="text" value="" >';
			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control" placeholder="LinkedIn URL" name="cot_profile_url[]" id="cot_profile_url_'+count_ct+'" type="text" value="" data-fv-uri="true" data-fv-uri-message="The LinkedIn url is not valid Ex. http://abc.com"></div>';
			html +='<div  class="more_input_boxes" id="coreteam_'+count_ct+'"><a href="javascript:void(0);" onClick="coreTeam('+count_ct+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#core_team_divs').append(html);

			$('#core_team_cnt').val(count_ct);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function advisory_team(cnt){
		$("#maxfieldsallowed").modal('hide');
		var advisory_cnt   = $('#advisory_cnt').val().trim();
		var count_advisory = parseInt( advisory_cnt )+parseInt("1");
		var TotadvisoryBoxesCnt = $('#advisoryTeamBoxesCnt').val();
		var existingFText = $('#advisory_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='adt_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("adt_name_", ""));
				if( $('#adt_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				deleteTopCompany(cnt,TotadvisoryBoxesCnt,'advisory');
				// $('#advisory_team_'+cnt).remove();
				// $('#advisoryTeamBoxesCnt').val(parseInt(TotadvisoryBoxesCnt)-parseInt(1));
				return false;
			}
		}

		if(TotadvisoryBoxesCnt < 20){
			$('#advisoryTeamBoxesCnt').val(parseInt(TotadvisoryBoxesCnt)+parseInt(1));
			$('#advisory_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#advisory_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="advisory_team_'+count_advisory+'">';
			html += '<label for="CAdvisory Team " class="col-sm-3 control-label">Advisory Team</label><div class="col-sm-9"><div class="row"><div class="col-md-6">';
			html += '<input class="form-control" placeholder="Advisory Team" name="adt_name[]"  id="adt_name_'+count_advisory+'" type="text" value="">';
			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control" placeholder="LinkedIn URL" name="adt_profile_url[]" id="adt_profile_url_'+count_advisory+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The LinkedIn URL must be less than 100 characters" data-fv-uri="true" data-fv-uri-message="The LinkedIn URL is not valid Ex. http://abc.com"></div>';
			html +='<div class="more_input_boxes" id="advisory_btn_'+count_advisory+'"><a href="javascript:void(0);" OnClick="advisory_team('+count_advisory+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#advisory_team_divs').append(html);
			$('#advisory_cnt').val(count_advisory);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function treading_exchange(cnt){
		$("#maxfieldsallowed").modal('hide');
		var treadin_exchange_cnt = $('#treadin_exchange_cnt').val().trim();
		var count_treading  = parseInt( treadin_exchange_cnt )+parseInt("1");
		var TotTrExBoxesCnt  = $('#tradeExchBoxesCnt').val();
		var existingFText    = $('#te_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='te_title_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("te_title_", ""));
				if( $('#te_title_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				deleteTopCompany(cnt,TotTrExBoxesCnt,'treading');
				// $('#treading_exchange_'+cnt).remove();
				// $('#tradeExchBoxesCnt').val(parseInt(TotTrExBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotTrExBoxesCnt < 20){
			$('#tradeExchBoxesCnt').val(parseInt(TotTrExBoxesCnt)+parseInt(1));
			$('#te_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#te_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="treading_exchange_'+count_treading+'">';
			html += '<label for="Contact number" class="col-sm-3 control-label">Add Exchange </label><div class="col-sm-9 pos_r"><div class="row"><div class="col-md-6">';
			html += '<input class="form-control" placeholder="Exchange name" name="te_title[]"  id="te_title_'+count_treading+'" type="text" value="">';

			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control" placeholder="Exchange URL" name="trading_exchange_url[]" id="trading_exchange_url_'+count_treading+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The URL must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="te_btn_'+count_treading+'"><a href="javascript:void(0);" onClick="treading_exchange('+count_treading+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';
			$('#treading_exchange_divs').append(html);
			$('#treadin_exchange_cnt').val(count_treading);
			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function upload_muliple_files(cnt){
		$("#maxfieldsallowed").modal('hide');
		var upload_files_cnt = $('#upload_files_cnt').val().trim();
		var count_upload = parseInt( upload_files_cnt )+parseInt("1");
		var TotUploadDocumentsCnt = $('#uploadDocumentsCnt').val();
		var existingFText = $('#upload_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='cp_picture_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("cp_picture_", ""));
				if( $('#cp_picture_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				deleteTopCompany(cnt,TotUploadDocumentsCnt,'uploads');
				// $('#uploads_div_'+cnt).remove();
				// $('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)-parseInt(1));
				return false;
			}
		}
		if(TotUploadDocumentsCnt < 20){
			$('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)+parseInt(1));
			$('#upload_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#upload_btn_'+cnt+' span ').addClass( "fa fa-minus" );

			var html = "";
			html = '<div class="form-group" id="uploads_div_'+count_upload+'">';
			html += '<label for="telegram " class="col-sm-3 control-label">Upload</label><div class="col-sm-9 pos_r">';
			html += '<input class="form-control" placeholder="Trading exange" name="cp_picture[]"  id="cp_picture_'+count_upload+'" type="file" value="" style="height:auto;"><p class="small mar_t5 text-right"><em>PDF, IMAGE, WORD, etc... </em></p>';
			html +='<div class="more_input_boxes" id="upload_btn_'+count_upload+'"><a href="javascript:void(0);" onClick="upload_muliple_files('+count_upload+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
			html += '</div>';
			html += '</div>';
			$('#upload_file_divs').append(html);
			$('#upload_files_cnt').val(count_upload);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function escrow_details(cnt){
		$("#maxfieldsallowed").modal('hide');
		var escrow_cnt   = $('#escrow_cnt').val().trim();
		var count_escrow = parseInt( escrow_cnt )+parseInt("1");
		var TotescrowBoxesCnt = $('#escrowDetailsBoxesCnt').val();
		var existingFText = $('#escrow_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='escrow_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("escrow_name_", ""));
				if( $('#escrow_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				deleteTopCompany(cnt,TotescrowBoxesCnt,'escrow');
				// $('#uploads_div_'+cnt).remove();
				// $('#uploadDocumentsCnt').val(parseInt(TotUploadDocumentsCnt)-parseInt(1));
				return false;
			}
		}

		if(TotescrowBoxesCnt < 20){
			$('#escrowDetailsBoxesCnt').val(parseInt(TotescrowBoxesCnt)+parseInt(1));
			$('#escrow_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#escrow_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="escrow_team_'+count_escrow+'">';
			html += '<label for="CAdvisory Team " class="col-sm-3 control-label">Escrow Details</label><div class="col-sm-9"><div class="row"><div class="col-md-6">';
			html += '<input class="form-control" placeholder="Escrow Details" name="escrow_name[]"  id="escrow_name_'+count_escrow+'" type="text" value="">';
			html +='</div><div class="col-md-6 mmar_t15">';
			html +='<input class="form-control" placeholder="Linkden URL/Organzation URL" name="escrow_profile_url[]" id="escrow_profile_url_'+count_escrow+'" type="text" value="" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The URL must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="escrow_btn_'+count_escrow+'"><a href="javascript:void(0);" OnClick="escrow_details('+count_escrow+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#escrow_divs').append(html);
			$('#escrow_cnt').val(count_escrow);

			return false;
		}else{
			$("#maxfieldsallowed").modal('show');
		}
	}
	function resources(cnt){
		$("#maxfieldsallowed").modal('hide');
		var resources_cnt = $('#resources_cnt').val().trim();
		var count_resources  = parseInt( resources_cnt )+parseInt("1");
		var TotTrExBoxesCnt  = $('#ResourcesCnt').val();
		var existingFText    = $('#resource_btn_'+cnt+' span ').attr('class');
		if( existingFText == "fa fa-minus" )
		{
			var noaCountRegFiles = 0;
			$("input[id^='resource_name_']").each(function()
			{
				var textboxId = parseInt(this.id.replace("resource_name_", ""));
				if( $('#resource_name_'+textboxId).length > 0 )
				{
					noaCountRegFiles++;
				}
			});
			if( noaCountRegFiles > 1 )
			{
				deleteTopCompany(cnt,TotTrExBoxesCnt,'resource');
				// $('#resource_'+cnt).remove();
				// $('#ResourcesCnt').val(parseInt(TotTrExBoxesCnt)-parseInt(1));
				return false;
			}
		}
		if(TotTrExBoxesCnt < 5){
			$('#ResourcesCnt').val(parseInt(TotTrExBoxesCnt)+parseInt(1));
			$('#resource_btn_'+cnt+' span ').removeClass( "fa fa-plus" );
			$('#resource_btn_'+cnt+' span ').addClass( "fa fa-minus" );
			var html = "";
			html = '<div class="form-group" id="resource_'+count_resources+'">';
			html += '<label for="Contact number" class="col-sm-3 control-label">Resources </label><div class="col-sm-9 pos_r"><div class="row"><div class="col-md-6">';

			html += '<input type="text" class="form-control" name="resource_name[]"  id="resource_name_'+count_resources+'" placeholder="White Paper">';

			html +='</div><div class="col-md-6 mmar_t15">';
			html +=' <input type="text" class="form-control" name="resource_url[]" id="resource_url_'+count_resources+'" placeholder="URL" data-fv-stringlength="true" data-fv-stringlength-max="100" data-fv-stringlength-message="The URL must be less than 100 characters" ></div>';
			html +='<div class="more_input_boxes" id="resource_btn_'+count_resources+'"><a href="javascript:void(0);" onClick="resources('+count_resources+');" class="btn btn-primary"><span class="fa fa-plus" aria-hidden="true"></span></a></div>';
					html += '</div>';
				html += '</div>';
			html += '</div>';

			$('#resources_divs').append(html);
			$('#resources_cnt').val(count_resources);
			return false;
		}else{
			$("#maxfieldsallowedResources").modal('show');
		}
	}

	function UpdateDigitalAsset(){
		$("#cm_marketcap_error").html('');
		$('#update_digital_asset').formValidation().on('success.form.fv', function(e) {
			e.stopImmediatePropagation();
			$('#loadUpdateDigital').html('Updating...');
				var flag = true;
				var filesNotGiven = false;
				var cm_marketcap = $('#cm_marketcap').val();
				var s = cm_marketcap.split(',').join('');
				if(s.length>16){
					flag = false;
					$('#cm_marketcap').focus();
					$("#cm_marketcap").css("border-color", "#a94442");
					$("#cm_marketcap").css("box-shadow", "none");
					$("#label_mar").css("color", "#a94442");
					$("#cm_marketcap_error").html('Please enter less than 16 characters');
				}else{
					$("#cm_marketcap").css("border-color", "#00a65a");
					$("#cm_marketcap").css("box-shadow", "none");
					$("#label_mar").css("color", "#00a65a");
					$("#cm_marketcap_error").html('');
				}
				$("input[id^='cp_picture_']").each(function()
				{
					var textboxId = parseInt(this.id.replace("cp_picture_", ""));
					userfile = $('#cp_picture_'+textboxId).val()
					if( userfile != "" )
					{
						filesNotGiven = true;
						return;
					}
				});
				if( filesNotGiven )
				{
					$("input[id^='cp_picture_']").each(function()
					{
						var textboxId = parseInt(this.id.replace("cp_picture_", ""));
						userfile = $('#cp_picture_'+textboxId).val()

					});
					var ext = userfile.split('.').pop().toLowerCase();
					if($.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1) {
						$('#upload_files_error').html('Please choose allowed types only');
						flag = false;
					}else{
						flag = true;
					}
				}
				if(flag == true){
					$('#loadUpdateDigital').show();
					var form_data = new FormData($('#update_digital_asset')[0]);
					$.ajax({
						url: baseUrl+'/Company/updateDigitalAsset?id='+time,
						cache: false,
						contentType: false,
						processData: false,
						data: form_data,
						type: 'post',
						dataType:'json',
						success: function(data){
							if(data != 0){
								$('#loadUpdateDigital').html("Updated successfully.").css("color","green");
								setTimeout(function(){
									$("#loadUpdateDigital").hide();
									window.location = baseUrl+'my-digital-assets';
								}, 3000);
							}
						}

					});
				}
			e.preventDefault();
		});
	}
	function deleteTopCompany(cnt,totalDivs,type){
		$("#confrm_u_id").val(cnt);
		$("#confrm_type").val(totalDivs);
		$("#whitchPage").val(type);
		if(type=='milestone'){
			var typeMode = " Do you want to delete the milestones? ";
		}else if(type=='coreteam'){
			var typeMode = " Do you want to delete the coreteam member? ";
		}else if(type=='treading'){
			var typeMode = " Do you want to delete the trading? ";
		}else if(type=='uploads'){
			var typeMode = " Do you want to delete the upload? ";
		}else if(type=='advisory'){
			var typeMode = " Do you want to delete the advisory member? ";
		}else if(type=='escrow'){
			var typeMode = " Do you want to delete escrow details? ";
		}else if(type=='resource'){
			var typeMode = " Do you want to delete the resource? ";
		}
		$("#myModalLabels").html('Delete Confirmation');
		$("#statusmesg").html(typeMode);
		$("#confirmationDeleteModal").modal('show');
	}
	function confirmActions(){
		cnt         = $('#confrm_u_id').val();
		totalDivs = $('#confrm_type').val();
		whitchPage = $('#whitchPage').val();
		if(whitchPage=='milestone'){
			$('#milestone_div_'+cnt).remove();
			$('#milestonesboxesTotCnt').val(parseInt(totalDivs)-parseInt(1));
		}else if(whitchPage=='coreteam'){
			$('#core_team_'+cnt).remove();
			$('#coreTeamBoxesCnt').val(parseInt(totalDivs)-parseInt(1));
		}else if(whitchPage=='treading'){
			$('#treading_exchange_'+cnt).remove();
			$('#tradeExchBoxesCnt').val(parseInt(totalDivs)-parseInt(1));
		}else if(whitchPage=='uploads'){
			$('#uploads_div_'+cnt).remove();
			$('#uploadDocumentsCnt').val(parseInt(totalDivs)-parseInt(1));
		}else if(whitchPage=='advisory'){
			$('#advisory_team_'+cnt).remove();
			$('#advisoryTeamBoxesCnt').val(parseInt(totalDivs)-parseInt(1));
		}else if(whitchPage=='escrow'){
			$('#escrow_team_'+cnt).remove();
			$('#escrowDetailsBoxesCnt').val(parseInt(totalDivs)-parseInt(1));
		}else if(whitchPage=='resource'){
			$('#resource_'+cnt).remove();
			$('#ResourcesCnt').val(parseInt(totalDivs)-parseInt(1));
		}
		$("#confirmationDeleteModal").modal('hide');
	}
	function marketCapFun()
	{
		var cm_marketcap = $('#cm_marketcap').val();
		var numberTrimmed = cm_marketcap.replace(/,/g, '');
		var finalNum = commaSeparateNumber(numberTrimmed)
		$('#cm_marketcap').val(finalNum);
	}
	function commaSeparateNumber(val){
		while (/(\d+)(\d{3})/.test(val.toString())){
		  val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
		}
		return val;
	}
</script>
