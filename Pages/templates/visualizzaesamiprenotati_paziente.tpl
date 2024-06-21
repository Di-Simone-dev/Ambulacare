{extends file="layout_paziente.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2><label for="storico">Elenco Esami</label></h2>
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
                    <th scope="col">Azione</th>
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
                    <td><a href=""><button
                                class="btn btn-primary">Modifica</button></a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}