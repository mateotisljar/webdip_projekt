<?php

ob_start();
session_start();




require_once('smarty.php');

$smarty = new Smarty();
smartyConf($smarty);


$smarty->display('header.tpl');
$smarty->display('index.tpl');
$smarty->display('footer.tpl');
ob_end_flush();
?>

