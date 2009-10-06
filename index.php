<?
	function folder_updated($folder){
		$path = "/var/www/cal/code.iamcal.com".$folder;
		$files = array();

		if ($dh = opendir($path)){
			while (false !== ($file = readdir($dh))){
				if (is_file($path.$file)){
					$files[] = $path.$file;
				}
			}
			closedir($dh);
		}

		$times = array();
		foreach ($files as $file){
			$stat = stat($file);
			$times[$file] = $stat[mtime];
		}

		$last_update = max($times);
		$ago = time() - $last_update;

		if ($ago < 24 * 60 * 60){
			return "(updated today)";
		}
		if ($ago > 365 * 24 * 60 * 60){
			return "";
		}

		return "(updated ".date("Y-m-d", $last_update).")";
	}
?>
<html>
<head>
<title>Cal's Code Stuff</title>
<style>

body {
	text-align: center;
	margin: 0;
	padding: 0;
	background-color: #f5f5f5;
}

#main {
	width: 740px;
	margin: 0 auto;
	text-align: left;
	padding: 1em 1em 5em 1em;
	border-left: 1px solid #999;
	border-right: 1px solid #999;
	background-color: #fff;
	font-family: Helvetica, Arial, sans-serif;
}

h1 {
	margin-top: 0;
}

</style>
</head>
<body>

<? include('/var/www/cal/iamcal.com/templates/universal_nav.txt'); ?>

<div id="main">

<h1>Cal's Code Stuff</h1>

This is a random collection of snippets, small tools and libraries.<br />
Various stuff is in my <a href="http://svn.iamcal.com/public/">public SVN repository</a>, which also has a <a href="http://trac.iamcal.com/public/">trac instance</a>.<br />
Old desktop software projects are <a href="http://software.iamcal.com/">here</a>, but somewhat neglected.<br />
In the distant past I wrote a <a href="http://www.iamcal.com/publish/">few articles</a> which may be of interest.<br />
I created some <a href="http://www.iamcal.com/misc/fonts/">pixel fonts</a> which you might find useful.<br />
<br />

<hr />

<h2>Things of note</h2>

<ul>
	<li> <a href="http://code.iamcal.com/docs/mysql/">MySQL Data Types</a> </li>
	<li> <a href="http://code.iamcal.com/php/lib_filter/">lib_filter - An HTML filtering library in PHP</a> </li>
	<li> <a href="http://code.iamcal.com/php/rfc822/">RFC 822/2822/3696 Email address parser in PHP</a> </li>
	<li> <a href="http://code.iamcal.com/pl/modules/">All of my perl modules</a> (<a href="http://search.cpan.org/~iamcal/">on CPAN</a>) </li>
	<li> <a href="http://code.iamcal.com/php/flickr/">PEAR::Flickr_API - A PHP/PEAR Interface for the Flickr API</a> </li>
	<li> <a href="http://code.iamcal.com/c/cal_amp/">Cal Amp - A WinAmp plugin and website that basically did the same as AudioScrobbler / Last.fm</a> </li>
	<li> <a href="http://code.iamcal.com/php/fileman/">Fileman - a PHP based file management application</a> </li>
	<li> <a href="http://code.iamcal.com/php/iTunesRemote/">iTunesRemote - Web based remote control for iTunes</a> </li>
	<li> <a href="http://www.iamcal.com/misc/bf_debug/">A browser-based interactive debugger for the programming language Brainfuck</a> </li>
	<li> <a href="http://code.iamcal.com/php/lib_oauth/">lib_oauth - A very simple OAuth library for PHP4</a> </li>
</ul>

<hr />

<h2>Absolutely Everything</h2>

