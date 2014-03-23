<?php
	session_start();session_start();
	if (!isset($_SESSION['logged_in']))
	{
		header("Location: ../login.php"); 
		exit();
	}
	
	$message = array();
	
	if (!empty($_POST['titre_new']) and !empty($_POST['desc_new']))
	{
		$con = mysql_connect("localhost","root","password");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("auberge", $con);
				
				$titre_general = htmlentities($_POST['titre_general'], ENT_QUOTES);
				$titre_new = htmlentities($_POST['titre_new'], ENT_QUOTES);
				$desc_new = htmlentities($_POST['desc_new'], ENT_QUOTES);
				$titre_info = htmlentities($_POST['titre_info'], ENT_QUOTES);
				$desc_info = htmlentities($_POST['desc_info'], ENT_QUOTES);
				
		mysql_query("UPDATE en_sidebar set titre_sidebar = '$titre_general', titre_new = '$titre_new',
		info_new = '$desc_new', info_sidebar_titre = '$titre_info', info_sidebar_desc = '$desc_info',
		date_new = curdate() WHERE no_sidebar = 1") or die(mysql_error());
	
		$message[] = "La modification a bien été effectué.";
		
		mysql_close($con);
	}
	
	else
	{
		//Affiche un erreur
		$message[] = "Vous devez au moins remplir les champs: titre secondaire et informations du haut";
	}
	
	$_SESSION['message'] = $message;
	
	echo $id;
	
	//Retourner à la fenêtre
	header("location:../admin/sidebar/en.admin_sidebar_mod.php");
?>