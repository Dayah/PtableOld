<?
$host = $_SERVER["REMOTE_HOST"] ? $_SERVER["REMOTE_HOST"] : $_SERVER["REMOTE_ADDR"];
$link = mysqli_connect("localhost", "colors", "redgreen", "colors") or die(mysqli_connect_error());
if (isset($_GET["admin"])) $admin = 1;
else $admin = 0;
if ($admin)	$result = mysqli_query($link, "SELECT * FROM colors;");
else		$result = mysqli_query($link, "SELECT * FROM colors WHERE host='$host';");
$matches = mysqli_num_rows($result);
$matcharray = array();
while ($row = mysqli_fetch_assoc($result))
	foreach ($row as $key=>$data)
		if ($admin)
			if ($key != "time" && $key != "host") $matcharray[$row["host"]][] = $key . "=" . substr("000000" . dechex($data), -6);
		else
			if ($key != "time" && $key != "host") $matcharray[] = $key . "=" . substr("000000" . dechex($data), -6);
?>
<!--
 Copyright (c) 2007 John Dyer (http://johndyer.name)

 Permission is hereby granted, free of charge, to any person
 obtaining a copy of this software and associated documentation
 files (the "Software"), to deal in the Software without
 restriction, including without limitation the rights to use,
 copy, modify, merge, publish, distribute, sublicense, and/or sell
 copies of the Software, and to permit persons to whom the
 Software is furnished to do so, subject to the following
 conditions:

 The above copyright notice and this permission notice shall be
 included in all copies or substantial portions of the Software.
 -->
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>Dynamic Periodic Table Color Picker</title>
  <style type="text/css">
  body, td {
   font-family: Arial;
  }
div { font-family: Arial, sans-serif; }
#ptable	td	{ height: 30px; width: 30px; text-align: center; font-weight: bold; cursor: pointer; }
.Alkali		{ background-color: #FFAA00; }
.Alkaline	{ background-color: #F3F300; }
.Lanthanoid	{ background-color: #FFAA88; }
.Actinoid	{ background-color: #DDAACC; }
.Transition	{ background-color: #DD9999; }
.Metalloid	{ background-color: #55CC88; }
.Poor		{ background-color: #99BBAA; }
.Nonmetal	{ background-color: #00EE00; }
.Halogen	{ background-color: #00DDBB; }
.Noble		{ background-color: #66AAFF; }
</style>
  <script type="text/javascript" src="./refresh_web/prototype.js"></script>
  <script type="text/javascript" src="./refresh_web/colorpicker/ColorMethods.js"></script>
  <script type="text/javascript" src="./refresh_web/colorpicker/ColorValuePicker.js"></script>
  <script type="text/javascript" src="./refresh_web/colorpicker/Slider.js"></script>
  <script type="text/javascript" src="./refresh_web/colorpicker/ColorPicker.js"></script>
<script type="text/javascript">
start_color = "DD9999";
cp1 = false;
ids = [[]];
active = "Transition";
matches = <?= $matches ?>;
matcharray = "<?= $matcharray ? implode("; ", $matcharray) : "[]" ?>";
matchstring = matcharray.split("; ");
admin = <?= $admin ? 1 : 0 ?>;

function getBGcolor(el) {
	if (el.currentStyle) return (el.currentStyle.backgroundColor.replace("#",""));
	else if (window.getComputedStyle) return (rgb2hex(getComputedStyle(el, null).getPropertyValue("background-color")));
}

function switch_colors(obj) {
	var matchstring = obj.options[obj.selectedIndex].value.split(";");
	for (var x in matchstring)
		if (typeof matchstring[x] != "function")
			document.cookie = matchstring[x] + ";";
	cookie_colors(false);
}

function rgb2hex(value) {
	var hex = "", h = /(\d+)[, ]+(\d+)[, ]+(\d+)/.exec(value);
	for (var i = 1; i <= 3; i++)
		hex += (h[i] < 16 ? "0" : "") + parseInt(String(h[i])).toString(16);
	return (hex);
}

function cookie_colors(start) {
	var theRules = document.styleSheets[0].cssRules || document.styleSheets[0].rules;
	var cookiearray = document.cookie.split("; ");
	for (var x = 0; x < theRules.length; x++)
		for (var y = 0; y < cookiearray.length; y++)
			if (theRules[x].selectorText.indexOf(cookiearray[y].split("=")[0]) !== -1 && cookiearray[y]) {
				if (cookiearray[y].split("=")[1] !== "000000")
					theRules[x].style.backgroundColor = "#" + cookiearray[y].split("=")[1];
				else
					theRules[x].style.backgroundColor = "";
				if (start === true && cookiearray[y].split("=")[0] == "Transition") start_color = cookiearray[y].split("=")[1];
			}
}

window.onload = function () {
	if (document.cookie.indexOf("Transition") == -1 && matches)
		for (var x in matchstring)
			if (typeof matchstring[x] != "function")
				document.cookie = matchstring[x] + "; expires=<?= date(DATE_RFC822, strtotime("+10 years")); ?>";
	cookie_colors(true);
	var theRules = document.styleSheets[0].cssRules || document.styleSheets[0].rules;
	cp1 = new Refresh.Web.ColorPicker('cp1',{startHex: start_color, startMode:'h'});

	var elements = document.getElementById("ptable").getElementsByTagName("td");
	for (var x = 0; x < elements.length; x++) {
		if (elements[x].className) {
			if (ids[elements[x].className])
				ids[elements[x].className].push(elements[x]);
			else
				ids[elements[x].className] = [elements[x]];
		}
	}

	for (var x in ids) {
		if (x && typeof ids[x] != "function")
		for (var y = 0; y < ids[x].length; y++) {
			ids[x][y].onclick = function () {
				active = this.className;
				document.getElementById("cp1_Hex").value = getBGcolor(this);
				cp1._cvp = new Refresh.Web.ColorValuePicker("cp1");
				cp1._cvp.color.setHex(getBGcolor(this));
				cp1.positionMapAndSliderArrows();
				cp1.updateVisuals();
			}
		}
	}
	if (admin == 0) setInterval("update()", 100);

}

function update() {
	for (var x = 0; x < ids[active].length; x++)
		ids[active][x].style.backgroundColor = "#" + document.getElementById("cp1_Hex").value;
	document.getElementById(active).value = document.getElementById("cp1_Hex").value;
}
</script>
 </head>
 <body>
 <? if ($admin) { ?>
 <form>
  <select onchange="switch_colors(this);">
  <? foreach ($matcharray as $key=>$data) { ?><option value="<?= implode(";", $data) ?>"><?= $key ?></option>
  <? } ?>
  </select>
 </form>
 <? } ?>
		<table>
			<tr>
				<td valign="top"><div id="cp1_ColorMap"></div></td>
				<td valign="top"><div id="cp1_ColorBar"></div></td>
	
				<td valign="top">
					<table>
						<tr>
							<td colspan="3">
        <div id="cp1_Preview" style="background-color: #fff; width: 66px; height: 66px; padding: 0.2em; margin: 0;">
<div style="line-height: 1; text-align: right; float: right; font-size: 8.3px;">2<br>8<br>8<br>18<br>32<br>1</div>
<div style="font-size: 12.8px;">1</div><div style="font-size: 19.2px; font-weight: bold;">H</div><div style="font-size: 9px;">Hydrogen</div><div style="font-size: 9px;">1.00794</div>
        </div>
							</td>
						</tr>
						<tr>
							<td> <input type="radio" id="cp1_HueRadio" name="cp1_Mode" value="0" /> </td>
							<td> <label for="cp1_HueRadio">H:</label> </td>
							<td> <input type="text" id="cp1_Hue" value="0" style="width: 40px;" /> &deg; </td>
						</tr>
	
						<tr>
							<td> <input type="radio" id="cp1_SaturationRadio" name="cp1_Mode" value="1" /> </td>
							<td> <label for="cp1_SaturationRadio">S:</label> </td>
							<td> <input type="text" id="cp1_Saturation" value="100" style="width: 40px;" /> % </td>
						</tr>
	
						<tr>
							<td> <input type="radio" id="cp1_BrightnessRadio" name="cp1_Mode" value="2" /> </td>
							<td> <label for="cp1_BrightnessRadio">B:</label> </td>
							<td> <input type="text" id="cp1_Brightness" value="100" style="width: 40px;" /> % </td>
						</tr>
	
						<tr>
							<td colspan="3" height="5"> </td>
						</tr>
	
						<tr>
							<td> <input type="radio" id="cp1_RedRadio" name="cp1_Mode" value="r" /> </td>
							<td> <label for="cp1_RedRadio">R:</label> </td>
							<td> <input type="text" id="cp1_Red" value="255" style="width: 40px;" /> </td>
						</tr>
	
						<tr>
							<td> <input type="radio" id="cp1_GreenRadio" name="cp1_Mode" value="g" /> </td>
							<td> <label for="cp1_GreenRadio">G:</label> </td>
							<td> <input type="text" id="cp1_Green" value="0" style="width: 40px;" /> </td>
						</tr>
	
						<tr>
							<td> <input type="radio" id="cp1_BlueRadio" name="cp1_Mode" value="b" /> </td>
							<td> <label for="cp1_BlueRadio">B:</label> </td>
							<td> <input type="text" id="cp1_Blue" value="0" style="width: 40px;" /> </td>
						</tr>
	
						<tr>
							<td> #: </td>
							<td colspan="2"> <input type="text" id="cp1_Hex" value="FF0000" style="width: 60px;" /> </td>
						</tr>
	
					</table>
				</td>
			</tr>
		</table>
		
	
	<div style="display:none;">
		<img src="refresh_web/colorpicker/images/rangearrows.gif" />
		<img src="refresh_web/colorpicker/images/mappoint.gif" />
		
		<img src="refresh_web/colorpicker/images/bar-saturation.png" />
		<img src="refresh_web/colorpicker/images/bar-brightness.png" />
		
		<img src="refresh_web/colorpicker/images/bar-blue-tl.png" />
		<img src="refresh_web/colorpicker/images/bar-blue-tr.png" />
		<img src="refresh_web/colorpicker/images/bar-blue-bl.png" />
		<img src="refresh_web/colorpicker/images/bar-blue-br.png" />
		<img src="refresh_web/colorpicker/images/bar-red-tl.png" />
		<img src="refresh_web/colorpicker/images/bar-red-tr.png" />
		<img src="refresh_web/colorpicker/images/bar-red-bl.png" />
		<img src="refresh_web/colorpicker/images/bar-red-br.png" />	
		<img src="refresh_web/colorpicker/images/bar-green-tl.png" />
		<img src="refresh_web/colorpicker/images/bar-green-tr.png" />
		<img src="refresh_web/colorpicker/images/bar-green-bl.png" />
		<img src="refresh_web/colorpicker/images/bar-green-br.png" />
		
		<img src="refresh_web/colorpicker/images/map-red-max.png" />
		<img src="refresh_web/colorpicker/images/map-red-min.png" />
		<img src="refresh_web/colorpicker/images/map-green-max.png" />
		<img src="refresh_web/colorpicker/images/map-green-min.png" />
		<img src="refresh_web/colorpicker/images/map-blue-max.png" />
		<img src="refresh_web/colorpicker/images/map-blue-min.png" />
		
		<img src="refresh_web/colorpicker/images/map-saturation.png" />
		<img src="refresh_web/colorpicker/images/map-saturation-overlay.png" />
		<img src="refresh_web/colorpicker/images/map-brightness.png" />
		<img src="refresh_web/colorpicker/images/map-hue.png" />
	</div>
	
 <table id="ptable" cellspacing=3 border=0 cellpadding=0>
<tr>
 <td class="Nonmetal">H</td>
 <td colspan=12></td>
 <td class="Noble">He</td>
</tr>
<tr>
 <td class="Alkali">Li</td>
 <td class="Alkaline">Be</td>
 <td colspan=6 rowspan=2></td>
 <td class="Metalloid">B</td>
 <td class="Nonmetal">C</td>
 <td class="Nonmetal">N</td>
 <td class="Nonmetal">O</td>
 <td class="Halogen">F</td>
 <td class="Noble">Ne</td>
</tr>
<tr>
 <td class="Alkali">Na</td>
 <td class="Alkaline">Mg</td>
 <td class="Poor">Al</td>
 <td class="Metalloid">Si</td>
 <td class="Nonmetal">P</td>
 <td class="Nonmetal">S</td>
 <td class="Halogen">Cl</td>
 <td class="Noble">Ar</td>
</tr>
<tr>
 <td class="Alkali">K</td>
 <td class="Alkaline">Ca</td>
 <td class="Transition">Sc</td>
 <td class="Transition">Ti</td>
 <td class="Transition">V</td>
 <td class="Transition">Cr</td>
 <td class="Transition">Mn</td>
 <td class="Transition">Fe</td>
 <td class="Poor">Ga</td>
 <td class="Metalloid">Ge</td>
 <td class="Metalloid">As</td>
 <td class="Nonmetal">Se</td>
 <td class="Halogen">Br</td>
 <td class="Noble">Kr</td>
</tr>
<tr>
 <td class="Alkali">Rb</td>
 <td class="Alkaline">Sr</td>
 <td class="Transition">Y</td>
 <td class="Transition">Zr</td>
 <td class="Transition">Nb</td>
 <td class="Transition">Mo</td>
 <td class="Transition">Tc</td>
 <td class="Transition">Ru</td>
 <td class="Poor">In</td>
 <td class="Poor">Sn</td>
 <td class="Metalloid">Sb</td>
 <td class="Metalloid">Te</td>
 <td class="Halogen">I</td>
 <td class="Noble">Xe</td>
</tr>
<tr>
 <td class="Alkali">Cs</td>
 <td class="Alkaline">Ba</td>
 <td style="background-color: blue;" rowspan=5></td>
 <td class="Transition">Hf</td>
 <td class="Transition">Ta</td>
 <td class="Transition">W</td>
 <td class="Transition">Re</td>
 <td class="Transition">Os</td>
 <td class="Poor">Tl</td>
 <td class="Poor">Pb</td>
 <td class="Poor">Bi</td>
 <td class="Metalloid">Po</td>
 <td class="Halogen">At</td>
 <td class="Noble">Rn</td>
</tr>
<tr>
 <td class="Alkali">Fr</td>
 <td class="Alkaline">Ra</td>
 <td class="Transition">Rf</td>
 <td class="Transition">Db</td>
 <td class="Transition">Sg</td>
 <td class="Transition">Bh</td>
 <td class="Transition">Hs</td>
 <td class="Poor">Ab</td>
 <td class="Poor">Cd</td>
 <td class="Poor">Ef</td>
 <td class="Poor">Gh</td>
 <td>Ij</td>
 <td class="Noble">Kl</td>
</tr>
<tr><td height=20></td></tr>
<tr>
 <td colspan=2 rowspan=2></td>
 <td class="Lanthanoid">La</td>
 <td class="Lanthanoid">Ce</td>
 <td class="Lanthanoid">Pr</td>
 <td class="Lanthanoid">Nd</td>
 <td class="Lanthanoid">Pm</td>
 <td class="Lanthanoid">Sm</td>
 <td class="Lanthanoid">Eu</td>
 <td class="Lanthanoid">Gd</td>
 <td class="Lanthanoid">Tb</td>
 <td class="Lanthanoid">Dy</td>
 <td class="Lanthanoid">Ho</td>
</tr>
<tr>
 <td class="Actinoid">Ac</td>
 <td class="Actinoid">Th</td>
 <td class="Actinoid">Pa</td>
 <td class="Actinoid">U</td>
 <td class="Actinoid">Np</td>
 <td class="Actinoid">Pu</td>
 <td class="Actinoid">Am</td>
 <td class="Actinoid">Cm</td>
 <td class="Actinoid">Bk</td>
 <td class="Actinoid">Cf</td>
 <td class="Actinoid">Es</td>
</tr>
</table>


<form id="final" method="get" action="http://www.dayah.com/periodic/savecolors.php">
 <input type="hidden" name="Alkali" id="Alkali">
 <input type="hidden" name="Alkaline" id="Alkaline">
 <input type="hidden" name="Lanthanoid" id="Lanthanoid">
 <input type="hidden" name="Actinoid" id="Actinoid">
 <input type="hidden" name="Transition" id="Transition">
 <input type="hidden" name="Metalloid" id="Metalloid">
 <input type="hidden" name="Poor" id="Poor">
 <input type="hidden" name="Nonmetal" id="Nonmetal">
 <input type="hidden" name="Halogen" id="Halogen">
 <input type="hidden" name="Noble" id="Noble">
 <input type="submit">
</form>
<a href="./">Periodic Table</a>
</body>
</html>
