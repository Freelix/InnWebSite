<?php 
require_once('php/remove_session.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<!-- Haut de page -->
<head>
    <title>Rates - Youth Hostel, Trois Rivieres</title>
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
          <li class="tab_selected"><a href="en.tarifs.php">Rates/Reservation</a></li>
          <li><a href="en.activites.php">Activities</a>
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
			<h1>Rates</h1>
			
			<h2>Chambers (Canadien dollars)</h2>
			
			
			<?php
			$reponse = $bdd->query('SELECT * FROM rate');
			while ($data = $reponse->fetch())
			{ ?>
			<table id="tab_reserv">
			<tr>
					<th></th>
					<th>Members</th>
					<th>Non-Members</th>
				</tr>
				<tr>
					<th></th>
					<th>Rates - Taxes included</th>
					<th>Rates - Taxes included</th>
				</tr>
				<tr>
					<td><b>Dormitory</b></td>
					<td><?php echo $data['dortoir_m_ti'];?></td>
					<td><?php echo $data['dortoir_nm_ti'];?></td>
				</tr>
				<tr>
					<td><b>Private room</b></td>
					<td><?php echo $data['champri_m_ti']; ?></td>
					<td><?php echo $data['champri_nm_ti']; ?></td>
				</tr>
				<tr>
					<td><b>Family room<br/>(2 adults)</b></td>
					<td><?php echo $data['chamfam1_m_ti']; ?></td>
					<td><?php echo $data['chamfam1_nm_ti']; ?></td>
				</tr>
				<tr>
					<td><b>Family room<br/>(3 adults)</b></td>
					<td><?php echo $data['chamfam2_m_ti']; ?></td>
					<td><?php echo $data['chamfam2_nm_ti']; ?></td>
				</tr>
				<tr>
					<td><b>Family room<br/>(4 ou 5 adults)</b></td>
					<td><?php echo $data['chamfam3_m_ti']; ?></td>
					<td><?php echo $data['chamfam3_nm_ti']; ?></td>
				</tr>
			</table>
			<?php } ?>
			<p id="petits_car">
				Rates can be changed without any notice.
			</p>
			
			<h2>Additional informations</h2>
			
			<table id="tab_reserv">
				<tr>
					<th>Description</th>
					<th>Number of beds</th>
				</tr>
				<tr>
					<td>Mixed Dorm</td>
					<td>4 beds</td>
				</tr>
				<tr>
					<td>Men Dorm</td>
					<td>8 beds</td>
				</tr>
				<tr>
					<td>Women dorm</td>
					<td>6 beds</td>
				</tr>
				<tr>
					<td><b>Family room</b><br/>A twin over full bunk bed<br/>2 single bunk beds</td>
					<td>4 beds</td>
				</tr>
				<tr>
					<td><b>Private room</b><br/>1 double bed</td>
					<td>1 bed</td>
				</tr>
			</table>
			
			<ul>
				<li id="liste_services">Possibility to rent the inn in exclusivity for groups.<br/> Please contact us for more details on the rates.</li>
				<li id="liste_services"> Children 17 and under can stay for free. <br/> This offer is applied only on family room and <br/> is not valid for beds in dorm room.</li>
			</ul>
			
			<h2 id="info_sous_tab">Business hours</h2>
			
			<p>
				Open 7 days on 7 <br/>
				8h to 12h and 16h to 21h
			</p>
			
			<h1 class="blue">Reservation</h1>
			<h2>On internet</h2>
			<p>
				<a href="http://reservation.worldweb.com/Bookings-nr105/activity-edit.html?table=hotels&listing_id=644&mode=command&command=bookingrequestform&hotel_id=644&language=english" target="_blank">Take an online reservation</a>
			</p>
			
			<h2>By phone</h2>
			<table id="tab_reserv">
				<tr>
					<th></th>
					<th>Phone numbers</th>
				</tr>
				<tr>
					<td>From Trois-Rivières:</td>
					<td>819-378-8010</td>
				</tr>
				<tr>
					<td>Free of charge:</td>
					<td>1-877-378-8010</td>
				</tr>
			</table>
			
      </div>
    </div>
  </div>
  <?php include("php/footer.php"); ?>
</body>
</html>
