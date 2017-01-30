<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";
$korisnici = "";
$rezervacija = "";

$upit = "select id_korisnika, ime, prezime from korisnici;";
$rezultat = $baza->select($upit);
while ($red = mysqli_fetch_array($rezultat)) {
    $korisnici[] = $red;
}
$upit = "select id_rezervacije from rezervacije;";
$rezultat = $baza->select($upit);
while ($red = mysqli_fetch_array($rezultat)) {
    $rezervacija[] = $red;
}
$korisnicko_ime = $_SESSION['korisnicko_ime'];
if (isset($_POST['submit'])) {
    $datum = $_POST['datum'];
    $vrijeme = $_POST['vrijeme'];
    $stanje = $_POST['stanje'];
    $obavio = $_SESSION['ime'] . $_SESSION['prezime'];
    $korisnik = $_POST['korisnik'];
    $rezervacija = $_POST['rezervacija'];
    $upit = "SELECT rezervacije.id_ustanove FROM rezervacije, racuni WHERE racuni.id_korisnika = rezervacije.id_korisnika AND rezervacije.id_rezervacije = '{$rezervacija}'";
    $rezultat_rez = $baza->select($upit);
    $lista_rez = $rezultat_rez->fetch_array();
    $rezerv = $lista_rez[0];



    $upit = "SELECT max(stanje) from racuni, rezervacije where racuni.id_rezervacije = rezervacije.id_rezervacije and rezervacije.id_ustanove = '{$rezerv}'";
    $rezultat2 = $baza->select($upit);
    $lista = $rezultat2->fetch_array();
    $proslo_stanje = $lista[0];
    $potrosnja = $stanje - $proslo_stanje;
    if (empty($datum) || empty($vrijeme) || empty($stanje)) {
        $poruke.="Nisu uneseni svi podaci.";
    }

    if (empty($poruke)) {
        $upit = "insert into racuni (id_racuna, datum, vrijeme, stanje, potrosnja, id_korisnika, obavio, id_rezervacije) values(default, '{$datum}', '{$vrijeme}', '{$stanje}', '{$potrosnja}', '{$korisnik}', '{$obavio}', '{$rezervacija}' );";
        $rezultat = $baza->update($upit);
        header("Location: racuni.php?korisnicko_ime={$korisnicko_ime}");
    }
}




require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->assign('korisnici', $korisnici);
$smarty->assign('rezervacija', $rezervacija);
$smarty->display('header.tpl');
$smarty->display('kreiranje_racuna.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>



