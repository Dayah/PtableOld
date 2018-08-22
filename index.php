<? $time_start = microtime(true);
$handle = fopen("/var/log/cache_miss", "a"); fwrite($handle, date("Y-m-d H:i:s") . " index.php\n"); fclose($handle);
/* if (array_key_exists("HTTP_IF_MODIFIED_SINCE", $_SERVER) && !strpos($_SERVER["HTTP_USER_AGENT"], "Googlebot")) {
	header("HTTP/1.1 304 Not Modified");
	$handle = fopen("/var/log/last_modified", "a"); fwrite($handle, $_SERVER["HTTP_IF_MODIFIED_SINCE"] . "\n"); fclose($handle);
	exit;
} */
header("Last-Modified: " . date("D, d M Y H:i:s", getlastmod()) . " GMT");
//if (isset($_SERVER["HTTP_ACCEPT"]) && stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) header("Content-Type: application/xhtml+xml");
date_default_timezone_set("GMT");
require("Script/lang_detect.php");
$code = substr($visitor_accepted[0]["Actual"], 0, 2);
if (array_key_exists("scheme", $_GET)) $scheme = $_GET["scheme"]; else $scheme = "day";//scheme();
echo pack("CCC", 0xEF,0xBB,0xBF);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title><?= (local("Title")) ? local("Title") : local("Periodic Table") . " (" . local("EnglishName") . " Periodic Table)" ?></title>

  <meta name="description" content="<?= local("Description") ?>"/>
  <meta name="keywords" content="<?= local("Periodic Table") ?>, dynamic, interactive, elements, name, chemistry, printable, homework, pdf, electron configuration"/>
  <link rel="alternate" type="application/rss+xml" href="discovery.xml" title="Discovered elements"/>

  <link href="Style/screen-default.css" rel="stylesheet" type="text/css" media="screen, print"/>
  <link href="Style/screen-noelectron.<?= ($_SERVER["REMOTE_HOST"] == "dayah.com" ? "css" : "php") ?>" rel="alternate stylesheet" type="text/css" media="screen, print" title="Atomic, Symbol, Name, Weight"/>
  <link href="Style/screen-noname.<?= ($_SERVER["REMOTE_HOST"] == "dayah.com" ? "css" : "php") ?>" rel="alternate stylesheet" type="text/css" media="screen, print" title="Atomic, Symbol, Weight"/>
  <link href="Style/screen-nomass.<?= ($_SERVER["REMOTE_HOST"] == "dayah.com" ? "css" : "php") ?>" rel="alternate stylesheet" type="text/css" media="screen, print" title="Atomic, Symbol"/>
<? if ($scheme == "night") { ?>  <link href="Style/screen-night.css" rel="stylesheet" type="text/css" media="screen"/><? } ?>
<? if ($rtl) { ?>
  <style type="text/css" media="screen, print">
<? include("Style/rtl.css"); ?>
  </style>
<? } ?>
  <link href="Style/print-default.css" rel="stylesheet" type="text/css" media="print"/>

  <script type="text/javascript">
  //<![CDATA[
