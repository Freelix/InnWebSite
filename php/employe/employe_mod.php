<?php
	require_once('../check_logged_in.php');
	
	$id = $_GET['id'];
	$message = array();
	
	if (($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	{
		if (file_exists("../../multimedia/employe/" . $_FILES["file"]["name"]))
		  {
			null;
		  }
		else
		  {
			move_uploaded_file($_FILES["file"]["tmp_name"], "../../multimedia/employe/" . $_FILES["file"]["name"]);
		  }
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
					$image = $_FILES["file"]["name"];
					$image = htmlentities($image, ENT_QUOTES);
			
			if ($image === '')
			{
				mysql_query("UPDATE employe set nom_employe = '$nom',
				desc_employe = '$desc'
				WHERE no_employe = $id ") or die("La connexion a �chou�.");
			}
			else
			{
				mysql_query("UPDATE employe set nom_employe = '$nom',
				desc_employe = '$desc', image_employe = 'multimedia/employe/$image'
				WHERE no_employe = $id ") or die("La connexion a �chou�.");
			}
			
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
	header("location:../../admin/about_us/admin_about_mod.php");
?>