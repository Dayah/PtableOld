  <div id="Navigation" class="InnerBorder">
<? if (substr($visitor_accepted[0]["Actual"], 0, 2) == "en") {
 	if (apache_note("GEOIP_COUNTRY_CODE") == "US" || apache_note("GEOIP_COUNTRY_CODE") == "CA") { ?>
   <a href="Other/Periodic Table.pdf" title="US paper size (8.5&times;11 in) printable PDF">PDF (Letter)</a>
   <a href="Other/Legal Periodic Table.pdf" title="US wide paper size (8.5&times;14 in) printable PDF">PDF (Legal)</a>
<? 	} else { ?>
   <a href="Other/A4 Periodic Table.pdf" title="European paper size (210&times;297 mm) printable PDF">PDF (A4)</a>
<? 	}
   } else { ?>
   <a href="translation.php?lang=<?= $visitor_accepted[0]["Actual"] ?>" title="Please help me translate this page to your language" style="font-weight: bold;">Help Translate This Page!</a>
<? } ?>
   <a href="Images/<?= mb_strtolower(local("Periodic Table"), mb_detect_encoding(local("Periodic Table"))) ?>.png" title="<?= local("Periodic Table") ?> image"><?= local("Periodic Table") ?> PNG</a>
   <input type="checkbox" id="names" name="names"> <label for="names" title="Show element names">Names</label>
   <input type="checkbox" id="electron" name="electron"> <label for="electron" title="Show electron configurations">Electrons</label>
   <input type="checkbox" id="wide" name="wide"> <label for="wide" title="Show rare earth elements inline">Wide</label>
   <a href="about.html" title="Contact info and questions about this particular periodic table"><?= local("About") ?></a>
<!--   <a href="link.php?lang=<?= $visitor_accepted[0]["Actual"] ?>" title="Images and text for use in linking to this site"><?= local("Link to Us") ?></a> -->
   <a href="advertise-to-students.php" title="Advertise to students on this site"><?= local("Advertise") ?></a>
   <form name="language" style="display: inline;" method="get" action="./"><select name="lang" onChange="this.form.submit();"><?= choose_lang($visitor_accepted[0]["Actual"]); ?></select><? if (array_key_exists("scheme", $_GET)) { ?><input type="hidden" name="scheme" value="<?= $scheme ?>"><? } ?></form>
  </div>
