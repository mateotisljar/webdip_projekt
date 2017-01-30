<?php

session_start();
ob_start();

include_once 'baza.class.php';
$baza = new Baza();
$rezervacija = $_GET['id_rezervacije'];
$upit = "update rezervacije set prihvaceno = 1 where id_rezervacije={$rezervacija} limit 1";

if ($baza->update($upit)) {
    $upit = "SELECT korisnici.email FROM korisnici, rezervacije WHERE rezervacije.id_korisnika = korisnici.id_korisnika and id_rezervacije={$rezervacija} limit 1";
    $rezultat = $baza->select($upit);
    $lista = $rezultat->fetch_array();
    $mail=$lista[0];
    $naslov = "Potvrda rezervacije termina";
    $poruka = "Vaša rezervacija je prihvacena.";
    if (mail($mail, $naslov, $poruka)) {
        header("Location: popis_rezervacija.php");
    }
}