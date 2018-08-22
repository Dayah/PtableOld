<?php
$file = file_get_contents("http://en.wikipedia.org/wiki/Special:Export/" . $_GET["name"], "r");

$p = xml_parser_create();
xml_parse_into_struct($p, $file, $vals);
xml_parser_free($p);

foreach ($vals as $key=>$val)
	if ($val["tag"] == "TEXT")
		$element = $val["value"];

echo $element;
?>
