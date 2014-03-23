<?php 
require_once('php/remove_session.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>À propos de nous - Auberge Internationale de Trois-Rivières</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
  
	<link rel="stylesheet" type="text/css" href="style/Dropdown/ddsmoothmenu.css" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="style/Dropdown/ddsmoothmenu.js"></script>

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
        <a href="index.php">
        <div id="logo_text">
          <!-- class="blue", allows you to change the colour of the text - other classes are: "green", "orange", "red", "purple" and "yellow" -->
          <h1>Auberge<span class="orange">Hi</span></h1>
          <h2>Auberge Internationale de <br/><b>Trois-Rivières</b></h2>
        </div>
		<div id="hi_image">
			<img id="logo_hi" src="style/HI-logo.jpg" alt="Logo HI"/>
		</div>
	  </a>
		<div id="auberge_image">
			<img id="auberge_logo" src="style/auberge_photo.jpg" alt="Logo HI Trois-Rivières"/>
		</div>
      </div>
      <div id="menubar">
	  <div id="smoothmenu1" class="ddsmoothmenu">
	 <a href="http://www.facebook.com/pages/Auberge-de-jeunesse-HI-Trois-Rivi%C3%A8res/180609951984544"><img id="facebook_logo" src="style/facebook.png" alt="facebook"/></a>
        <ul id="menu"> 
          <!-- put class="tab_selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Accueil</a></li>
          <li><a href="tarifs.php">Tarifs/Réservation</a></li>
         <li><a href="activites.php">Activités<img class="downarrowclass" style="border:0;" src="style/Dropdown/down.gif"/></a>
			<ul id="menu_dropdown">
				 <li id="menu_dropdown"><a href="activites.php">À l'auberge</a></li>
				 <li id="menu_dropdown"><a href="activites_proche.php">À proximité</a></li>
				 <li id="menu_dropdown"><a href="activites_rabais.php">Rabais</a></li>
			</ul>
		  </li>
          <li><a href="services.php">Services</a></li>
		  <li><a href="multimedia_auberge.php">Galerie</a>
		  <ul id="menu_dropdown">
  <li id="menu_dropdown"><a href="multimedia_auberge.php">Photos de l'auberge</a></li>
  <li id="menu_dropdown"><a href="multimedia_tr.php">Photos de Trois-Rivières</a></li>
  </ul>
		  </li>
          <li class="tab_selected"><a href="about_us.php">À propos de nous</a></li>
        </ul>
      </div>
	  </div>
    </div>
    <div id="site_content">
		<!-- Informations sur le côté gauche du site -->
      <div class="sidebar">
	   <p>
		<a id="langue" href="index.php">Français</a> / <a id="langue" href="en.index.php">English</a>
	  </p>
        <!-- insert your sidebar items here -->
		
		<?php
			//Connexion
			require("php/connexion.php");
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
			<h1>À propos de nous</h1>
			
			<h1 class="blue">Nous contacter</h1>
			
			<table>
			<?php
			$reponse = $bdd->query('SELECT * FROM contact_us');
			
			while ($data = $reponse->fetch())
			{ 
				$text = $data['desc_info_contact'];
			?>
				<tr>
					<td id="tableau_contacter"><?php echo $data['nom_info_contact'];?></td>
					<td><?php echo nl2br($text);?></td>
				</tr>
				<?php } ?>
			</table>
			
			<h1 class="blue">Itinéraire</h1>
			
			<div>
				<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.ca/maps?f=d&amp;source=s_d&amp;saddr=&amp;daddr=497+Rue+Radisson,+Trois-Rivi%C3%A8res,+QC&amp;hl=fr&amp;geocode=FeglwwIdaw2t-ymPJck9AsbHTDEwpTu7TOW8Fg&amp;sll=46.343284,-72.545471&amp;sspn=0.023197,0.05918&amp;mra=prev&amp;ie=UTF8&amp;t=m&amp;ll=46.343284,-72.545471&amp;spn=0.010369,0.018239&amp;z=15&amp;output=embed"></iframe><br /><small><a id="G_map" href="http://maps.google.ca/maps?f=d&source=s_d&saddr=&daddr=497+Rue+Radisson,+Trois-Rivi%C3%A8res,+QC&hl=fr&geocode=FeglwwIdaw2t-ymPJck9AsbHTDEwpTu7TOW8Fg&sll=46.343284,-72.545471&sspn=0.023197,0.05918&mra=prev&ie=UTF8&t=m&ll=46.343284,-72.545471&spn=0.010369,0.018239&z=15">Obtenir l'itinéraire</a></small>
			</div>
			
			<h1 class="blue" id="team">Équipe de l'auberge</h1>
			<?php
			$reponse = $bdd->query('SELECT * FROM employe');
			
			while ($data = $reponse->fetch())
			{
				$text = $data['desc_employe'];
			?>
			<h2><?php echo $data['nom_employe'];?></h2>
			<div>
				<img id="image_personne" src="<?php echo $data['image_employe'];?>" alt="<?php echo $data['nom_employe'];?>"/>
		
				<p id="info_personne">
					<?php echo nl2br($text); ?> 
				</p>
			</div>
			<?php } ?>
      </div>
    </div>
  </div>
  <?php include("php/footer.php"); ?>
</body>
</html>
