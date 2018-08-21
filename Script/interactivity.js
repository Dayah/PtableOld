window.onload = function() {
	n_atomic = 0; n_name = (language == "zh") ? 2 : 4; n_symbol = 2; n_mass = 5;
	i_neutrons = 0, i_isomass = 1, i_binding = 2, i_masscontrib = 3, i_halflife = 4, i_decaymode = 5, i_width = 6;

	lastIsotope = false;
	oldYellow = false;
	lastHover = false;
	lastOrbital = false;
	waiting = false;
	keyscroll = false;
	dataset = "series";
	tab = "Series";

	widecheck = document.getElementById("wide");
	wholetable = document.getElementById("Main");
	detail = document.getElementById("CloseupElement");
	detailelectrons = document.getElementById("CloseupElectron");
	key_id = document.getElementById("SeriesBox");
	display = document.getElementById("SliderDisplay");
	slider = document.getElementById("SliderBar");
	searchinput = document.getElementById("SearchInput");
	aufbau = document.getElementById("Hund").tBodies[0].getElementsByTagName("th");
	wikibox = document.getElementById("WikiBox");

	window.frames["WikiFrame"].document.body.innerHTML = "<h1>Loading&hellip;<\/h1>";
	init_layout();
	series = [[]];
	for (var i = 1; i <= 118; i++) {
		series[0][i] = element_ids[i].childNodes[n_mass].innerHTML;
		element_ids[i].className += " Solid";
		while (element_ids[i].nextSibling.nodeType != 1) element_ids[i] = element_ids[i].nextSibling;
		element_ids[i].nextSibling.className += " Solid";
	}
	current_colors = [], default_colors = [];
	save_colors(default_colors);

	melt = [[3823,14.01,0.95,453.69,1560,2348,3823,63.05,54.8,53.5,24.56,370.87,923,933.47,1687,317.3,388.36,171.6,83.8,336.53,1115,1814,1941,2183,2180,1519,1811,1768,1728,1357.77,692.68,302.91,1211.4,1090,494,265.8,115.79,312.46,1050,1799,2128,2750,2896,2430,2607,2237,1828.05,1234.93,594.22,429.75,505.08,903.78,722.66,386.85,161.3,301.59,1000,1193,1071,1204,1294,1373,1345,1095,1586,1629,1685,1747,1770,1818,1092,1936,2506,3290,3695,3459,3306,2739,2041.4,1337.33,234.32,577,600.61,544.4,527,575,202,300,973,1323,2023,1845,1408,917,913,1449,1618,1323,1173,1133,1800,1100,1100,1900]];
	boil = [[5870,20.28,4.22,1615,2743,4273,4300,77.36,90.2,85.03,27.07,1156,1363,2792,3173,553.6,717.87,239.11,87.3,1032,1757,3103,3560,3680,2944,2334,3134,3200,3186,3200,1180,2477,3093,887,958,332,119.93,961,1655,3618,4682,5017,4912,4538,4423,3968,3236,2435,1040,2345,2875,1860,1261,457.4,165.1,944,2143,3737,3633,3563,3373,3273,2076,1800,3523,3503,2840,2973,3141,2223,1469,3675,4876,5731,5828,5869,5285,4701,4098,3129,629.88,1746,2022,1837,1235,610,211.3,950,2010,3473,5093,4273,4200,4273,3503,2284,3383]];
	isotope = [[0,3,2,2,3,2,3,3,3,2,3,2,3,2,4,3,5,3,7,3,9,5,6,4,5,4,7,5,8,2,7,2,7,3,9,2,9,5,9,5,8,5,9,5,10,5,9,6,11,2,11,3,11,3,13,4,8,3,8,3,7,3,8,4,7,3,8,5,11,5,11,4,8,7,7,2,11,7,9,5,11,3,6,3,3,1,2,3,4,3,6,6,6,3,6,3,8,5,7,4,4,3,3,1,1,1,1,2,2,1,1,1,1,1,1,1,0,0,0],[1,7,9,10,12,14,15,16,17,18,19,20,22,22,23,23,24,24,24,24,24,25,26,26,26,26,28,29,31,29,30,31,32,33,30,31,32,32,33,33,33,33,33,34,34,34,34,38,38,39,39,37,38,37,38,40,40,39,39,39,38,38,38,38,36,36,36,36,35,35,35,35,36,36,35,35,35,36,37,37,40,37,38,36,33,31,34,34,33,31,30,29,26,20,20,19,20,20,20,19,19,18,17,16,16,16,16,16,15,15,15,12,9,5,5,5,4,2,1]];
	property = series;
	orbital = [[0,1,0,1,2,3,4,3,2,1,0,1,2,3,4,5,6,5,0,1,2,3,4,5,6,4,3,4,4,2,2,3,4,5,6,7,4,1,2,3,4,5,6,7,6,6,4,4,2,3,4,5,6,7,6,3,2,3,4,4,3,3,3,3,3,4,3,3,3,3,3,3,4,5,6,7,7,6,6,7,2,3,4,5,6,7,6,3,2,3,4,5,6,6,6,4,4,4,4,4,3,3,3,3,4,5,6,7,,,,,,,,,,,6]];

	shellL = {"s": 0, "p": 1, "d": 2, "f": 3};

	datasets = {"Property": ["melt", "boil", "electroneg", "discover", "affinity", "heat", "radius", "abundance", "ionize", "density", "conduct", "electronstring"],
		"Isotope": ["isomass", "binding", "masscontrib", "halflife", "width", "neutrons"]};
	spec_state = {"unit": [" K"], "slidermin": 0, "slidermax": 6000, "default": 273, "Legend": ["State"]};
	spec_series = {"unit": [" K"], "slidermin": 0, "slidermax": 6000, "default": 273, "Legend": ["<span>Atomic </span>Mass"], "replace": [,], "subset": 0};
	spec_property = spec_series;
	spec_orbital = spec_series;
	spec_isotope = {"unit": ["isotopes"], "Legend": ["Isotopes","Isotopes"], "values": ["Select", "All"], "subset": 0};

	spec_melt = {"unit": [" K"], "startcolor": "#6666FF", "endcolor": "#FF0000", "defaultcolor": "#FFFFFF", "slidermin": 0, "slidermax": 6000, "default": 273, "Legend": ["Kelvin"], "replace": [,], "subset": 0};
	spec_boil = {"unit": [" K"], "startcolor": "#6666FF", "endcolor": "#FF0000", "defaultcolor": "#FFFFFF", "slidermin": 0, "slidermax": 6000, "default": 273, "Legend": ["Kelvin"], "replace": [,], "subset": 0};
	spec_electroneg = {"unit": [""], "startcolor": "#FFFF66", "endcolor": "#FF0000", "defaultcolor": "#FFFFFF", "Legend": ["Pauling"], "scale": "linear", "replace": [,], "subset": 0};
	spec_radius = {"unit": [" pm"," pm"," pm"], "startcolor": "#FFFFFF", "endcolor": "#008800", "defaultcolor": "#FFFFFF", "Legend": ["pm","pm","pm"], "values": ["Calc","Emp.","Coval."], "scale": "linear", "replace": [,], "subset": 0};
	spec_ionize = {"unit": [" kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"], "startcolor": "#66FF66", "endcolor": "#6666FF", "defaultcolor": "#FFFFFF", "Legend": ["kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol"], "values": ["1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","13th","14th","15th","16th","17th","18th","19th","20th","21st","22nd","23rd","24th","25th","26th","27th","28th","29th","30th"], "scale": "log", "replace": [,], "subset": 0};
	spec_discover = {"unit" : [""], "slidermin": 1730, "slidermax": 2007, "default": 2007, "startcolor" : "#FFFFFF", "endcolor" : "#666600", "defaultcolor": "#FFFFFF", "Legend": ["Year"], "replace": [,], "subset": 0};
	spec_density = {"unit": [" kg/m&sup3;"," kg/m&sup3;"], "startcolor": "#FFFFFF", "endcolor": "#006666", "defaultcolor": "#FFFFFF", "Legend": ["kg/m&sup3;","kg/m&sup3;"], "values": ["STP","Liquid"], "scale": "linear", "replace": [,], "subset": 0};
	spec_affinity = {"unit": [" kJ/mol"], "startcolor": "#006600", "endcolor": "#FFFFFF", "defaultcolor": "#CCCCCC", "Legend": ["kJ/mol"], "scale": "log", "replace": [,], "subset": 0};
	spec_abundance = {"unit": ["%","%","%","%","%","%"], "startcolor": "#FFFFFF", "endcolor": "#3333FF", "defaultcolor": "#CCCCCC", "Legend": ["%","%","%","%","%","%"], "values": ["Universe","Solar","Meteor","Crust","Ocean","Human"], "scale": "log", "replace": [/e(.*)/, "×10<sup>$1<\/sup>"], "subset": 0};
	spec_heat = {"unit": [" J/kgK"," kJ/mol"," kJ/mol"], "startcolor": "#FFFFFF", "endcolor": "#FF0000", "defaultcolor": "#CCCCCC", "Legend": [" J/kgK"," kJ/mol"," kJ/mol"], "values": ["Specific","Vapor","Fusion"], "scale": "log", "replace": [,], "subset": 0};
	spec_conduct = {"unit": [" W/mK"," MS/m"], "startcolor": "#FFFFFF", "endcolor": "#880000", "defaultcolor": "#BBBBBB", "Legend":["W/mK","MS/m"], "values": ["Therm.","Elect."], "scale": "log", "replace": [,], "subset": 0};
	spec_electronstring = {"unit": [""], "replace": [/(\d+)(\d[spdf]|$)/g, "<sup>$1<\/sup> $2"], "subset": 0};

	spec_masscontrib = {"unit": ["%"], "startcolor": "#FEFEFE", "endcolor": "#FE0101", "defaultcolor": "#CCCCCC", "Legend": ["%"], "scale": "lin", "replace": [,], "subset": 0};
	spec_isomass = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#FE0101", "defaultcolor": "#CCCCCC", "Legend": [""], "scale": "lin", "replace": [,], "subset": 0};
	spec_halflife = {"unit": ["Time"], "startcolor": "#FEFEFE", "endcolor": "#010101", "defaultcolor": "#010101", "scale": "log", "subset": 0};
	spec_binding = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#01FE01", "defaultcolor": "#CCCCCC", "scale": "lin", "subset": 0};
	spec_isomass = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#0101FE", "defaultcolor": "#CCCCCC", "scale": "lin", "subset": 0};
	spec_width = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#01FEFE", "defaultcolor": "#CCCCCC", "scale": "lin", "subset": 0};

	document.getElementById("names").onclick = function() { click_checkbox("names", this); };
	document.getElementById("electrons").onclick = function() { click_checkbox("electrons", this); };
	widecheck.onclick = function() { click_checkbox("wide", this); };
	document.getElementById("SeriesTab").onclick = function() { activeTab("Series", true); return false; };
	document.getElementById("PropertyTab").onclick = function() { activeTab("Property", true); return false; };
	document.getElementById("IsotopeTab").onclick = function() { activeTab("Isotope", true); return false; }
	document.getElementById("OrbitalTab").onclick = function() { activeTab("Orbital", true); return false; }
	searchinput.onkeyup = function() { search(this.value); };
	searchinput.onkeydown = function(e) { e = e || event; e.cancelBubble = true; };
	document.forms["visualize"].onkeydown = function(e) { e = e || event; e.cancelBubble = true; };
	document.getElementById("langswitch").onkeydown = function(e) { e = e || event; e.cancelBubble = true; };
	searchinput.onfocus = function() {
		activeTab("Series", true);
		search_active = true;
		if (this.value == "# or Name") this.value = "";
		search(this.value);
	};
	searchinput.onblur = function() {
		this.value = "# or Name";
		search_active = false;
		results = 0;
		activeTab("Series", true);
		on_mouse_over(lastHover);
	};
	document.getElementById("SliderTrack").onmousedown = slider_skip;
	document.getElementById("SliderTrack").onmouseup = sliderMouseUp;
	display.onkeyup = sliderMouseUp;
	display.onkeydown = slider_arrow;
	document.onkeydown = keyboard_nav;
	slider.onmousedown = startSlide;

	if (!language.match(/en|zh/) || document.referrer.indexOf("name") != -1) document.getElementById("names").checked = true;
	if (document.getElementById("names").checked) click_checkbox("names", document.getElementById("names"));
	if (document.getElementById("electrons").checked) click_checkbox("electrons", document.getElementById("electrons"));
	if (widecheck.checked) click_checkbox("wide", widecheck);
	init_slider();

//document.getElementsByTagName("h1")[0].onmouseover = function() { this.getElementsByTagName("span")[0].style.visibility = "hidden"; };
}

