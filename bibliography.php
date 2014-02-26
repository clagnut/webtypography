<?php
$dr = $_SERVER["DOCUMENT_ROOT"];
$dr2 = preg_replace("/\/[^\/]+$/","/includes_webtype",$dr);
include($dr2 . "/db_connect.php");

// format text function
include($dr . "/includes/format.php");

// get item
$sql = "SELECT title, item FROM items WHERE filename='bibliography'";
$result = mysql_query($sql);
if ($myitem = mysql_fetch_array($result)) {;
	$title = $myitem["title"];
	$item = $myitem["item"];
	
	// format item
	$title = strip_tags(format($title));
	$item = format($item);
	
} else {
	$error = "badFilename";
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

<body class="bits">
<?php include($dr . "/includes/header.inc") ?>

<?php
if (!isset($error) || $error != "badFilename") { # good filename
?>

<div id="main">
<h1><?php echo $title?></h1>

<?php echo $item?>

</div> <!-- /main -->

<div id="supp">
<h2><a href="/toc/#reference">Reference</a></h2>
<?php include($dr . "/includes/references.inc") ?>
<?php include($dr . "/includes/book.inc") ?>
</div> <!-- /supp -->

<?php
} 
?>

<?php include($dr . "/includes/footer.inc") ?>

</body>
</html>