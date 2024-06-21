{extends file="layout_medico.tpl"}

{block name=content}
    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group" >
                        <h2>Recensioni</h2>
                        <br>
                            <input type="date" id="dataprenot" name="dataprenot" required/>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Effettua ricerca</button>
                            <br><br>
                            <select name="recensioni" id="categ" class="form-select-m" required>
                                <option value="">Ordina per</option>
                                <option value="nome">Nome</option>
                                <option value="cognome">Cognome</option>
                                <option value="dataapp">Data appuntamento</option>
                            </select>
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
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $recensioni as $recensione}
                <tr>
                    <td>{$recensione.paziente}</td>
                    <td>{$recensione.data}</td>
                    <td>{$recensione.valutazione}/5</td>
                    <td><button class="btn btn-primary">Dettagli</button></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}