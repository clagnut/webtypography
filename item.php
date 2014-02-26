<?php
// Turn on PHP Error Reporting
ini_set("display_errors","2");
ERROR_REPORTING(E_ALL);

$dr = str_replace($_SERVER['SCRIPT_NAME'], '/includes/', $_SERVER['SCRIPT_FILENAME']);
$dr2 = str_replace("/includes/", "", $dr);	

$data = require_once($dr . "data.inc.php");
$chapters = $data['chapters'];
$sections = $data['sections'];
$items = $data['items'];

// get variables from query
$item_num = isset($_REQUEST["item_num"])?$_REQUEST["item_num"]:false;

// if there is a valid looking ID present
if (!array_key_exists ($item_num, $items)) {
	die("Bad or missing id.");
} else {
	$item_ar = explode("." , $item_num);
	$item_chapter = $item_ar[0];
	$item_section = $item_ar[0] . "." . $item_ar[1];
	$title = htmlentities($items[$item_num]);
}
?>
<!DOCTYPE html>
<html lang="en-gb">
<title><?php echo $title ?> | The Elements of Typographic Style Applied to the Web</title>
<?php include($dr . "headlinks.inc.php") ?>
</head>

<body>
<?php include($dr . "header.inc.php") ?>

<div id="main">
<h1><span><?php echo $item_num ?> </span><?php echo $title?></h1>


<?php include($dr2 . "/items/$item_num" . ".html") ?>

</div> <!-- /main -->

<div id="supp">
<h2><a href="/toc#<?php echo $item_chapter?>" title="View chapter contents"><?php echo $chapters[$item_chapter] ?></a></h2>
<h3><span>&#167; </span><a href="/toc#<?php echo $item_section?>" title="View section contents"><?php echo $sections[$item_section] ?></a></h3>


<ul id="nextprev">
<?php
if ($nexttitle) {
	echo "<li><span>&#8594;</span><a href='/$nextnumber/' title='Read next guideline'>$nexttitle</a></li>";
}
if ($prevtitle) {
	echo "<li><span>&#8592;</span><a href='/$prevnumber/' title='Read previous guideline'>$prevtitle</a></li>";
}
?>
</ul>

<?php
include($dr . "references.inc.php");
include($dr . "fontdeck.inc.php");
?>
</div> <!-- /supp -->


<?php include($dr . "footer.inc.php") ?>
</body>
</html>