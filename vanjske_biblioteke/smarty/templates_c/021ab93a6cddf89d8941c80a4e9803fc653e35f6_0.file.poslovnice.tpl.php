<?php /* Smarty version 3.1.22-dev/30, created on 2016-06-01 19:35:09
         compiled from "predlosci/poslovnice.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:30049574f1ccd5a2c56_84718899%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '021ab93a6cddf89d8941c80a4e9803fc653e35f6' => 
    array (
      0 => 'predlosci/poslovnice.tpl',
      1 => 1464801928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30049574f1ccd5a2c56_84718899',
  'variables' => 
  array (
    'poruke' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/30',
  'unifunc' => 'content_574f1ccd5e2188_24826621',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_574f1ccd5e2188_24826621')) {
function content_574f1ccd5e2188_24826621 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '30049574f1ccd5a2c56_84718899';
?>
<section id="sadrzaj_poslovnice">
            <div>
                <form method="POST" id="form1" name="poslovnice" action="poslovnice.php" enctype="multipart/form-data" > 
                    <label class="labele" for="ime">Unesite naziv poslovnice: </label>
                    <input type="text" class="inputi" id="ime" name="naziv_poslovnice" placeholder="Naziv poslovnice" size="20" ><br><br>

                    <label class="labele" for="drzava">Unesite državu: </label>
                    <input type="text" class="inputi" id="drzava" name="drzava" placeholder="Drzava" size="20" ><br><br>

                    <label class="labele" for="grad">Unesite grad: </label>
                    <input type="text" class="inputi" id="grad" name="grad"  size="30" placeholder="Grad" ><br><br>

                    <label class="labele" for="adresa">Adresa: </label>
                    <textarea id="adresa" class="inputi" name="adresa" cols="10" rows="4" ></textarea><br><br>

                    
                    

                    <input type="submit" name="submit" id="submit" value="Spremi" ><br><br>

                    <article id="greske">
                        <?php echo $_smarty_tpl->tpl_vars['poruke']->value;?>

                    </article>

            </div>

        </section><?php }
}
?>