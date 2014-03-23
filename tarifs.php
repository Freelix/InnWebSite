<?php 
require_once('php/remove_session.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>Tarifs - Auberge Internationale de Trois-Rivières</title>
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
          <li class="tab_selected"><a href="tarifs.php">Tarifs/Réservation</a></li>
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
          <li><a href="about_us.php">À propos de nous</a></li>
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
			<h1>Tarifs</h1>
			
			<h2>Chambres (Dollars canadien)</h2>
			
			
			<?php
			$reponse = $bdd->query('SELECT * FROM rate');
			while ($data = $reponse->fetch())
			{ ?>
			<table id="tab_reserv">
			<tr>
					<th></th>
					<th>Membres</th>
					<th>Non-Membres</th>
				</tr>
				<tr>
					<th></th>
					<th>Tarif - Taxes incluses</th>
					<th>Tarif - Taxes incluses</th>
				</tr>
				<tr>
					<td><b>Dortoir</b></td>
					<td><?php echo $data['dortoir_m_ti'];?></td>
					<td><?php echo $data['dortoir_nm_ti'];?></td>
				</tr>
				<tr>
					<td><b>Chambre privée</b></td>
					<td><?php echo $data['champri_m_ti']; ?></td>
					<td><?php echo $data['champri_nm_ti']; ?></td>
				</tr>
				<tr>
					<td><b>Chambre familiale<br/>(2 adultes)</b></td>
					<td><?php echo $data['chamfam1_m_ti']; ?></td>
					<td><?php echo $data['chamfam1_nm_ti']; ?></td>
				</tr>
				<tr>
					<td><b>Chambre familiale<br/>(3 adultes)</b></td>
					<td><?php echo $data['chamfam2_m_ti']; ?></td>
					<td><?php echo $data['chamfam2_nm_ti']; ?></td>
				</tr>
				<tr>
					<td><b>Chambre familiale<br/>(4 ou 5 adultes)</b></td>
					<td><?php echo $data['chamfam3_m_ti']; ?></td>
					<td><?php echo $data['chamfam3_nm_ti']; ?></td>
				</tr>
			</table>
			<?php } ?>
			<p id="petits_car">
				Les tarifs sont sujets à des changements sans préavis.
			</p>
			
			<h2>Informations supplémentaires</h2>
			
			<table id="tab_reserv">
				<tr>
					<th>Description</th>
					<th>Nombre de lits</th>
				</tr>
				<tr>
					<td>Dortoir Mixte</td>
					<td>4 lits</td>
				</tr>
				<tr>
					<td>Dortoir Homme</td>
					<td>8 lits</td>
				</tr>
				<tr>
					<td>Dortoir Femme</td>
					<td>6 lits</td>
				</tr>
				<tr>
					<td><b>Chambre familiale</b><br/>1 lit double superposé d'un lit simple<br/>2 lits simple superposés</td>
					<td>4 lits</td>
				</tr>
				<tr>
					<td><b>Chambre privée</b><br/>1 lit double</td>
					<td>1 lit</td>
				</tr>
			</table>
			
			<ul>
				<li id="liste_services">Possibilité de louer l'auberge en exclusivité pour les groupes. <br/> Veuillez nous contacter pour plus de détails sur la tarification.</li>
				<li id="liste_services"> Les enfants de 17 ans et moins hébergent gratuitement. <br/> Cette offre s'applique uniquement en chambre familiale et <br/> n'est pas valable pour les lits en dortoir.</li>
			</ul>
			
			<h2 id="info_sous_tab">Heures d'ouvertures</h2>
			
			<p>
				Ouvert 7 jours sur 7 <br/>
				De 8h à 12h et de 16h à 21h
			</p>
			
			<h1 class="blue">Réservation</h1>
			<h2>Sur internet</h2>
			<p>
				<a href="http://reservation.worldweb.com/Bookings-nr105/activity-edit.html?table=hotels&listing_id=644&mode=command&command=bookingrequestform&hotel_id=644&language=french" target="_blank">Prendre une réservation en ligne</a>
			</p>
			
			<h2>Par téléphone</h2>
			<table id="tab_reserv">
				<tr>
					<th></th>
					<th>Numéro</th>
				</tr>
				<tr>
					<td>Local:</td>
					<td>819-378-8010</td>
				</tr>
				<tr>
					<td>Sans Frais:</td>
					<td>1-877-378-8010</td>
				</tr>
			</table>
			
      </div>
    </div>
  </div>
  <?php include("php/footer.php"); ?>
</body>
</html>
