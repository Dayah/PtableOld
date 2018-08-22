function init_slider(fast, direction) {
	var spec = window["spec_" + dataset];
	create_slider(direction);
	if (spec["unit"][0] !== " K") hide_state();
	else state_classes(true, false);
	if (("values" in spec && spec["values"].length > 6) || "slidermax" in spec) {
		// draw slider
		display.style.display = slider.parentNode.style.display = "";
		display.readOnly = "values" in spec;
		slider_data["xMax"] = document.getElementById("SliderSlit").offsetWidth;
		slider_data["from"] = "values" in spec ? 0 : spec["slidermin"];
		slider_data["to"] = "values" in spec ? spec["values"].length - 1 : spec["slidermax"];
		slider_data["scale"] = slider_data["xMax"] / (slider_data["to"] - slider_data["from"]);
		if (dataset === "state" && !wholetable.inverted) {
			document.getElementById("Legend").childNodes[0].childNodes[n_mass].innerHTML = spec["Legend"][0];
			dim_for_states();
		}
		if (dataset === "melt" || dataset === "boil") series_to_temp();
		snap_slider(("values" in spec ? spec["subset"] : (spec["unit"][0] === " K") ? temperature : spec["default"] - slider_data["from"]) * slider_data["scale"], true, false);
	} else {
		display.style.display = slider.parentNode.style.display = "none";
		if ("values" in spec && spec["values"].length <= 6) {
			// draw radios
			create_radios(spec);
			switch_subset(spec["subset"]);
		} else
			// clear all
			snap_slider(0, true, false);
	}
	if (dataset == "orbital") {
		move_helium(true);
		orbital_ids["OrbitalString"] = display.parentNode.appendChild(document.createElement("span"));
	}
	sliding = fast;
	if (from !== false) {
		fade([from, to], 1, 0.5, direction);
		from = to = false;
	} else
		slide_in(display.parentNode.parentNode, 0, direction == "top" || direction == "bottom" ? -display.parentNode.offsetHeight : -display.parentNode.offsetWidth, direction);
}

function create_slider(direction) {
	var newslider = display.parentNode.cloneNode(true), scrub = display.parentNode.getElementsByTagName("*"), x;
	for (x = 0; x < scrub.length; x++) if (scrub[x].id) scrub[x].id = "";
	newslider.style.position = "absolute";
	newslider.style[direction] = (direction == "top" || direction == "bottom" ? display.parentNode.offsetHeight : display.parentNode.offsetWidth) + "px";
	if (direction == "left" || direction == "right") newslider.style.top = 0;
	display.parentNode.parentNode.appendChild(newslider);
	display = document.getElementById("SliderDisplay");
	slider = document.getElementById("SliderBar");
	if (document.getElementById("AltSlider")) document.getElementById("AltSlider").parentNode.removeChild(document.getElementById("AltSlider"));
	if (display.parentNode.getElementsByTagName("span")[0]) display.parentNode.removeChild(display.parentNode.getElementsByTagName("span")[0]);
}

function getRef3(obj, dist, max, direction) {
	return function () { slide_in(obj, dist, max, direction); };
}

function slide_in(obj, dist, max, direction) {
	dist -= max / -10;
	if (Math.round(dist) != Math.round(max) && !sliding) {
		obj.style[direction] = dist + "px";
		setTimeout(getRef3(obj, dist, max, direction), 20);
	} else {
		while (obj.firstChild && obj.firstChild.nodeType != 1) obj.removeChild(obj.firstChild);
		if (obj.firstChild) obj.removeChild(obj.firstChild);
		obj.style[direction] = "";
		obj.getElementsByTagName("div")[0].style.top = "";
		obj.getElementsByTagName("div")[0].style.bottom = "";
		obj.getElementsByTagName("div")[0].style.right = "";
		obj.getElementsByTagName("div")[0].style.left = "";
		obj.getElementsByTagName("div")[0].style.position = "";
		sliding = false;
		slider_events();
	}
}

function startSlide(e) {
	e = e || event;
	on_mouse_over();
	if (search_active || hovered_state !== false) return;
	if (dataset === "series" || dataset === "chemical") dim_for_states();
	else if (dataset === "state") {
		if (!widecheck.checked) document.getElementById("Closeup").style.display = "none";
		matterstate.style.display = ""; matterstate.show = "block";
	}
	slider_data["startOffsetX"] = parseInt(slider.style.left) - e.screenX;
	document.onmousemove = moveSlider;
	document.onmouseup = slider_release;
	slider.onmousedown = null;
}

