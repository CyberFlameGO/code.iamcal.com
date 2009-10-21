<?
	$title = 'Emoji for PHP';
	$width = 800;
	include('../../head.txt');
?>

<h1>Emoji for PHP</h1>

<p>This library allows the handling and conversion of Emoji in PHP.</p>

<p>You can <a href="emoji_r1.zip">download the latest release</a> (r1) which contains a helpful readme file.</p>

<p>If you want the bleeding edge, it's also in my <a href="https://svn.iamcal.com/public/php/emoji/trunk/">public SVN repo</a>.</p>


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

<?
	include('../../foot.txt');
?>
