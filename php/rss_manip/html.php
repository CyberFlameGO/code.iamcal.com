<?
	require_once "config.txt";
	require_once "XML/RSS.php";

	# grab the RSS
	$rss =& new XML_RSS($url);
	$rss->parse();
?>
<html>
<body>
<?
	foreach ($rss->getItems() as $item) {
		echo "<h3>$item[title]</h3>\n";
		echo chop($item[description])."<br>&nbsp;<a href=\"$item[link]\">More...</a><br>\n";
		echo "<br>\n";
	}
?>
</body>
</html>