if (top != self && document.referrer.indexOf("images.google") === -1 && document.referrer.indexOf("stumbleupon.com") === -1) top.location.replace(self.location.href);
language = "<?= $code ?>"; scheme = "<?= $scheme ?>"; rtl = "<?= $rtl ?>"; throb_atomic = false;
microsoft_adunitid="3834"; microsoft_adunit_width="468"; microsoft_adunit_height="60"; microsoft_adunit_legacy="false";
  //]]>
  </script>

  <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon"/>

 </head>
 <body><div id="NonFooter">
  <h1><a href="./" id="Reset"><?= local("Periodic Table of Elements") ?></a></h1>

  <div id="Tabs"<? // ($rtl) ? " dir=\"rtl\"" : "" ?>>
   <div class="Bevel" style="position: absolute; left: 0; bottom: 0; background-position: 0 -20px;"></div>
   <div class="Bevel" style="position: absolute; right: 0; bottom: 0; background-position: -20px -20px;"></div>
   <table border="0" cellspacing="0" cellpadding="0" style="width: 100%; white-space: nowrap;"><tr><td style="width: 50%; vertical-align: bottom;">
   <span id="SeriesTab"><!--<select><option>Wikipedia<option>WebElements<option>Videos</select>--><?= local("Wikipedia") ?></span>
   <span id="PropertyTab"><?= local("Properties") ?></span>
   <span id="OrbitalTab"><?= local("Orbitals") ?></span>
   <span id="IsotopeTab"><?= local("Isotopes") ?></span>
   </td><td style="width: 50%;">
   <a class="Selected"><input type="checkbox" checked="checked" id="Weight"/><label for="Weight" title="Show atomic masses"><?= local("Weight") ?></label></a>
   <a class="Selected"><input type="checkbox" checked="checked" id="Name"/><label for="Name" title="Show element names"><?= local("Names") ?></label></a>
   <a class="Selected"><input type="checkbox" checked="checked" id="Electrons"/><label for="Electrons" title="Show electron configurations"><?= local("Electrons") ?></label></a>
   <a><input type="checkbox" id="wide"/><label for="wide" title="Show rare earth elements inline"><?= local("Wide") ?></label></a>
   </td></tr></table>
  </div>

<? if (1 || apache_note("GEOIP_REGION") . apache_note("GEOIP_CITY") != "TNKnoxville") { ?>
  <div id="Ad">
   <button onclick="this.parentNode.style.display = 'none'; set_cookie('hideads', 1);" style="position: absolute; top: 0; right: 0;">×</button>
<!-- This periodic table is far more featureful and interactive than even the most complex standalone applications. <b>Please take a moment to <a href="#" onclick="return load_script('demo');">watch a demo</a></b> or <a href="about.html#unique">read about its unique features</a>.-->
   <script type="text/javascript" src="http://adsyndication.msn.com/delivery/getads.js"></script>
   <script type="text/javascript">microsoft_adunitid="3851"; microsoft_adunit_width="468"; microsoft_adunit_height="60"; microsoft_adunit_legacy="false";</script>
   <script type="text/javascript" src="http://adsyndication.msn.com/delivery/getads.js"></script>
  </div>
<? } ?>

<table class="Alkali Alkaline Lanthanoid Actinoid Transition Poor Metalloid Nonmetal Halogen Noble" id="Main" summary="periodic table" border="0" cellspacing="0">
 <thead>
 <tr>
  <td class="IsoHolder"><div style="position: absolute; font-size: medium; z-index: 3;" id="isotopeholder" class="AlphaEmission ProtonEmission TwoProtonEmission NeutronEmission TwoNeutronEmission SpontaneousFission BetaDecay DoubleBetaDecay BetaPlusDecay DoubleBetaPlusDecay ElectronCapture Stable"></div></td>
<? for ($x = 1; $x <= 18; $x++) echo '  <td><a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", $x, local("Group")) . '">' . $x . "</a></td>\n"; ?>
 </tr>
 </thead>

 <tbody>
 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 1, local("Period")) . '">1</a>' ?></th>