<ul>
	<li> <a href="/asm/">Assembler</a>
	<ul>
		<li> <a href="/asm/metronome/">Metronome</a>
	</ul>

	<li> <a href="/asp/">ASP (Active Server Pages)</a>
	<ul>
		<li> <a href="/asp/counter/">Simple counter</a>
	</ul>

	<li> <a href="/c/">C / C++</a>
	<ul>
		<li> <a href="/c/calculator/">Lex/Yacc Calculator Demo</a>
		<li> <a href="/c/misc/">Misc Snippets</a>
		<li> <a href="/c/animated_drag_rect/">Animated Drag Rectangles</a>
		<li> <a href="/c/cal_amp/">Cal Amp - WinAmp plugin and webapp for recording listening habits</a>
	</ul>

	<li> <a href="/css/">CSS</a>

	<li> <a href="/docs/">Documentation</a>
	<ul>
		<li> <a href="/docs/mysql/">MySQL data types</a>
		<li> <a href="/docs/entities/">HTML 4 Character Entities</a>
	</ul>

	<li> <a href="/java/">Java</a>
	<ul>
		<li> <a href="/java/MScResults/">A simple piece of homework</a>
	</ul>

	<li> <a href="/js/">Javascript</a>
	<ul>
		<li> <a href="/js/amazon_lib/">Amazon library</a>
		<li> <a href="/js/google_highlighter/">Google highlighter</a>
		<li> <a href="/js/jscommerce/">Javascript E-Commerce</a>
		<li> <a href="/js/scheme_switcher/">CSS scheme switcher</a>
		<li> <a href="/js/unicode/">Unicode tools</a>
	</ul>

	<li> <a href="/mirc/">mIRC Script</a>
	<ul>
		<li> <a href="/mirc/connection_manager/">Connection manager</a>
	</ul>

	<li> <a href="/moz/">Mozilla / XULRunner</a>


	<li> <a href="/parrot/">Parrot</a>
	<ul>
		<li> <a href="/parrot/sha1.imc">SHA1 in IMCC</a>
	</ul>

	<li> <a href="/php/">PHP</a>
	<ul>
		<li> <a href="/php/atom/">Atom Parser</a>
		<li> <a href="/php/basic_app/">Basic application structure</a>
		<li> <a href="/php/binary_convertor/">Binary convertor</a>
		<li> <a href="/php/double_posting/">Double posting protection</a>
		<li> <a href="/php/easter/">Easter calculator</a>
		<li> <a href="/php/fileman/">File management app</a>
		<li> <a href="/php/file_upload/">Simple file uploader</a>
		<li> <a href="/php/flickr/">Flickr API interface</a>
		<li> <a href="/php/grim_crypt/">Grimcrypt cracker</a>
		<li> <a href="/php/http/">HTTP client library</a>
		<li> <a href="/php/lib/">Common Admin Library</a>
		<li> <a href="/php/lib_filter/">A HTML filtering library</a> <?=folder_updated('/php/lib_filter/')?>
		<li> <a href="/php/morse/">Morse code convertor</a>
		<li> <a href="/php/porter_stemmer/">Porter Stemming Algorithm in PHP</a>
		<li> <a href="/php/pre_tags/">Pre tag escaper</a>
		<li> <a href="/php/rfc822/">RFC 822 / 2822 Address Parser</a> <?=folder_updated('/php/rfc822/')?>
		<li> <a href="/php/rss_manip/readme.htm">RSS Manip PHP</a>
		<li> <a href="/php/smarty/">Smarty Plugins</a>
		<li> <a href="/php/sorter/">Custom sorting demo</a>
		<li> <a href="/php/subscribe/">Automated Subscriber</a>
		<li> <a href="/php/utf8_mail/">Sending UTF-8 Mail</a>
		<li> <a href="/php/uuencode/">uuencoded decoder</a>
		<li> <a href="/php/iTunesRemote/">iTunesRemote</a> <?=folder_updated('/php/iTunesRemote/')?>
		<li> <a href="/php/lib_oauth/">PHP 4 OAuth library</a> <?=folder_updated('/php/lib_oauth/')?>
	</ul>

	<li> <a href="/pl/">Perl</a>
	<ul>
		<li> <a href="/pl/modules/"><b>My perl modules</b></a> <?=folder_updated('/pl/modules/')?>
		<li> <a href="/pl/allura/">Allura code tools</a>
		<li> <a href="/pl/bmp2eps/">bmp2eps convertor</a>
		<li> <a href="/pl/brainfuck_interpreter/">A brainfuck interpreter</a>
		<li> <a href="/pl/find/">Free text search for windows</a>
		<li> <a href="/pl/fruit_ratios/">The fruit ratios problem</a>
		<li> <a href="/pl/mt3/">MovableType 3 Plugins</a>
		<ul>
			<li> <a href="/pl/mt3/audioscrobbler/">Audioscrobbler</a>
			<li> <a href="/pl/mt3/dashify/">Dashify</a>
			<li> <a href="/pl/mt3/tags/">Tags</a>
			<li> <a href="/pl/mt3/yearly/">Yearly Archives</a>
		</ul>
		<li> <a href="/pl/pi/">PI Calculator</a>
		<li> <a href="/pl/plasticgame/">The plastic game</a>
		<li> <a href="/pl/rtf/">RTF Tokeniser</a>
		<li> <a href="/pl/scramble/">Word Scrambler</a>
		<li> <a href="/pl/sieve_admin/">CMU Sieve admin tool</a>
	</ul>

	<li> <a href="/ruby/">Ruby</a>
	<ul>
		<li> <a href="/ruby/forum_001.zip">Forum software</a>
	</ul>

	<li> <a href="/unix/">UNIX</a>

	<li> <a href="/vb/">Visual Basic</a>
</ul>

<hr />

<h2>Copyright</h2>

<p>Everything here was written by <a href="http://www.iamcal.com/">Cal Henderson</a> between around 1994 and now. Others are credited where appropriate.</p>
<p>Unless otherwise noted, all code on this site is licensed under a <a href="http://creativecommons.org/licenses/by-sa/2.5/">Creative Commons Attribution-ShareAlike 2.5 License</a>.</p>


</div>

<? include('/var/www/cal/iamcal.com/templates/universal_tracker.txt'); ?>

</body>
</html>
