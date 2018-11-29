<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExcelActions extends MY_Controller {
    public $menucount = array();
	public $isSuperAdmin = 0;
    
    function __construct() {
        parent::__construct();
		$this->load->library(array('email','form_validation','session','pagination'));
        $this->load->database();              
		$this->load->model('Admin_model');
		$this->load->model('Companies_model');
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->library('email');

    }
    public function index()
	{
		$data = array();
		$this->show_admin('admin/exportCompanies',$data);
	}
    public function importView()
	{
		$data = array();
		$this->show_admin('admin/importCompanies',$data);
	}
	public function exportCompanies($attachment = false)
	{
		if (!empty($_POST)) {
		$folder = 'asset/Exports';
		$this->load->library('phpexcel/PHPExcel');
		$result = $this->Admin_model->getCompanies($_POST['type']);
		if($_POST['type'] == 1) {

		$filename = $folder.'/digital_assets_'.date('Y-m-d-H-i-s').'.csv';
		$sheet = $this->phpexcel->getActiveSheet();
		$sheet->getColumnDimension('A')->setWidth(25);
		$sheet->getColumnDimension('B')->setWidth(25);
		$sheet->getColumnDimension('C')->setWidth(25);
		$sheet->getColumnDimension('D')->setWidth(25);
		$sheet->getColumnDimension('E')->setWidth(25);
		$sheet->getColumnDimension('F')->setWidth(25);
		$sheet->getColumnDimension('G')->setWidth(25);
		$sheet->getColumnDimension('H')->setWidth(25);
		$sheet->getColumnDimension('I')->setWidth(25);
		$sheet->getColumnDimension('J')->setWidth(25);
		$sheet->getColumnDimension('K')->setWidth(25);
		$sheet->getColumnDimension('L')->setWidth(25);
		$sheet->getColumnDimension('M')->setWidth(25);
		$sheet->getColumnDimension('N')->setWidth(25);
		$sheet->getColumnDimension('O')->setWidth(25);
		$sheet->getColumnDimension('Q')->setWidth(25);
		$sheet->getColumnDimension('R')->setWidth(25);
		$sheet->getColumnDimension('S')->setWidth(25);
		$sheet->getColumnDimension('T')->setWidth(25);
		$sheet->getColumnDimension('U')->setWidth(25);
		$sheet->getColumnDimension('V')->setWidth(25);
		$sheet->getColumnDimension('W')->setWidth(25);
		$sheet->getColumnDimension('X')->setWidth(25);
		$sheet->setCellValue('A1','Company Unique ID');
		$sheet->setCellValue('B1','Company Name');
		$sheet->setCellValue('C1','Description');
		$sheet->setCellValue('D1','Milestone Title');
		$sheet->setCellValue('E1','Milestone Status');
		$sheet->setCellValue('F1','Resource Name');
		$sheet->setCellValue('G1','Resource URL');
		$sheet->setCellValue('H1','Market Cap');
		$sheet->setCellValue('I1','Core Team Name');
		$sheet->setCellValue('J1','Core Team URL');
		$sheet->setCellValue('K1','Advisory Team Name');
		$sheet->setCellValue('L1','Advisory Team Profile URL');
		$sheet->setCellValue('M1','Trade Exchange Title');
		$sheet->setCellValue('N1','Trade Exchange URL');
		$sheet->setCellValue('O1','Company Email');
		$sheet->setCellValue('P1','Twitter');
		$sheet->setCellValue('Q1','Slack');
		$sheet->setCellValue('R1','Telegram');
		$sheet->setCellValue('S1','Github');
		$sheet->setCellValue('T1','CoinMarket');
		$sheet->setCellValue('U1','Facebook');
		$sheet->setCellValue('V1','Address');
		$sheet->setCellValue('W1','Site URL');
		$sheet->setCellValue('X1','Company Logo');
		$sheet->setCellValue('Y1','Discord');

			if(count($result) > 0) {
				// print_r($result);exit;
				$prevmaxcnt = 0;
				$maxcount = 0;
				$column = 2;
				$mileStonesCount_digi = 2;
				$resourceCount_digi = 2;
				$coreTeamCount_digi = 2;
				$advisoryTeamCount_digi = 2;
				$tradeExchangeCount_digi = 2;
				foreach($result as $key=>$company) {
					// print_r($key .'</br>'. $column.'</br>'. $mileStonesCount_digi .'<br>'. $resourceCount_digi .'<br>' );
				$sheet = $this->phpexcel->setActiveSheetIndex(0);
				$sheet->setCellValue("A".$column, $company->cm_unique_id);
				$sheet->setCellValue("B".$column, $company->cm_name);
				$sheet->setCellValue("C".$column, $company->cm_decript);
				$sheet->setCellValue("H".$column, $company->cm_marketcap);
				$sheet->setCellValue("O".$column, $company->cm_email);
				$sheet->setCellValue("P".$column, $company->cm_twitter);
				$sheet->setCellValue("Q".$column, $company->cm_slack);
				$sheet->setCellValue("R".$column, $company->cm_telegram);
				$sheet->setCellValue("S".$column, $company->cm_github);
				$sheet->setCellValue("T".$column, $company->cm_coinmarket_cap);
				$sheet->setCellValue("U".$column, $company->cm_facebook);
				$sheet->setCellValue("V".$column, $company->cm_address);
				$sheet->setCellValue("W".$column, $company->cm_siteurl);
				$sheet->setCellValue("X".$column, $company->cm_picture);
				$sheet->setCellValue("Y".$column, $company->cm_discord);
				// MileStones
				$mileStones = $this->Admin_model->getMileStones($company);
				// print_r(count($mileStones) );exit;
				foreach($mileStones as $mi=>$mileston) { 
					$sheet->setCellValue("D".$mileStonesCount_digi, $mileston->ms_title);
					$sheet->setCellValue("E".$mileStonesCount_digi, $mileston->mss_status);
					$mileStonesCount_digi++;
				}
				// Resources
				$resource = $this->Admin_model->getResources($company->cm_id);
				foreach($resource as $r=>$res) { 
					$sheet->setCellValue("F".$resourceCount_digi, $res->cr_name);
					$sheet->setCellValue("G".$resourceCount_digi, $res->cr_url);
					$resourceCount_digi++;
				}
				// CoreTeam
				$coreTeam = $this->Admin_model->getCoreTeam($company->cm_id);
				foreach($coreTeam as $c=>$team) { 
					$sheet->setCellValue("I".$coreTeamCount_digi, $team->cot_name);
					$sheet->setCellValue("J".$coreTeamCount_digi, $team->cot_profile_url);
					$coreTeamCount_digi++;
					$column++;
				}
				// AdvisoryTeam
				$advisoryTeam = $this->Admin_model->getAdvisoryTeam($company->cm_id);
				foreach($advisoryTeam as $ad=>$addTeam) { 
					$sheet->setCellValue("K".$advisoryTeamCount_digi, $addTeam->adt_name);
					$sheet->setCellValue("L".$advisoryTeamCount_digi, $addTeam->adt_profile_url);
					$advisoryTeamCount_digi++;
				}
				// TradeExchange
				$tradeExchange = $this->Admin_model->getTradeExchangeTeam($company->cm_id);
				foreach($tradeExchange as $trade=>$tradeEx) { 
					$sheet->setCellValue("M".$tradeExchangeCount_digi, $tradeEx->te_title);
					$sheet->setCellValue("N".$tradeExchangeCount_digi, $tradeEx->te_url);
					$tradeExchangeCount_digi++;
				}
				$prevmaxcnt == $maxcount;
				$maxcount = max($tradeExchangeCount_digi, $advisoryTeamCount_digi, $coreTeamCount_digi, $resourceCount_digi,$mileStonesCount_digi);
				
				if($maxcount == 2 || $prevmaxcnt == $maxcount) {
					$column++;
					$tradeExchangeCount_digi++;
					$advisoryTeamCount_digi++;
					$coreTeamCount_digi++;
					$resourceCount_digi++;
					$mileStonesCount_digi++;
				} else if(count($tradeExchange) == 0 && count($mileStones) == 0 && count($advisoryTeam) == 0 && count($resource) == 0 && count($coreTeam) == 0 ) {
					$column++;
					$tradeExchangeCount_digi++;
					$advisoryTeamCount_digi++;
					$coreTeamCount_digi++;
					$resourceCount_digi++;
					$mileStonesCount_digi++;
				} else {
					$column = $maxcount;
					$tradeExchangeCount_digi = $maxcount;
					$advisoryTeamCount_digi = $maxcount;
					$coreTeamCount_digi = $maxcount;
					$resourceCount_digi = $maxcount;
					$mileStonesCount_digi = $maxcount;
				}

				}
				// exit;
				$writer = new PHPExcel_Writer_Excel5($this->phpexcel);
				header("Content-Description: File Transfer");
				header('Content-Encoding: UTF-8');
				header('Content-type: application/force-download; charset=UTF-8');
				header('Content-Disposition: attachment; filename='.$filename);
				if(!$writer->save($filename)) {
					echo json_encode(array('status'=>1,'output'=>$filename, 'message'=>'Your file has been successfully Downloaded'));
				} else {
					echo json_encode(array('status'=>0, 'message'=>'There is some error while downloading your File'));
				}
				// $writer->save("php://output");
				
			} else {
				echo json_encode(array('status'=>0,'message'=>'Selected Company has no fields in out database'));
			}
		} else if($_POST['type'] == 2) {
			$filename = $folder.'/ico_trackers'.date('Y-m-d-H-i-s').'.csv';
			$sheet = $this->phpexcel->getActiveSheet();
			$sheet->getColumnDimension('A')->setWidth(25);
			$sheet->getColumnDimension('B')->setWidth(25);
			$sheet->getColumnDimension('C')->setWidth(25);
			$sheet->getColumnDimension('D')->setWidth(25);
			$sheet->getColumnDimension('E')->setWidth(25);
			$sheet->getColumnDimension('F')->setWidth(25);
			$sheet->getColumnDimension('G')->setWidth(25);
			$sheet->getColumnDimension('H')->setWidth(25);
			$sheet->getColumnDimension('I')->setWidth(25);
			$sheet->getColumnDimension('J')->setWidth(25);
			$sheet->getColumnDimension('K')->setWidth(25);
			$sheet->getColumnDimension('L')->setWidth(25);
			$sheet->getColumnDimension('M')->setWidth(25);
			$sheet->getColumnDimension('N')->setWidth(25);
			$sheet->getColumnDimension('O')->setWidth(25);
			$sheet->getColumnDimension('p')->setWidth(25);
			$sheet->getColumnDimension('Q')->setWidth(25);
			$sheet->getColumnDimension('R')->setWidth(25);
			$sheet->getColumnDimension('S')->setWidth(25);
			$sheet->getColumnDimension('T')->setWidth(25);
			$sheet->getColumnDimension('U')->setWidth(25);
			$sheet->getColumnDimension('V')->setWidth(25);
			$sheet->getColumnDimension('W')->setWidth(25);
			$sheet->getColumnDimension('X')->setWidth(25);
			$sheet->getColumnDimension('Y')->setWidth(25);
			$sheet->getColumnDimension('Z')->setWidth(25);
			$sheet->getColumnDimension('AA')->setWidth(25);
			$sheet->getColumnDimension('AB')->setWidth(25);
			$sheet->getColumnDimension('AC')->setWidth(25);
			$sheet->getColumnDimension('AD')->setWidth(25);
			$sheet->getColumnDimension('AE')->setWidth(25);
			$sheet->getColumnDimension('AF')->setWidth(25);
			$sheet->setCellValue('A1','Company Unique ID');
			$sheet->setCellValue('B1','Company Name');
			$sheet->setCellValue('C1','Description');
			$sheet->setCellValue('D1','Milestones Title');
			$sheet->setCellValue('E1','Milestones Status');
			$sheet->setCellValue('F1','Resource Name');
			$sheet->setCellValue('G1','Resource URL');
			$sheet->setCellValue('H1','Market Cap');
			$sheet->setCellValue('I1','Total Token Supply');
			$sheet->setCellValue('J1','Tokens Available Tokens For ICO');
			$sheet->setCellValue('K1','Company Core Team Name');
			$sheet->setCellValue('L1','Company Core Team URL');
			$sheet->setCellValue('M1','Advisory Team Name');
			$sheet->setCellValue('N1','Advisory Team URL');
			$sheet->setCellValue('O1','Escrow Name');
			$sheet->setCellValue('P1','Escrow URL');
			$sheet->setCellValue('Q1','Additional Links Name');
			$sheet->setCellValue('R1','Additional Links URL');
			$sheet->setCellValue('S1','ICO Start Date');
			$sheet->setCellValue('T1','ICO Start Time');
			$sheet->setCellValue('U1','ICO End Date');
			$sheet->setCellValue('V1','ICO End Time');
			$sheet->setCellValue('W1','Company Email');
			$sheet->setCellValue('X1','Twitter');
			$sheet->setCellValue('Y1','Slack');
			$sheet->setCellValue('Z1','Telegram');
			$sheet->setCellValue('AA1','Github');
			$sheet->setCellValue('AB1','CoinMarket');
			$sheet->setCellValue('AC1','Facebook');
			$sheet->setCellValue('AD1','Address');
			$sheet->setCellValue('AE1','Site URL');
			$sheet->setCellValue('AF1','Company Logo');
			$sheet->setCellValue('AG1','Discord');
	
				if(count($result) > 0) {
					$prevmaxcnt = 0;
					$maxcount = 0;
					$column = 2;
					$mileStonesCount = 2;
					$resourceCount =2;
					$coreTeamCount = 2;
					$advisoryTeamCount = 2;
					$escrowsTeamCount = 2;
					$tradeExchangeCount = 2;
					
					foreach($result as $key=>$company) {
					$sheet = $this->phpexcel->setActiveSheetIndex(0);
					$sheet ->setCellValue("A".$column, $company->cm_unique_id);
					$sheet->setCellValue("B".$column, $company->cm_name);
					$sheet->setCellValue("C".$column, $company->cm_decript);
					$sheet->setCellValue("H".$column, $company->cm_marketcap);
					$sheet->setCellValue("W".$column, $company->cm_email);
					$sheet->setCellValue("X".$column, $company->cm_twitter);
					$sheet->setCellValue("Y".$column, $company->cm_slack);
					$sheet->setCellValue("Z".$column, $company->cm_telegram);
					$sheet->setCellValue("AA".$column, $company->cm_github);
					$sheet->setCellValue("AB".$column, $company->cm_coinmarket_cap);
					$sheet->setCellValue("AC".$column, $company->cm_facebook);
					$sheet->setCellValue("AD".$column, $company->cm_address);
					$sheet->setCellValue("AE".$column, $company->cm_siteurl);
					$sheet->setCellValue("I".$column, $company->cm_total_token_supply);
					$sheet->setCellValue("J".$column, $company->cm_tokens_available_crowd_sale);
					$sheet->setCellValue("S".$column, $company->cm_ico_start_date);
					$sheet->setCellValue("T".$column, $company->cm_ico_start_time);
					$sheet->setCellValue("U".$column, $company->cm_ico_end_date);
					$sheet->setCellValue("V".$column, $company->cm_ico_end_time);
					$sheet->setCellValue("AF".$column, $company->cm_picture);
					$sheet->setCellValue("AG".$column, $company->cm_discord);

					// Milestones
					$mileStones = $this->Admin_model->getMileStones($company);
					foreach($mileStones as $mi=>$mileston) { 
						$sheet->setCellValue("D".$mileStonesCount, $mileston->ms_title);
						$sheet->setCellValue("E".$mileStonesCount, $mileston->mss_status);
						$mileStonesCount++;
					}
						
					// Resources
					$resource = $this->Admin_model->getResources($company->cm_id);
					foreach($resource as $r=>$res) { 
						$sheet->setCellValue("F".$resourceCount, $res->cr_name );
						$sheet->setCellValue("G".$resourceCount, $res->cr_url);
						$resourceCount++;
						
					}
					// CoreTeam
					$coreTeam = $this->Admin_model->getCoreTeam($company->cm_id);
					foreach($coreTeam as $c=>$team) { 
						$sheet->setCellValue("K".$coreTeamCount, $team->cot_name);
						$sheet->setCellValue("L".$coreTeamCount, $team->cot_profile_url);
						$coreTeamCount++;
					}
					// Advisory Team
					$advisoryTeam = $this->Admin_model->getAdvisoryTeam($company->cm_id);
					foreach($advisoryTeam as $ad=>$addTeam) { 
						$sheet->setCellValue("M".$advisoryTeamCount, $addTeam->adt_name);
						$sheet->setCellValue("N".$advisoryTeamCount, $addTeam->adt_profile_url);
						$advisoryTeamCount++;
					}
					// Escorw Details
					$escrowsTeam = $this->Admin_model->getEscrowsTeam($company->cm_id);
					foreach($escrowsTeam as $es=>$esTeam) { 
						$sheet->setCellValue("O".$escrowsTeamCount, $esTeam->ed_name);
						$sheet->setCellValue("P".$escrowsTeamCount, $esTeam->ed_url);
						$escrowsTeamCount++;
					}
					// TradeExchange
					$tradeExchange = $this->Admin_model->getTradeExchangeTeam($company->cm_id);
					foreach($tradeExchange as $trade=>$tradeEx) { 
						$sheet->setCellValue("Q".$tradeExchangeCount, $tradeEx->te_title);
						$sheet->setCellValue("R".$tradeExchangeCount, $tradeEx->te_url);
						$tradeExchangeCount++;
					}
					$prevmaxcnt == $maxcount;
					$maxcount = max($tradeExchangeCount, $escrowsTeamCount, $advisoryTeamCount, $coreTeamCount, $resourceCount,$mileStonesCount);
					// print_r($maxcount.'<br>');
					if($maxcount == 2 || $prevmaxcnt == $maxcount) {
						$column++;
						$tradeExchangeCount++;
						$escrowsTeamCount++;
						$advisoryTeamCount++;
						$coreTeamCount++;
						$resourceCount++;
						$mileStonesCount++;
					}  else if(count($tradeExchange) == 0 && count($mileStones) == 0 && count($advisoryTeam) == 0 && count($resource) == 0 && count($coreTeam) == 0 ) {
						$column++;
						$tradeExchangeCount_digi++;
						$advisoryTeamCount_digi++;
						$coreTeamCount_digi++;
						$resourceCount_digi++;
						$mileStonesCount_digi++;
					} else {
						$column = $maxcount;
						$tradeExchangeCount = $maxcount;
						$escrowsTeamCount = $maxcount;
						$advisoryTeamCount = $maxcount;
						$coreTeamCount = $maxcount;
						$resourceCount = $maxcount;
						$mileStonesCount = $maxcount;
					}
					
					} 
					$writer = new PHPExcel_Writer_Excel5($this->phpexcel);
					header("Content-Description: File Transfer");
					header('Content-Encoding: UTF-8');
					header('Content-type: application/force-download; charset=UTF-8');
					header('Content-Disposition: attachment; filename='.$filename);

					if(!$writer->save($filename)) {
						echo json_encode(array('status'=>1,'output'=>$filename, 'message'=>'Your file has been successfully Downloaded'));
						exit;
					} else {
						echo json_encode(array('status'=>0,'message'=>'There is some error while downloading your File'));
						
					}
					
				} else {
					echo json_encode(array('status'=>0,'message'=>'Selected Company has no fields in out database'));
				}
			} 
		}
	}

	public function importCompanies() {

		$string_n = $_FILES['importFile']['name'];
		$string_n = strtolower($string_n);
		$file = $_FILES['importFile']['tmp_name'];
		if (substr( $string_n, 0, 4 ) === "digi") {
			$csv_file = $file ; 
			$csvfile = fopen($csv_file, 'r');
			$theData = fgets($csvfile);
			$i = 0;
			while (!feof($csvfile))
			{
				$csv_data[] = fgetcsv($csvfile, 1024);
				$csv_array = $csv_data[$i];
				//$csv_data[] = fgets($csvfile, 1024);
				//$csv_array = explode(",", $csv_data[$i]);
				$update_csv_companies = array();
				if(isset($csv_array[0]) && $csv_array[0]!=""){
					$cm_name = $csv_array[0];
				}else{
					$cm_name = "";    
				}
				if(isset($csv_array[1]) && $csv_array[1]!=""){
					$cm_decript = $csv_array[1];
				}else{
					$cm_decript = "";    
				}
				if(isset($csv_array[6]) && $csv_array[6]!=""){
					$cm_marketcap = $csv_array[6];
				}else{
					$cm_marketcap = "";    
				}
				if(isset($csv_array[13]) && $csv_array[13]!=""){
					$cm_email = $csv_array[13];
				}else{
					$cm_email = "";    
				}
				if(isset($csv_array[14]) && $csv_array[14]!=""){
					$cm_twitter = $csv_array[14];
				}else{
					$cm_twitter = "";    
				}
				if(isset($csv_array[15]) && $csv_array[15]!=""){
					$cm_slack = $csv_array[15];
				}else{
					$cm_slack = "";    
				}
				if(isset($csv_array[16]) && $csv_array[16]!=""){
					$cm_telegram = $csv_array[16];
				}else{
					$cm_telegram = "";    
				}
				if(isset($csv_array[17]) && $csv_array[17]!=""){
					$cm_github = $csv_array[17];
				}else{
					$cm_github = "";    
				}
				if(isset($csv_array[18]) && $csv_array[18]!=""){
					$cm_coinmarket_cap = $csv_array[18];
				}else{
					$cm_coinmarket_cap = "";    
				}
				if(isset($csv_array[19]) && $csv_array[19]!=""){
					$cm_facebook = $csv_array[19];
				}else{
					$cm_facebook = "";    
				}
				if(isset($csv_array[20]) && $csv_array[20]!=""){
					$cm_address = $csv_array[20];
				}else{
					$cm_address = "";    
				}
				if(isset($csv_array[21]) && $csv_array[21]!=""){
					$cm_siteurl = $csv_array[21];
				}else{
					$cm_siteurl = "";    
				}
				if(isset($csv_array[22]) && $csv_array[22]!=""){
					$cm_picture = $csv_array[22];
				}else{
					$cm_picture = "";    
				}
				if(isset($csv_array[23]) && $csv_array[23]!=""){
					$cm_discord = $csv_array[23];
				}else{
					$cm_discord = "";    
				}
				$insert_csv_companies = array(
					'cm_ctid'			=> 1,
					// 'cm_unique_id' 		=> $cm_unique_id,
					'cm_name'			=> $cm_name,
					'cm_decript' 		=> $cm_decript, 
					'cm_marketcap'		=> str_replace(',','',$cm_marketcap), 
					'cm_email'			=> $cm_email, 
					'cm_twitter'		=> $cm_twitter, 
					'cm_slack'			=> $cm_slack, 
					'cm_telegram'		=> $cm_telegram,
					'cm_github' 		=> $cm_github, 
					'cm_coinmarket_cap' => $cm_coinmarket_cap,
					'cm_facebook' 		=> $cm_facebook,
					'cm_address' 		=> $cm_address,
					'cm_siteurl' 		=> $cm_siteurl,
					'cm_picture' 		=> $cm_picture,
					'cm_discord' 		=> $cm_discord
				);
				if ($cm_name != "" && $cm_decript != "") {
				
					$insertCompanies = $this->Admin_model->insertComanydetails($insert_csv_companies);
						if($insertCompanies) {
							$cm_unique_id         = 'BOP'.str_pad((int)$insertCompanies, 6, "0", STR_PAD_LEFT);
							$inserted_unqiue_code = $this->Companies_model->insertedUnqiueCode($insertCompanies,$cm_unique_id);
							// MileStones
							if(isset($csv_array[2]) && $csv_array[2]!=""){
								$ms_title = $csv_array[2];
							}else{
								$ms_title = "";    
							}
							if(isset($csv_array[3]) && $csv_array[3]!=""){
								if($csv_array[3] == 'Completed') {
									$ms_mss_id = 1;
								} else if($csv_array[3] == 'In Progress') {
									$ms_mss_id = 2;
								}
							}else{
								$ms_mss_id = "0";    
							}
							$ms_cmid = $insertCompanies;
							$insertMilestones = array(
								'ms_cmid' => $ms_cmid,
								'ms_title'=> $ms_title,
								'ms_mss_id'=> $ms_mss_id
							);
							if ($ms_title != "") {
							$milestoneInsert = $this->Admin_model->insertToMilestones($insertMilestones); 
							} 
							// Resources
							if(isset($csv_array[4]) && $csv_array[4]!=""){
								$cr_name = $csv_array[4];
							}else{
								$cr_name = "";    
							}
							if(isset($csv_array[5]) && $csv_array[5]!=""){
								$cr_url = $csv_array[5];
							}else{
								$cr_url = "";    
							}
							$cr_cmid = $insertCompanies;
							$resources = array(
								'cr_name'	=> $cr_name,
								'cr_url'	=> $cr_url,
								'cr_cmid'	=> $cr_cmid
							);
							if ($cr_name != "") {
								$insertresources = $this->Admin_model->insertToResources($resources);
							}
	
							// Core Team
							if(isset($csv_array[8]) && $csv_array[8]!=""){
								$cot_profile_url = $csv_array[8];
							}else{
								$cot_profile_url = "";   
							}
							if(isset($csv_array[7]) && $csv_array[7]!=""){
								$cot_name = $csv_array[7];
							}else{
								$cot_name = "";    
							}
							$cot_cmid = $insertCompanies;
							$coreTeam = array(
								'cot_name'			=> $cot_name,
								'cot_profile_url'	=> $cot_profile_url,
								'cot_cmid'			=> $cot_cmid
							);
							if ($cot_name != "") {
								$insertCoreTeam = $this->Admin_model->insertToCoreTeam($coreTeam);
							}
	
							// AdvisoryTeam
	
							if(isset($csv_array[9]) && $csv_array[9]!=""){
								$adt_name = $csv_array[9];
							}else{
								$adt_name = "";   
							}
							if(isset($csv_array[10]) && $csv_array[10]!=""){
								$adt_profile_url = $csv_array[10];
							}else{
								$adt_profile_url = "";   
							}
							$adt_cmid = $insertCompanies;
							$adtTeam = array(
								'adt_name'			=> $adt_name,
								'adt_profile_url'	=> $adt_profile_url,
								'adt_cmid'			=> $adt_cmid
							);
							if ($adt_name != "") {
								$insertAdtTeam= $this->Admin_model->insertToAdtTeam($adtTeam);
							}
	
							// TradeExchange
							if(isset($csv_array[11]) && $csv_array[11]!=""){
								$te_title = $csv_array[11];
							}else{
								$te_title = "";   
							}
							if(isset($csv_array[12]) && $csv_array[12]!=""){
								$te_url = $csv_array[12];
							}else{
								$te_url = "";   
							}
	
							$te_cmid = $insertCompanies;
							$tradeExchange = array(
								'te_title'			=> $te_title,
								'te_url'			=> $te_url,
								'te_cmid'			=> $te_cmid
							);
							if ($te_title != "") {
								$insertTradeExchange= $this->Admin_model->insertToTradeExchange($tradeExchange);
							}
						}
					} else if ($insertCompanies != "") {
						// MileStones
						if(isset($csv_array[2]) && $csv_array[2]!=""){
							$ms_title = $csv_array[2];
						}else{
							$ms_title = "";    
						}
						if(isset($csv_array[3]) && $csv_array[3]!=""){
							if($csv_array[3] == 'Completed') {
								$ms_mss_id = 1;
							} else if($csv_array[3] == 'In Progress') {
								$ms_mss_id = 2;
							}
						}else{
							$ms_mss_id = "0";    
						}
						$ms_cmid = $insertCompanies;
						$insertMilestones = array(
							'ms_cmid' => $ms_cmid,
							'ms_title'=> $ms_title,
							'ms_mss_id'=> $ms_mss_id
						);
						if ($ms_title != "") {
						$milestoneInsert = $this->Admin_model->insertToMilestones($insertMilestones); 
						} 
						// Resources
						if(isset($csv_array[4]) && $csv_array[4]!=""){
							$cr_name = $csv_array[4];
						}else{
							$cr_name = "";    
						}
						if(isset($csv_array[5]) && $csv_array[5]!=""){
							$cr_url = $csv_array[5];
						}else{
							$cr_url = "";    
						}
						$cr_cmid = $insertCompanies;
						$resources = array(
							'cr_name'	=> $cr_name,
							'cr_url'	=> $cr_url,
							'cr_cmid'	=> $cr_cmid
						);
						if ($cr_name != "") {
							$insertresources = $this->Admin_model->insertToResources($resources);
						}

						// Core Team
						if(isset($csv_array[8]) && $csv_array[8]!=""){
							$cot_profile_url = $csv_array[8];
						}else{
							$cot_profile_url = "";   
						}
						if(isset($csv_array[7]) && $csv_array[7]!=""){
							$cot_name = $csv_array[7];
						}else{
							$cot_name = "";    
						}
						$cot_cmid = $insertCompanies;
						$coreTeam = array(
							'cot_name'			=> $cot_name,
							'cot_profile_url'	=> $cot_profile_url,
							'cot_cmid'			=> $cot_cmid
						);
						if ($cot_name != "") {
							$insertCoreTeam = $this->Admin_model->insertToCoreTeam($coreTeam);
						}

						// AdvisoryTeam

						if(isset($csv_array[9]) && $csv_array[9]!=""){
							$adt_name = $csv_array[9];
						}else{
							$adt_name = "";   
						}
						if(isset($csv_array[10]) && $csv_array[10]!=""){
							$adt_profile_url = $csv_array[10];
						}else{
							$adt_profile_url = "";   
						}
						$adt_cmid = $insertCompanies;
						$adtTeam = array(
							'adt_name'			=> $adt_name,
							'adt_profile_url'	=> $adt_profile_url,
							'adt_cmid'			=> $adt_cmid
						);
						if ($adt_name != "") {
							$insertAdtTeam= $this->Admin_model->insertToAdtTeam($adtTeam);
						}

						// TradeExchange
						if(isset($csv_array[11]) && $csv_array[11]!=""){
							$te_title = $csv_array[11];
						}else{
							$te_title = "";   
						}
						if(isset($csv_array[12]) && $csv_array[12]!=""){
							$te_url = $csv_array[12];
						}else{
							$te_url = "";   
						}

						$te_cmid = $insertCompanies;
						$tradeExchange = array(
							'te_title'			=> $te_title,
							'te_url'			=> $te_url,
							'te_cmid'			=> $te_cmid
						);
						if ($te_title != "") {
							$insertTradeExchange= $this->Admin_model->insertToTradeExchange($tradeExchange);
						}
						// print_r("not Inserterd");exit;
					}
			   $i++;
			}
			fclose($csvfile);
			if($insertTradeExchange != 0 && $insertAdtTeam !=0 && $insertCoreTeam !=0 && $insertresources !=0 && $milestoneInsert !=0) {
				echo json_encode(array('status'=>1,'output'=> 'success', 'message'=>'Your file has been successfully Uploaded'));
				exit;
			}
			else {
				echo json_encode(array('status'=>0,'output'=> 'fail', 'message'=>'There is some error while uploading your data, Please make corrections as per the instructions'));
				exit;
			}
			
		} else if(substr( $string_n, 0, 3 ) === "ico") {
			$csv_file = $file ; 
			$csvfile = fopen($csv_file, 'r');
			$theData = fgets($csvfile);
			$i = 0;
			while (!feof($csvfile))
			{
				$csv_data[] = fgetcsv($csvfile, 1024);
				$csv_array = $csv_data[$i];
				// $csv_data[] = fgets($csvfile, 1024);
				// $csv_array = explode(",", $csv_data[$i]);
				$update_csv_companies = array();
				if(isset($csv_array[0]) && $csv_array[0]!=""){
					$cm_name = $csv_array[0];
				}else{
					$cm_name = "";    
				}
				if(isset($csv_array[1]) && $csv_array[1]!=""){
					$cm_decript = $csv_array[1];
				}else{
					$cm_decript = "";    
				}
				if(isset($csv_array[6]) && $csv_array[6]!=""){
					$cm_marketcap = $csv_array[6];
				}else{
					$cm_marketcap = "";    
				}
				if(isset($csv_array[7]) && $csv_array[7]!=""){
					$cm_total_token_supply = $csv_array[7];
				}else{
					$cm_total_token_supply = "";    
				}
				if(isset($csv_array[8]) && $csv_array[8]!=""){
					$cm_tokens_available_crowd_sale = $csv_array[8];
				}else{
					$cm_tokens_available_crowd_sale = "";    
				}
				if(isset($csv_array[17]) && $csv_array[17]!=""){
					$cm_ico_start_date = $csv_array[17];
				}else{
					$cm_ico_start_date = "";    
				}
				if(isset($csv_array[18]) && $csv_array[18]!=""){
					$cm_ico_start_time = $csv_array[18];
				}else{
					$cm_ico_start_time = "";    
				}
				
				if(isset($csv_array[19]) && $csv_array[19]!=""){
					$cm_ico_end_date = $csv_array[19];
				}else{
					$cm_ico_end_date = "";    
				}

				if(isset($csv_array[20]) && $csv_array[20]!=""){
					$cm_ico_end_time = $csv_array[20];
				}else{
					$cm_ico_end_time = "";    
				}

				if(isset($csv_array[21]) && $csv_array[21]!=""){
					$cm_email = $csv_array[21];
				}else{
					$cm_email = "";    
				}
				if(isset($csv_array[22]) && $csv_array[22]!=""){
					$cm_twitter = $csv_array[22];
				}else{
					$cm_twitter = "";    
				}
				if(isset($csv_array[23]) && $csv_array[23]!=""){
					$cm_slack = $csv_array[23];
				}else{
					$cm_slack = "";    
				}
				if(isset($csv_array[24]) && $csv_array[24]!=""){
					$cm_telegram = $csv_array[24];
				}else{
					$cm_telegram = "";    
				}
				if(isset($csv_array[25]) && $csv_array[25]!=""){
					$cm_github = $csv_array[25];
				}else{
					$cm_github = "";    
				}
				if(isset($csv_array[26]) && $csv_array[26]!=""){
					$cm_coinmarket_cap = $csv_array[26];
				}else{
					$cm_coinmarket_cap = "";    
				}
				if(isset($csv_array[27]) && $csv_array[27]!=""){
					$cm_facebook = $csv_array[27];
				}else{
					$cm_facebook = "";    
				}
				if(isset($csv_array[28]) && $csv_array[28]!=""){
					$cm_address = $csv_array[28];
				}else{
					$cm_address = "";    
				}
				if(isset($csv_array[29]) && $csv_array[29]!=""){
					$cm_siteurl = $csv_array[29];
				}else{
					$cm_siteurl = "";    
				}
				if(isset($csv_array[30]) && $csv_array[30]!=""){
					$cm_picture = $csv_array[30];
				}else{
					$cm_picture = "";    
				}
				if(isset($csv_array[31]) && $csv_array[31]!=""){
					$cm_discord = $csv_array[31];
				}else{
					$cm_discord = "";    
				}
				
				
				
				
				$insert_ICO_csv_companies = array(
					'cm_ctid'						=> 2,
					// 'cm_unique_id' 					=> $cm_unique_id,
					'cm_name'						=> $cm_name,
					'cm_decript' 					=> $cm_decript,
					'cm_marketcap'					=> str_replace(',','',$cm_marketcap), 
					'cm_total_token_supply'			=> str_replace(',','',$cm_total_token_supply),
					'cm_tokens_available_crowd_sale'=> str_replace(',','',$cm_tokens_available_crowd_sale),
					'cm_ico_start_date'				=> date('Y-m-d',strtotime($cm_ico_start_date)),
					'cm_ico_start_time'				=> $cm_ico_start_time,
					'cm_ico_end_date'				=> date('Y-m-d',strtotime($cm_ico_end_date)),
					'cm_ico_end_time'				=> $cm_ico_end_time,
					'cm_email'						=> $cm_email, 
					'cm_twitter'					=> $cm_twitter, 
					'cm_slack'						=> $cm_slack, 
					'cm_telegram'					=> $cm_telegram,
					'cm_github' 					=> $cm_github, 
					'cm_coinmarket_cap' 			=> $cm_coinmarket_cap,
					'cm_facebook' 					=> $cm_facebook,
					'cm_address' 					=> $cm_address,
					'cm_siteurl'					=> $cm_siteurl,
					'cm_picture'					=> $cm_picture,
					'cm_discord'					=> $cm_discord,
				);
				if ($cm_name != "" &&  $cm_decript != "") {
					$insertICOCompanies = $this->Admin_model->insertICOComanydetails($insert_ICO_csv_companies);
						if($insertICOCompanies) {
							$cm_unique_id         = 'BOP'.str_pad((int)$insertICOCompanies, 6, "0", STR_PAD_LEFT);
							$inserted_unqiue_code = $this->Companies_model->insertedUnqiueCode($insertICOCompanies,$cm_unique_id);
							// MileStones
							if(isset($csv_array[2]) && $csv_array[2]!=""){
								$ms_title = $csv_array[2];
							}else{
								$ms_title = "";    
							}
							if(isset($csv_array[3]) && $csv_array[3]!=""){
								if($csv_array[3] == 'Completed') {
									$ms_mss_id = 1;
								} else if($csv_array[3] == 'In Progress') {
									$ms_mss_id = 2;
								}
							}else{
								$ms_mss_id = "0";    
							}
							$ms_cmid = $insertICOCompanies;
							$insertMilestones = array(
								'ms_cmid' => $ms_cmid,
								'ms_title'=> $ms_title,
								'ms_mss_id'=> $ms_mss_id
							);
							if ($ms_title != "") {
							$milestoneInsert = $this->Admin_model->insertToMilestones($insertMilestones); 
							} 
							// Resources
							if(isset($csv_array[4]) && $csv_array[4]!=""){
								$cr_name = $csv_array[4];
							}else{
								$cr_name = "";    
							}
							if(isset($csv_array[5]) && $csv_array[5]!=""){
								$cr_url = $csv_array[5];
							}else{
								$cr_url = "";    
							}
							$cr_cmid = $insertICOCompanies;
							$resources = array(
								'cr_name'	=> $cr_name,
								'cr_url'	=> $cr_url,
								'cr_cmid'	=> $cr_cmid
							);
							if ($cr_name != "") {
								$insertresources = $this->Admin_model->insertToResources($resources);
							}
	
							// Core Team
							if(isset($csv_array[10]) && $csv_array[10]!=""){
								$cot_profile_url = $csv_array[10];
							}else{
								$cot_profile_url = "";   
							}
							if(isset($csv_array[9]) && $csv_array[9]!=""){
								$cot_name = $csv_array[9];
							}else{
								$cot_name = "";    
							}
							$cot_cmid = $insertICOCompanies;
							$coreTeam = array(
								'cot_name'			=> $cot_name,
								'cot_profile_url'	=> $cot_profile_url,
								'cot_cmid'			=> $cot_cmid
							);
							if ($cot_name != "") {
								$insertCoreTeam = $this->Admin_model->insertToCoreTeam($coreTeam);
							}
	
							// AdvisoryTeam
	
							if(isset($csv_array[11]) && $csv_array[11]!=""){
								$adt_name = $csv_array[11];
							}else{
								$adt_name = "";   
							}
							if(isset($csv_array[12]) && $csv_array[12]!=""){
								$adt_profile_url = $csv_array[12];
							}else{
								$adt_profile_url = "";   
							}
							$adt_cmid = $insertICOCompanies;
							$adtTeam = array(
								'adt_name'			=> $adt_name,
								'adt_profile_url'	=> $adt_profile_url,
								'adt_cmid'			=> $adt_cmid
							);
							if ($adt_name != "") {
								$insertAdtTeam= $this->Admin_model->insertToAdtTeam($adtTeam);
							}
	
							// Escrow 
							if(isset($csv_array[13]) && $csv_array[13]!=""){
								$ed_name = $csv_array[13];
							}else{
								$ed_name = "";   
							}
							if(isset($csv_array[14]) && $csv_array[14]!=""){
								$ed_url = $csv_array[14];
							}else{
								$ed_url = "";   
							}
							$ed_cmid = $insertICOCompanies;
							$escrowAdd = array(
								'ed_name'			=> $ed_name,
								'ed_url'			=> $ed_url,
								'ed_cmid'			=> $ed_cmid
							);
							if ($ed_name != "") {
								$insertEscrowDetails= $this->Admin_model->insertToEscrowDetails($escrowAdd);
							}

							// TradeExchange
							if(isset($csv_array[15]) && $csv_array[15]!=""){
								$te_title = $csv_array[15];
							}else{
								$te_title = "";   
							}
							if(isset($csv_array[16]) && $csv_array[16]!=""){
								$te_url = $csv_array[16];
							}else{
								$te_url = "";   
							}
	
							$te_cmid = $insertICOCompanies;
							$tradeExchange = array(
								'te_title'			=> $te_title,
								'te_url'			=> $te_url,
								'te_cmid'			=> $te_cmid
							);
							if ($te_title != "") {
								$insertTradeExchange= $this->Admin_model->insertToTradeExchange($tradeExchange);
							}
						}
					} else if ($insertICOCompanies != "") {
						// MileStones
						if(isset($csv_array[2]) && $csv_array[2]!=""){
							$ms_title = $csv_array[2];
						}else{
							$ms_title = "";    
						}
						if(isset($csv_array[3]) && $csv_array[3]!=""){
							if($csv_array[3] == 'Completed') {
								$ms_mss_id = 1;
							} else if($csv_array[3] == 'In Progress') {
								$ms_mss_id = 2;
							}
						}else{
							$ms_mss_id = "0";    
						}
						$ms_cmid = $insertICOCompanies;
						$insertMilestones = array(
							'ms_cmid' => $ms_cmid,
							'ms_title'=> $ms_title,
							'ms_mss_id'=> $ms_mss_id
						);
						if ($ms_title != "") {
						$milestoneInsert = $this->Admin_model->insertToMilestones($insertMilestones); 
						} 
						// Resources
						if(isset($csv_array[4]) && $csv_array[4]!=""){
							$cr_name = $csv_array[4];
						}else{
							$cr_name = "";    
						}
						if(isset($csv_array[5]) && $csv_array[5]!=""){
							$cr_url = $csv_array[5];
						}else{
							$cr_url = "";    
						}
						$cr_cmid = $insertICOCompanies;
						$resources = array(
							'cr_name'	=> $cr_name,
							'cr_url'	=> $cr_url,
							'cr_cmid'	=> $cr_cmid
						);
						if ($cr_name != "") {
							$insertresources = $this->Admin_model->insertToResources($resources);
						}

						// Core Team
						if(isset($csv_array[10]) && $csv_array[10]!=""){
							$cot_profile_url = $csv_array[10];
						}else{
							$cot_profile_url = "";   
						}
						if(isset($csv_array[9]) && $csv_array[9]!=""){
							$cot_name = $csv_array[9];
						}else{
							$cot_name = "";    
						}
						$cot_cmid = $insertICOCompanies;
						$coreTeam = array(
							'cot_name'			=> $cot_name,
							'cot_profile_url'	=> $cot_profile_url,
							'cot_cmid'			=> $cot_cmid
						);
						if ($cot_name != "") {
							$insertCoreTeam = $this->Admin_model->insertToCoreTeam($coreTeam);
						}

						// AdvisoryTeam

						if(isset($csv_array[11]) && $csv_array[11]!=""){
							$adt_name = $csv_array[11];
						}else{
							$adt_name = "";   
						}
						if(isset($csv_array[12]) && $csv_array[12]!=""){
							$adt_profile_url = $csv_array[12];
						}else{
							$adt_profile_url = "";   
						}
						$adt_cmid = $insertICOCompanies;
						$adtTeam = array(
							'adt_name'			=> $adt_name,
							'adt_profile_url'	=> $adt_profile_url,
							'adt_cmid'			=> $adt_cmid
						);
						if ($adt_name != "") {
							$insertAdtTeam= $this->Admin_model->insertToAdtTeam($adtTeam);
						}

						// Escrow 
						if(isset($csv_array[13]) && $csv_array[13]!=""){
							$ed_name = $csv_array[13];
						}else{
							$ed_name = "";   
						}
						if(isset($csv_array[14]) && $csv_array[14]!=""){
							$ed_url = $csv_array[14];
						}else{
							$ed_url = "";   
						}
						$ed_cmid = $insertICOCompanies;
						$escrowAdd = array(
							'ed_name'			=> $ed_name,
							'ed_url'			=> $ed_url,
							'ed_cmid'			=> $ed_cmid
						);
						if ($ed_name != "") {
							$insertEscrowDetails= $this->Admin_model->insertToEscrowDetails($escrowAdd);
						}

						// TradeExchange
						if(isset($csv_array[15]) && $csv_array[15]!=""){
							$te_title = $csv_array[15];
						}else{
							$te_title = "";   
						}
						if(isset($csv_array[16]) && $csv_array[16]!=""){
							$te_url = $csv_array[16];
						}else{
							$te_url = "";   
						}

						$te_cmid = $insertICOCompanies;
						$tradeExchange = array(
							'te_title'			=> $te_title,
							'te_url'			=> $te_url,
							'te_cmid'			=> $te_cmid
						);
						if ($te_title != "") {
							$insertTradeExchange= $this->Admin_model->insertToTradeExchange($tradeExchange);
						}
					}
			   $i++;
			}
			fclose($csvfile);
			if($insertTradeExchange != 0 && $insertAdtTeam !=0 && $insertCoreTeam !=0 && $insertresources !=0 && $milestoneInsert !=0) {
				echo  json_encode(array('status'=>1,'output'=> 'success', 'message'=>'Your file has been successfully Uploaded'));
				exit;
			}
			else {
				echo json_encode(array('status'=>0,'output'=> 'fail', 'message'=>'There is some error while uploading your data, Please make corrections as per the instructions'));
				exit;
			}
			
		} else {
			echo json_encode(array('status'=>0,'output'=> 'fail', 'message'=>'Please make sure that your file name starts with either "digital or ico" '));
			exit;
		}
	}
	
}