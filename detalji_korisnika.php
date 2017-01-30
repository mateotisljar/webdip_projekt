<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start();
ob_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruka = "";
if ($_GET['korisnicko_ime']) {

    $korisnicko_ime = $_GET['korisnicko_ime'];
    $upit = "select * from korisnici where korisnicko_ime = '$korisnicko_ime' limit 1";
    $rezultat = $baza->select($upit);
    $dohvaceni_podaci = $rezultat->fetch_array();
}
if (isset($_POST['promijeni'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['password'];

    $datum_rodjenja = $_POST['datum_rodjenja'];
    $spol = $_POST['spol'];
    $broj = $_POST['mobilni_telefon'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];


    $upit = "update korisnici set ime= '" . $ime . "', prezime='" . $prezime . "', korisnicko_ime = '" . $korisnicko_ime . "', lozinka='" . $lozinka . "', datum_rodjenja = '" . $datum_rodjenja . "', spol='" . $spol . "', telefon='" . $broj . "', email='" . $email . "', adresa='" . $adresa . "' where email = '" . $email . "'";

    if (empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($lozinka) || empty($spol) || empty($datum_rodjenja) || empty($broj) || empty($email) || empty($adresa)) {
        $poruka.= "nisu uneseni svi podaci";
    }
    if($baza->update($upit)){
        header("Location: detalji_korisnika.php?korisnicko_ime={$korisnicko_ime}");
        $poruke.="Podaci uspješno izmjenjeni";
    }
}



require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruka', $poruka);
$smarty->assign('korisnik', $dohvaceni_podaci);

$smarty->display('header.tpl');
$smarty->display('detalji_korisnika.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>






