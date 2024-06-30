{extends file="layout_paziente.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Paziente/modifica_appuntamento" method="post">
                    <div class="form-group">
                        <div class="col-9" id="elenco">
                            <h3>Esame: {$medico.nometipologia}&ensp;&ensp;&ensp;&ensp;Costo: {$medico.costo}€</h3>
                            <h3>Medico: {$medico.nome} {$medico.cognome}&ensp;&ensp;&ensp;Data Odierna:
                                {$smarty.now|date_format:'%d/%m/%Y'}</h3>
                                <h3>Valutazione:
                                {if $medico.valutazione.IdMedico}
                                    {$medico.valutazione.valutazione}
                                {else}0
                                {/if}/5&#9733;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità
                                    Orari
                                    del Medico</h3>
                            <a class="bottonitab">
                                < </a>
                                    <a class="bottonitab"> > </a>
                                    <br>
                                    <table class="table" id="orari" style="border: 1px solid;">
                                        <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                            <th scope="col">Lunedì {$giorno[0]}</th>
                                            <th scope="col">Martedì {$giorno[1]}</th>
                                            <th scope="col">Mercoledì {$giorno[2]}</th>
                                            <th scope="col">Giovedì {$giorno[3]}</th>
                                            <th scope="col">Venerdì {$giorno[4]}</th>
                                            <th scope="col">Sabato {$giorno[5]}</th>
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
                                        <h4>Seleziona una data e ora</h4>
                                        <input type="date" name="data" required>
<br><br>
                                        <select name="nslot" id="orario" class="form-select">
                                            <option value="1">14:30</option>
                                            <option value="2">15:30</option>
                                            <option value="3">16:30</option>
                                            <option value="4">17:30</option>
                                            <option value="5">18:30</option>
                                        </select>
                                        <input type="hidden" value="{$medico.IdAppuntamento}" name="IdAppuntamento">
                                    </div>
                        </div>
                    </div>
                    <br>
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