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
                            <input type="date" id="dataapp" name="dataapp" required/>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Effettua ricerca</button>
                            <br><br>
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
                    <td>{$recensione.nominativopaziente}</td>
                    <td>{$recensione.data_creazione}</td>
                    <td>{$recensione.valutazione}/5&#9733;</td>
                    <td><a href="/Ambulacare/Medico/dettagli_recensione/{$recensione.IdRecensione}" class="btn btn-primary">Dettagli</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}