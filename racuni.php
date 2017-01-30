<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";
$korisnicko_ime = $_GET['korisnicko_ime'];
require_once 'smarty.php';
$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->display('header.tpl');
$smarty->display('moje_rezervacije.tpl');
$korisnik = $_SESSION['id_korisnika'];
$upit = "SELECT * FROM racuni WHERE id_korisnika= '{$korisnik}' and id_racuna not in(select id_racuna from zalbe)";
$rezultat = $baza->select($upit);

echo "<table border=1>";
echo "<caption>Ispis mojih računa </caption>";
echo "<thead>"
 . "<th>ID</th>"
 . "<th>Datum</th>"
 . "<th>Vrijeme</th>"
 . "<th>Ustanova</th>"
 . "<th>Stanje</th>"
 . "<th>Potrošeno</th>"
 . "<th>Obavio</th>"
 . "<th>id_rezervacije</th>"
 . "<th>Žalbe</th>"
 . "</thead>";


while ($lista = $rezultat->fetch_array()) {

    
    echo "<tr>"
    . "<td>$lista[0]</td>"
    . "<td>$lista[1]</td>"
    . "<td>$lista[2]</td>"
    . "<td>tfg</td>"
    . "<td>$lista[3]</td>"
    . "<td>$lista[4]</td>"
    . "<td>$lista[6]</td>"
    . "<td>$lista[7]</td>"
    . "<td><a href='kreiraj_zalbu.php?id_racuna={$lista[0]}'>Kreiraj žalbu</a></td>"
    . "</td>";
}

echo "</table>";


$smarty->display('footer.tpl');


ob_end_flush();
?>


