<?php

session_start();
ob_start();
include_once'baza.class.php';
$baza = new Baza();
$poruka="";
$podaci="";
if(!isset($_SESSION['korisnicko_ime']) && $_SESSION['tip_korisnika']!=1){
    header("Location: ustanove.php");
    
}
if($_GET['id_ustanove']){
    $ustanova = $_GET['id_ustanove'];
    $upit="select * from ustanove where id_ustanove = {$ustanova}";
    $rezultat = $baza->select($upit);
    $podaci = $rezultat->fetch_array();
}

if(isset($_POST['submit'])){
    $moderator = $_POST['moderator'];
    $naziv = $_POST['naziv_ustanove'];
    
    $upit="update ustanove set naziv='".$naziv."', moderator = '".$moderator."' where id_ustanove = {$ustanova}";
    $baza->update($upit);
    $poruka.="Uspješno ažurirana ustanova";
}


require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruka', $poruka);
$smarty->assign('podaci', $podaci);
$smarty->display('header.tpl');
$smarty->display('detalji_ustanove.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>



