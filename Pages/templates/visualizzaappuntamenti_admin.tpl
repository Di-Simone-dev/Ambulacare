{extends file="layout_admin.tpl"}

{block name=content}

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/ricerca_appuntamenti" method="post">
                    <div class="form-group">
                        <br><br>
                        <h2><label>Gestione Appuntamenti</label></h2>
                        <br>
                        <select name="IdTipologia" class="form-select-m">
                            {foreach $tipologie as $tipologia}
                                <option value="{$tipologia.IdTipologia}">{$tipologia.nome_tipologia}</option>
                            {/foreach}
                        </select>
                        <br><br>
                        <input type="date" id="dataapp" name="dataapp" required>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
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
                    <th scope="col">Data</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                <tr>
                    {foreach $appuntamenti as $appuntamento}
                    <tr>
                        <td>{$appuntamento.data}</td>
                        <td>{$appuntamento.nominativomedico}</td>
                        <td>{$appuntamento.costo}€</td>
                        <td><a href="/Ambulacare/Amministratore/dettagli_appuntamento_modifica/{$appuntamento.IdAppuntamento}"><button
                                    class="btn btn-primary">Modifica</button></a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}