<?php
	require_once('lib/php/common.php'); 
	$images = 'Images/';
	$page = 'Home';
	$styles[] = 'Styles/style.css';
	$styles[] = 'Styles/main.css';
	$login='Login/login.php';
	$logout='Login/logout.php';
	include 'header.php';
?>

	<div id="menuBar">
				  	 	<a class="Nactive" href="index.php">News</a>
				  	 	<a id="activeL" href="members.php">Members</a>
				  	 	<a class="Nactive" href="calendar.php">Calendar</a>
				  	 	<a class="Nactive" href="photos.php">Photos</a>
				  	 	<a class="Nactive" href="about.php">About Us</a>
				  	 	<a class="Nactive" href="alumni.php">Alumni</a>
				  	 	
				  	 	
	</div>
	<?php displayContent('members'); ?>



<?php include 'footer.php'?>	