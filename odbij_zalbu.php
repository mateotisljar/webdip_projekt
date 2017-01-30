<?php

session_start();
ob_start();

include_once 'baza.class.php';
$baza = new Baza();

$zalba= $_GET['id_zalbe'];
$upit="update zalbe set prihvaceno = 2 where id_zalbe={$zalba}";
$baza->update($upit);
header("Location: popis_zalbi.php");