<html>
<head>
<title>IMAP Folders</title>
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

pre {
	background-color: #eee;
	border: 1px solid #ccc;
	padding: 1em;
}

</style>
</head>
<body>

<? include('/var/www/cal/iamcal.com/templates/universal_nav.txt'); ?>

<div id="main">

<h1>IMAP Folders</h1>

<p>
	A <a href="http://www.iamcal.com/">Cal Henderson</a> Thingy<br />
	April 13th, 2010
</p>


<h2>The problem</h2>

<p>I host my email at <a href="http://www.tuffmail.com/">Tuffmail</a>, who are pretty awesome. Not having to worry about backups and spam and so on is quite lovely. If you use GMail, good for you - I like folders and have a very large mail archive that goes back over 10 years, so GMail is not for me.</p>

<p>One issue is that Tuffmail uses IMAP quotas to limit your inbox size. This is perfectly reasonable, but with many folders, it's hard to know where your quota is being used. So in steps Perl.</p>

<h2>My Solution</h2>

<p>After installing the excellent <a href="http://search.cpan.org/~plobbes/Mail-IMAPClient/">Mail::IMAPClient</a>, I whipped up this quick script:</p>

<pre>
#!/usr/bin/perl

use Mail::IMAPClient;

my $imap = Mail::IMAPClient->new(
	Server   => 'mail.mxes.net',
	User     => '**********',
	Password => '**********',
	Ssl      => 0,
	Uid      => 1,
);

my $folders = $imap->folders or die "Failed to get folders\n";
my $sizes = {};

foreach my $folder (@{$folders}){
	$imap->examine($folder) or next;

	$sizes->{$folder} = 0;

	my $hash = $imap->fetch_hash("RFC822.SIZE");
	foreach my $msg (keys %{$hash}){
		$sizes->{$folder} += $hash->{$msg}->{'RFC822.SIZE'};
	}
}

my @keys = sort { $sizes->{$b} <=> $sizes->{$a} } @{$folders};

print "Only showing folders over 1MB:\n";

for my $folder (@keys){

	my $size = $sizes->{$folder};
	if ($sizes->{$folder} > 1024){ $size = int($sizes->{$folder} / 1024) . "KB"; }
	if ($sizes->{$folder} > 1024 * 1024){
		$size = int($sizes->{$folder} / (1024 * 1024)) . "MB";
	}

	next unless $size =~ /MB/;

	print "$size\t$folder\n";
}
</pre>

<p>After adding in my own account details, running it gives what I need:</p>

<pre>
[cal@mt1 ~]# perl imap_folders.pl
Only showing folders over 1MB:
127MB   INBOX
108MB   lists/tinyspeck
71MB    lists/tinyspeck/svn
20MB    lists/tinyspeck/jobs
15MB    lists/colourlovers
11MB    lists/everyone
10MB    lists/jobs
9MB     lists/b4ta
5MB     friends/dnd
5MB     friends
4MB     ecom
4MB     Sent
4MB     lists/software
3MB     ecom/travel
3MB     lists/hackers
2MB     lists/houses-bridgeview
2MB     lists/oembed
1MB     lists/conferences
1MB     lists/tax
1MB     Discard
1MB     Sent Items
1MB     lists/books
</pre>

<p>There's some cruft in the code, but it's short and simple enough to easily refactor. Hope you find it useful.</p>


<h2>Credits</h2>

<p>Written by Cal Henderson, inspired by a post in some Java forum somewhere.</p>


</div>

<? include('/var/www/cal/iamcal.com/templates/universal_tracker.txt'); ?>

</body>
</html>