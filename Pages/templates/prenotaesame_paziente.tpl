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
                            <h3>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;Data Odierna: {$smarty.now|date_format:'%d/%m/%Y'}</h3>
                  
                            <h3>Valutazione: {$esame.medico.valutazione}/5&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Disponibilità Orari
                                del Medico</h3>
                            <br>
                            <table class="table" id="orari" style="border: 1px solid;">
                                <thead style="background-color: rgb(230, 230, 230);text-align: center;">
                                    <tr>
                                    {foreach $fascieorarie as $fasciaoraria}
                                        <th scope="col">{$fasciaoraria.giorno}</th>
                                    {/foreach}
                                    </tr>
                                </thead>
                                <tbody>
                                {for $i = 0; $i<$maxdim; $i++}
                                    <tr>
                                        {foreach $fascieorarie as $fasciaoraria}
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
                                <h4><label>Data Appuntamento:</label><input type="date" id="dataapp"
                                        placeholder="Data Appuntamento" name="datadisp" /></h4>
                                <h4><label>Ora Appuntamento : </label><input type="time" id="oraapp"
                                        placeholder="Ora Appuntamento" name="oraapp" /></h4>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <div>
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{/block}