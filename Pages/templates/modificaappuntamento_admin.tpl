{extends file="layout_admin.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Admin/" method="post">
                    <input type="hidden" value="{$esame.id}" name="idesame">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: {$esame.nome}&ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h3>
                            <h3>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;Data Odierna: {$smarty.now|date_format:'%d/%m/%Y'}</h3>
                            <h3>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico</h3>
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
                            <label for="data">Seleziona una nuova data e ora</label>
                            <select name="data" id="data">
                                {foreach $fasceorarie as $fasciaoraria}
                                    {foreach $fasciaoraria.orari as $ora}
                                    <option value="{$fasciaoraria.giorno} {$ora}">{$fasciaoraria.giorno} - {$ora}</option>
                                    {/foreach}
                                {/foreach}
                            </select>
                            <input type="hidden" value="" name="idpaz">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <a href="/Ambulacare/Admin/visualizzaapp" class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{/block}