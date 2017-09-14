<?
	$title = 'MySQL Datatypes';
	$width = 900;
	include('../../head.txt');
?>

<h1>MySQL Datatypes</h1>

<table border="1">
	<tr>
		<td><b>Datatype</b></td>
		<td><b>Storage for y bytes</b></td>
		<td colspan="2"><b>Maximum Size</b></td>
	</tr>
	<tr>
		<td>CHAR(x)</td>
		<td align="right">x</td>
		<td align="right">255</td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td>VARCHAR(x)</td>
		<td align="right">y+1</td>
		<td align="right">255</td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td>TINYTEXT(x)</td>
		<td align="right">y+1</td>
		<td align="right">255</td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr>
		<td>TEXT(x)</td>
		<td align="right">y+2</td>
		<td align="right">65,535</td>
		<td align="right">(64 KB)</td>
	</tr>
	<tr>
		<td>MEDIUMTEXT(x)</td>
		<td align="right">y+3</td>
		<td align="right">16,777,215</td>
		<td align="right">(16.7 MB)</td>
	</tr>
	<tr>
		<td>LONGTEXT(x)</td>
		<td align="right">y+4</td>
		<td align="right">4,294,967,295</td>
		<td align="right">(4 GB)</td>
	</tr>
</table>

<br><br>

<table border="1">
	<tr>
		<td><b>Datatype</b></td>
		<td align="right"><b>Size in bytes</b></td>
		<td align="right"><b>Low</b></td>
		<td align="right"><b>High</b></td>
		<td align="right"><b>Range</b></td>
	</tr>
	<tr>
		<td>TINYINT (signed)</td>
		<td align="right">1</td>
		<td align="right">-128</td>
		<td align="right">127</td>
		<td align="right" rowspan="2">256</td>
	</tr>
	<tr>
		<td>TINYINT (unsigned)</td>
		<td align="right">1</td>
		<td align="right">0</td>
		<td align="right">255</td>
	</tr>
	<tr>
		<td>SMALLINT (signed)</td>
		<td align="right">2</td>
		<td align="right">-32,768</td>
		<td align="right">32,767</td>
		<td align="right" rowspan="2">65 thousand</td>
	</tr>
	<tr>
		<td>SMALLINT (unsigned)</td>
		<td align="right">2</td>
		<td align="right">0</td>
		<td align="right">65,535</td>
	</tr>
	<tr>
		<td>MEDIUMINT (signed)</td>
		<td align="right">3</td>
		<td align="right">-8,388,608</td>
		<td align="right">8,388,607</td>
		<td align="right" rowspan="2">16.8 million</td>
	</tr>
	<tr>
		<td>MEDIUMINT (unsigned)</td>
		<td align="right">3</td>
		<td align="right">0</td>
		<td align="right">16,777,215</td>
	</tr>
	<tr>
		<td>INT (signed)</td>
		<td align="right">4</td>
		<td align="right">-2,147,483,648</td>
		<td align="right">2,147,483,647</td>
		<td align="right" rowspan="2">4.3 billion</td>
	</tr>
	<tr>
		<td>INT (unsigned)</td>
		<td align="right">4</td>
		<td align="right">0</td>
		<td align="right">4,294,967,295</td>
	</tr>
	<tr>
		<td>BIGINT (signed)</td>
		<td align="right">8</td>
		<td align="right">-9,223,372,036,854,775,808</td>
		<td align="right">9,223,372,036,854,775,807</td>
		<td align="right" rowspan="2">18.4 billion billion</td>
	</tr>
	<tr>
		<td>BIGINT (unsigned)</td>
		<td align="right">8</td>
		<td align="right">0</td>
		<td align="right">18,446,744,073,709,551,615</td>
	</tr>
</table>

<br><br>

<table border="1">
	<tr>
		<td><b>Datatype</b></td>
		<td align="right"><b>Size in bytes</b></td>
		<td align="right"><b>Maximum Value</b></td>
		<td align="right"><b>Minimum Value</b></td>
	</tr>
	<tr>
		<td>FLOAT</td>
		<td align="right">4</td>
		<td align="right">+/- 3.402823466 e38</td>
		<td align="right">+/- 1.175494351 e-38</td>
	</tr>
	<tr>
		<td>DOUBLE</td>
		<td align="right">8</td>
		<td align="right">+/- 1.7976931348623157 e308</td>
		<td align="right">+/- 2.2250738585072014 e-308</td>
	</tr>
</table>

<br><br>

<table border="1">
	<tr>
		<td><b>Datatype</b></td>
		<td align="right"><b>Size in bytes</b></td>
		<td align="right"><b>Minimum Value</b></td>
		<td align="right"><b>Maximum Value</b></td>
	</tr>
	<tr>
		<td>DATETIME</td>
		<td>8</td>
		<td>1000-01-01 00:00:00</td>
		<td>9999-12-31 23:59:59</td>
	</tr>
	<tr>
		<td>DATE</td>
		<td>3</td>
		<td>1000-01-01</td>
		<td>9999-12-31</td>
	</tr>
	<tr>
		<td>TIMESTAMP</td>
		<td>4</td>
		<td>?</td>
		<td>?</td>
	</tr>
	<tr>
		<td>TIME</td>
		<td>3</td>
		<td>-838:59:59</td>
		<td>838:59:59</td>
	</tr>
	<tr>
		<td>YEAR</td>
		<td>1</td>
		<td>1901</td>
		<td>2155</td>
	</tr>
</table>

<? include('../../foot.txt'); ?>