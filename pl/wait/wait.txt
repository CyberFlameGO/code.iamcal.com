#!/usr/bin/perl -w
use strict;
use CGI;

my $query = new CGI;

print "Content-Type: text/html\n\n";

my $time = time();
my $time_dec = "$time";
my $time_oct = sprintf('%o',$time);

if ($query->param('debug')){
	$time_dec = '>+++++++++[<++++++++>-]<++.>++++++[<++++++++>-]<-----.--.+.>++++++++[<---------->-]<----.>+++++++++[<+++++++>-]<++.>++++[<+++>-]<+.+.+++++.>++++[<--->-]<.---.>++++[<+++>-]<+.[-]>++++++++[<++++>-]<.>+++++++[<+++++++>-]<-.>+++++++[<+++>-]<.+++++++++++++.------.[-]>++++++[<++++++>-]<----.>++++++[<+++++++>-]<--.>++++++[<++++>-]<+.++.++++++++.>++[<--->-]<.+++++++++++++.[-]++++++++++.';
}

if ($query->param('prog')){
	$time_dec = $query->param('prog');
	$time_oct = sprintf('%o',$time_dec);
}

my $p_dec = &translate_prog($time_dec);
my $p_oct = &translate_prog($time_oct);

my $p_dec_bal = &balance($p_dec);
my $p_oct_bal = &balance($p_oct);

my ($out_dec, $perl_dec, $errors_dec) = &bf_run($p_dec_bal);
my ($out_oct, $perl_oct, $errors_oct) = &bf_run($p_oct_bal);
my $out_dec_coded = &encode($out_dec);
my $out_oct_coded = &encode($out_oct);

$perl_dec = ($query->param('showperl'))?"<b>perl:</b> $perl_dec<br>":'';
$perl_oct = ($query->param('showperl'))?"<b>perl:</b> $perl_oct<br>":'';

print qq|
<html>
<head>
<title>bf-wait</title>
<style>

body {
	background-color: #ffffff;
	color: #000000;
	font-family: Courier New, Courier;
	font-size: 13px;
}

</style>
</head>
<body>

<h1>bf-wait</h1>
<b>time:</b> $time_dec<br>
<b>program:</b> $p_dec<br>
<b>program (balanced):</b> $p_dec_bal<br>
$perl_dec
<b>output:</b> $out_dec<br>
<b>coded output:</b> $out_dec_coded<br>
<b>errors:</b> $errors_dec<br>
<br>
<b>octal time:</b> $time_oct<br>
<b>program:</b> $p_oct<br>
<b>program (balanced):</b> $p_oct_bal<br>
$perl_oct
<b>output:</b> $out_oct<br>
<b>coded output:</b> $out_oct_coded<br>
<b>errors:</b> $errors_oct<br>

</body>
</html>
|;

sub balance{
	($_) = @_;

	my $x = () = $_ =~ /\[/g;
	my $y = () = $_ =~ /\]/g;

	if ($x>$y){$_ .= ']' x ($x-$y);}
	if ($x<$y){$_ = ('[' x ($y-$x)).$_;}

	return $_;
}

sub bf_run{

	my ($in) = @_;

	my $store_size = 30000;
	my ($buffer,$p,@m,$prog,$d,@dc, $errors);

	$m[$_] = 0 for(0..$store_size-1);
	$p = 0;
	$d = 0;

	for my $char(split //,$in){
		if ($char eq '+'){
			$prog .= '$m[$p]++;'."\n";
			$prog .= 'if ($m[$p]==256){$m[$p]=0;}'."\n";
		}
		if ($char eq '-'){
			$prog .= '$m[$p]--;'."\n";
			$prog .= 'if ($m[$p]==-1){$m[$p]=255;}'."\n";
		}
		if ($char eq '>'){
			$prog .= '$p++;'."\n";
			$prog .= 'if ($p==$store_size){$m[$p]=0;}'."\n";
		}
		if ($char eq '<'){
			$prog .= '$p--;'."\n";
			$prog .= 'if ($p==-1){$m[$p]=$store_size-1;}'."\n";
		}
		if ($char eq '['){
			$prog .= '$d++;'."\n";
			#$prog .= '$dc[$d]=0;'."\n";
			$prog .= 'while($m[$p] && $dc[$d]<$store_size){'."\n";
		}
		if ($char eq ']'){
			$prog .= '$dc[$d]++;'."\n";
			$prog .= '}'."\n";
			$prog .= 'if($dc[$d]>=$store_size){$errors.="loop limit reached - exiting...<br>";return;}'."\n";
			$prog .= '$d--;'."\n";
		}
		if ($char eq '.'){
			$prog .= '$buffer .= chr($m[$p]);'."\n";
			#$prog .= '$buffer.= chr($m[$p])." ($m[$p])";'."\n";
			#$prog .= '$buffer.= $m[$p];'."\n";
		}
	}

	eval $prog;

	$prog =~ s/\n/<br>\n/g;

	return ($buffer,$prog,$errors);
}

sub encode{
	($_) = @_;
	my ($out,@out);
	for(split//){
		push(@out,sprintf("x%.2x",ord));
	}
	return join(' ',@out);
}

sub translate_prog{
	($_) = @_;
	s/0/]/g;
	s/1/[/g;
	s/2/+/g;
	s/3/-/g;
	s/4/>/g;
	s/5/</g;
	s/6/./g;
	s/7//g;
	s/8//g;
	s/9//g;
	return $_;
}