<? element($element[1]); ?>

  <td id="Legend"><big><strong><?= local("Atomic number") ?></strong> <acronym><?= local("Symbol") ?></acronym> <em><?= local("Name") ?></em> <i><?= local("Atomic weight") ?></i></big></td>

  <td class="Clean KeyRegion" colspan="10" rowspan="3">
   <table id="KeyContainer" border="0" cellspacing="0" cellpadding="0"><tbody><tr><td id="CloseupHolder">

 <div id="Closeup"><div id="CloseupElement"><br/><br/></div><div id="ELECTRONSTRING" style="text-align: center;"></div></div>

 <table id="MatterState" cellspacing="5" cellpadding="0"><tbody>
  <tr>
   <td class="Solid"><acronym><?= ($code != "zh") ? $element[6]["symbol"] : $visitor_lang[6] ?></acronym></td>
   <th class="Solid"><?= local("Solid") ?></th>
  </tr>
  <tr>
   <td class="Liquid"><acronym><?= ($code != "zh") ? $element[80]["symbol"] : $visitor_lang[80] ?></acronym></td>
   <th class="Liquid"><?= local("Liquid") ?></th>
  </tr>
  <tr>
   <td class="Gas"><acronym><?= ($code != "zh") ? $element[1]["symbol"] : $visitor_lang[1] ?></acronym></td>
   <th class="Gas"><?= local("Gas") ?></th>
  </tr>
  <tr>
   <td class="Unknown"><acronym><?= ($code != "zh") ? $element[104]["symbol"] : $visitor_lang[104] ?></acronym></td>
   <th class="Unknown"><?= local("Unknown") ?></th>
  </tr>
 </tbody></table>

 <form name="isotopes" id="IsotopeForm" action="">
  <table cellspacing="0" cellpadding="0">
   <tr>
    <td><input type="radio" name="isotopes" id="t_isoname" value="isoname" checked="checked"/></td>
    <th><label for="t_isoname" id="l_isoname">Name</label></th>
    <td id="ISONAME"><span></span><span></span></td>
   </tr><tr>
    <td><input type="radio" name="isotopes" id="t_isomass" value="isomass"/></td>
    <th><label for="t_isomass" id="l_isomass">Mass</label></th>
    <td id="ISOMASS"></td>
   </tr><tr>
    <td><input type="radio" name="isotopes" id="t_binding" value="binding"/></td>
    <th><label for="t_binding" id="l_binding">Binding Energy</label></th>
    <td id="BINDING"></td>
   </tr><tr>
    <td><input type="radio" name="isotopes" id="t_masscontrib" value="masscontrib"/></td>
    <th><label for="t_masscontrib" id="l_masscontrib">Abundance</label></th>
    <td id="MASSCONTRIB"></td>
   </tr><tr>
    <td><input type="radio" name="isotopes" id="t_halflife" value="halflife"/></td>
    <th><label for="t_halflife" id="l_halflife">Half-Life</label></th>
    <td id="HALFLIFE"></td>
   </tr><tr>
    <td><input type="radio" name="isotopes" id="t_width" value="width"/></td>
    <th><label for="t_width" id="l_width">Decay Width</label></th>
    <td id="WIDTH"></td>
   </tr>
  </table>
 </form>

