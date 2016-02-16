<?
	require_once "config.txt";
	require_once "XML/RSS.php";

	# grab the RSS
	$rss =& new XML_RSS($url);
	$rss->parse();

	header("Content-type: text/vnd.wap.wml");

	echo "<?xml version=\"1.0\"?>\n";
?>

<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml"> 
<wml>
	<card title="Card1" id="Main" newcontext="false" ordered="true">
		<p align="center">
			<strong>Headlines</strong>
		</p>
		<p align="left">
<?
	$cardnumber = 1;
	foreach ($rss->getItems() as $item) {
		$cardnumber++;
		echo "<a href=\"#Card$cardnumber\">$item[title]</a><br/>\n";
	}
?>
		</p>
	</card>
<?
	$cardnumber = 1;
	$accesskey = 0;
	foreach ($rss->getItems($item[description]) as $item) {
		$cardnumber++;
?>
	<card id="Card<?=$cardnumber?>" title="<?=$cardnumber?>">
		<p align="left">
			<?=$item[description]?><br/>
			<anchor title="Ok">OK<go href="#Main" method="get" sendreferer="false"/></anchor>
		</p>
	</card>
<?
	}
?>
</wml>