<? include("Script/lang_detect.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<html<?= (right_to_left($visitor_accepted[0]["Actual"])) ? " dir=\"rtl\"" : "" ?>>
 <head>

  <title><?= local("Title") ?> - Borders</title>

  <meta http-equiv="PICS-Label" CONTENT='(PICS-1.1 "http://www.rsac.org/ratingsv01.html" l gen true comment "RSACi North America Server" for "http://www.dayah.com/" on "1999.01.25T17:12-0800" r (n 0 s 0 v 0 l 0))'>
  <meta name="description" content="View the periodic table with HTML table borders turned on.">
  <meta name="keywords" content="complex, html, table">

  <link href="Style/screen-default.css" rel="stylesheet" type="text/css" media="screen, print">
<? if (right_to_left($visitor_accepted[0]["Actual"])) { ?>
  <link href="Style/screen-rtl.css" rel="stylesheet" type="text/css" media="screen, print">
<? } ?>

  <script type="text/javascript" src="Script/wikielements.js"></script>

  <link rel="shortcut icon" href="favicon.ico">

 </head>
 <body>

  <h1><?= local("H1") ?> - Borders</h1>

<? include("Script/navigation.php"); ?>

  <p>Since this periodic table started out as more of a piece of HTML artwork than a reference tool, this page is provided to show how it was made using HTML tables. Notice the only nesting used was to place the key inside the table. Also of interest may be how cells seem to overlap each other. Originally added for both file size optimization and tamper resistance, this nonstandard feature of this specific page forced many browsers to support a very specific nonstandard way of resolving cell conflicts and brought their table layout engines into synchronization. <a href="./">Return to the standard view</a>.</p>

  <table id="Main" border=1>
   <tr>

    <td colspan=2 rowspan=2></td>

    <td class="NewGroup" colspan=2>1</td>

    <td class="RowSpace" rowspan=18></td>

    <td class="NewGroup" colspan=3 style="text-align: left;"><?= local("New") ?></td>

    <td colspan=29 rowspan=7>
     <table id="Key" cellspacing=10 border=1>
      <col width="5%"> 
      <col>
      <col width="5%">
      <col width="35%">

      <tr>

       <th class="Alkali"></th>
       <td><?= local("Alkali metals") ?></td>

       <th class="Actinide"></th>
       <td><?= local("Actinide series") ?></td>

       <th class="Solid">C</th>
       <td class="Solid"><?= local("Solid") ?></td> 

      </tr>
      <tr>

       <th class="Alkaline"></th>
       <td><?= local("Alkaline earth metals") ?></td>

       <th class="Poor"></th>
       <td><?= local("Poor metals") ?></td>

       <th class="Liquid">Br</th>
       <td class="Liquid"><?= local("Liquid") ?></td>

      </tr>
      <tr>

       <th class="Transition"></th>
       <td><?= local("Transition metals") ?></td>

       <th class="Nonmetal"></th>
       <td><?= local("Nonmetals") ?></td>

       <th class="Gas">H</th>
       <td class="Gas"><?= local("Gas") ?></td>

      </tr>
      <tr>

       <th class="Lanthanide"></th>
       <td><?= local("Lanthanide series") ?></td>

       <th class="Noble"></th>
       <td><?= local("Noble gases") ?></td>

       <th class="Synthetic">Tc</th>
       <td class="Synthetic"><?= local("Synthetic") ?></td>

      </tr>
     </table>
    </td>

    <td class="RowSpace" rowspan=25></td>

    <td colspan=15 rowspan=2></td>

    <td class="NewGroup" colspan=2>18</td>

   </tr>
   <tr class="OldGroup">

    <td colspan=2>IA</td>

    <td colspan=3 style="text-align: left;"><?= local("Original") ?></td>

    <td colspan=2>VIIIA</td>

   </tr>
   <tr>

    <td class="RowSpace"></td>

   </tr>
   <tr>

    <th rowspan=2>1</th>
    <td class="RowSpace" rowspan=15></td>

    <?= element(1, "H", "1.00794", "Hydrogen", "Gas"); ?>
    <td class="Hydrogen Electron" rowspan=2>1</td>

    <td class="NewGroup" colspan=2>2</td>
    <td class="RowSpace" rowspan=11></td>

    <td class="NewGroup" colspan=2>13</td>
    <td class="RowSpace" rowspan=5></td>

    <td class="NewGroup" colspan=2>14</td>
    <td class="RowSpace" rowspan=7></td>

    <td class="NewGroup" colspan=2>15</td>
    <td class="RowSpace" rowspan=9></td>

    <td class="NewGroup" colspan=2>16</td>
    <td class="RowSpace" rowspan=11></td>

    <td class="NewGroup" colspan=2>17</td>
    <td class="RowSpace" rowspan=22></td>

    <?= element(2, "He", "4.002602", "Noble", "Gas"); ?>
    <td class="Noble Electron" rowspan=2>2</td>

    <td class="RowSpace" rowspan=15></td>

    <td class="Electron Shells" rowspan=2>K</td>

   </tr>
   <tr class="OldGroup">

    <td colspan=2>IIA</td>
    <td colspan=2>IIIA</td>
    <td colspan=2>IVA</td>
    <td colspan=2>VA</td>
    <td colspan=2>VIA</td>
    <td colspan=2>VIIA</td>

   </tr>
   <tr>

    <td class="RowSpace"></td>

   </tr>
   <tr>

    <th>2</th>

    <?= element(3, "Li", "6.941", "Alkali"); ?>
    <td class="Alkali Electron">2<br>1</td>

    <?= element(4, "Be", "9.012182", "Alkaline"); ?>
    <td class="Alkaline Electron">2<br>2</td>

    <?= element(5, "B", "10.811", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>3</td>

    <?= element(6, "C", "12.0107", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>4</td>

    <?= element(7, "N", "14.00674", "Nonmetal", "Gas"); ?>
    <td class="Nonmetal Electron">2<br>5</td>

    <?= element(8, "O", "15.9994", "Nonmetal", "Gas"); ?>
    <td class="Nonmetal Electron">2<br>6</td>

    <?= element(9, "F", "18.9984032", "Nonmetal", "Gas"); ?>
    <td class="Nonmetal Electron">2<br>7</td>

    <?= element(10, "Ne", "20.1797", "Noble", "Gas"); ?>
    <td class="Noble Electron">2<br>8</td>

    <td class="Electron Shells">K<br>L</td>

   </tr>
   <tr>

    <td class="RowSpace" colspan=37></td>
    <td class="Divider RoundTR" colspan=3></td>

   </tr>
   <tr>

    <th rowspan=2>3</th>

    <?= element(11, "Na", "22.989770", "Alkali"); ?>
    <td class="Alkali Electron" rowspan=2>2<br>8<br>1</td>

    <?= element(12, "Mg", "24.3050", "Alkaline"); ?>
    <td class="Alkaline Electron" rowspan=2>2<br>8<br>2</td>

    <td class="NewGroup" colspan=2>3</td>
    <td class="RowSpace" rowspan=6></td>

    <td class="NewGroup" colspan=2>4</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>5</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>6</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>7</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>8</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>9</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>10</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>11</td>
    <td class="RowSpace" rowspan=17></td>

    <td class="NewGroup" colspan=2>12</td>

    <?= element(13, "Al", "26.981538", "Poor"); ?>
    <td class="Poor Electron" rowspan=2>2<br>8<br>3</td>

    <td class="Divider RoundBL" rowspan=3></td>

    <?= element(14, "Si", "28.0855", "Nonmetal"); ?>
    <td class="Nonmetal Electron" rowspan=2>2<br>8<br>4</td>

    <?= element(15, "P", "30.973761", "Nonmetal"); ?>
    <td class="Nonmetal Electron" rowspan=2>2<br>8<br>5</td>

    <?= element(16, "S", "32.066", "Nonmetal"); ?>
    <td class="Nonmetal Electron" rowspan=2>2<br>8<br>6</td>

    <?= element(17, "Cl", "35.453", "Nonmetal", "Gas"); ?>
    <td class="Nonmetal Electron" rowspan=2>2<br>8<br>7</td>

    <?= element(18, "Ar", "39.948", "Noble", "Gas"); ?>
    <td class="Noble Electron" rowspan=2>2<br>8<br>8</td>

    <td class="Electron Shells" rowspan=2>K<br>L<br>M</td>

   </tr>
   <tr class="OldGroup">

    <td colspan=2>IIIB</td>
    <td colspan=2>IVB</td>
    <td colspan=2>VB</td>
    <td colspan=2>VIB</td>
    <td colspan=2>VIIB</td>
    <td colspan=2 style="text-align: right;"><HR></td>
    <td colspan=2>VIIIB</td>
    <td colspan=2 style="text-align: left;"><HR></td>
    <td colspan=2>IB</td>
    <td colspan=2>IIB</td>

   </tr>
   <tr>

    <td class="RowSpace" colspan=40></td>
    <td class="Divider RoundTR" colspan=3></td>

   </tr>
   <tr>

    <th>4</th>

    <?= element(19, "K", "39.0983", "Alkali"); ?>
    <td class="Alkali Electron">2<br>8<br>8<br>1</td>

    <?= element(20, "Ca", "40.078", "Alkaline"); ?>
    <td class="Alkaline Electron">2<br>8<br>8<br>2</td>

    <?= element(21, "Sc", "44.955910", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>9<br>2</td>

    <?= element(22, "Ti", "47.867", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>10<br>2</td>

    <?= element(23, "V", "50.9415", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>11<br>2</td>

    <?= element(24, "Cr", "51.9961", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>13<br>1</td>

    <?= element(25, "Mn", "54.938049", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>13<br>2</td>

    <?= element(26, "Fe", "55.8457", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>14<br>2</td>

    <?= element(27, "Co", "58.933200", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>15<br>2</td>

    <?= element(28, "Ni", "58.6934", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>16<br>2</td>

    <?= element(29, "Cu", "63.546", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>1</td>

    <?= element(30, "Zn", "65.409", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>2</td>

    <?= element(31, "Ga", "69.723", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>3</td>

    <td rowspan=14></td>

    <?= element(32, "Ge", "72.64", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>4</td>

    <td class="Divider RoundBL" rowspan=2></td>

    <?= element(33, "As", "74.92160", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>8<br>18<br>5</td>

    <?= element(34, "Se", "78.96", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>8<br>18<br>6</td>

    <?= element(35, "Br", "79.904", "Nonmetal", "Liquid"); ?>
    <td class="Nonmetal Electron">2<br>8<br>18<br>7</td>

    <?= element(36, "Kr", "83.798", "Noble", "Gas"); ?>
    <td class="Noble Electron">2<br>8<br>18<br>8</td>

    <td class="Electron Shells">K<br>L<br>M<br>N</td>

   </tr>
   <tr>

    <td class="RowSpace" colspan=43></td>
    <td class="Divider RoundTR" colspan=3></td>

   </tr>
   <tr>

    <th>5</th>

    <?= element(37, "Rb", "85.4678", "Alkali"); ?>
    <td class="Alkali Electron">2<br>8<br>18<br>8<br>1</td>

    <?= element(38, "Sr", "87.62", "Alkaline"); ?>
    <td class="Alkaline Electron">2<br>8<br>18<br>8<br>2</td>

    <?= element(39, "Y", "88.90585", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>9<br>2</td>

    <?= element(40, "Zr", "91.224", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>10<br>2</td>

    <?= element(41, "Nb", "92.90638", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>12<br>1</td>

    <?= element(42, "Mo", "95.94", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>13<br>1</td>

    <?= element(43, "Tc", "(98)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>13<br>2</td>

    <?= element(44, "Ru", "101.07", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>15<br>1</td>

    <?= element(45, "Rh", "102.90550", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>16<br>1</td>

    <?= element(46, "Pd", "106.42", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>18<br>0</td>

    <?= element(47, "Ag", "107.8682", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>18<br>1</td>

    <?= element(48, "Cd", "112.411", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>18<br>2</td>

    <?= element(49, "In", "114.818", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>18<br>3</td>

    <?= element(50, "Sn", "118.710", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>18<br>4</td>

    <td rowspan=12></td>

    <?= element(51, "Sb", "121.760", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>18<br>5</td>

    <td class="Divider RoundBL" rowspan=2></td>

    <?= element(52, "Te", "127.60", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>8<br>18<br>18<br>6</td>

    <?= element(53, "I", "126.90447", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>8<br>18<br>18<br>7</td>

    <?= element(54, "Xe", "131.293", "Noble", "Gas"); ?>
    <td class="Noble Electron">2<br>8<br>18<br>18<br>8</td>

    <td class="Electron Shells">K<br>L<br>M<br>N<br>O</td>

   </tr>
   <tr>

    <td class="RowSpace" colspan=7></td>
    <td class="OuterBorder RoundTL RoundTR" colspan=4></td>
    <td colspan=35></td>
    <td class="Divider RoundTR" colspan=3></td>

   </tr>
   <tr>

    <th>6</th>

    <?= element(55, "Cs", "132.90545", "Alkali"); ?>
    <td class="Alkali Electron">2<br>8<br>18<br>18<br>8<br>1</td>

    <?= element(56, "Ba", "137.327", "Alkaline"); ?>
    <td class="Alkaline Electron">2<br>8<br>18<br>18<br>8<br>2</td>

    <td class="OuterBorder" rowspan=10></td>
    <td class="InnerBorder Removed" colspan=2>57 to 71</td>
    <td class="OuterBorder" rowspan=4></td>

    <?= element(72, "Hf", "178.49", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>10<br>2</td>

    <?= element(73, "Ta", "180.9479", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>11<br>2</td>

    <?= element(74, "W", "183.84", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>12<br>2</td>

    <?= element(75, "Re", "186.207", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>13<br>2</td>

    <?= element(76, "Os", "190.23", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>14<br>2</td>

    <?= element(77, "Ir", "192.217", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>15<br>2</td>

    <?= element(78, "Pt", "195.078", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>17<br>1</td>

    <?= element(79, "Au", "196.96655", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>18<br>1</td>

    <?= element(80, "Hg", "200.59", "Transition", "Liquid"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>18<br>2</td>

    <?= element(81, "Tl", "204.3833", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>32<br>18<br>3</td>

    <?= element(82, "Pb", "207.2", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>32<br>18<br>4</td>

    <?= element(83, "Bi", "208.98038", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>32<br>18<br>5</td>

    <td rowspan=10></td>

    <?= element(84, "Po", "(209)", "Poor"); ?>
    <td class="Poor Electron">2<br>8<br>18<br>32<br>18<br>6</td>

    <td class="Divider"></td>

    <?= element(85, "At", "(210)", "Nonmetal"); ?>
    <td class="Nonmetal Electron">2<br>8<br>18<br>32<br>18<br>7</td>

    <?= element(86, "Rn", "(222)", "Noble", "Gas"); ?>
    <td class="Noble Electron">2<br>8<br>18<br>32<br>18<br>8</td>

    <td class="Electron Shells">K<br>L<br>M<br>N<br>O<br>P</td>

   </tr>
   <tr>

    <td class="RowSpace" colspan=7></td>
    <td class="InnerBorder" colspan=2></td>
    <td colspan=38></td>
<!--    <td class="Divider" colspan=3></td> -->

   </tr>
   <tr>

    <th>7</th>

    <?= element(87, "Fr", "(223)", "Alkali"); ?>
    <td class="Alkali Electron">2<br>8<br>18<br>32<br>18<br>8<br>1</td>

    <?= element(88, "Ra", "(226)", "Alkaline"); ?>
    <td class="Alkaline Electron">2<br>8<br>18<br>32<br>18<br>8<br>2</td>

    <td class="InnerBorder Removed" colspan=2>89 to 103</td>

    <?= element(104, "Rf", "(261)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>10<br>2</td>

    <?= element(105, "Db", "(262)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>11<br>2</td>

    <?= element(106, "Sg", "(266)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>12<br>2</td>

    <?= element(107, "Bh", "(264)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>13<br>2</td>

    <?= element(108, "Hs", "(269)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>14<br>2</td>

    <?= element(109, "Mt", "(268)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>15<br>2</td>

    <?= element(110, "Ds", "(271)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>17<br>1</td>

    <?= element(111, "Rg", "(272)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>18<br>1</td>

    <?= element(112, "Uub", "(285)", "Transition", "Synthetic"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>32<br>18<br>2</td>

    <?= element(113, "Uut", "(284)", "Poor", "Synthetic"); ?>

    <?= element(114, "Uuq", "(289)", "Poor", "Synthetic"); ?>

    <?= element(115, "Uup", "(288)", "Poor", "Synthetic"); ?>

    <?= element(116, "Uuh", "(292)", "Poor", "Synthetic"); ?>

    <td rowspan=8></td>

    <?= element(117, "Uus", "&nbsp;", "", "Undiscovered"); ?>

    <?= element(118, "Uuo", "&nbsp;", "", "Undiscovered"); ?>

    <td class="Electron Shells">K<br>L<br>M<br>N<br>O<br>P<br>Q</td>

   </tr>
   <tr>

    <td colspan=7 rowspan=4></td>
    <td class="InnerBorder" colspan=2 rowspan=7></td>
    <td></td>
    <td colspan=43 id="Stable"><?= local("Parentheses") ?></td>

   </tr>
   <tr>

    <td class="RowSpace OuterBorder RoundBL RoundTR" colspan=48></td>

   </tr>
   <tr>

    <td class="InnerBorder" colspan=47 id="Copyright"><?= local("Copyright") ?> &copy; 1997 <a class="Web" href="mailto:michael@dayah.com">Michael Dayah</a><span id="Print">Michael Dayah (michael@dayah.com). http://www.dayah.com/periodic/</span>. <span class="Web">Last Modified: <?= date("F d, Y", getlastmod()) ?></span></td>
    <td class="RowSpace OuterBorder" rowspan=5></td>

   </tr>
   <tr>

    <td class="OuterBorder RoundTL RoundTR" colspan=46></td>
    <td class="RowSpace InnerBorder"></td>

   </tr>
   <tr>

    <td colspan=7 rowspan=3><div id="Note"><?= local("Note") ?></div></td>

    <td class="OuterBorder" rowspan=3></td>

    <?= element(57, "La", "138.9055", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>18<br>9<br>2</td>

    <?= element(58, "Ce", "140.116", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>19<br>9<br>2</td>

    <?= element(59, "Pr", "140.90765", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>21<br>8<br>2</td>

    <?= element(60, "Nd", "144.24", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>22<br>8<br>2</td>

    <?= element(61, "Pm", "(145)", "Lanthanide", "Synthetic"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>23<br>8<br>2</td>

    <?= element(62, "Sm", "150.36", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>24<br>8<br>2</td>

    <?= element(63, "Eu", "151.964", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>25<br>8<br>2</td>

    <?= element(64, "Gd", "157.25", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>25<br>9<br>2</td>

    <?= element(65, "Tb", "158.92534", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>27<br>8<br>2</td>

    <?= element(66, "Dy", "162.500", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>28<br>8<br>2</td>

    <?= element(67, "Ho", "164.93032", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>29<br>8<br>2</td>

    <?= element(68, "Er", "167.259", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>30<br>8<br>2</td>

    <?= element(69, "Tm", "168.93421", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>31<br>8<br>2</td>

    <?= element(70, "Yb", "173.04", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>32<br>8<br>2</td>

    <?= element(71, "Lu", "174.967", "Lanthanide"); ?>
    <td class="Lanthanide Electron">2<br>8<br>18<br>32<br>9<br>2</td>

    <td class="OuterBorder" rowspan=3></td>
    <td class="InnerBorder" rowspan=3></td>

   </tr>
   <tr>

    <td class="RowSpace"></td>

   </tr>
   <tr>

    <?= element(89, "Ac", "(227)", "Transition"); ?>
    <td class="Transition Electron">2<br>8<br>18<br>32<br>18<br>9<br>2</td>

    <?= element(90, "Th", "232.0381", "Actinide"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>18<br>10<br>2</td>

    <?= element(91, "Pa", "231.03588", "Actinide"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>20<br>9<br>2</td>

    <?= element(92, "U", "238.02891", "Actinide"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>21<br>9<br>2</td>

    <?= element(93, "Np", "(237)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>22<br>9<br>2</td>

    <?= element(94, "Pu", "(244)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>24<br>8<br>2</td>

    <?= element(95, "Am", "(243)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>25<br>8<br>2</td>

    <?= element(96, "Cm", "(247)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>25<br>9<br>2</td>

    <?= element(97, "Bk", "(247)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>27<br>8<br>2</td>

    <?= element(98, "Cf", "(251)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>28<br>8<br>2</td>

    <?= element(99, "Es", "(252)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>29<br>8<br>2</td>

    <?= element(100, "Fm", "(257)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>30<br>8<br>2</td>

    <?= element(101, "Md", "(258)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>31<br>8<br>2</td>

    <?= element(102, "No", "(259)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>32<br>8<br>2</td>

    <?= element(103, "Lr", "(262)", "Actinide", "Synthetic"); ?>
    <td class="Actinide Electron">2<br>8<br>18<br>32<br>32<br>9<br>2</td>

   </tr>
   <tr>

    <td class="RowSpace" colspan=7></td>
    <td class="OuterBorder RoundBL RoundBR" colspan=4></td>
    <td colspan=44></td>
    <td class="OuterBorder RoundBL RoundBR" colspan=3></td>

   </tr>
  </table>

  <img src="http://www.dayah.com/periodic/Images/Spacer.GIF?lang=<?= (array_key_exists("HTTP_ACCEPT_LANGUAGE", $_SERVER)) ? $_SERVER["HTTP_ACCEPT_LANGUAGE"] : "" ?>" alt="" height=5 width=5>

 </body>
</html>
