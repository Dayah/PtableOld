<? 
$handle = fopen("/var/log/cache_miss", "a"); fwrite($handle, date("Y-m-d H:i:s") . " interactivity.php\n"); fclose($handle);
// pack("CCC", 0xEF,0xBB,0xBF);
?>
if (document.addEventListener) // when defer works across browsers, ditch all this, until then you can't because 3.1 fires ondomready before deferred scripts load
	document.addEventListener("DOMContentLoaded", load_complete, false);
//else if (/*@cc_on @_jscript || @*/ false)
//	load_complete();
else
	window.onload = load_complete;

function benchmark() {
	var view_start, x, y;
	view_start = (new Date()).getTime();
	for (x = 0; x < 5; x++)
		for (y = 0; y <= 118; y++)
			on_mouse_over(y);
	alert((new Date()).getTime() - view_start);
}

window.onunload = function () {
	set_cookie("temperature", temperature);
//	if (searchinput.value !== searchinput.def) set_cookie("SearchInput", searchinput.value);
}

function load_complete() {
	var cookiearray = get_cookies(), temp, i, x, el, tds;
	if (!document.getElementById("Ad").getElementsByTagName("iframe").length || cookiearray["hideads"] == 1)
		document.getElementById("Ad").style.display = "none";

	if (scheme === "day")	statecolors = [{"Unknown": "#667766", "Gas": "#AA0000", "Liquid": "#0000DD", "Solid": "#000000"},{"Unknown": "#667766", "Gas": "#AA0000", "Liquid": "#0000DD", "Solid": "#000000"}];
	else 					statecolors = [{"Unknown": "#99AA99", "Gas": "#FFAAAA", "Liquid": "#AAAAFF", "Solid": "#FFFFFF"},{"Unknown": "#667766", "Gas": "#AA0000", "Liquid": "#0000DD", "Solid": "#222222"}];
	n_atomic = 0; n_name = (language == "zh") ? 2 : 4; n_symbol = 2; n_mass = 6;
	n_big = rtl ? 1 : 0;
	n_small = rtl ? 0 : 1;
	i_selected = 0; i_neutrons = 1, i_isomass = 2, i_binding = 3, i_masscontrib = 4, i_halflife = 5, i_decaymode = 6, i_width = 7, i_wiki = 8;
	schemebase = (scheme === "night" ? "000000" : "FFFFFF");
	schemehigh = (scheme === "night" ? "FFFFFF" : "000000");
	highlight = calc_color(1, schemebase, "FFFF00", 0, 2);

	flash_ids = [], flash_num = 0, flash_value = 0;
	slider_data = [];
	sliding = false;
	lastSeries = false;
	lastDetach = false;
	lastIsotope = false;
	isotope_intervals = [];
	locked = false;
	from = false; to = false;
	lastOrbital = false;
	hovered_state = false;
	oldYellow = false;
	active = false;
	waiting = false;
	resizewidth = document.documentElement.clientWidth;
	resizeheight = document.documentElement.clientHeight;
	firstDetails = true;
	dataset = "series";
	isoset = "isomass";
	tab = "SeriesTab";
	winlist = [];
	animation_steps = 10, aniX = 0;
	iMove = 0, delay = 0;
	key_next = false;

	cache_objects();
	searchinput.def = searchinput.value;
//	if (cookiearray["SearchInput"]) searchinput.value = cookiearray["SearchInput"];
	wholetable.inverted = false;
	allclasses = wholetable.className;
	allmodes = document.getElementById("DecayModes").className;
	aufbau = [];
	temp = document.getElementById("Hund").tBodies[0].rows[0].cells, x;
	for (x = 0; x < temp.length; x++) aufbau.push(temp[x].getElementsByTagName("table")[0].getElementsByTagName("th"));
	
	temperature = cookiearray["temperature"] ? cookiearray["temperature"] * 1 : 273;
	attach_class_hovers();
//	if (!("writingMode" in document.body.style)) quit lying about supporting writingMode Safari, Opera
	if (/*@cc_on ! @*/true) no_sideways();
	init_layout();
	series = [[]], chemical = [[],[]], symbol = [], name = [], electrons = [], isotopecache = [], block = [];
	for (i = 1; i <= 118; i++) {
		element_ids[i].idx = i;
		series[0][i] = element_ids[i].childNodes[n_big].childNodes[n_mass].innerHTML;
		symbol[i] = element_ids[i].childNodes[n_big].childNodes[n_symbol].innerHTML;
		name[i] = element_ids[i].childNodes[n_big].childNodes[n_name].innerHTML;
		electrons[i] = element_ids[i].childNodes[n_small].innerHTML;
		block[i] = element_ids[i].className.slice(-1);
		temp = /^Element\s(.+)\s[spdf\s]$/.exec(element_ids[i].className)[1];
		if (temp.indexOf(" ") === -1) chemical[0][i] = chemical[1][i] = temp;
		else {
			chemical[0][i] = temp.substring(0, temp.indexOf(" "));
			chemical[1][i] = temp.substring(temp.indexOf(" ") + 1);
		}
	}
	current_colors = [], default_colors = [], search_colors = [];
	cookie_colors();
	save_colors(default_colors);

	isotope = [[0,3,2,2,3,2,3,3,3,2,3,2,3,2,4,3,5,3,7,3,9,5,6,4,5,4,7,5,8,2,7,2,7,3,9,2,9,5,9,5,8,5,9,5,10,5,9,6,11,2,11,3,11,3,13,4,8,3,8,3,7,3,8,4,7,3,8,5,11,5,11,4,8,7,7,2,11,7,9,5,11,3,6,3,3,1,2,3,4,3,6,6,6,3,6,3,8,5,7,4,4,3,3,1,1,1,1,2,2,1,1,1,1,1,1,1,1,1,1],[1,7,9,10,12,14,15,16,17,18,19,20,22,22,23,23,24,24,24,24,24,25,26,26,26,26,28,29,31,29,30,31,32,33,30,31,32,32,33,33,33,33,33,34,34,34,34,38,38,39,39,37,38,37,38,40,40,39,39,39,38,38,38,38,36,36,36,36,35,35,35,35,36,36,35,35,35,36,37,37,40,37,38,36,33,31,34,34,33,31,30,29,26,20,20,19,20,20,20,19,19,18,17,16,16,16,16,16,15,15,15,12,9,5,5,5,4,2,1]];
<?
$link = mysqli_connect("localhost", "ptable", "lucent", "ptable") or die(mysqli_connect_error()); 
$result = mysqli_query($link, "SELECT oxidation,electronstring,melt,boil FROM property") or die(mysqli_error($link));
while ($row = mysqli_fetch_assoc($result))
	foreach($row as $key=>$data) {
		if ($key == "oxidation") $final["orbital"][] = $data;
		if ($key == "electronstring" || $key =="oxidation")	$final[$key][] = '"' . $data . '"';
		else if ($data) $final[$key][] = $data;
	}

mysqli_free_result($result);
foreach ($final as $key=>$set) {
	echo "\t", $key, " = ";
	if ($key == "orbital") {
		echo "[[";
		foreach ($set as $oxi)
			echo ",\"", implode(",", array_filter(preg_replace("/^(.*)c$|.*/", "$1", explode("|", $oxi)))), '"';
		echo "]];\n";
	}
	else if ($key == "melt" || $key == "boil")
		echo "[[", max($set) + 25, ",", implode(",", $set), "]];\n";
	else
		echo '["",', implode(",", $set), "];\n";
}
?>
	quickstring = [];
	for (x in electronstring) if (electronstring[x]) quickstring[x] = electronstring[x].replace(/(\d+)(\d[spdf]|$)/g, "<sup>$1<\/sup> $2");
	shellL = {"s": 0, "p": 1, "d": 2, "f": 3};

	datasets = {"PropertyTab": ["melt", "boil", "electroneg", "discover", "affinity", "heat", "radius", "abundance", "ionize", "valence", "density", "hardness", "modulus", "conductivity"],
		"IsotopeTab": ["isomass", "binding", "masscontrib", "halflife", "width", "neutrons"]};
	spec_state = {"unit": [" K"], "slidermin": 0, "slidermax": 6000, "Legend": ["State"], "Tab": "State"};
	spec_series = {"unit": [" K"], "slidermin": 0, "slidermax": 6000, "Tab": "Weight", "subset": 0};
	spec_series["Legend"] = [document.getElementById("Legend").childNodes[0].childNodes[n_mass].innerHTML];
	spec_chemical = {"unit": ["",""], "Legend": ["Series", "Series"], "Tab": "Series", "values": ["Wikipedia", "IUPAC"], "subset": 1};
	spec_orbital = {"unit": [""], "Legend": ["Oxidation"], "Tab": "Oxidation", "subset": 0};
	spec_isotope = {"unit": [""], "Legend": ["Isotopes","Isotopes"], "Tab": "Isotopes", "values": ["Selected", "All"], "subset": 0};

	spec_melt = {"unit": [" K"], "startcolor": "6666FF", "endcolor": "FF0000", "defaultcolor": schemebase, "slidermin": 0, "slidermax": 6000, "Legend": ["Kelvin"], "Tab": "Melting Point", "subset": 0};
	spec_boil = {"unit": [" K"], "startcolor": "6666FF", "endcolor": "FF0000", "defaultcolor": schemebase, "slidermin": 0, "slidermax": 6000, "Legend": ["Kelvin"], "Tab": "Boiling Point", "subset": 0};
	spec_electroneg = {"unit": [""], "startcolor": (scheme === "day" ? "FFFF66" : "666600"), "endcolor": (scheme === "day" ? "FF0000" : "0000FF"), "defaultcolor": schemebase, "Legend": ["Pauling"], "Tab": "Electronegativity", "scale": ["lin"], "subset": 0};
	spec_radius = {"unit": [" pm"," pm"," pm"," pm"], "startcolor": schemebase, "endcolor": "444400", "defaultcolor": schemebase, "Legend": ["pm","pm","pm","pm"], "Tab": "Radius", "values": ["Calculated","Empirical","Covalent","Van der Waals"], "scale": ["lin","lin","lin","lin"], "subset": 0};
	spec_hardness = {"unit": [" MPa",""," MPa"], "startcolor": "FFDDDD", "endcolor": "008888", "defaultcolor": schemebase, "Legend": ["MPa","","MPa"], "Tab": "Hardness", "values": ["Brinell","Mohs","Vickers"], "scale": ["log","lin","log"], "subset": 0};
	spec_modulus = {"unit": [" GPa"," GPa"," GPa"], "startcolor": "BBFFDD", "endcolor": "440077", "defaultcolor": schemebase, "Legend": ["GPa","GPa","GPa"], "Tab": "Modulus", "values": ["Bulk","Shear","Young"], "scale": ["lin","lin","lin"], "subset": 0};
	spec_ionize = {"unit": [" kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"], "startcolor": (scheme === "day" ? "66FF66" : "AA00AA"), "endcolor": (scheme === "day" ? "6666FF" : "AAAA00"), "defaultcolor": schemebase, "Legend": ["kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol"], "Tab": "Ionization", "values": ["1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","13th","14th","15th","16th","17th","18th","19th","20th","21st","22nd","23rd","24th","25th","26th","27th","28th","29th","30th"], "scale": ["log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log","log"], "subset": 0};
	spec_valence = {"unit": [""], "startcolor": "FFFF00", "endcolor": "0088FF", "defaultcolor": "BBBBBB", "Legend": ["Valence"], "Tab": "Valence", "scale": ["lin"], "subset": 0};
	spec_discover = {"unit": [""], "slidermin": 1730, "slidermax": <?= date("Y"); ?>, "default": <?= date("Y"); ?>, "startcolor" : "FFFFFF", "endcolor" : "666600", "defaultcolor": "FFFFFF", "Legend": ["Year"], "Tab": "Discovered", "subset": 0};
	spec_density = {"unit": [" kg/m³"," kg/m³"], "startcolor": "DDDDFF", "endcolor": "666600", "defaultcolor": schemebase, "Legend": ["kg/m³","kg/m³"], "Tab": "Density", "values": ["STP","Liquid"], "scale": ["lin","lin"], "subset": 0};
	spec_affinity = {"unit": [" kJ/mol"], "startcolor": "009900", "endcolor": "FFFF00", "defaultcolor": schemebase, "Legend": ["kJ/mol"], "Tab": "Affinity", "scale": ["log"], "subset": 0};
	spec_abundance = {"unit": ["%","%","%","%","%","%"], "startcolor": schemebase, "endcolor": "4444FF", "defaultcolor": schemebase, "Legend": ["%","%","%","%","%","%"], "Tab": "Abundance", "values": ["Universe","Solar","Meteor","Crust","Ocean","Human"], "scale": ["log","log","log","log","log","log"], "subset": 0};
	spec_heat = {"unit": [" J/kgK"," kJ/mol"," kJ/mol"], "startcolor": schemebase, "endcolor": "FF0000", "defaultcolor": schemebase, "Legend": [" J/kgK"," kJ/mol"," kJ/mol"], "Tab": "Heat", "values": ["Specific","Vaporization","Fusion"], "scale": ["log","lin","log"], "subset": 0};
	spec_conductivity = {"unit": [" W/mK"," MS/m"], "startcolor": schemebase, "endcolor": "008800", "defaultcolor": schemebase, "Legend": ["W/mK","MS/m"], "Tab": "Conductivity", "values": ["Thermal","Electric"], "scale": ["lin","lin"], "subset": 0};
	spec_electronstring = {"unit": [""], "subset": 0};

	spec_masscontrib = {"unit": ["%"], "startcolor": "FFFFFF", "endcolor": "FF0000", "defaultcolor": "CCCCCC", "Legend": ["%"], "scale": "lin", "subset": 0};
	spec_halflife = {"unit": ["Time"], "startcolor": "FFFFFF", "endcolor": "666666", "defaultcolor": "CCCCCC", "scale": "log", "subset": 0};
	spec_binding = {"unit": [""], "startcolor": "FFFFFF", "endcolor": "00FF00", "defaultcolor": "CCCCCC", "scale": "lin", "subset": 0};
	spec_isomass = {"unit": [""], "startcolor": "FFFFFF", "endcolor": "0000FF", "defaultcolor": "CCCCCC", "scale": "lin", "subset": 0};
	spec_width = {"unit": [""], "startcolor": "FFFFFF", "endcolor": "00FFFF", "defaultcolor": "CCCCCC", "scale": "lin", "subset": 0};

	for (x in cookiearray) {
		if (x.substr(0, 7) === "subset_") window["spec_" + x.substr(7)]["subset"] = cookiearray[x] * 1;
		if (x.substr(0, 8) === "default_") window["spec_" + x.substr(8)]["default"] = cookiearray[x] * 1;
	}

	document.getElementById("Weight").onclick = click_checkbox;
	document.getElementById("Name").onclick = click_checkbox;
	document.getElementById("Electrons").onclick = click_checkbox;
	widecheck.onclick = click_checkbox;
	document.getElementById("Reset").onclick = function () {
		on_mouse_out();
		temperature = 273;
		set_cookie("Weight", "");
		set_cookie("Name", "");
		set_cookie("Electrons", "");
		set_cookie("wide", "");
		activeTab({srcElement: document.getElementById("SeriesTab")});
		if (widecheck.checked) { widecheck.checked = false; widecheck.onclick(); }
		else {
			resizewidth = 0;
			window.onresize();
		}
		return false;
	};
	tab_to_anchor("PropertyTab"); tab_to_anchor("IsotopeTab"); tab_to_anchor("OrbitalTab");
	searchinput.onkeyup = function () { search(this.value); };
	searchinput.onkeydown = function (e) { e = e || event; e.cancelBubble = true; };
	document.forms["visualize"].onkeydown = document.forms["isotopes"].onkeydown = function (e) { e = e || event; e.cancelBubble = true; };
	document.getElementById("langswitch").onkeydown = function (e) { e = e || event; e.cancelBubble = true; };
	if (typeof wholetable.onmouseleave != "undefined")
		wholetable.onmouseleave = hide_closeup;
	else 
		wholetable.onmouseout = function (e) {
			for (el = e.relatedTarget; el && el != wholetable; el = el.parentNode);
			if (!el) hide_closeup();
		};

	searchinput.onfocus = function () {
		on_mouse_out();
		save_colors(search_colors);
		search_active = true;
		if (this.value == this.def) this.value = "";
		search(this.value);
	};
	searchinput.onblur = function () {
		this.value = this.def;
		search_active = false;
		if (tab !== "PropertyTab" || dataset === "chemical") restore_colors(current_colors = []);
		else restore_colors(current_colors = search_colors.concat());
		on_mouse_over(active);
	};
	tds = document.getElementsByTagName("td");
	for (x = 0; x < tds.length; x++) if (tds[x].className.indexOf("InnerBorder") !== -1) {
		tds[x].onmouseover = function () {
			document.getElementById("NonFooter").className = "InnerHover";
			widecheck.parentNode.style.backgroundColor = "yellow";
			widecheck.nextSibling.style.color = "black";
		};
		tds[x].onmouseout = function () {
			document.getElementById("NonFooter").className = "";
			widecheck.parentNode.style.backgroundColor = "";
			widecheck.nextSibling.style.color = "";
		};
		tds[x].onclick = function () { widecheck.checked = true; widecheck.onclick(); }
	}
	document.onkeydown = keyboard_nav;

	window.onresize = function () {
		if (resizewidth != document.documentElement.clientWidth && document.cookie.indexOf("Weight") === -1) {
			clearTimeout(arguments.callee.timer);
			arguments.callee.timer = setTimeout(resize_hunt, 200);
		}
		resizewidth = document.documentElement.clientWidth;
		resizeheight = document.documentElement.clientHeight;
	};

	if (document.cookie.indexOf("Weight") === -1) {
		if (screen.width < 1280) document.getElementById("Electrons").checked = false;
		if (screen.width < 1024) document.getElementById("Name").checked = document.getElementById("Weight").checked = false;
	}
	if (document.cookie.indexOf("Weight") !== -1 || document.cookie.indexOf("wide") !== -1)
		cookie_checkbox(false);

	if (!document.getElementById("Electrons").checked) document.getElementById("Electrons").onclick(); // see if IE preserves unclicks ondomready or onload, this may need to be moved to a real window.onload
	if (!document.getElementById("Name").checked) document.getElementById("Name").onclick();
	if (!document.getElementById("Weight").checked) document.getElementById("Weight").onclick();
	if (widecheck.checked) widecheck.onclick();

	document.getElementById("SliderCell").getElementsByTagName("div")[0].style.height = element_ids[32].offsetHeight - 6 + "px";
	init_slider(false, "bottom");
	if (cookiearray["dataset"]) document.getElementById("t_" + cookiearray["dataset"]).checked = true;
	if (cookiearray["isoset"]) document.getElementById("t_" + cookiearray["isoset"]).checked = true;
	if (cookiearray["tab"] && cookiearray["tab"] !== "SeriesTab") activeTab({srcElement: document.getElementById(cookiearray["tab"])});
	else setTimeout(sweep, 500);
}

