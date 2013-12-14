<?php
    /*makeSafe(value)
     * Description - makes user imput safe
     * Parameters - the value to be sanatized
     * Returns - sanatized value
     * Throws - none
     */
	function makeSafe($value) {
		
		if (is_array($value)) {
        	foreach($value as $var => $val) {
            	$output[$var] = makeSafe($val);
			}
        }
    	
   	 	else {
    		$value = trim($value);
			$value = addslashes($value);
			$value = htmlentities($value);
	       
    	}
    	return $output;
	}
	
	/*makeUnSafe(value)
	 * Description - reverses makeSafe
	 * Parameters - the value to be unsafed
	 * Returns - an unsafed string
	 * Throws - none
	 */
	function makeUnSafe($value) {
		if (is_array($value)) {
        	foreach($value as $var => $val) {
            	$output[$var] = makeUnSafe($val);
			}
        }
    	
   	 	else {
    		$value = trim($value);
			$value = stripslashes($value);
			$value = html_entity_decode($value);
	       
    	}
    	return $output;
	}
    
    /*createConnection() 
     * Description - creates a new PDO database connection
     * Parameters - none
     * Returns - a PDO object
     * Throws - missing file error
     */
	function createConnection() {
		
		try {
			require("database.php");
			$db = new PDO("\"".$databaseType.":host=".$hostName.";dbname=".$databaseName."\",".$username.",".$password);
			return $db;
		}
		catch(PDOException $e) {
			throw new Exception('PDO Error wtih createConnection');		
		}
		catch(Exception $e){
			throw new Exception('Error with createConnection');
		}
		catch(ErrorException $e){
			throw new Exception('ErrorException with createConnection');
		}
	}
		
	/*displayContent(pageName)
	 * Description - prints the main content of a page in a <div id=content_pagename>
	 * Parameters - pageName: the file name for the page you want to display content for. Example: index.php -> index
	 * Returns - none
	 * Throws - database connection error
	 */
	function displayContent($pageName) {
		$db = createConnection();
		$pageName = makeSafe($pageName);
		
		
		$sql = "SELECT * FROM `siteData` WHERE `pageName` = ? LIMIT 1";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(1, $pageName);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		echo "	<div id=\"content_".$pageName."\">
					<span id=\short\">".$row['short']."</span>
					<span id=\"content\">".$row['content']."</span>
					<img id=\"contentPhoto\" src=\"".$row['photo']."\"alt=\"\"/>
				</div>";
	}

	
?>