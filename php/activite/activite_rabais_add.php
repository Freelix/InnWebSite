<?php
	// On d�marre la session AVANT d'�crire du code HTML
	require_once('../check_logged_in.php');
	
	//Cr�er un array pour afficher les erreurs
	$message = array();
	
	// ins�re le fichier
	if (($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg") or EMPTY($_POST['file']))
	{
		if (file_exists("../../multimedia/activite/" . $_FILES["file"]["name"]))
		  {
			null;
		  }
		else
		  {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../../multimedia/activite/" . $_FILES["file"]["name"]);
		  }
		
		if (!EMPTY($_POST['nom']) and !EMPTY($_POST['desc']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$nom = htmlentities($_POST['nom'], ENT_QUOTES);
			$desc = htmlentities($_POST['desc'], ENT_QUOTES);
			$nom_lien = htmlentities($_POST['nom_lien'], ENT_QUOTES);
			$lien = htmlentities($_POST['lien'], ENT_QUOTES);
			$image = $_FILES["file"]["name"];
			$image = htmlentities($image, ENT_QUOTES);
			
			if (!EMPTY($_POST['nom_lien']) and !EMPTY($_POST['lien']))
			{
				//Requ�te
				mysql_query("INSERT INTO activite_rabais VALUES(null,'$nom','$desc', 'multimedia/activite/$image', '$nom_lien', '$lien')") or die("La connexion a �chou�.");
			}
			else
			{
				mysql_query("INSERT INTO activite_rabais (titre_activite, desc_activite, image_activite) VALUES('$nom','$desc', 'multimedia/activite/$image')") or die("La connexion a �chou�.");	
			}
			
			$message[] = "L'ajout a bien �t� effectu�.";
			
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir au moins les champs nom de l'activit� et description.";
		}
	}
	else
	{
		$message[] = "Le fichier n'est pas valide";
	}
	
	$_SESSION['message'] = $message;
	
	//On garde en m�moire les champs saisis
	$_SESSION['nom'] = $_POST['nom'];
	$_SESSION['desc'] = $_POST['desc'];
	$_SESSION['nom_lien'] = $_POST['nom_lien'];
	$_SESSION['lien'] = $_POST['lien'];
	
	//Retourner � la fen�tre
	header("location:../../admin/activites/admin_activite_rabais_add.php");
?>