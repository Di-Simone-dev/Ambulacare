{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Disponibilità Orari Attule</h2>
			    <br>
                                    <button class="bottonitab"><</button>
                                    <button class="bottonitab">></button>
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
                            <div>
                                <label>Disponibile in data : </label>&ensp;<input type="date" id="datadisp" name="datadisp" />
                                <br>
                                <label>Inizio orario di Disponibilità : </label>&ensp;<input type="time" id="inizioorario" name="inizioorario" />
                                <br>
                                <label>Fine orario di Disponibilità : </label>&ensp;<input type="time" id="fineorario" name="fineorario" />
                            </div>
                        </div>
                    </div>
                    <br><br><br>
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