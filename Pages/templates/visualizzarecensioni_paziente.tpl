{extends file="layout_paziente.tpl"}

{block name=content}
    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group" >
                        <h2>Le mie Recensioni</h2>
                            <br>
                            <input type="date" id="dataprenot" name="dataprenot" required/>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Effettua ricerca</button>
                            <br><br>
                            <select name="recensioni" id="categ" class="form-select-m">
                                <option value="select">Ordina per</option>
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
                    <th scope="col">Nome e Cognome Medico</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $recensioni as $recensione}
                <tr>
                    <td>{$recensione.immagine} {$recensione.medico}</td>
                    <td>{$recensione.data}</td>
                    <td>{$recensione.valutazione}/5&#9733;</td>
                    <td><a href="/Ambulacare/Admin/recensione/{$recensione.id}" class="btn btn-primary">Dettagli</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}