function get_cookies() {
	var cookiearray = document.cookie.split("; "), resultcookie = [], x, piece;
	for (x in cookiearray) {
		piece = cookiearray[x].split("=");
		resultcookie[piece[0]] = piece[1];
	}
	return (resultcookie);
}

function cookie_colors() {
	var theRules = document.styleSheets[0].cssRules || document.styleSheets[0].rules, cookiearray = get_cookies(), allseries = allclasses.split(" "), series, x;
	for (series in allseries) {
		if (cookiearray[allseries[series]])
			for (x = 0; x < theRules.length; x++)
				if (theRules[x].selectorText.indexOf(allseries[series]) !== -1 && cookiearray[allseries[series]] != 0)
					theRules[x].style.backgroundColor = "#" + cookiearray[allseries[series]];
	}
}

<?
include "animation.js";
include "utility.js";
include "slider.js";
include "wikipedia.js";
include "raremove.js";
?>

function cache_objects() {
	tempK = document.getElementById("Temperature").rows[0].cells[0];
	tempC = document.getElementById("Temperature").rows[1].cells[0];
	tempF = document.getElementById("Temperature").rows[2].cells[0];
	tempState = document.getElementById("l_state").getElementsByTagName("span")[0];
	widecheck = document.getElementById("wide");
	wholetable = document.getElementById("Main");
	detail = document.getElementById("CloseupElement");
	key_id = document.getElementById("KeyContainer");
	display = document.getElementById("SliderDisplay");
	slider = document.getElementById("SliderBar");
	searchinput = document.getElementById("SearchInput");
	wikibox = document.getElementById("WikiBox");
	properties = document.getElementById("Properties");
	matterstate = document.getElementById("MatterState");
	matterstate.show = "block";
	property_ids = [], orbital_ids = [], block_ids = [], series_ids = [];
	var x, temp_property = properties.getElementsByTagName("td"), temp_series = document.getElementById("Series").getElementsByTagName("td"), temp_block = document.getElementById("Block").getElementsByTagName("th");
	for (x = 0; x < temp_property.length; x++)
		if (temp_property[x].id === temp_property[x].id.toUpperCase() && temp_property[x].id.length)
			property_ids[temp_property[x].id.toLowerCase()] = temp_property[x];
	for (x = 0; x < temp_series.length; x++)
		if (temp_series[x].id)
			series_ids[temp_series[x].id] = temp_series[x];
	for (x = 0; x < temp_block.length; x++)
		block_ids[temp_block[x].id] = temp_block[x];
	property_ids["electronstring"] = document.getElementById("ELECTRONSTRING");
	orbital_ids["lmn"] = document.getElementById("lmn");
	orbital_ids["Hund"] = document.getElementById("Hund");
	block_ids["Orbital"] = document.getElementById("Orbital");
}

