<div class="content-wrapper">
	<section class="content">
		<div class="box ">
		<section class="content-header">
			  <h1>Career Management</h1>
			  <ol class="breadcrumb">
				<li class="" style="margin-top:-10px;"><a href="<?php echo base_url().'admin/add-career'?>" class="btn btn-info pull-right" style="color:#fff"><i class="fa fa-plus"></i>  Add Career</a></li>
			  </ol>
			</section>
			<div class="box-body" id="careerManagementList"></div>
		</div>
	</section>
</div>
<script>
	$(function () {
		loadCareers();
	});
</script>