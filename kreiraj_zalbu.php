<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";


if (isset($_POST['submit'])) {
    $tag = $_POST['tag'];
    $korisnik= $_SESSION['id_korisnika'];
    $racun= $_GET['id_racuna'];
    $opis = $_POST['opis'];
    $nacin = "Y-m-d H:i:s";
    $vrijeme = new DateTime(date($nacin));
    $formatirano_vrijeme = $vrijeme->format($nacin);
    
    
    
    
    $ekstenzije = array("gif", "jpeg", "jpg", "png");
        for ($i = 0; isset($_FILES['slika']['name'][$i]); $i++) {
            $target_dir = "img/zalbe";
            $target_file = $target_dir . basename($_FILES["slika"]["name"][$i]);
            $temp = explode(".", $_FILES["slika"]["name"][$i]);
            $extension = end($temp);

            if ((($_FILES["slika"]["type"][$i] == "image/gif") || ($_FILES["slika"]["type"][$i] == "image/jpeg") || ($_FILES["slika"]["type"][$i] == "image/jpg") || ($_FILES["slika"]["type"][$i] == "image/pjpeg") || ($_FILES["slika"]["type"][$i] == "image/x-png") || ($_FILES["slika"]["type"][$i] == "image/png")) && ($_FILES["slika"]["size"][$i] < 20000000) && in_array($extension, $ekstenzije)
            ) {
                if ($_FILES["slika"]["error"][$i] > 0) {
                    echo "Return Code: " . $_FILES["slika"]["error"][$i] . "<br>";
                } else {
                    move_uploaded_file($_FILES["slika"]["tmp_name"][$i], $target_file);

                    $linkslika = "img/" . $_FILES["slika"]["name"][$i];

                    
                }
            } 
        }
        $upit = "insert into zalbe (id_zalbe, datum_kreiranja, id_korisnika, id_racuna, opis, slika) values(default, '{$formatirano_vrijeme}', '{$korisnik}', '{$racun}', '{$opis}', '{$linkslika}' );";
    $baza->update($upit);
    
        $poruke.="Uspješno kreirana žalba.";
}

require_once 'smarty.php';
$smarty = new Smarty();
smartyConf($smarty);
varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->display('header.tpl');
$smarty->display('kreiraj_zalbu.tpl');
$smarty->display('footer.tpl');


ob_end_flush();
?>

