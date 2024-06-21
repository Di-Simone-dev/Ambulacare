{extends file="layout_paziente.tpl"}

{block name=content}
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <br><br>
                        <h2><label>Prenotazione esami</label></h2>
                        <br>
                        <select name="tipologia" id="categ" class="form-select-m">
                            {foreach $categorie as $categoria}
                                <option value="{$categoria.id}">{$categoria.nome}</option>
                            {/foreach}
                        </select>
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
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Recensioni</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">

                {foreach $esami as $esame}
                    <tr>
                        <td>{$esame.medico.nome}</td>
                        <td>{$esame.categoria}</td>
                        <td>{$esame.costo}</td>
                        <td>{$esame.medico.valutazione}/5</td>
                        <td><a href="" class="btn btn-primary">Prenota</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>


{/block}