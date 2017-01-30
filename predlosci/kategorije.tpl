<section id="sadrzaj_kategorije">
    
            <div>{if $tip_korisnika=!3}
                <form method="POST" id="form1" name="kategorije" action="kategorije.php" enctype="multipart/form-data" > 
                    {section name=i loop=$mod}
                        <p>Vi ste moderator za ustanovu: {$mod[i].naziv}</p>
                            {/section}
                    
                    
                    <label class="labele" for="naziv">Unesite naziv: </label>
                    <input type="text" class="inputi" id="naziv" name="naziv" placeholder="Naziv" size="20" ><br><br>

                    <label class="labele" for="opis">Unesite opis: </label>
                    <input type="text" class="inputi" id="opis" name="opis" placeholder="Opis" size="20" ><br><br>

                    <label class="labele" for="cijena">Cijena: </label>
                    <input type="number" class="inputi" id="cijena" name="cijena"  size="10" placeholder="Cijena" ><br><br>
                    
                    <label class="labele" for="ustanova">Ustanova: </label>
                    <select name="ustanova">
                        {section name=i loop=$mod}
                            <option value="{$mod[i].id_ustanove}">{$mod[i].naziv}</option>
                            {/section}
                    </select><br><br>

                    <input type="submit" name="submit" id="submit" value="Spremi" ><br><br>

                    <article id="greske">
                        {$poruke}
                    </article>
                </form>
                    {/if}
            </div>
            
            

        </section>
