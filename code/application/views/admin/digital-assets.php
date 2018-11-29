<div class="content-wrapper">
	<section class="content">
		<div class="box ">
		<section class="content-header">
			  <h1>Digital Assets</h1>
			  <ol class="breadcrumb">
				<li class="" style="margin-top:-10px;"><a href="<?php echo base_url().'admin/add-digital-asset'; ?>" class="btn btn-info pull-right" style="color:#fff"><i class="fa fa-plus"></i>  Add Digital Asset</a></li>
			  </ol>
			</section>
			<div class="box-body" id="digitalAssetsList"></div>
		</div>
	</section>
</div>
<script>
	$(function () {
		loadCompanies(1);
	});
</script>