</td><td>

 <table id="Series" class="Series" cellspacing="4" align="right">
  <tbody><tr>
   <th colspan="5"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Metals") ?>"><?= local("Metals") ?></a></th>
   <td id="Metalloid" class="Metalloid" rowspan="3" style="font-weight: bold;"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Metalloids") ?>"><?= local("Metalloids") ?></a></td>
   <th colspan="3"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Nonmetals") ?>"><?= local("Nonmetals") ?></a></th>
  </tr><tr>
   <td id="Alkali" class="Alkali" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Alkali metals") ?>"><?= local("Alkali metals") ?></a></td>
   <td id="Alkaline" class="Alkaline" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Alkaline earth metals") ?>"><?= local("Alkaline earth metals") ?></a></td>
   <td id="Lanthanoid" class="Lanthanoid" style="writing-mode: lr-tb; letter-spacing: -1px;"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Lanthanoids") ?>"><?= local("Lanthanoids") ?></a></td>
   <td id="Transition" class="Transition" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Transition metals") ?>"><?= local("Transition metals") ?></a></td>
   <td id="Poor" class="Poor" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Post-transition metals") ?>"><?= local("Post-transition metals") ?></a></td>
   <td id="Nonmetal" class="Nonmetal" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Other nonmetals") ?>"><?= local("Other nonmetals") ?></a></td>
   <td id="Halogen" class="Halogen" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Halogens") ?>"><?= local("Halogens") ?></a></td>
   <td id="Noble" class="Noble" rowspan="2"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Noble gases") ?>"><?= local("Noble gases") ?></a></td>
  </tr><tr>
   <td id="Actinoid" class="Actinoid" style="writing-mode: lr-tb; letter-spacing: -1px;"><a href="http://<?= $code ?>.wikipedia.org/wiki/<?= local("Actinoids") ?>"><?= local("Actinoids") ?></a></td>
  </tr></tbody>
 </table>

 <table id="Temperature" align="right">
  <tr><td></td> <th><?= local("Kelvin") ?></th></tr>
  <tr><td></td> <th>°<?= local("Celsius") ?></th></tr>
  <tr><td></td> <th>°<?= local("Fahrenheit") ?></th></tr>
 </table>

 <div id="Properties" style="position: relative; height: 1%;"><form name="visualize" action="">
  <table cellspacing="0" cellpadding="0" align="right" style="border-left: 1px solid #999;">
   <tr>
    <td><input type="radio" name="visualize" id="t_radius" value="radius"/></td>
    <th><label for="t_radius" id="l_radius"><span></span> <?= local("Radius") ?></label></th>
    <td id="RADIUS"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_hardness" value="hardness"/></td>
    <th><label for="t_hardness" id="l_hardness"><span></span> <?= local("Hardness") ?></label></th>
    <td id="HARDNESS"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_modulus" value="modulus"/></td>
    <th><label for="t_modulus" id="l_modulus"><span></span> <?= local("Modulus") ?></label></th>
    <td id="MODULUS"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_density" value="density"/></td>
    <th><label for="t_density" id="l_density"><span></span> <?= local("Density") ?></label></th>
    <td id="DENSITY"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_conductivity" value="conductivity"/></td>
    <th><label for="t_conductivity" id="l_conductivity"><span></span> <?= local("Conductivity") ?></label></th>
    <td id="CONDUCTIVITY"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_heat" value="heat"/></td>
    <th><label for="t_heat" id="l_heat"><span></span> <?= local("Heat") ?></label></th>
    <td id="HEAT"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_abundance" value="abundance"/></td>
    <th><label for="t_abundance" id="l_abundance"><span></span> <?= local("Abundance") ?></label></th>
    <td id="ABUNDANCE"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_discover" value="discover"/></td>
    <th><label for="t_discover" id="l_discover"><?= local("Discovered") ?></label></th>
    <td id="DISCOVER"></td>
   </tr>
  </table>
  <table cellspacing="0" cellpadding="0">
   <tr>
    <td><input type="radio" name="visualize" id="t_chemical" value="chemical" checked="checked"/></td>
    <th><label for="t_chemical" id="l_chemical"><span></span> <?= local("Series") ?></label></th>
    <td id="CHEMICAL"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_state" value="state"/></td>
    <th><label for="t_state" id="l_state"><?= local("State At") ?> <span></span></label></th>
    <td id="STATE"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_melt" value="melt"/></td>
    <th><label for="t_melt" id="l_melt"><?= local("Melting Point") ?></label></th>
    <td id="MELT"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_boil" value="boil"/></td>
    <th><label for="t_boil" id="l_boil"><?= local("Boiling Point") ?></label></th>
    <td id="BOIL"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_electroneg" value="electroneg"/></td>
    <th><label for="t_electroneg" id="l_electroneg"><?= local("Electronegativity") ?></label></th>
    <td id="ELECTRONEG"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_affinity" value="affinity"/></td>
    <th><label for="t_affinity" id="l_affinity"><?= local("Electron Affinity") ?></label></th>
    <td id="AFFINITY"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_valence" value="valence"/></td>
    <th><label for="t_valence" id="l_valence"><span></span> <?= local("Valence") ?></label></th>
    <td id="VALENCE"></td>
   </tr><tr>
    <td><input type="radio" name="visualize" id="t_ionize" value="ionize"/></td>
    <th><label for="t_ionize" id="l_ionize"><span></span> <?= local("Ionization Energy") ?></label></th>
    <td id="IONIZE"></td>
   </tr>
  </table>
 </form></div>

 <table id="Hund" cellspacing="0" cellpadding="0" border="0" style="position: relative;" align="right">
  <tbody><tr>
   <td><table border="0" cellpadding="1" cellspacing="1"><tbody>
    <tr><th>7s</th> <td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>6s</th> <td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>5s</th> <td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>4s</th> <td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>3s</th> <td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>2s</th> <td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>1s</th> <td><span>↿</span><span>⇂</span></td></tr>
   </tbody></table></td>

   <td style="padding-bottom: 3.15em;"><table border="0" cellpadding="1" cellspacing="1"><tbody>
    <tr><th>7p</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>6p</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>5p</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>4p</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>3p</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>2p</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
   </tbody></table></td>

   <td style="padding-bottom: 6.3em;"><table border="0" cellpadding="1" cellspacing="1"><tbody>
    <tr><th>6d</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>5d</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>4d</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>3d</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    </tbody></table>
    <table id="lmn" cellspacing="0"><tbody>
     <tr><th align="right">l</th><td>=</td><td style="width: 1em;"></td></tr>
     <tr><th align="right">m</th><td>=</td><td></td></tr>
     <tr><th align="right">n</th><td>=</td><td></td></tr>
   </tbody></table></td>

   <td style="padding-bottom: 9.45em;" id="OrbitalHolder"><table border="0" cellpadding="1" cellspacing="1"><tbody>
    <tr><th>5f</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    <tr><th>4f</th> <td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td><td><span>↿</span><span>⇂</span></td></tr>
    </tbody></table>
    <div id="Orbital"></div>
   </td>
  </tr>
 </tbody></table>

 <table id="Block" class="Block" cellspacing="5" cellpadding="0" align="right"><tbody>
  <tr><th id="s" class="s">s</th></tr>
  <tr><th id="p" class="p">p</th></tr>
  <tr><th id="d" class="d">d</th></tr>
  <tr><th id="f" class="f">f</th></tr>
 </tbody></table>

 <table id="DecayModes" class="AlphaEmission ProtonEmission TwoProtonEmission NeutronEmission TwoNeutronEmission SpontaneousFission BetaDecay DoubleBetaDecay BetaPlusDecay DoubleBetaPlusDecay ElectronCapture Stable" cellspacing="5" align="right">
  <tr>
   <th class="AlphaEmission">α</th> <td><?= local("Alpha decay") ?></td>
   <th class="DoubleBetaDecay BetaDecay">β</th> <td><?= local("Beta decay") ?></td>
  </tr><tr>
   <th class="TwoProtonEmission ProtonEmission">p</th> <td><?= local("Proton emission") ?></td>
   <th class="DoubleBetaPlusDecay BetaPlusDecay">β+</th> <td>Beta+ decay</td>
  </tr><tr>
   <th class="TwoNeutronEmission NeutronEmission">n</th> <td><?= local("Neutron emission") ?></td>
   <th class="ElectronCapture">EC</th> <td><?= local("Electron capture") ?></td>
  </tr><tr>
   <th class="SpontaneousFission">SF</th> <td><?= local("Spontaneous fission") ?></td>
   <th class="Stable"> </th> <td><?= local("Stable") ?></td>
  </tr>
 </table>

