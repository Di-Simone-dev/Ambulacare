{extends file="layout_admin.tpl"}

{block name=content}
<br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Storico Esami Pazienti</h2>
                        <br>
                        <select name="tipologia" id="tipologia" class="form-select-m">
                            {foreach $tipologie as $tipologia}
                                <option value="{$tipologia.id}">{$tipologia.nome}</option>
                            {/foreach}
                        </select>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Avvia Ricerca Esame</button>
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
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Data di Nascita</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $pazienti as $paziente}
                    <tr>
                        <td>{$paziente.nome}</td>
                        <td>{$paziente.cognome}</td>
                        <td>{$paziente.data}</td>
                        <td><a href="/Ambulacare/Admin/esamipaziente/{$paziente.id}"><button class="btn btn-primary">Storico
                                    Esami</button></a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}