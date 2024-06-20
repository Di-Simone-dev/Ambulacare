{extends file="layout_admin.tpl"}

{block name=content}

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" method="post">
                    <div class="form-group">
                        <br><br>
                        <h2><label>Gestione Appuntamenti</label></h2>
                        <br>
                        <select name="tipologia" id="categ" class="form-select">
                            {foreach $categorie as $categoria}
                                <option value="{$categoria.id}">{$categoria.nome}</option>
                            {/foreach}
                        </select>
                        <br>
                        <input type="date" id="dataprenot" placeholder="Data prenotazione" name="dataprenot" />
                        <br><br>
                        <input type="time" id="oraprenotinizio" placeholder="Orario prenotazione" name="oraprenotinizio" />
                        <input type="time" id="oraprenotfine" placeholder="Orario prenotazione" name="oraprenotfine" />
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
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
                <tr>
                    {foreach $appuntamenti as $appuntamento}
                    <tr>
                        <td>{$appuntamento.data}</td>
                        <td>{$appuntamento.orario}</td>
                        <td>{$appuntamento.medico}</td>
                        <td>{$appuntamento.categoria}</td>
                        <td>{$appuntamento.costo}€</td>
                        <td><a href="/Ambulacare/Admin/modificaapp/{$appuntamento.id}"><button
                                    class="btn btn-primary">Modifica</button></a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}