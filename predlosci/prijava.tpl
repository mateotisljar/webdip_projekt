
        </aside>
        <section id="sadrzaj_prijava">
        <div>
            <form method="POST" id="form" name="form">
            <label for="korisnicko_ime" class="labele">Korisničko ime: </label>
            <input typte="text" id="korisnicko_ime" name="korisnicko_ime" placeholder="Korisnicko ime" autofocus="autofocus" class="inputi"><br><br>
            
            <label for="lozinka" class="labele">Lozinka: </label>
            <input type="password" id="password" name="password" placeholder="Lozinka" class="inputi"><br><br>
            
            <label for="checkbox" class="labele">Zapamti me?</label>
            <input type="checkbox" id="checkbox" name="checkbox" class="inputi"><br><br>
            
            <input type="submit" name="submit" value="Prijavi se" class="inputi"><br><br>
            <a href="zaboravljena_lozinka.php">Zaboravljena lozinka?</a><br><br>
            <article id="greske">
                        {$poruke}
                    </article>
            </form>
            
        
        </div>
        
        </section>
