{extends file="layout_paziente.tpl"}

{block name=content}


    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: {$medico.tipologia}&ensp;&ensp;&ensp;&ensp;Costo: {$medico.costo}€</h3>
                            <h3>Medico: {$medico.nome} {$medico.cognome}&ensp;&ensp;&ensp;Data Odierna:
                                {$smarty.now|date_format:'%d/%m/%Y'}</h3>

                            <h3>Valutazione:
                                {$medico.valutazione}/5&#9733;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità
                                Orari
                                del Medico</h3>
                            <a class="bottonitab">
                                << /a>
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
                                                    {for $j = 1; $j<6; $j++}
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
                                        <label for="data">Seleziona una data e ora</label>
                                        <select name="orario" id="orario" class="form-select-m">
                                            <option value="">14:30</option>
                                            <option value="">15:30</option>
                                            <option value="">16:30</option>
                                            <option value="">17:30</option>
                                            <option value="">18:30</option>
                                        </select>
                                        <input type="hidden" value="" name="idpaz">
                                    </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div>
                        <a class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{/block}