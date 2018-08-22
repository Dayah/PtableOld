<?
include "screen-noname.php";
$handle = fopen("/var/log/cache_miss", "a"); fwrite($handle, "screen-nomass.php\n"); fclose($handle);
?>
#Legend strong				{ letter-spacing: -0.1em; }
strong						{ font-size: 0.8em; }
.Element i, #Legend i		{ display: none; }
.Element acronym, #Legend acronym	{ width: 1.75em; font-size: 1.1em; line-height: 1.1; }
.Element acronym.Long		{ letter-spacing: -0.09em; }
.Element strong				{ text-align: center; }
.KeyRegion					{ font-size: 0.5em; }
.Paren						{ font-size: 0.7em; width: auto; }
#OrbitalString, #SliderCell	{ font-size: 0.7em; }
#Series						{ font-size: 1.7em; }
#Hund						{ float: left; }
#OrbitalHolder				{ width: 30em; }
#Orbital					{ bottom: 0; right: 0; }
#Properties, #IsotopeForm	{ font-size: 1.1em; }
#Properties th				{ letter-spacing: -1px; }
.KeyRegion input, #SliderCell input	{ height: 11pt; }
#Search						{ font-size: 1.2em; }
#SearchInput				{ width: 9ex; font-size: 1em; }
#SliderDisplay				{ font-size: 0.7em; width: 5ex; }
.InnerBorder				{ font-size: 0.55em; }
#Logo						{ height: 45px; width: 90px; }
.Social, #Ad, #Block th		{ display: none; }
