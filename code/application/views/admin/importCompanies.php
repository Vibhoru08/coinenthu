<?php //echo base_url();exit;?>
	
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Import Companies
				  </h1>
				  <ol class="breadcrumb">
				  </ol>
				</section>
                <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url() ?>ExcelActions/importCompanies" method="POST" name="import_file" id="import_file" data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="importfile();">
                  <div class="box-body mandatory_color">
				  
				  <div class="col-md-7">
				  
                    <div class="form-group">
                      <label for="excelfile" class="col-sm-3 control-label">Import<sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control" id="importFile" name="importFile" placeholder="Upload Excel File" required data-fv-notempty-message="The file is required and cannot be empty" accept=".csv">
						
                      </div>
					 </div>
                                      
				  <div class="clearfix"></div>
                  <div class="box-footer">
									<span id="importMsg"></span>
									<span id="importLoader" style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
                    <button type="submit" class="btn btn-info pull-right">Add File</button>
					<a href="<?php echo base_url();?>admin/careers"></a>
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
	$(document).ready(function() {
		$('#import_file').formValidation();
		//$('#add_file').submit();
	});
	
</script>