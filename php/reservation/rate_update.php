<?php
	require_once('../check_logged_in.php');
	
	$message = array();
	
		$con = mysql_connect("localhost","root","password");
				if (!$con)
				{
					die('Could not connect: ' . mysql_error());
				}

				mysql_select_db("auberge", $con);
				
				//regarde si les variables sont vides
				if (empty($_POST['dortoir_m_ti'])) {$dortoir_m_ti = '--';} else {$dortoir_m_ti = $_POST['dortoir_m_ti'];}
				if (empty($_POST['dortoir_nm_ti'])) {$dortoir_nm_ti = '--';} else {$dortoir_nm_ti = $_POST['dortoir_nm_ti'];}
				
				if (empty($_POST['champri_m_ti'])) {$champri_m_ti = '--';} else {$champri_m_ti = $_POST['champri_m_ti'];}
				if (empty($_POST['champri_nm_ti'])) {$champri_nm_ti = '--';} else {$champri_nm_ti = $_POST['champri_nm_ti'];}
				
				if (empty($_POST['chamfam1_m_ti'])) {$chamfam1_m_ti = '--';} else {$chamfam1_m_ti = $_POST['chamfam1_m_ti'];}
				if (empty($_POST['chamfam1_nm_ti'])) {$chamfam1_nm_ti = '--';} else {$chamfam1_nm_ti = $_POST['chamfam1_nm_ti'];}
				
				if (empty($_POST['chamfam2_m_ti'])) {$chamfam2_m_ti = '--';} else {$chamfam2_m_ti = $_POST['chamfam2_m_ti'];}
				if (empty($_POST['chamfam2_nm_ti'])) {$chamfam2_nm_ti = '--';} else {$chamfam2_nm_ti = $_POST['chamfam2_nm_ti'];}
				
				if (empty($_POST['chamfam3_m_ti'])) {$chamfam3_m_ti = '--';} else {$chamfam3_m_ti = $_POST['chamfam3_m_ti'];}
				if (empty($_POST['chamfam3_nm_ti'])) {$chamfam3_nm_ti = '--';} else {$chamfam3_nm_ti = $_POST['chamfam3_nm_ti'];}
				
		mysql_query("UPDATE rate set dortoir_m_ti = '$dortoir_m_ti',
		dortoir_nm_ti = '$dortoir_nm_ti',
		
		champri_m_ti = '$champri_m_ti',
		champri_nm_ti = '$champri_nm_ti',
		
		chamfam1_m_ti = '$chamfam1_m_ti',
		chamfam1_nm_ti = '$chamfam1_nm_ti',
		
		chamfam2_m_ti = '$chamfam2_m_ti',
		chamfam2_nm_ti = '$chamfam2_nm_ti',
		
		chamfam3_m_ti = '$chamfam3_m_ti',
		chamfam3_nm_ti = '$chamfam3_nm_ti'
		") or die("La connexion a échoué.");
	
		$message[] = "La modification a bien été effectué.";
		
		mysql_close($con);
	
	$_SESSION['message'] = $message;
	
	//Retourner à la fenêtre
	header("location:../../admin/reservation/admin_rates_change.php");
?>