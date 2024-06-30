{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Storico Esami di {$paziente.nome} {$paziente.cognome}</h2>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Data e ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $esami as $esame}
                <tr>
                    <td>{$esame.dataeora}</td>
                    <td>{$esame.nometipologiamedico}</td>
                    <td>{$esame.nomemedico} {$esame.cognomemedico}</td>
                    <td>
                        {if $esame.IdReferto}
                            <a href="/Ambulacare/Medico/visualizza_referto/{$esame.IdReferto}" class="btn btn-primary">Visualizza Referto</a>
                        {/if}
                    </td>
                </tr>
            {{/foreach}}
            </tbody>
        </table>
    </div>

{/block}