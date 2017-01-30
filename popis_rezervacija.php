<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";
require_once 'smarty.php';
$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->display('header.tpl');
$smarty->display('popis_rezervacija.tpl');

if ($_SESSION['tip_korisnika'] == 1 || $_SESSION['tip_korisnika'] == 2) {
    $upit = "select * from rezervacije where prihvaceno=0";
    $rezultat = $baza->select($upit);

    echo "<table border=1>";
    echo "<caption>Ispis nepotvrđenih rezervacija </caption>";
    echo "<thead>"
    . "<th>ID</th>"
    . "<th>Drzava</th>"
    . "<th>Grad</th>"
    . "<th>Datum</th>"
    . "<th>Vrijeme</th>"
    . "<th>Korisnik</th>"
    . "<th>Usluga</th>"
    . "<th>Ustanova</th>"
    . "<th>Potvrdi</th>"
    . "<th>Odbij</th>"
    . "</thead>";
    while ($lista = $rezultat->fetch_array()) {

        echo "<tr>"
        . "<td>$lista[0]</td>"
        . "<td>$lista[1]</td>"
        . "<td>$lista[2]</td>"
        . "<td>$lista[3]</td>"
        . "<td>$lista[4]</td>"
        . "<td><a href='detalji_korisnika.php?korisnicko_ime=$lista[5]'</a>$lista[5]</td>"
        . "<td>$lista[6]</td>"
        . "<td>$lista[7]</td>"
        . "<td><a href='potvrdi_rezervaciju.php?id_rezervacije=$lista[0]'>Potvrdi</a></td>"
        . "<td><a href='odbij_rezervaciju.php?id_rezervacije=$lista[0]'>Odbij</a></td>"
        . "</td>";
    }

    echo "</table>";
}



$smarty->display('footer.tpl');


ob_end_flush();
?>


