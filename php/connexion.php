<?php
function ConnexionAuberge()
{
	try
	{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$bdd = new PDO('mysql:host=localhost;dbname=auberge', 'root', 'password', $pdo_options);
		return $bdd;
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}
}
?>