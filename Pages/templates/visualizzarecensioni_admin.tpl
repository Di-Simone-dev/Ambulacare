{extends file="layout_admin.tpl"}

{block name=content}
    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group" >
                        <h2><label for="recensioni">Recensioni</label></h2>
                        <br>
                        <select name="recensioni" id="categ" class="form-select">
                            <option value="">Ordina per</option>
                            <option value="">Nome</option>
                            <option value="">Cognome</option>
                            <option value="">Data appuntamento</option>
                        </select>
                        <br>
                                <input type="date" id="dataprenot" placeholder="Data prenotazione" name="dataprenot" required/>
                                <br><br>
                        <button type="submit" class="btn btn-primary">Effettua ricerca</button>
                        </div>  
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Paziente</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $recensioni as $recensione}
                <tr>
                    <td>{$recensione.paziente}</td>
                    <td>{$recensione.medico}</td>
                    <td>{$recensione.data}</td>
                    <td>{$recensione.valutazione}/5</td>
                    <td><a href="/Ambulacare/Admin/recensione/{$recensione.id}" class="btn btn-primary">Dettagli</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}