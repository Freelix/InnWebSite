<?php
	require_once('../check_logged_in.php');
	
	$id = $_GET['id'];
	$message = array();
	
	if (($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg") or EMPTY($_POST['file']))
	{
		if (file_exists("../../multimedia/activite/" . $_FILES["file"]["name"]))
		  {
			null;
		  }
		else
		  {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../../multimedia/activite/" . $_FILES["file"]["name"]);
		  }
	}
	else
	{
		$message[] = "Le fichier n'est pas valide";
	}
	
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
					$nom_lien = htmlentities($_POST['nom_lien'], ENT_QUOTES);
					$lien = htmlentities($_POST['lien'], ENT_QUOTES);
					$image = $_FILES["file"]["name"];
					$image = htmlentities($image, ENT_QUOTES);
			
			if (!EMPTY($_POST['nom_lien']) and !EMPTY($_POST['lien']))
			{
				if ($image === '')
				{
					mysql_query("UPDATE activite_rabais set titre_activite = '$nom',
					desc_activite = '$desc',
					nom_lien_activite = '$nom_lien',
					lien_activite = '$lien'
					WHERE no_activite = $id ") or die("La connexion a échoué.");
				}
				else
				{
					mysql_query("UPDATE activite_rabais set titre_activite = '$nom',
					desc_activite = '$desc',
					nom_lien_activite = '$nom_lien',
					lien_activite = '$lien',
					image_activite = 'multimedia/activite/$image'
					WHERE no_activite = $id ") or die("La connexion a échoué.");
				}
			}
			else
			{
				if ($image === '')
				{
					mysql_query("UPDATE activite_rabais set titre_activite = '$nom',
					desc_activite = '$desc',
					nom_lien_activite = '',
					lien_activite = ''
					WHERE no_activite = $id ") or die("La connexion a échoué.");
				}
				else
				{
					mysql_query("UPDATE activite_rabais set titre_activite = '$nom',
					desc_activite = '$desc',
					nom_lien_activite = '',
					lien_activite = '',
					image_activite = 'multimedia/activite/$image'
					WHERE no_activite = $id ") or die("La connexion a échoué.");
				}
			}
			
			$message[] = "La modification a bien été effectué.";
			
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir au moins les champs nom de l'activité et description.";
		}
		
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../../admin/activites/admin_activite_rabais_mod.php");
?>