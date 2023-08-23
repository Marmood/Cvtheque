<?php
$file = fopen("hrdata.csv", "r");		
		while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
	array_pop($line);
	fclose($file);
	$actu = $_POST['numero'];
	//print $actu;
	
	foreach($line as $value){
		if($value[0]!=$actu){
			$nline[] = $value;
		}
	}
	
	//print_r ($nline);
	//rewind($file);
	$file = fopen("hrdata.csv", "w");
	foreach($nline as $value){
		fputcsv($file, $value, ";");
	}
	fclose($file);
	
	
	
	/*if(file_exists("cvs/".($actu).".pdf")){
		unlink ("cvs/".($actu).".pdf");
	}else{
		unlink ("cvs/".($actu).".docx");
	}*/
	/*====================================================================================================================================================*/
	$file = fopen("hrdata.csv", "a+");		
		while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
		
	
	array_pop($line);
	array_shift($line);
	
	$n=($_POST['d4']);	
	$tab=explode("-",$n);	
	$j = $tab[1]."/".$tab[2]."/".$tab[0];
	$l = $tab[2]."/".$tab[1]."/".$tab[0];
	$t = date("m/d/Y");
	$diff = date_diff(date_create($j), date_create($t));
	
	/*=================================================================Récupérer les données du formulaire================================================================*/
	$list = array (
	($actu),
	($_POST['d1']),
	($_POST['d2']),
	$diff->format("%y"),
	($l),
	($_POST['d5']),
	(empty($_POST['d6']) ? 'NULL' : $_POST['d6']),
	($_POST['d7']),
	($_POST['d8']),
	($_POST['d11']),
	(empty($_POST['d10']) ? 'NULL' : $_POST['d10']),
	($_POST['d9']),
	($_POST['d12']),
	($_POST['d13']),
	($_POST['d14']),
	($_POST['d15']),
	($_POST['d16']),
	($_POST['d17']),
	(empty($_POST['d18']) ? 'NULL' : $_POST['d18']),
	(empty($_POST['d19']) ? 'NULL' : $_POST['d19']),
	(empty($_POST['d20']) ? 'NULL' : $_POST['d20']),
	(empty($_POST['d21']) ? 'NULL' : $_POST['d21']),
	(empty($_POST['d22']) ? 'NULL' : $_POST['d22']),
	(empty($_POST['d23']) ? 'NULL' : $_POST['d23']),
	(empty($_POST['d24']) ? 'NULL' : $_POST['d24']),
	(empty($_POST['d25']) ? 'NULL' : $_POST['d25']),
	(empty($_POST['d26']) ? 'NULL' : $_POST['d26']),	 
	);
	/*=================================================================Rentrer les données du formulaire dans le CSV================================================================*/
			
		fputcsv($file, $list, ";");
	fclose($file);

$allowedExts = array("pdf", "docx");
$tmp = explode(".", $_FILES["fichier"]["name"]);
$extension = end($tmp);
	if (($_FILES["fichier"]["type"] == "application/pdf")
	|| ($_FILES["fichier"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
	&& ($_FILES["fichier"]["size"] < 2000000)
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["fichier"]["error"] > 0){
		}else{		
			move_uploaded_file($_FILES["fichier"]["tmp_name"],"cvs/" . ($actu).".".$extension);		
		}
	}	
	
header("Location: indexm.php");
?>