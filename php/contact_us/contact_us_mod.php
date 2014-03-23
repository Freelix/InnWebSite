<?php
	require_once('../check_logged_in.php');
	
	$id = $_GET['id'];
	$message = array();
	
	if (!empty($_POST['nom']) and !empty($_POST['desc']))
	{
		$con = mysql_connect("localhost","root","password");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("auberge", $con);
				
				$nom = htmlentities($_POST['nom'], ENT_QUOTES);
				$desc = htmlentities($_POST['desc'], ENT_QUOTES);
				
		mysql_query("UPDATE contact_us set nom_info_contact = '$nom',
		desc_info_contact = '$desc' WHERE no_info_contact = $id ") or die("La connexion a échoué.");
	
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
	header("location:../../admin/about_us/admin_about_contact.php");
?>