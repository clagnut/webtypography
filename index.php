<?php 
// Turn on PHP Error Reporting
#ini_set("display_errors","2");
#ERROR_REPORTING(E_ALL);

$dr = str_replace($_SERVER['SCRIPT_NAME'], '/includes/', $_SERVER['SCRIPT_FILENAME']);
$data = require_once($dr . "data.inc.php");
$items = $data['items'];

$keys = array_keys($items);
$latest_num = $keys[count($keys)-1];
$latest = $items[$latest_num];
?>
<!DOCTYPE html>
<html lang="en-gb">
<head>
<title>The Elements of Typographic Style Applied to the Web &ndash; a practical guide to web typography</title>
<?php include($dr . "headlinks.inc.php") ?>
<style type="text/css">
html {
	min-height: 100%; /* force gradient to cover whole page */
}
#cover {
	color: #fff;
	background-color: #400300;
	background-image: -webkit-linear-gradient(top, #000, #400300); /* For Chrome and Safari */
	background-image:    -moz-linear-gradient(top, #000, #400300); /* For old Fx (3.6 to 15) */
	background-image:     -ms-linear-gradient(top, #000, #400300); /* For pre-releases of IE 10*/
	background-image:      -o-linear-gradient(top, #000, #400300); /* For old Opera (11.1 to 12.0) */ 
	background-image:         linear-gradient(to bottom, #000, #400300); /* Standard syntax; must be last */
	padding: 4.5076% 7.2924%;
}

#cover h1 {
	font-size: 2.0625em;
	line-height: 1.666666666666667em;
	margin:0;
}

h1#big-title span {
	position:static;
	display:inline;
}

h1#big-title span#ts {
	font-style:normal;
	position:relative;
	left:-1.05em;
}

#entrance {
	position: absolute;
	right: 4.5076%;
	bottom: 11.8%;
	font-size:1em;
	line-height1.375em;
}

#cover h2 {
	font-size: 1.5em;
	line-height: 1.083333333333333em;
	margin:0;
}

#entrance a {
	color: #fff;
	text-decoration:underline;
}

html>body #entrance a {
	text-decoration:none;
	border-bottom: 1px solid #333;
}

html>body #entrance a:hover {
	border-bottom: 1px solid #fff;
}

#entrance ul {
	list-style:none;
	padding-left: 0;
}

li span {
	position:absolute;
}
</style>
</head>

<body id="cover">


<h1 id="big-title">
The Elements <br />
<span id="ts"><span class="of">of</span> Typographic Style<br /></span>
Applied <span>to the</span> Web
</h1>

<div id="entrance">
<h2>A practical guide to web typography</h2>
<ul>
	<li><a href="/intro/">Read the 	Introduction</a></li>
	<li><a href="/toc/">Table of Contents</a></li>
	<li><span style="left:-3.5em">Latest: </span><a href="/<?php echo $latest_num ?>"><?php echo $latest_num." ".$latest ?></a></li>
</ul>
</div>
</body>
</html>
