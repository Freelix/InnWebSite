<?php
	require_once('../check_logged_in.php');
	
	$id = $_GET['id'];
	$message = array();
	
	$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
	mysql_query("DELETE FROM en_liste_partenaires WHERE no_partenaire = '$id'") or die("La connexion a échoué.");
	
	$message[] = "La suppression a bien été effectué.";
	
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../../admin/services/en.service_partenaires.php");
?>