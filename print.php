<? $time_start = microtime(true);
/*
if (array_key_exists("HTTP_IF_MODIFIED_SINCE", $_SERVER) && !strpos($_SERVER["HTTP_USER_AGENT"], "Googlebot")) {
	header("HTTP/1.1 304 Not Modified");
	$handle = fopen("/var/log/last_modified", "a"); fwrite($handle, $_SERVER["HTTP_IF_MODIFIED_SINCE"] . "\n"); fclose($handle);
	exit;
}
*/
header("Last-Modified: " . date("D, d M Y H:i:s", getlastmod()) . " GMT");
//if (isset($_SERVER["HTTP_ACCEPT"]) && stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) header("Content-Type: application/xhtml+xml");
date_default_timezone_set("GMT");
require("Script/lang_detect.php");
$code = substr($visitor_accepted[0]["Actual"], 0, 2);
if (array_key_exists("scheme", $_GET)) $scheme = $_GET["scheme"]; else $scheme = "day" /*scheme()*/;
echo pack("CCC", 0xEF,0xBB,0xBF);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $visitor_accepted[0]["Named"] ?>">
 <head>
  <title><?= (local("Title")) ? local("Title") : local("Periodic Table") . " (" . local("EnglishName") . " Periodic Table)" ?></title>

  <meta name="description" content="<?= local("Description") ?>"/>
  <meta name="keywords" content="<?= local("Periodic Table") ?>, dynamic, interactive, elements, name, chemistry, printable, homework, pdf, electron configuration"/>
  <link rel="alternate" type="application/rss+xml" href="discovery.xml" title="Discovered elements"/>

  <link href="Style/screen-default.css" rel="stylesheet" type="text/css" media="screen"/>

  <!-- <link href="Style/print-default.css" rel="stylesheet" type="text/css" media="print"> -->

  <script type="text/javascript">
  //<![CDATA[
if (top != self) top.location.replace(self.location.href);
language = "<?= $code ?>";
throb_atomic = false;
lang_strings = {
	"Group": "<?= local("Group") ?>"
};
  //]]>
  </script>
  <script type="text/javascript" src="Script/interactivity.js" defer="defer"></script>
<style>.Element big { font-size: 1.8em; width: 2.4em; line-height: 1.1; }</style>
  <link rel="shortcut icon" href="favicon.ico"/>

 </head>
 <body>
  <h1 style="font-size: 7.5em;"><?= local("Periodic Table of Elements") ?></h1>

<!--
  <div id="Ad">
   <script type="text/javascript">google_ad_client = "pub-1899956715581914"; google_ad_slot = "6762255391"; google_ad_width = 728; google_ad_height = 90;</script>
   <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
  </div>
-->

  <div style="position: relative; margin: 0 0.5cm; height: 12px;">
   <img src="http://www.eehtpc.com/ptable/bevel-left.png" style="position: absolute; top: -13px; left: 0; height: 24px; width: 12px;" alt=""/>
   <img src="http://www.eehtpc.com/ptable/bevel-right.png" style="position: absolute; top: -13px; right: 0; height: 24px; width: 12px;" alt=""/>
  </div>

<table class="Alkali Alkaline Nonmetal Transition Lanthanoid Actinoid Poor Noble Undiscovered" id="Main" summary="periodic table" border="0" cellspacing="0" style="margin-top: 1em;">
 <col id="Period"/>
 <thead>
 <tr>
  <td></td>
<? for ($x = 1; $x <= 18; $x++) echo "  <td colspan=\"2\" style='font-size: 2em;'>$x</td>\n"; ?>
 </tr>
 </thead>

 <tbody>
 <tr id="White">
  <th style="font-size: 2em;">1</th>
