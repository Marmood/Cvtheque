<?php
$file = fopen("hrdata.csv", "r");		
		while (!feof($file) ) {
        $line[] = fgetcsv($file, 1024, ";");
    }
	array_pop($line);
	array_shift($line);
	fclose($file);
	$actu = $_GET['numcvm'];
	
	foreach($line as $value){
		if($value[0]==$actu){
			$nline[] = $value;
		}
	}
	
	$n=$nline[0][4];
	$tab=explode("/",$n);	
	$j = $tab[2]."-".$tab[1]."-".$tab[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <section>  
        <article><h1>Formulaire</h1></article>
        </section>
    </header>

	<main>
		<form action="modifieur.php" method="POST" enctype="multipart/form-data">
			<section>    
				<article><input name="d1" type="text" placeholder="Nom (Champs obligatoire)" value="<?php print $nline[0][1]; ?>" required></article>
				<article><input name="d2" type="text" placeholder="Prénom (Champs obligatoire)" value="<?php print $nline[0][2]; ?>" required></article><br>
				<article><p>Date de naissance :</p></article>
				<article><input name="d4" type="date" placeholder="jj/mm/aaaa (Champs obligatoire)" value="<?php print $j; ?>" required></article>
				<article><textarea name="d5" placeholder="Adresse (Champs obligatoire)" value=""  required><?php print $nline[0][5]; ?></textarea></article>
				<article><textarea name="d6" placeholder="Complément d'adresse"><?php if($nline[0][6]=='NULL'){print '';}else{ print $nline[0][6]; } ?></textarea></article>
				<article><input name="d7" type="text" placeholder="Code Postal (Champs obligatoire)" value="<?php print $nline[0][7]; ?>" required></article>
				<article><input name="d8" type="text" placeholder="Ville (Champs obligatoire)" value="<?php print $nline[0][8]; ?>" required></article>
				<article><input name="d9" type="email" placeholder="Courriel (Champs obligatoire)" value="<?php print $nline[0][11]; ?>" required></article>
				<article><input name="d10" type="text" placeholder="Téléphone fixe" value="<?php if($nline[0][10]=='NULL'){print '';}else{ print $nline[0][10]; } ?>" ></article>
				<article><input name="d11" type="text" placeholder="Téléphone portable (Champs obligatoire)" value="<?php print $nline[0][9]; ?>" required></article>
				<article><input name="d12" type="text" placeholder="Profil" value="<?php if($nline[0][12]=='NULL'){print '';}else{ print $nline[0][12]; } ?>"></article>
				<article class="competence"><input name="d13" type="text" placeholder="Compétences (Champs obligatoire)" value="<?php print $nline[0][13]; ?>" required></article>
				<article class="competence"><input name="d14" type="text" placeholder="Compétences (Champs obligatoire)" value="<?php print $nline[0][14]; ?>" required></article>
				<article class="competence"><input name="d15" type="text" placeholder="Compétences (Champs obligatoire)" value="<?php print $nline[0][15]; ?>" required></article>
				<article class="competence"><input name="d16" type="text" placeholder="Compétences (Champs obligatoire)" value="<?php print $nline[0][16]; ?>" required></article>
				<article class="competence"><input name="d17" type="text" placeholder="Compétences (Champs obligatoire)" value="<?php print $nline[0][17]; ?>" required></article>
				<article class="competence"><input name="d18" type="text" placeholder="Compétences" value="<?php if($nline[0][18]=='NULL'){print '';}else{ print $nline[0][18]; } ?>"></article>
				<article class="competence"><input name="d19" type="text" placeholder="Compétences" value="<?php if($nline[0][19]=='NULL'){print '';}else{ print $nline[0][19]; } ?>"></article>
				<article class="competence"><input name="d20" type="text" placeholder="Compétences" value="<?php if($nline[0][20]=='NULL'){print '';}else{ print $nline[0][20]; } ?>"></article>
				<article class="competence"><input name="d21" type="text" placeholder="Compétences" value="<?php if($nline[0][21]=='NULL'){print '';}else{ print $nline[0][21]; } ?>"></article>
				<article class="competence"><input name="d22" type="text" placeholder="Compétences" value="<?php if($nline[0][22]=='NULL'){print '';}else{ print $nline[0][22]; } ?>"></article>
				<article><input name="d23" type="url" placeholder="Site Internet" value="<?php if($nline[0][23]=='NULL'){print '';}else{ print $nline[0][23]; } ?>"></article>
				<article><input name="d24" type="url" placeholder="Lien vers le profil Linkedin" value="<?php if($nline[0][24]=='NULL'){print '';}else{ print $nline[0][24]; } ?>"></article>
				<article><input name="d25" type="url" placeholder="Lien vers le profil Viadeo" value="<?php if($nline[0][25]=='NULL'){print '';}else{ print $nline[0][25]; } ?>"></article>
				<article><input name="d26" type="url" placeholder="Lien vers le profil Facebook" value="<?php if($nline[0][26]=='NULL'){print '';}else{ print $nline[0][26]; } ?>"></article>
				<article><p>CV à transmettre</p></article>
				<article> <input type="file" name="fichier" id="fichier" placeholder="Fichier à inserer ici" value="cvs\<?php if(file_exists("cvs/".($nline[0][0]).".pdf")){ print ($nline[0][0]).".pdf";}else{ print ($nline[0][0]).".docx";} ?>"><p>Le Cv <?php if(file_exists("cvs/".($nline[0][0]).".pdf")){ print ($nline[0][0]).".pdf";}else{ print ($nline[0][0]).".docx";} ?> est bien chargé.</article>
				<article><input  type="hidden" name="numero" value="<?php print $actu ?>"><button><p>Enregistrer</p></button></article>
				<article style="position: fixed; top: 80px; left: 50px;"><a href="index.php"><img src="PJ/retour.png"></a></article>
			</section>
		</form>
	</main>
</body>
</html>

