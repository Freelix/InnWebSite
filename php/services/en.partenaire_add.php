<?php
	// On d�marre la session AVANT d'�crire du code HTML
	require_once('../check_logged_in.php');
	
		//Cr�er un array pour afficher les erreurs
		$message = array();
		
	if (($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	{
		if (file_exists("../../multimedia/partenaire/" . $_FILES["file"]["name"]))
		  {
			null;
		  }
		else
		  {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../../multimedia/partenaire/" . $_FILES["file"]["name"]);
		  }
		
		if (!EMPTY($_POST['nom']) and !EMPTY($_POST['lien']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$nom = htmlentities($_POST['nom'], ENT_QUOTES);
			$lien = htmlentities($_POST['lien'], ENT_QUOTES);
			$image = $_FILES["file"]["name"];
			$image = htmlentities($image, ENT_QUOTES);
			
			//Requ�te
			mysql_query("INSERT INTO en_liste_partenaires VALUES(null, '$nom', '$lien', 'multimedia/partenaire/$image')") or die("La connexion a �chou�.");
			
			$message[] = "L'ajout a bien �t� effectu�.";
			
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir tous les champs";
		}
	}	
	else
	{
		$message[] = "Le fichier n'est pas valide";
	}
	
	//On garde en m�moire les champs saisis
	$_SESSION['nom'] = $_POST['nom'];
	$_SESSION['lien'] = $_POST['lien'];
		
	$_SESSION['message'] = $message;
	
	//Retourner � la fen�tre
	header("location:../../admin/services/en.service_partenaires.php");
?>