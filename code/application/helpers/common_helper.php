<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

    function checkUserReport($uid,$re_id) {
		$ci=& get_instance();
		$ci->load->database(); 
		$reported = 0;
		$sql ="SELECT * FROM bop_review_reponses WHERE rr_uid='$uid' AND rr_reid='$re_id' AND rr_report='1'";
		$query = $ci->db->query($sql);
		$row = $query->row();	
		if(isset($row->rr_id) && $row->rr_id!=""){
			$reported = 1;
		}else{
			$reported = 0;
		}
		return $reported;
    }
	function checkUserReplyReport($uid,$crr_id){
		$ci=& get_instance();
		$ci->load->database(); 
		$reported = 0;
		$sql ="SELECT * FROM bop_replies_reponses WHERE rrr_uid='$uid' AND rrr_crr_id='$crr_id' AND rrr_report='1'";
		$query = $ci->db->query($sql);
		$row = $query->row();	
		if(isset($row->rrr_id) && $row->rrr_id!=""){
			$reported = 1;
		}else{
			$reported = 0;
		}
		return $reported;
	}
	function ak_img_resize($target, $newcopy, $w, $ext) {
		list($w_orig, $h_orig) = getimagesize($target);
		//$scale_ratio = $w_orig / $h_orig;    
		$h = $w;			
		$img = "";
		$ext = strtolower($ext);
		
		if ($ext == "gif"){ 
		  $img = imagecreatefromgif($target);
		} else if($ext =="png"){ 
		  $img = imagecreatefrompng($target);
		} else { 
		  $img = imagecreatefromjpeg($target);
		}
		$tci = imagecreatetruecolor($w, $h);
		$kek=imagecolorallocate($tci, 255, 255, 255);
		imagefill($tci,0,0,$kek);
		// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
		//print_r($h);exit;
		imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
		imagejpeg($tci, $newcopy, 80);
		return $newcopy;
	}
  
   

