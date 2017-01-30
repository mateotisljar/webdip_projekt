<section id="sadrzaj_ustanove">
            <div class="ustan">
                
                
                    {if isset($smarty.session.tip_korisnika)}
                        {if $tip_korisnika=1}
                        <div>
                    <ul><li><a href="kreiranje_ustanova.php">Kreiraj novu ustanovu</a></li></ul>
                </div>
            {section name=i loop=$ustanove}
                <br>
                <table border="1"> 
                    <tr><td rowspan="2">ef</td>
                        <td>Id</td>
                        <td><a href="detalji_ustanove.php?id_ustanove={$ustanove[i].id_ustanove}">{$ustanove[i].id_ustanove}</a></td>
                        <td rowspan="2">Lajk</td>
                    </tr>
                        <tr><td>Naziv</td>
                            <td>{$ustanove[i].naziv}</td>
                        </tr>
                </table>
                <br>
                <hr>
                {/section}
            
            {/if}{/if}
            
            
            </div>

        </section>