<?php
	// On d�marre la session AVANT d'�crire du code HTML
	require_once('../check_logged_in.php');
	
	//Cr�er un array pour afficher les erreurs
	$message = array();
	
	// ins�re le fichier
	if (($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	{
		if (file_exists("../../multimedia/employe/" . $_FILES["file"]["name"]))
		  {
			null;
		  }
		else
		  {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../../multimedia/employe/" . $_FILES["file"]["name"]);
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
			$image = $_FILES["file"]["name"];
			$image = htmlentities($image, ENT_QUOTES);
			
			//Requ�te
			mysql_query("INSERT INTO en_employe VALUES(null, '$nom','$desc', 'multimedia/employe/$image')") or die("La connexion a �chou�.");
			
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
	
	$_SESSION['message'] = $message;
	
	//On garde en m�moire les champs saisis
	$_SESSION['nom'] = $_POST['nom'];
	$_SESSION['desc'] = $_POST['desc'];
	
	//Retourner � la fen�tre
	header("location:../../admin/about_us/en.admin_about_mod.php");
?>