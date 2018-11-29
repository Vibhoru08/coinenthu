<?php //echo base_url();exit;?>
	
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				 	EXPORT COMPANIES
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/careers" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" enctype="multipart/form-data"  method="POST" name="export_file" id="export_file" data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="exportData();">
                  <div class="box-body mandatory_color">
				  
				  <div class="col-md-7">
				  
                    <div class="form-group">
                      <label for="excelfile" class="col-sm-3 control-label">Export Data<sup>*</sup></label>
                      <div class="col-sm-8">
					  	<input type="radio" id="companyType" name="companyType" value="1" checked> Digital Assets<br>
  						<input type="radio" id="companyType" name="companyType" value="2"> Ico Trackers<br>
                      </div>
					</div>
                                      
				  <div class="clearfix"></div>
                  <div class="box-footer">
					<span id="loadExport"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<span id="successMsg"></span>
                    <button type="submit" class="btn btn-info pull-right">Export</button>
					<a href="<?php echo base_url();?>admin/careers"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
                  </div>
                </form>
				<!-- Form End -->

				<form action="">

				</form>
            </div>
            </div>
            </div>
		 </section>
	</div>

<!-- Crop User Profile Image -->
<script>
	$(document).ready(function() {
		$('#export_file').formValidation();
		// $('#export_file').submit();
	});
	
</script>