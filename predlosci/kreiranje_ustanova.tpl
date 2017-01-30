<section id="sadrzaj_ustanove">
            <div>
                
                
                
                
                <form method="POST" id="form2" name="ustanove" action="ustanove.php" enctype="multipart/form-data" > 
                    <label class="labele" for="naziv_ustanove">Unesite naziv ustanove: </label>
                    <input type="text" class="inputi" id="naziv_ustanove" name="naziv_ustanove" placeholder="Naziv ustanove" size="20" ><br><br>
                    
                    
                    
                    <label class="labele" for="moderator">Unesite ID_moderatora: </label>
                    <select name="moderator">
                        {section name=i loop=$popis}
                            <option  value="{$popis[i].id_korisnika}">{$popis[i].korisnicko_ime}</option>
                            {/section}
                    </select><br><br>

                    <input type="submit" name="submit" id="submit" value="Spremi" ><br><br>
                    
                    
                    <article id="greske">
                        {$poruke}
                    </article>
                </form>
                    
            </div>

        </section>