#!/usr/bin/perl -w

use PostScript::Simple;
use strict;

my $input_file = $ARGV[0] || "test.bmp";

###################################################

my $buffer = '';

open(F, $input_file) or die $!;
binmode(F);
while(my $temp = <F>){$buffer .= $temp;}
close(F);

# read header
# 0  2  UINT    bfType;
# 2  4  DWORD   bfSize;
# 6  2  UINT    bfReserved1;
# 8  2  UINT    bfReserved2;
# 10 4  DWORD   bfOffBits;

my $header = substr($buffer, 0, 14);
$buffer = substr($buffer, 14);

# read info
# 0  4  DWORD   biSize;
# 4  4  LONG    biWidth;
# 8  4  LONG    biHeight;
# 12 2  WORD    biPlanes;
# 14 2  WORD    biBitCount;
# 16 4  DWORD   biCompression;
# 20 4  DWORD   biSizeImage;
# 24 4  LONG    biXPelsPerMeter;
# 28 4  LONG    biYPelsPerMeter;
# 32 4  DWORD   biClrUsed;
# 36 4  DWORD   biClrImportant;

my $info = substr($buffer, 0, 40);
my $bits = substr($buffer, 40);

my ($bitcount) = unpack('v', substr($info, 14, 2));
my ($compress) = unpack('i', substr($info, 16, 4));
my ($size_x) = unpack('i', substr($info, 4, 4));
my ($size_y) = unpack('i', substr($info, 8, 4));

unless ($bitcount == 24){
	die "can only operate on 24 bit bitmaps (this is $bitcount bit)";
}
unless ($compress == 0){
	die "can only operate on uncompressed bitmaps";
}

####################################################

my $p = new PostScript::Simple(
		units => 'pt',
		xsize => $size_x,
		ysize => $size_y,		
		colour => 1,
		eps => 1,
	);

####################################################

my $line_shift = $size_x * 3;
$line_shift += ($size_x % 4);

for my $y(0..$size_y-1){
	for my $x(0..$size_x-1){

		my $offset = ($x * 3) + ($y * $line_shift);
		my $b = ord(substr($bits, $offset+0, 1));
		my $g = ord(substr($bits, $offset+1, 1));
		my $r = ord(substr($bits, $offset+2, 1));

		unless (($r == 255) && ($g == 255) && ($b == 255)){

			$p->setcolour($r, $g, $b);
			$p->box({filled => 1}, $x, $y, $x+1, $y+1);
			#print "$r, $g, $b, $x, $y\n";
		}
	}
}

####################################################

$input_file =~ s/\.bmp/\.eps/i;
$p->output($input_file);

print "done!";