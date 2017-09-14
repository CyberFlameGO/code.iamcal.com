<html>
<head>
<title>Cal Amp</title>
<style>

body {
	background-color: #ffffff;
	color: #000000;
	font-family: arial, sans-serif;
	text-align: center;
	margin: 0;
}

#main {
	width: 740px;
	margin: 8px auto;
	text-align: left;
}

tr.heading {
	background-color: #dddddd;
}

tr.entry {
	background-color: #eeeeee;
}

.block {
	background-color: #eeeeee;
	padding: 1em;
	margin-bottom: 2em;
}

.block h2 {
	margin-top: 0;
}

.tblock {
	padding: 1em;
}

.tblock h1 {
	margin-top: 0;
}

</style>
</head>
<body>

<? include('/var/www/html/code.iamcal.com/shared/universal_nav.txt'); ?>

<div id="main">

<div class="tblock">

	<h1>Cal Amp</h1>

	<p>Created in late 2002, Cal Amp is a WinAmp 2 plugin which feeds tracks you're currently listening to, into a database, over the web.</p>

	<p>By collecting this data over time, interesting patterns can emerge. This software was written around the same time as Audio Scrobbler, the statistical engine which now powers <a href="http://last.fm">last.fm</a>. It was created independantly. It seems like the world was ready for something like this :)</p>

	<p>A screen-shot of the web site in action can be <a href="screen.png">seen here</a>.</p>

	<p>I've been using Last.fm since April 2004, when I switched to iTunes. My profile is <a href="http://www.last.fm/user/iamcal">here</a>.</p>
</div>

<div class="block">
	<h2>Download</h2>

	The entire source for Cal Amp can be found on GitHub, here:<br />
	<a href="https://github.com/iamcal/CalAmp">https://github.com/iamcal/CalAmp</a><br />
	<br />
	The latest tagged version of the plugin source itself is here:<br />
	<a href="http://iamcal-downloads.s3.amazonaws.com/software/cal_amp_1.02.zip">cal_amp_1.02.zip</a><br />
	<br />
	And the latest tagged version of the web logging and display code is here:<br />
	<a href="http://iamcal-downloads.s3.amazonaws.com/software/cal_amp_www_1.02.zip">cal_amp_www_1.02.zip</a><br />

</div>

<div class="block">
	<h2>Compile</h2>

	There are two things you need to set before you compile. Firstly, change the link target (unless, like me, you 	have winamp installed on drive G: in the usual folder). In Visual Studio 5, you do this by going to the "FileView" pane, right clicking on the project and selecting "Settings...". Then on the "Link" page, alter the value in the first editbox.<br>
	<br>
	The second thing you need to do is modify the url to your server. The default is set to "http://www.your-url.com/script.php" (line 46 of cal_amp.c) but you'll want to change it to whatever script you use to recieve the data.<br>
</div>

<div class="block">
	<h2>How It Works</h2>

	When a track starts playing, Cal Amp calls http://www.your-url.com/script.php?track-name-here<br>
	<br>
	When a track stops playing, pauses, or winamp is closed, Cal Amp calls http://www.your-url.com/script.php<br>
	<br>
	By responding to these two signals, you can easily enter track data into a database. The second signal can be ignored if you don't care about what's "currently playing", but by using it you can roughly determine if a track is still playing.<br>

	<br>
	A note of warning: If you disconnect from the Internet during use, winamp crashes, or your server goes down, the stop signal will not get sent. It's quite sensible to store the time when a track started, so that you can then check to see if it's been playing longer that a certain "timeout" period, after which you can assume it has been stopped.<br>
	<br>
	In my implementation, i don't log tracks that are played for less than 60 seconds, that way when i shuffle through tracks, they don't get logged.<br>
	<br>
	The rest, is up to you. Suggestions, bug reports and patches can go to <a href="mailto:cal@iamcal.com">cal@iamcal.com</a>
</div>

<div class="block">
	<h2>Known Issues</h2>

	The final stop call when shutting down doesn't usually work. This can probably be fixed by making it synchronous.
</div>

</div>

<? include('/var/www/html/code.iamcal.com/shared/universal_tracker.txt'); ?>

</body>
</html>
