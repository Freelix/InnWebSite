<?php
	// On d�marre la session AVANT d'�crire du code HTML
	require_once('../check_logged_in.php');
	
		//Cr�er un array pour afficher les erreurs
		$message = array();
		
		//On garde en m�moire les champs saisis
		$_SESSION['titre'] = $_POST['titre'];
		$_SESSION['lien'] = $_POST['lien'];
		
		if (!EMPTY($_POST['titre']) and !EMPTY($_POST['lien']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$titre = htmlentities($_POST['titre'], ENT_QUOTES);
			$lien = htmlentities($_POST['lien'], ENT_QUOTES);
			
			//Requ�te
			mysql_query("INSERT INTO lien_utile VALUES(null,'$titre','$lien')") or die("La connexion a �chou�.");
			
			$message[] = "L'ajout a bien �t� effectu�.";
			
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir tous les champs";
		}
	
	$_SESSION['message'] = $message;
	
	//Retourner � la fen�tre
	header("location:../../admin/sidebar/admin_sidebar_liens.php");
?>