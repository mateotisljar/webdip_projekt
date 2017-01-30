<?php /* Smarty version 3.1.22-dev/30, created on 2016-06-01 19:34:18
         compiled from "predlosci/ustanove.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:29907574f1c9a83d2a5_75829339%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c55fdbc152c9b784e51271f7f7a85e0d87b43a27' => 
    array (
      0 => 'predlosci/ustanove.tpl',
      1 => 1464785022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29907574f1c9a83d2a5_75829339',
  'variables' => 
  array (
    'poruke' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/30',
  'unifunc' => 'content_574f1c9a8ef028_40171727',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_574f1c9a8ef028_40171727')) {
function content_574f1c9a8ef028_40171727 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '29907574f1c9a83d2a5_75829339';
?>
<section id="sadrzaj_ustanove">
            <div>
                <form method="POST" id="form2" name="ustanove" action="ustanove.php" enctype="multipart/form-data" > 
                    <label class="labele" for="naziv_ustanove">Unesite naziv ustanove: </label>
                    <input type="text" class="inputi" id="naziv_ustanove" name="naziv_ustanove" placeholder="Naziv ustanove" size="20" ><br><br>

                    <label class="labele" for="moderator">Unesite ID_moderatora: </label>
                    <input type="text" class="inputi" id="moderator" name="moderator" placeholder="moderator" size="20" ><br><br>


                    

                    <article id="greske">
                        <?php echo $_smarty_tpl->tpl_vars['poruke']->value;?>

                    </article>

            </div>

        </section><?php }
}
?>