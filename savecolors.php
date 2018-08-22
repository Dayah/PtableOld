<?
$alkali = $_GET["Alkali"];
$alkaline = $_GET["Alkaline"];
$lanthanoid = $_GET["Lanthanoid"];
$actinoid = $_GET["Actinoid"];
$transition = $_GET["Transition"];
$metalloid = $_GET["Metalloid"];
$poor = $_GET["Poor"];
$nonmetal = $_GET["Nonmetal"];
$halogen = $_GET["Halogen"];
$noble = $_GET["Noble"];

setcookie("Alkali", $alkali, time() + 60*60*24*365, "/");
setcookie("Alkaline", $alkaline, time() + 60*60*24*365, "/");
setcookie("Lanthanoid", $lanthanoid, time() + 60*60*24*365, "/");
setcookie("Actinoid", $actinoid, time() + 60*60*24*365, "/");
setcookie("Transition", $transition, time() + 60*60*24*365, "/");
setcookie("Metalloid", $metalloid, time() + 60*60*24*365, "/");
setcookie("Poor", $poor, time() + 60*60*24*365, "/");
setcookie("Nonmetal", $nonmetal, time() + 60*60*24*365, "/");
setcookie("Halogen", $halogen, time() + 60*60*24*365, "/");
setcookie("Noble", $noble, time() + 60*60*24*365, "/");

$host = $_SERVER["REMOTE_HOST"] ? $_SERVER["REMOTE_HOST"] : $_SERVER["REMOTE_ADDR"];

$link = mysqli_connect("localhost", "colors", "redgreen", "colors") or die(mysqli_connect_error());

$query = "REPLACE INTO colors (host, Alkali, Alkaline, Lanthanoid, Actinoid, Transition, Metalloid, Poor, Nonmetal, Halogen, Noble) VALUES ('$host', 0x0$alkali, 0x0$alkaline, 0x0$lanthanoid, 0x0$actinoid, 0x0$transition, 0x0$metalloid, 0x0$poor, 0x0$nonmetal, 0x0$halogen, 0x0$noble);";

if (!mysqli_query($link, $query)) echo mysqli_error($link);
header("Location: http://www.ptable.com/");
?>
