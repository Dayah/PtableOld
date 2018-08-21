window.onload = function() {
	n_atomic = 0; n_name = (language == "zh") ? 2 : 4; n_symbol = 2; n_mass = 5;
	i_neutrons = 0, i_isomass = 1, i_binding = 2, i_masscontrib = 3, i_halflife = 4, i_decaymode = 5, i_width = 6;

	flash_id = false;
	lastIsotope = false;
	oldYellow = false;
	lastHover = false;
	lastOrbital = false;
	waiting = false;
	keyscroll = false;
	dataset = "series";
	tab = "SeriesTab";
	winlist = [];

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

//	window.frames["WikiFrame"].document.body.innerHTML = "<h1>Loading&hellip;<\/h1>";
	temperature = 273;
	init_layout();
	series = [[]];
	for (var i = 1; i <= 118; i++) {
		element_ids[i].idx = i;
		element_ids[i].onmouseover = function() { on_mouse_over(this.idx); };

		series[0][i] = element_ids[i].childNodes[n_mass].innerHTML;
		element_ids[i].className += " Solid";
		while (element_ids[i].nextSibling.nodeType != 1) element_ids[i] = element_ids[i].nextSibling;
		element_ids[i].nextSibling.className += " Solid";
	}
	property = series;
	current_colors = [], default_colors = [], search_colors = [];
	save_colors(default_colors);

	melt = [[3900,14.01,0.95,453.69,1560,2348,3823,63.05,54.8,53.5,24.56,370.87,923,933.47,1687,317.3,388.36,171.6,83.8,336.53,1115,1814,1941,2183,2180,1519,1811,1768,1728,1357.77,692.68,302.91,1211.4,1090,494,265.8,115.79,312.46,1050,1799,2128,2750,2896,2430,2607,2237,1828.05,1234.93,594.22,429.75,505.08,903.78,722.66,386.85,161.3,301.59,1000,1193,1071,1204,1294,1373,1345,1095,1586,1629,1685,1747,1770,1818,1092,1936,2506,3290,3695,3459,3306,2739,2041.4,1337.33,234.32,577,600.61,544.4,527,575,202,300,973,1323,2023,1845,1408,917,913,1449,1618,1323,1173,1133,1800,1100,1100,1900]];
	boil = [[5900,20.28,4.22,1615,2743,4273,4300,77.36,90.2,85.03,27.07,1156,1363,2792,3173,553.6,717.87,239.11,87.3,1032,1757,3103,3560,3680,2944,2334,3134,3200,3186,3200,1180,2477,3093,887,958,332,119.93,961,1655,3618,4682,5017,4912,4538,4423,3968,3236,2435,1040,2345,2875,1860,1261,457.4,165.1,944,2143,3737,3633,3563,3373,3273,2076,1800,3523,3503,2840,2973,3141,2223,1469,3675,4876,5731,5828,5869,5285,4701,4098,3129,629.88,1746,2022,1837,1235,610,211.3,950,2010,3473,5093,4273,4200,4273,3503,2284,3383]];
	isotope = [[0,3,2,2,3,2,3,3,3,2,3,2,3,2,4,3,5,3,7,3,9,5,6,4,5,4,7,5,8,2,7,2,7,3,9,2,9,5,9,5,8,5,9,5,10,5,9,6,11,2,11,3,11,3,13,4,8,3,8,3,7,3,8,4,7,3,8,5,11,5,11,4,8,7,7,2,11,7,9,5,11,3,6,3,3,1,2,3,4,3,6,6,6,3,6,3,8,5,7,4,4,3,3,1,1,1,1,2,2,1,1,1,1,1,1,1,1,1,1],[1,7,9,10,12,14,15,16,17,18,19,20,22,22,23,23,24,24,24,24,24,25,26,26,26,26,28,29,31,29,30,31,32,33,30,31,32,32,33,33,33,33,33,34,34,34,34,38,38,39,39,37,38,37,38,40,40,39,39,39,38,38,38,38,36,36,36,36,35,35,35,35,36,36,35,35,35,36,37,37,40,37,38,36,33,31,34,34,33,31,30,29,26,20,20,19,20,20,20,19,19,18,17,16,16,16,16,16,15,15,15,12,9,5,5,5,4,2,1]];
	orbital = [[0,1,0,1,2,3,4,3,2,1,0,1,2,3,4,5,6,5,0,1,2,3,4,5,6,4,3,4,4,2,2,3,4,5,6,7,4,1,2,3,4,5,6,7,6,6,4,4,2,3,4,5,6,7,6,3,2,3,4,4,3,3,3,3,3,4,3,3,3,3,3,3,4,5,6,7,7,6,6,7,2,3,4,5,6,7,6,3,2,3,4,5,6,6,6,4,4,4,4,4,3,3,3,3,4,5,6,7,,,,,,,,,,,6]];
	electronstring = [,"1s1","1s2","1s22s1","1s22s2","1s22s22p1","1s22s22p2","1s22s22p3","1s22s22p4","1s22s22p5","1s22s22p6","[Ne]3s1","[Ne]3s2","[Ne]3s23p1","[Ne]3s23p2","[Ne]3s23p3","[Ne]3s23p4","[Ne]3s23p5","[Ne]3s23p6","[Ar]4s1","[Ar]4s2","[Ar]3d14s2","[Ar]3d24s2","[Ar]3d34s2","[Ar]3d54s1","[Ar]3d54s2","[Ar]3d64s2","[Ar]3d74s2","[Ar]3d84s2","[Ar]3d104s1","[Ar]3d104s2","[Ar]3d104s24p1","[Ar]3d104s24p2","[Ar]3d104s24p3","[Ar]3d104s24p4","[Ar]3d104s24p5","[Ar]3d104s24p6","[Kr]5s1","[Kr]5s2","[Kr]4d15s2","[Kr]4d25s2","[Kr]4d45s1","[Kr]4d55s1","[Kr]4d55s2","[Kr]4d75s1","[Kr]4d85s1","[Kr]4d10","[Kr]4d105s1","[Kr]4d105s2","[Kr]4d105s25p1","[Kr]4d105s25p2","[Kr]4d105s25p3","[Kr]4d105s25p4","[Kr]4d105s25p5","[Kr]4d105s25p6","[Xe]6s1","[Xe]6s2","[Xe]5d16s2","[Xe]4f15d16s2","[Xe]4f36s2","[Xe]4f46s2","[Xe]4f56s2","[Xe]4f66s2","[Xe]4f76s2","[Xe]4f75d16s2","[Xe]4f96s2","[Xe]4f106s2","[Xe]4f116s2","[Xe]4f126s2","[Xe]4f136s2","[Xe]4f146s2","[Xe]4f145d16s2","[Xe]4f145d26s2","[Xe]4f145d36s2","[Xe]4f145d46s2","[Xe]4f145d56s2","[Xe]4f145d66s2","[Xe]4f145d76s2","[Xe]4f145d96s1","[Xe]4f145d106s1","[Xe]4f145d106s2","[Xe]4f145d106s26p1","[Xe]4f145d106s26p2","[Xe]4f145d106s26p3","[Xe]4f145d106s26p4","[Xe]4f145d106s26p5","[Xe]4f145d106s26p6","[Rn]7s1","[Rn]7s2","[Rn]6d17s2","[Rn]6d27s2","[Rn]5f26d17s2","[Rn]5f36d17s2","[Rn]5f46d17s2","[Rn]5f67s2","[Rn]5f77s2","[Rn]5f76d17s2","[Rn]5f97s2","[Rn]5f107s2","[Rn]5f117s2","[Rn]5f127s2","[Rn]5f137s2","[Rn]5f147s2","[Rn]5f147s27p1","[Rn]5f146d27s2","[Rn]5f146d37s2","[Rn]5f146d47s2","[Rn]5f146d57s2","[Rn]5f146d67s2","[Rn]5f146d77s2","[Rn]5f146d97s1","[Rn]5f146d107s1","[Rn]5f146d107s2","[Rn]5f146d107s27p1","[Rn]5f146d107s27p2","[Rn]5f146d107s27p3","[Rn]5f146d107s27p4","[Rn]5f146d107s27p5","[Rn]5f146d107s27p6"];

	shellL = {"s": 0, "p": 1, "d": 2, "f": 3};

	datasets = {"PropertyTab": ["melt", "boil", "electroneg", "discover", "affinity", "heat", "radius", "abundance", "ionize", "density", "conductivity"],
		"IsotopeTab": ["isomass", "binding", "masscontrib", "halflife", "width", "neutrons"]};
	spec_state = {"unit": [" K"], "slidermin": 0, "slidermax": 6000, "Legend": ["State"]};
	spec_series = {"unit": [" K"], "slidermin": 0, "slidermax": 6000, "Legend": ["<span>Atomic </span>Mass"], "replace": [,], "subset": 0};
	spec_property = spec_series;
	spec_orbital = spec_series;
	spec_isotope = {"unit": ["isotopes"], "Legend": ["Isotopes","Isotopes"], "values": ["Select", "All"], "subset": 0};

	spec_melt = {"unit": [" K"], "startcolor": "#6666FF", "endcolor": "#FF0000", "defaultcolor": "#FFFFFF", "slidermin": 0, "slidermax": 6000, "Legend": ["Kelvin"], "replace": [,], "subset": 0};
	spec_boil = {"unit": [" K"], "startcolor": "#6666FF", "endcolor": "#FF0000", "defaultcolor": "#FFFFFF", "slidermin": 0, "slidermax": 6000, "Legend": ["Kelvin"], "replace": [,], "subset": 0};
	spec_electroneg = {"unit": [""], "startcolor": "#FFFF66", "endcolor": "#FF0000", "defaultcolor": "#FFFFFF", "Legend": ["Pauling"], "scale": "linear", "replace": [,], "subset": 0};
	spec_radius = {"unit": [" pm"," pm"," pm"], "startcolor": "#FFFFFF", "endcolor": "#008800", "defaultcolor": "#FFFFFF", "Legend": ["pm","pm","pm"], "values": ["Calculated","Empirical","Covalent"], "scale": "linear", "replace": [,], "subset": 0};
	spec_ionize = {"unit": [" kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"," kJ/mol"], "startcolor": "#66FF66", "endcolor": "#6666FF", "defaultcolor": "#FFFFFF", "Legend": ["kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol","kJ/mol"], "values": ["1st","2nd","3rd","4th","5th","6th","7th","8th","9th","10th","11th","12th","13th","14th","15th","16th","17th","18th","19th","20th","21st","22nd","23rd","24th","25th","26th","27th","28th","29th","30th"], "scale": "log", "replace": [,], "subset": 0};
	spec_discover = {"unit" : [""], "slidermin": 1730, "slidermax": 2007, "default": 2007, "startcolor" : "#FFFFFF", "endcolor" : "#666600", "defaultcolor": "#FFFFFF", "Legend": ["Year"], "replace": [,], "subset": 0};
	spec_density = {"unit": [" kg/m&sup3;"," kg/m&sup3;"], "startcolor": "#FFFFFF", "endcolor": "#006666", "defaultcolor": "#FFFFFF", "Legend": ["kg/m&sup3;","kg/m&sup3;"], "values": ["STP","Liquid"], "scale": "linear", "replace": [,], "subset": 0};
	spec_affinity = {"unit": [" kJ/mol"], "startcolor": "#006600", "endcolor": "#FFFFFF", "defaultcolor": "#CCCCCC", "Legend": ["kJ/mol"], "scale": "log", "replace": [,], "subset": 0};
	spec_abundance = {"unit": ["%","%","%","%","%","%"], "startcolor": "#FFFFFF", "endcolor": "#3333FF", "defaultcolor": "#CCCCCC", "Legend": ["%","%","%","%","%","%"], "values": ["Universe","Solar","Meteor","Crust","Ocean","Human"], "scale": "log", "replace": [/e(.*)/, "×10<sup>$1<\/sup>"], "subset": 0};
	spec_heat = {"unit": [" J/kgK"," kJ/mol"," kJ/mol"], "startcolor": "#FFFFFF", "endcolor": "#FF0000", "defaultcolor": "#CCCCCC", "Legend": [" J/kgK"," kJ/mol"," kJ/mol"], "values": ["Specific","Vaporization","Fusion"], "scale": "log", "replace": [,], "subset": 0};
	spec_conductivity = {"unit": [" W/mK"," MS/m"], "startcolor": "#FFFFFF", "endcolor": "#FF0000", "defaultcolor": "#BBBBBB", "Legend": ["W/mK","MS/m"], "values": ["Thermal","Electric"], "scale": "lin", "replace": [,], "subset": 0};
	spec_electronstring = {"unit": [""], "replace": [/(\d+)(\d[spdf]|$)/g, "<sup>$1<\/sup> $2"], "subset": 0};

	spec_masscontrib = {"unit": ["%"], "startcolor": "#FEFEFE", "endcolor": "#FE0101", "defaultcolor": "#CCCCCC", "Legend": ["%"], "scale": "lin", "replace": [,], "subset": 0};
	spec_isomass = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#FE0101", "defaultcolor": "#CCCCCC", "Legend": [""], "scale": "lin", "replace": [,], "subset": 0};
	spec_halflife = {"unit": ["Time"], "startcolor": "#FEFEFE", "endcolor": "#010101", "defaultcolor": "#010101", "scale": "log", "subset": 0};
	spec_binding = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#01FE01", "defaultcolor": "#CCCCCC", "scale": "lin", "subset": 0};
	spec_isomass = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#0101FE", "defaultcolor": "#CCCCCC", "scale": "lin", "subset": 0};
	spec_width = {"unit": [""], "startcolor": "#FEFEFE", "endcolor": "#01FEFE", "defaultcolor": "#CCCCCC", "scale": "lin", "subset": 0};

	document.getElementById("names").onclick = click_checkbox;
	document.getElementById("electrons").onclick = click_checkbox;
	widecheck.onclick = click_checkbox;
	document.getElementById("PropertyTab").onclick = activeTab;
	document.getElementById("IsotopeTab").onclick = activeTab;
	document.getElementById("OrbitalTab").onclick = activeTab;
	searchinput.onkeyup = function() { search(this.value); };
	searchinput.onkeydown = function(e) { e = e || event; e.cancelBubble = true; };
	document.forms["visualize"].onkeydown = function(e) { e = e || event; e.cancelBubble = true; };
	document.getElementById("langswitch").onkeydown = function(e) { e = e || event; e.cancelBubble = true; };
	searchinput.onfocus = function() {
		on_mouse_over();
		save_colors(search_colors);
		search_active = true;
		if (this.value == "# or Name") this.value = "";
		search(this.value);
	};
	searchinput.onblur = function() {
		this.value = "# or Name";
		search_active = false;
		current_colors = search_colors.concat();
		restore_colors(current_colors);
		on_mouse_over(lastHover);
	};
	document.getElementById("SliderTrack").onmousedown = slider_skip;
	document.getElementById("SliderTrack").onmouseup = slider_release;
	display.onkeyup = slider_release;
	display.onkeydown = slider_arrow;
	display.onkeypress = slider_keypress;
	document.onkeydown = keyboard_nav;
	slider.onmousedown = startSlide;

	if (document.referrer.indexOf("name") !== -1) document.getElementById("names").checked = true;
	if (document.getElementById("names").checked) click_checkbox({srcElement: document.getElementById("names")});
	if (document.getElementById("electrons").checked) click_checkbox({srcElement: document.getElementById("electrons")});
	if (widecheck.checked) click_checkbox({srcElement: widecheck});
	init_slider();
}

