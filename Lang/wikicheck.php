<?
$lang = $_GET["lang"];
include($lang . ".php");
$lang_array = &${$lang};
include("en.php");
$lang_array += $en;

for ($x = 1; $x <= 111; $x++)
	echo "wget http://", $lang, ".wikipedia.org/wiki/", $lang_array[$x], "\n";
?>
