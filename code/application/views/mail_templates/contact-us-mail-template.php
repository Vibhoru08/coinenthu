<!DOCTYPE html>
<html>
  <head>
	<title> Coinenthu - Contact</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
	<div style="width:600px; font-family: Arial,sans-serif;font-size: 12px !important;line-height: 1.5;">
		<table  border="0" style="border-collapse: collapse; border:1px solid #E4E4E4;" cellpadding="10">
			<tr bgcolor="#f2f2f2">
				<td width="50%"><a href="<?php echo base_url(); ?>" alt="Coinenthu" target="_blank" style="text-decoration: none;">
					<img src="<?php echo base_url(); ?>asset/forntend/images/logo.png"></a>
				</td>
				<td width="50%" align="right"><a href="http://spreadthequote.com" target="_blank" style="text-decoration: none;">				
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p><a href="javascript:void(0);" style="font:bold 12px arial; color:#333; text-decoration:none;"><strong>Dear</strong>&nbsp;&nbsp;Guest,</a></p>
					<p>Message Type:<?php
					if($type == 1)
					{
						echo 'User issue';
					}else if($type == 2){
						echo 'Digital Asset related';
					}else if($type == 3){
						echo 'ICO Related';
					}else if($type == 4){
						echo 'Suggestions';
					}else if($type == 5){
						echo 'Advertise with us';
					}else if($type == 6){
						echo 'Other';
					}
					
					?></p>
					<p><?php echo $body; ?></p>
				</td>
			</tr>
			<tr style="background-color:#f9f9f9; text-align:center;color:#515965">
				<td colspan="3">
					<a style="text-decoration: none; font-size:11px;" href="<?php echo base_url(); ?>" target="_blank">
					<strong>&copy; 2017 <span style="color:#515965;">Coinenthu</span>.  All Rights Reserved</strong>.
					</a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>