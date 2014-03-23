<?php
	// On démarre la session AVANT d'écrire du code HTML
	require_once('../check_logged_in.php');
	
		//Créer un array pour afficher les erreurs
		$message = array();
		
		//On garde en mémoire les champs saisis
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
			
			//Requête
			mysql_query("INSERT INTO lien_utile VALUES(null,'$titre','$lien')") or die("La connexion a échoué.");
			
			$message[] = "L'ajout a bien été effectué.";
			
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir tous les champs";
		}
	
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../../admin/sidebar/admin_sidebar_liens.php");
?>