{extends file="layout_medico.tpl"}

{block name=content}

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h1>Caricamento Referto</h1>
                <br>
                <h2>Esame di {$esame.paziente}</h2>
                <br>
                <h2>Categoria : {$esame.categoria} &ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h2>
                <br>
                <h2>Data : {$esame.data} &ensp;&ensp;&ensp;&ensp; Ora: {$esame.orario}</h2>
                <br><br>
                <form action="#">
                    <h3><label for="oggetto">Oggetto Referto: </label>
                        <input id="oggetto" name="oggetto" placeholder="Oggetto" style="width: 800px;height: 35px;" />
                    </h3>
                    <br>
                    <h3><label for="contenuto">Contenuto Referto:</label>
                        <input id="contenuto" name="contenuto" placeholder="Scrivi qua" style="width: 800px;height: 170px;">
                    </h3>
                    <br><br><br><br>
                    <div style="position: absolute;left: 550px;">
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

{/block}