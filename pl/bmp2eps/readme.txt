WHAT IS THIS?
-------------

The perl script converts bitmap images into encapsualted postscript
images. Each pixel in the bitmap becomes a square path, 1pt x 1pt, in
the eps. White pixels are ignored.

What good is it? If you have "pixel art" that you need to scale up or
supply in vector form (to be printed, etc) then this is a MUCH quicker
alternative to redrawing it in illustrator. For designing bitmap 
fonts, you can first design in photoshop, convert to eps then import
directlty into fontographer. magic.


WHAT ELSE IS REQUIRED?
----------------------

You'll need a copy of perl. All good unix systems have this already.
If you're using windows, then you can download active perl from 
http://www.activestate.com.

Once you have perl, you'll need the module "Postscript::Simple". To
install this from the command prompt type:

  perl -MCPAN -e shell

then type:

  install PostScript::Simple

once it's all done, type "exit" to get out of the CPAN shell.


HOW TO USE IT
-------------

Under unix (or from the windows command prompt) the syntax is:

   perl bmp2eps.pl name_of_bitmap.bmp


bmp2eps.bat is simply bmp2eps.pl in a batch wrapper - under windows 
this means you can drag a bitmap file on the batch file and it'll run 
automatically.


THINGS TO NOTE
--------------

* Only 24 bit bitmaps are supported
* Only uncompressed bitmaps are supported
* White pixels are ignored
* Large images will take a LONG time to process - this is designed
  to be suitable for small pixelated images


