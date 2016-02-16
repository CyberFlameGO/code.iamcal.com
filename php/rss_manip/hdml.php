<?
	require_once "config.txt";
	require_once "XML/RSS.php";

	# grab the RSS
	$rss =& new XML_RSS($url);
	$rss->parse();

	header("Content-type: text/x-hdml");

	echo "<?xml version=\"1.0\"?>\n";
?>
<HDML VERSION="3.0" PUBLIC="TRUE"> 
<DISPLAY NAME="headlines">
Headlines:<BR>
<?
	$cardnumber = 1;
	$accesskey = 0;
	foreach($rss->getItems() as $item){
		$cardnumber++;
		$accesskey++;
		echo "<LINE><A TASK=GO DEST=#card$cardnumber LABEL=\"Go\" ACCESSKEY=$accesskey>$item[title]</A>\n";
	}
?>
</DISPLAY>
<?
	$cardnumber = 1;
	foreach($rss->getItems() as $item){
		$cardnumber++;
		echo"<DISPLAY NAME=\"card$cardnumber\">$item[description]</DISPLAY>\n";
	}
?>
</HDML>
