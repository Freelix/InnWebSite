<?php
	// On démarre la session AVANT d'écrire du code HTML
	require_once('../check_logged_in.php');
	
		//Créer un array pour afficher les erreurs
		$message = array();
		
		//On garde en mémoire les champs saisis
		$_SESSION['titre'] = $_POST['titre'];
		$_SESSION['infos'] = $_POST['infos'];
		
		if (!EMPTY($_POST['titre']) and !EMPTY($_POST['infos']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$titre = htmlentities($_POST['titre'], ENT_QUOTES);
			$infos = htmlentities($_POST['infos'], ENT_QUOTES);
			
			//Requête
			mysql_query("INSERT INTO en_contact_us VALUES(null, '$titre','$infos')") or die("La connexion a échoué.");
			
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
	header("location:../../admin/about_us/en.admin_about_contact.php");
?>