</td></tr></tbody></table>
  </td>

  <td colspan="5" id="SliderCell">
   <div style="position: relative; width: 100%; height: 2.5em; overflow: hidden;">
    <div style="position: absolute; top: 0; width: 100%; height: 100%;">
     <div style="width: 100%; height: 100%;">
      <div id="SliderTrack" class="SliderTrack"><div id="SliderSlit" class="SliderSlit"></div><button id="SliderBar" class="SliderBar"></button></div>
      <input id="SliderDisplay" class="SliderDisplay" type="text" value="0"/>
     </div>
    </div>
   </div>
  </td>

<? element($element[2]); ?>
  <td class="Shells"><small>K</small></td>
 </tr>

 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 2, local("Period")) . '">2</a>' ?></th>
<? for ($i = 3; $i <= 10; $i++) element($element[$i]); ?>
  <td class="Shells"><small>K<br/>L</small></td>
 </tr>

 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 3, local("Period")) . '">3</a>' ?></th>
<? for ($i = 11; $i <= 18; $i++) element($element[$i]); ?>
  <td class="Shells"><small>K<br/>L<br/>M</small></td>
 </tr>

 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 4, local("Period")) . '">4</a>' ?></th>
<? for ($i = 19; $i <= 36; $i++) element($element[$i]); ?>
  <td class="Shells"><small>K<br/>L<br/>M<br/>N</small></td>
 </tr>

 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 5, local("Period")) . '">5</a>' ?></th>
<? for ($i = 37; $i <= 54; $i++) element($element[$i]); ?>
  <td class="Shells"><small>K<br/>L<br/>M<br/>N<br/>O</small></td>
 </tr>

 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 6, local("Period")) . '">6</a>' ?></th>
