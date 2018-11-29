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
				 Mail Checkboxces
				  </h1>
				  
				</section>				
            </div>
			
			<form id ="frm1">
			
				<table border="1" width="300px;">
				  <thead>
					<tr>
					  <th>Select&nbsp;&nbsp;&nbsp;<input type='checkbox' name='checkall' onclick='checkedAll(frm1);'></th>
					  <th>Email</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td><input type="checkbox" name="chk1"></td>
					  <td>Email</td>
					</tr>
					<tr>
					  <td><input type="checkbox" name="chk2"></td>
					  <td>Email</td>
					</tr>
					<tr>
					  <td><input type="checkbox" name="chk3"></td>
					  <td>Email</td>
					</tr>
					<tr>
					  <td><input type="checkbox" name="chk4"></td>
					  <td>Email</td>
					</tr>

				  </tbody>
				</table>
			
			</form><br>
			<input style="marging-left:100px"type="button" name="send" id="send" value="Send" onClick="ckeditor();"></button>	
		 </section>
	</div>


<script type="text/javascript">
		checked=false;
		function checkedAll (frm1) {var aa= document.getElementById('frm1'); if (checked == false)
		{
		checked = true
		}
		else
		{
		checked = false
		}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
		}
		function ckeditor(){
			alert();
		}
		
		/* $('body').on('change', '#mass_select_all', function() {
				//alert();return false;
			   var rows, checked;
			   rows = $('#faqQuestionsU').find('tbody tr');
			   checked = $(this).prop('checked');
			   $.each(rows, function() {
				  var checkbox = $($(this).find('td').eq(0)).find('input').prop('checked', checked);
			   });
			 }); */
</script>
                  