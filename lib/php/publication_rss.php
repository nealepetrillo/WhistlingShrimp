<?php
require("common.php");

//create database connection
$db = createConnection();

//set header type
header("Content-type: text/xml");
//print channel information 
echo "<?xml version=\”1.0\” encoding=\”UTF-8\”?>";
echo "<rss version=\"2.0\">";
echo "	<channel>
			<title>The Whisling Shimrp: News and Publications</title>
			<description>The Whistling Shrimp's News updates</description>
			<link>http://www.http://www.thewhistlingshrimp.com</link>
			<language>en-us</language>
			<copyright>The Whistling Shrimp. All rights reserved.</copyright>";

//run sql
$sql = "SELECT * FROM ((SELECT * FROM `blogs` AS A)  UNION (SELECT * FROM `news` AS B) UNION (SELECT * FROM `pressRelease` AS C) ) AS D ORDER BY D.date DESC LIMIT 10 ";
//print the data
foreach ($db->query($sql) as $row)
{
	echo "
			<item>
				<link>www.thewhistlingshrimp.com</link>
				<guid isPermaLink=\"true\">http://www.http://www.thewhistlingshrimp.com</guid>	
				<title>".$row['title']."</title>
				<description><![CDATA[".$row['content']."]]></description>
				<pubDate>".$row['date']."</pubDate>
			</item>";
}

//close channel
echo "
</channel>
</rss>";
?>