<? for ($i = 55; $i <= 56; $i++) element($element[$i]); ?>
  <td class="Lanthanoid InnerBorder BlueLeft BlueTop BlueRight">57–71</td>
<? for ($i = 72; $i <= 86; $i++) element($element[$i]); ?>
  <td class="Shells"><small>K<br/>L<br/>M<br/>N<br/>O<br/>P</small></td>
 </tr>

 <tr>
  <th class="Period"><?= '<a href="http://' . $code . '.wikipedia.org/wiki/' . str_replace("%", 7, local("Period")) . '">7</a>' ?></th>
<? for ($i = 87; $i <= 88; $i++) element($element[$i]); ?>
  <td class="Actinoid InnerBorder BlueLeft BlueRight">89–103</td>
<? for ($i = 104; $i <= 118; $i++) element($element[$i]); ?>
  <td class="Shells"><small>K<br/>L<br/>M<br/>N<br/>O<br/>P<br/>Q</small></td>
 </tr>

 <tr>
  <td id="SearchArea" colspan="3" rowspan="2"><label id="Search" for="SearchInput"><?= local("Search") ?></label><br/><input id="SearchInput" type="text" value="# or Name"/></td>
  <td class="InnerBorder BlueLeft BlueRight"></td>
  <td class="Paren" colspan="16"><?= local("Parentheses") ?></td>
 </tr>

 <tr>
  <td class="InnerBorder BlueLeft"></td>
  <td class="InnerBorder BlueTop BlueBottom" colspan="15"><span><?= local("Periodic Table") ?> <?= local("Copyright") ?> © 1997 Michael Dayah. http://www.ptable.com/ <?= local("Last updated") ?>: <?= date("F d, Y", getlastmod()) ?></span> </td>
  <td class="InnerBorder BlueTop BlueRight"></td>
 </tr>

 <tr>
  <td colspan="3" rowspan="2"><a href="link.php?lang=<?= $visitor_accepted[0]["Actual"] ?>"><img src="http://www.eehtpc.com/ptable/ptable-logo.png" alt="Ptable.com" id="Logo"/></a></td>
  <td class="InnerBorder BlueLeft BlueRight BlueBottom" rowspan="2"></td>
<? for ($i = 57; $i <= 71; $i++) element($element[$i]); ?>
  <td rowspan="2" class="InnerBorder BlueRight BlueBottom BlueLeft"></td>
 </tr>

 <tr>
<? for ($i = 89; $i <= 103; $i++) element($element[$i]); ?>
 </tr>

 </tbody>
</table>

  <noscript><p style="font-size: x-small;"><? output_links($visitor_accepted[0]["Actual"]); ?>
  <a href="http://www.webelements.com/">WebElements</a> | <a href="http://www.touchspin.com/chem/DisplayTable.html">Touchspin</a> | <a href="http://www.periodicvideos.com/">Videos</a> | <a href="http://old.iupac.org/reports/periodic_table/">IUPAC</a> | <a href="http://www.bookrags.com/periodictable/">BookRags</a> | <a href="http://www.meta-synthesis.com/webbook/35_pt/pt.html">Alternate layouts</a> | <a href="http://www.johnpratt.com/atomic/periodic.html">Mnemonics</a> | <a href="http://www.rsc.org/chemsoc/visualelements/pages/periodic_table.html">Royal Society</a></p></noscript>
  <div id="FooterPad"></div>
</div>

  <div id="Navigation">
   <div class="Bevel" style="float: left; background-position: 0 0;"></div>
   <div class="Bevel" style="float: right; background-position: -20px 0;"></div>