function resize_hunt() {
	var sheet_ids = ["Weight", "Name", "Electrons"], index = -1, before = [], after = [], x;
	for (x in sheet_ids) before[x] = document.getElementById(sheet_ids[x]).checked;
	while (document.documentElement.offsetWidth >= document.documentElement.scrollWidth && index < sheet_ids.length - 1) {
		if (!document.getElementById(sheet_ids[++index]).checked) {
			document.getElementById(sheet_ids[index]).checked = true;
			document.getElementById(sheet_ids[index]).onclick();
		}
	}
	index = sheet_ids.length;
	while (document.documentElement.offsetWidth < document.documentElement.scrollWidth && index > 0) {
		if (document.getElementById(sheet_ids[--index]).checked) {
			document.getElementById(sheet_ids[index]).checked = false;
			document.getElementById(sheet_ids[index]).onclick();
		}
	}
	for (x in sheet_ids)
		if (before[x] !== document.getElementById(sheet_ids[x]).checked)
			after.push(document.getElementById(sheet_ids[x]).parentNode);
	init_flash(after);
}

function attach_class_hovers() {
	var row = document.getElementById("Series").tBodies[0].rows, collect_class = row[2].cells[0].className + " ", x, y, el, links = document.getElementById("Series").getElementsByTagName("a");

	for (x = 0; x < 5; x++) collect_class += row[1].cells[x].className + " ";
	row[0].cells[0].classes = collect_class;

	collect_class = "";
	for (x = 5; x < 8; x++) collect_class += row[1].cells[x].className + " ";
	row[0].cells[2].classes = collect_class;

	row[0].cells[0].firstChild.onmouseover = row[0].cells[2].firstChild.onmouseover = row[0].cells[0].firstChild.onfocus = row[0].cells[2].firstChild.onfocus = multi_series;
	row[0].cells[0].firstChild.onblur = row[0].cells[2].firstChild.onblur = series_leave;

	for (x = 0; x <= 2; x++)
		for (y = 0; y < row[x].cells.length; y++)
			if (row[x].cells[y].className) {
				row[x].cells[y].firstChild.onmouseover = row[x].cells[y].firstChild.onfocus = series_hover;
				row[x].cells[y].firstChild.onblur = series_leave;
			}

	if (typeof document.getElementById("Series").onmouseleave !== "undefined")
		document.getElementById("Series").onmouseleave = document.getElementById("Block").onmouseleave = document.getElementById("DecayModes").onmouseleave = series_leave;
	else {
		document.getElementById("Series").onmouseout = document.getElementById("Block").onmouseout = document.getElementById("DecayModes").onmouseout = function (e) {
			for (el = e.relatedTarget; el && (el != document.getElementById("Series") && el != document.getElementById("Block") && el != document.getElementById("DecayModes")); el = el.parentNode);
			if (!el) series_leave();
		};
	}

	for (x = 0; x < links.length; x++)
		links[x].onclick = click_wiki;

	row = document.getElementById("Block").tBodies[0].rows;
	for (x = 0; x < row.length; x++)
		row[x].cells[0].onmouseover = function () { clear_series(); wholetable.className = this.className; };

	row = matterstate.tBodies[0].rows;
	for (x = 0; x < row.length; x++)
		row[x].cells[0].onmouseover = hover_state;
	if (typeof matterstate.onmouseleave !== "undefined")
		matterstate.onmouseleave = unhover_state;
	else 
		matterstate.onmouseout = function (e) {
			for (el = e.relatedTarget; el && (el != matterstate); el = el.parentNode);
			if (!el) unhover_state();
		};

	row = document.getElementById("DecayModes").getElementsByTagName("th");
	for (x in row)
		row[x].onmouseover = function () {
			if (document.getElementById("isotopeholder").childNodes.length)
				document.getElementById('DecayModes').className = document.getElementById('isotopeholder').className = this.className;
		};
}

function hover_state() {
	var el = this || srcElement, i;
	display.style.backgroundColor = "yellow";

	if (hovered_state !== el.className && window["spec_" + dataset]["unit"][0] == " K") {
		if (hovered_state) unhover_state(el);
		if (el.className !== "SliderBar") hovered_state = el.className;
		series_to_temp();
		if (hovered_state && (tab !== "PropertyTab" || dataset === "chemical")) {
			el.parentNode.className = "InvertState";
			for (i = 1; i <= 118; i++) {
				if (element_ids[i].state === hovered_state) {
					element_ids[i].style.backgroundColor = statecolors[1][element_ids[i].state];
					element_ids[i].childNodes[n_big].childNodes[n_symbol].style.color = element_ids[i].style.color = "white";
				}
			}
		}
	}
}

function unhover_state() {
	var x, i, row = matterstate.tBodies[0].rows;
	display.style.backgroundColor = "";
	for (x = 0; x < row.length; x++) row[x].className = "";
	if (dataset !== "state" && dataset !== "melt" && dataset !== "boil") temp_to_series();
	if (hovered_state && (tab !== "PropertyTab" || dataset === "chemical")) {
		for (i = 1; i <= 118; i++) {
			if (element_ids[i].state === hovered_state) {
				element_ids[i].childNodes[n_big].childNodes[n_symbol].style.color = statecolors[0][element_ids[i].state];
				element_ids[i].style.color = "";
			}
		}
		restore_colors(current_colors = []);
	}
	hovered_state = false;
}

function clear_series() {
	if (lastSeries) {
		lastSeries.style.backgroundColor = "";
		lastSeries.style.color = "";
	}
	if (active) dim_series(chemical[0][active], block[active], false);
	lastSeries = false;
}

function multi_series() {
	if (tab !== "PropertyTab" || dataset === "chemical") {
		clear_series();
		this.parentNode.style.backgroundColor = "#999";
		this.parentNode.style.color = "white";
		wholetable.className = this.parentNode.classes;
		lastSeries = this.parentNode;
	}
}

function series_hover(e) {
	if (tab !== "PropertyTab" || dataset === "chemical") {
		clear_series();
		wholetable.className = (this || srcElement).parentNode.className;
	}
}

function series_leave() {
	if (tab === "IsotopeTab") document.getElementById('DecayModes').className = document.getElementById('isotopeholder').className = allmodes;
	if (tab !== "PropertyTab" || dataset === "chemical") {
		clear_series();
		wholetable.className = allclasses + (tab === "OrbitalTab" ? " s p d f" : "");
		if (active) dim_series(chemical[0][active], block[active], true);
	}
}

function dataset_changed(update, el) {
	var i;
	el = (el || this || srcElement).getElementsByTagName("input");
	for (i = 0; i < el.length; i++)
		if (el[i].checked && el[i].value != dataset) {
			if (update === true)	return el[i].value;
			else					switch_viz(el[i].value);
		}
}
// above and below should be one function
function isotope_changed(update, el) {
	var i;
	el = (el || this || srcElement).getElementsByTagName("input");
	for (i = 0; i < el.length; i++)
		if (el[i].checked && el[i].value != dataset) {
			if (update === true)	return el[i].value;
			else					switch_iso(el[i].value);
		}
}

function subset_changed(update) {
	var el = document.forms["AltSlider"], i;
	for (i = 0; i < el.length; i++)
		if (el[i].checked && el[i].value != window["spec_" + dataset]["subset"]) {
			if (update === true)	return el[i].value;
			else					switch_subset(el[i].value);
		}
}

