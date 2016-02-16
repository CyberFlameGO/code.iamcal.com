WHAT IS THIS CRAP?
------------------

This extension lets you create yearly archives for your MT blog, and 
who doesn't want to do that, huh?

It does involve editing files, because the plugin interface doesn't 
cover this sort of stuff yet, so be prepared to restore from backup 
incase you make a mistake.



USING THIS EXTENSION
--------------------

1. Make a backup of everything in the 'lib' and 'tmpl' folders.

2. Follow the patching steps in patch.txt

3. Upload the patched files to your server

4. Create a yearly template

 * Go to your weblog's config page, and choose 'Archive Files' from 
   the subnav
 * In the 'Create A New Template/Archive Type Association' create a 
   new 'Yearly' archive using the Date-Based template (you can 
   customise this later)
 * After creating it, it will appear in the table at the bottom of 
   the page - check the checkbox next to 'Yearly' then click 'Save'

5. Add yearly archive links to your main index. This is just like 
   other archives, e.g:

<!-- //////////////////////////////////////////////// -->
<h2>Yearly Archives</h2>

<ul>
<MTArchiveList archive_type="Yearly">
<li><a href="<$MTArchiveLink$>"><$MTArchiveTitle$></a></li>
</MTArchiveList>
</ul>
<!-- //////////////////////////////////////////////// -->

6. Republish your site

7. PROFIT!



WHO WROTE THIS?
---------------

I did. Cal Henderson, <cal@iamcal.com>

You can always get the latest copy from http://code.iamcal.com/
