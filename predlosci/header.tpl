<html>
    <head>
        <title>Režije</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Mateo Tišljar">
        <meta name="keywords" content="FOI, WebDiP">
        <link href="css/mtisljar.css" rel="stylesheet" type="text/css">
        <link href="css/mtisljar_mobiteli.css" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <header>
            <h1>Dobrodošli na aplikaciju za režije</h1>
            {if isset($smarty.session.korisnicko_ime)}<ul><li><a href="odjava.php">Odjava</a></li></ul>
            {else}<ul><li><a href="prijava.php">Prijava</a></li></ul>{/if}
        </header>
        <aside>
            <nav id="nav">
                <ul>
                        {if !isset($smarty.session.korisnicko_ime)}
                        <li><a href="prijava.php">Prijava</a></li>
                        <li><a href="registracija.php">Registracija</a></li>
                        
                        {else}
                        <li><a href="rezervacija.php">Rezervacija </a></li>
                        <li><a href="detalji_korisnika.php?korisnicko_ime={$korisnicko_ime}">Profil</a></li>
                        <li><a href="kreiranje_racuna.php">Računi </a></li>
                        
                        
                        {if $tip_korisnika==2 || $tip_korisnika==1}
                            <li><a href="ispis_korisnika.php">Popis korisnika</a></li>
                            <li><a href="popis_zalbi.php">Popis zalbi</a></li>
                        <li><a href="poslovnice.php">Poslovnice</a></li>{/if}
                        
                        <li><a href="kategorije.php">Kategorije</a></li>
                        
                        {/if}
                        <li><a href="ustanove.php">Ustanove</a></li>
                        <li><a href="o_autoru.html">O autoru</a></li>
                        
                </ul>
            </nav>
        </aside>