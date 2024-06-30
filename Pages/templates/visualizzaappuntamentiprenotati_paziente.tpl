{extends file="layout_paziente.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Elenco Appuntamenti</h2>
                        <br>
                        <select name="tipologia" class="form-select">
                            {foreach $tipologie as $tipologia}
                                <option value="{$tipologia.IdTipologia}">{$tipologia.nome_tipologia}</option>
                            {/foreach}
                        </select>
                        <br><br>
                        <input type="date" id="dataapp" name="dataapp" required>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Effettua Ricerca</button>
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
                    <th scope="col">Data e ora</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $esami as $esame}
                <tr>
                <td>{$esame.dataeora}</td>
                <td>{$esame.nomemedico} {$esame.cognomemedico}</td>
                <td>{$esame.nometipologiamedico}</td>
                <td>{$esame.costomedico}</td>
                    <td><a href="/Ambulacare/Paziente/dettagli_appuntamento_modifica/{$esame.IdAppuntamento}" class="btn btn-primary">Modifica</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}