function switch_subset(newset) {
	var vals = window["spec_" + dataset]["values"];
	yellowize_subset(vals[window["spec_" + dataset]["subset"]], "");
	yellowize_subset(vals[newset], highlight);
	window["spec_" + dataset]["subset"] = newset;
	set_cookie("subset_" + dataset, newset);
	if (dataset !== "isotope") {
		document.getElementById("l_" + dataset).getElementsByTagName("span")[0].innerHTML = " " + vals[newset] + " ";
		update_detail(active, dataset);
	} else if (locked) rebuild_isotopes();
	colorize_and_mass(true);
	if (tab === "PropertyTab" && dataset !== "chemical") save_colors(current_colors);
}

function rebuild_isotopes() {
	load_isotope(active);
	detach(active);
}

function switch_viz(newset) {
	if (dataset === "state" && wholetable.inverted) leave_state();
	if (dataset === "melt" || dataset === "boil") temp_to_series();
	var direction = find_direction(dataset, newset);
	dataset = newset;
	if (tab === "PropertyTab") set_cookie("dataset", dataset);
	if (tab === "PropertyTab" && dataset !== "chemical" && dataset !== "state" && dataset !== "discover")
			wholetable.tBodies[0].className = "NoGradient";
	else	wholetable.tBodies[0].className = "";
	document.getElementById("Weight").nextSibling.innerHTML = window["spec_" + dataset]["Tab"];
	if (dataset === "series" || dataset === "isotope" || dataset === "orbital" || dataset === "chemical") restore_colors(current_colors = []);
	if (tab === "PropertyTab") {
		if (oldYellow) document.getElementById(oldYellow.toUpperCase()).parentNode.className = "";
		document.getElementById(dataset.toUpperCase()).parentNode.className = "Highlight";
		oldYellow = dataset;
	}
	init_slider(false, direction);
	if (tab === "PropertyTab" && dataset !== "chemical") save_colors(current_colors);
}

function find_direction(oldset, newset) {
	var order = {"series": 1, "other": 2, "orbital": 3, "isotope": 4}, oldid;
	if (order[oldset] || order[newset]) {
		if (!order[oldset]) order[oldset] = 2;
		else if (!order[newset]) order[newset] = 2;
		if (order[newset] > order[oldset]) return "left";
		else return "right";
	} else {
		oldid = document.getElementById("t_" + oldset).parentNode.parentNode, newid = document.getElementById("t_" + newset).parentNode.parentNode;
		if (oldid.parentNode == newid.parentNode) {
			if (newid.rowIndex > oldid.rowIndex) return "top";
			else return "bottom";
		} else {
			if (oldid.parentNode.parentNode == oldid.parentNode.parentNode.parentNode.getElementsByTagName("table")[0]) return "right";
			else return "left";
		}
	}
}

function switch_iso(newset) {
	isoset = newset;
	set_cookie("isoset", isoset);
	colorize_and_mass(false);

	var len = document.getElementById("isotopeholder").childNodes, i;
	for (i = 0; i < len.length; i++)
		len[i].childNodes[0].childNodes[5].innerHTML = window[isoset === "isoname" ? "isomass" : isoset][len[i].idx];
	if (isoset === "isoname") {
		for (i = 0; i < len.length; i++)
			len[i].style.backgroundColor = "";
	} else
		color_isotope(window[isoset].concat(), window["spec_" + isoset]);
}

function yellowize_subset(set, color) {
	document.getElementById("r_" + set).parentNode.style.backgroundColor = color;
}

function color_other(valueArray, specArray) {
	var minmax = getminmax(valueArray, specArray["scale"][specArray["subset"]]), i;
	for (i = 1; i <= 118; i++) {
		if (!isNaN(valueArray[i]))
			element_ids[i].style.backgroundColor = calc_color(valueArray[i] == -Infinity ? minmax[0] : valueArray[i], specArray["startcolor"], specArray["endcolor"], minmax[0], minmax[1]);
		else
			element_ids[i].style.backgroundColor = "#" + specArray["defaultcolor"];
	}
}

function color_isotope(valueArray, specArray) {
	var minmax = getminmax(valueArray, specArray["scale"][specArray["subset"]]), i;
	for (i = 1; i < valueArray.length; i++) {
		if (!isNaN(valueArray[i]) && minmax[0] != minmax[1])
			document.getElementById("isotopeholder").childNodes[i - 1].style.backgroundColor = calc_color(valueArray[i] == -Infinity ? minmax[0] : valueArray[i], specArray["startcolor"], specArray["endcolor"], minmax[0], minmax[1]);
		else
			document.getElementById("isotopeholder").childNodes[i - 1].style.backgroundColor = "#" + specArray["defaultcolor"];
	}
}

function getminmax(valueArray, specs) {
	var minmax = [Number.MAX_VALUE, 0], x;
	for (x in valueArray) {
		valueArray[x] *= 1;
		switch(specs) {
			case "log":	valueArray[x] = Math.log(valueArray[x]); break;
			case "inv":	valueArray[x] = 1 / valueArray[x]; break;
		}
		if (valueArray[x] < minmax[0] && valueArray[x] != -Infinity && !isNaN(valueArray[x])) minmax[0] = valueArray[x];
		if (valueArray[x] > minmax[1] && valueArray[x] != -Infinity && !isNaN(valueArray[x])) minmax[1] = valueArray[x];
	}
	return minmax;
}

function init_layout() {
	element_ids = [];
	var tags = document.getElementsByTagName("td"), atomic, i;
	for (i = 0; i < tags.length; i++) {
		if (tags[i].className.indexOf("Element") !== -1) {
			atomic = tags[i].childNodes[n_big].childNodes[n_atomic].innerHTML * 1;
			element_ids[atomic] = tags[i];
		}
	}
	attach("SeriesTab");
	attach("Groups");
	search_active = false;
	document.forms["visualize"].onclick = dataset_changed;
	document.forms["isotopes"].onclick = isotope_changed;
}

function update_tempbox() {
//	if (document.getElementById("Temperature").style.display === "block")
	temperature = display.value * 1;
	tempK.innerHTML = temperature;
	tempC.innerHTML = Math.round(temperature - 273.15);
	tempF.innerHTML = Math.round(temperature * 9/5 - 459.67);
	tempState.innerHTML = temperature + " K";
	if (active) property_ids["state"].innerHTML = element_ids[active].state;
}

function click_checkbox(obj) {
	var human = (typeof event !== "undefined" && event !== null && event.type === "click") || (typeof obj !== "undefined" && obj.type === "click"), sheet_ids, sheets_list, checkbox_ids, x, i;
	obj = this || srcElement || obj;
	if (obj.id === "wide") {
		if (iMove !== 0 && iMove !== 15) return false;
		if (tab === "IsotopeTab") document.getElementById("isotopeholder").innerHTML = "";
		insert_rareearths(obj.checked, human);
		if (tab !== "SeriesTab") {
			if (obj.checked)	tab_to_span("SeriesTab");
			else				tab_to_anchor("SeriesTab");
		}
	} else {
		sheet_ids = {"Electrons": 0, "Name": 1, "Weight": 2}, reverse_ids = ["Electrons", "Name", "Weight"];
		for (i = sheet_ids[obj.id]; Math.abs(i - 1) < 2; i += (obj.checked - 0.5) * 2)
			document.getElementById(reverse_ids[i]).checked = obj.checked;

		sheets_list = document.getElementsByTagName("link");
		for (x = 2; x < 5; x++) {
			sheets_list[x].disabled = true;
			sheets_list[x].disabled = obj.id != reverse_ids[x - 2 + obj.checked];
		}
		if (document.getBoxObjectFor) wholetable.style.overflow = (wholetable.style.overflow ? "" : "auto"); // Firefox bug
		display.parentNode.parentNode.parentNode.style.height = element_ids[32].offsetHeight - 6 + "px";
		if (tab !== "OrbitalTab") init_slider(true, "bottom");
	}
	if (tab === "PropertyTab") fix_properties();
	else firstDetails = true;

	checkbox_ids = ["Weight", "Name", "Electrons", "wide"];
	for (x in checkbox_ids)
		document.getElementById(checkbox_ids[x]).parentNode.className = (document.getElementById(checkbox_ids[x]).checked) ? "Selected" : "";
	if (human) cookie_checkbox(true, obj.id);
}

function cookie_checkbox(save, id) {
	var checkbox_ids = ["Weight", "Name", "Electrons", "wide"], x, cookiearray;
	if (save) {
		if (id === "wide")
			set_cookie(id, document.getElementById(id).checked);
		else for (x in checkbox_ids)
			set_cookie(checkbox_ids[x], document.getElementById(checkbox_ids[x]).checked);
	} else {
		cookiearray = get_cookies();
		for (x in checkbox_ids)
			if (cookiearray[checkbox_ids[x]])
				document.getElementById(checkbox_ids[x]).checked = cookiearray[checkbox_ids[x]] == "true" ? true : false;
	}
}

function set_cookie(name, value) {
	document.cookie = name + "=" + value + "; expires=" + (value !== "" ? "<?= date(DATE_RFC822, strtotime("+1 month")) ?>" : "<?= date(DATE_RFC822, 404040540) ?>");
}

function save_colors(colorsarray) {
	for (var i = 1; i <= 118; i++)
		colorsarray[i] = getBGcolor(element_ids[i]);
}

function restore_colors(colorsarray) {
	for (var i = 1; i <= 118; i++) element_ids[i].style.backgroundColor = (colorsarray.length ? "#" + colorsarray[i] : "");
}

