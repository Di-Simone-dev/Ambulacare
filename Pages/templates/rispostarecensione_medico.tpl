{extends file="layout_medico.tpl"}

{block name=content}
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Titolo Recensione: {$recensione.titolo}</h2>
                <h3>Oggetto Recensione: {$recensione.contenuto}</h3>
		<h3>Paziente : {$recensione.nominativopaziente}</h3>
                <h3>Data : {$recensione.data_creazione}</h3>
                <br>
                <h2>Risposta Recensione</h2>
                <br>
                <form action="/Ambulacare/Medico/inserisci_risposta" method="post">
                    <div class="form-group">
		    <h4>Contenuto</h4>
                    <input id="contenuto" name="contenuto" placeholder="Contenuto Risposta" style="width: 800px;height: 170px;"/>
                        <input type="hidden" name="IdRecensione" value="{$recensione.IdRecensione}">
                    </h4>
                    <br><br>
                    <div>
                        <a href="/Ambulacare/Medico/visualizza_recensioni" class="btn btn-primary" id="annulla">Annulla</a>
                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
{/block}