  <div class="content-wrapper">
	<section class="content-header">
	  <h1>Company Reviews</h1>
	  <ol class="breadcrumb">
		
	  </ol>
	</section><br/>
	<div class="col-md-6 sm_hide">&nbsp;</div>
	<div class="col-md-4">
		<select class="form-control" id="select_company" name="select_company" onChange="reportsReplies('reviews');">
			<option value="0">Select a Company</option> 
			<?php if(count($companies) > 0){
				foreach($companies as $company)
				{ ?>
				<option value="<?php echo $company->cm_id; ?>"><?php echo ucfirst($company->cm_name); ?></option>   
			<?php } } ?>
		</select>
	</div>
	<div class="col-md-2">
		<select class="form-control" id="reports_replies" name="reports_replies" onchange="reportsReplies('reviews');">
			<option value="0">All</option>
			<option value="1">No Reports</option>
			<option value="2">Reports </option>
		</select>
	</div><br/><br/>
	<section class="content">
	<div class="box">
		<div class="box-body" id="reviewsList">
		</div>
	</div>
	</section>
</div>

<script>
	$(function () {
		reportsReplies('reviews');		
		$('#updateReviews').formValidation();
	});	
</script>