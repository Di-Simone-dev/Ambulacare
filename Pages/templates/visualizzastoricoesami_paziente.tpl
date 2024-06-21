{extends file="layout_paziente.tpl"}

{block name=content}

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2><label for="storico">Storico Esami</label></h2>
                        <br>
                        <select name="tipologia" id="categ" class="form-select">
                            {foreach $categorie as $categoria}
                                <option value="{$categoria.id}">{$categoria.nome}</option>
                            {/foreach}
                        </select>
                        <br>
                        <input type="date" id="dataprenot" placeholder="Data prenotazione" name="dataprenot" required>
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
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $esami as $esame}
                    <tr>
                        <td>{$esame.data}</td>
                        <td>{$esame.orario}</td>
                        <td>{$esame.medico.nome}</td>
                        <td>{$esame.categoria}</td>
                        <td>{$esame.costo}</td>
                        <td><a class="btn btn-primary">Aggiungi Recensione</a>
                            {if $esame.referto}
                                <a class="btn btn-primary">Visualizza Referto</a>
                            {/if}
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}