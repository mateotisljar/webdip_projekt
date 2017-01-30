<?php

ob_start();
session_start();

include_once'baza.class.php';
$baza = new Baza();
$poruke = "";
$ustanove = "";
$korisnicko_ime="";
$upit = "select naziv_usluge from usluge;";
$rezultat = $baza->select($upit);
while ($red = mysqli_fetch_array($rezultat)) {
    $popis[] = $red;
}

$upit = "select id_ustanove, naziv from ustanove;";
$rezultat = $baza->select($upit);
while ($red = mysqli_fetch_array($rezultat)) {
    $ustanove[] = $red;
}
$korisnicko_ime = $_SESSION['korisnicko_ime'];
if (isset($_POST['submit'])) {
    $drzava = $_POST['drzava'];
    $grad = $_POST['grad'];
    $datum = $_POST['datum'];
    $vrijeme = $_POST['vrijeme'];
    $usluga = $_POST['usluga'];
    $ustanova = $_POST['ustanova'];
    $korisnik = $_SESSION['id_korisnika'];

    if (empty($drzava) || empty($grad) || empty($datum) || empty($vrijeme) || empty($usluga) || empty($ustanova)) {
        $poruke.="Nisu uneseni svi podaci";
    } else {

        $upit = "insert into rezervacije(id_rezervacije, drzava, grad, datum, vrijeme, id_korisnika, naziv_usluge, id_ustanove) values(default, '{$drzava}', '{$grad}', '{$datum}', '{$vrijeme}', '{$korisnik}', '{$usluga}', '{$ustanova}');";
        $rezultat = $baza->select($upit);
    }
}

require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->assign('korisnicko_ime', $korisnicko_ime);
$smarty->assign('ustanove', $ustanove);
$smarty->assign('popis', $popis);
$smarty->display('header.tpl');
$smarty->display('rezervacija.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>




