<?php
	session_start();
	
	$message = array();
	
	$con = mysql_connect("localhost","root","password");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("auberge", $con);
			
	if (!EMPTY($_POST['login']) and !EMPTY($_POST['password']))
	{
		require("connexion.php");
		$bdd = ConnexionAuberge();
		
		//Requête
		$reponse = $bdd->query('SELECT password FROM autres');
			
		//Affichage
		while ($data = $reponse->fetch())
		{
			if ($_POST['login'] == "admin" and $_POST['password'] == $data['password'])
			{
				header("location:../admin/admin_main_page.php");
				$_SESSION['logged_in'] = true;
				exit();
			}
			else
			{
				$message[] = "Login ou mot de passe incorrecte.";
			}
		}
	}
	else
	{
		$message[] = "Login ou mot de passe incorrecte.";
	}	
	
	
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../login.php");
?>