<?php
$file = fopen("hrdata.csv", "r");		
		while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
	array_pop($line);
	fclose($file);
	$actu = $_POST['numcv'];
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
	
	
	
	if(file_exists("cvs/".($i+1).".pdf")){
		unlink ("cvs/".($actu).".pdf");
	}else{
		unlink ("cvs/".($actu).".docx");
	}
	
header("Location: index.php");
?>