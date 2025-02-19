{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/conferma_orari_disponibilita" method="post">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h2>Disponibilità Orari Attuale</h2>
                            {if $week}
                                <a class="bottonitab" href="/Ambulacare/Medico/mostra_orari_disponibilita"> < </a>
                              {else}
                                <a class="bottonitab" href="/Ambulacare/Medico/mostra_orari_disponibilita/1"> > </a>
                                    {/if}
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
                                            {for $j=1; $j<6; $j++}
                                                <tr>
                                                    {for $i = 1; $i<7; $i++}
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
<br>
                                    <div>
                                        <h4>Disponibile in data : <h4>&ensp;<input type="date" id="datadisp"
                                            name="datadisp" />
                                        <br>
                                        <h4>Orario di Disponibilità: </h4><br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="14:30" />14:30-15:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="15:30" />15:30-16:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="16:30" />16:30-17:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="17:30" />17:30-18:30<br>
                                        <input type="checkbox" id="orariodisp" name="orariodisp[]"
                                            value="18:30" />18:30-19:30
                                        </h3>
                                    </div>
                        </div>
                    </div>
                    
                    <div>
                        <a type="submit" class="btn btn-primary" href="/Ambulacare/Medico/home" id="annulla">Indietro</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


{/block}