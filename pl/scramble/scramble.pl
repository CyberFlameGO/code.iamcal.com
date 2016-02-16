#!/usr/bin/perl -w

use strict;
use CGI;

my $query = new CGI;
my $str = $query->param('str');

print "Content-type: text/html\n\n";

print q|
<form action="scramble.pl" method="post">
<textarea name="str" wrap="virtual" cols="40" rows="8">|;

&scramble2($str);

print q|</textarea><br>
<input type="submit" value="Scramble">
</form>

|;


############################################################

sub scramble2{ 
	$_=$_[0];s/(\w)(\w+)(\w)/$1.(join'',sort{rand>0.5?1:-1}split\/\/,$2).$3/eg;print; 
}

############################################################

0;