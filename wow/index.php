<?
	$title = 'World of Warcraft';
	#$width = 900;
	include('../head.txt');
?>
<style>
dd { margin-bottom: 1em; }
</style>

<h1>World of Warcraft</h1>

<p>I'm quite a fan of <a href="http://www.worldofwarcraft.com/">World of Warcraft</a>, so as a result I have a few different projects related to it.</p>


<h2>Hunter Loot</h2>

<p>I created <a href="http://hunterloot.com">hunterloot.com</a> to help determine how useful any given piece of gear is to different hunter specs. It scrapes gear and enchant data from the armory and wowhead to create an index of each slot. It's a very useful quick index, but is not a replacement for the spreadsheet (it doesn;t take into account procs or set bonuses).</p>

<p>Hunter Loot can be used in conjunction with <a href="http://femaledwarf.com/">Female Dwarf</a> to determine stat weightings for your exact spec, gear and talents. Create a profile on Female Dwarf first, and then click through to Hunter Loot to get personalized, automatically updating gear recommendations.</p>

<p>As of June 2010, Hunter Loot gets around 25,000 visitors a month.</p>


<h2>Game Addons</h2>

<p>All of my addons can be automatically installed via the <a href="http://wow.curse.com/client">Curse Client</a>. That way you'll automatically get updates too.</p>

<dl>

	<dt>
		<b>Bunny Hunter</b>
		(<a href="http://wow.curse.com/downloads/wow-addons/details/bunny-hunter.aspx">curse</a>,
		<a href="http://wow.curseforge.com/addons/bunny-hunter/">curseforge</a>,
		<a href="https://svn.iamcal.com/public/wow/BunnyHunter/trunk/">svn</a>,
		<a href="http://github.com/iamcal/Bunny-Hunter">github</a>)
	</dt>
	<dd>
		Bunny Hunter tracks how many times you've looted mobs that drop rare pets, how long you've spent farming and shows you the chance that you should have gotten your pet by now.
		Supports (nearly) all the farmable pets and tracks multiple drops of each pet.
		Just start looting those Bloodsail Pirates! 
		1846 people have downloaded the latest version, as of June 18 2010.
	</dt>

	<dt>
		<b>Non Compos Mentis</b>
		(<a href="http://wow.curse.com/downloads/wow-addons/details/non-compos-mentis.aspx">curse</a>,
		<a href="http://wow.curseforge.com/addons/non-compos-mentis/">curseforge</a>,
		<a href="https://svn.iamcal.com/public/wow/NonComposMentis/trunk/">svn</a>,
		<a href="http://github.com/iamcal/Non-Compos-Mentis">github</a>)
	</dt>
	<dd>
		Are you working on Insane in the Membrane?
		This addon helps you track how many kills and quests you need to complete the various requirements.
		The Latin term "Non Compos Mentis" means "not of sound mind"; Because you'd have to be.
		120 people have downloaded the latest version, as of June 18 2010.
	</dt>

	<dt>
		<b>Auc-Searcher-Insane</b>
		(<a href="http://wow.curse.com/downloads/wow-addons/details/auc-searcher-insane.aspx">curse</a>,
		<a href="http://wow.curseforge.com/addons/auc-searcher-insane/">curseforge</a>,
		<a href="https://svn.iamcal.com/public/wow/Auc-Searcher-Insane/trunk/">svn</a>,
		<a href="http://github.com/iamcal/Auc-Searcher-Insane">github</a>)
	</dt>
	<dd>
		If you're working on Darkmoon Faire rep for the [Insane in the Membrane] achievement, you'll need to watch the auction house for lots of different items - many cards, decks and herbs.
		This addon lets you set a budget per epic deck(350 rep) and then finds any items that fit without your budget.
		This is a plugin for Auctioneer and requires the Auctioneer addon to work.
	</dt>

</dl>


<h2>Saate.net</h2>

<p>I created the software that powers the weekly <a href="http://www.saate.net/category/jumbles/">Jumbles</a> on <a href="http://www.saate.net/">Saate.net</a>. It's one of my favorite WoW blogs, focusing on obsessive play. Definately worth a read. And the weekly jumble challenge is fun.</p>


<h2>Writing</h2>

<p>To accompany <a href="http://www.saate.net/general/rngg/rng-stories-winner/">a discussion</a> about Bunny Hunter, I wrote a piece on drop rates and probabilities in WoW - <a href="http://www.iamcal.com/beating-the-rng/">World of Warcraft - Beating the RNG Boss</a>.</p>


<h2>Rawr</h2>

<p>I re-wrote and maintained the Hunter Module for <a href="http://rawr.codeplex.com/">Rawr</a> during the 2.2.* releases. At the time, it was a 100% match for the spreadsheet; I submitted back several pacthes for bugs in the rotation simulation code, pet talents and lots of little issues which can be found <a href="http://hunterloot.com/misc/bugs_closed.php">here</a>.</p>

<p>Since then, the module was rewritten breaking most calculations and should not be used. Either use the spreadsheet (which now has a gear optimizer, which is a reasonable substitute) or the web app <a href="http://femaledwarf.com/">Female Dwarf</a> which is excellent.</p>


<? include('../foot.txt'); ?>