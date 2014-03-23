<?php
	// On démarre la session AVANT d'écrire du code HTML
	session_start();
	if (!isset($_SESSION['logged_in']))
	{
		header("Location: ../login.php"); 
		exit();
	}
	
	//Tester si tout est remplis
	
		//Créer un array pour afficher les erreurs
		$message = array();
		
		//On garde en mémoire les champs saisis
		$_SESSION['titre'] = $_POST['titre'];
		$_SESSION['description'] = $_POST['description'];
		
		if (!EMPTY($_POST['titre']) and !EMPTY($_POST['description']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$titre = htmlentities($_POST['titre'], ENT_QUOTES);
			$description = htmlentities($_POST['description'], ENT_QUOTES);
			
			//Requête
			mysql_query("INSERT INTO page_accueil VALUES(null,'$titre','$description')") or die("La connexion a échoué.");
			
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
	header("location:../admin/accueil/admin_accueil_ajout.php");
?>