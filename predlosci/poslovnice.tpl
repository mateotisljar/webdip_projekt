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
                    <select>
                        {foreach from=$ustanove item=i}
                            <option value="{$i}">{$i}</option>
                            
                            {/foreach}
                    </select>
                    
                    

                    <input type="submit" name="submit" id="submit" value="Spremi" ><br><br>

                    <article id="greske">
                        {$poruke}
                    </article>
                </form>
            </div>

        </section>