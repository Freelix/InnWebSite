<?php
	require_once('../check_logged_in.php');
	
	$id = $_GET['id'];
	$section = $_GET['section'];
	$message = array();
	
	$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
	mysql_query("DELETE FROM multimedia WHERE no_multi = '$id'") or die("La connexion a �chou�.");
	
	$message[] = "La suppression a bien �t� effectu�.";
	
	$_SESSION['message'] = $message;
	
	//Retourner � la fen�tre
	if ($section === 'TR')
	{
		header("location:../../admin/galerie/admin_galerie_mod.php");
	}
	else if ($section === 'Auberge')
	{
		header("location:../../admin/galerie/admin_galerie_auberge.php");
	}
?>