<? element($element[1]); ?>

  <td id="Legend" colspan="2"><strong>Atomic<span> #</span></strong> <big>Sym<span>bol</span></big> <em>Name</em><div><span>Atomic </span>Mass</div></td>

  <td class="Clean KeyRegion" colspan="20" rowspan="3">
   <table id="KeyContainer" style="margin: auto; width: 95%;"><tbody><tr><td>

 <table id="Closeup" cellspacing="0" cellpadding="0">
  <tr>
   <td id="CloseupElement"></td>
   <td id="CloseupElectron"></td>
  </tr>
  <tr><td id="ELECTRONSTRING" colspan="2" style="text-align: center;"></td></tr>
 </table>

 <table id="MatterState" cellspacing="5" cellpadding="0" style="margin-left: 1em;">
  <tr>
   <td class="Solid"><big><?= ($code != "zh") ? $element[6]["symbol"] : $visitor_lang[6] ?></big></td>
   <th class="Solid"><?= local("Solid") ?></th>
  </tr>
  <tr>
   <td class="Liquid"><big><?= ($code != "zh") ? $element[80]["symbol"] : $visitor_lang[80] ?></big></td>
   <th class="Liquid"><?= local("Liquid") ?></th>
  </tr>
  <tr>
   <td class="Gas"><big><?= ($code != "zh") ? $element[1]["symbol"] : $visitor_lang[1] ?></big></td>
   <th class="Gas"><?= local("Gas") ?></th>
  </tr>
  <tr>
   <td class="Unknown"><big><?= ($code != "zh") ? $element[104]["symbol"] : $visitor_lang[104] ?></big></td>
   <th class="Unknown"><?= local("Unknown") ?></th>
  </tr>
 </table>

 <form name="isotopes" id="IsotopeForm" action="">
  <table cellspacing="0" cellpadding="0">
   <tr>
    <th><label for="t_isoname" id="l_isoname">Name</label></th>
    <td><input type="radio" name="isotopes" id="t_isoname" value="isoname"/></td>
    <td id="ISONAME"><span></span><span></span></td>
   </tr><tr>
    <th><label for="t_isomass" id="l_isomass">Mass</label></th>
    <td><input type="radio" name="isotopes" id="t_isomass" value="isomass"/></td>
    <td id="ISOMASS"></td>
   </tr><tr>
    <th><label for="t_binding" id="l_binding">Binding Energy</label></th>
    <td><input type="radio" name="isotopes" id="t_binding" value="binding"/></td>
    <td id="BINDING"></td>
   </tr><tr>
    <th><label for="t_masscontrib" id="l_masscontrib">Abundance</label></th>
    <td><input type="radio" name="isotopes" id="t_masscontrib" value="masscontrib"/></td>
    <td id="MASSCONTRIB"></td>
   </tr><tr>
    <th><label for="t_halflife" id="l_halflife">Half-Life</label></th>
    <td><input type="radio" name="isotopes" id="t_halflife" value="halflife"/></td>
    <td id="HALFLIFE"></td>
   </tr><tr>
    <th><label for="t_width" id="l_width">Decay Width</label></th>
    <td><input type="radio" name="isotopes" id="t_width" value="width"/></td>
    <td id="WIDTH"></td>
   </tr>
  </table>
 </form>

</td><td>

 <table id="Series" class="Series" cellspacing="4" align="right" style="width: 28em; letter-spacing: normal;">
  <tbody><tr>
   <th colspan="6"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Metals") ?>"><?= local("Metals") ?></a></th>
   <th colspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Nonmetals") ?>"><?= local("Nonmetals") ?></a></th>
  </tr><tr>
   <td class="Alkali" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Alkali metals") ?>"><?= local("Alkali metals") ?></a></td>
   <td class="Alkaline" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Alkaline earth metals") ?>"><?= local("Alkaline earth metals") ?></a></td>
   <th style="border: none; font-weight: normal; letter-spacing: -0.05em;" colspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/Inner transition">Inner transition</a></th>
   <td class="Transition" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Transition metals") ?>"><?= local("Transition metals") ?></a></td>
   <td class="Poor" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Other metals") ?>"><?= local("Other metals") ?></a></td>
   <td class="Nonmetal" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Other nonmetals") ?>"><?= local("Other nonmetals") ?></a></td>
   <td class="Noble" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Noble gases") ?>"><?= local("Noble gases") ?></a></td>
  </tr><tr>
   <td class="Lanthanoid"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Lanthanoids") ?>"><?= local("Lanthanoids") ?></a></td>
   <td class="Actinoid"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Actinoids") ?>"><?= local("Actinoids") ?></a></td>
  </tr></tbody>
 </table>

 <form id="Properties" name="visualize" action="">
  <table cellspacing="0" cellpadding="0" align="right">
   <tr>
    <th><label for="t_state" id="l_state"><?= local("State At") ?> <span></span></label></th>
    <td><input type="radio" name="visualize" id="t_state" value="state"/></td>
    <td id="STATE"></td>
