<?
	$nav = 'code';
	include('/var/www/cal/iamcal.com/templates/universal_nav.txt');
?>
<style>

body {
	text-align: center;
	margin: 0;
	padding: 0;
	background-color: #f5f5f5;
}

#main {
	width: 800px;
	margin: 0 auto;
	text-align: left;
	padding: 1em 1em 5em 1em;
	border-left: 1px solid #999;
	border-right: 1px solid #999;
	background-color: #fff;
	font-family: Helvetica, Arial, sans-serif;
}

</style>
<div id="main">

<h1>Index of <?=HtmlSpecialChars($_SERVER['REQUEST_URI'])?></h1>