function toggle_display(boxes, onoff) {
	for (var x in boxes) {
		document.getElementById(boxes[x]).style.display = onoff;
		if (boxes[x] === "IsotopeForm") document.getElementById("Closeup").parentNode.style.verticalAlign = onoff !== "block" ? "" : "top";
	}
}

function activeTab(e) {
	e = e || event;
	var name = (e.srcElement || e.target).id;
	if (!widecheck.checked || tab !== "SeriesTab") tab_to_anchor(tab);

	on_mouse_over();

	if (tab === "OrbitalTab") move_helium(false);
	document.getElementById("Navigation").style.display = "";
	attach(tab = name);
	if (tab !== "SeriesTab") active = active || 1;
	property_ids["electronstring"].innerHTML = "";
	property_ids["electronstring"].className = "";
	set_cookie("tab", tab);
	switch (tab) {
		case "SeriesTab":
			isotope_clean(false);
			locked = false;
			if (lastDetach) element_ids[lastDetach].className = element_ids[lastDetach].className.replace(" Locked", "");
			from = ["Properties", "Block", "Hund", "DecayModes", "isotopeholder"]; to = ["Series"];
			switch_viz("series");
			break;
		case "PropertyTab":
			from = ["Block", "Hund", "DecayModes", "isotopeholder"]; to = ["Properties"];
			toggle_display(["IsotopeForm"], "");
			if (!widecheck.checked) from.push("Series");
			if (typeof conductivity === "undefined") load_details(datasets[tab]);
			else switch_viz(dataset_changed(true, document.forms["visualize"]));
			break;
		case "OrbitalTab":
			property_ids["electronstring"].innerHTML = "<span>-4<\/span> <span>-3<\/span> <span>-2<\/span> <span>-1<\/span><span><\/span><br/><span>1<\/span> <span>2<\/span> <span>3<\/span> <span>4<\/span> <span>5<\/span> <span>6<\/span> <span>7<\/span> <span>8<\/span>";
			property_ids["electronstring"].className = "OxidationStates";
			from = ["Properties", "DecayModes", "isotopeholder"]; to = ["Block", "Hund"];
			toggle_display(["IsotopeForm"], "");
			if (!widecheck.checked) from.push("Series");
			switch_viz("orbital");
			break;
		case "IsotopeTab":
			from = ["Properties", "Block", "Hund"]; to = ["DecayModes", "isotopeholder"];
			if (!widecheck.checked) from.push("Series");
			if (document.getElementById("isotopeholder").childNodes.length) {
				if (!widecheck.checked) { toggle_display(["MatterState"], "none"); matterstate.show = "none"; }
				toggle_display(["Closeup", "IsotopeForm"], "");
			}
			switch_viz("isotope");
			break;
	}
	if (locked && active && tab !== "SeriesTab" && tab !== "IsotopeTab") element_ids[active].onclick();
	else if (active && document.getElementById("IsotopeForm").style.display !== "block") on_mouse_over(active);

	tab_to_span(name);
	return false;
}

function tab_to_anchor(tab) {
	var a = document.createElement("a");
	a.id = tab;
	a.href = "#";
	a.onclick = activeTab;
	a.innerHTML = document.getElementById(tab).parentNode.replaceChild(a, document.getElementById(tab)).innerHTML;
}

function tab_to_span(name) {
	var span = document.createElement("span");
	span.id = name;
	span.innerHTML = document.getElementById(name).parentNode.replaceChild(span, document.getElementById(name)).innerHTML;
}

function findSymbol(m, sym) {
	return electronstring[{"He": 2, "Ne": 10, "Ar": 18, "Kr": 36, "Xe": 54, "Rn": 86}[sym]];
}

function tab_electron(atomic) {
	var shellcoeff = {"s": 0, "p": 0.75, "d": 1.5, "f": 2.25}, max = [0, 0], shells = [], elecstr = electronstring[atomic], parts, x, y, z, len;
	while (elecstr.match(/\[.*\]/)) elecstr = elecstr.replace(/\[(.*)\]/, findSymbol);
	parts = elecstr.replace(/(\d+)(\d[spdf]|$)/g, "$1 $2").split(" ");
	orbital_ids["OrbitalString"].innerHTML = elecstr.replace(/(\d+)(\d[spdf]|$)/g, "<sup>$1<\/sup> $2"); // regexp in 2 places
	for (x = 0; x < parts.length - 1; x++) {
		shells[parts[x].substr(0, 2)] = parts[x].match(/[spdf](\d+)$/)[1];
		if (Number(parts[x].charAt(0)) + shellcoeff[parts[x].charAt(1)] > max[1])
			max = [parts[x].substr(0, 2), Number(parts[x].charAt(0)) + shellcoeff[parts[x].charAt(1)], shells[parts[x].substr(0, 2)]];
	}
	for (x = 0; x < aufbau.length; x++) {
		for (y = 0; y < aufbau[x].length; y++) {
			len = aufbau[x][y].parentNode.cells.length - 1;
			for (z = 1; z <= len * 2; z++)
				aufbau[x][y].parentNode.cells[z <= len ? z : z - len].childNodes[z <= len ? 0 : 1].style.visibility = (z <= (aufbau[x][y].innerHTML.substr(0, 2) in shells ? shells[aufbau[x][y].innerHTML.substr(0, 2)] : 0) ? "visible" : "hidden");
		}
	}
	hover_orbital(max[0].charAt(1), max[2] - 1, max[0].charAt(0) - shellL[max[0].charAt(1)] - 1);
	show_oxidation(atomic);
}

function show_oxidation(atomic) {
	var oxistates = (oxidation[atomic] || "").split("|"), allstates = property_ids["electronstring"].getElementsByTagName("span"), x = 0, y = 0;
	for (x = 0; x < 13; x++) {
		if (x - 4 == parseInt(oxistates[y])) {
			allstates[x].style.visibility = "visible";
			if (oxistates[y].slice(-1) === "c") allstates[x].className = "Common";
			else allstates[x].className = "";
			y++;
		} else {
			allstates[x].style.visibility = "hidden";
			allstates[x].className = "";
		}
	}
}

function hover_orbital(l, m, n) {
	if (lastOrbital) lastOrbital.className = "";
	block_ids["Orbital"].style.backgroundImage = 'url("Images/orbitals-' + l + (scheme === "night" ? "-night" : "") + '.png")';
	block_ids["Orbital"].style.backgroundPosition = "-" + (scheme === "night" ? 64 : 108) * m + "px -" + (scheme === "night" ? 64 : 108) * n + "px";
	var row = orbital_ids["Hund"].tBodies[0].rows[0].cells[shellL[l]].getElementsByTagName("table")[0].tBodies[0].rows;
	cell = row[row.length - n - 1].cells;
	lastOrbital = cell[m + 1 >= cell.length ? m - (cell.length - 2) : m + 1];
	orbital_ids["lmn"].tBodies[0].rows[0].cells[2].innerHTML = shellL[l];
	orbital_ids["lmn"].tBodies[0].rows[1].cells[2].innerHTML = (m + 1 >= cell.length ? m - (cell.length - 1) : m) - shellL[l];
	orbital_ids["lmn"].tBodies[0].rows[2].cells[2].innerHTML = n + shellL[l] + 1;
	lastOrbital.className = "HoverOrbital";
}

function attach(what) {
	var hund, i, j, temp, groups;
	switch (what) {
		case "OrbitalTab":
			hund = orbital_ids["Hund"].tBodies[0].rows[0].cells;
			for (i = 0; i < hund.length; i++) {
				temp = hund[i].getElementsByTagName("table")[0].getElementsByTagName("td");
				for (j = 0; j < temp.length; j++) {
					temp[j].l = temp[j].parentNode.cells[0].innerHTML.charAt(1);
					temp[j].n = temp[j].parentNode.cells[0].innerHTML.charAt(0) - 1 - shellL[temp[j].l];
					temp[j].m = temp[j].cellIndex - 1;
					temp[j].onmouseover = function () { hover_orbital(this.l, this.m, this.n); };
				}
			}
			for (i = 1; i <= 118; i++) {
				element_ids[i].onmouseover = function () { on_mouse_over(this.idx); };
				element_ids[i].onclick = function () { detach(this.idx); };
			}
			break;
		case "IsotopeTab":
			for (i = 1; i <= 118; i++) {
				element_ids[i].onmouseover = function () { on_mouse_over(this.idx); };
				element_ids[i].onclick = function () { load_isotope(this.idx); detach(this.idx); };
			}
			break;
		case "SeriesTab":
			for (i = 1; i <= 118; i++) {
				element_ids[i].onmouseover = function () { on_mouse_over(this.idx); };
				element_ids[i].onclick = click_wiki;
			}
			break;
		case "PropertyTab":
			for (i = 1; i <= 118; i++) {
				element_ids[i].onmouseover = function () { on_mouse_over(this.idx); };
				element_ids[i].onclick = function () { detach(this.idx); };
			}
			break;
		case "Groups":
			groups = wholetable.tHead.rows[0].cells;
			for (i = 1; i < groups.length; i++) {
				groups[i].firstChild.onclick = click_wiki;
				groups[i].firstChild.onmouseover = groups[i].firstChild.onmouseout = groups[i].firstChild.onfocus = groups[i].firstChild.onblur = hover_group;
			}
			for (i = 0; i < 7; i++) {
				wholetable.tBodies[0].rows[i].cells[0].firstChild.onclick = click_wiki;
				wholetable.tBodies[0].rows[i].cells[0].onmouseover = wholetable.tBodies[0].rows[i].cells[0].onmouseout = wholetable.tBodies[0].rows[i].cells[0].firstChild.onfocus = wholetable.tBodies[0].rows[i].cells[0].firstChild.onblur = hover_period;
			}
			break;
	}
}