<span class="Media"><? if ($code == "en") {
   ?><a href="Other/Periodic Table.pdf" title="US paper size (8.5×11 in) printable PDF"><?= local("Periodic Table") ?> PDF</a><? /*
   <a href="Other/Legal Periodic Table.pdf" title="US wide paper size (8.5×14 in) printable PDF">PDF (Legal)</a>
   <a href="Other/A4 Periodic Table.pdf" title="European paper size (210×297 mm) printable PDF">PDF (A4)</a>
   */
   } else {
   ?><a href="translation.php?lang=<?= $visitor_accepted[0]["Actual"] ?>" title="Please help me translate this page to your language" style="font-weight: bold;">Help Translate This Page!</a>
<? } ?><a href="Images/<?= mb_strtolower(local("Periodic Table"), mb_detect_encoding(local("Periodic Table"))) ?>.png" title="<?= local("Periodic Table") ?> image"><?= local("Periodic Table") ?> PNG</a></span><?
   ?><span class="Internal"><a href="about.html" title="Questions about this particular periodic table"><?= local("About") ?></a><?
   ?><a href="http://forum.ptable.com/" title="Chemistry forum">Forum</a><?
   ?><a href="feedback.html" title="Contact the designer"><?= local("Contact") ?></a><? /*
   ?><a href="advertise-to-students.php" title="Advertise to students on this site"><?= local("Advertise") ?></a><? */
   ?><a href="periodic-table-poster.html" title="Buy a periodic table poster">Poster</a><?
   ?><a href="#" onclick="return load_script('demo');" title="Short demonstration of Ptable's features">Demo</a><span id="StopDemo" style="display: none;"> [<a href="#" onclick="location.reload(false);">Stop</a>]</span></span><?
   ?><span class="Social"><a id="delicious" href="http://del.icio.us/post?url=www.dayah.com/periodic/;title=<?= urlencode(local("Periodic Table of Elements")) ?>;notes=<?= urlencode(local("Description")) ?>">delicious</a><?
   ?><a id="facebook" href="http://www.facebook.com/pages/Periodic-Table/7329016582">Facebook</a><?
   ?><a id="twitter" href="http://twitter.com/Ptable">Twitter</a></span>
   <form name="language" method="get" action="http://www.ptable.com/" id="langswitch"><select name="lang"><?= choose_lang($visitor_accepted[0]["Actual"]); ?></select><? if (array_key_exists("scheme", $_GET)) { ?><input type="hidden" name="scheme" value="<?= $scheme ?>"/><? } ?><input type="submit" value="OK"/></form>
<!-- <a href="#" onclick="return load_script('song');" title="Song">Song</a> -->
  </div>

  <div id="WikiBox">
   <h1 id="WikiTitle"><button onclick="setTimeout(destroy, Math.floor(Math.random() * 3) || document.getElementById('Ad').style.display == 'none' ? 0 : 500);">×</button> <?= local("Wikipedia") ?> - <a href="http://<?= $code ?>.wikipedia.org/" id="ElementName">Loading</a> - <?= local("Periodic Table") ?></h1>
   <div id="WikiFrameBox"><iframe id="WikiFrame" name="WikiFrame" frameborder="0" title="Wikipedia article on element" security="restricted"><h1>Loading…</h1></iframe></div>
  </div><div id="Overlay"></div>
  <script type="text/javascript" src="Script/interactivity.<?= ($_SERVER["REMOTE_HOST"] == "dayah.com" ? "js" : "php") ?>"></script>
<!--  <script type="text/javascript" src="http://www.google-analytics.com/ga.js"></script>
  <script type="text/javascript">var pageTracker = _gat._getTracker("UA-99745-1"); pageTracker._trackPageview();</script>
  <script type="text/javascript" src="http://www.dayah.com/clickheat/js/clickheat.js"></script>
  <script type="text/javascript">clickHeatSite = 'Ptable'; clickHeatGroup = 'main'; clickHeatServer = 'http://www.dayah.com/clickheat/click.php'; initClickHeat();</script> -->
 </body>
</html>
<?
$handle = fopen("/var/log/dawn_dusk", "a"); fwrite($handle, time() . " " . round((microtime(true) - $time_start) * 1000, 1) . " " . apache_note("GEOIP_COUNTRY_CODE") . "-" . apache_note("GEOIP_REGION") . "-" . apache_note("GEOIP_CITY") . "; Dawn: " . round($sunrise, 2) . " Dusk: " . round($sunset, 2) . " Now: " . round($now, 2) . " " . scheme() . "\n"); fclose($handle);
?>
