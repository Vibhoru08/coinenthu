<?php
// echo '<pre>';print_r($subscriberres);exit;
	$length=0;
	foreach($subscriberres as $key=>$subres){
		if($subres->bop_sel_status != 1 && $subres->bop_sel_status == 0)
		{
			if($length==$key && $length<2)
			{
				//print_r($subres);	exit;
				$config = array (
					'mailtype' => 'html',
					'charset'  => 'utf-8',
					'priority' => '1'
				);
				$mailDetails = $subres->bop_sel_name;
				$this->email->initialize($config);
				$this->load->library('email');
				$from_email = "info@coinenthu.com"; 				
				$to_email   = $subres->bop_sel_email;
				$this->email->from($from_email, 'Coinenthu');
				$this->email->to($to_email);
				$this->email->subject('You are added to Coinenthu');
				$message = 'Dear '.$subres->bop_sel_name;
				$message .= $subres->bop_temp_desc;
				$message .= '<a  font-size:11px;"  target="_blank" href="'.base_url().'unsubscribe?id='.base64_encode($subres->bop_sub_id).'"  >Unsubscribe</a>';
				// echo $message;exit;
				$this->email->message($message);
				//print_r($_POST['article_desc']);exit;
				if($this->email->send()) {
					$selid = $subres->bop_sel_id;
					$updateselectedres = $this->Admin_model->updateselectedMails($selid);
				} else {
					echo "Error";
				}
				$length++;
			}
		}
	}

 ?>

<script>
	// alert();
</script>
