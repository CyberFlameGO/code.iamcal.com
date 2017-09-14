<?
	$title = 'Git Cheatsheet';
	#$width = 900;
	include('../../head.txt');
?>

<h1>Git Cheatsheet</h1>

<h2>Submodules</h2>

<p>To update the ref of a submodule:</p>

<pre>
cd submodule_dir
git pull
cd ..
git commit submodule_dir
git push
</pre>

<p>To update downstream checkouts once that's been pushed:<p>

<pre>
???
git submodule sync
git submodule init
git submodule update
</pre>

<? include('../../foot.txt'); ?>
