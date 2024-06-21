{extends file="layout_paziente.tpl"}

{block name=content}

    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: {$esame.nome}&ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h3>
                            <h3>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;Data Odierna:
                                {$smarty.now|date_format:'%d/%m/%Y'}</h2>
                                <h3>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico
                                </h3>
                                <a class="bottonitab"><</a>
                                <a class="bottonitab">></a>
                                        <br>
                                        <table class="table" id="orari" style="border: 1px solid;">
                                            <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                                <tr>
                                                    {foreach $fascieorare as $fasciaoraria}
                                                        <th scope="col">{$fasciaoraria.giorno}</th>
                                                    {/foreach}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {for $i = 0; $i<$maxdim; $i++}
                                                    <tr>
                                                        {foreach $fascieorare as $fasciaoraria}
                                                            <td {if $fasciaoraria.orari|@count > $i}
                                                                    style="border: 1px solid;background-color: rgb(105, 200, 255);">
                                                                    {$fasciaoraria.orari[$i]}
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
                                                {foreach from=$fasceorarie item=orario key=giorno}
                                                    <option vlaue="{$giorno} {$orario}">{$giorno} - {$orario}</option>
                                                {/foreach}
                                            </select>
                                            <input type="hidden" value="" name="idpaz">
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