function detach(atomic) {
	if (lastDetach) {
		element_ids[lastDetach].onclick = element_ids[atomic].onclick;
		element_ids[lastDetach].className = element_ids[lastDetach].className.replace(" Locked", "");
	}
	if (locked && document.getElementById("IsotopeForm").style.display !== "block") on_mouse_over(atomic);
	element_ids[atomic].className += " Locked";
	if (document.getBoxObjectFor) wholetable.style.overflow = (wholetable.style.overflow ? "" : "auto"); // Firefox bug
	locked = true;
	for (var i = 1; i <= 118; i++) element_ids[i].onmouseover = null;
	element_ids[atomic].onclick = function () {
		this.className = this.className.replace(" Locked", "");
		locked = false;
		document.getElementById("DecayModes").className = allmodes;
		document.getElementById("Navigation").style.display = "";
		isotope_clean(tab === "IsotopeTab");
		lastIsotope = false;
		attach(tab);
		on_mouse_over(atomic);
	};
	lastDetach = atomic;
}

function showDetails(atomic, full) {
	elTarget = element_ids[atomic];
	detail.replaceChild(elTarget.childNodes[0].cloneNode(true), detail.childNodes[0]);
	detail.replaceChild(elTarget.childNodes[1].cloneNode(true), detail.childNodes[1]);
	if (wholetable.inverted) detail.childNodes[n_big].childNodes[n_symbol].style.color = "";
	detail.style.backgroundColor = "#" + default_colors[atomic];
	if (tab !== "SeriesTab") detail.childNodes[n_big].childNodes[n_mass].innerHTML = series[0][atomic];

	if (matterstate.show === "block" && !widecheck.checked) { matterstate.style.display = "none"; matterstate.show = "none"; }
	document.getElementById("Closeup").style.display = "block"; // only do this if first with a .show
	if (full) {
		property_ids["electronstring"].innerHTML = quickstring[atomic]; // big speed bottleneck, so only showing in Properties
		property_ids["chemical"].innerHTML = chemical[spec_chemical["subset"]][atomic];
		property_ids["state"].innerHTML = element_ids[atomic].state;
		for (attribute in datasets["PropertyTab"]) update_detail(atomic, datasets["PropertyTab"][attribute]);
	}
}

function update_detail(atomic, prop) {
	var attr = window[prop], spec = window["spec_" + prop], subset = spec["subset"];
	property_ids[prop].innerHTML = (typeof attr[subset][atomic] !== "undefined") ? scinot(String(attr[subset][atomic])) + spec["unit"][subset] : "Unknown";
}

function fix_properties() {
	var temp = properties.getElementsByTagName("table");
	if (temp[1].offsetWidth) {
		temp[0].style.position = "absolute";
		temp[0].style.left = temp[1].offsetWidth + 5 + "px";
		firstDetails = false;
	}
}

function hide_state() {
	for (var i = 1; i <= 118; i++)
		element_ids[i].childNodes[n_big].childNodes[n_symbol].style.color = statecolors[0]["Solid"];
}

function state_classes(updateall, flash_updated) {
	var value = temperature, tempcolor, i;
	for (i = 1; i <= 118; i++) {
		tempcolor = updateall;
		if (!boil[0][i] && (!melt[0][i] || value > melt[0][i])) {
			if (element_ids[i].state !== "Unknown") {
				tempcolor = true;
				element_ids[i].state = "Unknown";
			}
		} else if (value > boil[0][i]) {
			if (element_ids[i].state !== "Gas") {
				tempcolor = true;
				element_ids[i].state = "Gas";
			}
		} else if (value > melt[0][i]) {
			if (element_ids[i].state !== "Liquid") {
				tempcolor = true;
				element_ids[i].state = "Liquid";
			}
		} else if (element_ids[i].state !== "Solid") {
			tempcolor = true;
			element_ids[i].state = "Solid";
		}
		if (tempcolor) {
			if (flash_updated && !wholetable.inverted) {
				element_ids[i].childNodes[n_big].childNodes[n_symbol].style.color = element_ids[i].style.color = "white";
				setTimeout("if (!wholetable.inverted) { element_ids["+i+"].style.backgroundColor = ''; element_ids["+i+"].childNodes[n_big].childNodes[n_symbol].style.color = statecolors[0][element_ids["+i+"].state]; } element_ids["+i+"].style.color = '';", 500); // clean up the eval
			}
			if (flash_updated || wholetable.inverted)
				element_ids[i].style.backgroundColor = statecolors[1][element_ids[i].state];
			else
				element_ids[i].childNodes[n_big].childNodes[n_symbol].style.color = statecolors[0][element_ids[i].state];
		}
	}
}

function calc_color(value, start, end, min, max) {
	var n = (value - min) / (max - min), result;
	end = parseInt(end, 16);
	start = parseInt(start, 16);

	result = start +
		((( Math.round(((((end & 0xFF0000) >> 16) - ((start & 0xFF0000) >> 16)) * n))) << 16)
		+ (( Math.round(((((end & 0x00FF00) >> 8) - ((start & 0x00FF00) >> 8)) * n))) << 8)
		+ (( Math.round((((end & 0x0000FF) - (start & 0x0000FF)) * n)))));

	return "#" + ((result >= 0x100000) ? "" : (result >= 0x010000) ? "0" : (result >= 0x001000) ? "00" : (result >= 0x000100) ? "000" : (result >= 0x000010) ? "0000" : "00000") + result.toString(16);
}

function rainbow(value, start, end, min, max) {
	var x = (value - min) / (max - min), r, g, b, result;
	x = x * (end - start) + start;
	r = 				122.713 - 954.984*x + 5593.32*Math.pow(x,2) - 16122.6*Math.pow(x,3) + 27653.9*Math.pow(x,4) - 23948.6*Math.pow(x,5) + 7875.35*Math.pow(x,6);
	g = x >= 0.063 ?	31.9113 - 352.441*x + 7044.09*Math.pow(x,2) - 25069.8*Math.pow(x,3) + 41208.0*Math.pow(x,4) - 33020.6*Math.pow(x,5) + 10192.9*Math.pow(x,6) : 27.7353 + 35.9604*x;
	b =					134.474 + 549.479*x + 671.189*Math.pow(x,2) - 12805.8*Math.pow(x,3) + 28800.6*Math.pow(x,4) - 25151.2*Math.pow(x,5) + 7835.32*Math.pow(x,6);
	result = Math.round(r<<16) + Math.round(g<<8) + Math.round(b);
	return "#" + ((result >= 0x100000) ? "" : (result >= 0x010000) ? "0" : (result >= 0x001000) ? "00" : (result >= 0x000100) ? "000" : (result >= 0x000010) ? "0000" : "00000") + result.toString(16);
}

function color_temp(temparray, specArray, save) {
	var value = temperature, startcolor = specArray["startcolor"], endcolor = specArray["endcolor"], max = temparray[0], i;
	for (i = 1; i <= 118; i++) {
		if (temparray[i] < value)		element_ids[i].style.backgroundColor = calc_color(temparray[i], startcolor, schemebase, 0, value);
		else if (temparray[i] >= value) element_ids[i].style.backgroundColor = calc_color(temparray[i], schemebase, endcolor, value, max);
		else							element_ids[i].style.backgroundColor = "#" + specArray["defaultcolor"];
	}
	if (save) save_colors(current_colors);
}

function time_machine(discarray) {
//	elTarget.className = elTarget.className.replace(/Solid|Liquid|Gas|Unknown/, stateclass);
	var value = display.value * 1, i;
	for (i = 1; i <= 118; i++) {
		if (discarray[i] < value || !discarray[i]) element_ids[i].style.backgroundColor = "";
		else element_ids[i].style.backgroundColor = "#" + schemebase;
	}
}

function search(searchstring) {
	var winners = {}, atomic;
	on_mouse_out();
	for (atomic = 1; atomic <= 118; atomic++) {
		if (!searchstring) continue;
		else if (searchstring == atomic || element_ids[atomic].childNodes[n_big].childNodes[n_symbol].innerHTML.toLowerCase() == searchstring.toLowerCase()) {
			winners = {};
			winners[atomic] = true;
			break;
		} else if (element_ids[atomic].childNodes[n_big].childNodes[n_name].innerHTML.toLowerCase().indexOf(searchstring.toLowerCase()) != -1)
			winners[atomic] = true;
	}
	for (atomic = 1; atomic <= 118; atomic++) search_highlight(atomic, winners[atomic]);
	save_colors(current_colors);
	for (atomic in winners) winlist.push(atomic);
	if (winlist.length === 1) on_mouse_over(winlist[0]);
	winlist = [];
}

function search_highlight(atomic, darken) {
	if (darken)	element_ids[atomic].style.backgroundColor = calc_color(3, search_colors[atomic], schemehigh, 0, 10);
	else		element_ids[atomic].style.backgroundColor = calc_color(6, search_colors[atomic], schemebase, 0, 10);
}

function series_to_temp() {
	if ((to === false && document.getElementById("Series").style.display !== "none") || (to !== false && to[0] === "Series")) {
		document.getElementById("Series").style.display = "none";
		document.getElementById("Temperature").style.display = "block";
	}
}

function temp_to_series() {
	if (document.getElementById("Temperature").style.display === "block") {
		document.getElementById("Temperature").style.display = "";
		document.getElementById("Series").style.display = "";
	}
}

function leave_state() {
	wholetable.className = wholetable.className.replace(" InvertState", "");
	wholetable.inverted = false;
	state_classes(true, false);
	restore_colors(current_colors = []);
	temp_to_series();
}

function write_stateword() {
	for (var i = 1; i <= 118; i++)
		element_ids[i].childNodes[n_big].childNodes[n_mass].innerHTML = element_ids[i].state;
}

