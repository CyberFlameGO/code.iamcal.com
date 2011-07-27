<?
	$title = 'Emoji for PHP';
	$width = 800;
	include('../../head.txt');
?>

<h1>Emoji for PHP</h1>

<p>This library allows the handling and conversion of Emoji in PHP.</p>

<p>You can <a href="https://github.com/iamcal/php-emoji/zipball/r3">download the latest release</a> (r3) which contains a helpful readme file.</p>

<p>If you want the bleeding edge, it's also in my <a href="https://github.com/iamcal/php-emoji">public GitHub repo</a>.</p>


<h2>Example</h2>

<pre>
&lt;?php
	include('emoji.php');


	# browser sniffing tells us that a docomo phone
	# submitted this text

	$clean_text = emoji_docomo_to_unified($_POST[message]);


	...


	# now we want to show it in a desktop browser

	$html = emoji_unified_to_html($clean_text);
?&gt;
</pre>


<h2>WTF is this crap?</h2>

<p>Ahh, young grasshopper. You might want to <a href="http://www.iamcal.com/emoji-in-web-apps/">read this</a> first.</p>


<style>

pre {

	border: 1px solid #666;

	background-color: #EEE;

	padding: 10px;

}

table {
    -webkit-border-radius: 0.41em;
    -moz-border-radius: 0.41em;
    border: 1px solid #999;
    font-size: 12px;
    width: 100%;
}

table td {
    padding-left: 0.41em;
    padding-right: 0.41em;
}

table th {
    font-weight: bold;
    text-align: left;
    background: #BBB;
    color: #333;
    font-size: 14px;
    padding: 0.41em;
}

table tbody tr:nth-child(even) {
    background: #dedede;
}

table tbody td {
    padding: 0.41em;
}

<? include('inc_css.txt'); ?>

</style>

<h2>Full Emoji Catalog</h2>

<? include('inc_table.txt'); ?>

<?
	include('../../foot.txt');
?>
