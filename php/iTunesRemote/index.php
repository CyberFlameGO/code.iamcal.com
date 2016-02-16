<html>
<head>
<title>iTunes Remote</title>
<style>

body {
	text-align: center;
	margin: 0;
	padding: 0;
	background-color: #f1f1ff;
}

#main {
	width: 740px;
	margin: 0 auto;
	text-align: left;
	padding: 1em 1em 3em 1em;
	border-left: 1px solid #99c;
	border-right: 1px solid #99c;
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

<h1>iTunes Remote</h1>

<p>
	A <a href="http://www.iamcal.com/">Cal Henderson</a> Project<br />
	Started May 13th, 2009
</p>

<h2>Screenshot</h2>

<img src="screen1.jpg" width="730" height="495" />


<h2>What Is It?</h2>

<p>iTunesRemote is a simple web interface that allows you to control iTunes over the web. The setup looks something like this:</p>

<ul>
	<li> You have a Mac running iTunes (called the host machine), which contains all of your music and has speakers connected (or remote speakers via AirTunes) </li>
	<li> You have other computers on the same network, which you want to use to control iTunes on the host machine.</li>
</ul>

<p>I use this software to remote-control iTunes on my media server, which is connected to speakers around my house. It acts much like the Apple 'Remote' app for the iPhone, but runs in a browser (and is much less flakey). Multiple people can use it at once (and much hilarity ensues).</p>

<p>The application will only run on a Mac (It uses AppleScript to communicate with iTunes) and is written in PHP. OSX comes with Apache and PHP (required), but will require a little configuration.</p>


<h2>Features</h2>

<ul>
	<li>Play, Pause, Next, Previous</li>
	<li>Volume control</li>
	<li>Title, Artist &amp; Album display</li>
	<li>Time elapsed/remaining</li>
	<li>Time scrub bar</li>
	<li>Search</li>
	<li>Artwork display</li>
	<li>Partial track listing (works on large 25k+ libraries)</li>
	<li>Progress indicators</li>
	<li>Probably other things</li>
</ul>


<h2>Get a copy</h2>

<p>iTunes Remote is being actively developed and has not had a formal release.</p>

<p>You can get the latest version of it from my public Git repository here:</p>

<p><a href="https://github.com/iamcal/iTunesRemote">https://github.com/iamcal/iTunesRemote</a></p>


<h2>Credits</h2>

<p>While all code has been (so far) written by Cal Henderson, the project was inspired by <a href="http://www.whatsmyip.org/itunesremote/">this article</a>, which suggested AppleScript. If you want to remake this for Windows, there's a Python library for talking to iTunes via COM.</p>

<p>Oh, and all the design is taken from Apple's iTunes, of course.</p>

</div>

<? include('/var/www/cal/iamcal.com/templates/universal_tracker.txt'); ?>

</body>
</html>