<?php
	session_start();
	if (!isset($_SESSION['logged_in']))
	{
		header("Location: ../login.php"); 
		exit();
	}
	
	$id = $_GET['id'];
	$message = array();
	
	$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
	mysql_query("DELETE FROM en_page_accueil WHERE no_nouvelle = '$id'") or die("La connexion a �chou�.");
	
	$message[] = "La suppression a bien �t� effectu�.";
	
	$_SESSION['message'] = $message;
	
	//Retourner � la fen�tre
	header("location:../admin/accueil/en.admin_accueil_modsupp.php");
?>