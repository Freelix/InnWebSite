<?php
	// On d�marre la session AVANT d'�crire du code HTML
	require_once('../check_logged_in.php');
	
		//Cr�er un array pour afficher les erreurs
		$message = array();
		
		//On garde en m�moire les champs saisis
		$_SESSION['nom'] = $_POST['nom'];
		
		if (!EMPTY($_POST['nom']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$nom = htmlentities($_POST['nom'], ENT_QUOTES);
			
			//Requ�te
			mysql_query("INSERT INTO en_liste_service VALUES(null, '$nom')") or die("La connexion a �chou�.");
			
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
	header("location:../../admin/services/en.service_list.php");
?>