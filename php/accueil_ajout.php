<?php
	// On d�marre la session AVANT d'�crire du code HTML
	session_start();
	if (!isset($_SESSION['logged_in']))
	{
		header("Location: ../login.php"); 
		exit();
	}
	
	//Tester si tout est remplis
	
		//Cr�er un array pour afficher les erreurs
		$message = array();
		
		//On garde en m�moire les champs saisis
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
			
			//Requ�te
			mysql_query("INSERT INTO page_accueil VALUES(null,'$titre','$description')") or die("La connexion a �chou�.");
			
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
	header("location:../admin/accueil/admin_accueil_ajout.php");
?>