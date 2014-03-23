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
          <li><a href="../activites.php">Activités<img class="downarrowclass" style="border:0;" src="../style/Dropdown/down.gif"/></a>
			<ul id="menu_dropdown">
				 <li id="menu_dropdown"><a href="../activites.php">À l'auberge</a></li>
				 <li id="menu_dropdown"><a href="../activites_proche.php">À proximité</a></li>
				 <li id="menu_dropdown"><a href="../activites_rabais.php">Rabais</a></li>
			</ul>
		  </li>
          <li><a href="../services.php">Services et Partenaires</a></li>
		  <li><a href="../multimedia_auberge.php">Galerie</a>
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
			<a class="orange" href="en.admin_main_page.php">Modifier la version anglaise</a>
			<h1>Administration</h1>
			
			<h1 class="blue">Accueil</h1>
			<ul>
				<li><a class="orange" href="accueil/admin_accueil_ajout.php">Ajouter des éléments à la page d'accueil</a></li>
				<li><a class="orange" href="accueil/admin_accueil_modsupp.php">Modifier ou supprimer des éléments de la page d'accueil</a></li>
			</ul>
			
			<h1 class="blue">Section gauche</h1>
			
			<ul>
				<li><a class="orange" href="sidebar/admin_sidebar_mod.php">Modifier des éléments de la section gauche</a></li>
				<li><a class="orange" href="sidebar/admin_sidebar_liens.php">Modifier les liens utiles</a></li>
			</ul>
			
			<h1 class="blue">À propos de nous</h1>
			
			<ul>
				<li><a class="orange" href="about_us/admin_about_mod.php">Gérer les employés</a></li>
				<li><a class="orange" href="about_us/admin_about_contact.php">Section nous conctacter</a></li>
			</ul>
			
			<h1 class="blue">Services et partenaires</h1>
			
			<ul>
				<li><a class="orange" href="services/service_info.php">Modifier le texte</a></li>
				<li><a class="orange" href="services/service_list.php">Modifier les services offerts</a></li>
				<li><a class="orange" href="services/service_partenaires.php">Modifier les partenaires</a></li>
			</ul>
			
			<h1 class="blue">Tarifs</h1>
			
			<ul>
				<li><a class="orange" href="reservation/admin_rates_change.php">Modifier les tarifs</a></li>
			</ul>
			
			<h1 class="blue">Galerie</h1>
			
			<ul>
				<li><a class="orange" href="galerie/admin_galerie_mod.php">Modifier les photos de Trois-Rivières</a></li>
				<li><a class="orange" href="galerie/admin_galerie_auberge.php">Modifier les photos de l'auberge</a></li>
				<li><a class="orange" href="galerie/admin_galerie_pictures.php">Modifier le nombre de photos par page</a></li>
			</ul>
			
			<h1 class="blue">Activités</h1>
			
			<ul>
				<li><a class="orange" href="activites/admin_activite_add.php">Ajouter une activité à l'auberge</a></li>
				<li><a class="orange" href="activites/admin_activite_mod.php">Modifier les activités à l'auberge</a></li>
				<br>
				<li><a class="orange" href="activites/admin_activite_proche_add.php">Ajouter une activité à proximité</a></li>
				<li><a class="orange" href="activites/admin_activite_proche_mod.php">Modifier les activités à proximité</a></li>
				<br>
				<li><a class="orange" href="activites/admin_activite_rabais_add.php">Ajouter un rabais</a></li>
				<li><a class="orange" href="activites/admin_activite_rabais_mod.php">Modifier les rabais</a></li>
			</ul>
			
			<h1 class="blue">Mot de passe</h1>
			
			<ul>
				<li><a class="orange" href="password/change_pass.php">Changer le mot de passe</a></li>
			</ul>
      </div>
    </div>
  </div>
  <?php include("../php/footer.php"); ?>
</body>
</html>
