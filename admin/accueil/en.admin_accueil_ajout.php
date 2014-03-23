<?php 
require_once('../../php/check_logged_in.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>Accueil - Auberge Internationale de Trois-Rivières</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="../../style/style.css" />
  
	<link rel="stylesheet" type="text/css" href="../../style/Dropdown/ddsmoothmenu.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="../../style/Dropdown/ddsmoothmenu.js"></script>

	<script type="text/javascript">
		ddsmoothmenu.init({
		mainmenuid: "smoothmenu1", //menu DIV id
		orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
		classname: 'ddsmoothmenu', //class added to menu's outer DIV
		//customtheme: ["#1c5a80", "#18374a"],
		contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
		})
	</script>
</head>

<body>
  <div id="main">
    <div id="links"></div>
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="blue", allows you to change the colour of the text - other classes are: "green", "orange", "red", "purple" and "yellow" -->
          <h1>Auberge<span class="orange">Hi</span></h1>
          <h2>Auberge Internationale de <br/><b>Trois-Rivières</b></h2>
        </div>
		<div id="hi_image">
			<img id="logo_hi" src="../../style/HI-logo.jpg" alt="Logo HI"/>
		</div>
		<div id="auberge_image">
			<img id="auberge_logo" src="../../style/auberge_photo.jpg" alt="Logo HI Trois-Rivières"/>
		</div>
      </div>
      <div id="menubar">
	  <div id="smoothmenu1" class="ddsmoothmenu">
	 <a href="http://www.facebook.com/pages/Auberge-de-jeunesse-HI-Trois-Rivi%C3%A8res/180609951984544"><img id="facebook_logo" src="../../style/facebook.png" alt="facebook"/></a>
        <ul id="menu"> 
          <!-- put class="tab_selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="tab_selected"><a href="../../index.php">Accueil</a></li>
          <li><a href="../../tarifs.php">Tarifs</a></li>
           <li><a href="../../en.activites.php">Activities</a>
			<ul id="menu_dropdown">
				 <li id="menu_dropdown"><a href="../../en.activites.php">At the hostel</a></li>
				 <li id="menu_dropdown"><a href="../../en.activites_proche.php">Nearby</a></li>
				 <li id="menu_dropdown"><a href="../../en.activites_rabais.php">Discounts</a></li>
			</ul>
		  </li>
          <li><a href="../../services.php">Services et Partenaires</a></li>
		  <li><a href="../../multimedia_auberge.php">Galerie</a>
		  <ul id="menu_dropdown">
  <li id="menu_dropdown"><a href="../../multimedia_auberge.php">Photos de l'auberge</a></li>
  <li id="menu_dropdown"><a href="../../multimedia_tr.php">Photos de Trois-Rivières</a></li>
  </ul>
		  </li>
          <li><a href="../../about_us.php">À propos de nous</a></li>
        </ul>
      </div>
	  </div>
    </div>
    <div id="site_content">
		<!-- Informations sur le côté gauche du site -->
      <div class="sidebar">
        <!-- insert your sidebar items here -->
		
		<?php
			//Connexion
			require("../../php/connexion.php");
			$bdd = ConnexionAuberge();
		
			//Requête
			$reponse = $bdd->query('SELECT * FROM sidebar');
			$liens = $bdd->query('SELECT * FROM lien_utile');
			
			//Affichage
			while ($data = $reponse->fetch())
			{
			
			//Permet de faire des espaces
			$textNew = $data['info_new'];
			$textInfo = $data['info_sidebar_desc'];
			
			
			?>
        <h1><?php echo $data['titre_sidebar'];?></h1>
        <h2><?php echo $data['titre_new'];?></h2>
        <h3><?php echo $data['date_new'];?></h3>
        <p><?php echo nl2br($textNew);?></p>
        <h1>Liens utiles</h1>
        <ul>
		<?php
			while ($dataLiens = $liens->fetch())
			{
			?>
          <li><a href="<?php echo $dataLiens['lien_utile'];?>"><?php echo $dataLiens['nom_lien_utile'];?></a></li>
		  <?php } ?>
        </ul>
        <h1><?php echo $data['info_sidebar_titre'];?></h1>
        <p><?php echo nl2br($textInfo)?></p>
      </div>
	  
	  <?php } ?>
	  
      <div id="content">
		<form name="input" action="../../php/en.accueil_ajout.php" method="post">
			<a class="orange" href="../en.admin_main_page.php">Retour au menu</a>
			<h1 class="blue">Accueil - Ajout - Anglais</h1>
			<h2>Titre</h2>
			<input id="titre_design" type="text" name="titre" value="<?php if (isset($_SESSION['titre'])){echo $_SESSION['titre'];}?>"/>
			
			<h2>Description</h2>
			<textarea id="area_design" name="description"><?php if (isset($_SESSION['description'])){echo $_SESSION['description'];}?></textarea>
			
			<div id="bouton_design">
				<input type="submit" value="Ajouter"/>
			</div>
			<?php
			if (isset($_SESSION['message']))
			{
				$message = $_SESSION['message'];
				foreach ($message as $mess)
				{
					echo "<div id='message'>" . $mess . "</div><br/>";
				}
			}
			
			unset($_SESSION['message']);
			unset($_SESSION['titre']);
			unset($_SESSION['description']);
			?>
		</form>
      </div>
    </div>
  </div>
  <?php include("../../php/footer.php"); ?>
</body>
</html>