function dataset_changed() {
	el = this || srcElement;
	for (var i = 0; i < el.length; i++)
		if (el[i].checked && el[i].value != dataset)
			switch_viz(el[i].value);
}

function switch_viz(newset) {
	dataset = newset;
	on_mouse_over();
	if (dataset == "series") { lastHover = false; restore_colors(default_colors); }
	if (dataset != "state" && dataset != "isotope") wholetable.className = "";
	if (tab == "Property" && dataset != "property" && dataset != "orbital") {
		if (oldYellow) yellowize(oldYellow, "");
		yellowize(dataset, "yellow");
		oldYellow = dataset;
	}
	init_slider();
	save_colors(current_colors);
	on_mouse_over(lastHover);
}

function yellowize(el, color) {
	document.getElementById("l_" + el).parentNode.style.backgroundColor = color;
	document.getElementById("t_" + el).parentNode.style.backgroundColor = color;
	document.getElementById(el.toUpperCase()).style.backgroundColor = color;
}

function colorize_and_mass(includemass) {
	var attr = window[dataset];
	var spec = window["spec_" + dataset];
	if (includemass) {
		if (dataset == "state")
			for (var i = 1; i <= 118; i++)
				element_ids[i].childNodes[n_mass].innerHTML = element_ids[i].className.replace(/.*(Solid|Liquid|Gas|Unknown).*/, "$1");
		else if (tab != "Isotope" && dataset != "isotope") {
			for (var i = 1; i <= 118; i++)
				if (typeof(attr[spec["subset"]][i]) != "undefined") element_ids[i].childNodes[n_mass].innerHTML = String(attr[spec["subset"]][i]).replace(/([\d\.]{7})(\d+)/, "$1<span>$2</span>");
				else element_ids[i].childNodes[n_mass].innerHTML = "&nbsp;";
			document.getElementById("Legend").childNodes[n_mass].innerHTML = spec["Legend"][spec["subset"]];
		}
	}

	if (tab == "Isotope" && dataset != "isotope") color_isotope(attr.concat(), spec);
	else if (dataset == "boil" || dataset == "melt") color_temp(attr[0], spec);
	else if (dataset == "discover") discover_gradient(attr[0]);
	else if (dataset != "series" && dataset != "state" && dataset != "isotope" && dataset != "property" && dataset != "orbital") color_other(attr[spec["subset"]].concat(), spec);
}

