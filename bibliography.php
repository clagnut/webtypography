<?php 
// Turn on PHP Error Reporting
#ini_set("display_errors","2");
#ERROR_REPORTING(E_ALL);

$dr = str_replace($_SERVER['SCRIPT_NAME'], '/includes/', $_SERVER['SCRIPT_FILENAME']);
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
<title>Bibliography | The Elements of Typographic Style Applied to the Web</title>
<?php include($dr . "headlinks.inc.php") ?>
</head>

<body class="bits">
<?php include($dr . "header.inc.php") ?>

<div id="main">

<h1>	Bibliography
 </h1>

	<h2>Books</h2>

	<dl>
	<dt><span class="thumb"><img src="/i/tiny/bringhurst.png" alt="Book cover" /></span> <a href="http://www.amazon.co.uk/exec/obidos/ASIN/0881792128/jalfrezi-21/"><cite>The Elements of Typographic Style</cite></a> by Robert Bringhurst </dt>
<dd>The book which sparked this website.</dd>
<dt><span class="thumb"><img src="/i/tiny/gridsystems.png" alt="Book cover" /></span> <a href="http://www.amazon.co.uk/exec/obidos/ASIN/3721201450/jalfrezi-21/"><cite>Grid Systems in Graphic Design</cite></a> by Josef Muller-Brockmann </dt>
<dd>The definitive word on using grid systems in graphic design. With examples on how to work correctly at a conceptual level and exact instructions for using all of the systems, this is as valid for the Web as it is for print.</dd>
</dl>

	<h2>References &#38;&nbsp;Tutorials</h2>

	<dl>
	<dt><a href="http://www.alanwood.net/unicode/index.html#links"><cite>Alan Wood&#8217;s Unicode Tests</cite></a> </dt>
<dd>Massively comprehensive resource for locating and testing Unicode characters.</dd>
<dt><a href="http://www.clagnut.com/blog/348/"><cite>How to size text using ems</cite></a> </dt>
<dd>Tutorial on Clagnut which explains in detail how to size text on websites using ems. Covers the issues of inheritance and transitioning from pixel-based text sizing.</dd>
<dt><a href="http://riddle.pl/emcalc/"><cite>Em Calculator</cite></a> </dt>
<dd>Handy online tool for converting pixels to ems.</dd>
<dt><a href="http://www.alistapart.com/articles/howtosizetextincss/"><cite>How to Size Text in <abbr title="Cascading Style Sheets">CSS</abbr></cite></a> </dt>
<dd>A best practice that satisfies designers and users and works across browsers and platforms.</dd>
<dt><a href="http://www.w3.org/WAI/GL/css2em.htm"><cite>The amazing em unit and other best practices</cite></a> </dt>
<dd>Font sizing tutorial from the <abbr title="Worldwide Web Consortium">W3C</abbr>.</dd>
<dt><a href="http://www.fontshop.com/fontfeed/archives/figuring-it-out-osf-lf-and-tf-explained/"><cite>Figuring It Out: <abbr>OSF</abbr>, LF, and <abbr>TF</abbr> Explained</cite></a> </dt>
<dd>Great explanation of lining, old-style <span class='bracket'>(</span>text<span class='bracket'>)</span> and tabular figures from FontShop.</dd>
</dl>

	<h2>Weblogs</h2>

	<dl>
	<dt><a href="http://www.typographi.com/"><cite>Typographica</cite></a> </dt>
<dd>A journal of typography featuring news, observations, and open commentary on fonts and typographic design.</dd>
<dt><a href="http://www.typographer.org/"><cite>Typographer.org</cite></a> </dt>
<dd>A regular digest and commentary on the typography and design industry, written by designers from around the world.</dd>
<dt><a href="http://typophile.com/"><cite>Typophile</cite></a> </dt>
<dd>Collaborative blog with typographic news and views from around the world. Also present is a forum and a gradually evolving wiki.</dd>
<dt><a href="http://ilovetypography.com/"><cite>I Love Typography</cite></a> </dt>
<dd>Bold, graphical blog devoted to typography, type, fonts and typefaces.</dd>
<dt><a href="http://blog.fawny.org/category/typography/"><cite>Joe Clark on typography</cite></a> </dt>
<dd>Typography found and discussed.</dd>
<dt><a href="http://www.clagnut.com/archive/typography/"><cite>Clagnut on typography</cite></a> </dt>
<dd>An ever growing list of typographic links at Clagnut.</dd>
<dt><a href="http://www.ministryoftype.co.uk/"><cite>Ministry of Type</cite></a> </dt>
<dd>Fabulous blog on published type from Aegir Hallmundur.</dd>
<dt><a href="http://www.typeforyou.org/"><cite>Type For You</cite></a> </dt>
<dd>More great typographic blogging.</dd>
<dt><a href="http://typesites.com/"><cite>Typesites</cite></a> </dt>
<dd>Critiques of typographically eminent websites.</dd>
</dl>

	<h2>Specifications</h2>

	<dl>
	<dt><a href="http://www.w3.org/TR/html4"><cite><abbr title="HyperText Mark-up Language">HTML</abbr> 4.01</cite></a> </dt>
<dt><a href="http://www.w3.org/TR/xhtml1"><cite><abbr title="eXtensible HyperText Mark-up Language">XHTML</abbr> 1.0</cite></a> </dt>
<dt><a href="http://www.w3.org/TR/CSS21"><cite><abbr>CSS2</abbr>.1</cite></a> </dt>
<dt><a href="http://www.w3.org/TR/css3-background"><cite><abbr>CSS3</abbr> Backgrounds and Borders Module</cite></a>  </dt>
<dt><a href="http://www.w3.org/TR/css3-box"><cite><abbr>CSS3</abbr> Box Model Module</cite></a>  </dt>
<dt><a href="http://www.w3.org/TR/css3-fonts"><cite><abbr>CSS3</abbr> Fonts Module</cite></a>  </dt>
<dt><a href="http://www.w3.org/TR/css3-content"><cite><abbr>CSS3</abbr> Generated and Replaced Content Module</cite></a>  </dt>
<dt><a href="http://www.w3.org/TR/css3-linebox"><cite><abbr>CSS3</abbr> Line Module</cite></a>  </dt>
<dt><a href="http://www.w3.org/TR/css3-lists"><cite><abbr>CSS3</abbr> Lists Module</cite></a> </dt>
<dt><a href="http://www.w3.org/TR/css3-multicol"><cite><abbr>CSS3</abbr> Multi-column Layout Module</cite></a>  </dt>
<dt><a href="http://www.w3.org/TR/css3-page"><cite><abbr>CSS3</abbr> Paged Media Module</cite></a> </dt>
<dt><a href="http://www.w3.org/TR/css3-text"><cite><abbr>CSS3</abbr> Text Effects Module</cite></a> </dt>
<dt><a href="http://www.w3.org/TR/css3-webfonts"><cite><abbr>CSS3</abbr> Web Fonts Module</cite></a>  </dt>
</dl>
</div> <!-- /main -->

<div id="supp">
<h2><a href="/toc/#reference">Reference</a></h2>
<?php include($dr . "references.inc.php") ?>
<?php include($dr . "book.inc.php") ?>
</div> <!-- /supp -->

<?php include($dr . "footer.inc.php") ?>

</body>
</html>