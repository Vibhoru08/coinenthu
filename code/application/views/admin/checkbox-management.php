<div class="content-wrapper">
	<section class="content">
		<div class="box ">
		<section class="content-header">
			<h1>Select Users To Attach a Template</h1>
			<ol class="breadcrumb">
				<form action="<?php echo base_url().'admin/ckeditor'?>" method="POST" name="ckeditor" id="ckeditor"> 			
					<input type="hidden" name="hid" id="hid">
				</form>	
				<li class="" style="margin-top:-10px;"><a onClick = "mailValues();"class="btn btn-info pull-right" style="color:#fff"><i class="fa fa-plus"></i>Attach Template</a></li>
					
			  </ol>
		</section>
			<div class="box-body" id="checkboxManagementList"></div>
		</div>
	</section>
</div>
<script>
	$(function () {
		loadCheckbox();
	});
	$(document).ready(function() {
		//$('#add_user').formValidation();
		CKEDITOR.replace('article_desc', {		
		
		'filebrowserImageBrowseUrl': '<?php echo base_url(); ?>asset/ckeditor/plugins/imageuploader/imgbrowser.php',
		'filebrowserImageUploadUrl': '<?php echo base_url(); ?>asset/ckeditor/plugins/imageuploader/imgupload.php',
		height: '300px',
		contentsCss: [ 'style.css']
  	});
	});
function mailValues()
{
	//alert();return false;	
	var val = [];
	   $('.check:checked').each(function(i){
		 val[i] = $(this).val();
	   });
	var flag = true;
	//alert(val);return false;
	$('#hid').val(val);
	$('#ckeditor').submit();
	//alert($ids);
	
	
}	
	
</script>