<?php
ob_start();
session_start();
include_once'baza.class.php';
$baza = new Baza();
$poruke = "";

$ustanove = "";
$upit = "select id_ustanove from ustanove;";
$rezultat2 = $baza->select($upit);
$ustanove = mysqli_fetch_array($rezultat2);
    
if (isset($_POST['submit'])) {
    $naziv = $_POST['naziv_poslovnice'];
    $drzava = $_POST['drzava'];
    $grad = $_POST['grad'];
    $adresa = $_POST['adresa'];

    $upit = "select * from poslovnice where naziv = '{$naziv}' limit 1";
    $rezultat = $baza->select($upit);
    

    if ($rezultat->num_rows == 1) {
        $poruke.="Ta poslovnica već postoji.";
    }


    if (empty($poruke)) {
        $upit = "insert into poslovnice(id_poslovnice, naziv, drzava, grad, adresa, id_ustanove) values(default, '{$naziv}', '{$drzava}', '{$grad}', '{$adresa}');";
        if ($baza->update($upit)) {
            $poruke.="Poslovnica je uspješno unesena u bazu";
        } else {
            $poruke.="Neuspješno unošenje poslovnica u bazu";
        }
    }
}

require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->assign('ustanove', $ustanove);
$smarty->display('header.tpl');
$smarty->display('poslovnice.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>




