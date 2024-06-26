{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div>
        <h2>Filtra per data</h2>
        <form action="/Ambulacare/Medico/ricerca_storico_appuntamenti_medico" method="post">
            <input type="date" name="data" required>
            <button type="submit">procedi</button>
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
                        <td><a href="/Ambulacare/Medico/" class="btn btn-primary">Referto</a></td>
                    </tr>
                {{/foreach}}
            </tbody>
        </table>
    </div>

{/block}