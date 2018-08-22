<?
$f = fopen("/var/log/visit_length", "a");
fwrite($f, time() . ": " . (array_key_exists("REMOTE_HOST", $_SERVER) ? $_SERVER["REMOTE_HOST"] : $_SERVER["REMOTE_ADDR"]) . ": " . $_GET["load"] . ": " . $_GET["view"] . "\n");
fclose($f);
?>
