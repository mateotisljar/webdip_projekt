<?php

ob_start();
session_start();
include_once 'baza.class.php';
$baza = new Baza();
$poruke = "";


if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $datum_rodjenja = $_POST['datum_rodjenja'];
    $spol = $_POST['spol'];
    $mobilni_telefon = $_POST['mobilni_telefon'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];

    if (empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($password) || empty($password2) || empty($datum_rodjenja) || empty($spol) || empty($mobilni_telefon) || empty($email) || empty($adresa)) {
        $poruke.="Nisu uneseni svi podaci.<br>";
    } else {
        if (isset($korisnicko_ime)) {
            if (ctype_lower($korisnicko_ime[0])) {
                $poruke.="Korisnicko ime mora započeti velikim slovom.<br>";
            }
        }

        $uzorak = '/[a-zA-Z0-9]*/';
        if (!preg_match($uzorak, $password)) {
            $poruke.="Lozinka mora sadržavati slova i brojeve.<br>";
        }

        if (strlen($password) < 7) {
            $poruke.="Lozinka mora biti dulja od 7 znakova.<br>";
        }

        if ($password2 != $password) {
            $poruke.="Lozinke nisu jednake.<br>";
        }


        $uzorak_email = '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+^';
        if (!preg_match($uzorak_email, $email)) {
            $poruke.="Email mora biti formata: nesto@nesto.nesto. <br>";
        }



        $upit = "select * from korisnici where korisnicko_ime = '{$korisnicko_ime}' limit 1";
        $rezultat = $baza->select($upit);
        $upit = "SELECT * from korisnici WHERE email = '{$email}' LIMIT 1";
        $rezultat2 = $baza->select($upit);

        if ($rezultat->num_rows == 1) {
            $poruke.="Korisnicko ime je vec zauzeto. <br>";
        }

        if ($rezultat2->num_rows == 1) {
            $poruke.="Email je vec zauzet. <br>";
        }



        $aktivacijski_kod = md5($korisnicko_ime . time());
        $nacin = "Y-m-d H:i:s";
        $vrijeme = new DateTime(date($nacin));
        $formatirano_vrijeme = $vrijeme->format($nacin);
        if (empty($poruke)) {
            $mail_od = 'Režije registracija';
            $headers = '';
            $headers.='Content-type: text/html; charset=utf-8 \r\n;';
            $headers.='From: ' . $mail_od . '\r\n';
            $upit = "INSERT into korisnici (id_korisnika, ime, prezime, korisnicko_ime, lozinka, datum_rodjenja, spol,  telefon, email, adresa, aktivacijski_kod, vrijeme_registracije, id_tipa, aktivan) values(default, '{$ime}', '{$prezime}', '{$korisnicko_ime}', '{$password}', '{$datum_rodjenja}', '{$spol}', '{$mobilni_telefon}', '{$email}', '{$adresa}', '{$aktivacijski_kod}', '{$formatirano_vrijeme}', 3, 1);";
            if ($baza->update($upit)) {


                $primatelj = $email;
                $naslov = "Aktivacija računa";
                $poruka = "Aktivacija korisničkog računa vrši se putem klika na: <a href='http://barka.foi.hr/WebDiP/2015_projekti/WebDiP2015x083/aktivacija.php?aktivacijski_kod={$aktivacijski_kod}'>link</a>";
                mail($primatelj, $naslov, $poruka, $headers);
                header("Location: prijava.php");
            } else {
                $poruke .="Neuspješna registracija. <br>";
            }
        }
        $ekstenzije = array("gif", "jpeg", "jpg", "png");
        for ($i = 0; isset($_FILES['slika']['name'][$i]); $i++) {
            $target_dir = "img/";
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

                    $upit = "UPDATE korisnici SET slika='{$linkslika}' WHERE korisnicko_ime = '{$korisnicko_ime}'";
                    $baza->update($upit);
                }
            } else {
                
            }
        }
    }
}

require_once 'smarty.php';
$smarty = new Smarty();
smartyConf($smarty);
//varijableSesije($smarty);
$smarty->assign('poruke', $poruke);
$smarty->display('header.tpl');
$smarty->display('registracija.tpl');
$smarty->display('footer.tpl');


ob_end_flush();
?>

