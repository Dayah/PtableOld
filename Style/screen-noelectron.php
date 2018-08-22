<?
header("Content-Type: text/css");
$handle = fopen("/var/log/cache_miss", "a"); fwrite($handle, "screen-noelectron.php\n"); fclose($handle);
?>
big				{ line-height: 1; }
small, .Shells, #Legend span	{ display: none; }
#Closeup small	{ display: inline-block; font-size: 50%; }
#CloseupElement big { line-height: normal; }
#Legend acronym	{ letter-spacing: normal; }
.Element		{ padding: 1px 1px 0 1px; background-image: url("http://www.eehtpc.com/ptable/gradient-names.png"); background-repeat: no-repeat; }
.KeyRegion, .InnerBorder	{ font-size: 0.8em; }
.KeyRegion input	{ height: 13pt; }
.Paren			{ font-size: 0.9em; /*width: 50em;*/ }
.Period			{ width: 1em; }
#Logo			{ position: absolute; clip: rect(auto 114px auto 4px); }
#OrbitalString, #SliderCell	{ font-size: 1em; }
thead td		{ border-bottom-width: 0; }
.Clean, #Legend	{ border-width: 1px; }
#Series td, #Hund	{ font-size: 0.8em; }
#Series td, .Element, #CloseupElement	{ border: 1px solid #666; }
.Locked			{ border: 2px solid black; }
