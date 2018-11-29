	<?php 
	//print_r($companyDetails);exit;
    //echo '<pre>';print_r($banerdeatils);exit;
	//include('header.php')?>
	
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
		 <section class="content">
		 <div class="row">
		 <div class="col-md-12">
			<div class="box">
				<section class="content-header">
				  <h1>
				  Edit Banner
				  </h1>
				  <ol class="breadcrumb">
					<li class="" style="margin-top:-10px;"><a href="<?php echo base_url(); ?>admin/banners" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
				  </ol>
				</section>
                <form class="form-horizontal" action="" method="POST" name="edit_banner" id="edit_banner" enctype="multipart/form-data" data-fv-message="This value is not valid"
                      data-fv-icon-valid="glyphicon"
                      data-fv-icon-invalid="glyphicon"
                      data-fv-icon-validating="glyphicon glyphicon-refresh">
                  <div class="box-body mandatory_color">
				  
				  <div class="col-md-7">
				  <?php 
						if(isset($banerdeatils->sb_ct_id) && $banerdeatils->sb_ct_id!=""){
							$sb_ct_id = $banerdeatils->sb_ct_id;
						}else{
							$sb_ct_id = '';
						}
				  ?>
                    <div class="form-group">
                      <label for="sb_ct_id" class="col-sm-3 control-label">Company Type <sup>*</sup></label>
                      <div class="col-sm-8">
                        <select name ="sb_ct_id" id="sb_ct_id" class="form-control">
							<option value="">Select Company</option>
							<?php 
							$comDtls = Array('1'=>'Digital Asset','2'=>'ICO','3'=>'Review');
							foreach($comDtls as $kk=>$currdetais) { 
								$select = "";
								if($sb_ct_id == $kk)
								{
									$select="selected";
								}
							?>
							<option value="<?php echo $kk; ?>"<?php echo $select; ?>><?php echo $currdetais; ?></option>
							<?php } ?>
							
						</select>
						 <small><span id="sb_ct_id_error" name="sb_ct_id_error"></span></small>
                      </div>
					 <?php 
						if(isset($banerdeatils->sb_imagename) && $banerdeatils->sb_imagename!=""){
							$sb_imagename = $banerdeatils->sb_imagename;
						}else{
							$sb_imagename = '';
						}
					?>
                    </div>
                    <div class="form-group">
                      <label for="sb_imagename" class="col-sm-3 control-label">Image <sup>*</sup></label>
                      <div class="col-sm-8">
                        <input type="file" name="sb_imagename" id="sb_imagename" class="form-control" style="height:auto;"/><br>
						<span><img src="<?php echo base_url(); ?>asset/img/banners/<?php echo $sb_imagename;?>" style="height:70px;width:70px" /></span>
						<small><span id="sb_imagename_error" name="sb_imagename_error" ></span></small>					
                      </div>
                    </div> 
					 <?php 
						if(isset($banerdeatils->sb_link) && $banerdeatils->sb_link!=""){
							$sb_link = $banerdeatils->sb_link;
						}else{
							$sb_link = '';
						}
					?>
					<div class="form-group">
                      <label for="sb_link" class="col-sm-3 control-label">Image URL <sup>*</sup></label>
                      <div class="col-sm-8">
						<input type="text" class="form-control" id="sb_link" name="sb_link" placeholder="Link" value="<?php echo $sb_link; ?>">					  
						<small><span id="sb_link_error" name="sb_link_error"></span></small>
                      </div>
                    </div>                   
				  <div class="clearfix"></div>
                  <div class="box-footer">
					<span id="loadAddUser"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
					<span id="successMsg"></span>
					<input type="hidden" id="sb_id" name="sb_id" value="<?php  echo $banerdeatils->sb_id;?>">
					<input type="hidden" id="hid_image" name="hid_image" value="<?php  echo $sb_imagename;?>">
                    <button type="button" class="btn btn-info pull-right" onClick="editBanner();">Update Banner</button>
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