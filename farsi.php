<?
$farsi = array(
"is" => "Frumefni í flokki %",
"el" => "Ομάδα %η (περιοδικού πίνακα)",

);

$link = mysqli_connect("localhost", "root", "******", "ptable") or die(mysqli_connect_error());
foreach ($farsi as $key=>$item) {
        if (!
                mysqli_query($link, "UPDATE strings SET `" . $key . "`=\"" . $item . "\" WHERE name='Group'")
        ) echo mysqli_error($link);
        if (strlen($item) > 25) echo strlen($item), "\n";
}
?>
