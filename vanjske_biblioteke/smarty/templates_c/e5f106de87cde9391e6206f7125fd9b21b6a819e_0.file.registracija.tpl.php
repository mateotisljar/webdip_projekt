<?php /* Smarty version 3.1.22-dev/30, created on 2016-06-01 19:14:55
         compiled from "predlosci/registracija.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17021574f180f63d511_36467820%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5f106de87cde9391e6206f7125fd9b21b6a819e' => 
    array (
      0 => 'predlosci/registracija.tpl',
      1 => 1464799171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17021574f180f63d511_36467820',
  'variables' => 
  array (
    'poruke' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/30',
  'unifunc' => 'content_574f180f653721_31893992',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_574f180f653721_31893992')) {
function content_574f180f653721_31893992 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '17021574f180f63d511_36467820';
?>
<section id="sadrzaj_registracija">
            <div>
                <form method="POST" id="form1" name="registracija" action="registracija.php" enctype="multipart/form-data" > 
                    <label class="labele" for="ime">Unesite svoje ime: </label>
                    <input type="text" class="inputi" id="ime" name="ime" placeholder="Ime" size="20" ><br><br>

                    <label class="labele" for="prezime">Unesite svoje prezime: </label>
                    <input type="text" class="inputi" id="prezime" name="prezime" placeholder="Prezime" size="30" ><br><br>

                    <label class="labele" for="korisnicko_ime">Korisničko ime: </label>
                    <input type="text" class="inputi" id="korisnicko_ime" name="korisnicko_ime" maxlength="20" size="10" placeholder="Korsničko ime" ><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password">Lozinka: </label>
                    <input type="password" class="inputi" name="password" id="password" placeholder="Lozinka"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password2">Ponovno upišite lozinku: </label>
                    <input type="password" class="inputi" name="password2" id="password2" placeholder="Lozinka"><span class="nevidljivo"></span><br><br>

                    <label for="datum_rodjenja" >Datum rođenja: </label>
                    <input type="date" id="datum_rodjenja" name="datum_rodjenja">

                    <label class="labele" for="spol">Spol: </label>
                    <select id="spol" name="spol">
                        <option value="Muški">Muški</option>
                        <option value="Ženski">Ženski</option>
                    </select>
                    <br><br>
                    <label class="labele" for="mobilni_telefon">Mobilni telefon: </label>

                    <input type="tel" class="inputi" id="mobilni_telefon" name="mobilni_telefon"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="email">Email adresa: </label>
                    <input type="email" class="inputi" id="email" name="email"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="adresa">Lokacija: </label>
                    <textarea id="adresa" class="inputi" name="adresa" cols="10" rows="4" ></textarea><br><br>

                    <label class="labele" for="slika">Slika: </label>
                    <input type="file" class="inputi" id="slika" name="slika" ><br><br>


                    <div class="g-recaptcha" data-sitekey="6LcY4B4TAAAAABXJZ-ODWygBNmv3nxhRh3d8WXKW"></div>

                    <input type="submit" name="submit" id="submit" value="Registriraj me" ><br><br>

                    <article id="greske">
                        <?php echo $_smarty_tpl->tpl_vars['poruke']->value;?>

                    </article>

            </div>

        </section>
<?php }
}
?>