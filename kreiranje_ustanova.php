<?php

session_start();
ob_start();
include_once'baza.class.php';
$baza = new Baza();
$poruke = "";
$popis = "";
$moderator = "";
$tip_korisnika = "";
if (isset($_SESSION['korisnicko_ime']) && $_SESSION['tip_korisnika'] == 1) {
    $upit = "select id_korisnika, korisnicko_ime from korisnici;";
    $tip_korisnika = $_SESSION['tip_korisnika'];
    $rezultat2 = $baza->select($upit);
    while ($red = mysqli_fetch_array($rezultat2)) {
        $popis[] = $red;
    }

    if (isset($_POST['submit'])) {
        $naziv_ustanove = $_POST['naziv_ustanove'];
        $moderator = $_POST['moderator'];


        $upit = "select * from ustanove where naziv = '{$naziv_ustanove}' limit 1";
        $rezultat = $baza->select($upit);
        if ($rezultat->num_rows == 1) {
            $poruke.="Ta ustanova već postoji.";
        }
        if (empty($poruke)) {
            $upit = "insert into ustanove(id_ustanove, naziv, moderator) values(default, '{$naziv_ustanove}', '{$moderator}');";
            if ($baza->update($upit)) {
                $poruke.="Ustanova je uspješno unesena u bazu";
            } else {
                $poruke.="Neuspješno unošenje ustanova u bazu";
            }
        }
    }
}


require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->assign('tip_korisnika', $tip_korisnika);
$smarty->assign('popis', $popis);
$smarty->display('header.tpl');
$smarty->display('kreiranje_ustanova.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>


