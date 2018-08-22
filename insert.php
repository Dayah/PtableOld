<?
$link = mysqli_connect("localhost", "root", "*****", "ptable") or die(mysqli_connect_error());
foreach ($abundance as $key=>$item) {
//	if ($key < 900) continue;
	if ($item !== 0) {
		if (!
		mysqli_query($link, "UPDATE isotope SET `abundance`=\"" . $item . "\" WHERE item='" . $key . "'")
		) echo mysqli_error($link);
	} else mysqli_query($link, "UPDATE isotope SET `abundance`=NULL WHERE item='" . $key . "'");
	if (strlen($item) > 10) echo strlen($item), "\n";
}
?>