<td style="width: 1em;" rowspan="6"></td>
    <th><label for="t_radius" id="l_radius"><span></span> <?= local("Radius") ?></label></th>
    <td><input type="radio" name="visualize" id="t_radius" value="radius"/></td>
    <td id="RADIUS"></td>
   </tr><tr>
    <th><label for="t_melt" id="l_melt"><?= local("Melting Point") ?></label></th>
    <td><input type="radio" name="visualize" id="t_melt" value="melt"/></td>
    <td id="MELT"></td>

    <th><label for="t_density" id="l_density"><span></span> <?= local("Density") ?></label></th>
    <td><input type="radio" name="visualize" id="t_density" value="density"/></td>
    <td id="DENSITY"></td>
   </tr><tr>
    <th><label for="t_boil" id="l_boil"><?= local("Boiling Point") ?></label></th>
    <td><input type="radio" name="visualize" id="t_boil" value="boil"/></td>
    <td id="BOIL"></td>

    <th><label for="t_conductivity" id="l_conductivity"><span></span> <?= local("Conductivity") ?></label></th>
    <td><input type="radio" name="visualize" id="t_conductivity" value="conductivity"/></td>
    <td id="CONDUCTIVITY"></td>
   </tr><tr>
    <th><label for="t_electroneg" id="l_electroneg"><?= local("Electronegativity") ?></label></th>
    <td><input type="radio" name="visualize" id="t_electroneg" value="electroneg"/></td>
    <td id="ELECTRONEG"></td>

    <th><label for="t_heat" id="l_heat"><span></span> <?= local("Heat") ?></label></th>
    <td><input type="radio" name="visualize" id="t_heat" value="heat"/></td>
    <td id="HEAT"></td>
   </tr><tr>
    <th><label for="t_affinity" id="l_affinity"><?= local("Electron Affinity") ?></label></th>
    <td><input type="radio" name="visualize" id="t_affinity" value="affinity"/></td>
    <td id="AFFINITY"></td>

    <th><label for="t_abundance" id="l_abundance"><span></span> <?= local("Abundance") ?></label></th>
    <td><input type="radio" name="visualize" id="t_abundance" value="abundance"/></td>
    <td id="ABUNDANCE"></td>
   </tr><tr>
    <th><label for="t_ionize" id="l_ionize"><span></span> <?= local("Ionization Energy") ?></label></th>
    <td><input type="radio" name="visualize" id="t_ionize" value="ionize"/></td>
    <td id="IONIZE"></td>

    <th><label for="t_discover" id="l_discover"><?= local("Discovered") ?></label></th>
    <td><input type="radio" name="visualize" id="t_discover" value="discover"/></td>
    <td id="DISCOVER"></td>
   </tr>
  </table>
 </form>

 <table id="Hund" cellspacing="0" cellpadding="0" border="0" style="position: relative;" align="right">
  <tbody><tr>
   <td><table><tbody>
    <tr><th>7s</th> <td><span>↑</span><span>↓</span></td></tr>
    <tr><th>6s</th> <td><span>↑</span><span>↓</span></td></tr>
    <tr><th>5s</th> <td><span>↑</span><span>↓</span></td></tr>
    <tr><th>4s</th> <td><span>↑</span><span>↓</span></td></tr>
    <tr><th>3s</th> <td><span>↑</span><span>↓</span></td></tr>
    <tr><th>2s</th> <td><span>↑</span><span>↓</span></td></tr>
    <tr><th>1s</th> <td><span>↑</span><span>↓</span></td></tr>
   </tbody></table></td>

   <td style="padding-bottom: 3.15em;"><table><tbody>
    <tr><th>7p</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>6p</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>5p</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>4p</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>3p</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>2p</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
   </tbody></table></td>

   <td style="padding-bottom: 6.3em;"><table><tbody>
    <tr><th>6d</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>5d</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>4d</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>3d</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    </tbody></table>
    <table id="lmn" cellspacing="0"><tbody>
     <tr><th align="right">l</th><td>=</td><td></td></tr>
     <tr><th align="right">m</th><td>=</td><td></td></tr>
     <tr><th align="right">n</th><td>=</td><td></td></tr>
   </tbody></table></td>

   <td style="padding-bottom: 9.45em;"><table><tbody>
    <tr><th>5f</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    <tr><th>4f</th> <td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td><td><span>↑</span><span>↓</span></td></tr>
    </tbody></table>
    <div id="Orbital"></div>
   </td>
  </tr>
 </tbody></table>

 <table id="Block" class="Block" cellspacing="5" cellpadding="0" align="right">
  <tr><th class="s">s</th></tr>
  <tr><th class="p">p</th></tr>
  <tr><th class="d">d</th></tr>
  <tr><th class="f">f</th></tr>
 </table>

 <table id="DecayModes" cellspacing="5" align="right">
  <tr>
   <th class="AlphaEmission">α</th> <td><?= local("Alpha decay") ?></td>
   <th class="BetaDecay">β</th> <td><?= local("Beta decay") ?></td>
  </tr><tr>
   <th class="ProtonEmission">p</th> <td><?= local("Proton emission") ?></td>
   <th class="BetaPlusDecay">β+</th> <td>Beta+ decay</td>
  </tr><tr>
   <th class="NeutronEmission">n</th> <td><?= local("Neutron emission") ?></td>
   <th class="ElectronCapture">EC</th> <td><?= local("Electron capture") ?></td>
  </tr><tr>
   <th class="SpontaneousFission">SF</th> <td><?= local("Spontaneous fission") ?></td>
   <th class="Stable" style="font-weight: normal;">&nbsp;<div style="position: absolute; font-size: medium;" id="isotopeholder"></div></th> <td><?= local("Stable") ?></td>
  </tr>
 </table>

