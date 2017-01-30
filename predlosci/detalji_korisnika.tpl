<section id="sadrzaj_registracija">
            <div>
                <form method="POST" id="form1" name="detalji_korisnika" enctype="multipart/form-data" > 
                    <label class="labele" for="ime">Ime: </label>
                    <input type="text" class="inputi" id="ime" name="ime" placeholder="Ime" size="20" value="{$korisnik.ime}"><br><br>

                    <label class="labele" for="prezime">Prezime: </label>
                    <input type="text" class="inputi" id="prezime" name="prezime" placeholder="Prezime" size="30" value="{$korisnik.prezime}"><br><br>

                    <label class="labele" for="korisnicko_ime">Korisničko ime: </label>
                    <input type="text" class="inputi" id="korisnicko_ime" name="korisnicko_ime" maxlength="20" size="10" placeholder="Korsničko ime" value="{$korisnik.korisnicko_ime}"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="password">Lozinka: </label>
                    <input type="password" class="inputi" name="password" id="password" placeholder="Lozinka" value="{$korisnik.lozinka}"><span class="nevidljivo"></span><br><br>

                    
                    <label for="datum_rodjenja" class="labele" >Datum rođenja: </label>
                    <input type="text" id="datum_rodjenja" name="datum_rodjenja" class="inputi" value="{$korisnik.datum_rodjenja}"><br><br>

                    <label class="labele" for="spol">Spol: </label>
                    <select id="spol" name="spol" >
                        <option value="Muški">Muški</option>
                        <option value="Ženski">Ženski</option>
                    </select>
                    <br><br>
                    <label class="labele" for="mobilni_telefon">Mobilni telefon: </label>

                    <input type="tel" class="inputi" id="mobilni_telefon" name="mobilni_telefon" value="{$korisnik.telefon}"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="email">Email adresa: </label>
                    <input type="email" class="inputi" id="email" name="email" value="{$korisnik.email}"><span class="nevidljivo"></span><br><br>

                    <label class="labele" for="adresa">Adresa: </label>
                    <input type="text" id="adresa" class="inputi" name="adresa" cols="10" rows="4" value="{$korisnik.adresa}"></textarea><br><br>
                    <div class="ss">
                    <label for="slika">Slika:</label>
                    
                    <img  src="{$korisnik.slika}" alt="slika" style='height: 100%; width: 100%; object-fit: contain'><br><br>
                    </div>
                   
                    <input type="submit" name="promijeni" id="submit" value="Ažuriraj" ><br><br>

                    <article id="greske">
                        {$poruka}
                    </article>
                </form>
            </div>

        </section>
