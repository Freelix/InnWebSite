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
			
	mysql_query("DELETE FROM en_lien_utile WHERE no_lien_utile = '$id'") or die("La connexion a échoué.");
	
	$message[] = "La suppression a bien été effectué.";
	
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../../admin/sidebar/en.admin_sidebar_liens.php");
?>