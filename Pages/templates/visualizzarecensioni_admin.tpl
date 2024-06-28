{extends file="layout_admin.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/ricerca_recensioni" method="post">
                    <div class="form-group">
                        <h2>Visualizza recensioni</h2>
                        <br>
                        <input type="text" id="nomemedico" placeholder="Nome Medico" name="nomemedico" />
                        <br><br>
                        <input type="text" id="cognomemedico" placeholder="Cognome Medico" name="cognomemedico" />
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Avvia Ricerca</button>
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
                    <th scope="col">Titolo</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Paziente</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $recensioni as $recensione}
                    <tr>
                        <td>{$recensione.titolo}</td>
                        <td>{$recensione.contenuto}</td>
                        <td>{$recensione.data_creazione}</td>
                        <td>{$recensione.valutazione}/5&#9733;</td>
                        <td>{$recensione.medico}</td>
                        <td>{$recensione.paziente}</td>
                        <td><a href="/Ambulacare/Amministratore/elimina_recensione/{$recensione.IdRecensione}" class="btn btn-primary">Elimina</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}