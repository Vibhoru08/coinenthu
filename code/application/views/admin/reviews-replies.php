  <div class="content-wrapper">
	<section class="content-header">
	  <h1>Company Reviews & Replies</h1>
	  <ol class="breadcrumb">
		<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/company-reviews" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
	  </ol>
	</section><br/>
	<div class="col-md-6 sm_hide">&nbsp;</div>
	<div class="col-md-4">
		<select class="form-control" id="select_company" name="select_company" onChange="reportsReplies('replies');">
			<option value="0">Select a Company</option> 
			<?php if(count($companies) > 0){
				foreach($companies as $company)
				{ ?>
				<option value="<?php echo $company->cm_id; ?>"><?php echo ucfirst($company->cm_name); ?></option>   
			<?php } } ?>
		</select>
	</div>
	<div class="col-md-2">
		<select class="form-control" id="reports_replies" name="reports_replies" onchange="reportsReplies('replies');">
			<option value="0">All</option>
			<option value="1">No Reports</option>
			<option value="2">Reports </option>
		</select>
	</div><br/><br/>
	<section class="content">
	<div class="box">
		<div class="box-body" id="reviewreplies">
		</div>
	</div>
	</section>
</div>
<script>
	$(function () {
		$('#updateReviewReplys').formValidation();
		reportsReplies('replies');		
	});	
</script>