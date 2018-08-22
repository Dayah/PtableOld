function timeunits(seconds) {
	var i, period_name = ["y", "d", "h", "min", "s", "ms", "µfs", "ns", "ps"], period_secs = [31556926, 86400, 3600, 60, 1, 1e-3, 1e-6, 1e-9, 1e-12];

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

function getBGcolor(el) {
	if (el.currentStyle) return (el.currentStyle.backgroundColor.replace(/^#/, ""));
	else if (window.getComputedStyle) return (rgb2hex(getComputedStyle(el, null).getPropertyValue("background-color")));
}

function rgb2hex(value) {
	var i, hex = "", h = /(\d+)[, ]+(\d+)[, ]+(\d+)/.exec(value);
	for (i = 1; i <= 3; i++)
		hex += (h[i] < 16 ? "0" : "") + parseInt(String(h[i])).toString(16);
	return (hex);
}
