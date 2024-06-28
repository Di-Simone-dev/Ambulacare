{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div>
        <h2>Filtra per data</h2>
        <form action="/Ambulacare/Medico/ricerca_storico_appuntamenti_medico" method="post">
            <input type="date" name="data" required>
<br><br>
            <button type="submit" class="btn btn-primary">Procedi</button>
        </form>
    </div>

    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $esami as $esame}
                    <tr>
                        <td>{$esame.dataeora}</td>
                        <td>{$esame.nomepaziente}</td>
                        <td>{$esame.cognomepaziente}</td>
                        <td>{$esame.costoappuntamento}</td>
                        <td>
                        {if $esame.IdReferto}
                        <a href="/Ambulacare/Medico/visualizza_referto/{$esame.IdReferto}" class="btn btn-primary">Visualizza Referto</a>
                        {else}
                            <a href="/Ambulacare/Medico/inserimento_referto/{$esame.IdAppuntamento}" class="btn btn-primary">Carica Referto</a>
                        {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}