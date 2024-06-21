{extends file="layout_medico.tpl"}

{block name=content}
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Risposta Recensione</h2>
                <br>
                <h3>Paziente : {$paziente}</h3>
                <br>
                <h3>Categoria : {$nomeEsame} &ensp;&ensp;&ensp;&ensp;Costo: {$costoEsame}€</h3>
                <br>
                <h3>Data : {$data} &ensp;&ensp;&ensp;&ensp; Ora: {$orario}</h3>
                <br>
                <form action="#">
                    <div class="form-group"></div>
                    <h4><label for="oggetto">Oggetto Risposta: </label>
                        <input type="text" id="oggetto" name="oggetto" placeholder="Oggetto"
                            style="width: 800px;height: 35px;">
                        <br><br><label for="contenuto">Contenuto Risposta:</label>
                        <textarea id="contenuto" name="contenuto" style="width: 800px;height: 170px;">Scrivi qua</textarea>
                    </h4>
                    <br><br>
                    <div>
                        <button type="submit" class="btn btn-primary" id="annulla">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
{/block}