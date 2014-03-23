<?php 
  session_start();
 if (!isset($_SESSION['logged_in']))
 {
	header("Location: ../login.php"); 
	exit();
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>Accueil - Auberge Internationale de Trois-Rivières</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="../style/style.css" />
  
	<link rel="stylesheet" type="text/css" href="../style/Dropdown/ddsmoothmenu.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="../style/Dropdown/ddsmoothmenu.js"></script>

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
			<img id="logo_hi" src="../style/HI-logo.jpg" alt="Logo HI"/>
		</div>
		<div id="auberge_image">
			<img id="auberge_logo" src="../style/auberge_photo.jpg" alt="Logo HI Trois-Rivières"/>
		</div>
      </div>
      <div id="menubar">
	  <div id="smoothmenu1" class="ddsmoothmenu">
	  <a href="http://www.facebook.com/pages/Auberge-de-jeunesse-HI-Trois-Rivi%C3%A8res/180609951984544"><img id="facebook_logo" src="../style/facebook.png" alt="facebook"/></a>
        <ul id="menu"> 
          <!-- put class="tab_selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="tab_selected"><a href="../index.php">Accueil</a></li>
          <li><a href="../tarifs.php">Tarifs</a></li>
           <li><a href="../en.activites.php">Activities<img class="downarrowclass" style="border:0;" src="../style/Dropdown/down.gif"></a>
			<ul id="menu_dropdown">
				 <li id="menu_dropdown"><a href="../en.activites.php">At the hostel</a></li>
				 <li id="menu_dropdown"><a href="../en.activites_proche.php">Nearby</a></li>
				 <li id="menu_dropdown"><a href="../en.activites_rabais.php">Discounts</a></li>
			</ul>
		  </li>
          <li><a href="../services.php">Services et Partenaires</a></li>
		  <li><a href="../multimedia_auberge.php">Galerie<img class="downarrowclass" style="border:0;" src="../style/Dropdown/down.gif"></a>
		  <ul id="menu_dropdown">
  <li id="menu_dropdown"><a href="../multimedia_auberge.php">Photos de l'auberge</a></li>
  <li id="menu_dropdown"><a href="../multimedia_tr.php">Photos de Trois-Rivières</a></li>
  </ul>
		  </li>
          <li><a href="../about_us.php">À propos de nous</a></li>
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
			require("../php/connexion.php");
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
			<a class="orange" href="admin_main_page.php">Modifier la version française</a>
			<h1>Administration - English</h1>
			
			<h1 class="blue">Home</h1>
			<ul>
				<li><a class="orange" href="accueil/en.admin_accueil_ajout.php">Add elements to home page</a></li>
				<li><a class="orange" href="accueil/en.admin_accueil_modsupp.php">Edit or delete elements from home page</a></li>
			</ul>
			
			<h1 class="blue">Left panel</h1>
			
			<ul>
				<li><a class="orange" href="sidebar/en.admin_sidebar_mod.php">Edit elements from left panel</a></li>
				<li><a class="orange" href="sidebar/en.admin_sidebar_liens.php">Edit useful links</a></li>
			</ul>
			
			<h1 class="blue">About us</h1>
			
			<ul>
				<li><a class="orange" href="about_us/en.admin_about_mod.php">Manage employees</a></li>
				<li><a class="orange" href="about_us/en.admin_about_contact.php">Edit the section "about us"</a></li>
			</ul>
			
			<h1 class="blue">Services and partners</h1>
			
			<ul>
				<li><a class="orange" href="services/en.service_info.php">Edit the text</a></li>
				<li><a class="orange" href="services/en.service_list.php">Edit the services</a></li>
				<li><a class="orange" href="services/en.service_partenaires.php">Edit the partners</a></li>
			</ul>
			
			<h1 class="blue">Rates</h1>
			
			<ul>
				<li><a class="orange" href="reservation/admin_rates_change.php">Edit the rates</a></li>
			</ul>
			
			<h1 class="blue">Galery</h1>
			
			<ul>
				<li><a class="orange" href="galerie/admin_galerie_mod.php">Edit pictuures of Trois-Rivières</a></li>
				<li><a class="orange" href="galerie/admin_galerie_auberge.php">Edit pictures of the inn</a></li>
				<li><a class="orange" href="galerie/admin_galerie_pictures.php">Edit number of pictures per page</a></li>
			</ul>
			
			<h1 class="blue">Activities</h1>
			
			<ul>
				<li><a class="orange" href="activites/en.admin_activite_add.php">Add activity related to the inn</a></li>
				<li><a class="orange" href="activites/en.admin_activite_mod.php">Edit activity related to the inn</a></li>
				<br>
				<li><a class="orange" href="activites/en.admin_activite_proche_add.php">Add activity surrounding Trois-Rivieres</a></li>
				<li><a class="orange" href="activites/en.admin_activite_proche_mod.php">Edit activity surrounding Trois-Rivieres</a></li>
				<br>
				<li><a class="orange" href="activites/en.admin_activite_rabais_add.php">Add a discount</a></li>
				<li><a class="orange" href="activites/en.admin_activite_rabais_mod.php">Edit a discount</a></li>
			</ul>
			
			<h1 class="blue">Password</h1>
			
			<ul>
				<li><a class="orange" href="password/change_pass.php">Change the password</a></li>
			</ul>
      </div>
    </div>
   </div>
   <?php include("../php/footer.php"); ?>
</body>
</html>
