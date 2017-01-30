<?php

include 'baza.class.php';
$baza = new Baza();
if($_GET['aktivacijski_kod'] =="1"){
    die();
}
$poruka="";
$aktivacijski_kod = $_GET['aktivacijski_kod'];
$upit = "SELECT * from korisnici where aktivacijski_kod = '{$aktivacijski_kod}' limit 1";
$rezultat1 = $baza ->select($upit);
$lista = $rezultat1->fetch_array();

if($rezultat1->num_rows==0){
    echo 'Neispravan kod ili je korisnicki racun vec aktiviran. <br>';
    die();
}
$istek = 12;
$nacin = "Y-m-d H:i:s";
$vrijeme = new DateTime(date($nacin));
$formatirano_vrijeme = $vrijeme->format($nacin);
$vrijeme_registracije = date($nacin, strtotime($lista['vrijeme_registracije'] . " +$istek hour"));


if($vrijeme_registracije < $formatirano_vrijeme){
    echo "Proslo je vrijeme za aktivaciju. <br>";
    die();
}

$upit = "UPDATE korisnici set aktivacijski_kod = 1 WHERE korisnicko_ime = '".$lista['korisnicko_ime']."'";
$rezultat = $baza->update($upit);
echo 'Aktivacija je uspješna. <br>';

header("Location: prijava.php");