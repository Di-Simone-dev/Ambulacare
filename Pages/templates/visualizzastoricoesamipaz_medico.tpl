{extends file="layout_admin.tpl"}

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
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $esami as $esame}
                <tr>
                    <td>{$esame.data}</td>
                    <td>{$esame.orario}</td>
                    <td>{$esame.categoria}</td>
                    <td>{$esame.medico.nome}</td>
                    <td>
                        {if $esame.referto}
                            <a href=""><button class="btn btn-primary">Visualizza Referto</button></a>
                        {/if}
                    </td>
                </tr>
            {{/foreach}}
            </tbody>
        </table>
    </div>

{/block}