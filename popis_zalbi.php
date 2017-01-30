<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";
require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);

$smarty->display('header.tpl');
$smarty->display('moje_rezervacije.tpl');
$upit = "select * from zalbe";
$rezultat = $baza->select($upit);
echo "<table border=1>";
echo "<caption>Ispis svih žalbi </caption>";
echo "<thead>"
 . "<th>ID</th>"
 . "<th>Datum</th>"
 . "<th>Korisnik</th>"
 . "<th>Id_racuna</th>"
 . "<th>Opis</th>"
 . "<th>Slika</th>"
 . "<th>Akcija</th>"
 . "<th>Status</th>"
 . "</thead>";


while ($lista = $rezultat->fetch_array()) {

    if ($lista[6] == 1) {
        $lista[6] = "Prihvaceno";
    } else {
        $lista[6] = "Odbijeno";
    }
    echo "<tr>"
    . "<td>$lista[0]</td>"
    . "<td>$lista[1]</td>"
    . "<td>$lista[2]</td>"
    . "<td>$lista[3]</td>"
    . "<td>$lista[4]</td>"
    . "<td>$lista[5]</td>"
    . "<td><a href='odbij_zalbu.php?id_zalbe={$lista[0]}'>Odbij</a><br>"
    . "<a href='prihvati_zalbu.php?id_zalbe={$lista[0]}'>Kreiraj novi račun</a></td>"
    . "<td>$lista[6]</td>"
    . "</td>";
}

echo "</table>";


$smarty->display('footer.tpl');
ob_end_flush();
?>