function colorize_and_mass(includemass) {
	var attr = window[dataset], spec = window["spec_" + dataset], i;
	if (includemass) {
		if (dataset === "state") {
			clearTimeout(slider_data["stateTimer"]);
			slider_data["stateTimer"] = setTimeout(write_stateword, 30);
		} else {
			for (i = 1; i <= 118; i++)
				element_ids[i].childNodes[n_big].childNodes[n_mass].innerHTML = (attr[spec["subset"]][i] || " ");
			document.getElementById("Legend").childNodes[0].childNodes[n_mass].innerHTML = spec["Legend"][spec["subset"]];
		}
	}

	if (dataset === "boil" || dataset === "melt") {
		clearTimeout(slider_data["colorTimer"]);
		slider_data["colorTimer"] = setTimeout(getRef2(attr[0], spec, includemass), 3);
	}
	else if (dataset === "discover") time_machine(attr[0]);
	else if (dataset === "chemical") switch_series(spec["subset"]);
	else if (dataset !== "series" && dataset !== "state" && dataset !== "isotope" && dataset !== "orbital") color_other(attr[spec["subset"]].concat(), spec);
}

function switch_series(set) {
	on_mouse_over();
	if (set == 0)		wholetable.className = wholetable.className.replace("Boron Carbon Pnictogen Chalcogen", "Poor Metalloid Nonmetal");
	else if (set == 1)	wholetable.className = wholetable.className.replace("Poor Metalloid Nonmetal", "Boron Carbon Pnictogen Chalcogen");
	save_colors(default_colors);
	on_mouse_over(active);
}

function getRef2(attr, spec, includemass) {
	return function () { color_temp(attr, spec, includemass); };
}

function on_mouse_over(atomic) {
	if (active) dark(active);
	if (atomic) {
		dim(atomic);
		showDetails(atomic, (typeof conductivity !== "undefined" && tab === "PropertyTab"));
		if (tab === "OrbitalTab") tab_electron(atomic);
		active = atomic;
	}
}

function hide_closeup() {
	if (tab === "SeriesTab") {
		on_mouse_over();
		active = false;
		document.getElementById("Closeup").style.display = "none";
		matterstate.style.display = ""; matterstate.show = "block";
	}
}
// above and below are a mess
function on_mouse_out() {
	on_mouse_over();
	active = false;
	isotope_clean(tab === "IsotopeTab");
	toggle_display(["Closeup"], "none");
	matterstate.style.display = ""; matterstate.show = "block";
}

function isotope_clean(colors) {
	if (colors) restore_colors(current_colors = []);
	for (var x in isotope_intervals) clearInterval(isotope_intervals[x]);
	isotope_intervals = [];
	document.getElementById("isotopeholder").innerHTML = "";
	toggle_display(["IsotopeForm"], "");
	document.getElementById("Navigation").style.display = "";
}

function dim(atomic, nogroup) {
	if (winlist.length !== 1) element_ids[atomic].style.backgroundColor = calc_color(1, (current_colors.length ? current_colors : default_colors)[atomic], schemebase, 0, 2);
	if (nogroup !== true) {
		group_period(element_ids[atomic], highlight);
		dim_series(chemical[0][atomic], block[atomic], true);
	}
}

function dark(atomic, nogroup) {
	element_ids[atomic].style.backgroundColor = !current_colors.length ? "" : "#" + current_colors[atomic];
	if (nogroup !== true) {
		group_period(element_ids[atomic], "");
		dim_series(chemical[0][atomic], block[atomic], false);
	}
}

function dim_series(series, orbital, dim) {
//	if (series && series !== " " && series !== "Undiscovered") document.getElementById(series).className = (dim ? "" : series);
//	if (orbital && orbital !== " ") document.getElementById(orbital).className = (dim ? "" : orbital);
	if (series && series !== " " && series !== "Undiscovered") series_ids[series].style.backgroundColor = (dim ? "#DDDDDD" : "");
	if (orbital && orbital !== " ") block_ids[orbital].style.backgroundColor = (dim ? "#DDDDDD" : "");
}

function set_opacity(el, value) {
//	el.style.opacity = value; firefox is too slow to drag the wiki window
	el.style.filter = (value != 1) ? "alpha(Opacity=" + value * 100 + ")" : "";
}

function set_stateclass(elTarget, stateclass) {
	if (elTarget.className.indexOf(stateclass) === -1) elTarget.className = elTarget.className.replace(/Solid|Liquid|Gas|Unknown/, stateclass);
}

function move_helium(convert) {
	if (convert) {
		wholetable.tBodies[0].rows[0].insertBefore(element_ids[2], wholetable.tBodies[0].rows[0].cells[2]);
		wholetable.tBodies[0].rows[0].cells[3].style.display = "none";
		document.getElementById("SliderCell").colSpan++;
		document.getElementById("SliderCell").id = "OrbitalString";
		wholetable.className += " s p d f";
	} else {
		wholetable.tBodies[0].rows[0].cells[3].style.display = "";
		document.getElementById("OrbitalString").colSpan--;
		document.getElementById("OrbitalString").id = "SliderCell";
		wholetable.tBodies[0].rows[0].insertBefore(wholetable.tBodies[0].rows[0].cells[2], wholetable.tBodies[0].rows[0].cells[wholetable.tBodies[0].rows[0].cells.length - 1]);
		wholetable.className = wholetable.className.replace(" s p d f", "");
	}
//	insert_oxidation(convert);
	save_colors(default_colors);
}

function insert_oxidation(convert) {
	var i, oxi;
	if (convert) {
		for (i = 1; i <= 118; i++) if (orbital[1][i]) {
			oxi = document.createElement("sup");
			oxi.innerHTML = orbital[1][i];
			element_ids[i].childNodes[n_big].childNodes[2].appendChild(oxi);
		}
	} else {
		for (i = 1; i <= 118; i++) if (orbital[1][i]) {
			element_ids[i].childNodes[n_big].childNodes[2].removeChild(element_ids[i].childNodes[n_big].childNodes[2].getElementsByTagName("sup")[0]);
		}
	}
}

function move_keyblocks_to(container) {
	container[0].appendChild(document.getElementById("Closeup"));
	container[0].appendChild(document.getElementById("IsotopeForm"));
	container[1].appendChild(properties);
	if (tab === "PropertyTab") document.getElementById("t_" + dataset).checked = true;
	else if (tab === "IsotopeTab") document.getElementById("t_" + isoset).checked = true;
	container[1].appendChild(document.getElementById("Hund"));
	container[1].appendChild(document.getElementById("Block"));
	container[1].appendChild(document.getElementById("DecayModes"));
}

function keyboard_nav(e) {
	e = e || event;
	var topes = document.getElementById("isotopeholder").childNodes, newElement, count, pos, rowind, row, i;

	switch (e.keyCode) {
		case 13:
			if ((e.srcElement || e.target).nodeName.toUpperCase() !== "A") {
				if (topes.length && lastIsotope !== false && topes[lastIsotope].style.cursor === "pointer") { topes[lastIsotope].onclick(); }
				else if (active && lastIsotope === false) { element_ids[active].onclick(); }
			}
			break;
		case 27:
			if (wikibox.style.display == "block") destroy();
			else if (topes.length) element_ids[active].onclick();
			break;
	}

	if (e.keyCode >= 35 && e.keyCode <= 40) {
		if (topes.length) {
			lastIsotope = 0 || lastIsotope;
			switch (e.keyCode) {
				case 35: case 36:
					newElement = e.keyCode == 35 ? topes.length - 1 : 0;
					break;
				case 37: case 38: case 39: case 40:
					newElement = Math.max(0, Math.min(topes.length - 1, lastIsotope + (e.keyCode >= 39 ? +1 : -1)));
					break;
			}
			topes[newElement].onmouseover();
		} else {
			on_mouse_over(active || 1);
			switch (e.keyCode) {
				case 35:
					newElement = 118;
					break;
				case 36:
					newElement = 1;
					break;
				case 37: case 39:
					newElement = Math.max(1, Math.min(118, active - 38 + e.keyCode));
					break;
				case 38: case 40:
					count = 0, pos = active, rowind = element_ids[active].parentNode.rowIndex;
					if (e.keyCode == 40) {
						if (widecheck.checked) { if (rowind == 7) return; }
						else {
							if (rowind == 11 || pos == 39 || pos == 87 || pos == 88) return;
							if ((pos > 39 && pos < 57) || (pos > 71 && pos < 89)) pos += 15;
							else if (rowind == 10) pos += 17;
							else if (pos >= 104) pos -= 47;
						}
					} else {
						if (pos <= 2 || (pos >= 4 && pos <= 9) || (pos >= 21 && pos <= 30)) return;
						if (widecheck.checked) { if (pos >= 57 && pos <= 70) return; }
						else {
							if ((pos > 71 && pos <= 86) || rowind == 7) pos -= 15;
							else if (rowind == 11) pos -= 17;
							else if (pos > 57 && pos <= 71) pos += 62;
							else if (pos == 57) pos += 47;
						}
					}
					row = wholetable.tBodies[0].rows[rowind - (20 - e.keyCode / 2 + (element_ids[active].cellIndex < 3 ? 1 : 0))];
					for (i = 0; i < row.cells.length; i++) if (row.cells[i].className.indexOf("Element") != -1) count += e.keyCode - 39;
					newElement = pos + count;
					break;
			}
			on_mouse_over(newElement);
		}
	}
}

function group_period(el, color) {
	var period = el.parentNode.rowIndex - 1, count;
	wholetable.tBodies[0].rows[period > 7 ? period - 4 : period].cells[0].style.backgroundColor = color;
	if (period > 7) return;

	if (el.cellIndex < 3) count = el.cellIndex;
	else {
		count = 20 - wholetable.tBodies[0].rows[period].cells.length + el.cellIndex + widecheck.checked + (wholetable.tBodies[0].rows[period].cells[3].cellIndex !== 3);
		if (widecheck.checked && count <= 3) return;
	}
	wholetable.tHead.rows[0].cells[count].style.backgroundColor = color;
}

