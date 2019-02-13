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
  function timeago($timestamp){
		$time_ago = strtotime($timestamp);
		$current_time = time();
		$difference = $current_time - $time_ago;
		$seconds = $difference;
		$minutes = round($seconds/60);
		$hours = round($seconds/3600);
		$days = round($seconds/86400);
		$weeks = round($seconds/604800);
		$months = round($seconds/2629440);
		$years = round($seconds/31553280);
		if ($seconds <= 60){
			return "Just Now";
		}
		else if ($minutes <= 60){
			if ($minutes == 1){
				return "1 minute ago";
			}
			else {
				return "$minutes minutes ago";
			}
		}
		else if ($hours <= 24){
			if ($hours == 1){
				return "1 hour ago";
			}
			else {
				return "$hours hours ago";
			}
		}
		else if ($days <= 7){
			if ($days == 1){
				return "1 day ago";
			}
			else {
				return "$days days ago";
			}
		}
		else if ($weeks <= 4.3){
			if ($weeks == 1){
				return "1 week ago";
			}
			else {
				return "$weeks weeks ago";
			}
		}
		else if ($months <= 12){
			if ($months == 1){
				return "1 month ago";
			}
			else {
				return "$months months ago";
			}
		}
		else{
			if ($years == 1){
				return "1 year ago";
			}
			else{
				return "$years years ago";
			}
		}
	
	}

	function ConvertDateFormat($startdate){
		$dateBreak = explode('/',$startdate);
		$edm = $dateBreak[0];
		$edd = $dateBreak[1];
		$edy = $dateBreak[2];
		if($edm == '01'){
			$edmn = 'Jan';
		}
		elseif($edm == '02'){
			$edmn = 'Feb';
		}
		elseif($edm == '03'){
			$edmn = 'Mar';
		}
		elseif($edm == '04'){
			$edmn = 'Apr';
		}
		elseif($edm == '05'){
			$edmn = 'May';
		}
		elseif($edm == '06'){
			$edmn = 'Jun';
		}
		elseif($edm == '07'){
			$edmn = 'Jul';
		}
		elseif($edm == '08'){
			$edmn = 'Aug';
		}
		elseif($edm == '09'){
			$edmn = 'Sept';
		}
		elseif($edm == '10'){
			$edmn = 'Oct';
		}
		elseif($edm == '11'){
			$edmn = 'Nov';
		}
		else{
			$edmn = 'Dec';
		}
		$eventDate = $edd.' '.$edmn.', '.$edy;
		return $eventDate;
	}

	function CombineDate($startdate,$enddate){
		$kaboom1 = explode('/',$startdate);
		$sdm = $kaboom1[0];
		$sdd = $kaboom1[1];
		$sdy = $kaboom1[2];
		$kaboom2 = explode('/',$enddate);
		$edm = $kaboom2[0];
		$edd = $kaboom2[1];
		$edy = $kaboom2[2];
		if($sdm == '01'){
			$sdmn = 'Jan';
		}
		elseif($sdm == '02'){
			$sdmn = 'Feb';		
		}
		elseif($sdm == '03'){
			$sdmn = 'Mar';
		}
		elseif($sdm == '04'){
			$sdmn = 'Apr';
		}
		elseif($sdm == '05'){
			$sdmn = 'May';
		}
		elseif($sdm == '06'){
			$sdmn = 'Jun';
		}
		elseif($sdm == '07'){
			$sdmn = 'Jul';
		}
		elseif($sdm == '08'){
			$sdmn = 'Aug';
		}
		elseif($sdm == '09'){
			$sdmn = 'Sept';
		}
		elseif($sdm == '10'){
			$sdmn = 'Oct';
		}
		elseif($sdm == '11'){
			$sdmn = 'Nov';	 	 
		}
		else{
			$sdmn = 'Dec';
		}

		if($edm == '01'){
			$edmn = 'Jan';
		}
		elseif($edm == '02'){
			$edmn = 'Feb';		
		}
		elseif($edm == '03'){
			$edmn = 'Mar';
		}
		elseif($edm == '04'){
			$edmn = 'Apr';
		}
		elseif($edm == '05'){
			$edmn = 'May';
		}
		elseif($edm == '06'){
			$edmn = 'Jun';
		}
		elseif($edm == '07'){
			$edmn = 'Jul';
		}
		elseif($edm == '08'){
			$edmn = 'Aug';
		}
		elseif($edm == '09'){
			$edmn = 'Sept';
		}
		elseif($edm == '10'){
			$edmn = 'Oct';
		}
		elseif($edm == '11'){
			$edmn = 'Nov';	 	 
		}
		else{
			$edmn = 'Dec';
		}
		if($edy == $sdy){
			if($sdm == $edm){
				if($edd == $sdd){
					$comdat = $sdmn.' '.$sdd.', '.$sdy;	
				}else{
					$comdat = $sdmn.' '.$sdd.' - '.$edd.', '.$sdy;
				}
			}else{
				$comdat = $sdd.' '.$sdmn.' - '.$edd.' '.$edmn.', '.$edy;
			}
		}else{
			$comdat = $sdd.' '.$sdmn.', '.$sdy.' - '.$edd.' '.$edmn.', '.$edy;
		}
		return $comdat;
	} 
   

