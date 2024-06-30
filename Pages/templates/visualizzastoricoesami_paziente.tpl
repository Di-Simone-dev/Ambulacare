{extends file="layout_paziente.tpl"}

{block name=content}
<br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Paziente/ricerca_appuntamenti_effettuati" method="post">
                    <div class="form-group">
                        <h2>Storico Esami</h2>
                        <br>
                        <select name="IdTipologia" class="form-select-m" required>
                            {foreach $tipologie as $tipologia}
                                <option value="{$tipologia.IdTipologia}"
                                    {if $tipologia.IdTipologia == $Idtipologia}
                                        selected="selected"
                                    {/if}
                                >{$tipologia.nome_tipologia}</option>
                            {/foreach}
                        </select>
                        <br><br>
                        <input type="date" id="dataapp" name="data" required>
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
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $esami as $esame}
                    <tr>
                        <td>{$esame.dataeora}</td>
                        <td>{$esame.nomemedico} {$esame.cognomemedico}</td>
                        <td>{$esame.nometipologiamedico}</td>
                        <td>{$esame.costomedico}</td>
                        <td><a class="btn btn-primary" href="/Ambulacare/Paziente/accedi_schermata_recensioni/{$esame.IdMedico}/{$esame.IdAppuntamento}">Aggiungi Recensione</a>
                            {if $esame.referto}
                                <a class="btn btn-primary" href="/Ambulacare/Paziente/visualizza_referto/{$esame.referto}">Visualizza Referto</a>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}