</td></tr></tbody></table>
  </td>
  <td colspan="8"><div id="SliderTrack"><div id="SliderSlit"></div><div id="SliderBar"></div></div></td>
    <td colspan="2"><input id="SliderDisplay" type="text" value="0"/></td>

<? element($element[2]); ?>
  <td class="Shells"><span>K</span></td>
 </tr>

 <tr>
  <th style="font-size: 2em;">2</th>
<? for ($i = 3; $i <= 10; $i++) element($element[$i]); ?>
  <td class="Shells"><span>K<br/>L</span></td>
 </tr>

 <tr>
  <th style="font-size: 2em;">3</th>
<? for ($i = 11; $i <= 18; $i++) element($element[$i]); ?>
  <td class="Shells"><span>K<br/>L<br/>M</span></td>
 </tr>

 <tr>
  <th style="font-size: 2em;">4</th>
<? for ($i = 19; $i <= 36; $i++) element($element[$i]); ?>
  <td class="Shells"><span>K<br/>L<br/>M<br/>N</span></td>
 </tr>

 <tr>
  <th style="font-size: 2em;">5</th>
<? for ($i = 37; $i <= 54; $i++) element($element[$i]); ?>
  <td class="Shells"><span>K<br/>L<br/>M<br/>N<br/>O</span></td>
 </tr>

 <tr>
  <th style="font-size: 2em;">6</th>
<? for ($i = 55; $i <= 56; $i++) element($element[$i]); ?>
  <td class="InnerBorder BlueLeft BlueTop BlueRight" colspan="2">57–71</td>
<? for ($i = 72; $i <= 86; $i++) element($element[$i]); ?>
  <td class="Shells"><span>K<br/>L<br/>M<br/>N<br/>O<br/>P</span></td>
 </tr>

 <tr>
  <th style="font-size: 2em;">7</th>
<? for ($i = 87; $i <= 88; $i++) element($element[$i]); ?>
  <td class="InnerBorder BlueLeft BlueRight" colspan="2">89–103</td>
