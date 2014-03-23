<?php
	require_once('../check_logged_in.php');
	
	$message = array();
	
	if (!empty($_POST['nbr_auberge']) and !empty($_POST['nbr_tr']))
	{
		if (is_numeric($_POST['nbr_auberge']) and is_numeric($_POST['nbr_tr']))
		{
			$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("auberge", $con);
			
			$nbr_auberge = htmlentities($_POST['nbr_auberge'], ENT_QUOTES);
			$nbr_tr = htmlentities($_POST['nbr_tr'], ENT_QUOTES);
			
			mysql_query("UPDATE autres set nbr_pictures_auberge = $nbr_auberge,
			nbr_pictures_tr = $nbr_tr") or die("La connexion a échoué.");
			
			$message[] = "La modification a bien été effectuée.";
		}
		else
		{
			$message[] = "Les 2 champs doivent être des chiffres";
		}
	}
	else
	{
		$message[] = "Vous devez remplir tous les champs.";
	}
				
	$_SESSION['message'] = $message;
	
	header("location:../../admin/galerie/admin_galerie_pictures.php");
?>