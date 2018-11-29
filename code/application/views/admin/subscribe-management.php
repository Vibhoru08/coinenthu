<div class="content-wrapper">
	<section class="content">
		<div class="box ">
		<section class="content-header">
			  <h1>Subscriber Management</h1>
			  <ol class="breadcrumb">
				<li class="" style="margin-top:-10px;"><a href="<?php echo base_url().'admin/add-email'?>" class="btn btn-info pull-right" style="color:#fff"><i class="fa fa-plus"></i> Add Email</a></li>
			  </ol>
			</section>
			<div class="box-body" id="subscribeManagementList"></div>
		</div>
	</section>
</div>
<script>
	$(function () {
		loademails();
	});
</script>