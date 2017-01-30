<section id="sadrzaj_racuni">
<nav id="nav_rezervacija">
        <ul>
            <li><a href="racuni.php?korisnicko_ime={$korisnicko_ime}">Moji računi</a></li>
        </ul>
    </nav>
            <div>
                <form method="POST" id="form1" name="racuni" action="kreiranje_racuna.php" enctype="multipart/form-data" >
                    <label class="labele" for="korisnik">Odaberite korisnika: </label>
                    <select name="korisnik">
                        {section name=i loop=$korisnici}
                            <option value="{$korisnici[i].id_korisnika}">{$korisnici[i].ime} {$korisnici[i].prezime}</option>
                            {/section}
                    </select><br><br>
                    
                    <label class="labele" for="rezervacija">Odaberite id rezervacije: </label>
                    <select name="rezervacija">
                        {section name=i loop=$rezervacija}
                            <option value="{$rezervacija[i].id_rezervacije}">{$rezervacija[i].id_rezervacije}</option>
                            {/section}
                    </select><br><br>
                    
                    
                    
                    <label class="labele" for="datum">Unesite datum: </label>
                    <input type="date" class="inputi" id="datum" name="datum" size="20" ><br><br>

                    <label class="labele" for="vrijeme">Unesite vrijeme: </label>
                    <input type="time" class="inputi" id="vrijeme" name="vrijeme"  size="20" ><br><br>

                    <label class="labele" for="stanje">Unesite stanje: </label>
                    <input type="number" class="inputi" id="stanje" name="stanje" size="20" ><br><br>

                    
                    
                    <input type="submit" name="submit" id="submit" value="Kreiraj račun" ><br><br>

                    <article id="greske">
                        {$poruke}
                    </article>
                </form>
            </div>

        </section>