function slider_skip(e) {
	e = e || event;
	if (search_active || hovered_state !== false) return;
	var offset = (e.offsetX - slider.offsetLeft || findPos(slider, [e.pageX, 0])[0]) < 0 ? -1 : 1;
	bump_slider(offset, (slider_data["xMax"] / 10) * offset);
	slider_release(true);
}

function wheelscroll(e) {
	e = e || event;
	var skip = (e.detail) ? e.detail / Math.abs(e.detail) : e.wheelDelta / Math.abs(e.wheelDelta);
	if (skip) bump_slider(skip, skip * 3);
	slider_release(true);
	if (e.preventDefault) e.preventDefault();
	return false;
}

function moveSlider(e) {
	snap_slider(Math.max(0, Math.min(slider_data["startOffsetX"] + (e || event).screenX, slider_data["xMax"])), false, false);
	return false;
}

function slider_keypress(e) {
	var code = e ? e.which : event.keyCode;
	if (code > 31 && (code < 48 || code > 57)) return false;
}

function slider_release(e) {
	e = e || event;
	if ((e.keyCode == 39 || e.keyCode == 37) && this.id !== "SliderBar") return false;
	if (e.keyCode) on_mouse_over();
	var spec = window["spec_" + dataset];
	if (dataset !== "state" && wholetable.inverted) leave_state();
	if ("default" in spec) {
		spec["default"] = display.value;
		set_cookie("default_" + dataset, spec["default"]);
	}
	if (!("values" in spec)) snap_slider(Math.min(slider_data["xMax"], Math.max(0, (display.value * 1 - slider_data["from"]) * slider_data["scale"])), false, false);
	if (dataset !== "series" && dataset !== "chemical") save_colors(current_colors);
	if (dataset === "state") dim(active, true);
	if (e !== true) on_mouse_over(active);
	else if (dataset === "ionize") update_detail(active, "ionize");
	document.onmousemove = null;
	document.onmouseup = null;
	slider.onmousedown = startSlide;
}

function snap_slider(x, force, flash_updated) {
	var spec = window["spec_" + dataset], pos = Math.round(x / slider_data["scale"] + slider_data["from"]);
	slider.style.left = (pos - slider_data["from"]) * slider_data["scale"] + "px";
	if ("values" in spec) {
		if (spec["subset"] != pos || force) {
			spec["subset"] = pos;
			set_cookie("subset_" + dataset, spec["subset"]);
			display.value = spec["values"][pos];
			if (dataset !== "isotope") document.getElementById("l_" + dataset).getElementsByTagName("span")[0].innerHTML = " " + display.value + " ";
			colorize_and_mass(true);
		}
	} else {
		display.value = pos;
		if (spec["unit"][0] === " K") {
			temperature = pos;
			state_classes(0, flash_updated);
			if (force) update_tempbox();
			else {
				clearTimeout(slider_data["timer"]);
				slider_data["timer"] = setTimeout(update_tempbox, 15);
			}
		}
		if (force || (dataset !== "series" && dataset !== "chemical")) colorize_and_mass((force && dataset !== "isotope") || dataset === "state");
	}
}

function slider_arrow(e) {
	e = e || event;
	if (e.keyCode >= 33 && e.keyCode <= 40) on_mouse_over();
	switch (e.keyCode) {
		case 37: case 39:
			if (this.id === "SliderBar") bump_slider(e.keyCode - 38, e.keyCode - 38);
			break;
		case 38: case 40:
			bump_slider(39 - e.keyCode, 39 - e.keyCode);
			break;
		case 35: case 36:
			bump_slider(1000 * (e.keyCode - 35.5), 1000 * (e.keyCode - 35.5));
			break;
		case 33: case 34:
			var offset = (33.5 - e.keyCode) * 2;
			bump_slider(offset, (slider_data["xMax"] / 10) * offset);
			break;
	}
	if (e.keyCode >= 33 && e.keyCode <= 40) {
		e.cancelBubble = true;
		if (e.stopPropagation) e.stopPropagation();
		if (!((e.keyCode == 39 || e.keyCode == 37) && this.id === "SliderDisplay")) return false;
	}
}

