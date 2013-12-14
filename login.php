<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="Styles/login.css"/>
</head>

<?php

	require_once('lib/php/common.php'); 
?>
<body>


	<?php if(isset($_GET['error'])){
			echo "<div class=\"error\"><p>There was a problem logging in</p></div>";
		}
	?>
	<div id="content_login">
		<form id="mainLogin" method="post" action="lib/php/login.php">
			<table>
				<tr>
					<td><label for="username">Username:</label></td><td><input type="text" name="username" id="username" /></td>
					<td><label for="password">Password:</label></td><td><input type="password" name="password" id="password" /></td>			
				</tr>
				<tr>
					<td><input type="submit" name="Login"></td>
				</tr>
			</table>
		</form>
	</div>
</body>


