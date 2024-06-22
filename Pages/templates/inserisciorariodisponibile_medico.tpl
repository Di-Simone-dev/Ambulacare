{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Disponibilità Orari Attuale</h2>
                            <br>
                            <a class="bottonitab">
                                <</a>
                                    <a class="bottonitab">></a>
                                    <br>
                                    <table class="table" id="orari" style="border: 1px solid;">
                                        <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                            <tr>
                                                <th scope="col">Lunedì {$giorno[0]}</th>
                                                <th scope="col">Martedì {$giorno[1]}</th>
                                                <th scope="col">Mercoledì {$giorno[2]}</th>
                                                <th scope="col">Giovedì {$giorno[3]}</th>
                                                <th scope="col">Venerdì {$giorno[4]}</th>
                                                <th scope="col">Sabato {$giorno[5]}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {for $i=1; $i<7; $i++}
                                                <tr>
                                                    {for $j = 1; $j<5; $j++}
                                                        {if $fasceorarie[$i][$j]}
                                                            <td style="border: 1px solid;background-color: rgb(105, 200, 255);">
                                                                {13+$j}:30</td>
                                                        {else}
                                                            <td style="border: 1px solid;background-color: red">{13+$j}:30</td>
                                                        {/if}
                                                    {/for}
                                                </tr>
                                            {/for}
                                        </tbody>
                                    </table>
                                    <div>
                                        <label>Disponibile in data : </label>&ensp;<input type="date" id="datadisp"
                                            name="datadisp" />
                                        <br>
                                        <label>Orario di Disponibilità: </label><br>
                                    <input type="checkbox" id="orariodisp" name="orariodisp" value="14:30"/>14:30<br>
                                    <input type="checkbox" id="orariodisp" name="orariodisp" value="15:30"/>15:30<br>
                                    <input type="checkbox" id="orariodisp" name="orariodisp" value="16:30"/>16:30<br>
                                    <input type="checkbox" id="orariodisp" name="orariodisp" value="17:30"/>17:30<br>
                                    <input type="checkbox" id="orariodisp" name="orariodisp" value="18:30"/>18:30</h3>
                                    </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div>
                        <a type="submit" class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


{/block}