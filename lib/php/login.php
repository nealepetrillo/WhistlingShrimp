<?php
    require_once("common.php");
	
	//start session
	session_start();
	
	//check to see if user is already logged in
	if(!isset($_SESSION['username']) && !_isset($_SESSION['userType'])) {
		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])){
			
			//create database connection
			$db = createConnection();
			
			//make sure the inputs are safe
			$username = makeSafe($_POST['username']);
			$password = makeSafe($_POST['password']);
			$password = hash("sha256", $password);
			
			//run qurery 
			$sql = "SELECT * FROM `currentMember` WHERE `username` = ? `password` = ? LIMIT 1";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $password);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			//if there is results go to the manage page
			if(!$row) {
				header("Locataion: ../lgin.php?error=true");
			}
			else {
				//check to see if the username is an admin
				$sql = "SELECT * FROM `currentMember` NATURAL JOIN `admin` WHERE `username` = ? `password` = ? LIMIT 1";
				$stmt = $db->prepare($sql);
				$stmt->bindParam(1, $username);
				$stmt->bindParam(2, $password);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				$_SESSION['username'] = $username;
				$_SESSION["loggedin"] = 'true';
				
				if(!$row) {
					$_SESSION['userType'] = 'normal';
					header("Locataion: ../manage.php");
				}
				else {
					$_SESSION['userType'] = 'admin';
					header("Location: ../manage.php");
				}
			}
		
		}
		else {
			header("Locataion: ../lgin.php?error=true");
		}
	}
	else {
		header('Location: ../manage.php');
	}
		
?>