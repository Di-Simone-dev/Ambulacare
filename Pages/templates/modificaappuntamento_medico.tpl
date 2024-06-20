{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Esame: {$esame.nome}&ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h2>
                            <h2>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;Data Odierna: {$smarty.now|date_format:'%d/%m/%Y'}</h2>
                            <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico</h2>
                            <br>
                            <table class="table" id="orari" style="border: 1px solid;">
                                <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                    <tr>
                                    {foreach $fasceorarie as $fasciaoraria}
                                        <th scope="col">{$fasciaoraria.giorno}</th>
                                    {/foreach}
                                    </tr>
                                </thead>
                                <tbody>
                                {for $i = 0; $i<$maxdim; $i++}
                                    <tr>
                                        {foreach $fasceorarie as $fasciaoraria}
                                            <td {if $fasciaoraria.orari|@count > $i}
                                                style="border: 1px solid;background-color: rgb(105, 200, 255);">{$fasciaoraria.orari[$i]}
                                            {else}
                                                style="border: 1px solid;background-color: red">
                                            {/if}
                                            </td>
                                        {/foreach}
                                    </tr>
                                {/for}
                                </tbody>
                            </table>
                            <br>
                            <div>
                                <h4><label>Nuova Data :</label><input type="date" id="nuovadata" placeholder="Nuova Data"
                                        name="nuovadata" />&ensp;&ensp;&ensp;&ensp;&ensp;<label>Vecchia Data:
                                        {$esame.data}</label></h4>
                                <h4><label>Nuovo Orario : </label><input type="time" id="nuovoorario"
                                        placeholder="Nuovo Orario"
                                        name="nuovoorario" />&ensp;&ensp;&ensp;&ensp;&ensp;<label>Vecchio Orario:
                                        {$esame.orario}</label></h4>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-primary" id="annulla">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{/block}