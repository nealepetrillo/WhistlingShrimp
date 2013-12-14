<?php
	require_once('lib/php/common.php'); 
	$images = 'Images/';
	$page = 'Home';
	$styles[] = 'Styles/style.css';
	$styles[] = 'Styles/main.css';
	$login='Login/login.php';
	$logout='Login/logout.php';
	include 'header.php';
	
	if(!isset($_SESSION['loggedin'])){
		header("Locataion: ../lgin.php?error=true");
	}
?>

	<div id="menuBar">
				  	 	<a id="activeL" href="index.php">News</a>
				  	 	<a class="Nactive" href="">Members</a>
				  	 	<a class="Nactive" href="">Calendar</a>
				  	 	<a class="Nactive" href="">Photos</a>
				  	 	<a class="Nactive" href="">About Us</a>
				  	 	<a class="Nactive" href="">Alumni</a>
				  	 	
	</div>
	
	<form id="publishingForm" method="post" action="lib/php/publish.php">
		<table>
			<tr>
				<td><label for="title">Title</label></td>
				<td><input type="text" name="title" id="title" /></td>
			</tr>
			<tr>
				<td><label for="body">Body</label></td>
				<td><input type="text" name="body" id="body" /></td>
			</tr>		
		</table>		
	</form>


<?php include 'footer.php'?>	