<?php
/*
$fontsize = 12;
function strlensort($a, $b) {
	global $fontsize;
	$temp1 = imagettfbbox($fontsize, 0, "Other/ARIALUNI.TTF", $a);
	$temp2 = imagettfbbox($fontsize, 0, "Other/ARIALUNI.TTF", $b);
        if ($temp1[2] == $temp2[2]) return 0;
        return ($temp1[2] > $temp2[2]) ? -1 : 1;
}

usort($en, "strlensort");

print_r($en);

echo "<div style='font-family: Arial Unicode MS; font-size: $fontsize;'>";
foreach($en as $name) {
	$size = imagettfbbox($fontsize, 0, "Other/ARIALUNI.TTF", $name);
	echo "<span style='letter-spacing: " . (($fontsize * 7.5) - $size[2]) / (strlen($name) + 1). "px;'>" . $name . "</span><br>\n";
}

print_r($en_gb);
print_r($de);


print_r(array_intersect_assoc($en, $fr));

$perl = new Perl(); 
$perl->eval('use IP::Country::Fast;');
$perl->eval("my $req = IP::Country::Fast->new();");
print $perl->inet_atocc("212.67.197.128");
*/

include "Lang/en.php";
include "Lang/pt.php";
echo "<ol>";
for ($x = 1; $x <= 118; $x++)
	echo "<li value='$x'>$pt[$x]"; 
?>
