{extends file="layout_paziente.tpl"}

{block name=content}

    <br><br>
    <div style="padding:35px;">
	<h2>Elenco Appuntamenti prenotati</h2>
<br><br>
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