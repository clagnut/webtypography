<?php
$dr = $_SERVER["DOCUMENT_ROOT"];
$dr2 = preg_replace("/\/[^\/]+$/","/includes_webtype",$dr);
include($dr2 . "/db_connect.php");

// format text function
include($dr . "/includes/format.php");

// get variables from query
$item_number = $_REQUEST["item"];

// if there is a valid looking ID present
if (preg_match("/[0-9]+/", $item_number)) {
	$number = $item_number;
} else {
	die("Bad or missing id.");
}

// get item
$sql = "SELECT item_id, title, quote, item, chapters.chapter AS chapter, sections.section AS section, sections.number AS section_number, chapters.number AS chapter_number FROM items, chapters,chapters AS sections WHERE items.number='$number' AND sections.chapter_id = items.chapter_id AND chapters.chapter_id = sections.chapter";
#echo "<textarea>$sql</textarea>";
$result = mysql_query($sql);
if ($myitem = mysql_fetch_array($result)) {;
	$item_id = $myitem["item_id"];
	$title = $myitem["title"];
	$quote = trim($myitem["quote"]);
	$item = $myitem["item"];
	$chapter_number = $myitem["chapter_number"];
	$section_number = $myitem["section_number"];
	$chapter = $myitem["chapter"];
	$section = $myitem["section"];
	$chapter_dir = str_replace(" ", "_", $chapter);
	$section_dir = str_replace(" ", "_", $section);
	
	// format item
	$title = trim(strip_tags(format($title)));
	//$title = preg_replace("/\s(\S+)$/", "&nbsp;$1", $title);
	if ($quote != "") {
		$quote = "<span class='ic'>&#8220;</span>" . $quote . "&#8221;";
		$quote = format($quote);
	}
	$item = format($item);
	$chapter = strip_tags(format($chapter));
	$section = strip_tags(format($section));
	$chapter = str_replace(" and", " &amp;", $chapter);
	$chapter = str_replace("_ ", ", ", $chapter);
	$section = str_replace(" and", " &amp;", $section);
	$section = str_replace("_ ", ", ", $section);
	
	// get next/prev item
	$nexttitle = false;
	$prevtitle = false;
	$sql = "SELECT item_id, title, items.number, sections.section AS section_name, chapters.chapter AS chapter_name, RIGHT(items.number, 2)  AS itemnum, sections.number AS chapternum FROM items, chapters, chapters AS sections WHERE items.live='true' AND sections.chapter_id = items.chapter_id AND chapters.chapter_id = sections.chapter ORDER BY chapternum, itemnum";
#echo "<textarea>$sql</textarea>";
	$result = mysql_query($sql);
	if ($myitems = mysql_fetch_array($result)) {
		do {
			$myitem_id = $myitems["item_id"];
			$mytitle = $myitems["title"];
			$mynumber = $myitems["number"];
			$mychapter = $myitems["chapter_name"];
			$mysection = $myitems["section_name"];
		
			$allitems_id[] = $myitem_id;
			$allitems_number[] = $mynumber;
			$allitems_title[] = $mytitle;
			$allitems_chapter[] = $mychapter;
			$allitems_section[] = $mysection;
		} while ($myitems = mysql_fetch_array($result));
		// loop through array of items
		for($i = 0; $i < count($allitems_id); $i++) {
			if($allitems_id[$i] == $item_id) {
				$nexttitle = (isset($allitems_title[$i+1]))?$allitems_title[$i+1]:"";
				$prevtitle = $allitems_title[$i-1];
				$nextnumber = (isset($allitems_number[$i+1]))?$allitems_number[$i+1]:"";
				$prevnumber = $allitems_number[$i-1];
				$nextchapter = (isset($allitems_chapter[$i+1]))?$allitems_chapter[$i+1]:"";
				$nextchapter = str_replace(" ", "_", $nextchapter);
				$prevchapter = (isset($allitems_chapter[$i-1]))?$allitems_chapter[$i-1]:"";
				$prevchapter = str_replace(" ", "_", $prevchapter);
				$nextsection = (isset($allitems_section[$i+1]))?$allitems_section[$i+1]:"";
				$nextsection = str_replace(" ", "_", $nextsection);
				$prevsection = (isset($allitems_section[$i-1]))?$allitems_section[$i-1]:"";
				$prevsection = str_replace(" ", "_", $prevsection);
				break;
			}
		}
		# format next/prev titles
		$nexttitle = trim(strip_tags(format($nexttitle)));
		$prevtitle = trim(strip_tags(format($prevtitle)));
	} else {
		$error .= "badNextPrev";
		$mySQLsaid = mysql_error();
	}
	
	# get annotations
	/*
	$sql = "SELECT annotation_id, name, url, annotation, UNIX_TIMESTAMP(annotationstamp) AS annotationstamp FROM annotations WHERE item_id = '$item_id' ORDER BY annotationstamp";
	$annotationresult = mysql_query($sql);
	*/
} else {
	$error = "badItemNumber";
	$mySQLsaid = mysql_error();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?php echo $title?> | The Elements of Typographic Style Applied to the Web</title>
<?php include($dr . "/includes/headlinks.inc") ?>
</head>

<body>
<?php include($dr . "/includes/header.inc") ?>

<?php
if (!isset($error) || $error != "badItemNumber") { # good guideline number
?>

<div id="main">
<h1><span><?php echo $number?> </span><?php echo $title?></h1>

<?php
if ($quote != "") {
	echo "<blockquote class='quote-from-book'>" . $quote . "</blockquote>";
}
?>

<?php echo $item?>

</div> <!-- /main -->

<div id="supp">
<h2><a href="/toc#<?php echo $chapter_dir?>" title="View chapter contents"><?php echo $chapter?></a></h2>
<h3><span>&#167; </span><a href="/toc#<?php echo $section_dir?>" title="View section contents"><?php echo $section?></a></h3>

<?php
if (!isset($error) || $error != "badNextPrev") { # good guideline number
?>

<ul id="nextprev">
<?php
if ($nexttitle) {
	echo "<li><span>&#8594;</span><a href='/$nextchapter/$nextsection/$nextnumber/' title='Read next guideline'>$nexttitle</a></li>";
}
if ($prevtitle) {
	echo "<li><span>&#8592;</span><a href='/$prevchapter/$prevsection/$prevnumber/' title='Read previous guideline'>$prevtitle</a></li>";
}
?>
</ul>
<?php
}
?>
<!-- /annotations
<div id="annotations">
<h3>Annotations</h3>
<?php /*
// pull annotations from database
	$sql = "SELECT annotation_id,author,web,annotation,UNIX_TIMESTAMP(annotationstamp) AS annotationstamp FROM annotations WHERE item_id = $item_id ORDER BY annotationstamp DESC";
	$result = mysql_query($sql);
	if($myannotation = mysql_fetch_array($result)) {
		echo "<ol id='annotations'>\n";
		do {
			// get and format annotation
			$annotationdate = date('j M Y, H:i', $myannotation["annotationstamp"]);
			#get annotation
			$theannotation_id = $myannotation["annotation_id"];
			$theannotation = $myannotation["annotation"];
			# turn all HTML to entities
			$theannotation = htmlentities($theannotation);
			# strip PHP and HTML tags to be sure
			$theannotation = strip_tags($theannotation);
			# put quotes back so textile works
			$theannotation = str_replace("&quot;", "\"", $theannotation);
			# turn non-Textile URLs into HTML links
			$theannotation = preg_replace("/(\s)((http(s?):\/\/)|(www\.))(\S+)/i", "$1<a href=\"http$4://$5$6\">$3$5$6</a>", $theannotation); 
			# Textilise annotation
			$theannotation = textile($theannotation);
			# strip tags again
			$theannotation = strip_tags($theannotation);
			# split annotation into sentences
			$sentences = preg_split("/\./", $theannotation);
			# get first 2 sentences
			$theannotation = $sentences[0] . ".";
			if ($sentences[1]) {$theannotation .= $sentences[1] . ".";}
			# add ellipsis if required
			if (count($sentences)>2) {$theannotation .= "&#8230;";}
			
			echo "<li>";
			printf("<a href='/$chapter_dir/$section_dir/$number/comments/#%s' title='View this comment.'>%s</a>\n", $theannotation_id, $theannotation);
			echo "</li>";
		} while ($myannotation = mysql_fetch_array($result));
		echo "</ol>\n";
	} else {
		echo "\n<ol id='annotations'><li><a href='/$chapter_dir/$section_dir/$number/comments/'>Add the first annotation</a></li></ol>\n";
	}*/
?>
</div>  -->


<?php include($dr . "/includes/references.inc");
include($dr . "/includes/fontdeck.inc.php"); ?>
</div> <!-- /supp -->

<?php
} else { # bad guildeine number
?>

<div id="main">
<h1>There is no entry for the specified guideline number</h1>
</div>

<div id="supp">
<?php include($dr . "/includes/references.inc") ?>
</div>

<?php
}
?>

<?php include($dr . "/includes/footer.inc") ?>
</body>
</html>