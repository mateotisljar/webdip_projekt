<section id="sadrzaj_ustanove">
            <div>{if $tip_korisnika=1}
                <form method="POST" id="form1" name="detalji_ustanove" enctype="multipart/form-data" > 
                    <label class="labele" for="naziv_ustanove" >Naziv ustanove: </label>
                    <input type="text" class="inputi" id="naziv_ustanove" name="naziv_ustanove" value="{$podaci.naziv}" placeholder="Naziv ustanove" size="20" ><br><br>
                    
                    
                    
                    <label class="labele" for="moderator">ID_moderatora: </label>
                    <input type="text" name="moderator" id="moderator" value="{$podaci.moderator}"><br><br>

                    <input type="submit" name="submit" id="submit" value="Ažuriraj" ><br><br>
                    
                    
                    
                    
                    <article id="greske">
                        {$poruka}
                    </article>
                </form>
                    {/if}
            </div>

        </section>
