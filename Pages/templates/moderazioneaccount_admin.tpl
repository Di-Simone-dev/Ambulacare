{extends file="layout_admin.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#" id="tendina" method="post">
                    <div class="form-group">
                        <h2>Moderazione Account</h2>
                        <br>
                        <input type="text" id="nomeutente" placeholder="Nome Utente" name="nomeutente" />
                        <br><br>
                        <input type="text" id="cognomeutente" placeholder="Cognome Utente" name="cognomeutente" />
                        <br><br>
                        <select name="categoria" id="categ" class="form-select">
                            <option value="select">Seleziona categoria utente</option>
                            <option value="medico">medico</option>
                            <option value="paziente">paziente</option>
                        </select>
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
                    <th scope="col">Nome Utente</th>
                    <th scope="col">Cognome Utente</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Stato</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $medici as $medico}
                    <tr>
                        <td>{$medico.nome}</td>
                        <td>{$medico.cognome}</td>
                        <td>Medico</td>
                        <td>{$medico.stato}</td>
                        {if $medico.stato == "Sbloccato"}
                            <td><button class="btn btn-primary">Blocca</button></td>
                        {else}
                            <td><button class="btn btn-primary">Sblocca</button></td>
                        {/if}
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}