	<?php //include('header.php')
		//echo '<pre>';print_r($careerdeatils);exit;
	?>
	
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Edit Career
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/careers" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="edit_career" id="edit_career" data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh"  onSubmit="editCarer();">
                  <div class="box-body mandatory_color">
				  
				  <div class="col-md-7">
				  <?php 
						if(isset($careerdeatils->bop_job_title) && $careerdeatils->bop_job_title!=""){
							$bop_job_title = $careerdeatils->bop_job_title;
						}else{
							$bop_job_title = '';
						}
				  ?>
                    <div class="form-group">
                      <label for="bop_job_title" class="col-sm-3 control-label">Title <sup>*</sup></label>
                      <div class="col-sm-8">
						<input type="text" class="form-control" id="bop_job_title" name="bop_job_title" placeholder="Title" required data-fv-notempty-message="The Title is required and cannot be empty" value= "<?php echo $bop_job_title;?>">
						 <p id="bop_job_title_error" name="bop_job_title_error"></p>
                      </div>					 
                    </div>
					<?php 
						if(isset($careerdeatils->bop_job_description) && $careerdeatils->bop_job_description!=""){
							$bop_job_description = $careerdeatils->bop_job_description;
						}else{
							$bop_job_description = '';
						}
					?>
                    <div class="form-group">
                      <label for="bop_job_description" class="col-sm-3 control-label">Description <sup>*</sup></label>
                      <div class="col-sm-8">
                        <textarea type="text" class="form-control" id="bop_job_description" name="bop_job_description" placeholder="Description" required data-fv-notempty-message="The Description is required and cannot be empty" ><?php echo $bop_job_description;?></textarea>
						<p id="bop_job_description_error" name="bop_job_description_error"></p>
                      </div>
                    </div> 
					<?php 
						if(isset($careerdeatils->bop_job_qualification) && $careerdeatils->bop_job_qualification!=""){
							$bop_job_qualification = $careerdeatils->bop_job_qualification;
						}else{
							$bop_job_qualification = '';
						}
					?>
					<div class="form-group">
                      <label for="bop_job_qualification" class="col-sm-3 control-label">Qualification <sup>*</sup></label>
                      <div class="col-sm-8">
						<input type="text" class="form-control" id="bop_job_qualification" name="bop_job_qualification" placeholder="Qualification" required data-fv-notempty-message="The qualification is required and cannot be empty" value= "<?php echo $bop_job_qualification;?>">					  
						<p id="bop_job_qualification_error" name="bop_job_qualification_error"></p>
                      </div>
                    </div>                   
				  <div class="clearfix"></div>
                  <div class="box-footer">
					<input type="hidden" id="bop_job_id" name="bop_job_id" value="<?php  echo $careerdeatils->bop_job_id;?>">
					<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<span id="successMsg"></span>
                    <button type="submit" class="btn btn-info pull-right">Update Career</button>
					<a href="<?php echo base_url();?>admin/careers"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
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
		$('#edit_career').formValidation();
	});
	
	
</script>