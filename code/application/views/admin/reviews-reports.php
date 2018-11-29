  <div class="content-wrapper">
	<section class="content-header">
	  <h1>Reviews Reports</h1>
	</section><br/>
	<div class="col-md-6 sm_hide">&nbsp;</div>
	<div class="col-md-4">
		<select class="form-control" id="select_company" name="select_company" onChange="reportsReview('reviews');">
			<option value="0">Select a Company</option> 
			<?php if(count($companies) > 0){
				foreach($companies as $company)
				{ ?>
				<option value="<?php echo $company->cm_id; ?>"><?php echo ucfirst($company->cm_name); ?></option>   
			<?php } } ?>
		</select>
	</div>
	<input type="hidden" id="reports_replies" value="0">
	<br/><br/>
	<section class="content">
	<div class="box">
		<div class="box-body" id="reviewsList">
		</div>
	</div>
	</section>
</div>

<script>
	$(function () {
		reportsReview('reviews');		
	});	
</script>