function color_isotope(valueArray, specArray) {
	var min = 10000000000, max = 0;
	for (var x = 1; x < valueArray.length; x++) {
		valueArray[x] *= 1;
		switch(specArray["scale"]) {
			case "log":	valueArray[x] = Math.log(valueArray[x]); break;
			case "inverse":	valueArray[x] = 1 / valueArray[x]; break;
		}
		if (valueArray[x] < min && valueArray[x] != -Infinity && !isNaN(valueArray[x])) min = valueArray[x];
		if (valueArray[x] > max && valueArray[x] != -Infinity && !isNaN(valueArray[x])) max = valueArray[x];
	}
	for (var i = 1; i < valueArray.length; i++) {
		if (!isNaN(valueArray[i]))
			set_bgcolor(document.getElementById("isotopeholder").childNodes[i - 1], calc_color(valueArray[i] == -Infinity ? min : valueArray[i], specArray["startcolor"], specArray["endcolor"], min, max), true);
		else	set_bgcolor(document.getElementById("isotopeholder").childNodes[i - 1], specArray["defaultcolor"], true);
	}
}

function init_layout() {
	element_ids = [];
	var tags = document.getElementsByTagName("td");
	for (var i = 0; i < tags.length; i++) {
		var current = tags[i];
		if (current.className.indexOf("Element") != -1) {
			var atomic = current.childNodes[n_atomic].innerHTML * 1;
			if (!element_ids[atomic]) element_ids[atomic] = current;
		}
	}
	attach("wiki");
	results = 0;
	search_active = false;
	document.forms["visualize"].onclick = dataset_changed;
	document.forms["isotopes"].onclick = dataset_changed;
}

function click_checkbox(name, obj) {
	var sheet_electron = 1; sheet_names = 2;
	switch (name) {
		case "names":
			document.styleSheets[sheet_names].disabled = obj.checked;
			if (!obj.checked && document.getElementById("electrons").checked) document.getElementById("electrons").checked = false;
			document.styleSheets[sheet_electron].disabled = document.getElementById("electrons").checked;
			init_slider();
			break;
		case "electrons":
			document.styleSheets[sheet_names].disabled = true;
			if (obj.checked) document.getElementById("names").checked = document.styleSheets[sheet_electron].disabled = true;
			else document.styleSheets[sheet_electron].disabled = !document.getElementById("names").checked;
			init_slider();
			break;
		case "wide":
			insert_rareearths(obj);
			break;
	}
	var checkbox_ids = ["names", "electrons", "wide"];
	for (x in checkbox_ids) document.getElementById(checkbox_ids[x]).parentNode.className = (document.getElementById(checkbox_ids[x]).checked) ? "Active" : "";
}

function startWikiDrag(e) {
	var el = this || srcElement;
	e = e || event;
	this.startX = this.offsetLeft;
	this.startY = this.offsetTop;
	this.mouseStartX = e.clientX;
	this.mouseStartY = e.clientY;
	document.onmousemove = moveWiki;
	document.onmouseup = releaseWiki;
	return false;
}

function moveWiki(e) {
	e = e || event;
	wikibox.style.left = wikibox.startX + e.clientX - wikibox.mouseStartX + "px";
	wikibox.style.top = wikibox.startY + e.clientY - wikibox.mouseStartY + "px";
	return false;
}

function releaseWiki(e) {
	document.onmousemove = null;
	document.onmouseup = null;
}

function click_wiki(address, atomic) {
	var wiki = window.frames["WikiFrame"];
	wiki.location.replace("about:blank");
	document.getElementById("ElementName").innerHTML = address;
	wikibox.style.display = "block";
	if (atomic) init_throb(atomic);
	wikibox.onmousedown = startWikiDrag;
	document.getElementById("ElementName").href = "http://" + language + ".wikipedia.org/wiki/" + encodeURIComponent(address);
	wiki.location.replace("http://" + language + ".wikipedia.org/w/index.php?title=" + encodeURIComponent(address) + "&printable=yes");

/*	if (navigator.userAgent.match(/MSIE [67]/))
		wiki.location.href = "http://" + language + ".wikipedia.org/w/index.php?title=" + encodeURIComponent(address) + "&printable=yes";
	else if (language == "en")
		wiki.location.href = language + ".wikipedia.org/wiki/" + address + ".html";
	else
		wiki.document.body.innerHTML = "Internet Explorer 6+ required to view multilingual element descriptions due to frame security issues.";
*/
}

function destroy() {
	window.frames["WikiFrame"].location.href = "about:blank";
	wikibox.style.display = "";
//	window.frames["WikiFrame"].document.body.innerHTML = "<h1>Loading&hellip;<\/h1>";
}

