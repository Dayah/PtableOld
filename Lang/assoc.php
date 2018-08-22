<?
$lang = $_GET["lang"];
include($lang . ".php");
$lang_array = &${$lang};
include("en.php");

print_r(array_intersect_assoc($en, $lang_array));
$time_start = microtime(true);

echo "\"Long\" => array(";
for ($x = 0; $x <= 120; $x++) {
if (array_key_exists($x, $lang_array)) {
	$temp = imagettfbbox(12, 0, "../Other/ARIALUNI.TTF", $lang_array[$x]);
	if ($temp[2] > 89) echo $x, ", ";
}}
echo ")";

echo (microtime(true)-$time_start) * 1000;
?>
