<div class="content-wrapper">
	<section class="content">
		<div class="box ">
		<section class="content-header">
			  <h1>Events</h1>
			  <ol class="breadcrumb">
				<li class="" style="margin-top:-10px;"><a href="<?php echo base_url().'admin/add-events'; ?>" class="btn btn-info pull-right" style="color:#fff"><i class="fa fa-plus"></i>  Add An Event</a></li>
			  </ol>
			</section>
			<div class="box-body" id="eventsList"></div>
		</div>
	</section>
</div>
<script>
	$(function () {
		loadEventsList(1);
	});
</script>