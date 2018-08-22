<?
$lang = $_POST["lang"];
$host = $_SERVER["REMOTE_HOST"] ? $_SERVER["REMOTE_HOST"] : $_SERVER["REMOTE_ADDR"];
$link = mysqli_connect("localhost", "root", "2157800", "ptable") or die(mysqli_connect_error());

$result = mysqli_query($link, "SELECT name,en,`" . $_POST["lang"] . "` FROM strings");
while ($row = mysqli_fetch_assoc($result)) {
	${$lang}[$row["name"]] = $row[$lang];
	$en[$row["name"]] = $row["en"];
}
mysqli_free_result($result);

foreach ($_POST as $name=>$string)
	if (${$lang}[urldecode($name)] != $_POST[$name] && $name != "lang") {
		$new[] = $name;
	}

$prequery = implode(",", $new);

$query = "INSERT INTO usertrans () VALUES ('$host', 0x0$alkali, 0x0$alkaline, 0x0$lanthanoid, 0x0$actinoid, 0x0$transition, 0x0$metalloid, 0x0$poor, 0x0$nonmetal, 0x0$halogen, 0x0$noble);";

//if (!mysqli_query($link, $query)) echo mysqli_error($link);
//header("Location: http://www.dayah.com/periodic/");
?>