<? for ($i = 104; $i <= 118; $i++) element($element[$i]); ?>
  <td class="Shells"><span>K<br/>L<br/>M<br/>N<br/>O<br/>P<br/>Q</span></td>
 </tr>

 <tr style="background-color: white;">
  <td colspan="5" rowspan="2" style="text-align: center; vertical-align: bottom;"><label id="Search" for="SearchInput"><?= local("Search") ?></label><br/><input id="SearchInput" type="text" value="# or Name"/></td>
  <td class="InnerBorder BlueLeft BlueRight" colspan="2"></td>
  <td class="Paren" colspan="31" style="padding-top: 1.5em; padding-bottom: 1.5em; padding-left: 3em; font-size: 1.7em;"><?= local("Parentheses") ?></td>
 </tr>

 <tr>
  <td class="InnerBorder BlueLeft" colspan="2"></td>
  <td class="InnerBorder BlueTop BlueBottom" colspan="30"><?= local("Copyright") ?> © 1997 Michael Dayah (michael@dayah.com).<a> Visit http://www.ptable.com/ for a fully interactive experience.</a></td>
  <td class="InnerBorder BlueTop BlueRight"></td>
 </tr>

 <tr>
  <td colspan="5" rowspan="2"><a href="http://www.ptable.com/"><img src="Images/ptable-logo.png" alt="Ptable.com" id="Logo"/></a></td>
  <td class="InnerBorder BlueLeft BlueRight BlueBottom" colspan="2" rowspan="2"></td>
<? for ($i = 57; $i <= 71; $i++) element($element[$i]); ?>
  <td rowspan="2" class="InnerBorder BlueRight BlueBottom BlueLeft"></td>
 </tr>

 <tr>
<? for ($i = 89; $i <= 103; $i++) element($element[$i]); ?>
 </tr>

 </tbody>
</table>

  <div id="WikiBox">
   <h1><input type="button" onclick="destroy();" value="×"/> <?= local("Wikipedia") ?> - <a href="http://<?= $code ?>.wikipedia.org/" id="ElementName">Loading</a> - <?= local("Periodic Table") ?></h1>
   <iframe id="WikiFrame" name="WikiFrame" frameborder="0" title="Wikipedia article on element" onload="if (typeof(throbber) !== 'undefined') if (throb_atomic) finish_throb(throb_atomic, throbber);" security="restricted"><h1>Loading&hellip;</h1></iframe>
  </div>

  <noscript><p style="font-size: x-small;"><? output_links($visitor_accepted[0]["Actual"]); ?></p></noscript>
 </body>
 <input type="checkbox" id="masses">
 <input type="checkbox" id="names">
 <input type="checkbox" id="electrons">
 <input type="checkbox" id="wide">
 <a><span id="SeriesTab"></span></a>
 <a><span id="PropertyTab"></span></a>
 <a><span id="OrbitalTab"></span></a>
 <a><span id="IsotopeTab"></span></a>
 <input type="checkbox" id="langswitch">
</html>
<?
$sunset = round(date_sunset(time(), SUNFUNCS_RET_DOUBLE, apache_note("GEOIP_LATITUDE"), apache_note("GEOIP_LONGITUDE"), 96, 0), 2);
$sunrise = round(date_sunrise(time(), SUNFUNCS_RET_DOUBLE, apache_note("GEOIP_LATITUDE"), apache_note("GEOIP_LONGITUDE"), 96, 0), 2);
$now = round(date("H") + date("i") / 60 + date("s") / 3600, 2);
$handle = fopen("/var/log/dawn_dusk", "a"); fwrite($handle, time() . " " . apache_note("GEOIP_COUNTRY_CODE") . "-" . apache_note("GEOIP_REGION") . "-" . apache_note("GEOIP_CITY") . "; Dawn: " . $sunrise . " Dusk: " . $sunset . " Now: " . $now . " " . scheme() . "\n"); fclose($handle);

$debug = round((microtime(true) - $time_start) * 1000, 1);
$handle = fopen("/var/log/proc_time", "a"); fwrite($handle, $debug . "\n"); fclose($handle);
?>
