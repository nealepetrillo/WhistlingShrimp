<?php 
session_start();
if(!isset($_SESSION["loggedin"])) 
{$_SESSION["loggedin"] = false;}
if(!isset($_SESSION["logged_user"])) 
{$_SESSION["loggedin"] = "";}
if($_SESSION["loggedin"]){$pic = 't4.png';}else{$pic = 't3.png';}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>The Whistling Shrimp - <?php print $page ?></title>
<?php 
foreach($styles as $style)
{
	print "<link rel=\"stylesheet\" type=\"text/css\" href=\"$style\"/>\n";
} 
if(isset($scripts)){
	foreach($scripts as $script)
	{
		print "<script type=\"text/javascript\" src=\"$script\"></script>";
	} 
}

?>

<link rel="icon" href="<?php print $images ?>favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="<?php print $images ?>favicon.ico" type="image/x-icon"/>


</head>
  <body>	
  	<p><img id="title" src="<?php print $images ?>title.png"  alt ="The Whistling Shrimp: Cornell's only improv comedy group"/></p>
  		<p id = "login">
		<?php
			if(isset($_GET["log"])){
				 print "Welcome. You have successfully logged in as "  .  $_SESSION["logged_user"];				
			}elseif($_SESSION["loggedin"]) {
			  print "You are logged in as " .  $_SESSION["logged_user"];
 			  print ". <a href=\"$logout\">Click  here to logout</a>\n";
			}else{
			  print("You are not logged in. Registered users can <a href=\"$login\">login here</a>\n");
			}
			?>
  		</p>
	  	<div id ="main">