function bump_slider(valuedist, pixeldist) {
	if (dataset === "state") dark(active, true);
	if ("values" in window["spec_" + dataset])
		snap_slider(Math.min(slider_data["xMax"], Math.max(0, slider.offsetLeft + slider_data["scale"] * valuedist)), false, false);
	else {
		if (isNaN(display.value)) display.value = 0;
		snap_slider(Math.min(slider_data["xMax"], Math.max(0, (display.value * 1 - slider_data["from"]) * slider_data["scale"] + 1 * pixeldist)), false, dataset === "series");
	}
}

function create_radios(spec) {
	var form = document.createElement("form"), x, temp, label;
	form.id = "AltSlider";
	form.onkeydown = function (e) { e = e || event; e.cancelBubble = true; };
	for (x = 0; x < spec["values"].length; x++) {
		temp = document.createElement("span");
		temp.className = "Radio";
		temp.innerHTML += ' <input type="radio" name="SliderAlt" id="r_' + spec["values"][x] + '" value="' + x + '"/>';
		label = document.createElement("label");
		label.htmlFor = "r_" + spec["values"][x];
		label.innerHTML = spec["values"][x];
		temp.appendChild(label);
		form.appendChild(temp);
	}
	form.onclick = subset_changed;
	display.parentNode.appendChild(form);
	document.getElementById("r_" + spec["values"][spec["subset"]]).checked = true;
}

function fade_opacity(el, value) {
	el.style.opacity = value;
	if (value == 1) { if (el.filters) el.style.removeAttribute("filter"); }
	else el.style.filter = "alpha(opacity=" + value * 100 + ")";
}

function fade(els, value, dir, direction) {
	var el = els[dir == 2 ? 1 : 0], x;
	for (x in el) if (document.getElementById(el[x]) !== "none") fade_opacity(document.getElementById(el[x]), value);
	if (value == 1 && dir == 2) {
		slide_in(display.parentNode.parentNode, 0, direction == "top" || direction == "bottom" ? -display.parentNode.offsetHeight : -display.parentNode.offsetWidth, direction);
		return;
	}
	if (value == 0.125) {
		dir = 1 / dir;
		prepare_fade(els);
	}
	setTimeout(getRef4(els, value * dir, dir, direction), 10);
}

function getRef4(els, value, dir, direction) {
	return function () { fade(els, value, dir, direction); };
}

function prepare_fade(els) {
	var x;
	for (x in els[0]) {
		document.getElementById(els[0][x]).style.display = "none";
		fade_opacity(document.getElementById(els[0][x]), 1);
	}
	for (x in els[1]) {
		document.getElementById(els[1][x]).style.display = "block";
		if (firstDetails && els[1][x] == "Properties") fix_properties();
		fade_opacity(document.getElementById(els[1][x]), 0);
	}
}

function slider_events() {
	if (document.addEventListener) {
		document.getElementById("SliderTrack").addEventListener("DOMMouseScroll", wheelscroll, false);
		display.addEventListener("DOMMouseScroll", wheelscroll, false);
	} else display.onmousewheel = document.getElementById("SliderTrack").onmousewheel = wheelscroll;
	document.getElementById("SliderTrack").onclick = slider_skip;
	slider.onclick = function (e) { e = e || event; e.cancelBubble = true; };
	slider.onmousedown = startSlide;
	display.onkeyup = document.getElementById("SliderBar").onkeyup = slider_release;
	display.onkeydown = document.getElementById("SliderBar").onkeydown = slider_arrow;
	display.onkeypress = slider_keypress;
	display.onfocus = document.getElementById("SliderBar").onfocus = hover_state;
	display.onblur = document.getElementById("SliderBar").onblur = unhover_state;
}

function dim_for_states() {
	on_mouse_over();
	if (!widecheck.checked) document.getElementById("Closeup").style.display = "none";
	matterstate.style.display = ""; matterstate.show = "block";
	series_to_temp();
	wholetable.className += " InvertState";
	wholetable.inverted = true;
	state_classes(true, false);
	for (var i = 1; i <= 118; i++) element_ids[i].childNodes[n_big].childNodes[n_symbol].style.color = "";
}
