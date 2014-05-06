<?php

return array(
	'chapters' => array(
        '2' => 'Rhythm & Proportion',
        '3' => 'Harmony & Counterpoint'
	),

    'sections' => array(
        '2.1' => 'Horizontal Motion',
        '2.2' => 'Vertical Motion',
        '2.3' => 'Blocks & Paragraphs',
        '2.4' => 'Etiquette of Hyphenation & Pagination',
        '3.1' => 'Size',
        '3.2' => 'Numerals, Capitals & Small Caps',
    ),
 
    'items' => array(
	    '2.1.1' => "Define the word space to suit the size and natural letterfit of the font",
	    '2.1.2' => "Choose a comfortable measure",
	    '2.1.3' => "Set ragged if ragged setting suits the text and page",
	    '2.1.4' => "Use a single word space between sentences",
	    '2.1.5' => "Add little or no space within strings of initials",
	    '2.1.6' => "Letterspace all strings of capitals and small caps, and all long strings of digits",
	    '2.1.7' => "Don’t letterspace the lower case without a reason",
	    '2.1.8' => "Kern consistently and modestly or not at all",
	    '2.1.9' => "Don’t alter the widths or shapes of letters without cause",
	    '2.1.10' => "Don’t stretch the space until it breaks",
		'2.2.1' => "Choose a basic leading that suits the typeface, text and measure",
		'2.2.2' => "Add and delete vertical space in measured intervals",
		'2.3.1' => "Set opening paragraphs flush left",
		'2.3.2' => "In continuous text mark all paragraphs after the first with an indent of at least one en",
		'2.3.3' => "Add extra lead before and after block quotations",
		'2.3.4' => "Indent or center verse quotations",
		'2.4.1' => "At hyphenated line-ends, leave at least two characters behind and take at least three forward",
		'2.4.3' => "Avoid more than three consecutive hyphenated lines",
		'2.4.5' => "Hyphenate according to the conventions of the language",
		'2.4.6' => "Link short numerical and mathematical expressions with hard spaces",
		'2.4.8' => "Never begin a page with the last line of a multi-line paragraph",
		'3.1.1' => "Don’t compose without a scale",
		'3.2.1' => "Use titling figures with full caps, and text figures in all other circumstances",
     
    )
);

function preventOrphans($string) {
	$string = htmlspecialchars($string);
	$pattern = '/(.*) (\S*)$/i';
	$replacement = '$1&nbsp;$2';
	$string = preg_replace($pattern, $replacement, $string);
	return $string;
}
?>
