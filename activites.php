<?php 
require_once('php/remove_session.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>Activit�s � l'auberge - Auberge Internationale de Trois-Rivi�res</title>
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
          <h2>Auberge Internationale de <br/><b>Trois-Rivi�res</b></h2>
        </div>
		<div id="hi_image">
			<img id="logo_hi" src="style/HI-logo.jpg" alt="Logo HI"/>
		</div>
	  </a>
		<div id="auberge_image">
			<img id="auberge_logo" src="style/auberge_photo.jpg" alt="Logo HI Trois-Rivi�res"/>
		</div>
      </div>
      <div id="menubar">
	  <div id="smoothmenu1" class="ddsmoothmenu">
	  <a href="http://www.facebook.com/pages/Auberge-de-jeunesse-HI-Trois-Rivi%C3%A8res/180609951984544"><img id="facebook_logo" src="style/facebook.png" alt="facebook"/></a>
        <ul id="menu"> 
          <!-- put class="tab_selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="index.php">Accueil</a></li>
          <li><a href="tarifs.php">Tarifs/R�servation</a></li>
          <li class="tab_selected"><a href="activites.php">Activit�s<img class="downarrowclass" style="border:0;" src="style/Dropdown/down.gif"/></a>
			<ul id="menu_dropdown">
				 <li id="menu_dropdown"><a href="activites.php">� l'auberge</a></li>
				 <li id="menu_dropdown"><a href="activites_proche.php">� proximit�</a></li>
				 <li id="menu_dropdown"><a href="activites_rabais.php">Rabais</a></li>
			</ul>
		  </li>
          <li><a href="services.php">Services</a></li>
		  <li><a href="multimedia_auberge.php">Galerie</a>
		  <ul id="menu_dropdown">
  <li id="menu_dropdown"><a href="multimedia_auberge.php">Photos de l'auberge</a></li>
  <li id="menu_dropdown"><a href="multimedia_tr.php">Photos de Trois-Rivi�res</a></li>
  </ul>
		  </li>
          <li><a href="about_us.php">� propos de nous</a></li>
        </ul>
      </div>
	  </div>
    </div>
    <div id="site_content">
		<!-- Informations sur le c�t� gauche du site -->
      <div class="sidebar">
	   <p>
		<a id="langue" href="index.php">Fran�ais</a> / <a id="langue" href="en.index.php">English</a>
	  </p>
        <!-- insert your sidebar items here -->
		
		<?php
			//Connexion
			require("php/connexion.php");
			$bdd = ConnexionAuberge();
		
			//Requ�te
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
	  <h1>Activit�s � l'auberge</h1>
       <?php
			//Requ�te
			$reponse = $bdd->query('SELECT * FROM activite');
			
			//Affichage
			while ($donnees = $reponse->fetch())
			{
				$noAct = $donnees['no_activite'];
				$reponseRabais = $bdd->query("SELECT * FROM rabais_membre WHERE no_activite = $noAct");
				$countRabais = $bdd->query("SELECT COUNT(*) FROM rabais_membre WHERE no_activite = $noAct");
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
						<h2>Rabais aux membres</h2>
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