function hover_group(e) {
	e = e || event;
	var count = this.parentNode.cellIndex, min = 0, max = 7, atomic, period, index;
	if (count > 1 + (tab === "OrbitalTab") && count < 18 + (tab === "OrbitalTab") + widecheck.checked) min++;
	if (count > 2 && count < 13 + widecheck.checked) min += 2;
	if (!widecheck.checked && count == 3) max -= 2;

	for (period = min; period < max; period++) {
		if (count <= 3) index = count;
		else {
			index = wholetable.tBodies[0].rows[period].cells.length - 20 + count - widecheck.checked;
			if (widecheck.checked && index < 3) break;
		}
		atomic = wholetable.tBodies[0].rows[period].cells[index].idx;
		if (e.type == "mouseover" || e.type == "focus") dim(atomic, true);
		else if ((e.type == "mouseout" || e.type == "blur") && active !== atomic) dark(atomic, true);
	}
}

function hover_period(e) {
	e = e || event;
	var atomic, period = (this.nodeName.toUpperCase() === "A" ? this.parentNode.parentNode.rowIndex : this.parentNode.rowIndex),
	start = wholetable.rows[period].cells[1].idx,
	end = (tab === "OrbitalTab" && start === 1 ? 2 : wholetable.rows[period].cells[wholetable.rows[period].cells.length - 2].idx);
	for (atomic = start; atomic <= end; atomic++) {
		if (e.type == "mouseover" || e.type == "focus") dim(atomic, true);
		else if ((e.type == "mouseout" || e.type == "blur") && active !== atomic) dark(atomic, true);
	}
}

function getAjaxObj() {
	var xmlhttp, complete = false;
	try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
	catch (e) {
		try { xmlhttp = new XMLHttpRequest(); }
		catch (e) { xmlhttp = false; }
	}
	if (!xmlhttp) return null;
	this.connect = function (sURL, sVars, fnDone) {
		if (!xmlhttp) return false;
		complete = false;
		try {
			xmlhttp.open("GET", sURL + sVars, true);
			xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState == 4 && !complete) {
					complete = true;
					fnDone(xmlhttp, sVars);
				}
			};
			xmlhttp.send("");
		}
		catch(z) { return false; }
		return true;
	};
	return this;
}

function load_details(arrays) {
	if (!waiting) {
		waiting = true;
		throb_value = 1;
		throbber = setInterval(throb_properties, 50);
		var conn = new getAjaxObj(), list = [], set;
		for (set in arrays) {
			if (window[arrays[set]]) continue;
			if ("values" in window["spec_" + arrays[set]])
					list.push(arrays[set] + "-" + window["spec_" + arrays[set]]["values"].join(":").replace(/\s/g, "_").toLowerCase());
			else	list.push(arrays[set]);
		}
		conn.connect("data.php?set=", list.join(","), parse_into_arrays);
	}
}

function parse_into_arrays(oXML, sVars) {
	var returned_data = oXML.responseText.split("\n"), sets;
	for (sets in returned_data) {
		temp = [];
		arrays = returned_data[sets].split("=")[1].split(":");
		for (element in arrays) temp.push(eval("[" + arrays[element] + "]"));
		window[returned_data[sets].split("=")[0]] = temp;
	}
	waiting = false;
	clearInterval(throbber);
	document.getElementById("PropertyTab").style.backgroundColor = "";
	switch_viz(dataset_changed(true, document.forms["visualize"]));
	if (tab === "PropertyTab" && active) on_mouse_over(active);
}

function load_isotope(atomic) {
	init_throb(atomic);
	if (isotopecache[atomic])
		click_isotope(isotopecache[atomic], atomic, true);
	else {
		var conn = new getAjaxObj();
		conn.connect("isotope.php?set=", atomic, click_isotope);
	}
}

function click_isotope(oXML, atomic, fast) {
	isotope_clean(true);
	save_colors(search_colors);
	search(String(atomic));
	isotopecache[atomic] = oXML;
	if (!widecheck.checked) { matterstate.style.display = "none"; matterstate.show = "none"; }
	document.getElementById("Closeup").style.display = "none";
	toggle_display(["IsotopeForm"], "block");

	var sets, count = 0, returned_data = isotopecache[atomic].responseText.split("\n");
	selected = [], halflife = [], binding = [], masscontrib = [], isomass = [], neutrons = [], width = [], wiki = [];
	isotopeDetails(false, false, true);
	document.getElementById("Navigation").style.display = "none";
	for (sets in returned_data)
		if (returned_data[sets].split(",")[i_selected] * 1 <= spec_isotope["subset"] * 1)
			draw_isotope(atomic, ++count, returned_data[sets].split(","), fast);
	document.getElementById("ISONAME").childNodes[0].innerHTML = element_ids[atomic].childNodes[n_big].childNodes[n_name].innerHTML;
	document.getElementById("ISONAME").childNodes[1].innerHTML = "";
	finish_throb(atomic, throbber);
	document.forms["isotopes"].onclick();
	if (!fast) fade_isotopes(0);
}

function fade_isotopes(n) {
	var x, topes = document.getElementById("isotopeholder").childNodes;
	for (x = 0; x <= 3; x++)
		if (n - x >= 0 && topes[n - x]) fade_opacity(topes[n - x], Math.pow(2, x - 3));
	if (n - 1 <= topes.length) setTimeout(getRef(++n), 30);
}
function getRef(n) {
	return function () { fade_isotopes(n); };
}

function draw_isotope(atomic, count, specs, fast) {
	var i, x, topes, position;
	for (i in datasets["IsotopeTab"])
		window[datasets["IsotopeTab"][i]][count] = specs[window["i_" + datasets["IsotopeTab"][i]]];
	nuclide = document.createElement("div");
	nuclide.idx = count;
	nuclide.onmouseover = function () {
		lastIsotope = this.ordinal;
		topes = document.getElementById("isotopeholder").childNodes;
		for (x = 0; x < topes.length; x++) {
			if (x < this.ordinal) topes[x].style.zIndex = topes[x].ordinal;
			else topes[x].style.zIndex = 100 - topes[x].ordinal;
		}
		isotopeDetails(this, count);
		document.getElementById("DecayModes").className = this.decayMode;
	};
	nuclide.decayMode = specs[i_decaymode] ? specs[i_decaymode] : "Stable";
	nuclide.className = element_ids[atomic].className + " " + nuclide.decayMode;
	nuclide.appendChild(element_ids[atomic].childNodes[n_big].cloneNode(true));
	nuclide.childNodes[0].childNodes[n_symbol].innerHTML = "<sup style='color: black; letter-spacing: -1px; font-weight: normal; font-size: 0.8em;'>" + specs[i_neutrons] + "<\/sup>" + element_ids[atomic].childNodes[n_big].childNodes[n_symbol].innerHTML;
	nuclide.childNodes[0].childNodes[4].innerHTML += "-" + specs[i_neutrons];
	nuclide.childNodes[0].childNodes[n_mass].innerHTML = window[isoset === "isoname" ? "isomass" : isoset][count];
	nuclide.childNodes[0].removeChild(nuclide.childNodes[0].childNodes[n_atomic]);
	if (specs[i_wiki] == 1) {
		nuclide.style.cursor = "pointer";
		nuclide.onclick = click_wiki;
	}
	nuclide.ordinal = count - 1;
	document.getElementById("isotopeholder").appendChild(nuclide);
	position = findPos(element_ids[atomic], [-findPos(nuclide, [0, 0])[0], -findPos(nuclide, [0, 0])[1]]);
	nuclide.style.left = -position[0] + 20 * count + "px";
	nuclide.style.top = -position[1] + 20 * count + "px";
	nuclide.style.zIndex = count + 1;
	if (!fast) fade_opacity(nuclide, 0);
}

function isotopeDetails(obj, inc, clear) {
	document.getElementById("HALFLIFE").innerHTML = clear ? "" : timeunits(halflife[inc]);
	document.getElementById("ISONAME").childNodes[1].innerHTML = clear ? "" : "-" + neutrons[inc];
	document.getElementById("ISOMASS").innerHTML = clear ? "" : isomass[inc];
	document.getElementById("BINDING").innerHTML = clear ? "" : (binding[inc] || "Unknown");
	document.getElementById("MASSCONTRIB").innerHTML = clear ? "" : masscontrib[inc] + "%";
	document.getElementById("WIDTH").innerHTML = clear ? "" : scinot(width[inc]);
}

function no_sideways() {
	var st = document.getElementById("Series");
	st.className += " WMfix";
	// measure instead of this
	if (language === "zh" || language === "ja" || language === "ko") return;
	st = st.tBodies[0];

	st.insertRow(0).insertCell(-1).rowSpan = 2;
	st.rows[0].appendChild(st.rows[1].cells[1]).rowSpan = 2;
	st.rows[0].appendChild(st.rows[1].cells[1]);

	st.insertRow(1).appendChild(st.rows[3].cells[5]).rowSpan = 1;
	st.rows[1].appendChild(st.rows[3].cells[5]).rowSpan = 1;
	st.rows[1].appendChild(st.rows[3].cells[5]).rowSpan = 1;
}

function load_script(file) {
	var demo = document.createElement("script");
	demo.src = "Script/" + file + ".js";
	demo.type = "text/javascript";
	document.getElementsByTagName("head")[0].appendChild(demo);
	return false;
}

function dim_diagonal(elements, color) {
	for (var x in elements) element_ids[elements[x]].style.backgroundColor = (color !== 0 ? calc_color(color, default_colors[elements[x]], schemebase, 0, 3) : "");
}
