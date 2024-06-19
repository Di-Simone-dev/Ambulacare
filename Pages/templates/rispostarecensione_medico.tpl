{extends file="layout_medico.tpl"}

{block name=content}
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Risposta Recensione</h1>
                <br><br>
                <h2>Paziente : {$esame.paziente}</h2>
                <br>
                <h2>Categoria : {$esame.nome} &ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h2>
                <br>
                <h2>Data : {$esame.data} &ensp;&ensp;&ensp;&ensp; Ora: {$esame.orario}</h2>
                <br>
                <form action="#">
                    <div class="form-group"></div>
                    <h3><label for="oggetto">Oggetto Risposta: </label>
                        <input id="oggetto" name="oggetto" placeholder="Oggetto" style="width: 800px;height: 35px;">
                        <br><br><label for="contenuto">Contenuto Risposta:</label>
                        <input id="contenuto" name="contenuto" placeholder="Scrivi qua" style="width: 800px;height: 170px;">
                    </h3>
                    <br><br><br><br><br>
                    <div>
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
{/block}