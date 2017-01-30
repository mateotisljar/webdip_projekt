<section id="sadrzaj_rezervacija">
    <nav id="nav_rezervacija">
        <ul>
            <li><a href="popis_rezervacija.php">Popis rezervacija</a></li>
            <li><a href="moje_rezervacije.php?korisnicko_ime={$korisnicko_ime}">Moje rezervacije</a></li>
        </ul>
    </nav>
            <div>
                <form method="POST" id="form1" name="rezervacija" action="rezervacija.php" enctype="multipart/form-data" > 
                    <label class="labele" for="ime">Unesite državu: </label>
                    <input type="text" class="inputi" id="drzava" name="drzava" placeholder="Drzava" size="20" ><br><br>

                    <label class="labele" for="prezime">Unesite grad: </label>
                    <input type="text" class="inputi" id="grad" name="grad" placeholder="Grad" size="20" ><br><br>

                    <label class="labele" for="datum">Datum: </label>
                    <input type="date" class="inputi" id="datum" name="datum" size="20" placeholder="Datum" ><br><br>

                    
                    <label class="labele" for="vrijeme">Vrijeme: </label>
                    <input type="time" class="inputi" id="vrijeme" name="vrijeme"><br><br>
                    
                    <label class="labele" for="usluga">Usluga: </label>
                    <select name="usluga">
                        {section name=i loop=$popis}
                            <option value="{$popis[i].naziv_usluge}">{$popis[i].naziv_usluge}</option>
                            {/section}
                    </select><br><br>
                    
                    <label class="labele" for="ustanova">Ustanova: </label>
                    <select name="ustanova">
                        {section name=i loop=$ustanove}
                            <option value="{$ustanove[i].id_ustanove}">{$ustanove[i].naziv}</option>
                            {/section}
                    </select><br><br>
                    
                    <input type="submit" name="submit" id="submit" value="Rezerviraj" ><br><br>

                    <article id="greske">
                        {$poruke}
                    </article>
                </form>
            </div>

        </section>
