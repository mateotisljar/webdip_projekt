<?php
ob_start();
session_start();

include_once'baza.class.php';
$baza = new Baza();
$ustanove="";
$tip_korisnika=$_SESSION['tip_korisnika'];
$korisnicko_ime=$_SESSION['korisnicko_ime'];
$upit = "select id_ustanove, naziv from ustanove;";
$rezultat = $baza->select($upit);
while ($red = mysqli_fetch_array($rezultat)) {
    $ustanove[] = $red;
}



require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
$smarty->assign('korisnicko_ime', $korisnicko_ime);
$smarty->assign('tip_korisnika', $tip_korisnika);
$smarty->assign('ustanove', $ustanove);
$smarty->display('header.tpl');
$smarty->display('ustanove.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>




