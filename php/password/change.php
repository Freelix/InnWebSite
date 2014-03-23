<?php
	require_once('../check_logged_in.php');
	
	$message = array();
	
		if (!empty($_POST['actuel']) and !empty($_POST['nouveau1']) and !empty($_POST['nouveau2']))
		{
			$con = mysql_connect("localhost","root","password");
					if (!$con)
					{
						die('Could not connect: ' . mysql_error());
					}
					
					require("../connexion.php");
					$bdd = ConnexionAuberge();
		
					//Requête
					$reponse = $bdd->query('SELECT password FROM autres');
						
					//Affichage
		while ($data = $reponse->fetch())
			{
				mysql_select_db("auberge", $con);
					
				$actuel = htmlentities($_POST['actuel'], ENT_QUOTES);
				$nouveau1 = htmlentities($_POST['nouveau1'], ENT_QUOTES);
				$nouveau2 = htmlentities($_POST['nouveau2'], ENT_QUOTES);
					
				if ($actuel === $data['password'])
				{
					if ($nouveau1 === $nouveau2)
					{
						mysql_query("UPDATE autres set password = '$nouveau1'") or die("La connexion a échoué.");
						
						$message[] = "La modification a bien été effectué.";
					}
					else
					{
						$message[] = "Les mots de passe ne correspondent pas ensemble.";
					}
				}
				else
				{
					$message[] = "Ce n'est pas le bon mot de passe, vous êtes maintenant déconnecté";
					unset ($_SESSION['logged_in']);
				}
			}
			mysql_close($con);
		}
		else
		{
			//Affiche un erreur
			$message[] = "Vous devez remplir tous les champs";
		}
		
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../../admin/password/change_pass.php");
?>