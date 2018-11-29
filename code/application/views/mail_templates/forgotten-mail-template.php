<!DOCTYPE html>
<html>
  <head>
	<title> Coinenthu - Registration confirmation </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
	<div style="width:600px; font-family: Arial,sans-serif;font-size: 12px !important;line-height: 1.5;">
		<table  border="0" style="border-collapse: collapse; border:1px solid #E4E4E4;" cellpadding="10">
			<tr bgcolor="#f2f2f2">
				<td width="50%"><a href="<?php echo base_url(); ?>" alt="Coinenthu" target="_blank" style="text-decoration: none;">
					<img src="<?php echo base_url(); ?>asset/forntend/images/logo.png"></a>
				</td>
				<td width="50%" align="right"><a href="<?php echo base_url(); ?>" target="_blank" style="text-decoration: none;">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p><a href="javascript:void(0);" style="font:bold 12px arial; color:#333; text-decoration:none;"><strong>Dear</strong>&nbsp;&nbsp;<?php echo $name; ?>,</a></p>
					<p>We have received a password reset request for your Coinenthu account.</p>
					<p style="color:#333" align="left">Click below to reset your password.</p>
					<a href="<?php echo $passwordLink; ?>" style="text-decoration:none;color:#227cec;font-family:Trebuchet MS;font:normal 12px arial;border:1px solid #227cec;padding: 6px 17px 6px 10px;" >Reset Password </a>
					<p>Or copy and paste the following into your browser:</p>
					<p><a style="text-decoration: none; color:#428bca" href="<?php echo $passwordLink; ?>"><?php echo $passwordLink; ?></a></p>
				</td>
			</tr>
			<tr>
				<td colspan="3">
				Regards,<br/>
				Coinenthu Team
				</td>
			</tr>
			<tr style="background-color:#f9f9f9; text-align:center;color:#515965">
				<td colspan="3">
					<a style="text-decoration: none; font-size:11px;" href="<?php echo base_url(); ?>" target="_blank">
					<strong>&copy; 2018 <span style="color:#515965;">Coinenthu</span>.  All Rights Reserved</strong>.
					</a>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
