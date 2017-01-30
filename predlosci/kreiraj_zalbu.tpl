<section id="sadrzaj_registracija">
            <div>
                <form method="POST" id="form1" name="zalbe" enctype="multipart/form-data" > 
                    

                    <label class="labele" for="tag">Unesite tagove: </label>
                    <input type="text" class="inputi" id="tag" name="tag"><br><br>

                    <label class="labele" for="opis">Unesite opis: </label>
                    <input type="text" class="inputi" id="opis" name="opis"><br><br>
                    
                    <label for="slika" class="labele">Upload slika</label>
                    <input name="slika[]" class="inputi" type="file" multiple="multiple"/><br><br>



                    <input type="submit" name="submit" id="submit" value="Kreiraj" ><br><br>

                    <article id="greske">
                        {$poruke}
                    </article>
                </form>
            </div>

        </section>
