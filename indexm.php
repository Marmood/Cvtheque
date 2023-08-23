<?php
	$file = fopen("hrdata.csv", "a+");
	while (!feof($file)) {
        $line[] = fgetcsv($file, 1024, ";");
    }
	fclose($file);
	array_pop($line);
	array_shift($line);



	$names=array();
	$surnames=array();
	$age=array();
	$ville=array();
	$profil=array();
	
	foreach($line as $value) {
			$names[]=$value[1];
			$surnames[]=$value[2];
			$age[]=$value[3];
			$ville[]=$value[8];
			$profil[]=$value[12];
	}
	
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="stylei.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV thèque</title>
</head>
<body>
	<header>
		<article><h1>CVthéque</h1></article>
		<article><a href="formulaire.php"><img src="PJ/Ajout.png"></a></article>
		<article><a href="index.php"><img src="PJ/retour.png"></a></article>
		<form action="" method="POST">
			<article><input type="search" placeholder="Search" name="recherche"></article>
			<article>
				<select name="select">
					<option>Trier par...</option>
					<option value="1" <?php if(isset($_POST['select'])&&$_POST['select'] == 1) {print 'selected="selected"';} ?>>Trier par âge en ordre décroissant</option>
					<option value="2" <?php if(isset($_POST['select'])&&$_POST['select'] == 2) {print 'selected="selected"';} ?>>Trier par âge en ordre croissant</option>
					<option value="3" <?php if(isset($_POST['select'])&&$_POST['select'] == 3) {print 'selected="selected"';} ?>>Trier par nom de A à Z</option>
					<option value="4" <?php if(isset($_POST['select'])&&$_POST['select'] == 4) {print 'selected="selected"';} ?>>Trier par nom de Z à A</option>
					<option value="5" <?php if(isset($_POST['select'])&&$_POST['select'] == 5) {print 'selected="selected"';} ?>>Trier par ville de A à Z</option>
					<option value="6" <?php if(isset($_POST['select'])&&$_POST['select'] == 6) {print 'selected="selected"';} ?>>Trier par ville de Z à A</option>
					<option value="7" <?php if(isset($_POST['select'])&&$_POST['select'] == 7) {print 'selected="selected"';} ?>>Trier par profil recherché de A à Z</option>
					<option value="8" <?php if(isset($_POST['select'])&&$_POST['select'] == 8) {print 'selected="selected"';} ?>>Trier par profil recherché de Z à A</option>
				</select>
			</article>
		<article><input type="hidden" name="submit"><button><p>Appliquer</p></button></article>
		</form>
		<?php
		if(isset($_POST['submit'])){
		

			switch($_POST['select']){
				case 1:
				array_multisort($age, SORT_NUMERIC, SORT_DESC, $line);
				break;
				case 2:
				array_multisort($age, SORT_NUMERIC, SORT_ASC, $line);
				break;
				case 3:
				array_multisort($names, SORT_ASC, $surnames, SORT_ASC, $line);
				break;
				case 4:
				array_multisort($names, SORT_DESC, $surnames, SORT_DESC, $line);
				break;
				case 5:
				array_multisort($ville, SORT_ASC, $line);
				break;
				case 6:
				array_multisort($ville, SORT_DESC, $line);
				break;
				case 7:
				array_multisort($profil, SORT_ASC, $line);
				break;
				case 8:
				array_multisort($profil, SORT_DESC, $line);
				break;
			}
		$rech= $_POST["recherche"];
		$nline=array();
    foreach ($line as $valuer) {
        foreach ($valuer as $col) {
			
				if (stristr(mb_strtolower($col),mb_strtolower($rech))) {
					
					if (in_array($valuer,$nline)==false) {
						$nline[]=$valuer;
					}	
				}
			}
		}
    $line=$nline;
	}
    ?>
	</header>
    <main>
		<?php for ($i=0;$i<=(count($line) - 1);$i++){ ?>
       <section>
            <article><p><?php ucfirst(print $line[$i][2]); ?> <?php print $line[$i][1]; ?></p></article>
			<article><img src="perso.png"></article>
			<article><p><?php print $line[$i][12]; ?></p></article>
			<article><p><?php print $line[$i][3]; ?> Ans</p></article>
			<article><p><?php print $line[$i][8]; ?></p><hr></article>
			<article><p><?php print $line[$i][13]; ?></p></article>
			<article><p><?php print $line[$i][14]; ?></p></article>
			<article><p><?php print $line[$i][15]; ?></p></article>
			<article><p><?php print $line[$i][16]; ?></p></article>
			<article><p><?php print $line[$i][17]; ?></p></article>
			<?php if($line[$i][18]=='NULL'){print '';}else{?><article style="width:40%"><p><?php print $line[$i][18]; ?></p></article><?php } ?>
			<?php if($line[$i][19]=='NULL'){print '';}else{?><article style="width:40%"><p><?php print $line[$i][19]; ?></p></article><?php } ?>
			<?php if($line[$i][20]=='NULL'){print '';}else{?><article style="width:40%"><p><?php print $line[$i][20]; ?></p></article><?php } ?>
			<?php if($line[$i][21]=='NULL'){print '';}else{?><article style="width:40%"><p><?php print $line[$i][21]; ?></p></article><?php } ?>
			<?php if($line[$i][22]=='NULL'){print '';}else{?><article style="width:40%"><p><?php print $line[$i][22]; ?></p></article><?php } ?>
			<article><hr><p><?php print $line[$i][5]; ?></p></article>
			<article style="width:40%"><p><?php print $line[$i][9]; ?></p></article>
			<?php if($line[$i][10]=='NULL'){print '';}else{?><article style="width:40%"><p><?php print $line[$i][10]; ?></p></article><?php } ?>
			<article><p><?php print $line[$i][11]; ?></p></article>
			<article class="reseaux"><a href="cvs/<?php if(file_exists("cvs/".($line[$i][0]).".pdf")){ print ($line[$i][0]).".pdf";}else{ print ($line[$i][0]).".docx";}?>" target="_blank"><img src="PJ/cv.png"></a></article>
			<?php if($line[$i][23]=='NULL'){print '';}else{?><article class="reseaux"><a href="<?php print $line[$i][23]; ?>" target="_blank"><img src="PJ/domaine.png"></a></article><?php } ?>
			<?php if($line[$i][24]=='NULL'){print '';}else{?><article class="reseaux"><a href="<?php print $line[$i][24]; ?>" target="_blank"><img src="PJ/linkedin.png"></a></article><?php } ?>
			<?php if($line[$i][25]=='NULL'){print '';}else{?><article class="reseaux"><a href="<?php print $line[$i][25]; ?>" target="_blank"><img src="PJ/viadeo.png"></a></article><?php } ?>
			<?php if($line[$i][26]=='NULL'){print '';}else{?><article class="reseaux"><a href="<?php print $line[$i][26]; ?>" target="_blank"><img src="PJ/facebook.png"></a></article><?php } ?>
			<article style="width:100%;display:flex;justify-content:center;">
				<article style="width:48%"><form action="modification.php" method="GET"><input type="hidden" name="numcvm" value="<?php print $line[$i][0];?>"><button><p>Modifier</p></button></form></article>
				<article style="width:48%"><form onsubmit="return sure()" action="supprimer.php" method="POST"><input type="hidden" name="numcv" value="<?php print $line[$i][0];?>"><button><p>Supprimer</p></button></form></article>
				<!--<a href="supprimer.php?numcv=<?php/* print $i;*/?>"><button>Supprimer</button></a>-->				
			</article>
       </section>
		</br>
		<?php } ?>
    </main>
</body>
<script>
function sure(){
    $reponse = confirm("Êtes-vous sûr de vouloir supprimer ce profil?");
	if ($reponse) {
                    alert("Le profil à bien était supprimé !");
                }
}

alert("Profil bien modifié!");
</script>
</html>