function dataset_changed(update) {
	el = document.forms["visualize"];
	for (var i = 0; i < el.length; i++)
		if (el[i].checked && el[i].value != dataset) {
			if (update === true)	return el[i].value;
			else			switch_viz(el[i].value);
		}
	return "property";
}

function switch_viz(newset) {
	dataset = newset;
	if (dataset == "series" || dataset == "isotope" || dataset == "orbital") restore_colors([]);
	if (dataset != "state") leave_state();
	if (tab == "PropertyTab" && dataset != "property" && dataset != "orbital") {
		if (oldYellow) yellowize(oldYellow, "");
		yellowize(dataset, "yellow");
		oldYellow = dataset;
	}
	init_slider();
	if (dataset != "orbital") save_colors(current_colors);
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
		else {
			for (var i = 1; i <= 118; i++)
				if (typeof attr[spec["subset"]][i] != "undefined") element_ids[i].childNodes[n_mass].innerHTML = String(attr[spec["subset"]][i]).replace(/([\d\.]{6})(\d+)/, "$1<span>$2</span>");
				else element_ids[i].childNodes[n_mass].innerHTML = "&nbsp;";
			document.getElementById("Legend").childNodes[n_mass].innerHTML = spec["Legend"][spec["subset"]];
		}
	}

	if (tab == "IsotopeTab" && dataset != "isotope") color_isotope(attr.concat(), spec);
	else if (dataset == "boil" || dataset == "melt") color_temp(attr[0], spec);
	else if (dataset == "discover") time_machine(attr[0]);
	else if (dataset != "series" && dataset != "state" && dataset != "isotope" && dataset != "property" && dataset != "orbital") color_other(attr[spec["subset"]].concat(), spec);
}

