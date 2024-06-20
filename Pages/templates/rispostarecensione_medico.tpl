{extends file="layout_medico.tpl"}

{block name=content}
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Risposta Recensione</h2>
                <br>
                <h3>Paziente : {$esame.paziente}</h3>
                <br>
                <h3>Categoria : {$esame.nome} &ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h3>
                <br>
                <h3>Data : {$esame.data} &ensp;&ensp;&ensp;&ensp; Ora: {$esame.orario}</h3>
                <br>
                <form action="#">
                    <div class="form-group"></div>
                    <h4><label for="oggetto">Oggetto Risposta: </label>
                        <input id="oggetto" name="oggetto" placeholder="Oggetto" style="width: 800px;height: 35px;">
                        <br><br><label for="contenuto">Contenuto Risposta:</label>
                        <input id="contenuto" name="contenuto" placeholder="Scrivi qua" style="width: 800px;height: 170px;">
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