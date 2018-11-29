<div class="content-wrapper">
	<section class="content">
		<div class="box ">
		<section class="content-header">
			  <h1>Banner Management</h1>
			  <ol class="breadcrumb">
				<li class="" style="margin-top:-10px;"><a href="<?php echo base_url().'admin/add-banner'?>" class="btn btn-info pull-right" style="color:#fff"><i class="fa fa-plus"></i>  Add Banner</a></li>
			  </ol>
			</section>
			<div class="box-body" id="bannerManagementList"></div>
		</div>
	</section>
</div>
<script>
	$(function () {
		loadBanners();
	});
</script>