function color_other(valueArray, specArray) {
	var min = 10000000000, max = 0;
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
// above and below should be one function
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
		if (current.className.indexOf("Element") !== -1) {
			var atomic = current.childNodes[n_atomic].innerHTML * 1;
			if (!element_ids[atomic]) element_ids[atomic] = current;
		}
	}
	attach("SeriesTab");
	document.getElementById("l_state").getElementsByTagName("span")[0].innerHTML = temperature + " K";
	search_active = false;
	document.forms["visualize"].onclick = dataset_changed;
//	document.forms["isotopes"].onclick = dataset_changed;
}

function click_checkbox(e) {
	e = e || event;
	var obj = (e.srcElement || e.target);

	var sheet_electron = 1; sheet_names = 2;
	switch (obj.id) {
		case "names":
			document.styleSheets[sheet_names].disabled = obj.checked;
			if (!obj.checked && document.getElementById("electrons").checked) document.getElementById("electrons").checked = false;
			document.styleSheets[sheet_electron].disabled = document.getElementById("electrons").checked;
			if (tab != "OrbitalTab") init_slider();
			break;
		case "electrons":
			document.styleSheets[sheet_names].disabled = true;
			if (obj.checked) document.getElementById("names").checked = document.styleSheets[sheet_electron].disabled = true;
			else document.styleSheets[sheet_electron].disabled = !document.getElementById("names").checked;
			if (tab != "OrbitalTab") init_slider();
			break;
		case "wide":
			insert_rareearths(obj.checked);
			if (tab != "SeriesTab") {
				if (obj.checked)	tab_to_span("SeriesTab");
				else			tab_to_anchor("SeriesTab");
			}
			break;
	}
	var checkbox_ids = ["names", "electrons", "wide"];
	for (x in checkbox_ids) document.getElementById(checkbox_ids[x]).parentNode.className = (document.getElementById(checkbox_ids[x]).checked) ? "Selected" : "";
}

