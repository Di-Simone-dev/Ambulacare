{extends file="layout_admin.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Amministratore/ricerca_pazienti" id="tendina" method="post">
                    <div class="form-group">
                        <h2>Moderazione Pazienti</h2>
                        <br>
                        <input type="text" id="nomepaziente" placeholder="Nome Paziente" name="nomepaziente" />
                        <br><br>
                        <input type="text" id="cognomepaziente" placeholder="Cognome Paziente" name="cognomepaziente" />
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
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $pazienti as $paziente}
                    <tr>
                        <td>{$paziente.nome}</td>
                        <td>{$paziente.cognome}</td>
                        <td>{$paziente.attivo==1? "attivo" : "bloccato"}</td>
                        {if $paziente.attivo == 1}
                            <td><a href="/Ambulacare/Amministratore/moderazione_paziente/{$paziente.IdPaziente}" class="btn btn-primary">Blocca</a></td>
                        {else}
                            <td><a href="/Ambulacare/Amministratore/moderazione_paziente/{$paziente.IdPaziente}" class="btn btn-primary">Sblocca</a></td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}