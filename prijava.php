<?php

session_start();
ob_start();

include 'login.php';

include 'baza.class.php';

if (isset($_SESSION['korisnicko_ime'])) {
    header("Location: rezervacija.php");
    exit();
} else {
    if(isset($_COOKIE['korisnicko_ime'])){
        $cookie_korisnicko_ime = $_COOKIE['korisnicko_ime'];
    }
    $poruke = "";
    $baza = new Baza();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $korisnicko_ime = $_POST['korisnicko_ime'];
        $pass = $_POST['password'];
        $upit = "SELECT * from korisnici WHERE korisnicko_ime ='" . $korisnicko_ime . "' and lozinka = '" . $pass . "'";
        $rezultat = $baza->select($upit);
        if (mysqli_num_rows($rezultat) == 1) {
            $pronadjeni = mysqli_fetch_array($rezultat);
            kreirajSesiju($pronadjeni);
            if (isset($_POST['checkbox']) && !isset($_COOKIE['korisnicko_ime'])) {
                kreirajKolacic($pronadjeni['id_korisnika']);
                pisiUDnevnik();
            }
            if (!isset($_POST['checkbox']) && isset($_COOKIE['korisnicko_ime'])) {
                brisiKolacic();
            }
            
            header("Location: rezervacija.php");
        } else {
            $poruke .= "Korisnicko ime i lozinka nisu ispravni.";
            
            header("Location: ispis_korisnika.php");
        }
    }
}




require_once 'smarty.php';
$smarty = new Smarty();
smartyConf($smarty);

$smarty->assign('poruke', $poruke);
$smarty->display('header.tpl');
$smarty->display('prijava.tpl');
$smarty->display('footer.tpl');


ob_end_flush();

?>

