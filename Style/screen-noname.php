<?
include "screen-noelectron.php";
$handle = fopen("/var/log/cache_miss", "a"); fwrite($handle, "screen-noname.php\n"); fclose($handle);
?>
.Element acronym, #Legend acronym, .Element i, #Legend i	{ text-align: center; }
#CloseupElement				{ width: 3.75em; border: none; }
.Element em, #Legend em		{ display: none; }
.Element i, #Legend i		{ font-size: 0.7em; width: 3.6em; text-overflow: clip; }
.Element acronym, #Legend acronym	{ width: 2.1em; }
#Legend acronym				{ letter-spacing: -0.08em; }
.Element					{ padding: 0.2em; padding-bottom: 1px; border-width: 5px; border-color: white; background-image: url("http://www.eehtpc.com/ptable/gradient.png"); }
.Locked						{ border: 6px solid #999; border-bottom-width: 5px; border-right-width: 5px; }
.BlueTop, .BlueLeft, .BlueBottom, .BlueTop	{ border-width: 6px; }
.KeyRegion, .InnerBorder	{ font-size: 0.75em; }
#Orbital					{ bottom: -5px; right: -12px; }
#Hund td td					{ letter-spacing: -1px; }
#Series td					{ border: none; }
