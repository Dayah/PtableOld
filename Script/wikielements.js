function element(lang, element) {
	if (window.frames["ElementFrame"]) {
		document.getElementById("ElementName").innerHTML = element;
		document.getElementById("FullArticle").href = "http://" + lang + ".wikipedia.org/wiki/" + element;
		document.getElementById("ElementBox").style.display = "block";
		window.frames["ElementFrame"].location.href = lang + ".wikipedia.org/wiki/" + element;
	}
}

function destroy(button) {
	window.frames["ElementFrame"].document.body.innerHTML = "<h1>Loading&hellip;</h1>";
	button.parentNode.parentNode.parentNode.parentNode.parentNode.style.display = "none";
}

function opacity(element, percent, count) {
	element.style.filter = (percent != 100) ? "alpha(opacity=" + percent + ")" : "";
	element.style.opacity = percent / 100;
	if (count > 1) {
		element = element.nextSibling;
		while (element.nodeType != 1) element = element.nextSibling;
		element.style.filter = (percent != 100) ? "alpha(opacity=" + percent + ")" : "";
		element.style.opacity = percent / 100;
	}
}

// Thanks to Mark "Tarquin" Wilton-Jones of http://www.howtocreate.co.uk/ for help getting around IE's broken position: fixed.
function getIESze() {
	var de = document.documentElement;
	var db = document.documentElement;
	return [
		(de.clientWidth ? de.clientWidth : db.clientWidth),
		(de.clientHeight ? de.clientHeight : db.clientHeight)
	];
}
function getIEScrl() {
	var de = document.documentElement;
	var db = document.documentElement;
	return [
		(de.scrollLeft ? de.scrollLeft : db.scrollLeft),
		(de.scrollTop ? de.scrollTop : db.scrollTop)
	];
}
