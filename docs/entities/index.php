<html>
<head>
<title>HTML4 Entities</title>
<style>

body {
	backgound-color: #ffffff;
	color: #000000;
	font-family: arial;
	margin: 0;
}

#page {
	margin: 8px;
}

td {
	color: #000000;
	font-family: arial;
}

</style>
</head>
<body>

<? include('/var/www/cal/iamcal.com/templates/universal_nav.txt'); ?>

<div id="page">

<h1>HTML 4 Character Entities</h1>

<a href="data.txt">Source</a><br>
<br>

<table border="0" cellpadding="3" cellspacing="2" width="600">
	<tr valign="top" bgcolor="#cccccc">
		<td><b>Preview</b></td>
		<td><b>Entity</b></td>
		<td><b>Numeric</b></td>
		<td><b>Description</b></td>
		<td><b>Codepoint</b></td>
	</tr>
<?

	$lines = file('data.txt');

	while(count($lines)){
		$line = trim(array_shift($lines));
		while (!strstr($line, '-->')){
			$line .= " ".trim(array_shift($lines));
		}
		if (preg_match("/^<!ENTITY/", $line)){
			# entity
			if (preg_match("/<!ENTITY\s*([a-z0-9A-Z]+)\s*CDATA\s*\"&#(\d+);\"\s*--\s*(.*?),\s*U\+([0-9a-fA-F]+)/", $line, $matches)){
?>
	<tr valign="top" bgcolor="#dddddd">
		<td align="center">&<?=$matches[1]?>;</td>
		<td>&amp;<?=$matches[1]?>;</td>
		<td>&amp;#<?=$matches[2]?>;</td>
		<td><?=$matches[3]?></td>
		<td>U+<?=$matches[4]?></td>
	</tr>
<?
			}else{
?>
	<tr valign="top" bgcolor="#eeeeee">
		<td colspan="5">entity match failed: <?=htmlentities($line)?></td>
	</tr>
<?
			}
		}else{
			# comment
			if (preg_match("/<!--(.*)-->/", $line, $matches)){
				$comment = trim($matches[1]);
				$comment_sort = trim($matches[1]);
				if (preg_match("/^ISO(.*)$/", $comment, $matches)){ $comment_sort = $matches[1]; }
				if (preg_match("/^[A-Z]/", $comment_sort)){
?>
	<tr valign="top" bgcolor="#cccccc">
		<td colspan="5"><b><?=$comment?></b></td>
	</tr>
<?
				}else{
?>
	<tr valign="top" bgcolor="#eeeeee">
		<td colspan="5"><i><?=$comment?></i></td>
	</tr>
<?
				}
			}
		}
	}

?>
</table>

</div>

<? include('/var/www/cal/iamcal.com/templates/universal_tracker.txt'); ?>

</body>
</html>