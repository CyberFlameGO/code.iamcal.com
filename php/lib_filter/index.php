<?
	$title = 'lib_filter';
	$width = 800;
	include('../../head.txt');
?>

<h1>lib_filter - An HTML filtering library in PHP</h1>

<p>By <a href="http://www.iamcal.com/">Cal Henderson</a></p>

<p>
	This PHP library allows you to accept HTML input from your users, filter it to make sure it
	contains only an allowed set of tags, attributes and values and then display it without leaving
	yourself open to XSS holes.
</p>

<p>
	You can read about the basis of this code in
	<a href="http://www.iamcal.com/publish/articles/php/processing_html/">PHP : Processing HTML</a> and again in
	<a href="http://www.iamcal.com/publish/articles/php/processing_html_part_2/">part 2</a>.
</p>

<ul>
	<li> <a href="https://github.com/iamcal/lib_filter/zipball/master">Latest ZIP</a> </li>
	<li> <a href="https://github.com/iamcal/lib_filter">Git repsitory</a> </li>
	<li> <a href="https://github.com/iamcal/lib_filter/blob/master/lib_filter.php">Code Preview</a> </li>
	<li> <a href="clone/lib_filter_test.php">Test suite</a> </li>
</ul>


<?
	include('../../foot.txt');
?>
