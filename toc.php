<?php
// Turn on PHP Error Reporting
#ini_set("display_errors","2");
#ERROR_REPORTING(E_ALL);

$dr = str_replace($_SERVER['SCRIPT_NAME'], '/includes/', $_SERVER['SCRIPT_FILENAME']);

$data = require_once($dr . "data.inc.php");
$chapters = $data['chapters'];
$sections = $data['sections'];
$items = $data['items'];

?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
<title>Table of Contents | The Elements of Typographic Style Applied to the Web</title>
<?php include($dr . "headlinks.inc.php") ?>
<style type="text/css">
OL {list-style:none}
</style>
</head>

<body class="bits">
<?php include($dr . "header.inc.php") ?>

<div id="main">
<h1>Table of Contents</h1>
<ol id='toc'>
	<li><a href="/">Front cover</a></li>
	<li style="margin-bottom:1.5em"><a href="/intro/">Introduction</a></li>
	
<?php
// Inefficient looping through the ToC data arrays, but heh it works doesn't it?
foreach($chapters as $chapter_num => $chapter) {
	echo "<li id='$chapter_num'><span>$chapter_num </span><h3>".htmlentities($chapter)."</h3>\n<ol>\n";
	foreach($sections as $section_num => $section) {
		$section_chapter = explode("." , $section_num)[0];
		if($section_chapter == $chapter_num) {
			echo "<li id='$section_num'><span>$section_num </span><h4>".htmlentities($section)."</h4>\n<ol>\n";
			foreach($items as $item_num => $item) {
				$item_ar = explode("." , $item_num);
				$item_section = $item_ar[0] . "." . $item_ar[1];				
				if($item_section == $section_num) {
					echo "<li id='$item_num'><span>$item_num </span><a href='/$item_num'>".preventOrphans($item)."</a></li>\n";
				}
			}
			echo "</ol>\n</li>\n";
		}
	}
	echo "</ol>\n</li>\n";
}
?>
	
	<li><h3>Reference</h3>
		<ol id="reference">
			<li><a href="/bibliography/">Bibliography</a></li>
		</ol>
	</li>
</ol>


</div> <!-- /main -->

<div id="supp">
<h3>Note</h3>
<p>This is a work in progress. The entire site is now open source, so please feel free to contribute by <a href="https://github.com/clagnut/webtypography">forking it on GitHub</a>.</p>
</p>
</div> <!-- /supp -->

<?php include($dr . "footer.inc.php") ?>
</body>
</html>