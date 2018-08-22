function startWikiDrag(e) {
	e = e || event;
	if ((e.srcElement || e.target).nodeName.toUpperCase() === "INPUT") return;
	document.getElementById("WikiFrameBox").style.display = "none";
	set_opacity(wikibox, 0.80);
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
	set_opacity(wikibox, 1);
	document.getElementById("WikiFrameBox").style.display = "";
}

function click_wiki(e) {
	var el = this || srcElement, fromAni, article;
	if (el.nodeName.toUpperCase() === "A") {
		article = decodeURIComponent(el.href.substring(el.href.lastIndexOf("\/") + 1));
		document.getElementById("ElementName").href = el.href;
	} else if (tab === "IsotopeTab") {
		fromAni = el;
		article = el.getElementsByTagName("em")[0].innerHTML;
		document.getElementById("ElementName").href = "http://en.wikipedia.org/wiki/" + encodeURIComponent(article);
	} else {
		fromAni = el;
		article = el.childNodes[n_big].childNodes[n_name].innerHTML;
		document.getElementById("ElementName").href = "http://" + language + ".wikipedia.org/wiki/" + encodeURIComponent(article);
	}
	document.getElementById("ElementName").innerHTML = article;
	window.frames["WikiFrame"].location.replace("http://" + language + ".wikipedia.org/w/index.php?title=" + encodeURIComponent(article) + "&printable=yes");
	wikibox.onmousedown = startWikiDrag;
	wikibox.getElementsByTagName("button")[0].onmousedown = function (e) { e = e || event; e.cancelBubble = true; };
	if (fromAni && wikibox.style.display !== "block") {
		document.getElementById("WikiFrameBox").style.display = document.getElementById("WikiTitle").style.display = "none";
		wikibox.style.display = "block";
		wikibox.style.backgroundColor = "";
		wikibox.style.border = "2px solid #" + schemehigh;
		wikibox.style.position = "absolute";
		wikibox.style.left = (wikibox.leftStart = -findPos(fromAni, [0, 0])[0]) + "px";
		wikibox.style.width = (wikibox.wideStart = fromAni.offsetWidth) + "px";
		wikibox.style.top = (wikibox.topStart = -findPos(fromAni, [0, 0])[1]) + "px";
		wikibox.style.height = (wikibox.highStart = fromAni.offsetHeight) + "px";
		wikibox.coverLeft = (wikibox.leftStart - 0.15 * resizewidth - (typeof document.body.style.maxHeight != "undefined" ? document.documentElement.scrollLeft : 0)) / animation_steps;
		wikibox.coverWidth = (0.7 * resizewidth - wikibox.wideStart) / animation_steps;
		wikibox.coverTop = (wikibox.topStart - 0.15 * resizeheight - (typeof document.body.style.maxHeight != "undefined" ? document.documentElement.scrollTop : 0)) / animation_steps;
		wikibox.coverHeight = (0.7 * resizeheight - wikibox.highStart) / animation_steps;
		animated_expand();
	} else {
		document.getElementById("Overlay").style.display = "block";
		wikibox.style.display = "block";
		if (typeof document.body.style.maxHeight == "undefined") wikibox.style.height = 0.7 * resizeheight + "px";
		wikibox.style.backgroundColor = "white";
		wikibox.style.border = "medium outset";
	}
	return false;
}

function destroy() {
	window.frames["WikiFrame"].location.replace("about:blank");
	wikibox.style.display = "";
	document.getElementById("Overlay").style.display = "";
}
