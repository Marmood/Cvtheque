<?php

	/*=======================================================================Lecture du fichier CSV=====================================================================*/
	$file = fopen("hrdata.csv", "a+");		
		while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
		
	/*=================================================================Ne pas prendre en compte la première et la dernière ligne================================================================*/
	array_pop($line);
	array_shift($line);
	/*=================================================================Récupérer la valeur max de la première ligne du tableau(ID)================================================================*/
	foreach($line as $value){
		$timmed[] = ($value[0]);
	}
	$p = max($timmed);
	/*=================================================================Calcul de l'âge================================================================*/
	
	$n=($_POST['d4']);	
	$tab=explode("-",$n);	
	$j = $tab[1]."/".$tab[2]."/".$tab[0];
	$l = $tab[2]."/".$tab[1]."/".$tab[0];
	$t = date("m/d/Y");
	$diff = date_diff(date_create($j), date_create($t));
	
	/*=================================================================Récupérer les données du formulaire================================================================*/
	$list = array (
	($p + 1),
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
	
	
 print "Bravo !!!! ";

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
			move_uploaded_file($_FILES["fichier"]["tmp_name"],"cvs/" . ($p + 1).".".$extension);		
		}
	}

 header("Location: index.php");
?>
