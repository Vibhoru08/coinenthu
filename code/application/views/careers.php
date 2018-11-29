<?php if(count($getCareers)==0){ ?>
	<div class="content-wrapper">
		<div  class="bread_crumb">

		</div>
		<div class="container">
				<h1 style="text-align:center;">Careers</h1>
				<p style="text-align:center;"> No Careers </p>
		</div>
	</div>
<?php } else { ?>

	<div class="bread_crumb">
		<div class="container-fluid">
			<section class="content-header">
					<h1 class="text-right m_hide">
					  &nbsp;
					</h1>

			</section>
		</div>
	</div>
	<section class="content mar_b20">
		<h1 style="text-align:center;">Careers</h1>
		<div class="container" style="min-height: 225px;">
		<input type="hidden" name="totRecords" id="totRecords" value="<?php echo $totCreerRecord; ?>">
		<input type="hidden" id="limitpage"  value="2" />
		<input type="hidden" id="offsetpage" value="2" />
		<?php //if(count($getCareers) > 0){ ?>
		<div>
		<table class="table">

		<tbody id="loadingData">
		<?php
			if(count($getCareers)>0){
			$i=1;
			foreach($getCareers as $key=>$val){
		?>
		  <tr>
			<td>
			<p><p><?php echo $i; ?>. &nbsp;Role - <?php echo ucfirst($val->bop_job_title); ?></p></p>
			<p>Description – <?php echo ucfirst($val->bop_job_description); ?></p>
			<p>Qualifications – <?php echo ucfirst($val->bop_job_qualification); ?></p></td>
		  </tr>

		<?php
		$i++;
			}
		}else{?>
			<tr>
				<td class="text-center">There are no records found.
				</td>
			</tr>
		<?php }
		?>
		</tbody>
		</table>
		</div>

	   <?php if($totCreerRecord > 2){?>

	  <div id="loadingHash1" class="text-center font_s22 mar_t20 "><a href="javascript:void(0);" onClick="GetMoreCareersLoad();" class="btn btn-danger">&nbsp;&nbsp;&nbsp;LOAD MORE &nbsp;&nbsp;&nbsp;</a></div>
	  <!-- <span id="m_hide"><br/></span> -->
		<?php } ?>
	  </div>
	 </section>
		<?php } ?>
    <script>
function GetMoreCareersLoad()
{
	if($("#offsetpage").val()!=undefined && $("#offsetpage").val()!=0){
		var offsetpage  = $("#offsetpage").val();
		var limitpage   = $("#limitpage").val();
		var minCount    = $("#totRecords").val();
		//alert(offsetpage);return false;
		console.log(minCount+'--'+offsetpage);
		if(parseInt(minCount)>parseInt(offsetpage)){
			var url = baseUrl+'Careers/loadmoreCareers?expireTime='+time;
			$.ajax({
				type 		: 	"POST",
				url			:	url,
				cache: false,
				data: {limitpage:limitpage,offsetpage:offsetpage},
				type: 'post',
				dataType	: 	"json",
				success: function(data){
					console.log(data.output);
					if(data.output=='success'){
						if(parseInt(offsetpage) <= parseInt(data.cnt)){
							$("#loadingData").append(data.resData);
							$('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt($('#offsetpage').val()) );
						}
						offsetpage  = $("#offsetpage").val();
						if(parseInt(offsetpage) >= parseInt(data.cnt))
						{
							$('#loadingHash1').addClass('mm_bttom hide');
						}
					}else if(data.output=='norecoreds'){
						setTimeout(function(){
							$("#loadingData").html(data.resData);

						}, 1000);
					}
				}
			});
		}else{
			$('#loadingHash1').addClass('mm_bttom hide');
		}
	 };
}
</script>
