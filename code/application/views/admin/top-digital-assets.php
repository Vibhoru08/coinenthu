<div class="content-wrapper">
	<section class="content-header">
		<h1> Top digital Assets </h1>
		<ol class="breadcrumb">
			<li class="" style="margin-top:-10px;"><a href="<?php echo $baseUrl;?>digital-assets" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box mandatory_color">
					<form class="form-horizontal" id="mailForm"  name="mailForm" onsubmit="userFormValidation()" method="POST"  
						  data-fv-message="This value is not valid"
						  data-fv-icon-valid="glyphicon"
						  data-fv-icon-invalid="glyphicon"
						  data-fv-icon-validating="glyphicon glyphicon-refresh">
						<div class="box-body mandatory_color">
							<div class="col-md-12">
								<?php 
								if(count($digitalassets) > 0){
									$speSelected = "";
									foreach($digitalassets as $digitalasset){
										$speSelected .='<option value="'.$digitalasset->cm_id.'" >'.ucfirst($digitalasset->cm_name).'</option>';
										$venValues   .= $digitalasset->cm_id.'%'.$digitalasset->cm_name.',';
									}
								} 
								?>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label" > Digital Asset <sup>*</sup></label>
									<div class="col-sm-6" id="toPartners" >
									<div class="pos_r" style="position:relative">
										<select class="test form-control" id="companiesList" name="companiesList[]" multiple="multiple" placeholder = "Select Digital Asset" >
										</select><span id="errorUsers" style="color:#a94442;font-size:12px;"></span>
									</div>
									</div>
									<button type="button" class="btn btn-info" style="margin-right:10px;" onclick="setTopCompanies(1)">Save</button>
									<span style="color:green;font-size:12px;" id="successMeg"></span>
									<span id="statusLoading" style="display:none;">
									<i class="fa fa-refresh fa-spin"></i></span>
								</div>
								<input type= "hidden" name= "hidSavedList" id= "hidSavedList" value="<?php echo $venValues; ?>" >
								<div class="clearfix"></div>
								<div class="box-footer">
									<div class="box-body" id="topAssetsList"></div>
								</div>
							</div>
						</div>
					</form>				
            	</div>
            </div>
		</div>
	</section>
</div>
<script>
(function($) {
    $(function() {
	   $('.facebook-auto').remove();
	   $('#companiesList').html('<?php echo $speSelected; ?>');
	   $("#companiesList").fcbkcomplete({
			addontab: true,                   
			maxitems: 100,
			height: 10,
			cache: true,
			userfilter:1,
			casesensetive:0
		});
    });
	loadTopDigitalAssets('asset');
})(jQuery);

</script>