{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Caricamento Referto</h2>
                <br>
                <h3>Esame di {$esame.nomepaziente} {$esame.cognomepaziente}</h3>
                <br>
                <h3>Costo: {$esame.costoappuntamento}€</h3>
                <br>
                <h3>Data e ora: {$esame.dataeora}</h3>
                <br><br>
                <form action="/Ambulacare/Medico/caricamento_referto" enctype="multipart/form-data" method="post">
                    <h4><label for="oggettoref">Oggetto Referto: </label>
                        <input id="oggetto" name="oggetto" style="width: 800px;height: 35px;" required/>
                    </h4>
                    <br>
                    <h4><label for="contenutoref">Contenuto Referto:</label>
                        <input id="contenuto" name="contenuto" style="width: 800px;height: 170px;" required/>
                    </h4>
		    <br><br>
                    <h4><label for="immagineref">Immagine Referto: </label>
                    <input id="immagineref" name="immagineref"  type="file"></h4>
                    <br><br>
                    <div>
                        <input type="hidden" value="{$esame.IdAppuntamento}" name="IdAppuntamento">
                        <a class="btn btn-primary" href="/Ambulacare/Medico/visualizza_storico_appuntamenti_medico" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

{/block}