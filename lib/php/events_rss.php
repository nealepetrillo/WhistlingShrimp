<?php
require("common.php");

//connect to database
$db = createConnection();

//Set header type
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

//get data			
$sql = "SELECT * FROM `events` ORDER BY date DESC LIMIT 10 ";

//print records
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