{extends file="layout.tpl"}
{block name=body}

    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Disponibilità Orari Attule</h2>
                            <table class="table" id style="border: 1px solid;">
                                <thead>
                                    <tr>
                                        {foreach $fascieorarie as $fasciaoraria}
                                            <th scope="col">{$fasciaoraria.giorno}</th>
                                        {/foreach}
                                    </tr>
                                </thead>
                                <tbody>
                                    {for $i = 0; $i<count($fascieorarie[0].orari); $i++}
                                        <tr>
                                        {foreach $fascieorarie as $fasciaoraria}
                                            <td>{$fasciaoraria.orari[$i]}</td>
                                        {/foreach}
                                        </tr>
                                    {/for}
                                </tbody>
                            </table>
                            <div>
                                <label>Disponibile in data : </label>&ensp;<input type="date" id="datadisp"
                                    placeholder="Data Disponibile" name="datadisp" />
                                <br>
                                <label>Inizio orario di Disponibilità : </label>&ensp;<input type="time" id="inizioorario"
                                    placeholder="Inizio Orario" name="inizioorario" />
                                <br>
                                <label>Fine orario di Disponibilità : </label>&ensp;<input type="time" id="fineorario"
                                    placeholder="Fine Orario" name="fineorario" />
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                </form>
            </div>
        </div>
    </div>

{/block}