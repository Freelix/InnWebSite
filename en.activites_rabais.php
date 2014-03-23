<?php 
require_once('php/remove_session.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>Activities - Discounts - Youth Hostel, Trois Rivieres</title>
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
        <a href="en.index.php">
        <div id="logo_text">
          <!-- class="blue", allows you to change the colour of the text - other classes are: "green", "orange", "red", "purple" and "yellow" -->
          <h1>Hostel<span class="orange">Hi</span></h1>
          <h2>International Youth Hostel<br/><b>Trois-Rivières</b></h2>
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
          <li><a href="en.index.php">Home</a></li>
          <li><a href="en.tarifs.php">Rates/Reservation</a></li>
          <li class="tab_selected"><a href="en.activites.php">Activities</a>
			<ul id="menu_dropdown">
				 <li id="menu_dropdown"><a href="en.activites.php">At the hostel</a></li>
				 <li id="menu_dropdown"><a href="en.activites_proche.php">Nearby</a></li>
				 <li id="menu_dropdown"><a href="en.activites_rabais.php">Discounts</a></li>
			</ul>
		  </li>
          <li><a href="en.services.php">Services</a></li>
		  <li><a href="en.multimedia_auberge.php">Gallery<img class="downarrowclass" style="border:0;" src="style/Dropdown/down.gif"/></a>
		  <ul id="menu_dropdown">
  <li id="menu_dropdown"><a href="en.multimedia_auberge.php">Pictures of the Inn</a></li>
  <li id="menu_dropdown"><a href="en.multimedia_tr.php">Pictures Trois-Rivières</a></li>
  </ul>
		  </li>
          <li><a href="en.about_us.php">About Us</a></li>
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
			$reponse = $bdd->query('SELECT * FROM en_sidebar');
			$liens = $bdd->query('SELECT * FROM en_lien_utile');
			
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
        <h1>Useful links</h1>
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
	  <h1>Activities - Discounts</h1>
       <?php
			//Requête
			$reponse = $bdd->query('SELECT * FROM en_activite_rabais');
			
			//Affichage
			while ($donnees = $reponse->fetch())
			{
				$noAct = $donnees['no_activite'];
				$reponseRabais = $bdd->query("SELECT * FROM en_rabais_rabais_membre WHERE no_activite = $noAct");
				$countRabais = $bdd->query("SELECT COUNT(*) FROM en_rabais_rabais_membre WHERE no_activite = $noAct");
				while ($countRabaisRep = $countRabais->fetch()) 
				{ 
					$nbrRabais = $countRabaisRep[0];
				}
			?>
				<div id="div_activite">
					<h2 class="blue"><?php echo $donnees['titre_activite'];?></h2>
					<p>
						<?php 
						$ImageYesNo = $donnees['image_activite'];
						
						if ($ImageYesNo <> 'multimedia/activite/')
						{
						?>
						<img id="test_image" src="<?php echo $donnees['image_activite'];?>" alt="<?php echo $donnees['titre_activite'] ?>"/>
						<?php }
						$text = $donnees['desc_activite'];
						echo nl2br($text);
						?>
						
						<?php if ($nbrRabais > 0)
						{ ?>
						<h2>Members discounts</h2>
						<ul>
						<?php	while ($donnees2 = $reponseRabais->fetch())
							{ ?>
							<li id="liste_services"><?php echo $donnees2['nom_rabais'] ?></li>
							<?php } ?>
						</ul>
						<?php } 
						if (!empty($donnees['lien_activite']))
						{ ?>
						<li><a href="<?php echo $donnees['lien_activite'];?>"><?php echo $donnees['nom_lien_activite'];?></a></li>
						<?php } ?>
					</p>
				</div>
				<?php
			}
		?>
      </div>
    </div>
  </div>
  <?php include("php/footer.php"); ?>
</body>
</html>
