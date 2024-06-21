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
                            <h2>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;Data Odierna:
                                {$smarty.now|date_format:'%d/%m/%Y'}</h2>
                            <h2>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari del Medico</h2>
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
                            <br>
                            <div>
                                <h4><label>Nuova Data :</label><input type="date" id="nuovadata"
                                        name="nuovadata" />&ensp;&ensp;&ensp;&ensp;&ensp;<label>Vecchia Data:
                                        {$esame.data}</label></h4>
                                <label for="data">Seleziona una nuova data e ora</label>
                                <select name="orario" id="orario" class="form-select-m">
                                    <option value="select">14:30</option>
                                    <option value="select">15:30</option>
                                    <option value="select">16:30</option>
                                    <option value="select">17:30</option>
                                </select>
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