Follow these steps, dummy!

1) Copy both of these files into your 'plugins' folder (inside your mt3
   folder).

2) CHMOD 755 for audioscrobbler.cgi

3) If your path to perl needed changing for the rest of movabletype
   (something other than /usr/bin/perl) then you'll need to change it at 
   the top of audioscrobbler.cgi too.

4) Add a tag into your template: <$MTAudioScrobbler username="foo"$>
   (where "foo" is your AudioScrobbler username).

5) Rebuild your weblog.

6) Profit!


----------------------------------------------------------------------
(C)2004 Cal Henderson, <cal@iamcal.com>
