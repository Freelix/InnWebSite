<?php
	require_once('../check_logged_in.php');
	
	$message = array();
	
	if (!empty($_POST['info']))
	{
		$con = mysql_connect("localhost","root","password");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("auberge", $con);
				
				$info = htmlentities($_POST['info'], ENT_QUOTES);
				
		mysql_query("UPDATE en_autres set desc_service = '$info'") or die("La connexion a �chou�.");
	
		$message[] = "La modification a bien �t� effectu�.";
		
		mysql_close($con);
	}
	
	else
	{
		//Affiche un erreur
		$message[] = "Vous devez remplir tous les champs";
	}
	
	$_SESSION['message'] = $message;
	
	//Retourner � la fen�tre
	header("location:../../admin/services/en.service_info.php");
?>