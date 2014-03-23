<?php
	// On démarre la session AVANT d'écrire du code HTML
	require_once('../check_logged_in.php');
	
		//Créer un array pour afficher les erreurs
		$message = array();
		
		//On garde en mémoire les champs saisis
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
			
			//Requête
			mysql_query("INSERT INTO en_liste_service VALUES(null, '$nom')") or die("La connexion a échoué.");
			
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
	header("location:../../admin/services/en.service_list.php");
?>