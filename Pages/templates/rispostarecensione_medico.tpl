{extends file="layout_medico.tpl"}

{block name=content}
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Titolo Recensione: {$recensione.titolo}</h2>
                <h3>Oggetto Recensione: {$recensione.contenuto}</h3>
            </div>
            <div class="col">
                <br>
                <h2>Risposta Recensione</h2>
                <br>
                <h3>Paziente : {$recensione.nominativopaziente}</h3>
                <br>
                <h3>Data : {$recensione.data_creazione}</h3>
                <br>
                <form action="/Ambulacare/Medico/inserisci_risposta" method="post">
                    <div class="form-group"></div>
                    <h4><label for="oggetto">Oggetto Risposta: </label>
                        <input type="text" id="oggetto" name="oggetto" placeholder="Oggetto"
                            style="width: 800px;height: 35px;">
                        <br><br><label for="contenuto">Contenuto Risposta:</label>
                        <textarea id="contenuto" name="contenuto" style="width: 800px;height: 170px;">Scrivi qua</textarea>
                        <input type="hidden" name="IdRecensione" value="{$recensione.IdRecensione}">
                    </h4>
                    <br><br>
                    <div>
                        <a class="btn btn-primary" id="annulla">Annulla</a>
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
{/block}