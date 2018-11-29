	<?php 
	//print_r($companyDetails);exit;
	//include('header.php')?>
	
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Add Banner
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/banners" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="add_banner" id="add_banner" enctype="multipart/form-data" data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" >
                  <div class="box-body mandatory_color">				  
				  <div class="col-md-7">				  
                    <div class="form-group">
                      <label for="sb_ct_id" class="col-sm-3 control-label">Company Type <sup>*</sup></label>
                      <div class="col-sm-8">
                        <select name ="sb_ct_id" id="sb_ct_id" class="form-control" >
							<option value="">Select Company</option>
							<?php foreach($companyDetails as $currdetais) { ?>
							<option value="<?php echo $currdetais->ct_id; ?>"><?php echo $currdetais->ct_name; ?></option>
							<?php } ?>
							<option value="3">Review</option>
						</select>
						 <small><span id="sb_ct_id_error" name="sb_ct_id_error"></span></small>
                      </div>
					 
                    </div>
                    <div class="form-group">
                      <label for="sb_imagename" class="col-sm-3 control-label">Image <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="file" name="sb_imagename" id="sb_imagename" class="form-control" style="height:auto;border: 1px solid;color:#ccc;"/>
						<small><span id="sb_imagename_error" name="sb_imagename_error"></span></small>
                      </div>
                    </div> 
					<div class="form-group">
                      <label for="sb_link" class="col-sm-3 control-label">Image URL <sup>*</sup></label>
                      <div class="col-sm-8">
						<input type="text" class="form-control" id="sb_link" name="sb_link" placeholder="Link">					  
						<small><span id="sb_link_error" name="sb_link_error"></span></small>
                      </div>
                    </div>                   
				  <div class="clearfix"></div>
                  <div class="box-footer">
					<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<span id="successMsg"></span>
                    <button type="button" class="btn btn-info pull-right" onClick="addBanner();">Add Banner</button>
					<a href="<?php echo base_url();?>admin/banners"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
                  </div>
                </form>
				<!-- Form End -->
            </div>
            </div>
            </div>
		 </section>
	</div>

<!-- Crop User Profile Image -->
<script>				
	$( "#sb_ct_id" ).change(function() {
		$('#sb_ct_id_error').html('');
	});
	$( "#sb_imagename" ).change(function() {
		$('#sb_imagename_error').html('');
	});
	$( "#sb_link" ).change(function() {
		$('#sb_link_error').html('');
	});
	$( "select" ).change(function() {
		$("select").css("border", "");
	});
	$( "input" ).change(function() {
		$("input").css("border", "");
	});
</script>
