function insert_rareearths(turnon) {
	var table = wholetable.tBodies[0].rows;
	iMove = 0;

	if (turnon) {
		wholetable.tHead.rows[0].insertCell(3);

		table[3].insertCell(3); //eventually deleted
		table[4].insertCell(3);
		table[0].insertCell(document.getElementById("Series").parentNode.parentNode.parentNode.parentNode.parentNode.cellIndex + 1);
		key_next = key_id.parentNode.nextSibling;
		while (key_next.nodeType != 1) key_next = key_next.nextSibling;
		key_next.rowSpan = 3;
		key_next.className = "KeyRegion";

		table[8].cells[1].getElementsByTagName("span")[0].style.display = "none";

		move_rare_inside();
	} else {
		var oldcont = document.getElementById("KeyContainer").tBodies[0].rows[0].cells;
		move_keyblocks_to(oldcont);
		key_next.innerHTML = "";

		if (document.getElementById("Properties").style.display == "block" || document.getElementById("Hund").style.display == "block" || document.getElementById("DecayModes").style.display == "block")
			document.getElementById("Series").style.display = "none";
		document.getElementById("Temperature").style.display = "";

		if (document.getElementById("Closeup").style.display === "block" || document.getElementById("IsotopeForm").style.display === "block") document.getElementById("MatterState").style.display = "none";
		key_id.className = "";

		table[5].cells[3].style.display = table[6].cells[3].style.display = table[8].cells[1].style.display = "";
		for (var i = 10; i >= 7; i--) table[i].style.display = "";
		table[4].cells[3].innerHTML = "";

		move_rare_outside();
	}
}

function move_rare_outside() {
	var table = wholetable.tBodies[0].rows;
	table[9].insertBefore(table[5].cells[4], table[9].cells[iMove + 2]);
	table[10].appendChild(table[6].cells[4]);
	if (iMove === 5) {
		key_id.parentNode.rowSpan = 3;
		table[3].insertCell(3).colSpan = key_id.parentNode.colSpan;
	}
	if (iMove) table[8].cells[1].colSpan++;
	if (iMove++ < 14) {
		if (iMove - 1) {
			if (iMove < 6) key_id.parentNode.colSpan--;
			else {
				key_next.colSpan--;
				table[3].cells[3].colSpan--;
			}
			wholetable.tHead.rows[0].cells[3].colSpan--;
			table[4].cells[3].colSpan--;
		}
		setTimeout(move_rare_outside, 100);
	} else {
		table[8].cells[1].getElementsByTagName("span")[0].style.display = "";
		wholetable.tHead.rows[0].deleteCell(3);
		table[3].deleteCell(3);
		table[4].deleteCell(3);
		table[0].deleteCell(key_next.cellIndex);
		setTimeout(resize_hunt, 1000);
	}
}

function move_rare_inside() {
	var table = wholetable.tBodies[0].rows;
	table[5].insertBefore(element_ids[71 - iMove], table[5].cells[4]);
	table[6].insertBefore(element_ids[103 - iMove], table[6].cells[4]);
	if (table[8].cells[1].colSpan > 1) table[8].cells[1].colSpan--;
	if (iMove) {
		table[3].cells[3].colSpan++;
		table[4].cells[3].colSpan++;
		wholetable.tHead.rows[0].cells[3].colSpan++;
		if (iMove > 9)	key_id.parentNode.colSpan++;
		else			key_next.colSpan++;
	}
	if (iMove++ < 14) setTimeout(move_rare_inside, 100);
	else {
		table[3].deleteCell(3); key_id.parentNode.rowSpan = 4;

		var moved = key_next.appendChild(document.getElementById("KeyContainer").cloneNode(true));
		moved.id = "NewContainer";
		var newcont = moved.tBodies[0].rows[0].cells;
		newcont[0].innerHTML = "";
		newcont[1].innerHTML = "";

		move_keyblocks_to(newcont);

		if (dataset === "state" || dataset === "melt" || dataset === "boil")
				document.getElementById("Temperature").style.display = "block";
		else	document.getElementById("Series").style.display = "";
		document.getElementById("MatterState").style.display = "";
		key_id.className = "Upscale";

		table[4].cells[3].innerHTML = table[7].cells[2].innerHTML;
		table[4].cells[3].style.textAlign = "center";
		table[4].cells[3].style.width = "1em";
		table[4].cells[3].style.padding = "0 1.5ex";
		table[4].cells[3].className = "Clean Paren";

		table[5].cells[3].style.display = table[6].cells[3].style.display = "none";
		key_id.parentNode.colSpan--;
		table[4].cells[3].colSpan--;
		wholetable.tHead.rows[0].cells[3].colSpan--;
		for (var i = 10; i >= 7; i--) table[i].style.display = "none";
		setTimeout(resize_hunt, 1000);
	}
}

