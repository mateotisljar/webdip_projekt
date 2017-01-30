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
$upit = "SELECT * FROM rezervacije WHERE id_korisnika= '{$korisnik}'";
$rezultat = $baza->select($upit);

echo "<table border=1>";
echo "<caption>Ispis mojih rezervacija </caption>";
echo "<thead>"
 . "<th>ID</th>"
 . "<th>Drzava</th>"
 . "<th>Grad</th>"
 . "<th>Datum</th>"
 . "<th>Vrijeme</th>"
 . "<th>Usluga</th>"
 . "<th>Ustanova</th>"
 . "<th>Prihvaceno</th>"
 . "</thead>";
while ($lista = $rezultat->fetch_array()) {
    if ($lista[8] ==1) {
        $lista[8] = "Da";
    } else {
        $lista[8] = "Ne";
    }
    
    $upit="select ustanove.naziv from ustanove, rezervacije where ustanove.id_ustanove = rezervacije.id_ustanove and rezervacije.id_rezervacije='{$lista[0]}'";
    $rezultat2 = $baza->select($upit);
    $ustanova = $rezultat2->fetch_array();
    
    $lista[7]= $ustanova[0];
    
    echo "<tr>"
    . "<td>$lista[0]</td>"
    . "<td>$lista[1]</td>"
    . "<td>$lista[2]</td>"
    . "<td>$lista[3]</td>"
    . "<td>$lista[4]</td>"
    . "<td>$lista[6]</td>"
    . "<td>$lista[7]</td>"
    . "<td>$lista[8]</td>"
    . "</td>";
}

echo "</table>";



$smarty->display('footer.tpl');


ob_end_flush();
?>


