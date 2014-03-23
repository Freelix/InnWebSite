<?php
	session_start();
	if (!isset($_SESSION['logged_in']))
	{
		header("Location: ../login.php"); 
		exit();
	}
	
	$id = $_GET['id'];
	$message = array();
	
	if (isset($_POST['titre']) and isset($_POST['description']))
	{
		$con = mysql_connect("localhost","root","password");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("auberge", $con);
				
				$titre = htmlentities($_POST['titre'], ENT_QUOTES);
				$desc = htmlentities($_POST['description'], ENT_QUOTES);
				
		mysql_query("UPDATE en_page_accueil set titre_nouvelle = '$titre',
		desc_nouvelle = '$desc' WHERE no_nouvelle = $id ") or die("La connexion a échoué.");
	
		$message[] = "La modification a bien été effectué.";
		
		mysql_close($con);
	}
	
	else
	{
		//Affiche un erreur
		$message[] = "Vous devez remplir tous les champs";
	}
	
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../admin/accueil/en.admin_accueil_modsupp.php");
?>