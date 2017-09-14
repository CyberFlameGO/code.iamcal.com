<?
	$title = 'Emoji for PHP';
	$width = 800;
	include('../../head.txt');
?>

<h1>Emoji for PHP</h1>

<p>This library allows the handling and conversion of Emoji in PHP.</p>

<p>For background, you might want to <a href="http://www.iamcal.com/emoji-in-web-apps/">read this</a> first.</p>

<p>You can <a href="https://github.com/iamcal/php-emoji/archive/master.zip">download a zipfile</a> of the latest code,
	which contains a helpful readme file.</p>

<p>If you want to browse the code, it's in a <a href="https://github.com/iamcal/php-emoji">public GitHub repo</a>.</p>


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
</pre>

<?
	include('../../foot.txt');
?>