function save_colors(colorsarray) {
	for (var i = 1; i <= 118; i++) {
		if (element_ids[i].currentStyle)	colorsarray[i] = "#" + element_ids[i].currentStyle.backgroundColor.replace(/^#/, "");
		else if (window.getComputedStyle)	colorsarray[i] = "#" + rgb2hex(document.defaultView.getComputedStyle(element_ids[i], null).getPropertyValue("background-color"));
	}
}

function restore_colors(colorsarray) {
	for (var i = 1; i <= 118; i++) set_bgcolor(element_ids[i], (colorsarray.length ? colorsarray[i] : ""), false);
}

function activeTab(name, full) {
	var tabs = ["Series", "Property", "Orbital", "Isotope"];
	if (full) {
		if (tab == "Orbital") move_helium(false);
		switch (name) {
			case "Series":
				tab = name;
				switch_viz("series");
				break;
			case "Property":
				tab = name;
				if (typeof(conduct) == "undefined") load_details(datasets[tab]);
				switch_viz("property");
				attach("wiki");
				document.getElementById("Closeup").style.display = "";
				document.getElementById("PropertyBox").appendChild(document.getElementById("Closeup"));
				break;
			case "Orbital":
				if (typeof(electronstring) == "undefined") {
					load_details(["electronstring"]);
					return;
				}
				switch_viz("orbital");
				tab = name;
				move_helium(true);
				attach("orbitals");
				break;
			case "Isotope":
				tab = name;
//				if (typeof(electronstring) == "undefined")
//					load_details(["electronstring"]);
				document.getElementById("IsotopeBox").appendChild(document.getElementById("Closeup"));
				document.getElementById("IsotopeForm").style.display = "none";
				switch_viz("isotope");
				attach("isotopes");
				break;
		}
	}
	for (x in tabs) {
		document.getElementById(tabs[x] + "Box").style.display = (name == tabs[x]) ? "block" : "none";
		if (widecheck.checked) key_id.style.display = "";
		document.getElementById(tabs[x] + "Tab").className = (document.getElementById(tabs[x] + "Box").style.display != "none") ? "Active" : "";
	}
}

function findSymbol(m, sym) {
	for (var i = 1; i <= 118; i++)
		if (element_ids[i].childNodes[n_symbol].innerHTML == sym)
			return electronstring[0][i];
}

function tab_electron(atomic) {
	var shellcoeff = {"s": 0, "p": 0.75, "d": 1.5, "f": 2.25}, max = [0, 0], shells = [], elecstr = electronstring[0][atomic];
	while (elecstr.match(/\[.*\]/)) elecstr = elecstr.replace(/\[(.*)\]/, findSymbol);
	var parts = elecstr.replace(/(\d+)(\d[spdf]|$)/g, "$1 $2").split(" ");
	wholetable.tBodies[0].rows[0].cells[wholetable.tBodies[0].rows[0].cells.length - 4].innerHTML = elecstr.replace(spec_electronstring["replace"][0], spec_electronstring["replace"][1]);
	for (var x = 0; x < parts.length - 1; x++) {
		shells[parts[x].substr(0, 2)] = parts[x].match(/[spdf](\d+)$/)[1];
		if (Number(parts[x].charAt(0)) + shellcoeff[parts[x].charAt(1)] > max[1])
			max = [parts[x].substr(0, 2), Number(parts[x].charAt(0)) + shellcoeff[parts[x].charAt(1)], shells[parts[x].substr(0, 2)]];
	}
	for (var x = 0; x < aufbau.length; x++) {
		var len = aufbau[x].parentNode.cells.length - 1;
		for (var y = 1; y <= len * 2; y++)
			aufbau[x].parentNode.cells[y <= len ? y : y - len].childNodes[y <= len ? 0 : 1].style.visibility = (y <= (aufbau[x].innerHTML.substr(0, 2) in shells ? shells[aufbau[x].innerHTML.substr(0, 2)] : 0) ? "visible" : "hidden");
	}
	hover_orbital(max[0].charAt(1), max[2] - 1, max[0].charAt(0) - shellL[max[0].charAt(1)] - 1);
}

function hover_orbital(l, m, n) {
	if (lastOrbital) lastOrbital.className = "";
	document.getElementById("Orbital").style.backgroundImage = "url(\"Images/orbitals-" + l + ".png\")";
	document.getElementById("Orbital").style.backgroundPosition = "-" + 108 * m + "px -" + 108 * n + "px";
	var row = document.getElementById("Hund").rows[0].cells[shellL[l]].getElementsByTagName("table");
	cell = row[row.length - n - 1].rows[0].cells;
	lastOrbital = cell[m + 1 >= cell.length ? m - (cell.length - 2) : m + 1];
	document.getElementById("lmn").rows[0].cells[2].innerHTML = shellL[l];
	document.getElementById("lmn").rows[1].cells[2].innerHTML = (m + 1 >= cell.length ? m - (cell.length - 1) : m) - shellL[l];
	document.getElementById("lmn").rows[2].cells[2].innerHTML = n + shellL[l] + 1;
	lastOrbital.className = "HoverOrbital";
}

function attach(what) {
	switch (what) {
		case "orbitals":
			var hund = document.getElementById("Hund").getElementsByTagName("table");
			for (var i = 0; i < hund.length; i++) {
				var temp = hund[i].getElementsByTagName("td");
				for (var j = 0; j < temp.length; j++) {
					temp[j].l = temp[j].parentNode.cells[0].innerHTML.charAt(1);
					temp[j].n = temp[j].parentNode.cells[0].innerHTML.charAt(0) - 1 - shellL[temp[j].l];
					temp[j].m = temp[j].cellIndex - 1;
					temp[j].onmouseover = function() { hover_orbital(this.l, this.m, this.n); };
				}
			}
			break;
		case "isotopes":
			for (var i = 1; i <= 118; i++) {
				element_ids[i].idx = i;
				element_ids[i].onmouseover = function() { on_mouse_over(this.idx); };
				element_ids[i].onclick = function() { load_isotope(this.idx); };
			}
			break;
		case "wiki":
			for (var i = 1; i <= 118; i++) {
				element_ids[i].idx = i;
				element_ids[i].onmouseover = function() { on_mouse_over(this.idx); };
				element_ids[i].onclick = function() { click_wiki(element_ids[this.idx].childNodes[n_name].innerHTML, this.idx); };
			}
		case "groups":
			var groups = wholetable.tHead.rows[0].cells;
			for (var i = 1; i < groups.length; i++) {
				groups[i].idx = i;
				groups[i].onclick = function() { click_wiki("Group " + groups[this.idx].innerHTML + " element"); };
			}
			break;
	}
}

function showDetails(atomic) {
	elTarget = element_ids[atomic];
	detail.innerHTML = "";
	for (var i = 0; i < elTarget.childNodes.length; i++)
		detail.appendChild(elTarget.childNodes[i].cloneNode(true));
	detail.childNodes[n_mass].innerHTML = series[0][atomic];
	while (elTarget.nextSibling.nodeType != 1) elTarget = elTarget.nextSibling;
	detailelectrons.innerHTML = elTarget.nextSibling.innerHTML;
	detail.style.backgroundColor = detailelectrons.style.backgroundColor = default_colors[atomic];
	document.getElementById("STATE").innerHTML = element_ids[atomic].className.replace(/.*(Solid|Liquid|Gas|Unknown).*/, "$1");
	for (attribute in datasets["Property"]) {
		var attr = window[datasets["Property"][attribute]];
		var spec = window["spec_" + datasets["Property"][attribute]];
		var subset = spec["subset"];
		document.getElementById(datasets["Property"][attribute].toUpperCase()).innerHTML = typeof(attr[subset][atomic]) != "undefined" ? String(attr[subset][atomic]).replace(spec["replace"][0], spec["replace"][1]) + spec["unit"][subset] : "Unknown";
	}
}

function state_classes() {
	var value = display.value * 1;
	for (var i = 1; i <= 118; i++) {
		if (!boil[0][i] && !melt[0][i])	set_stateclass(element_ids[i], "Unknown", false);
		else if (value > boil[0][i])	set_stateclass(element_ids[i], "Gas", false);
		else if (value > melt[0][i])	set_stateclass(element_ids[i], "Liquid", false);
		else				set_stateclass(element_ids[i], "Solid", false);
	}
}

function rgb2hex(value) {
	var hex = "", h = /(\d+)[, ]+(\d+)[, ]+(\d+)/.exec(value);
	for (var i = 1; i <= 3; i++)
		hex += (h[i] < 16 ? "0" : "") + parseInt(String(h[i])).toString(16);
	return (hex);
}

function calc_color(value, start, end, min, max) {
	var n = (value - min) / (max - min);
	var s = parseInt(start.replace("#", ""), 16);
//	if (start.length < 6) s = ((((s & 0xF00) << 4) + (s & 0xF00)) << 8) + ((((s & 0x0F0) << 4) + (s & 0x0F0)) << 4) + ((((s & 0x00F) << 4) + (s & 0x00F)) << 0);
	var e = parseInt(end.replace("#", ""), 16);
//	if (end.length < 6) e = ((((e & 0xF00) << 4) + (e & 0xF00)) << 8) + ((((e & 0x0F0) << 4) + (e & 0x0F0)) << 4) + ((((e & 0x00F) << 4) + (e & 0x00F)) << 0);

	var r = Math.round(((e >> 16) - (s >> 16)) * n) + (s >> 16);
	var g = Math.round((((e >> 8) & 0xFF) - ((s >> 8) & 0xFF)) * n) + ((s >> 8) & 0xFF);
	var b = Math.round(((e & 0xFF) - (s & 0xFF)) * n) + (s & 0xFF);
// bug here with #00 F F
	return ((r & 0xF0) ? "#" : ((r & 0x0F) ? "#0" : "#00")) + ((r << 16) + (g << 8) + b).toString(16);
}

function color_temp(temparray, specArray) {
	var value = display.value * 1;
	var startcolor = specArray["startcolor"];
	var endcolor = specArray["endcolor"];
	var max = temparray[0];
	for (var i = 1; i <= 118; i++) {
		if (temparray[i] < value)	set_bgcolor(element_ids[i], calc_color(temparray[i], startcolor, "FFFFFF", 0, value), false);
		else if (temparray[i] >= value) set_bgcolor(element_ids[i], calc_color(temparray[i], "FFFFFF", endcolor, value, max), false);
		else				set_bgcolor(element_ids[i], specArray["defaultcolor"], false);
	}
}

function discover_gradient(discarray) {
/*
	elTarget.className = elTarget.className.replace(/Solid|Liquid|Gas|Unknown/, stateclass);
	if (!stop) {
		while (elTarget.nextSibling.nodeType != 1) elTarget = elTarget.nextSibling;
		set_stateclass(elTarget.nextSibling, stateclass, true);
	}
*/
	var value = display.value * 1;
	for (var i = 1; i <= 118; i++) {
		if (discarray[i] < value || !discarray[i]) set_bgcolor(element_ids[i], "", false);
		else set_bgcolor(element_ids[i], "#FFFFFF", false);
	}
}

function color_other(valueArray, specArray) {
	var min = 10000000000;
	var max = 0;
	for (x in valueArray) {
		valueArray[x] *= 1;
		switch(specArray["scale"]) {
			case "log":	valueArray[x] = Math.log(valueArray[x]); break;
			case "inverse":	valueArray[x] = 1 / valueArray[x]; break;
		}
		if (valueArray[x] < min && valueArray[x] != -Infinity && !isNaN(valueArray[x])) min = valueArray[x];
		if (valueArray[x] > max && valueArray[x] != -Infinity && !isNaN(valueArray[x])) max = valueArray[x];
	}
	for (var i = 1; i <= 118; i++) {
		if (!isNaN(valueArray[i]))
			set_bgcolor(element_ids[i], calc_color(valueArray[i] == -Infinity ? min : valueArray[i], specArray["startcolor"], specArray["endcolor"], min, max), false);
		else	set_bgcolor(element_ids[i], specArray["defaultcolor"], false);
	}
}

function search(searchstring) {
	results = 0;
	on_mouse_over();
	for (var atomic = 1; atomic <= 118; atomic++) {
		if (!searchstring)
			search_highlight(atomic, true);
		else if (searchstring == atomic) {
			search_highlight(atomic, false);
			results = 1;
			winner = atomic;
		} else if (element_ids[atomic].childNodes[n_name].innerHTML.toLowerCase().indexOf(searchstring.toLowerCase()) != -1
			|| element_ids[atomic].childNodes[n_symbol].innerHTML.toLowerCase().indexOf(searchstring.toLowerCase()) != -1) {
			search_highlight(atomic, false);
			results++;
			winner = atomic;
		} else	search_highlight(atomic, true);
	}
	save_colors(current_colors);
	if (results == 1) {
		activeTab("Property", true);
		on_mouse_over(winner);
	}
}

function search_highlight(atomic, bright) {
	if (bright)	set_bgcolor(element_ids[atomic], calc_color(6, default_colors[atomic], "FFFFFF", 0, 10), false);
	else		set_bgcolor(element_ids[atomic], calc_color(3, default_colors[atomic], "000000", 0, 10), false);
}

function setLeft(el, pos) {
	if (typeof(pos) != "undefined") el.style.left = pos + "px";
	else return parseInt(el.style.left);
}

function dim_for_states() {
	on_mouse_over();
	if (tab == "Property") {
		document.getElementById("Closeup").style.display = "none";
		document.getElementById("PropertyBox").appendChild(document.getElementById("MatterState"));
	}
	wholetable.className += " InvertState";
	current_colors = [];
	restore_colors(current_colors);
}

function init_slider() {
	var spec = window["spec_" + dataset];
	if (!spec["values"] && !spec["slidermax"]) {
		snap_slider(0, true);
		slider.parentNode.parentNode.style.visibility = display.style.visibility = "hidden";
		return;
	} else	slider.parentNode.parentNode.style.visibility = display.style.visibility = "";

	display.readOnly = "values" in spec;
	slider.xMax = document.getElementById("SliderSlit").offsetWidth;
	slider.from = spec["values"] ? 0 : spec["slidermin"];
	slider.to = spec["values"] ? spec["values"].length - 1 : spec["slidermax"];
	slider.scale = slider.xMax / (slider.to - slider.from);
	if (dataset == "state") dim_for_states();
	snap_slider((spec["values"] ? spec["subset"] : spec["default"] - slider.from) * slider.scale, true);
}

function startSlide(e) {
	e = e || event;
	on_mouse_over();
	if (search_active) return;
	if (dataset == "series" || dataset == "property") dim_for_states();
	slider.startOffsetX = setLeft(slider) - e.screenX;
	document.onmousemove = moveSlider;
	document.onmouseup = sliderMouseUp;
	slider.onmousedown = null;
	e.cancelBubble = true;
	if (e.stopPropagation) e.stopPropagation();
	return false;
}

function slider_skip(e) {
	e = e || event;
	on_mouse_over();
	var offset = (e.offsetX - setLeft(slider) || findPos(slider, [e.pageX, 0])[0]) < 0 ? -1 : 1;
	if ("values" in window["spec_" + dataset])
		snap_slider(Math.min(slider.xMax, Math.max(0, setLeft(slider) + slider.scale * offset)), false);
	else	snap_slider(Math.min(slider.xMax, Math.max(0, (display.value * 1 - slider.from) * slider.scale + (slider.xMax / 10) * offset)), false);
	return false;
}

function moveSlider(e) {
	snap_slider(Math.max(0, Math.min(slider.startOffsetX + (e || event).screenX, slider.xMax)), false);
	return false;
}

function sliderMouseUp() {
	keyscroll = false;
	if (dataset != "state") wholetable.className = "";
	document.getElementById("SeriesBox").appendChild(document.getElementById("MatterState"));
	if (tab != "Isotope") document.getElementById("Closeup").style.display = "";
	save_colors(current_colors);
	on_mouse_over(lastHover);
	document.onmousemove = null;
	document.onmouseup = null;
	if ("default" in window["spec_" + dataset]) window["spec_" + dataset]["default"] = display.value;
	if (!("values" in window["spec_" + dataset])) snap_slider(Math.min(slider.xMax, Math.max(0, (display.value * 1 - slider.from) * slider.scale)), false);
	slider.onmousedown = startSlide;
}

function snap_slider(x, force) {
	var spec = window["spec_" + dataset];
	var pos = Math.round(x / slider.scale + slider.from);
	setLeft(slider, (pos - slider.from) * slider.scale);
	if ("values" in spec) {
		if (spec["subset"] != pos || force) {
			spec["subset"] = pos;
			display.value = spec["values"][pos];
			if (dataset != "isotope") document.getElementById("l_" + dataset).getElementsByTagName("span")[0].innerHTML = " " + display.value + " ";
// update number in detailbox too
			colorize_and_mass(true);
		}
	} else {
		display.value = pos;
		if (dataset == "state") document.getElementById("l_" + dataset).getElementsByTagName("span")[0].innerHTML = display.value + " K";
		if (spec["unit"][0] == " K") state_classes();
		colorize_and_mass((force && dataset != "isotope") || dataset == "state");
	}
}

function on_mouse_over(atomic) {
	if (lastHover) dark(lastHover);
	if (atomic) {
		dim(atomic);
		switch (tab) {
			case "Series":
				break;
			case "Property":
				if (typeof(conduct) == "undefined") load_details(datasets[tab]);
				else showDetails(atomic);
				break;
			case "Orbital":
				tab_electron(atomic);
				break;
			case "Isotope":
				if (typeof(conduct) == "undefined") load_details(datasets["Property"]);
				else showDetails(atomic);
				break;
		}
		lastHover = atomic;
	}
}

function dim(atomic) {
	if (results != 1) set_bgcolor(element_ids[atomic], calc_color(1, (current_colors.length ? current_colors : default_colors)[atomic], "#FFFFFF", 0, 2), false);
	group_period(element_ids[atomic], "yellow");
}

function dark(atomic) {
	set_bgcolor(element_ids[atomic], (current_colors.length ? current_colors : default_colors)[atomic], false);
	group_period(element_ids[atomic], "");
}

function set_bgcolor(elTarget, color, stop) {
	elTarget.style.backgroundColor = color;
	if (!stop) {
		while (elTarget.nextSibling.nodeType != 1) elTarget = elTarget.nextSibling;
		set_bgcolor(elTarget.nextSibling, color, true);
	}
}

function set_stateclass(elTarget, stateclass, stop) {
	if (elTarget.className.indexOf(stateclass) == -1)
		elTarget.className = elTarget.className.replace(/Solid|Liquid|Gas|Unknown/, stateclass);
	if (!stop) {
		while (elTarget.nextSibling.nodeType != 1) elTarget = elTarget.nextSibling;
		set_stateclass(elTarget.nextSibling, stateclass, true);
	}
}

function move_helium(convert) {
	if (convert) {
		with (wholetable.tBodies[0].rows[0]) {
			insertBefore(element_ids[2].nextSibling, cells[3]);
			insertBefore(element_ids[2], cells[3]);
			var inserted = document.getElementById("PropertyBox").parentNode.cellIndex + 1;
			insertCell(inserted).colSpan = 12;
			cells[inserted].className = "ElectronString";
			cells[5].style.display = cells[cells.length - 2].style.display = cells[cells.length - 3].style.display = "none";
		}
		restore_colors([]);
		wholetable.className += " Blocks";
		save_colors(current_colors);
	} else {
		with (wholetable.tBodies[0].rows[0]) {
			cells[5].style.display = cells[cells.length - 2].style.display = cells[cells.length - 3].style.display = "";
			var inserted = document.getElementById("PropertyBox").parentNode.cellIndex + 1;
			deleteCell(inserted);
			insertBefore(cells[3], cells[cells.length - 1]);
			insertBefore(cells[3], cells[cells.length - 1]);
		}
		wholetable.className = "";
		current_colors = [];
		restore_colors(current_colors);
	}
}

function insert_rareearths(obj) {
	var table = wholetable.tBodies[0].rows;
	var key_index = key_id.parentNode.cellIndex;

	if (obj.checked) {
		wholetable.tHead.rows[0].insertCell(3).colSpan = 28;

		key_id.parentNode.rowSpan = 4;
		key_id.parentNode.colSpan = 28;

		table[0].insertCell(key_index + 1).colSpan = 20;
		var next = key_id.parentNode.nextSibling;
		while (next.nodeType != 1) next = next.nextSibling;
		next.rowSpan = 3;
		next.className = "KeyRegion";

		next.appendChild(document.getElementById("PropertyBox")); next.appendChild(document.getElementById("OrbitalBox")); next.appendChild(document.getElementById("IsotopeBox"));

		key_id.style.display = "";
		key_id.parentNode.style.fontSize = "1em";

		with (table[4]) {
			insertCell(5).colSpan = 28;
			cells[5].innerHTML = table[7].cells[2].innerHTML;
			cells[5].style.textAlign = "center";
			cells[5].className = "Clean Paren";
		}

		for (var i = 29; i >= 0; i--)
			for (var j = 5, k = 2; j <= 6; j++, k -= 2)
				table[j].insertBefore(table[j + 4].cells[i + k], table[j].cells[6]);

		table[5].cells[5].style.display = table[6].cells[5].style.display = "none";
		for (var i = 10; i >= 7; i--) table[i].style.display = "none";
	} else {
		wholetable.tHead.rows[0].deleteCell(3);

		key_id.parentNode.appendChild(document.getElementById("PropertyBox")); key_id.parentNode.appendChild(document.getElementById("OrbitalBox")); key_id.parentNode.appendChild(document.getElementById("IsotopeBox"));
		if (document.getElementById("PropertyBox").style.display == "block" || document.getElementById("OrbitalBox").style.display == "block" || document.getElementById("IsotopeBox").style.display == "block")
			key_id.style.display = "none";
		key_id.parentNode.style.fontSize = "";

		table[5].cells[5].style.display = table[6].cells[5].style.display = "";
		for (var i = 10; i >= 7; i--) table[i].style.display = "";

		for (var i = 0; i < 30; i++) {
			table[9].insertBefore(table[5].cells[6], table[9].cells[i + 2]);
			table[10].appendChild(table[6].cells[6]);
		}

		table[0].deleteCell(key_index + 1); table[4].deleteCell(5);
		key_id.parentNode.colSpan = 20;
		key_id.parentNode.rowSpan = 3;
	}
}

function slider_arrow(e) {
	e = e || event;
	if (e.keyCode == 38 || e.keyCode == 40) {
		if (!keyscroll) on_mouse_over();
		if ("values" in window["spec_" + dataset])
			snap_slider(Math.min(slider.xMax, Math.max(0, setLeft(slider) + slider.scale * (39 - e.keyCode))), false);
		else {
			if (isNaN(display.value)) display.value = 0;
			snap_slider(Math.min(slider.xMax, Math.max(0, (display.value * 1 - slider.from) * slider.scale + 1 * (39 - e.keyCode))), false);
			if ((keyscroll > 1 && dataset == "series") || dataset == "state") dim_for_states();
		}
		keyscroll++;
	}
	if (e.keyCode >= 37 && e.keyCode <= 40) {
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
	}
}

function keyboard_nav(e) {
	e = e || event;
	switch (e.keyCode) {
		case 13:
			if (lastHover) { click_wiki(element_ids[lastHover].childNodes[n_name].innerHTML, lastHover); return false; }
			return;
		case 27:
			if (wikibox.style.display == "block") { destroy(); return false; }
			return;
	}
	if (e.keyCode >= 37 && e.keyCode <= 40) {
		if (!lastHover) on_mouse_over(1);
		switch (e.keyCode) {
			case 37: case 39:
				var newElement = Math.max(1, Math.min(118, lastHover - 38 + e.keyCode));
				break;
			case 38: case 40:
				var count = 0;
				var pos = lastHover;
				var rowind = element_ids[lastHover].parentNode.rowIndex;
				if (e.keyCode == 40) {
					if (widecheck.checked) { if (rowind == 7) return false; }
					else {
						if (rowind == 11 || pos == 39 || pos == 87 || pos == 88) return false;
						if ((pos > 39 && pos < 57) || (pos > 71 && pos < 89)) pos += 15;
						else if (rowind == 10) pos += 17;
						else if (pos >= 104) pos -= 47;
					}
				} else {
					if (pos <= 2 || (pos >= 4 && pos <= 9) || (pos >= 21 && pos <= 30)) return false;
					if (widecheck.checked) { if (pos >= 57 && pos <= 70) return false; }
					else {
						if ((pos > 71 && pos <= 86) || rowind == 7) pos -= 15;
						else if (rowind == 11) pos -= 17;
						else if (pos > 57 && pos <= 71) pos += 62;
						else if (pos == 57) pos += 47;
					}
				}
				var row = wholetable.tBodies[0].rows[rowind - (20 - e.keyCode / 2 + (element_ids[lastHover].cellIndex < 4 ? 1 : 0))];
				for (var i = 0; i < row.cells.length; i++) if (row.cells[i].className.indexOf("Element") != -1) count += e.keyCode - 39;
				var newElement = pos + count;
				break;
		}
		on_mouse_over(newElement);
	}
}

function group_period(el, color) {
	var period = el.parentNode.rowIndex - 1;
	wholetable.tBodies[0].rows[period > 7 ? period - 4 : period].cells[0].style.backgroundColor = color;
	if (period > 7) return;

	if (el.cellIndex < 4)
		var count = (el.cellIndex + 1) / 2;
	else {
		var count = 20 - Math.ceil((wholetable.tBodies[0].rows[period].cells.length - el.cellIndex) / 2);
		if (widecheck.checked && (count += 1) < 4) return;
	}
	wholetable.tHead.rows[0].cells[count].style.backgroundColor = color;
}

function getAJAXobj() {
	var xmlhttp, complete = false;
	try { xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
	catch (e) { try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
	catch (e) { try { xmlhttp = new XMLHttpRequest(); }
	catch (e) { xmlhttp = false; }}}
	if (!xmlhttp) return null;
	this.connect = function(sURL, sVars, fnDone) {
		if (!xmlhttp) return false;
		complete = false;
		try {
			xmlhttp.open("GET", sURL + sVars, true);
			xmlhttp.onreadystatechange = function() {
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
		var conn = new getAJAXobj(), list = [];
		for (set in arrays) {
			if (window[arrays[set]]) continue;
			if ("values" in window["spec_" + arrays[set]])
				list.push(arrays[set] + "-" + window["spec_" + arrays[set]]["values"].join(":").toLowerCase().replace(/\./g, ""));
			else	list.push(arrays[set]);
		}
		conn.connect("data.php?set=", list.join(","), parse_into_arrays);
	}
}

function parse_into_arrays(oXML, sVars) {
	var returned_data = oXML.responseText.split("\n");
	for (sets in returned_data) {
		temp = [];
		arrays = returned_data[sets].split("=")[1].split(":");
		for (element in arrays) temp.push(eval("[" + arrays[element] + "]"));
		window[returned_data[sets].split("=")[0]] = temp;
	}
	if (sVars == "electronstring") activeTab("Orbital", true);
	else if (lastHover) on_mouse_over(lastHover); else on_mouse_over(1);
}

function init_throb(atomic) {
	if (typeof(throbber) != "undefined") clearInterval(throbber);
	throb_atomic = atomic;
	throb_value = 0;
	throbber = setInterval(throb_element, 50);
}

function load_isotope(atomic) {
	init_throb(atomic);
	var conn = new getAJAXobj();
	conn.connect("isotope.php?all=" + Boolean(spec_isotope["subset"]) + "&set=", atomic, click_isotope);
}

function throb_element() {
	var x = throb_value++;
	set_bgcolor(element_ids[throb_atomic], calc_color(x % 10 <= 5 ? x % 10 : 10 - x % 10, default_colors[throb_atomic], "FFFFFF", 0, 5), true);
}

function click_isotope(oXML, atomic) {
	document.getElementById("Closeup").style.display = "none";
	document.getElementById("IsotopeForm").style.display = "";
	var returned_data = oXML.responseText.split("\n");
	halflife = [], binding = [], masscontrib = [], isomass = [], neutrons = [], width = [];
	document.getElementById("isotopeholder").innerHTML = "";
	for (var sets in returned_data)
		draw_isotope(atomic, +sets+1, returned_data[sets].split(","));
	document.getElementById("ISONAME").childNodes[0].innerHTML = element_ids[atomic].childNodes[n_name].innerHTML;
	document.getElementById("ISONAME").childNodes[1].innerHTML = "";
	clearInterval(throbber);
}

function draw_isotope(atomic, inc, specs) {
	for (i in datasets["Isotope"]) window[datasets["Isotope"][i]][inc] = specs[window["i_" + datasets["Isotope"][i]]];
	nuclide = document.createElement("div");
	nuclide.onmouseover = function() {
		if (lastIsotope) lastIsotope.style.zIndex = lastIsotope.zind;
		this.style.zIndex = 100;
		isotopeDetails(this, inc);
		lastIsotope = this;
	}
	nuclide.className = element_ids[atomic].className;
//	nuclide.className += " " + specs[i_decaymode];
	nuclide.style.borderWidth = "medium";
	nuclide.style.borderStyle = (specs[i_decaymode].match(/^Two|^Double/)) ? "double" : (specs[i_decaymode] == "ElectronCapture") ? "dashed" : (specs[i_decaymode] == "SpontaneousFission") ? "dotted" : "solid";
	nuclide.style.borderColor = (specs[i_decaymode].match(/BetaPlus|ElectronCapture/)) ? "purple" : (specs[i_decaymode].indexOf("Beta") != -1) ? "blue" : (specs[i_decaymode].indexOf("Alpha") != -1) ? "orange" : (specs[i_decaymode].indexOf("Neutron") != -1) ? "green" : (specs[i_decaymode].indexOf("Proton") != -1) ? "red" : "black";
	nuclide.style.lineHeight = "normal";
	nuclide.appendChild(element_ids[atomic].childNodes[n_symbol].cloneNode(true));
	nuclide.appendChild(element_ids[atomic].childNodes[n_name].cloneNode(true));
	nuclide.appendChild(element_ids[atomic].childNodes[n_mass].cloneNode(true));
	nuclide.childNodes[0].innerHTML = "<sup>" + specs[i_neutrons] + "<\/sup>" + element_ids[atomic].childNodes[n_symbol].innerHTML;
	nuclide.childNodes[1].innerHTML += "-" + specs[i_neutrons];
	nuclide.childNodes[2].innerHTML = String(isomass[inc]).replace(/([\d\.]{7})(\d+)/, "$1<span>$2</span>");
	document.getElementById("isotopeholder").appendChild(nuclide);
	nuclide.style.position = "absolute";
	var position = findPos(element_ids[atomic], [-findPos(nuclide, [0, 0])[0], -findPos(nuclide, [0, 0])[1]]);
	nuclide.style.left = -position[0] + 20 * inc + "px";
	nuclide.style.top = -position[1] + 20 * inc + "px";
	nuclide.style.zIndex = nuclide.zind = inc + 1;
}

function isotopeDetails(obj, inc) {
	document.getElementById("HALFLIFE").innerHTML = timeunits(halflife[inc]);
	document.getElementById("ISONAME").childNodes[1].innerHTML = "-" + neutrons[inc];
	document.getElementById("ISOMASS").innerHTML = isomass[inc];
	document.getElementById("BINDING").innerHTML = (binding[inc] === "") ? "Unknown" : binding[inc];
	document.getElementById("MASSCONTRIB").innerHTML = masscontrib[inc] + "%";
	document.getElementById("WIDTH").innerHTML = width[inc];
}

function timeunits(seconds) {
	var period_name = ["y", "d", "h", "s", "ms", "&micro;s", "ns", "ps"];
	var period_secs = [31556926, 86400, 3600, 1, 1e-3, 1e-6, 1e-9, 1e-12];

	if (seconds === "0")
		return "Stable";
	else if (seconds === "")
		return "Unknown";
	else for (i in period_name)
		if (seconds > period_secs[i])
			return scinot((seconds / period_secs[i]).toPrecision(countsigfig(seconds))) + " " + period_name[i];
	return scinot((seconds / period_secs.pop()).toPrecision(countsigfig(seconds))) + " " + period_name.pop();
}

function countsigfig(num) {
	return num.replace(/^0.0*/, "").replace(/\.|e.+$/g, "").length;
}

function scinot(num) {
	return num.replace(/e[+]*(-)*(\d*)$/, "×10<sup>$1$2<\/sup>");
}

function findPos(obj, lefttop) {
	return (obj ? findPos(obj.offsetParent, [lefttop[0] - obj.offsetLeft, lefttop[1] - obj.offsetTop]) : lefttop);
}
