<?php
	// On d�marre la session AVANT d'�crire du code HTML
	require_once('../check_logged_in.php');
	
	$id = $_GET['id'];
	
	//Cr�er un array pour afficher les erreurs
	$message = array();
	
	if (!EMPTY($_POST['nom_rabais']))
		{
			//Connexion
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
			$nom_rabais = htmlentities($_POST['nom_rabais'], ENT_QUOTES);

			//Requ�te
			mysql_query("INSERT INTO rabais_rabais_membre VALUES(null, $id, '$nom_rabais')") or die("La connexion a �chou�.");
			
			$message[] = "L'ajout a bien �t� effectu�.";
			
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir le champs rabais.";
		}
	
	$_SESSION['message'] = $message;
	
	//Retourner � la fen�tre
	header("location:../../admin/activites/admin_activite_rabais_mod.php");
?>