<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";
$mod="";
$ustanove="";
$tip_korisnika= $_SESSION['tip_korisnika'];
if ($_SESSION['tip_korisnika'] == 1 || $_SESSION['tip_korisnika'] == 2) {
    $upit = "select id_ustanove, naziv from ustanove;";
    $rezultat = $baza->select($upit);
    while ($red = mysqli_fetch_array($rezultat)) {
        $ustanove[] = $red;
    }
    $moderator = $_SESSION['id_korisnika'];
    $upit = "select distinct ustanove.naziv, ustanove.id_ustanove from ustanove, korisnici where ustanove.moderator = {$moderator} ";
    $rezultat = $baza->select($upit);
    while ($row = mysqli_fetch_array($rezultat)) {
        $mod[] = $row;
    }

    if (isset($_POST['submit'])) {
        $naziv = $_POST['naziv'];
        $opis = $_POST['opis'];
        $cijena = $_POST['cijena'];
        $_id_ustanove = $_POST['ustanova'];


        $upit = "select * from kategorije where naziv = '{$naziv}'";
        $rezultat = $baza->select($upit);
        if ($rezultat->num_rows == 1) {
            $poruke.="Ta kategorija vec postoji";
        }
        if (empty($poruke)) {
            $upit = "insert into kategorije (id_kategorije, naziv, opis, cijena, id_ustanove) values(default, '{$naziv}', '{$opis}', '{$cijena}', '{$_id_ustanove}');";
            $baza->update($upit);
        }
    }
}



require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->assign('mod', $mod);
$smarty->assign('tip_korisnika', $tip_korisnika);
$smarty->assign('ustanove', $ustanove);
$smarty->display('header.tpl');
$smarty->display('kategorije.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>

