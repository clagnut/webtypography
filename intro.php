<?php 
// Turn on PHP Error Reporting
#ini_set("display_errors","2");
#ERROR_REPORTING(E_ALL);

$dr = str_replace($_SERVER['SCRIPT_NAME'], '/includes/', $_SERVER['SCRIPT_FILENAME']);
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
<title>Introduction | The Elements of Typographic Style Applied to the Web</title>
<?php include($dr . "headlinks.inc.php") ?>
</head>

<body class="bits">
<?php include($dr . "header.inc.php") ?>

<div id="main">
<h1>	Introduction
 </h1>

	<p>For too long typographic style and its accompanying attention to detail have been overlooked by website designers, particularly in body copy. In years gone by this could have been put down to the technology, but now the web has caught up. The advent of much improved browsers, text rendering and high resolution screens, combine to negate technology as an&nbsp;excuse.</p>

	<p>Robert Bringhurst&#8217;s book <cite>The Elements of Typographic Style</cite> is on many a designer&#8217;s bookshelf and is considered to be a classic in the field. Indeed the renowned typographer Hermann Zapf proclaims the book to be <q>a must for everybody in the graphic arts, and especially for our new friends entering the field.</q></p>

	<p>In order to allay some of the myths surrounding typography on the web, I have structured this website to step through Bringhurst&#8217;s working principles, explaining how to accomplish each using techniques available in <abbr title="HyperText Mark-up Language">HTML</abbr> and <abbr title="Cascading Style Sheets">CSS</abbr>. The future is considered with coverage of <abbr>CSS3</abbr>, and practicality is ever present with workarounds, alternatives and compromises for less able&nbsp;browsers.</p>

	<p>At the time of writing, this is a work in progress. I am adding to the site in the order presented in Bringhurst&#8217;s book, one principle at a time.</p>

	<p>I am excluding those principles which are not relevant to the Web or that do not require a technical explanation. Unfortunately this excludes the entire opening chapter, the Grand Design, which I heartily recommend you read as it lays down the foundations, philosophy and approach to good typography in any medium. If you were to take any working principle from the Grand Design, it would be this: <q>Give full typographical attention even to incidental details.</q></p>

	<p>Now start with <a href="/2.1.1">Rhythm &#38; Proportion</a> or dip into the <a href="/toc">Table of Contents</a> and enjoy pushing a few boundaries to create websites of real typographical&nbsp;worth.</p>

	<p style="text-align:right; margin-top:2.75em">&#8212; Richard Rutter, Brighton, December 2005.</p>
	
	<h2>Postscript</h2>
	<p>In February 2014, I opened up the <a href="https://github.com/clagnut/webtypography">source code to this website</a> on GitHub, with <a href="http://clagnut.com/blog/2375/">an invitation</a> to web typography enthusiasts to take on the project, update the content and add the missing items. I will continue to maintain the website and update as changes are submitted.</p>

</div> <!-- /main -->

<div id="supp">
<h2><?php echo $title?></h2>
<?php include($dr . "references.inc.php") ?>
<?php include($dr . "book.inc.php") ?>
</div> <!-- /supp -->


<?php include($dr . "footer.inc.php") ?>
</body>
</html>