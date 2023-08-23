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
		<form action="Cvtechque.php" method="POST" enctype="multipart/form-data">
			<section>    
				<article><input name="d1" type="text" placeholder="Nom (Champs obligatoire)"  required></article>
				<article><input name="d2" type="text" placeholder="Prénom (Champs obligatoire)" required></article><br>
				<article><p>Date de naissance :</p></article>
				<article><input name="d4" type="date" placeholder="jj/mm/aaaa (Champs obligatoire)"  required></article>
				<article><textarea name="d5" placeholder="Adresse (Champs obligatoire)"  required></textarea></article>
				<article><textarea name="d6" placeholder="Complément d'adresse"   ></textarea></article>
				<article><input name="d7" type="text" placeholder="Code Postal (Champs obligatoire)"  required></article>
				<article><input name="d8" type="text" placeholder="Ville (Champs obligatoire)"  required></article>
				<article><input name="d9" type="email" placeholder="Courriel (Champs obligatoire)"  required></article>
				<article><input name="d10" type="text" placeholder="Téléphone fixe" ></article>
				<article><input name="d11" type="text" placeholder="Téléphone portable (Champs obligatoire)"  required></article>
				<article><input name="d12" type="text" placeholder="Profil"></article>
				<article class="competence"><input name="d13" type="text" placeholder="Compétences (Champs obligatoire)"  required></article>
				<article class="competence"><input name="d14" type="text" placeholder="Compétences (Champs obligatoire)"  required></article>
				<article class="competence"><input name="d15" type="text" placeholder="Compétences (Champs obligatoire)" required></article>
				<article class="competence"><input name="d16" type="text" placeholder="Compétences (Champs obligatoire)" required></article>
				<article class="competence"><input name="d17" type="text" placeholder="Compétences (Champs obligatoire)" required></article>
				<article class="competence"><input name="d18" type="text" placeholder="Compétences"></article>
				<article class="competence"><input name="d19" type="text" placeholder="Compétences"></article>
				<article class="competence"><input name="d20" type="text" placeholder="Compétences"></article>
				<article class="competence"><input name="d21" type="text" placeholder="Compétences"></article>
				<article class="competence"><input name="d22" type="text" placeholder="Compétences"></article>
				<article><input name="d23" type="url" placeholder="Site Internet"></article>
				<article><input name="d24" type="url" placeholder="Lien vers le profil Linkedin"></article>
				<article><input name="d25" type="url" placeholder="Lien vers le profil Viadeo"></article>
				<article><input name="d26" type="url" placeholder="Lien vers le profil Facebook"></article>
				<article><p>CV à transmettre</p></article>
				<article> <input type="file" name="fichier" id="fichier" placeholder="Fichier à inserer ici" ></article>
				<article><input  type="submit" value="Enregistrer"></article>
				<article style="position: fixed; top: 80px; left: 50px;"><a href="index.php"><img src="PJ/retour.png"></a></article>
			</section>
		</form>
	</main>
</body>
</html>