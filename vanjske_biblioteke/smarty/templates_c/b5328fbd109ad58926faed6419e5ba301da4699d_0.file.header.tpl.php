<?php /* Smarty version 3.1.22-dev/30, created on 2016-06-01 19:38:50
         compiled from "predlosci/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14470574f1daabe69f6_48888720%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5328fbd109ad58926faed6419e5ba301da4699d' => 
    array (
      0 => 'predlosci/header.tpl',
      1 => 1464802728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14470574f1daabe69f6_48888720',
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/30',
  'unifunc' => 'content_574f1daac867b5_05846154',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_574f1daac867b5_05846154')) {
function content_574f1daac867b5_05846154 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '14470574f1daabe69f6_48888720';
?>
<html>
    <head>
        <title>Režije</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="css/mtisljar.css" rel="stylesheet" type="text/css">
        <link href="css/mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
        <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
    </head>
    <body>
        <header>
            <h1>Dobrodošli na aplikaciju za režije</h1>
        </header>
        <aside>
            <nav id="nav">
                <ul>
                    
                        <li><a href="prijava.php">Prijava</a></li>
                        <li><a href="registracija.php">Registracija</a></li>
                        <li><a href="popis_ustanova.php">Popis ustanova</a></li>
                        <li><a href="o_autoru.php">O autoru</a></li>
                        <li><a href="kreiranje_ustanova.php">Kreiranje ustanova</a></li>
                       <li><a href="poslovnice.php">Poslovnice</a></li>
                    
                </ul>
            </nav>
        </aside><?php }
}
?>