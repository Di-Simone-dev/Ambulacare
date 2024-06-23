{extends file="layout_medico.tpl"}

{block name=content}

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Caricamento Referto</h2>
                <br>
                <h3>Esame di {$esame.paziente}</h3>
                <br>
                <h3>Categoria : {$esame.tipologia} &ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h3>
                <br>
                <h3>Data : {$esame.data} &ensp;&ensp;&ensp;&ensp; Ora: {$esame.orario}</h3>
                <br><br>
                <form action="#" enctype="multipart/form-data" method="post">
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
                        <a type="submit" class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

{/block}