<?
$atomic = $_GET["set"];
$handle = fopen("/var/log/cache_miss", "a"); fwrite($handle, date("Y-m-d H:i:s") . " isotope.php?" . $atomic . "\n"); fclose($handle);

$link = mysqli_connect("localhost", "ptable", "lucent", "ptable") or die(mysqli_connect_error());

$result = mysqli_query($link, "SELECT selected,atomic+neutrons,mass,binding,abundance,halflife,decaymode,width,wiki FROM `isotope` WHERE atomic=$atomic") or die(mysqli_error($link));
while ($row = mysqli_fetch_assoc($result))
	$output[] = implode(",", $row);

echo implode("\n", $output);
mysqli_free_result($result);
?>