function startWikiDrag(e) {
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
	throb_atomic = atomic;
	document.getElementById("ElementName").innerHTML = address;
	wikibox.style.display = "block";
	if (atomic) init_throb(atomic);
	wikibox.onmousedown = startWikiDrag;
	document.getElementById("ElementName").href = "http://" + language + ".wikipedia.org/wiki/" + encodeURIComponent(address);
	wiki.location.replace("http://" + language + ".wikipedia.org/w/index.php?title=" + encodeURIComponent(address) + "&printable=yes");
}

function destroy() {
	window.frames["WikiFrame"].location.replace("about:blank");
	wikibox.style.display = "";
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

function activeTab(e) {
	e = e || event;
	var name = (e.srcElement || e.target).id;
	if (!widecheck.checked || tab != "SeriesTab") tab_to_anchor(tab);

	on_mouse_over();
	if (tab == "OrbitalTab") move_helium(false);
	tab = name;
	switch (name) {
		case "SeriesTab":
			switch_viz("series");
			document.getElementById("SeriesBox").appendChild(document.getElementById("MatterState"));
			break;
		case "PropertyTab":
			if (typeof conductivity == "undefined") load_details(datasets[tab]);
			switch_viz(dataset_changed(true));
			document.getElementById("Closeup").style.display = "";
			document.getElementById("PropertyBox").appendChild(document.getElementById("Closeup"));
			break;
		case "OrbitalTab":
			switch_viz("orbital");
			move_helium(true);
			break;
		case "IsotopeTab":
			document.getElementById("IsotopeBox").appendChild(document.getElementById("Closeup"));
			document.getElementById("IsotopeForm").style.display = "none";
			switch_viz("isotope");
			break;
	}
	attach(tab);
	on_mouse_over(lastHover);

	tab_to_span(name);
	show_tab_box(name);
//alert(document.getElementById("SeriesBox").parentNode.innerHTML);
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

function show_tab_box(name) {
	var tabs = ["SeriesTab", "PropertyTab", "OrbitalTab", "IsotopeTab"];
	for (x in tabs) {
		document.getElementById(tabs[x].replace("Tab", "Box")).style.display = (name == tabs[x]) ? "block" : "none";
		if (widecheck.checked) key_id.style.display = "";
	}
}

function findSymbol(m, sym) {
	for (var i = 1; i <= 118; i++)
		if (element_ids[i].childNodes[n_symbol].innerHTML == sym)
			return electronstring[i];
}

function tab_electron(atomic) {
	var shellcoeff = {"s": 0, "p": 0.75, "d": 1.5, "f": 2.25}, max = [0, 0], shells = [], elecstr = electronstring[atomic];
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
		case "OrbitalTab":
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
		case "IsotopeTab":
			for (var i = 1; i <= 118; i++)
				element_ids[i].onclick = load_isotope;
			break;
		case "SeriesTab":
		case "PropertyTab":
			for (var i = 1; i <= 118; i++)
				element_ids[i].onclick = function() { click_wiki(element_ids[this.idx].childNodes[n_name].innerHTML, this.idx); };

			var groups = wholetable.tHead.rows[0].cells;
			for (var i = 1; i < groups.length; i++) {
				groups[i].idx = i;
				groups[i].onclick = function() { click_wiki("Group " + groups[this.idx].innerHTML + " element"); };
			}
			break;
	}
}

function showDetails(atomic, full) {
	elTarget = element_ids[atomic];
	detail.innerHTML = "";
	for (var i = 0; i < elTarget.childNodes.length; i++)
		detail.appendChild(elTarget.childNodes[i].cloneNode(true));
	detail.childNodes[n_mass].innerHTML = series[0][atomic];
	while (elTarget.nextSibling.nodeType != 1) elTarget = elTarget.nextSibling;
	detailelectrons.innerHTML = elTarget.nextSibling.innerHTML;
	detail.style.backgroundColor = detailelectrons.style.backgroundColor = default_colors[atomic];
	document.getElementById("ELECTRONSTRING").innerHTML = electronstring[atomic].replace(/(\d+)(\d[spdf]|$)/g, "<sup>$1<\/sup> $2");

	if (full) {
		document.getElementById("STATE").innerHTML = element_ids[atomic].className.replace(/.*(Solid|Liquid|Gas|Unknown).*/, "$1");
		for (attribute in datasets["PropertyTab"]) {
			var attr = window[datasets["PropertyTab"][attribute]];
			var spec = window["spec_" + datasets["PropertyTab"][attribute]];
			var subset = spec["subset"];
			document.getElementById(datasets["PropertyTab"][attribute].toUpperCase()).innerHTML = (typeof attr[subset][atomic] != "undefined") ? String(attr[subset][atomic]).replace(spec["replace"][0], spec["replace"][1]) + spec["unit"][subset] : "Unknown";
		}
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
	b |= (r << 16) | (g << 8);

	return "#" + ("000000" + b.toString(16)).slice(-6);
//	return ((r & 0xF0) ? "#" : ((r & 0x0F) ? "#0" : "#00")) + ((r << 16) + (g << 8) + b).toString(16);
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

function time_machine(discarray) {
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

function search(searchstring) {
	var winners = {};
	on_mouse_over();
	for (var atomic = 1; atomic <= 118; atomic++) {
		if (!searchstring) continue;
		else if (searchstring == atomic || element_ids[atomic].childNodes[n_symbol].innerHTML.toLowerCase() == searchstring.toLowerCase()) {
			winners = {};
			winners[atomic] = true;
			break;
		} else if (element_ids[atomic].childNodes[n_name].innerHTML.toLowerCase().indexOf(searchstring.toLowerCase()) != -1)
			winners[atomic] = true;
	}
	for (var atomic = 1; atomic <= 118; atomic++) search_highlight(atomic, winners[atomic]);
	save_colors(current_colors);
	for (var atomic in winners) winlist.push(atomic);
	if (winlist.length === 1) {
//		if (tab == "SeriesTab") activeTab("PropertyTab");
		on_mouse_over(winlist[0]);
	}
	winlist = [];
}

function search_highlight(atomic, dark) {
	if (dark)	set_bgcolor(element_ids[atomic], calc_color(3, search_colors[atomic], "000000", 0, 10), false);
	else		set_bgcolor(element_ids[atomic], calc_color(6, search_colors[atomic], "FFFFFF", 0, 10), false);
}

function setLeft(el, pos) {
	if (typeof pos != "undefined") el.style.left = pos + "px";
	else return parseInt(el.style.left);
}

function dim_for_states() {
	on_mouse_over();
	if (tab == "PropertyTab") {
		document.getElementById("Closeup").style.display = "none";
		document.getElementById("PropertyBox").appendChild(document.getElementById("MatterState"));
	}
	wholetable.className += " InvertState";
	current_colors = [];
	restore_colors(current_colors);
}

function init_flash() {
	if (flash_id) {
		clearInterval(flash_id);
		flash_id = false;
	} else {
		flash_value = 5;
		flash_id = setInterval(flash_slider, 100);
	}
}

function flash_slider() {
	set_bgcolor(document.getElementById("SliderTrack").parentNode, calc_color(--flash_value, "FFFF00", "FFFFFF", 5, 0), true);
	set_bgcolor(document.getElementById("SliderDisplay").parentNode, calc_color(flash_value, "FFFF00", "FFFFFF", 5, 0), true);
	if (flash_value === 0) init_flash();
}

function init_slider() {
	var spec = window["spec_" + dataset];
	if (!spec["values"] && !spec["slidermax"]) {
		snap_slider(0, true);
		slider.parentNode.parentNode.style.visibility = display.style.visibility = "hidden";
		return;
	} else {
		slider.parentNode.parentNode.style.visibility = display.style.visibility = "";
		init_flash();
	}

	display.readOnly = "values" in spec;
	slider.xMax = document.getElementById("SliderSlit").offsetWidth;
	slider.from = spec["values"] ? 0 : spec["slidermin"];
	slider.to = spec["values"] ? spec["values"].length - 1 : spec["slidermax"];
	slider.scale = slider.xMax / (slider.to - slider.from);
	if (dataset == "state") dim_for_states();
	snap_slider((spec["values"] ? spec["subset"] : (spec["unit"][0] == " K") ? temperature : spec["default"] - slider.from) * slider.scale, true);
}

function startSlide(e) {
	e = e || event;
	on_mouse_over();
	if (search_active) return;
	if (dataset == "series" || dataset == "property") dim_for_states();
	slider.startOffsetX = setLeft(slider) - e.screenX;
	document.onmousemove = moveSlider;
	document.onmouseup = slider_release;
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

function leave_state() {
	wholetable.className = wholetable.className.replace(" InvertState", "");
	document.getElementById("SeriesBox").appendChild(document.getElementById("MatterState"));
	document.getElementById("Closeup").style.display = "";
}

function slider_keypress(e) {
	var code = (e) ? e.which : event.keyCode;
	if (code > 31 && (code < 48 || code > 57)) return false;
}

function slider_release(e) {
	e = e || event;
	if (!keyscroll) {
		if (e.keyCode == 39 || e.keyCode == 37) return false;
		if (e.keyCode) on_mouse_over();
	}
	keyscroll = false;
	var spec = window["spec_" + dataset];
	if (dataset != "state" && tab != "IsotopeTab") leave_state();
	if ("default" in spec) spec["default"] = display.value;
	else if (spec["unit"][0] == " K") {
		temperature = display.value;
		document.getElementById("l_state").getElementsByTagName("span")[0].innerHTML = temperature + " K";
	}
	if (!("values" in spec)) snap_slider(Math.min(slider.xMax, Math.max(0, (display.value * 1 - slider.from) * slider.scale)), false);
	save_colors(current_colors);
	on_mouse_over(lastHover);
	document.onmousemove = null;
	document.onmouseup = null;
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
			colorize_and_mass(true);
		}
	} else {
		display.value = pos;
		if (spec["unit"][0] == " K") state_classes();
		colorize_and_mass((force && dataset != "isotope") || dataset == "state");
	}
}

function on_mouse_over(atomic) {
	if (lastHover) dark(lastHover);
	if (atomic) {
		dim(atomic);
		switch (tab) {
			case "SeriesTab":
				break;
			case "PropertyTab":
				if (typeof conductivity != "undefined") showDetails(atomic, true);
				break;
			case "OrbitalTab":
				tab_electron(atomic);
				break;
			case "IsotopeTab":
				showDetails(atomic, false);
				break;
		}
		lastHover = atomic;
	}
}

function dim(atomic) {
	if (winlist.length !== 1) set_bgcolor(element_ids[atomic], calc_color(1, (current_colors.length ? current_colors : default_colors)[atomic], "#FFFFFF", 0, 2), false);
//	if (winlist.length != 1) set_opacity(element_ids[atomic], 0.50, false);
	group_period(element_ids[atomic], "yellow");
}

function dark(atomic) {
	set_bgcolor(element_ids[atomic], (current_colors.length && dataset != "state" ? current_colors[atomic] : ""), false);
//	set_opacity(element_ids[atomic], 1, false);
	group_period(element_ids[atomic], "");
}

function set_opacity(el, value, stop) {
	el.style.opacity = value;
	el.style.filter = (value != 1) ? "alpha(Opacity=" + value * 100 + ")" : "";
	if (!stop) {
		while (el.nextSibling.nodeType != 1) el = el.nextSibling;
		set_opacity(el.nextSibling, value, true);
	}
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
		wholetable.className = wholetable.className.replace(" Blocks", "");
		current_colors = [];
		restore_colors(current_colors);
	}
}

function insert_rareearths(turnon) {
	var table = wholetable.tBodies[0].rows;
	var key_index = key_id.parentNode.cellIndex;

	if (turnon) {
		wholetable.tHead.rows[0].insertCell(3).colSpan = 28;

		key_id.parentNode.rowSpan = 4;
		key_id.parentNode.colSpan = 28;

		table[0].insertCell(key_index + 1).colSpan = 20;
		var next = key_id.parentNode.nextSibling;
		while (next.nodeType != 1) next = next.nextSibling;
		next.rowSpan = 3;
		next.className = "KeyRegion";

		next.appendChild(document.getElementById("PropertyBox"));
		next.appendChild(document.getElementById("OrbitalBox"));
		next.appendChild(document.getElementById("IsotopeBox"));

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

		key_id.parentNode.appendChild(document.getElementById("PropertyBox"));
		key_id.parentNode.appendChild(document.getElementById("OrbitalBox"));
		key_id.parentNode.appendChild(document.getElementById("IsotopeBox"));
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
			if (keyscroll === 2 && dataset == "series") dim_for_states();
		}
		keyscroll++;
	}
	if (e.keyCode >= 37 && e.keyCode <= 40) {
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
	}
}

function slider_update(e) {
	var source = (e) ? e.which : event.keyCode;
	if (source > 31 && (source < 48 || source > 57)) return false;
}

function keyboard_nav(e) {
	e = e || event;

	switch (e.keyCode) {
		case 13:
			if ((e.srcElement || e.target).tagName == "A") return;
			if (lastHover) { element_ids[lastHover].onclick(); return false; }
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
		if (widecheck.checked && ++count < 4) return;
	}
	wholetable.tHead.rows[0].cells[count].style.backgroundColor = color;
}

function getAjaxObj() {
	var xmlhttp, complete = false;
	try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
	catch (e) { try { xmlhttp = new XMLHttpRequest(); }
	catch (e) { xmlhttp = false; }}
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
		var conn = new getAjaxObj(), list = [];
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
	waiting = false;
}

function init_throb(atomic) {
	if (typeof throbber != "undefined") finish_throb(atomic, throbber);
	throb_atomic = atomic;
	throb_value = 2;
	throbber = setInterval(throb_element, 83);
}

function finish_throb(atomic, id) {
	clearInterval(id);
	set_bgcolor(element_ids[atomic], "", false);
}

function load_isotope(e) {
	var atomic = (this || srcElement).idx;
	init_throb(atomic);
	var conn = new getAjaxObj();
	conn.connect("isotope.php?all=" + Boolean(spec_isotope["subset"]) + "&set=", atomic, click_isotope);
}

function throb_element() {
	var x = throb_value++ % 8;
	set_bgcolor(element_ids[throb_atomic], calc_color(x <= 4 ? x : 8 - x, default_colors[throb_atomic], "FFFFFF", 0, 4), false);
}

function click_isotope(oXML, atomic) {
	document.getElementById("Closeup").style.display = "none";
	document.getElementById("IsotopeForm").style.display = "";
	var returned_data = oXML.responseText.split("\n");
	halflife = [], binding = [], masscontrib = [], isomass = [], neutrons = [], width = [];
	document.getElementById("isotopeholder").innerHTML = "";
	for (var sets in returned_data)
		setTimeout(getRef(atomic, sets, returned_data), sets * 75);
	document.getElementById("ISONAME").childNodes[0].innerHTML = element_ids[atomic].childNodes[n_name].innerHTML;
	document.getElementById("ISONAME").childNodes[1].innerHTML = "";
	finish_throb(atomic, throbber);
}

function getRef(atomic, sets, returned_data) {
	return function() { draw_isotope(atomic, +sets+1, returned_data[sets].split(",")); };
}

function draw_isotope(atomic, inc, specs) {
	for (i in datasets["IsotopeTab"]) window[datasets["IsotopeTab"][i]][inc] = specs[window["i_" + datasets["IsotopeTab"][i]]];
	nuclide = document.createElement("div");
	nuclide.style.visibility = "hidden";
	nuclide.onmouseover = function() {
		if (lastIsotope) lastIsotope.style.zIndex = lastIsotope.zind;
		this.style.zIndex = 100;
		isotopeDetails(this, inc);
		lastIsotope = this;
	}
	nuclide.className = element_ids[atomic].className + " " + (specs[i_decaymode] ? specs[i_decaymode] : "Stable");
	nuclide.style.lineHeight = "normal";
	nuclide.appendChild(element_ids[atomic].childNodes[n_symbol].cloneNode(true));
	nuclide.appendChild(element_ids[atomic].childNodes[n_name].cloneNode(true));
	nuclide.appendChild(element_ids[atomic].childNodes[n_mass].cloneNode(true));
	nuclide.childNodes[0].innerHTML = "<sup>" + specs[i_neutrons] + "<\/sup>" + element_ids[atomic].childNodes[n_symbol].innerHTML;
	nuclide.childNodes[1].innerHTML += "-" + specs[i_neutrons];
	nuclide.childNodes[2].innerHTML = String(isomass[inc]).replace(/([\d\.]{6})(\d+)/, "$1<span>$2</span>");
	document.getElementById("isotopeholder").appendChild(nuclide);
	nuclide.style.position = "absolute";
	var position = findPos(element_ids[atomic], [-findPos(nuclide, [0, 0])[0], -findPos(nuclide, [0, 0])[1]]);
	nuclide.style.left = -position[0] + 20 * inc + "px";
	nuclide.style.top = -position[1] + 20 * inc + "px";
	nuclide.style.zIndex = nuclide.zind = inc + 1;
	nuclide.style.visibility = "";
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
