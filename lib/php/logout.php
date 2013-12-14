<?php
	//open session
	session_start();
	
	//if there is a session, destroy it and return to the homepage
    if(!isset($_SESSION['username']) && !_isset($_SESSION['userType'])) {
    	session_destroy();	
		header("Locataion: ../index.php");
	}
	else {
		header("Location: ../index.php");
	}
?>